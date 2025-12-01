<?php

namespace Tests\Feature;

use App\Models\Kontak;
use App\Models\IdentitasSekolah;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LayananTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function kontak_page_can_be_loaded()
    {
        // Buat data dummy
        $identitas = IdentitasSekolah::factory()->create([
            'nama_sekolah' => 'Sekolah Test',
        ]);

        $kontak = Kontak::factory()->count(3)->create();

        // Akses halaman
        $response = $this->get('/layanan/kontak'); // sesuaikan URL jika berbeda

        $response->assertStatus(200)
            ->assertViewIs('layanan.kontak')
            ->assertViewHas('identitas', function ($viewIdentitas) use ($identitas) {
                return $viewIdentitas->id === $identitas->id;
            })
            ->assertViewHas('kontaks', function ($viewKontaks) use ($kontak) {
                return $viewKontaks->count() === 3;
            });
    }
}
