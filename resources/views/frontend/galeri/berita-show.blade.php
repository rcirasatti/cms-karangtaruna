@extends('layouts.app')

@section('navbar_transparent')
@endsection

@section('title', $kegiatan->judul . ' - Arsip Berita Karang Taruna')

@section('content')
    <!-- Meta Tags untuk SEO -->
    <meta name="description" content="{{ Str::limit($kegiatan->deskripsi, 160) }}">
    <meta property="og:title" content="{{ $kegiatan->judul }}">
    <meta property="og:description" content="{{ Str::limit($kegiatan->deskripsi, 160) }}">
    @if ($kegiatan->thumbnail)
        <meta property="og:image" content="{{ asset('storage/' . $kegiatan->thumbnail) }}">
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
    @endif
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:type" content="article">
    <meta property="article:published_time" content="{{ $kegiatan->created_at->toIso8601String() }}">
    <meta property="article:modified_time" content="{{ $kegiatan->updated_at->toIso8601String() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $kegiatan->judul }}">
    <meta name="twitter:description" content="{{ Str::limit($kegiatan->deskripsi, 160) }}">
    @if ($kegiatan->thumbnail)
        <meta name="twitter:image" content="{{ asset('storage/' . $kegiatan->thumbnail) }}">
    @endif

    <!-- Hero Section dengan Breadcrumb -->
    <div class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white py-16 md:py-24">
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-white opacity-5 rounded-full -ml-48 -mb-48"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-6xl mx-auto">
                <!-- Breadcrumb -->
                <nav class="flex items-center space-x-2 text-sm text-blue-200 mb-6">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <a href="{{ route('galeri.index') }}" class="hover:text-white transition-colors">Gallery</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <a href="{{ route('galeri.berita') }}" class="hover:text-white transition-colors">Arsip Berita</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-white font-medium">{{ Str::limit($kegiatan->judul, 40) }}</span>
                </nav>

                <!-- Title dengan Icon -->
                <div class="flex items-start space-x-4 mb-6">
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-2xl flex-shrink-0">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" />
                            <path d="M4 8h16M4 12h16M4 16h12" stroke="white" stroke-width="1.5" fill="none" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold tracking-tight mb-2">{{ $kegiatan->judul }}</h1>
                        <p class="text-xl text-blue-100">{{ Str::limit($kegiatan->deskripsi, 100) }}</p>
                    </div>
                </div>

                <!-- Info Stats -->
                <div class="flex items-center space-x-6 flex-wrap gap-4">
                    <div class="flex items-center space-x-3 bg-white/10 backdrop-blur-sm px-4 py-3 rounded-xl">
                        <svg class="w-5 h-5 text-accent flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v2h16V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5H4v8a2 2 0 002 2h12a2 2 0 002-2V7h-2v1a1 1 0 11-2 0V7h-4v1a1 1 0 11-2 0V7H6v1a1 1 0 11-2 0V7z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <div class="text-xs text-blue-100 font-medium">Tanggal</div>
                            <div class="font-semibold">{{ $kegiatan->tanggal_kegiatan->format('d M Y') }}</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3 bg-white/10 backdrop-blur-sm px-4 py-3 rounded-xl">
                        <svg class="w-5 h-5 text-accent flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
                            </path>
                        </svg>
                        <div>
                            <div class="text-xs text-blue-100 font-medium">Kategori</div>
                            <div class="font-semibold capitalize">{{ $kegiatan->kategori }}</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3 bg-white/10 backdrop-blur-sm px-4 py-3 rounded-xl">
                        <svg class="w-5 h-5 text-accent flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <div class="text-xs text-blue-100 font-medium">Baca</div>
                            <div class="font-semibold">
                                {{ ceil(str_word_count(strip_tags($kegiatan->isi ?? $kegiatan->deskripsi)) / 200) }} min
                            </div>
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
                    <!-- Featured Image -->
                    @if ($kegiatan->thumbnail)
                        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden mb-8 border border-gray-100">
                            <div class="relative w-full aspect-video bg-gray-300">
                                <img src="{{ asset('storage/' . $kegiatan->thumbnail) }}" alt="{{ $kegiatan->judul }}"
                                    loading="lazy" class="w-full h-full object-cover">
                                <!-- Badge -->
                                <div
                                    class="absolute top-4 right-4 bg-primary-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                                    Berita
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Main Content -->
                        <div class="lg:col-span-2">
                            <!-- Title and Info -->
                            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100 mb-8">
                                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">{{ $kegiatan->judul }}</h1>

                                <!-- Content -->
                                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed mb-8">
                                    <p class="text-lg text-gray-700 mb-6">{{ $kegiatan->deskripsi }}</p>

                                    @if ($kegiatan->isi)
                                        <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 my-6">
                                            {!! nl2br(e($kegiatan->isi)) !!}
                                        </div>
                                    @endif
                                </div>

                                <!-- Share Section -->
                                <div class="border-t border-gray-200 pt-6">
                                    <h3 class="text-lg font-bold text-gray-800 mb-4">Bagikan</h3>
                                    <div class="flex flex-wrap gap-3">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                            target="_blank" rel="noopener noreferrer"
                                            class="inline-flex items-center space-x-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                            aria-label="Bagikan ke Facebook">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                aria-hidden="true">
                                                <path d="M8 1h4v3H8V1z" />
                                            </svg>
                                            <span>Facebook</span>
                                        </a>
                                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($kegiatan->judul . ' - ' . request()->url()) }}"
                                            target="_blank" rel="noopener noreferrer"
                                            class="inline-flex items-center space-x-2 px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-400"
                                            aria-label="Bagikan ke Twitter">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                aria-hidden="true">
                                                <path
                                                    d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-7.556 3.769 11.986 11.986 0 01-8.702-4.413 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.95 11.95 0 006.29 1.84" />
                                            </svg>
                                            <span>Twitter</span>
                                        </a>
                                        <a href="https://api.whatsapp.com/send?text={{ urlencode($kegiatan->judul . ' - ' . request()->url()) }}"
                                            target="_blank" rel="noopener noreferrer"
                                            class="inline-flex items-center space-x-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                            aria-label="Bagikan ke WhatsApp">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                aria-hidden="true">
                                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                                            </svg>
                                            <span>WhatsApp</span>
                                        </a>
                                        <button onclick="copyToClipboard()"
                                            class="inline-flex items-center space-x-2 px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                                            aria-label="Salin link">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            <span>Salin Link</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Galeri Foto Section -->
                        @if ($kegiatan->media_path && is_array($kegiatan->media_path) && count($kegiatan->media_path) > 0)
                            <div
                                class="bg-gradient-to-br from-white via-blue-50 to-white rounded-2xl shadow-lg p-8 border border-blue-100 mb-8 overflow-hidden">
                                <!-- Decorative background -->
                                <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>

                                <div class="relative z-10">
                                    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                                        <div class="bg-blue-100 p-2 rounded-lg mr-3 border-2 border-blue-200">
                                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                        <span>Galeri Foto <span
                                                class="text-blue-600 font-bold ml-2 bg-blue-100 px-3 py-1 rounded-full text-lg">{{ count($kegiatan->media_path) }}</span></span>
                                    </h2>

                                    <p class="text-gray-600 text-sm mb-6">Klik foto untuk preview fullscreen</p>

                                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                        @foreach ($kegiatan->media_path as $index => $media)
                                            <div class="group relative aspect-square overflow-hidden rounded-xl border-2 border-blue-200 hover:border-blue-500 transition-all duration-300 cursor-pointer shadow-md hover:shadow-lg transform hover:scale-105"
                                                onclick="openLightbox({{ $index }})"
                                                style="background: linear-gradient(135deg, #e0e7ff 0%, #dbeafe 100%);">
                                                <img src="{{ asset('storage/' . $media) }}"
                                                    alt="Galeri {{ $kegiatan->judul }} - {{ $index + 1 }}"
                                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                                    loading="lazy">
                                                <div
                                                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col items-center justify-center">
                                                    <svg class="w-12 h-12 text-white mb-2 group-hover:scale-125 transition-transform duration-300"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7">
                                                        </path>
                                                    </svg>
                                                    <p class="text-white text-xs font-semibold">Preview</p>
                                                </div>
                                                <div
                                                    class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                    <p class="text-white text-xs font-semibold">Foto
                                                        {{ $index + 1 }}/{{ count($kegiatan->media_path) }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Enhanced Lightbox Modal -->
                            <div id="lightbox"
                                class="fixed inset-0 bg-black/95 backdrop-blur-sm z-50 hidden items-center justify-center p-4"
                                onclick="closeLightbox(event)">
                                <!-- Close Button -->
                                <button onclick="closeLightbox(event)"
                                    class="absolute top-4 right-4 z-50 bg-white/10 hover:bg-white/20 text-white p-2 rounded-lg transition-all duration-200 group">
                                    <svg class="w-8 h-8 group-hover:scale-110 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>

                                <!-- Previous Button -->
                                <button onclick="previousImage(event)"
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 z-50 bg-white/10 hover:bg-white/20 text-white p-3 rounded-lg transition-all duration-200 group hidden sm:block">
                                    <svg class="w-8 h-8 group-hover:scale-125 transition-transform group-hover:-translate-x-1"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </button>

                                <!-- Image Display -->
                                <div class="flex flex-col items-center justify-center max-w-4xl w-full">
                                    <img id="lightbox-image" src="" alt="Preview"
                                        class="max-w-full max-h-[70vh] object-contain rounded-lg shadow-2xl border-4 border-white/20">

                                    <!-- Mobile Navigation Buttons -->
                                    <div class="flex gap-3 mt-6 sm:hidden w-full justify-center">
                                        <button onclick="previousImage(event)"
                                            class="flex-1 bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg transition-all flex items-center justify-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                            <span>Prev</span>
                                        </button>
                                        <button onclick="nextImage(event)"
                                            class="flex-1 bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg transition-all flex items-center justify-center gap-2">
                                            <span>Next</span>
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Next Button -->
                                <button onclick="nextImage(event)"
                                    class="absolute right-4 top-1/2 transform -translate-y-1/2 z-50 bg-white/10 hover:bg-white/20 text-white p-3 rounded-lg transition-all duration-200 group hidden sm:block">
                                    <svg class="w-8 h-8 group-hover:scale-125 transition-transform group-hover:translate-x-1"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>

                                <!-- Caption & Counter -->
                                <div class="absolute bottom-4 left-0 right-0 text-center">
                                    <p id="lightbox-caption"
                                        class="text-lg font-semibold text-white bg-black/50 backdrop-blur-sm py-2 px-4 rounded-full inline-block">
                                    </p>
                                </div>
                            </div>
                        @endif

                        <!-- Video Section -->
                        @if ($kegiatan->link_video)
                            <div
                                class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-2xl shadow-xl p-8 border border-slate-700 mb-8 overflow-hidden">
                                <!-- Decorative gradient overlay -->
                                <div class="absolute inset-0 bg-gradient-to-r from-primary-600/10 to-accent/10 opacity-50">
                                </div>

                                <div class="relative z-10">
                                    <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
                                        <div
                                            class="bg-accent/20 backdrop-blur-sm p-2 rounded-lg mr-3 border border-accent/30">
                                            <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <span
                                            class="text-transparent bg-clip-text bg-gradient-to-r from-accent to-yellow-300">Video
                                            Kegiatan</span>
                                    </h2>

                                    <div
                                        class="relative aspect-video bg-gradient-to-br from-slate-800 to-slate-900 rounded-xl overflow-hidden border-2 border-accent/30 shadow-2xl">
                                        @php
                                            $videoUrl = $kegiatan->link_video;
                                            $embedUrl = '';

                                            // Convert YouTube URL to embed URL
                                            if (
                                                preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $videoUrl, $matches)
                                            ) {
                                                $embedUrl = 'https://www.youtube.com/embed/' . $matches[1];
                                            } elseif (preg_match('/youtu\.be\/([^\&\?\/]+)/', $videoUrl, $matches)) {
                                                $embedUrl = 'https://www.youtube.com/embed/' . $matches[1];
                                            } elseif (
                                                preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $videoUrl, $matches)
                                            ) {
                                                $embedUrl = $videoUrl;
                                            } else {
                                                $embedUrl = $videoUrl;
                                            }
                                        @endphp

                                        <iframe src="{{ $embedUrl }}" title="Video {{ $kegiatan->judul }}"
                                            class="w-full h-full" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </div>

                                    <div class="mt-6 flex items-center justify-between flex-wrap gap-4">
                                        <p class="text-slate-300 text-sm font-medium">
                                            🎬 Video dari Kegiatan: <span
                                                class="text-accent font-semibold">{{ $kegiatan->judul }}</span>
                                        </p>
                                        <a href="{{ $kegiatan->link_video }}" target="_blank" rel="noopener noreferrer"
                                            class="inline-flex items-center space-x-2 bg-accent/20 hover:bg-accent/30 text-accent hover:text-yellow-300 border border-accent/50 hover:border-accent px-4 py-2.5 rounded-lg font-semibold transition-all duration-300 group">
                                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                                </path>
                                            </svg>
                                            <span>Buka di YouTube</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Sidebar -->
                    <div>
                        <!-- Info Card -->
                        <div
                            class="bg-gradient-to-br from-primary-600 to-primary-700 rounded-2xl shadow-lg p-6 border border-primary-500 text-white">
                            <h3 class="text-lg font-bold mb-4">Informasi Berita</h3>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm text-primary-100 font-medium">Tanggal</p>
                                    <p class="text-lg font-semibold">{{ $kegiatan->tanggal_kegiatan->format('d F Y') }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm text-primary-100 font-medium">Kategori</p>
                                    <p class="text-lg font-semibold capitalize">{{ $kegiatan->kategori }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Berita Section -->
    <div class="bg-white py-16 border-t border-gray-200">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-12">Berita Terkait</h2>
                @php
                    $relatedArticles = \App\Models\Berita::where('id', '!=', $kegiatan->id)
                        ->latest('tanggal_kegiatan')
                        ->limit(3)
                        ->get();
                @endphp

                @if ($relatedArticles->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($relatedArticles as $related)
                            <a href="{{ route('galeri.berita.show', $related->id) }}" class="group">
                                <div
                                    class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-primary-200 transform hover:-translate-y-1 h-full flex flex-col">
                                    <div class="relative h-40 bg-gradient-to-br from-gray-200 to-gray-300 overflow-hidden">
                                        @if ($related->thumbnail)
                                            <img src="{{ asset('storage/' . $related->thumbnail) }}"
                                                alt="{{ $related->judul }}" loading="lazy"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <div
                                                class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-200 to-primary-300">
                                                <svg class="w-12 h-12 text-white/50" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-4 flex flex-col flex-grow">
                                        <h3
                                            class="text-sm font-bold text-gray-800 group-hover:text-primary-600 transition-colors mb-2 line-clamp-2">
                                            {{ $related->judul }}</h3>
                                        <p class="text-gray-600 text-xs mb-3 line-clamp-2 flex-grow">
                                            {{ $related->deskripsi }}</p>
                                        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                                            <span
                                                class="text-gray-500 text-xs font-medium">{{ $related->tanggal_kegiatan->format('d M Y') }}</span>
                                            <span
                                                class="text-primary-600 font-semibold group-hover:text-primary-700 text-xs">Baca
                                                →</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="bg-gray-50 rounded-xl p-8 text-center border border-gray-200">
                        <p class="text-gray-600">Tidak ada berita terkait saat ini.</p>
                        <a href="{{ route('galeri.berita') }}"
                            class="inline-block mt-4 text-primary-600 hover:text-primary-700 font-medium">
                            ← Kembali ke Arsip Berita
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Keyboard Navigation Script -->
    <script>
        // Lightbox functionality
        let currentImageIndex = 0;
        const images = @json($kegiatan->media_path ?? []);

        function openLightbox(index) {
            currentImageIndex = index;
            showImage();
            document.getElementById('lightbox').classList.remove('hidden');
            document.getElementById('lightbox').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox(event) {
            if (event.target.id === 'lightbox' || event.target.closest('button')) {
                document.getElementById('lightbox').classList.add('hidden');
                document.getElementById('lightbox').classList.remove('flex');
                document.body.style.overflow = 'auto';
            }
        }

        function showImage() {
            if (images.length > 0) {
                const imagePath = images[currentImageIndex];
                document.getElementById('lightbox-image').src = '{{ asset('storage') }}/' + imagePath;
                document.getElementById('lightbox-caption').textContent =
                    `Foto ${currentImageIndex + 1} dari ${images.length}`;
            }
        }

        function nextImage(event) {
            event.stopPropagation();
            currentImageIndex = (currentImageIndex + 1) % images.length;
            showImage();
        }

        function previousImage(event) {
            event.stopPropagation();
            currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
            showImage();
        }

        // Keyboard navigation for lightbox
        document.addEventListener('keydown', function(e) {
            const lightbox = document.getElementById('lightbox');
            if (!lightbox.classList.contains('hidden')) {
                if (e.key === 'Escape') {
                    lightbox.classList.add('hidden');
                    lightbox.classList.remove('flex');
                    document.body.style.overflow = 'auto';
                } else if (e.key === 'ArrowRight') {
                    nextImage(e);
                } else if (e.key === 'ArrowLeft') {
                    previousImage(e);
                }
            }
        });

        // Copy to clipboard function
        function copyToClipboard() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(() => {
                alert('Link berhasil disalin!');
            }).catch(() => {
                const textarea = document.createElement('textarea');
                textarea.value = url;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);
                alert('Link berhasil disalin!');
            });
        }
    </script>

@endsection
