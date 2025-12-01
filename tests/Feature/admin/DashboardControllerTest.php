<?php

namespace Tests\Feature\admin;

use App\Models\GalleryInformasi;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Test;

class DashboardControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Buat user untuk login
        $this->user = User::factory()->create(['role' => 'superadmin']);
    }

    #[Test]
    public function dashboard_page_can_be_loaded()
    {
        $response = $this->actingAs($this->user)
            ->get(route('dashboard'));

        $response->assertStatus(200)
            ->assertViewIs('admin.dashboard') // pastikan view benar
            ->assertViewHasAll(['jumgaleri', 'totalVisitors']);
    }

    #[Test]
    public function dashboard_displays_correct_gallery_count()
    {


        GalleryInformasi::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('dashboard'));

        $response->assertStatus(200);

        $this->assertEquals(5, $response->viewData('jumgaleri'));
    }

    #[Test]
    public function dashboard_displays_total_visitors_from_cache()
    {
        cache()->forget('total_visitors');
        cache()->put('total_visitors', 150);

        $response = $this->actingAs($this->user)
            ->get(route('dashboard'));

        $response->assertStatus(200);

        $this->assertEquals(150, $response->viewData('totalVisitors'));
    }
}
