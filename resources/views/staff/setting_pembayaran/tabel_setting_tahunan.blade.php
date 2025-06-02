@if($kelas)
<div class="overflow-x-auto">
    <h2 class="text-lg font-semibold mb-2">Data Kelas</h2>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
            <tr>
                <th class="px-4 py-2 text-center"><input type="checkbox" id="checkAll"></th>
                <th class="px-4 py-2">Nama Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $k)
            <tr class="border-b dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700">
                <td class="text-center px-4 py-2">
                    <input type="checkbox" name="siswa[]" value="{{ $k->id }}" class="siswa-checkbox">
                </td>
                <td class="px-4 py-2">{{ $k->nama }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@elseif($siswa)
<div class="overflow-x-auto">
    <h2 class="text-lg font-semibold mb-2">Data Siswa</h2>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
            <tr>
                <th class="px-4 py-2 text-center"><input type="checkbox" id="checkAll"></th>
                <th class="px-4 py-2">NIS</th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $s)
            <tr class="border-b dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700">
                <td class="text-center px-4 py-2">
                    <input type="checkbox" name="siswa[]" value="{{ $s->nis }}" class="siswa-checkbox">
                </td>
                <td class="px-4 py-2">{{ $s->nis }}</td>
                <td class="px-4 py-2">{{ $s->nama }}</td>
                <td class="px-4 py-2">{{ $s->kelas->nama }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<p class="text-gray-500 py-4">Tidak ada data ditemukan.</p>
@endif