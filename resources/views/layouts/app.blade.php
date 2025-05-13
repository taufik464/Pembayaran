<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans antialiased bg-gray-200">

    @include('layouts.navigation')

    @include('layouts.sidebar')


    <!-- Page Heading -->
    <div class="p-4 mt-10 sm:ml-64">
        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white mt-4 dark:bg-gray-800 shadow rounded-lg">
            <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>


        </header>
        @endisset

        <!-- Page Content -->
        <main class="bg-white dark:bg-gray-800 shadow rounded-lg mt-4">

            {{ $slot }}
        </main>

    </div>

</body>

</html>