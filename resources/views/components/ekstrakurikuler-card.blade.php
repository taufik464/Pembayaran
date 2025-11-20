@props(['image', 'title', 'desc'])

<div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition">
    <img src="{{ $image }}"
        alt="Ekstrakurikuler {{ $title }}"
        class="w-full h-40 object-cover mb-4 rounded-lg">

    <h4 class="text-center font-bold text-xl mb-2 text-gray-800">{{ $title }}</h4>

    <p class=" ql-editor text-gray-600 text-sm">
        {{ \Illuminate\Support\Str::limit($desc, 150, '...') }}
    </p>
</div>