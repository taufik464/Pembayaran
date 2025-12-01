<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\GalleryInformasi;
use App\Models\Information;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InformationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    public function it_can_create_information()
    {
        $category = Category::create([
            'name' => 'Teknologi'
        ]);

        $information = Information::create([
            'category_id' => $category->id,
            'title'       => 'Judul Informasi',
            'content'     => 'Isi informasi'
        ]);

        $this->assertDatabaseHas('information', [
            'title' => 'Judul Informasi',
            'content' => 'Isi informasi'
        ]);
    }

    /** @test */
    public function it_has_correct_fillable_fields()
    {
        $information = new Information();

        $this->assertEquals([
            'category_id',
            'title',
            'content',
            'image_path'
        ], $information->getFillable());
    }

    /** @test */
    public function it_belongs_to_category()
    {
        $category = Category::create([
            'name' => 'Pendidikan'
        ]);

        $information = Information::create([
            'category_id' => $category->id,
            'title' => 'Relasi Test',
            'content' => 'Test relasi'
        ]);

        $this->assertInstanceOf(
            Category::class,
            $information->category
        );
    }

    /** @test */
    public function it_has_many_gallery_informasis()
    {
        $category = Category::create([
            'name' => 'Sosial'
        ]);

        $information = Information::create([
            'category_id' => $category->id,
            'title' => 'Test Gallery',
            'content' => 'Testing relasi gallery'
        ]);

        // Buat 2 data gallery untuk 1 informasi
        GalleryInformasi::create([
            'information_id' => $information->id,
            'image_path' => 'images/1.jpg'
        ]);

        GalleryInformasi::create([
            'information_id' => $information->id,
            'image_path' => 'images/2.jpg'
        ]);

        $this->assertCount(2, $information->galleryInformasis);

        $this->assertInstanceOf(
            GalleryInformasi::class,
            $information->galleryInformasis->first()
        );
    }
}
