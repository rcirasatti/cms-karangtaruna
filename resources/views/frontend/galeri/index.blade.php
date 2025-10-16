@extends('layouts.app')

@section('navbar_transparent')
@endsection

@section('title', 'Galeri - Karang Taruna')

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
                    <span class="text-white font-medium">Gallery</span>
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
                        <h1 class="text-4xl md:text-5xl font-bold tracking-tight">Galeri Kami</h1>
                        <p class="mt-2 text-xl text-blue-100">Koleksi momen berharga dari berbagai kegiatan Karang Taruna</p>
                    </div>
                </div>

                <!-- Stats -->
                <div class="flex items-center space-x-6 mt-6">
                    <div class="flex items-center space-x-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg">
                        <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"></path>
                        </svg>
                        <span class="text-sm font-semibold">Foto & Video</span>
                    </div>
                    <div class="flex items-center space-x-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg">
                        <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v2h16V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5H4v8a2 2 0 002 2h12a2 2 0 002-2V7h-2v1a1 1 0 11-2 0V7h-4v1a1 1 0 11-2 0V7H6v1a1 1 0 11-2 0V7z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm font-semibold">Update Rutin</span>
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
                            <form method="GET" action="{{ route('galeri.index') }}" class="relative">
                                <input type="hidden" name="tipe" value="{{ $tipe }}">
                                <input type="hidden" name="kegiatan_id" value="{{ $kegiatan_id }}">
                                <div class="relative">
                                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    <input type="text" name="search" value="{{ $search }}" placeholder="Cari galeri berdasarkan judul..."
                                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 bg-gray-50 focus:bg-white">
                                    <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-primary-600 hover:bg-primary-700 text-white px-4 py-1.5 rounded-lg text-sm font-medium transition-colors">
                                        Cari
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Filter by Type -->
                        <div class="flex items-center space-x-3">
                            <span class="text-sm font-medium text-gray-700">Filter:</span>
                            <form method="GET" action="{{ route('galeri.index') }}" class="flex gap-2">
                                <input type="hidden" name="search" value="{{ $search }}">
                                <input type="hidden" name="kegiatan_id" value="{{ $kegiatan_id }}">
                                <select name="tipe" onchange="this.form.submit()"
                                        class="appearance-none bg-white border border-gray-300 rounded-xl px-4 py-3 pr-8 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 text-sm font-medium">
                                    <option value="">Semua</option>
                                    <option value="foto" {{ $tipe == 'foto' ? 'selected' : '' }}>Foto</option>
                                    <option value="video" {{ $tipe == 'video' ? 'selected' : '' }}>Video</option>
                                </select>
                            </form>

                            <!-- Filter by Kegiatan -->
                            <form method="GET" action="{{ route('galeri.index') }}" class="relative">
                                <input type="hidden" name="search" value="{{ $search }}">
                                <input type="hidden" name="tipe" value="{{ $tipe }}">
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
                    </div>
                </div>
            </div>

            <!-- Galeri Grid -->
            @if($galeris->count() > 0)
                <div class="max-w-6xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($galeris as $galeri)
                            <a href="{{ route('galeri.show', $galeri->id) }}" class="group">
                                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 h-full flex flex-col">
                                    <!-- Thumbnail -->
                                    <div class="relative w-full aspect-video bg-gradient-to-br from-gray-200 to-gray-300 overflow-hidden">
                                        @if($galeri->tipe === 'foto')
                                            <img src="{{ $galeri->url }}" alt="{{ $galeri->judul }}" 
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                            <div class="absolute top-3 right-3 bg-primary-600 text-white px-3 py-1 rounded-lg text-xs font-semibold flex items-center space-x-1">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"></path>
                                                </svg>
                                                <span>Foto</span>
                                            </div>
                                        @else
                                            <div class="w-full h-full bg-black/20 flex items-center justify-center">
                                                @if($galeri->thumbnail)
                                                    <img src="{{ $galeri->thumbnail }}" alt="{{ $galeri->judul }}" 
                                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                                @else
                                                    <svg class="w-16 h-16 text-white/50" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                                                    </svg>
                                                @endif
                                            </div>
                                            <div class="absolute top-3 right-3 bg-accent text-primary-800 px-3 py-1 rounded-lg text-xs font-semibold flex items-center space-x-1">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                                                </svg>
                                                <span>Video</span>
                                            </div>
                                        @endif
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
            @else
                <!-- Empty State -->
                <div class="max-w-6xl mx-auto">
                    <div class="bg-white rounded-2xl shadow-lg p-16 text-center border border-gray-100">
                        <svg class="w-24 h-24 text-primary-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Galeri Kosong</h3>
                        <p class="text-gray-600 mb-6">Belum ada galeri yang sesuai dengan filter Anda.</p>
                        <a href="{{ route('galeri.index') }}" class="inline-block bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                            Lihat Semua Galeri
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
