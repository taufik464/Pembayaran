<x-app-layout>
    <div class="flex min-h-screen bg-gray-100 relative">
        {{-- Sidebar (sudah punya tombol dan animasi di dalamnya) --}}
        @include('layouts.sidebar')

        {{-- Konten utama --}}
        <main class="flex-1 p-6 h-full overflow-auto">
            @yield('content')
        </main>
    </div>
</x-app-layout>
