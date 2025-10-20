@extends('layouts.app')

@section('navbar_transparent')
@endsection

@section('title', 'Galeri Foto - Karang Taruna')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white py-32 md:h-[420px] h-[420px] overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-white opacity-5 rounded-full -ml-48 -mb-48"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl">
                <!-- Breadcrumb -->
                <nav class="flex items-center space-x-2 text-sm text-blue-200 mb-4">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <a href="{{ route('galeri.index') }}" class="hover:text-white transition-colors">Gallery</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-white font-medium">Foto</span>
                </nav>

                <!-- Title dengan Icon -->
                <div class="flex items-center space-x-4 mb-4">
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-2xl">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold tracking-tight">Galeri Foto</h1>
                        <p class="mt-2 text-xl text-blue-100">Koleksi foto-foto menarik dari kegiatan Karang Taruna</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-gray-100 py-16">
        <div class="container mx-auto px-4">
            <!-- Filter & Search Section -->
            <div class="max-w-6xl mx-auto mb-12">
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">
                        <!-- Search Box -->
                        <div class="flex-1 max-w-md">
                            <form method="GET" action="{{ route('galeri.foto') }}" class="relative">
                                <input type="hidden" name="kegiatan_id" value="{{ $kegiatan_id }}">
                                <div class="relative">
                                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    <input type="text" name="search" value="{{ $search }}" placeholder="Cari foto berdasarkan judul..."
                                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 bg-gray-50 focus:bg-white">
                                    <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-primary-600 hover:bg-primary-700 text-white px-4 py-1.5 rounded-lg text-sm font-medium transition-colors">
                                        Cari
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Filter by Kegiatan -->
                        <div class="flex items-center space-x-3">
                            <span class="text-sm font-medium text-gray-700">Kegiatan:</span>
                            <form method="GET" action="{{ route('galeri.foto') }}" class="relative">
                                <input type="hidden" name="search" value="{{ $search }}">
                                <select name="kegiatan_id" onchange="this.form.submit()"
                                        class="appearance-none bg-white border border-gray-300 rounded-xl px-4 py-3 pr-8 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 text-sm font-medium">
                                    <option value="">Semua Kegiatan</option>
                                    @foreach($kegiatanList as $kegiatan)
                                        <option value="{{ $kegiatan->id }}" {{ $kegiatan_id == $kegiatan->id ? 'selected' : '' }}>
                                            {{ Str::limit($kegiatan->judul, 40) }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>

                        <!-- Link to Video -->
                        <a href="{{ route('galeri.video') }}" class="inline-block bg-accent hover:bg-yellow-200 text-primary-800 px-6 py-3 rounded-lg font-semibold transition-colors">
                            Lihat Video
                        </a>
                    </div>
                </div>
            </div>

            <!-- Foto Grid -->
            @if($galeris->count() > 0 || $beritaFotos->count() > 0)
                <div class="max-w-6xl mx-auto">
                    <!-- Foto dari Berita -->
                    @if($beritaFotos->count() > 0)
                        <div class="mb-12">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                                <svg class="w-6 h-6 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                                Foto dari Berita
                            </h2>
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">
                                @foreach($beritaFotos as $berita)
                                    @if($berita->media_path && is_array($berita->media_path))
                                        @foreach($berita->media_path as $index => $media)
                                            <a href="{{ route('galeri.berita.show', $berita->id) }}" class="group">
                                                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-primary-200">
                                                    <div class="relative aspect-square bg-gradient-to-br from-gray-200 to-gray-300 overflow-hidden">
                                                        <img src="{{ asset('storage/' . $media) }}" 
                                                             alt="{{ $berita->judul }} - {{ $index + 1 }}" 
                                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                                             loading="lazy">
                                                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-center justify-center">
                                                            <svg class="w-12 h-12 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div class="p-3">
                                                        <h3 class="text-sm font-semibold text-gray-800 group-hover:text-primary-600 transition-colors line-clamp-2">
                                                            {{ $berita->judul }}
                                                        </h3>
                                                        <p class="text-xs text-gray-500 mt-1">
                                                            {{ $berita->tanggal_kegiatan->format('d M Y') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Foto dari Galeri -->
                    @if($galeris->count() > 0)
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                                <svg class="w-6 h-6 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Galeri Foto
                            </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($galeris as $galeri)
                            <a href="{{ route('galeri.show', $galeri->id) }}" class="group">
                                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 h-full flex flex-col">
                                    <!-- Image -->
                                    <div class="relative w-full aspect-video bg-gradient-to-br from-gray-200 to-gray-300 overflow-hidden">
                                        <img src="{{ $galeri->url }}" alt="{{ $galeri->judul }}" 
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300 flex items-center justify-center">
                                            <svg class="w-16 h-16 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                                            </svg>
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <div class="p-4 flex-1 flex flex-col">
                                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-primary-600 transition-colors line-clamp-2">
                                            {{ $galeri->judul }}
                                        </h3>
                                        <p class="text-sm text-gray-600 mt-2 line-clamp-2">
                                            {{ $galeri->deskripsi ?? 'Tidak ada deskripsi' }}
                                        </p>
                                        <div class="mt-auto pt-4 border-t border-gray-100">
                                            <div class="flex items-center justify-between text-xs text-gray-500">
                                                <span class="font-medium text-primary-600">{{ $galeri->kegiatan->judul ?? 'N/A' }}</span>
                                                <span>{{ $galeri->created_at->format('d M Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12">
                        {{ $galeris->links() }}
                    </div>
                        </div>
                    @endif
                </div>
            @else
                <!-- Empty State -->
                <div class="max-w-6xl mx-auto">
                    <div class="bg-white rounded-2xl shadow-lg p-16 text-center border border-gray-100">
                        <svg class="w-24 h-24 text-primary-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Foto Tidak Ditemukan</h3>
                        <p class="text-gray-600 mb-6">Belum ada foto yang sesuai dengan filter Anda.</p>
                        <a href="{{ route('galeri.foto') }}" class="inline-block bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                            Lihat Semua Foto
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
