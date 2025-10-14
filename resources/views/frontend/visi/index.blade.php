@extends('layouts.app')

@section('title', 'Visi & Misi - Karang Taruna')

@section('content')
<div class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold">Visi & Misi</h1>
        <p class="mt-2 text-primary-100">Arah dan Tujuan Organisasi</p>
    </div>
</div>

@if($visiMisi)
<div class="container mx-auto px-4 py-16">
    <div class="grid md:grid-cols-2 gap-8 mb-8">
        <!-- Visi -->
        <div class="bg-white rounded-lg shadow-md p-8">
            <div class="flex items-center mb-4">
                <div class="bg-primary-100 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 ml-4">Visi</h2>
            </div>
            <p class="text-gray-600 leading-relaxed">{{ $visiMisi->visi }}</p>
        </div>

        <!-- Misi -->
        <div class="bg-white rounded-lg shadow-md p-8">
            <div class="flex items-center mb-4">
                <div class="bg-primary-100 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 ml-4">Misi</h2>
            </div>
            <div class="text-gray-600 leading-relaxed whitespace-pre-line">{{ $visiMisi->misi }}</div>
        </div>
    </div>

    @if($visiMisi->tujuan)
    <!-- Tujuan & Fungsi -->
    <div class="bg-white rounded-lg shadow-md p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Tujuan & Fungsi</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div>
                <h3 class="font-semibold text-gray-700 mb-3">Tujuan</h3>
                <div class="text-gray-600 leading-relaxed whitespace-pre-line">{{ $visiMisi->tujuan }}</div>
            </div>
            @if($visiMisi->fungsi)
            <div>
                <h3 class="font-semibold text-gray-700 mb-3">Fungsi</h3>
                <div class="text-gray-600 leading-relaxed whitespace-pre-line">{{ $visiMisi->fungsi }}</div>
            </div>
            @endif
        </div>
    </div>
    @endif

    @if($visiMisi->nilai_dasar)
    <!-- Nilai-Nilai Dasar -->
    <div class="bg-gradient-to-r from-primary-50 to-blue-50 rounded-lg p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Nilai-Nilai Dasar</h2>
        <div class="text-gray-700 leading-relaxed whitespace-pre-line text-center max-w-2xl mx-auto">{{ $visiMisi->nilai_dasar }}</div>
    </div>
    @endif
</div>
@else
<div class="container mx-auto px-4 py-16">
    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-8 text-center">
        <p class="text-yellow-800">Data visi dan misi belum tersedia.</p>
    </div>
</div>
@endif
@endsection
