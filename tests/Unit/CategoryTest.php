<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Information;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_category()
    {
        $category = Category::create([
            'name' => 'Teknologi'
        ]);

        $this->assertDatabaseHas('categories', [
            'name' => 'Teknologi'
        ]);
    }

    #[Test]
    public function it_has_correct_fillable_fields()
    {
        $category = new Category();

        $this->assertEquals([
            'name'
        ], $category->getFillable());
    }

    #[Test]
    public function it_has_many_informations()
    {
        $category = Category::create([
            'name' => 'Pendidikan'
        ]);

        // Buat 2 data information yang terhubung ke category
        $info1 = Information::create([
            'category_id' => $category->id,
            'title' => 'Info 1',
            'content' => 'Isi informasi pertama'
        ]);

        $info2 = Information::create([
            'category_id' => $category->id,
            'title' => 'Info 2',
            'content' => 'Isi informasi kedua'
        ]);

        $this->assertCount(2, $category->informations);
        $this->assertInstanceOf(Information::class, $category->informations->first());
    }
}
