<?php

namespace Tests\Feature\admin;

use App\Models\Kontak;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class KontakControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        // Create a user for actingAs
        $this->user = User::factory()->create(['role' => 'superadmin']);    }

    /** @test */
    public function index_page_can_be_loaded()
    {
        $response = $this->actingAs($this->user)
            ->get(route('admin.kontak'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.kontak.index');
    }

    /** @test */
    public function create_page_can_be_loaded()
    {
        $response = $this->actingAs($this->user)
            ->get(route('admin.kontak.create'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.kontak.create');
    }

    /** @test */
    public function it_can_store_kontak_with_image_and_link()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('test.jpg');

        $response = $this->actingAs($this->user)
            ->post(route('admin.kontak.store'), [
                'nama' => 'WhatsApp Admin',
                'image' => $file,
                'link' => 'https://wa.me/62812345678'
            ]);

        $this->assertDatabaseHas('kontaks', [
            'nama' => 'WhatsApp Admin',
            'link' => 'https://wa.me/62812345678'
        ]);

        $this->assertTrue(Storage::disk('public')->exists('kontak/' . $file->hashName()));

        $response->assertRedirect(route('admin.kontak'));
    }

    /** @test */
    public function it_requires_link_or_nomor()
    {
        $response = $this->actingAs($this->user)
            ->post(route('admin.kontak.store'), [
                'nama' => 'Test Gagal'
            ]);

        $response->assertSessionHasErrors(['link', 'nomor']);
    }

    /** @test */
    public function edit_page_can_be_loaded()
    {
        Storage::fake('public');

        $oldImage = UploadedFile::fake()->image('old.jpg');
        $oldImagePath = $oldImage->store('kontak', 'public');

        $kontak = Kontak::create([
            'nama' => 'Admin Test',
            'image' => $oldImagePath, // jangan null
            'link' => 'test',
            'nomor' => null
        ]);

        $response = $this->actingAs($this->user)
            ->get(route('admin.kontak.edit', $kontak->id));

        $response->assertStatus(200);
        $response->assertViewIs('admin.kontak.edit');
        $response->assertViewHas('kontak', function ($viewKontak) use ($kontak) {
            return $viewKontak->id === $kontak->id;
        });
    }

    /** @test */
    public function it_can_update_kontak_and_replace_image()
    {
        Storage::fake('public');

        $oldFile = UploadedFile::fake()->image('old.jpg');
        $oldPath = $oldFile->store('kontak', 'public');

        $kontak = Kontak::create([
            'nama' => 'Admin Lama',
            'image' => $oldPath,
            'link' => 'lama',
            'nomor' => null
        ]);

        $newFile = UploadedFile::fake()->image('new.jpg');

        $response = $this->actingAs($this->user)
            ->put(route('admin.kontak.update', $kontak->id), [
                'nama' => 'Admin Baru',
                'image' => $newFile,
                'link' => 'baru',
                'nomor' => null
            ]);

        $this->assertDatabaseHas('kontaks', [
            'id' => $kontak->id,
            'nama' => 'Admin Baru',
            'link' => 'baru'
        ]);

        $this->assertFalse(Storage::disk('public')->exists($oldPath));
        $this->assertTrue(Storage::disk('public')->exists('kontak/' . $newFile->hashName()));

        $response->assertRedirect(route('admin.kontak'));
    }
   
    /** @test */
    public function it_can_delete_kontak_and_image()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('delete.jpg');

        $path = $file->store('kontak', 'public');

        $kontak = Kontak::create([
            'nama' => 'Admin Hapus',
            'image' => $path,
            'link' => 'hapus',
            'nomor' => null
        ]);

        $this->assertTrue(Storage::disk('public')->exists($path));

        $response = $this->actingAs($this->user)
            ->delete(route('admin.kontak.destroy', $kontak->id));

        $this->assertDatabaseMissing('kontaks', [
            'id' => $kontak->id
        ]);

        $this->assertFalse(Storage::disk('public')->exists($path));

        $response->assertRedirect(route('admin.kontak'));
    }
}
