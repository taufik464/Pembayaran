<?php

use App\Models\Category;
use App\Models\Information;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

// Menggunakan RefreshDatabase untuk memastikan database bersih sebelum setiap test
uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

// Kita dapat membuat sebuah Category dummy yang akan digunakan di berbagai test
beforeEach(function () {
    // Membuat kategori agar exists rule dapat diuji
    $this->category = Category::factory()->create();
});

// Gunakan describe untuk mengelompokkan test (opsional, tapi disarankan)
describe('Informasi Store', function () {

    // Kasus Positif (Sukses) - Dengan Gambar
    test('kasus positif: dapat menyimpan informasi dan gambar', function () {
        // 1. Fake Storage (penting untuk testing upload file)
        Storage::fake('public');

        // 2. Buat file dummy
        $image1 = UploadedFile::fake()->image('file1.jpg', 600, 400)->size(100); // 100KB
        $image2 = UploadedFile::fake()->image('file2.png', 800, 600)->size(200); // 200KB

        // 3. Kirim permintaan POST
        $response = $this->post('/informasi', [
            'judul'       => 'Informasi Baru',
            'konten'      => 'Isi berita...',
            'kategori_id' => $this->category->id,
            'images'      => [$image1, $image2],
        ]);

        // 4. Harapan Hasil

        // Cek redirect (Status 200 OK biasanya adalah redirect setelah POST sukses)
        $response->assertStatus(302)
            ->assertSessionHas('success'); // Session Flash success muncul.

        // Cek data Information dibuat
        $this->assertDatabaseHas('information', [
            'judul'       => 'Informasi Baru',
            'konten'      => 'Isi berita...',
            'kategori_id' => $this->category->id,
        ]);

        // Ambil Information yang baru dibuat
        $information = Information::where('judul', 'Informasi Baru')->first();

        // Cek Data GalleryInformasi (2 entri) dibuat
        expect($information->galleryInformasi)->toHaveCount(2);

        // Cek File gambar tersimpan di storage (misalnya di disk 'public' dalam folder 'informasi')
        Storage::disk('public')->assertExists("informasi/{$image1->hashName()}");
        Storage::disk('public')->assertExists("informasi/{$image2->hashName()}");
    });

    // ----------------------------------------------------------------------------------

    // Kasus Positif (Sukses) - Tanpa Gambar
    test('kasus positif: dapat menyimpan informasi tanpa mengunggah gambar', function () {
        // 1. Kirim permintaan POST
        $response = $this->post('/informasi', [
            'judul'       => 'Informasi Tanpa Foto',
            'konten'      => 'Isi konten...',
            'kategori_id' => $this->category->id,
            // 'images' tidak ada
        ]);

        // 2. Harapan Hasil

        // Cek Status dan Session Flash
        $response->assertStatus(302)
            ->assertSessionHas('success');

        // Cek data Information dibuat
        $this->assertDatabaseHas('information', [
            'judul'       => 'Informasi Tanpa Foto',
            'konten'      => 'Isi konten...',
            'kategori_id' => $this->category->id,
        ]);

        // Cek tidak ada entri GalleryInformasi dibuat
        $information = Information::where('judul', 'Informasi Tanpa Foto')->first();
        expect($information->galleryInformasi)->toHaveCount(0);
    });

    // ----------------------------------------------------------------------------------

    // Kasus Negatif (Validasi Gagal - Judul Kosong)
    test('kasus negatif: gagal karena field judul kosong', function () {
        // 1. Data
        $data = [
            'judul'       => '', // Judul kosong
            'konten'      => 'Isi konten...',
            'kategori_id' => $this->category->id,
        ];

        // 2. Kirim permintaan POST
        $response = $this->from('/informasi/create')->post('/informasi', $data); // from() penting untuk assertSessionHasErrors

        // 3. Harapan Hasil

        // Status 422 Unprocessable Entity dan kembali ke form
        $response->assertStatus(302); // Biasanya redirect 302 jika menggunakan middleware Validate
        $response->assertSessionHasErrors(['judul']); // Error validasi untuk judul
        $response->assertInvalid('judul'); // Alternatif lebih modern untuk cek error validasi
    });

    // ----------------------------------------------------------------------------------

    // Kasus Negatif (Validasi Gagal - Kategori tidak ada)
    test('kasus negatif: gagal karena kategori_id tidak ada', function () {
        // 1. Data
        $data = [
            'judul'       => 'Info',
            'konten'      => 'Isi konten...',
            'kategori_id' => 999, // ID yang tidak ada
        ];

        // 2. Kirim permintaan POST
        $response = $this->from('/informasi/create')->post('/informasi', $data);

        // 3. Harapan Hasil

        // Status 422 Unprocessable Entity dan kembali ke form
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['kategori_id']); // Error validasi untuk kategori_id (exists rule)
    });

    // ----------------------------------------------------------------------------------

    // Kasus Negatif (Validasi Gagal - Gambar)
    test('kasus negatif: gagal karena salah satu file bukan gambar atau melebihi batas ukuran', function () {
        // 1. Fake Storage (meskipun validasi harus gagal sebelum storage dipanggil, ini praktik yang baik)
        Storage::fake('public');

        // 2. Buat file dummy: 
        // a) file.txt (bukan gambar)
        // b) file_big.jpg (melebihi 2MB, misalnya 3MB)
        $invalidFile = UploadedFile::fake()->create('file.txt', 100, 'text/plain');
        $oversizedImage = UploadedFile::fake()->image('file_big.jpg')->size(3000); // 3000 KB = 3MB (asumsi max 2MB)
        $validImage = UploadedFile::fake()->image('valid.jpg')->size(500); // 500 KB

        // 3. Data dengan gambar yang tidak valid
        $data = [
            'judul'       => 'Info',
            'konten'      => 'Isi...',
            'kategori_id' => $this->category->id,
            'images'      => [$invalidFile, $validImage], // Kasus file.txt
        ];

        // 4. Kirim permintaan POST untuk Kasus file.txt
        $response = $this->from('/informasi/create')->post('/informasi', $data);

        // 5. Harapan Hasil (Kasus file.txt - mimes rule)
        $response->assertStatus(302);
        // Error validasi untuk images.* (mimes rule)
        $response->assertSessionHasErrors(['images.0']);

        // 6. Data dengan gambar yang kebesaran
        $dataOversized = [
            'judul'       => 'Info',
            'konten'      => 'Isi...',
            'kategori_id' => $this->category->id,
            'images'      => [$oversizedImage], // Kasus file_big.jpg (3MB)
        ];

        // 7. Kirim permintaan POST untuk Kasus file kebesaran
        $responseOversized = $this->from('/informasi/create')->post('/informasi', $dataOversized);

        // 8. Harapan Hasil (Kasus file kebesaran - max rule)
        $responseOversized->assertStatus(302);
        // Error validasi untuk images.* (max rule)
        $responseOversized->assertSessionHasErrors(['images.0']);
    });
});
