<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">
        <div class="sticky top-0 h-screen">
            @include('layouts.sidebar')
        </div>
        <main class="flex-1 p-6 h-full overflow-auto">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @stack('scripts')
</x-app-layout>