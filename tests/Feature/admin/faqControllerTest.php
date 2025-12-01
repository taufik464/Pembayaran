<?php

namespace Tests\Feature\admin;

use App\Models\Faq;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class FaqControllerTest extends TestCase
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
            ->get(route('admin.faq'));

        $response->assertStatus(200)
            ->assertViewIs('admin.faq.index')
            ->assertViewHas('faqs');
    }

    #[Test]
    public function create_page_can_be_loaded()
    {
        $response = $this->actingAs($this->user)
            ->get(route('admin.faq.create'));

        $response->assertStatus(200)
            ->assertViewIs('admin.faq.create');
    }

    #[Test]
    public function it_can_store_faq()
    {
        $data = [
            'question' => 'Apa itu Laravel?',
            'answer' => 'Laravel adalah framework PHP.'
        ];

        $response = $this->actingAs($this->user)
            ->post(route('admin.faq.store'), $data);

        $this->assertDatabaseHas('faqs', $data);

        $response->assertRedirect(route('admin.faq'));
    }

    #[Test]
    public function it_validates_question_and_answer_when_storing()
    {
        $response = $this->actingAs($this->user)
            ->post(route('admin.faq.store'), []);

        $response->assertSessionHasErrors(['question', 'answer']);
    }

    #[Test]
    public function edit_page_can_be_loaded()
    {
        $faq = Faq::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('admin.faq.edit', $faq->id));

        $response->assertStatus(200)
            ->assertViewIs('admin.faq.edit')
            ->assertViewHas('faq', function ($viewFaq) use ($faq) {
                return $viewFaq->id === $faq->id;
            });
    }

    #[Test]
    public function it_can_update_faq()
    {
        $faq = Faq::factory()->create();

        $data = [
            'question' => 'Pertanyaan baru',
            'answer' => 'Jawaban baru'
        ];

        $response = $this->actingAs($this->user)
            ->put(route('admin.faq.update', $faq->id), $data);

        $this->assertDatabaseHas('faqs', array_merge(['id' => $faq->id], $data));

        $response->assertRedirect(route('admin.faq'));
    }

    #[Test]
    public function it_validates_question_and_answer_when_updating()
    {
        $faq = Faq::factory()->create();

        $response = $this->actingAs($this->user)
            ->put(route('admin.faq.update', $faq->id), []);

        $response->assertSessionHasErrors(['question', 'answer']);
    }

    #[Test]
    public function it_can_delete_faq()
    {
        $faq = Faq::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('admin.faq.destroy', $faq->id));

        $this->assertDatabaseMissing('faqs', ['id' => $faq->id]);

        $response->assertRedirect(route('admin.faq'));
    }
}
