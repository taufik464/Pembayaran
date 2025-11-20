<?php

use App\Models\Category;
use App\Models\Information;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\informasi\informationController;





// Menggunakan RefreshDatabase pada level file/suite
uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

beforeEach(function () {
// 1. Fake Storage
Storage::fake('public');

// 2. Buat Kategori dan Informasi awal
$this->validCategory = Category::factory()->create();
$this->informasi = Information::create([
'title' => 'Judul Lama',
'content' => 'Konten Lama',
'category_id' => $this->validCategory->id,
]);
});


test(' Menampilkan daftar informasi yang kosong', function () {
    $user = User::factory()->create(['role' => 'superadmin']); // Atau 'staff'
    // Arrange: Ensure database is empty
    Information::query()->delete();
    // Act & Assert: Access the page and check for empty message
    $this->actingAs($user)
        ->get(route('admin.informasi')) // Pastikan route name sesuai (misalnya 'admin.informasi.index')
        ->assertStatus(200)
        ->assertSee('Belum ada informasi sekolah.'); // Match dengan pesan di HTML view
});

test('Menampilkan daftar informasi 3 data', function (){
    $user = User::factory()->create(['role' => 'superadmin']);
    $this->actingAs($user)

        ->get(route('admin.informasi'))
        ->assertStatus(200);
});

test('dapat menampilkan halaman tambah informasi sekolah', function(){
   $user = User::factory()->create(['role' => 'superadmin']);
    $this->actingAs($user)

        ->get(route('admin.informasi.create'))
        ->assertStatus(200);
});

test('menambah data informasi dengan benar', function(){
    test('menambah data informasi dengan benar', function () {
        // Data valid untuk request
        $validatedData = [
            'judul' => 'Judul Informasi Baru',
            'konten' => 'Konten informasi yang lengkap.',
            'kategori_id' => 1, // Asumsikan kategori dengan ID 1 ada
        ];
        // Mock Request
        $request = mock(Request::class);
        $request->shouldReceive('validate')->andReturn($validatedData);
        $request->shouldReceive('hasFile')->with('images')->andReturn(false); // Asumsikan tanpa gambar untuk test ini
        // Mock Information model
        $information = mock(Information::class);
        $information->id = 1; // Simulasi ID yang dihasilkan
        Information::shouldReceive('create')->with([
            'title' => 'Judul Informasi Baru',
            'content' => 'Konten informasi yang lengkap.',
            'category_id' => 1,
        ])->andReturn($information);
        // Instansiasi controller dan panggil method store
        $controller = new InformationController();
        $response = $controller->store($request);
        // Assert bahwa response adalah redirect ke route admin.informasi
        expect($response)->toBeInstanceOf(\Illuminate\Http\RedirectResponse::class);
        expect($response->getTargetUrl())->toBe(route('admin.informasi'));
        // Assert bahwa session memiliki pesan sukses
        expect(session('success'))->toBe('Informasi berhasil ditambahkan.');
    });
});

test('admin dapat menampilkan halaman edit informasi sekolah', function () {
    // 1. ARRANGE (Persiapan data dan user)

    // Asumsi: Anda memiliki User Factory
    $user = User::factory()->create(['role' => 'superadmin']);

    // Asumsi: Anda memiliki Information Factory. Buat satu record untuk diedit.
    $informasi = App\Models\Information::factory()->create([
        'title' => 'Judul Lama untuk Edit'
    ]);

    // 2. ACT (Aksi)
    // Berperan sebagai user dan akses route edit dengan ID informasi
    $response = $this->actingAs($user)
        ->get(route('admin.informasi.edit', $informasi->id));

    // 3. ASSERT (Verifikasi)

    // Memastikan status HTTP 200 (OK)
    $response->assertStatus(200);

    // Memastikan halaman tersebut memuat view yang benar (opsional)
    // $response->assertViewIs('admin.informasi.edit');

    // Memastikan konten lama muncul di halaman (verifikasi bahwa data dimuat)
    $response->assertSee('Judul Lama untuk Edit');
});

