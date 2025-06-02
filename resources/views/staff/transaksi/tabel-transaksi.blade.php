@if (!empty($bulanan))
<div id="table-bulanan" class="table-content" style="display:none;">
    <h3 class="font-semibold mb-2">Pembayaran Bulanan</h3>
    <table class="w-full text-sm border">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Nominal</th>
                <th class="px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bulanan as $item)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                <td class="px-4 py-2">{{ $item->jenisPembayaran->nama }} - {{ $item->nama_bulan }}</td>
                <td class="px-4 py-2">Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                <td class="px-4 py-2">{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@elseif (!empty($tahunan))
<div id="table-tahunan" class="table-content" style="display:none;">
    <h3 class="font-semibold mb-2">Pembayaran Tahunan</h3>
    <table class="w-full text-sm border">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Nominal</th>
                <th class="px-4 py-2">Dibayar</th>
                <th class="px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tahunan as $item)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                <td class="px-4 py-2">{{ $item->jenisPembayaran->nama }}</td>
                <td class="px-4 py-2">Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                <td class="px-4 py-2">Rp{{ number_format($item->dibayar, 0, ',', '.') }}</td>
                <td class="px-4 py-2">{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@elseif (!empty($tambahan))
<div id="table-tambahan" class="table-content" style="display:none;">
    <h3 class="font-semibold mb-2">Pembayaran Tambahan</h3>
    <table class="w-full text-sm border">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Nominal</th>
                <th class="px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tambahan as $item)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                <td class="px-4 py-2">{{ $item->jenisPembayaran->nama }} - {{ $item->bulan->nama}}</td>
                <td class="px-4 py-2">Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                <td class="px-4 py-2">{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<p class="text-gray-600 italic">Tidak ada data pembayaran tersedia.</p>
@endif