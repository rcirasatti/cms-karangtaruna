@extends('layouts.app')

@section('title', 'Profil Organisasi - Karang Taruna')

@section('content')
    <div
        class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white py-32 md:h-[420px] h-[420px] overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-white opacity-5 rounded-full -ml-48 -mb-48"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl">
                <nav class="flex items-center space-x-2 text-sm text-blue-200 mb-4">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-blue-200">About</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-white font-medium">Sejarah Organisasi</span>
                </nav>

                <div class="flex items-center space-x-4 mb-4">
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-2xl">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold tracking-tight">Sejarah Organisasi</h1>
                        <p class="mt-2 text-xl text-blue-100">Didirikan sebagai wadah pemuda dalam menggerakkan kegiatan
                            sosial dan kemasyarakatan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($profile)
        <div class="bg-white py-16">
            <div class="container mx-auto px-4">
                <div class="grid lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 space-y-12 mr-0 md:mr-15">
                        <div>
                            <h2 class="text-3xl font-bold text-primary-800 mb-6 pb-3 border-b-4 border-secondary inline-block">
                                Sejarah Karang Taruna
                            </h2>

                            <div class="space-y-4 text-gray-700 leading-relaxed text-justify whitespace-pre-line">
                                {{ $profile->sejarah }}
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-8 border border-gray-200">
                            <h3 class="text-2xl font-bold text-primary-800 mb-6">Identitas Organisasi</h3>

                            <div class="space-y-4">
                                <div class="flex border-b border-gray-200 pb-3">
                                    <div class="w-40 font-semibold text-gray-700">Nama Organisasi</div>
                                    <div class="flex-1 text-gray-600">: {{ $profile->nama_organisasi }}</div>
                                </div>

                                <div class="flex border-b border-gray-200 pb-3">
                                    <div class="w-40 font-semibold text-gray-700">Tahun Berdiri</div>
                                    <div class="flex-1 text-gray-600">: {{ $profile->tahun_berdiri }}</div>
                                </div>

                                <div class="flex border-b border-gray-200 pb-3">
                                    <div class="w-40 font-semibold text-gray-700">Legalitas</div>
                                    <div class="flex-1 text-gray-600">: {{ $profile->legalitas ?? '-' }}</div>
                                </div>

                                <div class="flex pb-3">
                                    <div class="w-40 font-semibold text-gray-700">Alamat</div>
                                    <div class="flex-1 text-gray-600">: {{ $profile->alamat }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-1">
                        <div class="sticky top-24 space-y-6">
                            <div class="bg-primary-800 text-white rounded-xl p-6 shadow-lg">
                                <h3 class="text-xl font-bold mb-4 pb-2 border-b border-white/30">
                                    Profil Karang Taruna
                                </h3>
                                <p class="text-sm leading-relaxed text-blue-100">
                                    {{ Str::limit($profile->profil_singkat, 150) }}
                                </p>
                            </div>

                            <div class="bg-gradient-to-br from-secondary to-accent rounded-xl p-6 shadow-lg">
                                <h3 class="text-xl font-bold text-primary-900 mb-3">
                                    Mau Gabung atau Punya Pertanyaan?
                                </h3>
                                <p class="text-sm text-primary-800 mb-4 leading-relaxed">
                                    Yuk, hubungi Karang Taruna terdekat atau daftar keanggotaan langsung online! 🚀
                                </p>
                                <a href="{{ route('kontak.index') }}"
                                    class="block w-full bg-primary-700 hover:bg-primary-800 text-white text-center font-bold py-3 px-4 rounded-lg transition-all duration-300 shadow-md hover:shadow-xl">
                                    contacts
                                </a>
                            </div>

                            @if($quotes->where('is_tampil', true)->count() > 0)
                                @foreach($quotes->where('is_tampil', true) as $quote)
                                    <div class="bg-gray-50 rounded-xl p-6 border-l-4 border-secondary">
                                        <div class="text-6xl text-secondary mb-2 leading-none">"</div>
                                        <p class="text-gray-700 italic mb-4 leading-relaxed">
                                            {{ $quote->quote }}
                                        </p>
                                        <div class="flex items-center space-x-3 mt-4">
                                            @if($quote->foto)
                                                <img src="{{ asset('storage/' . $quote->foto) }}" alt="{{ $quote->nama }}"
                                                    class="w-12 h-12 rounded-full object-cover border-2 border-primary-600">
                                            @else
                                                <div
                                                    class="w-12 h-12 rounded-full bg-primary-100 border-2 border-primary-600 flex items-center justify-center">
                                                    <span class="text-primary-600 font-bold text-lg">{{ substr($quote->nama, 0, 1) }}</span>
                                                </div>
                                            @endif
                                            <div>
                                                <div class="font-bold text-gray-900">{{ $quote->nama }}</div>
                                                <div class="text-sm text-gray-600">{{ $quote->peran }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="bg-gray-50 rounded-xl p-6 border-l-4 border-gray-300 text-center">
                                    <p class="text-gray-500 italic">Belum ada quote yang ditampilkan</p>
                                    <p class="text-xs text-gray-400 mt-1">Aktifkan "Tampilkan di Live Preview" untuk menampilkan
                                        quote</p>
                                </div>
                            @endif
                        </div>
                    </div>
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