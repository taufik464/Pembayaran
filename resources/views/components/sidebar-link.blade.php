@props(['href' => '#', 'icon' => '', 'active' => false])


<a href="{{ $href }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-primary hover:text-white dark:hover:bg-gray-700 group {{ $active ? 'bg-primary dark:bg-primary' : '' }}">
    <svg class=" shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
        {!! $icon !!} </svg>
    <span class="flex-1 ms-3 whitespace-nowrap">{{ $slot }}</span>
</a>