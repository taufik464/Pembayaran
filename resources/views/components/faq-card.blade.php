@props(['question', 'answer', 'editUrl' => '#', 'hapusUrl' => '#'])
<div class="border border-gray-300 rounded-lg p-4">
    <h3 class="text-lg font-semibold mb-2">{{ $question }}</h3>
    <p class="text-gray-700">{{ $answer }}</p>
    <div class="mt-4 flex justify-end space-x-2">
        <a href="{{ $editUrl }}" class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Edit</a>
        <form action="{{ $hapusUrl }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus FAQ ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded-lg">Hapus</button>
        </form>
    </div>
</div>


