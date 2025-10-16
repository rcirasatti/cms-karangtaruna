@extends('layouts.app')

@section('navbar_transparent')
@endsection

@section('title', 'Mitra - Karang Taruna')

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
                    <span class="text-blue-200">Product & Partners</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-white font-medium">Mitra/UMKM</span>
                </nav>

                <!-- Title dengan Icon -->
                <div class="flex items-center space-x-4 mb-4">
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-2xl">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-5xl font-bold tracking-tight">Mitra UMKM</h1>
                        <p class="mt-2 text-xl text-blue-100">Bersama mitra UMKM membangun ekonomi lokal yang berkelanjutan</p>
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
                        <span class="text-sm font-semibold">{{ $mitra->count() }} Mitra UMKM</span>
                    </div>
                    <div class="flex items-center space-x-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg">
                        <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm font-semibold">Kolaborasi Sukses</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimoni & Mitra Section -->
    <div class="bg-gray-100 py-16">
        <div class="container mx-auto px-4">
            <!-- Search and Filter Controls -->
            <div class="max-w-6xl mx-auto mb-12">
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">
                        <!-- Search Box -->
                        <div class="flex-1 max-w-md">
                            <form method="GET" action="{{ route('produk.mitra') }}" class="relative">
                                <input type="hidden" name="jenis" value="{{ $jenis }}">
                                <div class="relative">
                                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    <input type="text" name="search" value="{{ $search }}" placeholder="Cari mitra berdasarkan nama atau jenis..."
                                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 bg-gray-50 focus:bg-white">
                                    <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-primary-600 hover:bg-primary-700 text-white px-4 py-1.5 rounded-lg text-sm font-medium transition-colors">
                                        Cari
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Filter by Jenis -->
                        <div class="flex items-center space-x-3">
                            <span class="text-sm font-medium text-gray-700">Filter Jenis:</span>
                            <form method="GET" action="{{ route('produk.mitra') }}" class="relative">
                                <input type="hidden" name="search" value="{{ $search }}">
                                <select name="jenis" onchange="this.form.submit()"
                                        class="appearance-none bg-white border border-gray-300 rounded-xl px-4 py-3 pr-8 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 text-sm font-medium">
                                    <option value="">Semua Jenis</option>
                                    @foreach($jenisOptions as $jenisOption)
                                        <option value="{{ $jenisOption }}" {{ $jenis == $jenisOption ? 'selected' : '' }}>{{ $jenisOption }}</option>
                                    @endforeach
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
                    @if ($search || $jenis)
                        <div class="flex flex-wrap items-center gap-2 mt-4 pt-4 border-t border-gray-200">
                            <span class="text-sm text-gray-600 font-medium">Filter aktif:</span>
                            @if ($search)
                                <span class="inline-flex items-center bg-primary-100 text-primary-800 px-3 py-1 rounded-full text-sm font-medium">
                                    Pencarian: "{{ $search }}"
                                    <a href="{{ route('produk.mitra', ['jenis' => $jenis]) }}" class="ml-2 text-primary-600 hover:text-primary-800">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </a>
                                </span>
                            @endif
                            @if ($jenis)
                                <span class="inline-flex items-center bg-secondary-100 text-secondary-800 px-3 py-1 rounded-full text-sm font-medium">
                                    Jenis: {{ $jenis }}
                                    <a href="{{ route('produk.mitra', ['search' => $search]) }}" class="ml-2 text-secondary-600 hover:text-secondary-800">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </a>
                                </span>
                            @endif
                            <a href="{{ route('produk.mitra') }}" class="text-sm text-gray-500 hover:text-gray-700 font-medium ml-2">
                                Hapus semua filter
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Active Testimoni Display -->
            <div class="mb-12">
                <div class="max-w-4xl mx-auto text-center">
                    <!-- Testimoni Card -->
                    <div class="bg-white rounded-3xl shadow-2xl p-12 border-2 border-primary-100 mb-8">
                        <!-- Quote Icon -->
                        <div class="flex justify-center mb-8">
                            <div class="bg-gradient-to-br from-accent/20 to-secondary/30 backdrop-blur-sm p-6 rounded-full">
                                <svg class="w-12 h-12 text-primary-700" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14,17H17L19,13V7H13V13H16M6,17H9L11,13V7H5V13H8L6,17Z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Testimoni Text -->
                        <blockquote class="text-gray-800 text-2xl leading-relaxed mb-8 italic font-medium" id="active-testimoni">
                            @if($mitra->count() > 0)
                                "{{ $mitra->first()->testimoni ?? 'Memuat testimoni...' }}"
                            @else
                                "Mitra UMKM akan segera bergabung dengan ekosistem Karang Taruna untuk membangun ekonomi lokal yang lebih baik."
                            @endif
                        </blockquote>

                        <!-- Mitra Info -->
                        <div class="flex justify-center items-center space-x-6">
                            @if($mitra->count() > 0)
                                <div class="w-20 h-20 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full flex items-center justify-center text-white font-bold text-2xl shadow-lg ring-4 ring-accent/30" id="active-avatar">
                                    {{ substr($mitra->first()->nama_mitra ?? 'M', 0, 2) }}
                                </div>
                                <div class="text-left">
                                    <h4 class="font-bold text-gray-900 text-2xl mb-2" id="active-nama">{{ $mitra->first()->nama_mitra ?? 'Memuat...' }}</h4>
                                    <p class="text-primary-600 font-semibold text-lg" id="active-jenis">{{ $mitra->first()->jenis ?? 'UMKM' }}</p>
                                </div>
                            @else
                                <div class="w-20 h-20 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full flex items-center justify-center text-white font-bold text-2xl shadow-lg ring-4 ring-accent/30">
                                    KT
                                </div>
                                <div class="text-left">
                                    <h4 class="font-bold text-gray-900 text-2xl mb-2">Karang Taruna</h4>
                                    <p class="text-primary-600 font-semibold text-lg">Organisasi Pemuda</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mitra Scrolling Section -->
            <div class="bg-white rounded-3xl shadow-2xl p-12 border-2 border-primary-100">
                <div class="text-center mb-12">
                    <div class="inline-block">
                        <h3 class="text-3xl font-bold text-primary-700 mb-2">Mitra UMKM Kami</h3>
                        <div class="h-1 bg-gradient-to-r from-primary-400 via-accent to-primary-400 rounded-full"></div>
                    </div>
                    <p class="text-lg text-gray-600 mt-4">
                        Beragam UMKM lokal yang telah menjadi bagian dari ekosistem Karang Taruna
                    </p>
                </div>

                <!-- Scrolling Logo Container -->
                @if($mitra->count() > 0)
                <div class="relative overflow-x-auto overflow-y-hidden scroll-smooth" style="scrollbar-width: none; -ms-overflow-style: none;" id="scroll-container">
                    <!-- Gradient Overlays -->
                    <div class="absolute left-0 top-0 bottom-0 w-12 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none"></div>
                    <div class="absolute right-0 top-0 bottom-0 w-12 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none"></div>

                    <!-- Scrolling Animation -->
                    <div class="flex" id="mitra-container">
                        @foreach($mitra as $index => $item)
                        <div class="flex-shrink-0 mx-6 group mitra-item cursor-pointer"
                             data-index="{{ $index }}"
                             data-nama="{{ $item->nama_mitra }}"
                             data-jenis="{{ $item->jenis }}"
                             data-testimoni="{{ $item->testimoni }}"
                             data-deskripsi="{{ $item->deskripsi }}"
                             onclick="selectMitra({{ $index }})">
                            <div class="relative bg-white rounded-2xl p-6 transition-all duration-300 hover:shadow-xl border-2 border-gray-100 group-hover:border-primary-300 w-[280px] h-[280px] overflow-hidden">
                                <!-- Content Wrapper - Normal State -->
                                <div class="absolute inset-0 p-6 flex flex-col items-center justify-center transition-opacity duration-300 group-hover:opacity-0 z-10">
                                    <!-- Logo Placeholder -->
                                    <div class="w-24 h-24 bg-gradient-to-br from-primary-400 to-primary-600 rounded-xl flex items-center justify-center text-white font-bold text-2xl shadow-lg mb-4 flex-shrink-0">
                                        {{ substr($item->nama_mitra, 0, 2) }}
                                    </div>
                                    <!-- Mitra Name -->
                                    <h4 class="font-bold text-gray-900 text-center text-lg mb-2 line-clamp-2 px-2">{{ $item->nama_mitra }}</h4>
                                    <p class="text-primary-600 font-semibold text-center text-sm">{{ $item->jenis }}</p>
                                </div>

                                <!-- Hover Details - Full Card Overlay -->
                                <div class="absolute inset-0 p-6 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gradient-to-br from-primary-50 to-accent/20 z-20">
                                    <div class="w-16 h-16 bg-gradient-to-br from-primary-400 to-primary-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg mb-3 flex-shrink-0">
                                        {{ substr($item->nama_mitra, 0, 2) }}
                                    </div>
                                    <h4 class="font-bold text-gray-900 text-center text-base mb-2 line-clamp-2 px-2">{{ $item->nama_mitra }}</h4>
                                    <p class="text-primary-600 font-semibold text-center text-xs mb-3">{{ $item->jenis }}</p>
                                    <p class="text-gray-700 text-xs text-center leading-relaxed line-clamp-5 px-2">{{ $item->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <!-- Duplicate for seamless loop -->
                        @foreach($mitra as $index => $item)
                        <div class="flex-shrink-0 mx-6 group mitra-item cursor-pointer"
                             data-index="{{ $index }}"
                             data-nama="{{ $item->nama_mitra }}"
                             data-jenis="{{ $item->jenis }}"
                             data-testimoni="{{ $item->testimoni }}"
                             data-deskripsi="{{ $item->deskripsi }}"
                             onclick="selectMitra({{ $index }})">
                            <div class="relative bg-white rounded-2xl p-6 transition-all duration-300 hover:shadow-xl border-2 border-gray-100 group-hover:border-primary-300 w-[280px] h-[280px] overflow-hidden">
                                <!-- Content Wrapper - Normal State -->
                                <div class="absolute inset-0 p-6 flex flex-col items-center justify-center transition-opacity duration-300 group-hover:opacity-0 z-10">
                                    <!-- Logo Placeholder -->
                                    <div class="w-24 h-24 bg-gradient-to-br from-primary-400 to-primary-600 rounded-xl flex items-center justify-center text-white font-bold text-2xl shadow-lg mb-4 flex-shrink-0">
                                        {{ substr($item->nama_mitra, 0, 2) }}
                                    </div>
                                    <!-- Mitra Name -->
                                    <h4 class="font-bold text-gray-900 text-center text-lg mb-2 line-clamp-2 px-2">{{ $item->nama_mitra }}</h4>
                                    <p class="text-primary-600 font-semibold text-center text-sm">{{ $item->jenis }}</p>
                                </div>

                                <!-- Hover Details - Full Card Overlay -->
                                <div class="absolute inset-0 p-6 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gradient-to-br from-primary-50 to-accent/20 z-20">
                                    <div class="w-16 h-16 bg-gradient-to-br from-primary-400 to-primary-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg mb-3 flex-shrink-0">
                                        {{ substr($item->nama_mitra, 0, 2) }}
                                    </div>
                                    <h4 class="font-bold text-gray-900 text-center text-base mb-2 line-clamp-2 px-2">{{ $item->nama_mitra }}</h4>
                                    <p class="text-primary-600 font-semibold text-center text-xs mb-3">{{ $item->jenis }}</p>
                                    <p class="text-gray-700 text-xs text-center leading-relaxed line-clamp-5 px-2">{{ $item->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Navigation Dots dihapus karena tidak berfungsi dengan baik --}}
            </div>
                @else
                <!-- Empty State -->
                <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-100">
                    <div class="inline-block p-10 bg-gradient-to-br from-accent/20 to-secondary/20 rounded-full mb-8">
                        <svg class="w-24 h-24 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-3">
                        @if ($search || $jenis)
                            Tidak Ada Mitra Ditemukan
                        @else
                            Belum Ada Mitra
                        @endif
                    </h3>
                    <p class="text-gray-600 text-lg mb-8 max-w-md mx-auto leading-relaxed">
                        @if ($search || $jenis)
                            Maaf, tidak ada mitra yang sesuai dengan kriteria pencarian Anda.
                        @else
                            Mitra UMKM akan segera ditambahkan. Silakan kembali lagi nanti untuk melihat partner kami.
                        @endif
                    </p>
                    @if ($search || $jenis)
                        <a href="{{ route('produk.mitra') }}"
                            class="inline-flex items-center bg-primary-600 text-white px-8 py-3.5 rounded-xl font-semibold hover:bg-primary-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                            Lihat Semua Mitra
                        </a>
                    @endif
                </div>
                @endif
            </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
let currentIndex = 0;
let autoScrollInterval;
let mitraData = @json($mitra);
let isContinuousScrollActive = false;

function selectMitra(index) {
    currentIndex = index;
    updateActiveTestimoni(index);
    highlightActiveMitra(index);
    
    // Stop continuous scroll completely during manual selection
    stopContinuousScroll();
    
    // Scroll to active mitra after a brief delay to ensure UI updates
    setTimeout(() => {
        scrollToActiveMitra(index);
    }, 50);
}

function updateActiveTestimoni(index) {
    const mitra = mitraData[index];
    if (mitra) {
        document.getElementById('active-testimoni').textContent = `"${mitra.testimoni}"`;
        document.getElementById('active-nama').textContent = mitra.nama_mitra;
        document.getElementById('active-jenis').textContent = mitra.jenis;
        document.getElementById('active-avatar').textContent = mitra.nama_mitra.substring(0, 2);
    }
}

function scrollToActiveMitra(activeIndex) {
    // Get the scroll container and all mitra items
    const scrollContainer = document.getElementById('scroll-container');
    if (!scrollContainer) return;

    // Get all mitra items (first set only, not duplicates)
    const allItems = document.querySelectorAll('.mitra-item[data-index="' + activeIndex + '"]');
    if (allItems.length === 0) return;

    // Use the first occurrence
    const activeItem = allItems[0];
    
    // Calculate position to center the card
    const containerRect = scrollContainer.getBoundingClientRect();
    const itemRect = activeItem.getBoundingClientRect();
    
    // Calculate scroll position to center the item
    const scrollLeft = itemRect.left - containerRect.left - (containerRect.width / 2) + (itemRect.width / 2) + scrollContainer.scrollLeft;
    
    // Smooth scroll to position
    scrollContainer.scrollTo({
        left: scrollLeft,
        behavior: 'smooth'
    });
}

function updateNavigationDots(activeIndex) {
    // Fungsi ini tidak digunakan lagi karena navigation dots dihapus
    // const dots = document.querySelectorAll('.nav-dot');
    // dots.forEach((dot, index) => {
    //     if (index === activeIndex) {
    //         dot.classList.add('bg-primary-500');
    //         dot.classList.remove('bg-gray-300');
    //     } else {
    //         dot.classList.remove('bg-primary-500');
    //         dot.classList.add('bg-gray-300');
    //     }
    // });
}

function highlightActiveMitra(activeIndex) {
    // Remove active class from all items
    const allItems = document.querySelectorAll('.mitra-item');
    allItems.forEach(item => item.classList.remove('active'));

    // Add active class to current item (considering the duplicate items)
    const activeItems = document.querySelectorAll(`.mitra-item[data-index="${activeIndex}"]`);
    activeItems.forEach(item => item.classList.add('active'));
}

function pauseCSSAnimation() {
    // CSS animation removed, no need to pause
}

function resumeCSSAnimation() {
    // CSS animation removed, no need to resume
}

function startContinuousScroll() {
    if (isContinuousScrollActive) return; // Prevent multiple instances
    
    const container = document.getElementById('scroll-container');
    if (!container) return;

    isContinuousScrollActive = true;
    let scrollSpeed = 2; // pixels per frame
    let animationId;
    let lastUpdateTime = 0;

    function scroll(currentTime) {
        if (!isContinuousScrollActive) return; // Stop if disabled
        
        container.scrollLeft += scrollSpeed;
        
        // Reset to beginning when reaching the duplicate section
        if (container.scrollLeft >= container.scrollWidth / 2) {
            container.scrollLeft = 0;
        }
        
        // Update active mitra based on scroll position every 100ms
        if (currentTime - lastUpdateTime > 100) {
            updateActiveMitraFromScroll();
            lastUpdateTime = currentTime;
        }
        
        animationId = requestAnimationFrame(scroll);
    }

    scroll();
    
    // Store animation ID for pausing
    container.animationId = animationId;
}

function updateActiveMitraFromScroll() {
    const container = document.getElementById('scroll-container');
    if (!container) return;

    const containerRect = container.getBoundingClientRect();
    const containerCenter = containerRect.left + containerRect.width / 2;
    
    const mitraItems = document.querySelectorAll('.mitra-item');
    let closestItem = null;
    let closestDistance = Infinity;
    
    mitraItems.forEach((item, index) => {
        const itemRect = item.getBoundingClientRect();
        const itemCenter = itemRect.left + itemRect.width / 2;
        const distance = Math.abs(containerCenter - itemCenter);
        
        if (distance < closestDistance) {
            closestDistance = distance;
            closestItem = { element: item, index: index % mitraData.length }; // Use modulo for duplicate items
        }
    });
    
    if (closestItem && closestItem.index !== currentIndex) {
        currentIndex = closestItem.index;
        updateActiveTestimoni(currentIndex);
        highlightActiveMitra(currentIndex);
        resetAutoScroll(); // Reset timer when manually changed
    }
}

function stopContinuousScroll() {
    isContinuousScrollActive = false;
    const container = document.getElementById('scroll-container');
    if (container && container.animationId) {
        cancelAnimationFrame(container.animationId);
        container.animationId = null;
    }
}

function startAutoScroll() {
    // Auto scroll disabled - now testimoni changes based on scroll position
}

function resetAutoScroll() {
    // No need to reset since auto scroll is disabled
}

function pauseAutoScroll() {
    stopContinuousScroll();
}

function resumeAutoScroll() {
    startContinuousScroll();
}

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    // Only initialize carousel if there are mitra
    if (mitraData.length > 0) {
        highlightActiveMitra(0); // Highlight first mitra
        
        // Use setTimeout to ensure DOM is fully rendered before scrolling
        setTimeout(() => {
            scrollToActiveMitra(0); // Scroll to first mitra
            updateActiveTestimoni(0); // Update testimoni for first mitra
        }, 100);
        
        // Start continuous scroll
        startContinuousScroll();
    }

    // Pause on hover (only if container exists)
    const scrollContainer = document.getElementById('scroll-container');
    if (scrollContainer) {
        // When hovering on the container area, pause continuous scroll
        scrollContainer.addEventListener('mouseenter', pauseAutoScroll);
        scrollContainer.addEventListener('mouseleave', resumeAutoScroll);
    }

    // Navigation dots functionality removed
});
</script>
@endpush