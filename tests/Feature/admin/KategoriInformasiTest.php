<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

// Menggunakan trait RefreshDatabase secara global untuk semua test di file ini
uses(RefreshDatabase::class);

// --- SETUP ---
// Menyiapkan staff yang terotentikasi sebelum setiap test
beforeEach(function () {
    // Asumsi: Pengguna yang dibuat memiliki izin yang cukup untuk mengakses rute admin.
    $this->staff = User::factory()->create();
});



test('admin tidak dapat melihat daftar kategori karena belum login', function () {
    
    
    // ARRANGE: Siapkan beberapa kategori
    Category::factory()->create(['name' => 'Berita']);
    Category::factory()->create(['name' => 'Pengumuman']);
    // ACT: Akses halaman daftar kategori tanpa login
    $response = $this->get('/admin/kategori');
    // ASSERT: Verifikasi pengalihan ke halaman login
    $response->assertRedirect('/login');
   
});

test('staff dapat melihat daftar kategori setelah login', function () {

    
    $staff = User::factory()->create(); // Renamed $user to $staff for clarity

    // 2. Create the categories
    Category::factory()->create(['name' => 'Berita']);
    Category::factory()->create(['name' => 'Pengumuman']);

    // ACT: Login as staff and access the category list page
    // We use actingAs() to simulate the authenticated session
    $response = $this->actingAs($staff)->get('/admin/kategori'); // Corrected from $admin to $staff

    // ASSERT: Verifikasi status dan konten halaman
    $response->assertStatus(200);
    $response->assertViewIs('admin.informasi.kategori.index');

    // ASSERT additional content checks for a stronger test
    $response->assertSee('Berita');
    $response->assertSee('Pengumuman');
    
});

test('admin dapat melihat form pembuatan kategori baru', function () {
    // ACT: Akses halaman create
    $response = $this->actingAs($this->staff)->get(route('admin.kategori.create'));

    // ASSERT: Verifikasi
    $response->assertStatus(200);
    $response->assertViewIs('admin.informasi.kategori.create');
});

test('admin dapat menyimpan kategori baru dengan data valid', function () {
    // ARRANGE: Data kategori baru
    $data = ['name' => 'Kategori Baru Percobaan'];

    // ACT: Kirim data POST ke endpoint store
    $response = $this->actingAs($this->staff)->post(route('admin.kategori.store'), $data);

    // ASSERT: Verifikasi
    $response->assertRedirect(route('admin.kategori')); // Cek redirect ke index
    $response->assertSessionHas('success', 'Kategori berhasil ditambahkan.'); // Cek pesan sukses

    // Cek database
    $this->assertDatabaseHas('categories', $data);
});

test('penyimpanan kategori gagal jika nama kosong', function () {
    // ARRANGE: Data kosong
    $data = ['name' => ''];

    // ACT: Kirim data POST yang tidak valid
    $response = $this->actingAs($this->staff)->post(route('admin.kategori.store'), $data);

    // ASSERT: Verifikasi
    $response->assertSessionHasErrors(['name']); // Cek validasi error untuk field 'name'
    $this->assertDatabaseCount('categories', 0); // Pastikan tidak ada kategori yang tersimpan
});

// --- UPDATE (EDIT & UPDATE) TESTS ---

test('admin dapat melihat form edit kategori yang sudah ada', function () {
    // ARRANGE: Buat kategori yang akan diedit
    $category = Category::factory()->create(['name' => 'Nama Lama']);

    // ACT: Akses halaman edit, menggunakan route helper dengan parameter
    $response = $this->actingAs($this->staff)->get(route('admin.kategori.edit', $category->id));

    // ASSERT: Verifikasi
    $response->assertStatus(200);
    $response->assertViewIs('admin.informasi.kategori.edit');
    $response->assertSee('Nama Lama'); // Pastikan nama lama dimuat di form
});

test('admin dapat memperbarui kategori dengan data valid', function () {
    // ARRANGE: Buat kategori awal
    $category = Category::factory()->create(['name' => 'Nama Asli']);
    $updatedData = ['name' => 'Nama Diperbarui'];

    // ACT: Kirim request update (PUT) ke endpoint
    $response = $this->actingAs($this->staff)->put(route('admin.kategori.update', $category->id), $updatedData);

    // ASSERT: Verifikasi
    $response->assertRedirect(route('admin.kategori')); // Cek redirect ke index
    $response->assertSessionHas('success', 'Kategori berhasil diperbarui.'); // Cek pesan sukses

    // Cek database, pastikan nama lama hilang dan nama baru ada
    $this->assertDatabaseMissing('categories', ['name' => 'Nama Asli']);
    $this->assertDatabaseHas('categories', [
        'id' => $category->id,
        'name' => 'Nama Diperbarui',
    ]);
});

// --- DELETE (DESTROY) TESTS ---

test('admin dapat menghapus kategori', function () {
    // ARRANGE: Buat kategori yang akan dihapus
    $category = Category::factory()->create(['name' => 'Siap Dihapus']);

    // ACT: Kirim request DELETE ke endpoint
    $response = $this->actingAs($this->staff)->delete(route('admin.kategori.destroy', $category->id));

    // ASSERT: Verifikasi
    $response->assertRedirect(route('admin.kategori')); // Cek redirect ke index
    $response->assertSessionHas('success', 'Kategori berhasil dihapus.'); // Cek pesan sukses

    // Cek database, pastikan kategori telah hilang
    $this->assertDatabaseMissing('categories', ['id' => $category->id]);
});
