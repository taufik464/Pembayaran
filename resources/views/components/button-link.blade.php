@props([
'href' => '#',
'color' => 'green',
'size' => 'md',
])

@php
$baseClasses = "inline-flex items-center justify-center gap-2 font-medium text-white rounded-lg focus:ring-4 focus:outline-none text-center";

$colorClasses = match($color) {
'green' => "bg-green-500 hover:bg-green-600 focus:ring-green-300",
'blue' => "bg-blue-600 hover:bg-blue-700 focus:ring-blue-300",
'red' => "bg-red-500 hover:bg-red-600 focus:ring-red-300",
default => "bg-gray-500 hover:bg-gray-600 focus:ring-gray-300",
};

$sizeClasses = match($size) {
'sm' => "px-3 py-1.5 text-sm",
'md' => "px-5 py-2.5 text-sm",
'lg' => "px-6 py-3 text-base",
default => "px-5 py-2.5 text-sm",
};
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => "$baseClasses $colorClasses $sizeClasses"]) }}>
    {{ $slot }}
</a>