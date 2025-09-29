@props([
'nama',
'image' => asset('images/default-kontak.jpg'),
'link' => '#',
'nomor' => '',
'editUrl',
'hapusUrl' => '#',
])

<div class="bg-white rounded-xl shadow-md hover:shadow-xl transition transform hover:-translate-y-2 p-4 flex items-center space-x-4">
    <img src="{{ $image }}" alt="{{ $nama }}" class="w-16 h-16 rounded-full object-cover">
    <div class="flex-1">
        <h3 class="text-blue-600 font-bold text-lg">{{ $nama }}</h3>
        @if($nomor)
        <p class="text-gray-500 text-sm">Nomor: {{ $nomor }}</p>
        @endif
        @if($link)
        <a href="{{ $link }}" target="_blank" class="text-blue-500 text-sm hover:underline">Kunjungi Link</a>
        @endif
    </div>
    <div class="flex space-x-2">
        <a href="{{ $editUrl }}" class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded">Edit</a>
        <form action="{{ $hapusUrl }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded">Hapus</button>
        </form>
    </div>
</div>
