@props(['image', 'judul', 'isi', 'editUrl', 'hapusUrl'])

<div class="flex justify-between items-center mt-2 mb-4 bg-gray-100 p-2 rounded relative">
    <div class="flex items-center space-x-4">
        <div class="bg-white p-1 rounded-md shadow-md">
            <img src="{{ $image ?? asset('images/image.png') }}"
                alt="Contoh Gambar"
                class="min-w-24 max-w-24 h-24 object-cover rounded">
        </div>
        <div>
            <p class="text-lg font-medium">{{ $judul ?? 'Judul Konten' }}</p>
            <p class="text-gray-600">
                {{ \Illuminate\Support\Str::limit($isi ?? 'lorem ipsum dolor sit amet, consectetur adipiscing elit,', 100, '...') }}
            </p>
        </div>
    </div>

    <div x-data="{ open: false }" class="relative self-start m-1">
        <button @click="open = !open" type="button">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="6" r="1.5" />
                <circle cx="12" cy="12" r="1.5" />
                <circle cx="12" cy="18" r="1.5" />
            </svg>
        </button>
        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-28 bg-white border rounded shadow-lg z-10" x-cloak>
            <a href="{{ $editUrl }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Edit</a>
            <form action="{{ $hapusUrl }}" method="POST" onsubmit="return confirm('Yakin mau hapus data ini?')" class="block">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                    Hapus
                </button>
            </form>
        </div>
    </div>




</div>