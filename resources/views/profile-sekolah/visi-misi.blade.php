@extends('layouts.web')

@section('title', 'Visi dan Misi')

@section('content')
<section class="py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Visi dan Misi</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white p-8 rounded-xl shadow">
                @if ($visi)
                <h3 class="text-xl font-semibold mb-4 text-green-600">{{ $visi->judul }}</h3>
                <p class="text-lg leading-relaxed">
                    {!! $visi->isi !!}
                </p>
                @endif

            </div>
            <div class="bg-white p-8 rounded-xl shadow">
                @if ($misi)
                <h3 class="text-xl font-semibold mb-4 text-green-600">{{ $misi->judul }}</h3>
                <p class="text-lg leading-relaxed">
                    {!! $misi->isi !!}
                    @endif
            </div>
        </div>
    </div>
</section>
@endsection