<div class="bg-gray-100 rounded-lg shadow p-4 mb-4 flex flex-col md:flex-row items-center">
	<div class="w-full md:w-1/4 flex-shrink-0 mb-4 md:mb-0">
		<img src="{{ $image }}" alt="Gambar Galeri" class="w-full h-32 object-cover rounded-lg border">
	</div>
	<div class="md:ml-6 w-full">
		<h3 class="text-lg font-bold mb-2">{{ $judul }}</h3>
		<p class="text-gray-700 mb-2">{{ $isi }}</p>
		@if(!empty($tanggal))
		<p class="text-sm text-gray-500 mb-2"><i class="fas fa-calendar-alt"></i> {{ $tanggal }}</p>
		@endif
		<div class="flex space-x-2 mt-2">
			<a href="{{ $editUrl }}" class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded">Edit</a>
			<form action="{{ $hapusUrl }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
				@csrf
				@method('DELETE')
				<button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded">Hapus</button>
			</form>
		</div>
	</div>
</div>
