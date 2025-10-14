@extends('layouts.app')

@section('title', 'Profil Organisasi - Karang Taruna')

@section('content')
<div class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold">Profil Organisasi</h1>
        <p class="mt-2 text-primary-100">Data Lengkap Karang Taruna</p>
    </div>
</div>

@if($profile)
<div class="container mx-auto px-4 py-16">
    <!-- Identitas Organisasi -->
    <div class="bg-white rounded-lg shadow-md p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Identitas Organisasi</h2>
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <h3 class="font-semibold text-gray-700 mb-2">Nama Organisasi</h3>
                <p class="text-gray-600">{{ $profile->nama_organisasi }}</p>
            </div>
            <div>
                <h3 class="font-semibold text-gray-700 mb-2">Tahun Berdiri</h3>
                <p class="text-gray-600">{{ $profile->tahun_berdiri }}</p>
            </div>
            <div>
                <h3 class="font-semibold text-gray-700 mb-2">Legalitas</h3>
                <p class="text-gray-600">{{ $profile->legalitas ?? '-' }}</p>
            </div>
            <div>
                <h3 class="font-semibold text-gray-700 mb-2">Alamat</h3>
                <p class="text-gray-600">{{ $profile->alamat }}</p>
            </div>
        </div>
    </div>

    <!-- Sejarah -->
    <div class="bg-white rounded-lg shadow-md p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Sejarah Berdirinya</h2>
        <p class="text-gray-600 leading-relaxed">{{ $profile->sejarah }}</p>
    </div>

    <!-- Profil Singkat -->
    <div class="bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Profil Singkat</h2>
        <p class="text-gray-600 leading-relaxed">{{ $profile->profil_singkat }}</p>
    </div>
</div>
@else
<div class="container mx-auto px-4 py-16">
    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-8 text-center">
        <p class="text-yellow-800">Data profil belum tersedia.</p>
    </div>
</div>
@endif
@endsection
