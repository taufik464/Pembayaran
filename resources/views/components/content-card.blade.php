@props(['image', 'judul', 'isi', 'views', 'tanggal'])


<div class="flex justify-between items-center mt-2 mb-4 bg-gray-100 p-2 rounded">
    <div class="flex items-center space-x-4">
        <div class="bg-white p-1 rounded-md shadow-md">
            <img src="{{ $image ?? asset('images/image.png') }}"
                alt="Contoh Gambar"
                class="w-24 h-24 object-cover rounded">
        </div>
        <div>
            <p class="text-lg font-medium">{{ $judul ?? 'Judul Konten' }}</p>
            <p class="text-gray-600">
                {{ $isi ?? 'lorem ipsum dolor sit amet, consectetur adipiscing elit,' }}
            </p>
        </div>
    </div>
    <div class="text-right">
        <span class="ml-1 text-green-600 text-xs font-semibold">public</span>
        <p class="font-bold flex items-center justify-end gap-1">
            {{ $views ?? 0 }}
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0c0 5-7 9-9 9s-9-4-9-9 7-9 9-9 9 4 9 9z" />
            </svg>
        </p>
        <p class="text-gray-500 text-sm">{{ $tanggal ?? '-' }}</p>
    </div>
</div>