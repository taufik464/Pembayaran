@extends('layouts.admin')
@section('title', 'FAQ')
@php
$title = 'Tambah FAQ';
$breadcrumb = [
['label' => 'FAQ', 'url' => route('admin.faq')],
['label' => 'Tambah FAQ', 'url' => route('admin.faq.create')],
];
@endphp

@section('content')
<section class="bg-white mt-6 p-5 rounded-lg shadow">
    <form action="{{ route('admin.faq.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="question" class="block text-gray-700 font-bold mb-2">Pertanyaan:</label>
            <input type="text" id="question" name="question" class="w-full p-2 border border-gray-300 rounded"
                value="{{ old('question') }}" required>
            @error('question')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="answer" class="block text-gray-700 font-bold mb-2">Jawaban:</label>
            <textarea id="answer" name="answer" class="w-full p-2 border border-gray-300 rounded" rows="5"
                required>{{ old('answer') }}</textarea>
            @error('answer')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.faq') }}"
                class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">Simpan</button>
        </div>
    </form>
</section>
@endsection