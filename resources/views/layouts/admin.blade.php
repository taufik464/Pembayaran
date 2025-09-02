<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">
        @include('layouts.sidebar')
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @stack('scripts')
</x-app-layout>