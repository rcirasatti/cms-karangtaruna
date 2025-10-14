@extends('layouts.app')

@section('title', 'Logo Karang Taruna')

@section('content')
<div class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold">Logo Karang Taruna</h1>
        <p class="mt-2 text-primary-100">Simbol Identitas Organisasi</p>
    </div>
</div>

@if($profile)
<div class="container mx-auto px-4 py-16">
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div class="flex justify-center">
            @if($profile->logo_path)
                <img src="{{ asset('storage/' . $profile->logo_path) }}" alt="Logo {{ $profile->nama_organisasi }}" class="max-w-md w-full">
            @else
                <div class="bg-gray-200 w-full h-96 rounded-lg flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-24 h-24 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-400">Logo belum tersedia</p>
                    </div>
                </div>
            @endif
        </div>
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Filosofi Logo</h2>
            @if($profile->filosofi_logo)
                <p class="text-gray-600 leading-relaxed">{{ $profile->filosofi_logo }}</p>
            @else
                <p class="text-gray-500 italic">Filosofi logo belum tersedia.</p>
            @endif
        </div>
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
