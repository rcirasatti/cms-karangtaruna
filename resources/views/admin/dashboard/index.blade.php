@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-description', 'Ringkasan dan statistik CMS')

@section('content')
<div class="space-y-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
        <!-- Berita Card -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-primary-600 hover:shadow-xl transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium font-poppins">Total Berita</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2 font-montserrat">{{ $total_berita }}</h3>
                </div>
                <div class="bg-primary-50 rounded-xl p-3">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Produk Card -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-green-600 hover:shadow-xl transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium font-poppins">Total Produk</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2 font-montserrat">{{ $total_produk }}</h3>
                </div>
                <div class="bg-green-50 rounded-xl p-3">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Mitra Card -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-yellow-600 hover:shadow-xl transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium font-poppins">Total Mitra</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2 font-montserrat">{{ $total_mitra }}</h3>
                </div>
                <div class="bg-yellow-50 rounded-xl p-3">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Kepengurusan Card -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-purple-600 hover:shadow-xl transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium font-poppins">Kepengurusan</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2 font-montserrat">{{ $total_kepengurusan }}</h3>
                </div>
                <div class="bg-purple-50 rounded-xl p-3">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Galeri Card -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-red-600 hover:shadow-xl transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium font-poppins">Total Galeri</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2 font-montserrat">{{ $total_galeri }}</h3>
                </div>
                <div class="bg-red-50 rounded-xl p-3">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Data -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Berita Terbaru -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
            <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-primary-50 to-white">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800 font-montserrat flex items-center">
                        <div class="bg-primary-100 p-2 rounded-lg mr-3">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                        Berita Terbaru
                    </h3>
                    <a href="{{ route('admin.berita.index') }}" class="text-sm text-primary-600 hover:text-primary-700 font-semibold transition">
                        Lihat Semua →
                    </a>
                </div>
            </div>
            <div class="p-6">
                @if($berita_terbaru->count() > 0)
                    <div class="space-y-4">
                        @foreach($berita_terbaru as $berita)
                            <div class="flex items-start space-x-4 pb-4 border-b border-gray-100 last:border-0 hover:bg-gray-50 p-2 rounded-lg transition">
                                @if($berita->foto)
                                    <img src="{{ asset('storage/' . $berita->foto) }}" 
                                         alt="{{ $berita->judul }}" 
                                         class="w-20 h-20 rounded-lg object-cover shadow-md">
                                @else
                                    <div class="w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg flex items-center justify-center shadow-md">
                                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800 line-clamp-2 font-poppins">{{ $berita->judul }}</h4>
                                    <p class="text-sm text-gray-500 mt-1">{{ $berita->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-8">Belum ada berita</p>
                @endif
            </div>
        </div>

        <!-- Produk Terbaru -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
            <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-green-50 to-white">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800 font-montserrat flex items-center">
                        <div class="bg-green-100 p-2 rounded-lg mr-3">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        Produk Terbaru
                    </h3>
                    <a href="{{ route('admin.produk.index') }}" class="text-sm text-green-600 hover:text-green-700 font-semibold transition">
                        Lihat Semua →
                    </a>
                </div>
            </div>
            <div class="p-6">
                @if($produk_terbaru->count() > 0)
                    <div class="space-y-4">
                        @foreach($produk_terbaru as $produk)
                            <div class="flex items-start space-x-4 pb-4 border-b border-gray-100 last:border-0 hover:bg-gray-50 p-2 rounded-lg transition">
                                @if($produk->gambar)
                                    <img src="{{ asset('storage/' . $produk->gambar) }}" 
                                         alt="{{ $produk->nama }}" 
                                         class="w-20 h-20 rounded-lg object-cover shadow-md">
                                @else
                                    <div class="w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg flex items-center justify-center shadow-md">
                                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800 font-poppins">{{ $produk->nama }}</h4>
                                    <p class="text-sm text-gray-500 mt-1">{{ $produk->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-8">Belum ada produk</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
        <h3 class="text-lg font-semibold text-gray-800 mb-6 font-montserrat flex items-center">
            <div class="bg-primary-100 p-2 rounded-lg mr-3">
                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
            Aksi Cepat
        </h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.berita.create') }}" 
               class="flex flex-col items-center justify-center p-6 bg-gradient-to-br from-primary-50 to-primary-100 rounded-xl hover:from-primary-100 hover:to-primary-200 transition duration-200 shadow-sm hover:shadow-md group">
                <div class="bg-white rounded-full p-3 mb-3 shadow-sm group-hover:shadow transition">
                    <svg class="w-10 h-10 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <span class="text-sm font-semibold text-gray-700 font-poppins">Tambah Berita</span>
            </a>
            <a href="{{ route('admin.produk.create') }}" 
               class="flex flex-col items-center justify-center p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-xl hover:from-green-100 hover:to-green-200 transition duration-200 shadow-sm hover:shadow-md group">
                <div class="bg-white rounded-full p-3 mb-3 shadow-sm group-hover:shadow transition">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <span class="text-sm font-semibold text-gray-700 font-poppins">Tambah Produk</span>
            </a>
            <a href="{{ route('admin.mitra.create') }}" 
               class="flex flex-col items-center justify-center p-6 bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-xl hover:from-yellow-100 hover:to-yellow-200 transition duration-200 shadow-sm hover:shadow-md group">
                <div class="bg-white rounded-full p-3 mb-3 shadow-sm group-hover:shadow transition">
                    <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <span class="text-sm font-semibold text-gray-700 font-poppins">Tambah Mitra</span>
            </a>
            <a href="{{ route('admin.kepengurusan.create') }}" 
               class="flex flex-col items-center justify-center p-6 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl hover:from-purple-100 hover:to-purple-200 transition duration-200 shadow-sm hover:shadow-md group">
                <div class="bg-white rounded-full p-3 mb-3 shadow-sm group-hover:shadow transition">
                    <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <span class="text-sm font-semibold text-gray-700 font-poppins">Tambah Pengurus</span>
            </a>
        </div>
    </div>
</div>
@endsection
