<?php

namespace Tests\Unit;

use App\Models\GalleryInformasi;
use App\Models\Information;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;


class GalleryInformasiTest extends TestCase
{
    use RefreshDatabase;

   

    protected function setUp(): void
    {
        parent::setUp();
        // Additional setup if needed

        $category = \App\Models\Category::create([
            'name' => 'Kategori Test'
        ]);

        $information = Information::create([
            'title' => 'Test Informasi',
            'content' => 'Ini isi informasi',
            'category_id' => $category->id,

        ]);
    }
    public function it_can_create_gallery_informasi()
    {
        $information = Information::first();

        $gallery = GalleryInformasi::create([
            'information_id' => $information->id,
            'image_path' => 'images/test.jpg'
        ]);

        $this->assertDatabaseHas('gallery_informasis', [
            'id' => $gallery->id,
            'information_id' => $information->id,
            'image_path' => 'images/test.jpg'
        ]);
    }

    #[test]
    public function it_belongs_to_information()
    {
        $information = Information::first();

        $gallery = GalleryInformasi::create([
            'information_id' => $information->id,
            'image_path' => 'images/relasi.jpg'
        ]);

        $this->assertInstanceOf(
            Information::class,
            $gallery->information
        );
    }

    #[Test]
    public function it_has_correct_fillable_fields()
    {
        $gallery = new GalleryInformasi();

        $this->assertEquals([
            'information_id',
            'image_path'
        ], $gallery->getFillable());
    }
}
