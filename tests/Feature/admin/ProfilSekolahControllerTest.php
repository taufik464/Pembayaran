<?php

namespace Tests\Feature\Admin;

use App\Models\Admin\ProfilSekolah;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ProfilSekolahControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Buat user superadmin untuk login
        $this->user = User::factory()->create(['role' => 'superadmin']);
    }

    #[Test]
    public function index_page_can_be_loaded()
    {
        $response = $this->actingAs($this->user)
            ->get(route('profil.index'));

        $response->assertStatus(200)
            ->assertViewIs('admin.content.profil.index')
            ->assertViewHasAll(['profil', 'keyword']);
    }
   

    #[Test]
    public function create_page_can_be_loaded()
    {
        $response = $this->actingAs($this->user)
            ->get(route('profil.create'));

        $response->assertStatus(200)
            ->assertViewIs('admin.content.profil.create');
    }
   

    #[Test]
    public function it_can_store_profil_with_image()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('profil.jpg');

        $response = $this->actingAs($this->user)
            ->post(route('profil.store'), [
                'judul' => 'Judul Profil',
                'kategori' => 'Sambutan',
                'isi' => 'Isi profil sekolah',
                'image' => $file,
            ]);

        // Pastikan data tersimpan di database
        $this->assertDatabaseHas('profil_sekolahs', [
            'judul' => 'Judul Profil',
            'kategori' => 'Sambutan',
        ]);

        // Pastikan file tersimpan di disk
        $this->assertTrue(Storage::disk('public')->exists('profil/' . $file->hashName()));

        $response->assertRedirect(route('profil.index'));
    }

    #[Test]
    public function it_can_update_profil_and_replace_image()
    {
        Storage::fake('public');

        // Buat profil awal
        $profil = ProfilSekolah::create([
            'judul' => 'Judul Lama',
            'kategori' => 'Sambutan',
            'isi' => 'Isi lama',
            'image' => null,
        ]);

        $newImage = UploadedFile::fake()->image('new.jpg');

        $response = $this->actingAs($this->user)
            ->put(route('profil.update', $profil->id), [
                'judul' => 'Judul Baru',
                'kategori' => 'Visi',
                'isi' => 'Isi baru',
                'image' => $newImage,
            ]);

        $this->assertDatabaseHas('profil_sekolahs', [
            'id' => $profil->id,
            'judul' => 'Judul Baru',
            'kategori' => 'Visi',
            'isi' => 'Isi baru',
        ]);

        $this->assertTrue(Storage::disk('public')->exists('profil/' . $newImage->hashName()));

        $response->assertRedirect(route('profil.index'));
    }

    #[Test]
    public function it_can_delete_profil_and_image()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('hapus.jpg');
        $path = $file->store('profil', 'public');

        $profil = ProfilSekolah::create([
            'judul' => 'Judul Hapus',
            'kategori' => 'sejarah',
            'isi' => 'Isi Hapus',
            'image' => $path,
        ]);

        $this->assertTrue(Storage::disk('public')->exists($path));

        $response = $this->actingAs($this->user)
            ->delete(route('profil.destroy', $profil->id));

        $this->assertDatabaseMissing('profil_sekolahs', [
            'id' => $profil->id
        ]);

        $this->assertFalse(Storage::disk('public')->exists($path));

        $response->assertRedirect(route('profil.index'));
    }

    #[Test]
    public function it_validates_required_fields_when_storing()
    {
        $response = $this->actingAs($this->user)
            ->post(route('profil.store'), []);

        $response->assertSessionHasErrors(['judul', 'kategori', 'isi']);
    }
    /*
    #[Test]
  
    public function it_validates_required_fields_when_updating()
    {
        $profil = ProfilSekolah::factory()->create();

        $response = $this->actingAs($this->user)
            ->put(route('profil.update', $profil->id), []);

        $response->assertSessionHasErrors(['judul', 'kategori', 'isi']);
    }
        */
}
