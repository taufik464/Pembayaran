<?php

namespace Tests\Feature\admin;

use App\Models\IdentitasSekolah;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class IdentitasSekolahControllerTest extends TestCase
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
        $response = $this->actingAs($this->user)->get(route('admin.identitas.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.identitas.index');
        $response->assertViewHas('identitas');
    }

   #[Test]
    public function it_can_store_identitas_with_logo()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('logo.jpg');

        $response = $this->actingAs($this->user)->post(route('admin.identitas.store'), [
            'nama_sekolah' => 'SD Test',
            'npsn' => '12345678',
            'alamat' => 'Jl. Contoh No.1',
            'telepon' => '08123456789',
            'email' => 'sdtest@example.com',
            'website' => 'https://sdtest.example.com',
            'jam_operasi' => '08:00-15:00',
            'logo' => $file,
        ]);

        // Pastikan data tersimpan di database
        $this->assertDatabaseHas('identitas_sekolahs', [
            'nama_sekolah' => 'SD Test',
            'npsn' => '12345678',
        ]);

        $identitas = IdentitasSekolah::first();

        // Pastikan file tersimpan di storage
        $this->assertTrue(Storage::disk('public')->exists($identitas->logo));

        $response->assertRedirect(route('admin.identitas.index'));
    }

  
}
