@extends('layouts.web')

@section('title', 'Visi dan Misi')

@section('content')
<section class="py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Visi dan Misi</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white p-8 rounded-xl shadow">
                <h3 class="text-xl font-semibold mb-4 text-green-600">{{ $visi->judul }}</h3>
                <p class="text-lg leading-relaxed">
                    {{ $visi->isi }}
                </p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow">
                <h3 class="text-xl font-semibold mb-4 text-green-600">{{ $misi->judul }}</h3>
                <ul class="list-disc  space-y-2 text-lg leading-relaxed">
                    {{ $misi->isi }}
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection