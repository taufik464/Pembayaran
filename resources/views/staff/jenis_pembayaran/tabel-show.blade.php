@if($bulanan && $bulanan->count())
<div class="table-responsive">
    <table class="w-full text-left border border-gray-200 rounded">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2">NIS</th>
                <th class="px-4 py-2">Kelas</th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Nominal</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bulanan as $item)
            <tr class="border-t">
                <td class="px-2 py-2">{{ $item->siswa->nis }}</td>
                <td class="px-2 py-2">{{ $item->siswa->kelas->nama }}</td>
                <td class="px-2 py-2">{{ $item->siswa->nama }}</td>
                <td class="px-2 py-2">{{ $item->harga }}</td>
                <td class="px-2 py-2">{{ $item->status }}</td>
                <td class="px-2 py-2 relative" x-data="{ open: false }">
                    <button @click="open = !open" class="text-gray-600 hover:text-black focus:outline-none">
                        &#8942; <!-- Tiga titik vertikal -->
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-36 bg-white border rounded shadow-md">
                        <a href="{{ route('setting-bulanan.show', $item->siswa_id) }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Detail</a>
                        <a href="#" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Edit</a>
                        <form action="#" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@elseif($tahunan && $tahunan->count())
<div class="table-responsive">
    <table class="w-full text-left border border-gray-200 rounded">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2">NIS</th>
                <th class="px-4 py-2">Kelas</th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Nominal</th>
                <th class="px-4 py-2">Sudah dibayar</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tahunan as $item)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $item->siswa->nis }}</td>
                <td class="px-4 py-2">{{ $item->siswa->kelas->nama }}</td>
                <td class="px-4 py-2">{{ $item->siswa->nama }}</td>
                <td class="px-4 py-2">{{ $item->harga }}</td>
                <td class="px-4 py-2">0</td>
                <td class="px-4 py-2">lunas / tidak lunas</td>
                <td class="px-2 py-2 relative" x-data="{ open: false }">
                    <button @click="open = !open" class="text-gray-600 hover:text-black focus:outline-none">
                        &#8942; <!-- Tiga titik vertikal -->
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-36 bg-white border rounded shadow-md">
                        <a href="{{ route('setting-tahunan.show', $item->id) }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Detail</a>
                        <a href="{{ route('setting-tahunan.edit', $item->id) }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Edit</a>
                        <form action="{{ route('setting-tahunan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Hapus</button>
                        </form>
                    </div>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<p>Data tidak tersedia</p>
@endif