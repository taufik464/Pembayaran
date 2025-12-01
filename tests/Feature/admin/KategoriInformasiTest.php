<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use App\Models\Information;

class KategoriInformasiTest extends TestCase
{
    use RefreshDatabase;

    protected $staff;

    protected function setUp(): void
    {
        parent::setUp();

        // Buat user role staff
        $this->staff = User::factory()->create([
            'role' => 'staff'
        ]);
    }

   #[Test]
    public function staff_tidak_dapat_melihat_daftar_kategori_jika_belum_login()
    {
        Category::factory()->create(['name' => 'Berita']);
        Category::factory()->create(['name' => 'Pengumuman']);

        $response = $this->get('/admin/kategori');

        $response->assertRedirect('/login');
    }

    #[Test]
    public function staff_dapat_melihat_daftar_kategori_setelah_login()
    {
        Category::factory()->create(['name' => 'Berita']);
        Category::factory()->create(['name' => 'Pengumuman']);

        $response = $this->actingAs($this->staff)->get('/admin/kategori');

        $response->assertStatus(200);
        $response->assertViewIs('admin.informasi.kategori.index');
        $response->assertSee('Berita');
        $response->assertSee('Pengumuman');
    }

    #[Test]
    public function staff_dapat_melihat_form_tambah_kategori()
    {
        $response = $this->actingAs($this->staff)->get(route('admin.kategori.tambah'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.informasi.kategori.create');
    }

    #[Test]
    public function staff_dapat_menyimpan_kategori_baru()
    {
        $data = [
            'name' => 'Kategori Baru Percobaan'
        ];

        $response = $this->actingAs($this->staff)->post(route('admin.kategori.store'), $data);

        $response->assertRedirect(route('admin.kategori'));
        $response->assertSessionHas('success', 'Kategori berhasil ditambahkan.');

        $this->assertDatabaseHas('categories', $data);
    }

    #[Test]
    public function staff_dapat_melihat_informasi_berdasarkan_kategori()
    {
        $category = Category::factory()->create(['name' => 'Berita']);
        $info1 = Information::factory()->create([
            'category_id' => $category->id,
            'title' => 'Judul Berita 1'
        ]);
        $info2 = Information::factory()->create([
            'category_id' => $category->id,
            'title' => 'Judul Berita 2'
        ]);

        $response = $this->actingAs($this->staff)->get('/admin/kategori/' . $category->id);

        $response->assertStatus(200);
        $response->assertViewIs('admin.informasi.info.index');
        $response->assertSee('Judul Berita 1');
        $response->assertSee('Judul Berita 2');
    }

  


    #[Test]
    public function penyimpanan_kategori_gagal_jika_nama_kosong()
    {
        $data = [
            'name' => ''
        ];

        $response = $this->actingAs($this->staff)->post(route('admin.kategori.store'), $data);

        $response->assertSessionHasErrors('name');
        $this->assertDatabaseCount('categories', 0);
    }

    #[Test]
    public function staff_dapat_melihat_form_edit_kategori()
    {
        $category = Category::factory()->create([
            'name' => 'Nama Lama'
        ]);

        $response = $this->actingAs($this->staff)->get(route('admin.kategori.edit', $category->id));

        $response->assertStatus(200);
        $response->assertViewIs('admin.informasi.kategori.edit');
        $response->assertSee('Nama Lama');
    }

    #[Test]
    public function staff_dapat_memperbarui_kategori()
    {
        $category = Category::factory()->create([
            'name' => 'Nama Asli'
        ]);

        $updatedData = [
            'name' => 'Nama Diperbarui'
        ];

        $response = $this->actingAs($this->staff)->put(route('admin.kategori.update', $category->id), $updatedData);

        $response->assertRedirect(route('admin.kategori'));
        $response->assertSessionHas('success', 'Kategori berhasil diperbarui.');

        $this->assertDatabaseMissing('categories', [
            'name' => 'Nama Asli'
        ]);

        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'name' => 'Nama Diperbarui'
        ]);
    }

    #[Test]
    public function staff_dapat_menghapus_kategori()
    {
        $category = Category::factory()->create([
            'name' => 'Siap Dihapus'
        ]);

        $response = $this->actingAs($this->staff)->delete(route('admin.kategori.destroy', $category->id));

        $response->assertRedirect(route('admin.kategori'));
        $response->assertSessionHas('success', 'Kategori berhasil dihapus.');

        $this->assertDatabaseMissing('categories', [
            'id' => $category->id
        ]);
    }
}
