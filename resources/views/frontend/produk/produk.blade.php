@extends('layouts.app')

@section('navbar_transparent')
@endsection

@section('title', 'Produk UMKM - Karang Taruna')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white py-20 md:py-32 md:h-[420px] h-auto overflow-hidden">
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
                    <span class="text-blue-200">Product & Partners</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-white font-medium">Daftar Produk</span>
                </nav>

                <!-- Title dengan Icon -->
                <div class="flex items-center space-x-4 mb-4">
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-2xl">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-5xl font-bold tracking-tight">Produk UMKM</h1>
                        <p class="mt-2 text-xl text-blue-100">Dukung produk lokal berkualitas dari mitra Karang Taruna</p>
                    </div>
                </div>

                <!-- Stats -->
                <div class="flex items-center space-x-6 mt-6">
                    <div class="flex items-center space-x-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg">
                        <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
                            </path>
                        </svg>
                        <span class="text-sm font-semibold">50+ Mitra UMKM</span>
                    </div>
                    <div class="flex items-center space-x-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg">
                        <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm font-semibold">Produk Berkualitas</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk Section dengan Sidebar Filter -->
    <div class="bg-gray-100 pt-6 pb-16 md:py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Filter Kategori -->
                <aside class="lg:w-64 flex-shrink-0">
                    <div class="bg-white rounded-2xl shadow-xl p-6 sticky top-24 border border-gray-100">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            <div class="bg-primary-50 p-2 rounded-lg mr-3">
                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                                    </path>
                                </svg>
                            </div>
                            <span>Filter Kategori</span>
                        </h3>

                        <div class="space-y-2">
                            <!-- Tombol Semua Produk -->
                            <a href="{{ route('produk.list') }}"
                                class="group block w-full text-left px-4 py-3.5 rounded-xl transition-all duration-200 {{ !request('kategori') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-semibold shadow-lg shadow-primary-200' : 'bg-gray-50 text-gray-700 hover:bg-primary-50 hover:text-primary-700 hover:shadow-md border border-gray-100' }}">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <svg class="w-5 h-5 {{ !request('kategori') ? 'text-white' : 'text-gray-400 group-hover:text-primary-600' }}"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                            </path>
                                        </svg>
                                        <span class="font-medium">Semua Produk</span>
                                    </div>
                                    @if (!request('kategori'))
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    @endif
                                </div>
                            </a>

                            <!-- List Kategori -->
                            @if ($kategoris->count() > 0)
                                @foreach ($kategoris as $kat)
                                    <a href="{{ route('produk.list', ['kategori' => $kat]) }}"
                                        class="group block w-full text-left px-4 py-3.5 rounded-xl transition-all duration-200 {{ request('kategori') == $kat ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-semibold shadow-lg shadow-primary-200' : 'bg-gray-50 text-gray-700 hover:bg-primary-50 hover:text-primary-700 hover:shadow-md border border-gray-100' }}">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <svg class="w-5 h-5 {{ request('kategori') == $kat ? 'text-white' : 'text-gray-400 group-hover:text-primary-600' }}"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                                    </path>
                                                </svg>
                                                <span class="font-medium">{{ $kat }}</span>
                                            </div>
                                            @if (request('kategori') == $kat)
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            @endif
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <div class="text-center py-8">
                                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                        </path>
                                    </svg>
                                    <p class="text-sm text-gray-500">Belum ada kategori</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </aside>

                <!-- Main Content - Produk Cards -->
                <main class="flex-1">
                    <!-- Header dengan info kategori aktif -->
                    @if (request('kategori'))
                        <div
                            class="mb-8 bg-gradient-to-r from-primary-50 to-blue-50 p-6 rounded-2xl border border-primary-100 shadow-sm">
                            <div class="flex items-center justify-between flex-wrap gap-4">
                                <div class="flex items-center space-x-4">
                                    <div class="bg-primary-600 p-3 rounded-xl">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="text-2xl font-bold text-gray-900">{{ request('kategori') }}</h2>
                                        <p class="text-primary-600 text-sm mt-1 font-medium">Kategori Produk</p>
                                    </div>
                                </div>
                                <a href="{{ route('produk.list') }}"
                                    class="text-primary-600 hover:text-primary-800 text-sm font-semibold flex items-center bg-white hover:bg-gray-50 px-4 py-2.5 rounded-lg transition-all shadow-sm hover:shadow-md border border-primary-100">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Hapus Filter
                                </a>
                            </div>
                        </div>
                    @endif

                    <!-- Search and Sort Controls -->
                    <div class="mb-8 bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                        <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">
                            <!-- Search Box -->
                            <div class="flex-1 max-w-md">
                                <form method="GET" action="{{ route('produk.list') }}" class="relative">
                                    <input type="hidden" name="kategori" value="{{ $kategori }}">
                                    <input type="hidden" name="sort" value="{{ $sort }}">
                                    <div class="relative">
                                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                        <input type="text" name="search" value="{{ $search }}" placeholder="Cari produk..."
                                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 bg-gray-50 focus:bg-white">
                                        <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-primary-600 hover:bg-primary-700 text-white px-4 py-1.5 rounded-lg text-sm font-medium transition-colors">
                                            Cari
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Sort Dropdown -->
                            <div class="flex items-center space-x-3">
                                <span class="text-sm font-medium text-gray-700">Urutkan:</span>
                                <form method="GET" action="{{ route('produk.list') }}" class="relative">
                                    <input type="hidden" name="kategori" value="{{ $kategori }}">
                                    <input type="hidden" name="search" value="{{ $search }}">
                                    <select name="sort" onchange="this.form.submit()"
                                            class="appearance-none bg-white border border-gray-300 rounded-xl px-4 py-3 pr-8 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 text-sm font-medium">
                                        <option value="nama_produk" {{ $sort == 'nama_produk' ? 'selected' : '' }}>Nama A-Z</option>
                                        <option value="harga_asc" {{ $sort == 'harga_asc' ? 'selected' : '' }}>Harga Terendah</option>
                                        <option value="harga_desc" {{ $sort == 'harga_desc' ? 'selected' : '' }}>Harga Tertinggi</option>
                                        <option value="terbaru" {{ $sort == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                                        <option value="terlama" {{ $sort == 'terlama' ? 'selected' : '' }}>Terlama</option>
                                    </select>
                                    <div class="absolute right-2 top-1/2 transform -translate-y-1/2 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Active Filters Display -->
                        @if ($search || $kategori)
                            <div class="flex flex-wrap items-center gap-2 mt-4 pt-4 border-t border-gray-200">
                                <span class="text-sm text-gray-600 font-medium">Filter aktif:</span>
                                @if ($search)
                                    <span class="inline-flex items-center bg-primary-100 text-primary-800 px-3 py-1 rounded-full text-sm font-medium">
                                        Pencarian: "{{ $search }}"
                                        <a href="{{ route('produk.list', ['kategori' => $kategori, 'sort' => $sort]) }}" class="ml-2 text-primary-600 hover:text-primary-800">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </a>
                                    </span>
                                @endif
                                @if ($kategori)
                                    <span class="inline-flex items-center bg-secondary-100 text-secondary-800 px-3 py-1 rounded-full text-sm font-medium">
                                        Kategori: {{ $kategori }}
                                        <a href="{{ route('produk.list', ['search' => $search, 'sort' => $sort]) }}" class="ml-2 text-secondary-600 hover:text-secondary-800">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </a>
                                    </span>
                                @endif
                                <a href="{{ route('produk.list', ['sort' => $sort]) }}" class="text-sm text-gray-500 hover:text-gray-700 font-medium ml-2">
                                    Hapus semua filter
                                </a>
                            </div>
                        @endif
                    </div>

                    @if ($produk->count() > 0)
                        <!-- Grid Produk - 3 Kolom dengan Cards Vertikal -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mb-12">
                            @foreach ($produk as $item)
                                    @php $isHighlight = request('highlight') == $item->id; @endphp
                                    <div id="produk-{{ $item->id }}"
                                        class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col border border-gray-100 hover:border-primary-200 transform hover:-translate-y-1 {{ $isHighlight ? 'ring-4 ring-primary-300/60 scale-105' : '' }}">
                                    <!-- Gambar Produk dengan Galeri -->
                                    <div class="relative h-40 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200 group/gallery">
                                        @php
                                            $images = [];
                                            if ($item->galeri && is_array($item->galeri)) {
                                                $images = array_merge($item->galeri, $item->foto ? [$item->foto] : []);
                                            } elseif ($item->foto) {
                                                $images = [$item->foto];
                                            }
                                            $hasMultipleImages = count($images) > 1;
                                        @endphp

                                        @if (count($images) > 0)
                                            <div class="relative w-full h-full {{ $hasMultipleImages ? 'carousel' : '' }}" data-images="{{ json_encode($images) }}">
                                                @foreach ($images as $index => $image)
                                                    <img src="{{ asset('storage/' . $image) }}"
                                                        alt="{{ $item->nama_produk }} - {{ $index + 1 }}"
                                                        class="w-full h-full object-cover transition-transform duration-300 {{ $index === 0 ? 'block' : 'hidden' }} gallery-image"
                                                        data-index="{{ $index }}">
                                                @endforeach

                                                @if ($hasMultipleImages)
                                                    <!-- Navigation Arrows -->
                                                    <button class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white p-1.5 rounded-full transition-all opacity-0 group-hover/gallery:opacity-100 prev-image" data-target="produk-{{ $item->id }}">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                        </svg>
                                                    </button>
                                                    <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white p-1.5 rounded-full transition-all opacity-0 group-hover/gallery:opacity-100 next-image" data-target="produk-{{ $item->id }}">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                        </svg>
                                                    </button>

                                                    <!-- Image Indicators -->
                                                    <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-1">
                                                        @for ($i = 0; $i < count($images); $i++)
                                                            <button class="w-2 h-2 rounded-full transition-all {{ $i === 0 ? 'bg-white' : 'bg-white/50' }} indicator" data-target="produk-{{ $item->id }}" data-index="{{ $i }}"></button>
                                                        @endfor
                                                    </div>
                                                @endif
                                            </div>
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-secondary/20 to-accent/30">
                                                <svg class="w-16 h-16 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif

                                        <!-- Badge Kategori -->
                                        @if ($item->kategori)
                                            <div class="absolute top-3 right-3">
                                                <span class="bg-white/95 backdrop-blur-sm text-primary-600 px-2.5 py-1 rounded-full text-xs font-bold shadow-lg border border-primary-100">
                                                    {{ $item->kategori }}
                                                </span>
                                            </div>
                                        @endif

                                        <!-- Multiple Images Badge -->
                                        @if ($hasMultipleImages)
                                            <div class="absolute top-3 left-3">
                                                <span class="bg-black/70 backdrop-blur-sm text-white px-2 py-1 rounded-full text-xs font-medium flex items-center">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                    {{ count($images) }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Konten Card -->
                                    <div class="p-4 flex flex-col flex-grow bg-white rounded-xl shadow-md">
                                        <!-- Nama Produk -->
                                        <h3
                                            class="text-2xl font-bold mb-2 line-clamp-2 min-h-[2.5rem] transition-colors group-hover:text-[color:var(--color-primary-900)] text-[color:var(--color-primary-700)]">
                                            {{ $item->nama_produk }}
                                        </h3>

                                        <!-- Harga -->
                                        <div class="mb-2">
                                            @if ($item->harga)
                                                <p class="text-xl font-semibold text-[color:var(--color-primary-600)]">
                                                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                                                </p>
                                            @else
                                                <p
                                                    class="text-sm font-medium text-[color:var(--color-primary-900)] bg-[color:var(--color-bg)] px-2.5 py-1 rounded-lg inline-block">
                                                    Hubungi untuk harga
                                                </p>
                                            @endif
                                        </div>

                                        <!-- Deskripsi Singkat -->
                                        <p
                                            class="text-[color:var(--color-primary-800)] text-sm leading-relaxed mb-3 line-clamp-2 min-h-[2rem] flex-grow">
                                            {{ $item->deskripsi ?: 'Produk berkualitas tinggi dari mitra UMKM Karang Taruna dengan harga terjangkau.' }}
                                        </p>
                                    
                                    <!-- Tombol Pesan WhatsApp -->
                                    <button
                                        onclick="pesanWhatsApp({!! json_encode($item->nama_produk) !!}, {!! json_encode($item->harga ? 'Rp ' . number_format($item->harga, 0, ',', '.') : 'Hubungi untuk info harga') !!})"
                                        aria-label="{{ 'Pesan ' . e($item->nama_produk) . ' via WhatsApp' }}"
                                        class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white py-2.5 px-3 rounded-lg font-semibold text-sm transition-all duration-300 flex items-center justify-center space-x-2 shadow-md hover:shadow-lg mt-auto">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                        </svg>
                                        <span>Pesan WhatsApp</span>
                                    </button>
                                </div>
                                </div>
                    @endforeach
            </div>

            <!-- Pagination -->
            <div class="justify-center mt-8 pagination-wrapper">
                {{ $produk->appends(['kategori' => request('kategori')])->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-100">
                <div class="inline-block p-10 bg-gradient-to-br from-accent/20 to-secondary/20 rounded-full mb-8">
                    <svg class="w-24 h-24 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                        </path>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-3">
                    @if (request('kategori'))
                        Tidak Ada Produk di Kategori Ini
                    @else
                        Belum Ada Produk
                    @endif
                </h3>
                <p class="text-gray-600 text-lg mb-8 max-w-md mx-auto leading-relaxed">
                    @if (request('kategori'))
                        Maaf, belum ada produk dalam kategori <span
                            class="font-semibold text-primary-600">{{ request('kategori') }}</span>. Coba
                        pilih kategori lain atau lihat semua produk.
                    @else
                        Produk akan segera ditambahkan. Silakan kembali lagi nanti untuk melihat koleksi produk
                        UMKM kami.
                    @endif
                </p>
                @if (request('kategori'))
                    <a href="{{ route('produk.list') }}"
                        class="inline-flex items-center bg-primary-600 text-white px-8 py-3.5 rounded-xl font-semibold hover:bg-primary-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                            </path>
                        </svg>
                        Lihat Semua Produk
                    </a>
                @endif
            </div>
            @endif
            </main>
        </div>
    </div>

    <!-- Pagination styles moved to resources/css/app.css -->
@endsection

@push('scripts')
    <script>
        (function () {
            const params = new URLSearchParams(window.location.search);
            const highlight = params.get('highlight');
            if (!highlight) return;

            const el = document.getElementById('produk-' + highlight);
            if (!el) return;

            // Smooth scroll into center-ish view
            el.scrollIntoView({ behavior: 'smooth', block: 'center' });

            // create dim overlay behind content
            const overlay = document.createElement('div');
            overlay.id = 'highlight-overlay';
            overlay.style.position = 'fixed';
            overlay.style.inset = '0';
            overlay.style.background = 'rgba(0,0,0,0.45)';
            overlay.style.zIndex = '45';
            overlay.style.backdropFilter = 'blur(2px)';
            document.body.appendChild(overlay);

            // bring element above overlay and add strong shadow + ring
            el.style.position = 'relative';
            el.style.zIndex = '50';
            el.classList.add('shadow-2xl');
            el.classList.add('ring-8', 'ring-primary-500/40');

            // temporary pulse animation
            el.classList.add('transition-transform', 'duration-300');
            el.classList.add('scale-105');
            setTimeout(() => el.classList.remove('scale-105'), 800);

            // Remove highlight after 5 seconds (5000 ms)
            const removeHighlight = () => {
                if (overlay && overlay.parentNode) overlay.parentNode.removeChild(overlay);
                el.classList.remove('shadow-2xl', 'ring-8', 'ring-primary-500/40');
                el.style.zIndex = '';
            };

            const timeoutId = setTimeout(removeHighlight, 1500);

            // dismiss early when overlay clicked or when highlighted card clicked
            overlay.addEventListener('click', () => {
                clearTimeout(timeoutId);
                removeHighlight();
            });

            el.addEventListener('click', () => {
                clearTimeout(timeoutId);
                removeHighlight();
            });
        })();

        // Product Gallery Carousel Functionality
        (function() {
            // Initialize carousels for each product
            document.querySelectorAll('.carousel').forEach(carousel => {
                const images = carousel.querySelectorAll('.gallery-image');
                const indicators = carousel.querySelectorAll('.indicator');
                const prevBtn = carousel.querySelector('.prev-image');
                const nextBtn = carousel.querySelector('.next-image');
                let currentIndex = 0;

                function showImage(index) {
                    images.forEach((img, i) => {
                        img.classList.toggle('hidden', i !== index);
                    });
                    indicators.forEach((indicator, i) => {
                        indicator.classList.toggle('bg-white', i === index);
                        indicator.classList.toggle('bg-white/50', i !== index);
                    });
                    currentIndex = index;
                }

                function nextImage() {
                    const nextIndex = (currentIndex + 1) % images.length;
                    showImage(nextIndex);
                }

                function prevImage() {
                    const prevIndex = (currentIndex - 1 + images.length) % images.length;
                    showImage(prevIndex);
                }

                // Event listeners
                if (nextBtn) nextBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    nextImage();
                });

                if (prevBtn) prevBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    prevImage();
                });

                indicators.forEach((indicator, index) => {
                    indicator.addEventListener('click', (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        showImage(index);
                    });
                });

                // Auto-play functionality (optional)
                let autoplayInterval;
                function startAutoplay() {
                    autoplayInterval = setInterval(nextImage, 3000);
                }

                function stopAutoplay() {
                    clearInterval(autoplayInterval);
                }

                // Start autoplay on hover, stop on mouse leave
                carousel.addEventListener('mouseenter', startAutoplay);
                carousel.addEventListener('mouseleave', stopAutoplay);
            });
        })();
    </script>
@endpush

@section('cta')
    <!-- Call to Action -->
    <div
        class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white py-20 overflow-hidden">
        <!-- Decorative Background -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-white opacity-5 rounded-full"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-white opacity-5 rounded-full"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-full">
                <svg class="w-full h-full opacity-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                    <defs>
                        <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                            <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5" />
                        </pattern>
                    </defs>
                    <rect width="100" height="100" fill="url(#grid)" />
                </svg>
            </div>
        </div>

        <div class="container mx-auto px-4 text-center relative z-10">
            <!-- Icon -->
            <div class="inline-flex items-center justify-center w-20 h-20 bg-white/10 backdrop-blur-sm rounded-full mb-6">
                <svg class="w-10 h-10 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
            </div>

            <!-- Content -->
            <h2 class="text-4xl md:text-5xl font-bold mb-4 tracking-tight">Ingin Menjadi Mitra Kami?</h2>
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-2xl mx-auto leading-relaxed">
                Mari bergabung dan berkontribusi untuk memajukan UMKM serta membangun generasi muda yang lebih baik
            </p>

            <!-- Benefits -->
            <div class="flex flex-wrap justify-center gap-4 mb-10">
                <div
                    class="bg-white/10 backdrop-blur-sm px-5 py-3 rounded-full text-sm font-semibold flex items-center space-x-2">
                    <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span>Gratis Bergabung</span>
                </div>
                <div
                    class="bg-white/10 backdrop-blur-sm px-5 py-3 rounded-full text-sm font-semibold flex items-center space-x-2">
                    <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span>Pendampingan Usaha</span>
                </div>
                <div
                    class="bg-white/10 backdrop-blur-sm px-5 py-3 rounded-full text-sm font-semibold flex items-center space-x-2">
                    <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span>Platform Marketing</span>
                </div>
            </div>

            <!-- CTA Button -->
            <a href="{{ route('kontak.index') }}"
                class="inline-flex items-center justify-center bg-white text-primary-600 px-10 py-4 rounded-xl font-bold text-lg hover:bg-accent hover:text-primary-700 transition-all duration-300 shadow-2xl hover:shadow-accent/50 transform hover:scale-105 group">
                <span>Hubungi Kami Sekarang</span>
                <svg class="w-6 h-6 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6">
                    </path>
                </svg>
            </a>
        </div>
    </div>

    <!-- WhatsApp Script -->
    <script>
        function pesanWhatsApp(namaProduk, harga) {
            // Nomor WhatsApp Admin dari database
            @if (isset($kontak) && $kontak && $kontak->whatsapp)
                const nomorAdmin = '{{ $kontak->whatsapp }}';
            @else
                const nomorAdmin = '6285725040030'; // Nomor default jika belum diset
                console.warn('Nomor WhatsApp admin belum diatur di database');
            @endif

            // Template pesan
            const pesan = `Halo Admin Karang Taruna,

Saya tertarik dengan produk berikut:

📦 Produk: *${namaProduk}*
💰 Harga: *${harga}*

Mohon informasi lebih lanjut mengenai produk ini.

Terima kasih!`;

            // Encode pesan untuk URL
            const pesanEncoded = encodeURIComponent(pesan);

            // Buat URL WhatsApp
            const urlWhatsApp = `https://wa.me/${nomorAdmin}?text=${pesanEncoded}`;

            // Buka WhatsApp di tab baru
            window.open(urlWhatsApp, '_blank');
        }
    </script>
@endsection
