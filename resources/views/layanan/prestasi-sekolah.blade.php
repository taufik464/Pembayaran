@extends('layouts.web')

@section('title', 'Prestasi Sekolah')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Prestasi Sekolah</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">Tahun</th>
                        <th class="py-3 px-4 text-left">Prestasi</th>
                        <th class="py-3 px-4 text-left">Tingkat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($prestasi as $item)
                    <tr class="{{ $loop->even ? 'bg-gray-50' : '' }}">
                        <td class="py-3 px-4">{{ $item->tahun }}</td>
                        <td class="py-3 px-4">{{ $item->judul }}</td>
                        <td class="py-3 px-4">{{ $item->tingkat }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
