@extends('layouts.admin')
@section('title', 'FAQ')
@php
$title = 'Manajemen FAQ';
$breadcrumb = [
['label' => 'FAQ', 'url' => route('admin.faq')],
];
@endphp
@section('content')
<section class="bg-white mt-6 p-5 rounded-lg shadow">
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.faq.create') }}"
            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
            Tambah FAQ
        </a>
    </div>

    @if($faqs->isEmpty())
    <div class="text-center text-gray-500 py-10">
        Tidak ada data FAQ.
    </div>
    @else
    <div class="space-y-4">
        @foreach($faqs as $item)
        <x-faq-card
            question="{{ $item->question }}"
            answer="{{ $item->answer }}"
            editUrl="{{ route('admin.faq.edit', $item->id) }}"
            hapusUrl="{{ route('admin.faq.destroy', $item->id) }}" />
        @endforeach
    </div>
    @endif
</section>
@endsection
