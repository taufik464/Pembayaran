@extends('layouts.web')

@section('title', $title ?? 'Lainnya')

@section('content')
<section class="py-10 bg-white">
    <div class="max-w-6xl mx-auto px-1">
        <h2 class="text-3xl font-bold text-center mb-12">
            {{ optional($Lainnya)->judul ?? 'Judul belum tersedia' }}
        </h2>
        <div class="flex flex-col md:flex-row bg-green-100 items-center ">

            <div class="w-full ">
                <div class="ql-editor">
                    {!! optional($Lainnya)->isi ?? '' !!}
                </div>

            </div>
        </div>
    </div>
</section>
@endsection