<x-guest-layout>

    <div class="bg-white text-gray-800">
        @include('layouts.navbar')

        <main>
            @yield('content')
        </main>

        @include('layouts.footer')

        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        @stack('scripts')
</div>
</x-guest-layout>