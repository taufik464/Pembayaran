<?php

namespace Tests\Feature;

use App\Models\Information;
use App\Models\Category;
use App\Models\GalleryInformasi;
use App\Models\Alumni;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class InformasiControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    /*  public function it_can_get_categories()
    {
        Category::factory()->create(['name' => 'Berita']);
        Category::factory()->create(['name' => 'Pengumuman']);

        $response = $this->get('/informasi/categories'); // sesuaikan route

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Berita'])
            ->assertJsonFragment(['name' => 'Pengumuman']);
    }*/
    

    /** @test */
    /*public function it_can_show_informations_by_category_with_keyword()
    {
        $category = Category::factory()->create(['name' => 'Berita']);
        $info1 = Information::factory()->create([
            'category_id' => $category->id,
            'title' => 'Judul Laravel',
            'content' => 'Konten Laravel'
        ]);
        $info2 = Information::factory()->create([
            'category_id' => $category->id,
            'title' => 'Judul PHP',
            'content' => 'Konten PHP'
        ]);

        $response = $this->get('/informasi/kategori/Berita?keyword=Laravel');

        $response->assertStatus(200)
            ->assertViewIs('informasi.informasi')
            ->assertViewHas('informasi', function ($viewData) use ($info1) {
                return $viewData->contains($info1);
            });
    } */

    #[Test]
    public function it_can_show_information_detail()
    {
        $information = Information::factory()->create();

        $response = $this->get('/informasi/' . $information->id);

        $response->assertStatus(200)
            ->assertViewIs('informasi.show')
            ->assertViewHas('informasi', function ($viewData) use ($information) {
                return $viewData->id === $information->id;
            });
    }

    /** @test */
    public function it_can_load_gallery_page()
    {
        GalleryInformasi::factory()->count(3)->create();

        $response = $this->get('/informasi/gallery');

        $response->assertStatus(200)
            ->assertViewIs('informasi.gallery')
            ->assertViewHas('galleries');
    }

    /** @test */
    public function it_can_load_alumni_page()
    {
        Alumni::factory()->count(5)->create();

        $response = $this->get('informasi/');

        $response->assertStatus(200)
            ->assertViewIs('informasi.alumni')
            ->assertViewHas('alumni');
    }
}
