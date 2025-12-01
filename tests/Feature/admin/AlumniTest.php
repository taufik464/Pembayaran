<?php

namespace Tests\Feature;

use App\Models\Alumni;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase; // Menggunakan base TestCase dari proyek Anda
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlumniTest extends TestCase
{

    use RefreshDatabase;


    protected $user;
    protected $alumni;

    /**
     * Set up the environment before each test method is executed.
     */
    protected function setUp(): void
    {
        // Panggil parent::setUp() terlebih dahulu
        parent::setUp();

        // 1. Fake storage
        Storage::fake('public');

        // 2. Buat user superadmin untuk testing
        $this->user = User::factory()->create(['role' => 'superadmin']);

        // 3. Buat alumni awal
        $this->alumni = Alumni::create([
            'nama' => 'Ilfan Syahputra',
            'tahun_lulus' => 2020,
            'kuliah' => 'Teknik Informatika',
            'tempat_kuliah' => 'Universitas A',
            'pekerjaan' => 'Programmer',
            'tempat_kerja' => 'PT ABC',
            'pesan' => 'Semoga sukses',
            'foto' => null,
        ]);
    }

    /**
     * Test case untuk menampilkan daftar alumni (route index).
     */
    public function test_menampilkan_daftar_alumni()
    {
        $response = $this->actingAs($this->user)
            ->get(route('admin.alumni'));

        $response->assertStatus(200);
        $response->assertSee('Ilfan Syahputra');
    }
    
    public function it_can_show_edit_profile_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('admin.profile.edit'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.profile.edit');
        $response->assertViewHas('user');
    }

    /**
     * Test case untuk menambah alumni baru (route store).
     */
    public function test_menambah_alumni_baru()
    {
        $data = [
            'nama' => 'ika nurul',
            'tahun_lulus' => 2023,
            'kuliah' => 'Sistem Informasi',
            'tempat_kuliah' => 'Universitas B',
            'pekerjaan' => 'Designer',
            'tempat_kerja' => 'PT XYZ',
            'pesan' => 'Semangat selalu',
            'foto' => UploadedFile::fake()->image('foto.jpg'),
        ];


        $response = $this->actingAs($this->user)
            ->post(route('admin.alumni.store'), $data);
        // mamastikan dikembalikan ke halaman alumni
        $response->assertRedirect(route('admin.alumni'));
        //meastikan pesan sukses
        $response->assertSessionHas('success', 'Alumni created successfully.');
    }

    /**
     * Test case untuk menampilkan halaman edit alumni (route edit).
     */
    public function test_menampilkan_halaman_edit_alumni()
    {
        $response = $this->actingAs($this->user)
            ->get(route('admin.alumni.edit', $this->alumni->id));

        $response->assertStatus(200);
        $response->assertSee('Ilfan Syahputra');
    }

    /**
     * Test case untuk memperbarui data alumni (route update).
     */
    public function test_update_alumni()
    {
        $data = [
            'nama' => 'Ilfan Syahputra Updated',
            'tahun_lulus' => 2021,
            'kuliah' => 'Teknik Elektro',
            'tempat_kuliah' => 'Universitas C',
            'pekerjaan' => 'Engineer',
            'tempat_kerja' => 'PT DEF',
            'pesan' => 'Tetap semangat',
            'foto' => UploadedFile::fake()->image('update.jpg'),
        ];

        $response = $this->actingAs($this->user)
            ->put(route('admin.alumni.update', $this->alumni->id), $data);

        $response->assertRedirect(route('admin.alumni'));
        $this->assertDatabaseHas('alumnis', ['id' => $this->alumni->id, 'nama' => 'Ilfan Syahputra Updated']);
        $response->assertSessionHas('success', 'Alumni updated successfully.');
    }

    /**
     * Test case untuk menghapus alumni (route destroy).
     */
    public function test_hapus_alumni()
    {
        $response = $this->actingAs($this->user)
            ->delete(route('admin.alumni.destroy', $this->alumni->id));

        $response->assertRedirect(route('admin.alumni'));
        $response->assertSessionHas('success', 'Alumni deleted successfully.');
        $this->assertDatabaseMissing('alumnis', ['id' => $this->alumni->id]);
    }
}
