@extends('layouts.web')

@section('title', 'Sambutan Kepala Sekolah')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">{{ $sambutan->judul }}</h2>
        <div class="flex flex-col md:flex-row items-center gap-8">
            <div class="w-full md:w-1/3 flex justify-center">
                <div class="w-48 h-48 rounded-full overflow-hidden shadow-lg">
                    <img src="{{ asset('storage/' . $sambutan->image) }}" alt="Kepala Sekolah" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="w-full md:w-2/3">
                <p class="text-lg leading-relaxed ">
                    {{$sambutan->isi}}
                </p>

            </div>
        </div>
    </div>
</section>
@endsection