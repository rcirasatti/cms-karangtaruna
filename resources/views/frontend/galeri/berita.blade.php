@extends('layouts.app')

@section('navbar_transparent')
@endsection

@section('title', 'Arsip Berita - Karang Taruna')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white py-32 md:h-[420px] h-[420px] overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-white opacity-5 rounded-full -ml-48 -mb-48"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-6xl mx-auto">
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
                    <span class="text-white font-medium">Arsip Berita</span>
                </nav>

                <!-- Title dengan Icon -->
                <div class="flex items-center space-x-4 mb-4">
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-2xl">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/>
                            <path d="M4 8h16M4 12h16M4 16h12" stroke="white" stroke-width="1.5" fill="none"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold tracking-tight">Arsip Berita</h1>
                        <p class="mt-2 text-xl text-blue-100">Dokumentasi lengkap kegiatan dan berita Karang Taruna</p>
                    </div>
                </div>

                <!-- Stats -->
                <div class="flex items-center space-x-6 mt-8 flex-wrap gap-4">
                    <div class="flex items-center space-x-3 bg-white/10 backdrop-blur-sm px-4 py-3 rounded-xl hover:bg-white/20 transition-colors">
                        <div class="bg-accent/20 p-2 rounded-lg">
                            <svg class="w-6 h-6 text-accent" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs text-blue-100 font-medium">Total Berita</div>
                            <div class="text-2xl font-bold text-white">{{ $kegiatans->total() }}</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3 bg-white/10 backdrop-blur-sm px-4 py-3 rounded-xl hover:bg-white/20 transition-colors">
                        <div class="bg-accent/20 p-2 rounded-lg">
                            <svg class="w-6 h-6 text-accent" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v2h16V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5H4v8a2 2 0 002 2h12a2 2 0 002-2V7h-2v1a1 1 0 11-2 0V7h-4v1a1 1 0 11-2 0V7H6v1a1 1 0 11-2 0V7z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs text-blue-100 font-medium">Update Terbaru</div>
                            <div class="text-sm text-blue-50 font-semibold">Setiap hari</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-gray-100 pt-6 pb-16 md:py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Filter -->
                <aside class="lg:w-72 flex-shrink-0">
                    <div class="bg-white rounded-2xl shadow-xl p-6 sticky top-24 border border-gray-100 space-y-6">
                        <!-- Filter Header -->
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 flex items-center mb-6">
                                <div class="bg-primary-50 p-2 rounded-lg mr-3">
                                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                    </svg>
                                </div>
                                <span>Filter & Cari</span>
                            </h3>

                            <!-- Search Box -->
                            <form method="GET" action="{{ route('galeri.berita') }}" class="relative mb-6 search-form" id="searchForm">
                                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <input type="text" name="search" value="{{ $search }}" placeholder="Cari berita..."
                                       class="w-full pl-10 pr-10 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 bg-gray-50 focus:bg-white text-sm"
                                       data-debounce="true" aria-label="Cari berita">
                                @if($search)
                                    <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-primary-500 rounded" 
                                            onclick="document.querySelector('[name=search]').value=''; document.getElementById('searchForm').submit();"
                                            aria-label="Hapus pencarian">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                @endif
                                <input type="hidden" name="sort" value="{{ $sort }}">
                                <input type="hidden" name="per_page" value="{{ $perPage }}">
                            </form>
                        </div>

                            <!-- Sort Options -->
                            <div class="border-t border-gray-200 pt-6">
                                <label class="block text-sm font-semibold text-gray-800 mb-3" for="sortSelect">Urutkan Berdasarkan</label>
                                <form method="GET" action="{{ route('galeri.berita') }}" class="relative" id="sortForm">
                                    <input type="hidden" name="search" value="{{ $search }}">
                                    <input type="hidden" name="per_page" value="{{ $perPage }}">
                                    <select name="sort" id="sortSelect" onchange="this.form.submit()" class="w-full appearance-none bg-white border border-gray-300 rounded-xl px-3 py-2.5 pr-8 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 text-sm font-medium cursor-pointer" aria-label="Urutkan berita berdasarkan">
                                        <option value="terbaru" {{ request('sort', 'terbaru') === 'terbaru' ? 'selected' : '' }}>📅 Terbaru</option>
                                        <option value="terlama" {{ request('sort') === 'terlama' ? 'selected' : '' }}>📅 Terlama</option>
                                        <option value="judul_az" {{ request('sort') === 'judul_az' ? 'selected' : '' }}>🔤 Judul (A-Z)</option>
                                        <option value="judul_za" {{ request('sort') === 'judul_za' ? 'selected' : '' }}>🔤 Judul (Z-A)</option>
                                    </select>
                                    <div class="absolute right-2 top-1/2 transform -translate-y-1/2 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                            </form>
                        </div>

                        <!-- Per Page Options -->
                        <div class="border-t border-gray-200 pt-6">
                            <label class="block text-sm font-semibold text-gray-800 mb-3" for="perPageSelect">Tampil Per Halaman</label>
                            <form method="GET" action="{{ route('galeri.berita') }}" class="relative" id="perPageForm">
                                <input type="hidden" name="search" value="{{ $search }}">
                                <input type="hidden" name="sort" value="{{ $sort }}">
                                <select name="per_page" id="perPageSelect" onchange="this.form.submit()" class="w-full appearance-none bg-white border border-gray-300 rounded-xl px-3 py-2.5 pr-8 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 text-sm font-medium cursor-pointer" aria-label="Tampil berita per halaman">
                                    <option value="5" {{ request('per_page', 10) == 5 ? 'selected' : '' }}>5 Berita</option>
                                    <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10 Berita</option>
                                    <option value="15" {{ request('per_page', 10) == 15 ? 'selected' : '' }}>15 Berita</option>
                                    <option value="25" {{ request('per_page', 10) == 25 ? 'selected' : '' }}>25 Berita</option>
                                </select>
                                <div class="absolute right-2 top-1/2 transform -translate-y-1/2 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </form>
                        </div>

                        <!-- Reset Button -->
                        <div class="border-t border-gray-200 pt-6">
                            <a href="{{ route('galeri.berita') }}" class="w-full block text-center px-4 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-xl text-sm font-semibold transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400" aria-label="Reset semua filter">
                                ↺ Reset Filter
                            </a>
                        </div>

                        <!-- Active Filters Display -->
                        @if ($search)
                            <div class="border-t border-gray-200 pt-6">
                                <span class="text-xs text-gray-600 font-semibold block mb-2">Pencarian aktif:</span>
                                <span class="inline-flex items-center bg-primary-100 text-primary-800 px-3 py-1 rounded-full text-xs font-medium">
                                    "{{ $search }}"
                                    <a href="{{ route('galeri.berita', ['sort' => $sort, 'per_page' => $perPage]) }}" class="ml-2 text-primary-600 hover:text-primary-800">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        @endif

                        <!-- Info Stats -->
                        <div class="border-t border-gray-200 pt-6 bg-primary-50 -mx-6 -mb-6 px-6 py-4 rounded-b-2xl">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-primary-600">{{ $kegiatans->total() }}</div>
                                <div class="text-sm text-primary-700 font-medium">Total Berita</div>
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- Main Content Area -->
                <div class="flex-1">
                    @if ($kegiatans->count() > 0)
                        <!-- Grid Berita - 3 Kolom dengan Cards Vertikal -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mb-12">
                            @foreach($kegiatans as $berita)
                                <a href="{{ route('galeri.berita.show', $berita->id) }}" class="group">
                                    <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col border border-gray-100 hover:border-primary-200 transform hover:-translate-y-1 h-full">
                                        <!-- Thumbnail -->
                                        <div class="relative h-44 bg-gradient-to-br from-gray-200 to-gray-300 overflow-hidden">
                                            @if($berita->thumbnail)
                                                <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->judul }}" 
                                                     loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-200 to-primary-300">
                                                    <svg class="w-12 h-12 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            @endif
                                            <!-- Badge Kategori -->
                                            @if($berita->kategori)
                                                <div class="absolute top-3 right-3 bg-white/95 backdrop-blur-sm text-primary-600 px-2.5 py-1 rounded-full text-xs font-bold shadow-lg border border-primary-100 group-hover:scale-110 transition-transform duration-300">
                                                    {{ $berita->kategori }}
                                                </div>
                                            @else
                                                <div class="absolute top-3 right-3 bg-primary-600 text-white px-2.5 py-1 rounded-full text-xs font-semibold group-hover:scale-110 transition-transform duration-300">
                                                    Berita
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Content -->
                                        <div class="p-4 flex flex-col flex-grow">
                                            <!-- Title -->
                                            <h3 class="text-lg font-bold text-gray-800 group-hover:text-primary-600 transition-colors mb-2 line-clamp-2 leading-tight">
                                                {{ $berita->judul }}
                                            </h3>

                                            <!-- Description -->
                                            <p class="text-gray-600 text-sm mb-3 line-clamp-2 leading-relaxed flex-grow">
                                                {{ Str::limit($berita->deskripsi, 100, '...') ?: 'Berita menarik dari Karang Taruna' }}
                                            </p>

                                            <!-- Meta Info -->
                                            <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                                                <div class="flex items-center space-x-2 text-gray-500 text-xs">
                                                    <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v2h16V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5H4v8a2 2 0 002 2h12a2 2 0 002-2V7h-2v1a1 1 0 11-2 0V7h-4v1a1 1 0 11-2 0V7H6v1a1 1 0 11-2 0V7z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="font-medium">
                                                        @if($berita->tanggal_kegiatan)
                                                            {{ \Carbon\Carbon::parse($berita->tanggal_kegiatan)->format('d M Y') }}
                                                        @else
                                                            {{ $berita->created_at->format('d M Y') }}
                                                        @endif
                                                    </span>
                                                </div>
                                                <span class="inline-flex items-center text-primary-600 font-semibold group-hover:text-primary-700 transition-colors text-xs">
                                                    Baca →
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="flex justify-center">
                            {{ $kegiatans->appends(request()->query())->links() }}
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="bg-white rounded-xl shadow-md p-12 text-center border border-gray-100">
                            <div class="flex justify-center mb-4">
                                <div class="bg-primary-100 rounded-full p-4">
                                    <svg class="w-16 h-16 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 6.253v13m0-13C6.228 6.228 2 10.228 2 15s4.228 8.772 10 8.772c5.772 0 10-3.94 10-8.772 0-4.772-4.228-8.747-10-8.747z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Berita Tidak Ditemukan</h3>
                            <p class="text-gray-600 mb-6">Belum ada berita yang sesuai dengan pencarian Anda.</p>
                            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                                <a href="{{ route('galeri.berita') }}" class="inline-block bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200">
                                    Lihat Semua Berita
                                </a>
                                <button onclick="history.back()" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-lg font-medium transition-colors duration-200">
                                    Kembali
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Search Debounce Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('[data-debounce="true"]');
            if (searchInput) {
                let searchTimeout;
                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => {
                        document.getElementById('searchForm').submit();
                    }, 500);
                });
            }
        });
    </script>

@endsection
