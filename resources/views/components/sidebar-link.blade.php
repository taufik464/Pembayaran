@props(['href' => '#', 'icon' => '', 'active' => false])


<a href="{{ $href }}" class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-primary hover:text-white dark:hover:bg-gray-700 group {{ $active ? 'bg-primary text-white dark:bg-primary dark:text-white' : '' }}">
    @if(Str::startsWith($icon, 'fa'))
        <i class="{{ $icon }} text-xl w-6 h-6{{ $active ? 'text-white' : 'text-gray-400 dark:text-gray-400' }}"></i>
    @else
        <svg class="text-white shrink-0 w-5 h-5 transition duration-75 text-white group-hover:text-white dark:group-hover:text-white {{ $active ? 'text-white fill-white' : 'text-gray-400 dark:text-gray-400' }}" xmlns="http://www.w3.org/2000/svg" fill="{{ $active ? 'white' : 'currentColor' }}" viewBox="0 0 20 18">
            {!! $icon !!}
        </svg>
    @endif
    <span class="flex-1 ml-3 ms-3 whitespace-nowrap">{{ $slot }}</span>
</a>