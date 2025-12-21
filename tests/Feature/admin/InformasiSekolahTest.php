<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Information;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Http\UploadedFile;
use App\Models\GalleryInformasi;


/** 
 * Tes fungsional untuk pengelolaan informasi sekolah di halaman admin.
 * Menggantikan sintaks Pest dengan sintaks PHPUnit standar.
 */
class InformasiSekolahTest extends TestCase
{
    // Menggunakan trait RefreshDatabase untuk me-reset database setelah setiap tes
    use RefreshDatabase;

    // Properti untuk menyimpan data yang dibuat di setUp()
    protected $user;
    protected $kategori;
    protected $informasi;

    /**
     * Metode setUp() akan dijalankan sebelum setiap tes.
     * Ini menggantikan fungsi beforeEach() dari Pest.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Menggunakan fake storage untuk menghindari manipulasi file asli
        Storage::fake('public');

        // Buat user superadmin untuk otentikasi
        $this->user = User::factory()->create(['role' => 'superadmin']);

        // Buat satu kategori
        $this->kategori = Category::factory()->create();

        // Buat satu data informasi awal
        $this->informasi = Information::create([
            'title' => 'Judul Lama',
            'content' => 'Konten Lama',
            'category_id' => $this->kategori->id,
        ]);
    }

    #[Test]
    public function it_displays_an_empty_list_of_information()
    {
        // Hapus semua informasi yang ada untuk menguji kondisi kosong
        Information::query()->delete();

        $this->actingAs($this->user)
            ->get(route('admin.informasi'))
            ->assertStatus(200)
            ->assertSee('Belum ada informasi sekolah.');
    }

    #[Test]
    public function it_displays_a_list_of_3_information_items()
    {
        // Tambah 2 data informasi lagi, total jadi 3 (1 dari setUp)
        Information::factory()->count(2)->create([
            'category_id' => $this->kategori->id,
        ]);

        $this->actingAs($this->user)
            ->get(route('admin.informasi'))
            ->assertStatus(200)
            ->assertSee($this->informasi->title); // Memastikan data dari setUp terlihat
    }

    #[Test]
    public function it_displays_the_school_information_creation_page()
    {
        $this->actingAs($this->user)
            ->get(route('admin.informasi.create'))
            ->assertStatus(200)
            ->assertSee('Tambah Informasi Sekolah');
    }

    #[Test]
    public function it_adds_new_information_correctly()
    {
        $data = [
            'judul' => 'Judul Informasi Baru',
            'konten' => 'Konten informasi yang lengkap.',
            'kategori_id' => $this->kategori->id,
        ];

        $response = $this->actingAs($this->user)
            ->post(route('admin.informasi.store'), $data);

        // Assert: Redirect ke index setelah berhasil
        $response->assertRedirect(route('admin.informasi'));
        $response->assertSessionHas('success', 'Informasi berhasil ditambahkan.');

        // Assert: Pastikan data baru tersimpan di database
        $this->assertDatabaseHas('information', [
            'title' => 'Judul Informasi Baru',
            'content' => 'Konten informasi yang lengkap.',
            'category_id' => $this->kategori->id,
        ]);
    }

    #[Test]
    public function it_can_display_the_school_information_edit_page()
    {
        // Buat data baru khusus untuk tes edit
        $informasiUntukEdit = Information::factory()->create([
            'title' => 'Judul Lama untuk Edit',
            'category_id' => $this->kategori->id,
        ]);

        $response = $this->actingAs($this->user)
            ->get(route('admin.informasi.edit', $informasiUntukEdit->id));

        // Assert: Halaman ditampilkan dengan status 200 dan melihat judul lama
        $response->assertStatus(200);
        $response->assertSee('Judul Lama untuk Edit');
    }

    #[Test]
    public function it_can_update_school_information_with_valid_data()
    {
        $informasiToUpdate = $this->informasi; // Ambil data dari setUp

        $dataBaru = [
            'judul' => 'Judul Baru',
            'konten' => 'Konten Baru',
            'kategori_id' => $this->kategori->id,
        ];

        $response = $this->actingAs($this->user)
            ->put(route('admin.informasi.update', $informasiToUpdate->id), $dataBaru);

        // Assert: Redirect ke index
        $response->assertRedirect(route('admin.informasi'));
        $response->assertSessionHas('success', 'Informasi berhasil diperbarui.');

        // Assert: Data di database telah diperbarui
        $this->assertDatabaseHas('information', [
            'id' => $informasiToUpdate->id,
            'title' => 'Judul Baru',
            'content' => 'Konten Baru',
        ]);

        // Assert: Data lama sudah tidak ada
        $this->assertDatabaseMissing('information', [
            'id' => $informasiToUpdate->id,
            'title' => 'Judul Lama', // Dari setUp
        ]);
    }

    #[Test]
    public function it_can_delete_school_information()
    {
        $informasiToDelete = Information::factory()->create([
            'title' => 'Judul untuk Dihapus',
            'category_id' => $this->kategori->id,
        ]);

        $response = $this->actingAs($this->user)
            ->delete(route('admin.informasi.destroy', $informasiToDelete->id));

        // Assert: Redirect ke index
        $response->assertRedirect(route('admin.informasi'));
        $response->assertSessionHas('success', 'Informasi berhasil dihapus.');

        // Assert: Data sudah tidak ada di database
        $this->assertDatabaseMissing('information', [
            'id' => $informasiToDelete->id,
        ]);
    }
    #[Test]
    public function bisa_filter_informasi_berdasarkan_title()
    {
        $user = User::factory()->create(['role' => 'staff']);

        // Data yang cocok
        Information::factory()->create([
            'title' => 'Agenda Sekolah 2025'
        ]);

        // Data yang tidak cocok
        Information::factory()->create([
            'title' => 'Pengumuman Libur'
        ]);

        // Request dengan filter title
        $response = $this->actingAs($user)->get('/admin/informasi?title=Agenda');

        $response->assertStatus(200);

        // Yang muncul
        $response->assertSee('Agenda Sekolah 2025');

        // Yang tidak muncul
        $response->assertDontSee('Pengumuman Libur');
    }
    
    public function dapat_menampilkan_informasi_berdasarkan_kategori()
    {
        // ✅ Buat 2 kategori
        $kategoriA = Category::create([
            'nama' => 'Pengumuman'
        ]);

        $kategoriB = Category::create([
            'nama' => 'Berita'
        ]);

        // ✅ Buat data informasi dari masing-masing kategori
        $info1 = Information::create([
            'title' => 'Pengumuman Libur',
            'content' => 'Libur nasional',
            'category_id' => $kategoriA->id,
        ]);

        $info2 = Information::create([
            'title' => 'Berita Sekolah',
            'content' => 'Update kegiatan',
            'category_id' => $kategoriB->id,
        ]);

        // ✅ Kirim request dengan filter category_id = kategoriA
        $response = $this->get('/admin/informasi?category_id=' . $kategoriA->id);

        // ✅ Status harus 200 (berhasil)
        $response->assertStatus(200);

        // ✅ Data dari kategori A tampil
        $response->assertSee($info1->title);

        // ✅ Data dari kategori B tidak tampil
        $response->assertDontSee($info2->title);
    }
    #[test]
    public function bisa_filter_informasi_berdasarkan_kategori()
    {
        $user = User::factory()->create(['role' => 'staff']);

        $category1 = Category::factory()->create();
        $category2 = Category::factory()->create();

        // Data kategori 1
        Information::factory()->create([
            'title' => 'Agenda Sekolah',
            'category_id' => $category1->id,
        ]);

        // Data kategori 2
        Information::factory()->create([
            'title' => 'Pengumuman Libur',
            'category_id' => $category2->id,
        ]);

        $response = $this->actingAs($user)
            ->get("/admin/informasi?category_id={$category1->id}");

        $response->assertStatus(200);

        // Yang ditampilkan
        $response->assertSee('Agenda Sekolah');

        // Yang disembunyikan
        $response->assertDontSee('Pengumuman Libur');
    }
    
}
