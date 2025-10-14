@php
use Carbon\Carbon;
@endphp
@extends('layouts.admin')
@section('title', 'Identitas Sekolah')
@section('content')
<x-page-header
    title="Identitas Sekolah"
    :breadcrumb="[
           
            ['url' => '/admin/identitas', 'label' => 'Identitas Sekolah'],
        ]" />
<section class="bg-white p-5 rounded-lg shadow">
    @if($identitas->isEmpty())
    <div class="mb-4 p-4 border rounded-lg">
        <form action="{{ route('admin.identitas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="logo" class="block text-gray-700 text-sm font-bold mb-2">Logo:</label>
                <input type="file" name="logo" id="logo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="nama_sekolah" class="block text-gray-700 text-sm font-bold mb-2">Nama Sekolah:</label>
                <input type="text" name="nama_sekolah" id="nama_sekolah" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="npsn" class="block text-gray-700 text-sm font-bold mb-2">NPSN:</label>
                <input type="text" name="npsn" id="npsn" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat:</label>
                <textarea name="alamat" id="alamat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            <div class="mb-4">
                <label for="telepon" class="block text-gray-700 text-sm font-bold mb-2">Telepon:</label>
                <input type="text" name="telepon" id="telepon" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="website" class="block text-gray-700 text-sm font-bold mb-2">Website:</label>
                <input type="text" name="website" id="website" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
             <div class="mb-4">
                <label for="jam_operasi" class="block text-gray-700 text-sm font-bold mb-2">Jam Operasi:</label>
                <input type="text" name="jam_operasi" id="jam_operasi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <button type="submit" class="btn btn-primary">Tambah Identitas Sekolah</button>
        </form>
    </div>
    @else
    @foreach($identitas as $item)
    <div class="mb-4 p-4 border rounded-lg">
        <form action="{{ route('admin.identitas.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
            
            <div class="flex justify-center items-center">
                @if($item->logo)
                <label for="logo" class="cursor-pointer">
                <div style="width: 80px; height: 80px; border-radius: 50%; overflow: hidden; display: flex; justify-content: center; align-items: center;">
                    <img src="{{ asset('storage/'.$item->logo) }}" alt="Logo" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <input type="file" name="logo" id="logo" class="hidden" accept="image/*" onchange="this.form.submit()">
                </label>
                @else
                <label for="logo" class="cursor-pointer">
                <div style="width: 80px; height: 80px; border-radius: 50%; overflow: hidden; display: flex; justify-content: center; align-items: center; background-color: #f0f0f0;">
                    <p class="text-gray-500 text-center">Tidak ada logo. Upload?</p>
                </div>
                <input type="file" name="logo" id="logo" class="hidden" accept="image/*">
                </label>
                 <button type="submit" class="btn btn-primary">Upload Logo</button>
                @endif
            </div>
            @error('logo')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-4">
            <label for="nama_sekolah" class="block text-gray-700 text-sm font-bold mb-2">Nama Sekolah:</label>
            <input type="text" name="nama_sekolah" id="nama_sekolah" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $item->nama_sekolah }}">
             @error('nama_sekolah')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-4">
            <label for="npsn" class="block text-gray-700 text-sm font-bold mb-2">NPSN:</label>
            <input type="text" name="npsn" id="npsn" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $item->npsn }}">
             @error('npsn')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-4">
            <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat:</label>
            <textarea name="alamat" id="alamat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $item->alamat }}</textarea>
             @error('alamat')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-4">
            <label for="telepon" class="block text-gray-700 text-sm font-bold mb-2">Telepon:</label>
            <input type="text" name="telepon" id="telepon" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $item->telepon }}">
             @error('telepon')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
            <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $item->email }}">
             @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-4">
            <label for="website" class="block text-gray-700 text-sm font-bold mb-2">Website:</label>
            <input type="text" name="website" id="website" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $item->website }}">
             @error('website')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div>
             <div class="mb-4">
            <label for="jam_operasi" class="block text-gray-700 text-sm font-bold mb-2">Jam Operasi:</label>
            <input type="text" name="jam_operasi" id="jam_operasi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $item->jam_operasi }}">
             @error('jam_operasi')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
    @endforeach
    @endif
</section>
@endsection
