@props(['title', 'breadcrumb'])


    <div class="bg-white p-5 rounded-lg shadow mb-5">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-green-800">{{ $title }}</h1>
                <p class="text-gray-600">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse mt-1">
                        <li class="inline-flex items-center">
                            <a href="/dashboard" class="inline-flex items-center text-xs font-medium text-gray-700 dark:text-gray-700 hover:text-blue-600 dark:hover:text-blue-400">
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        @foreach ($breadcrumb as $item)
                        <li>
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 dark:text-gray-300 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <a href="{{ $item['url'] }}" class="ms-1 text-xs font-medium text-gray-700 dark:text-gray-700 hover:text-blue-600 dark:hover:text-blue-400 md:ms-2">{{ $item['label'] }}</a>
                            </div>
                        </li>
                        @endforeach
                    </ol>
                </nav>
                </p>
            </div>
            <a href="login.html" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
        </div>
    </div>



