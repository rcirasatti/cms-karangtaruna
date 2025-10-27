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
    <div
        class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white py-20 md:py-32 md:h-[420px] h-auto overflow-hidden">
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
    <div class="bg-white">
        <div class="container mx-auto px-4 py-8 max-w-7xl">
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Main Article Content -->
                <article class="lg:col-span-2 space-y-12 mr-0 md:mr-15">
                    <!-- Article Header -->
                    <header class="mb-6">
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-4">
                            {{ $kegiatan->judul }}
                        </h1>

                        <!-- Author & Meta Info -->
                        <div class="flex items-center gap-4 text-sm text-gray-600 mb-4">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-10 h-10 rounded-full bg-primary-600 flex items-center justify-center text-white font-semibold">
                                    KT
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Karang Taruna</p>
                                    <p class="text-xs text-gray-500">Tim Redaksi</p>
                                </div>
                            </div>
                            <span class="hidden md:block">·</span>
                            <time class="text-gray-600">
                                {{ $kegiatan->tanggal_kegiatan->format('d F Y') }}
                            </time>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center gap-3 pb-6 border-b border-gray-200">


                            <!-- Share Menu Dropdown -->
                            <div id="shareMenu"
                                class="hidden absolute mt-2 right-4 bg-white border border-gray-200 rounded-lg shadow-lg p-2 z-10">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                    target="_blank"
                                    class="flex items-center gap-3 px-4 py-2 hover:bg-gray-50 rounded-lg transition-colors">
                                    <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                    </svg>
                                    <span class="text-sm font-medium">Facebook</span>
                                </a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($kegiatan->judul . ' - ' . request()->url()) }}"
                                    target="_blank"
                                    class="flex items-center gap-3 px-4 py-2 hover:bg-gray-50 rounded-lg transition-colors">
                                    <svg class="w-5 h-5 text-sky-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                    </svg>
                                    <span class="text-sm font-medium">Twitter</span>
                                </a>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($kegiatan->judul . ' - ' . request()->url()) }}"
                                    target="_blank"
                                    class="flex items-center gap-3 px-4 py-2 hover:bg-gray-50 rounded-lg transition-colors">
                                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                    </svg>
                                    <span class="text-sm font-medium">WhatsApp</span>
                                </a>
                                <button onclick="copyToClipboard()"
                                    class="w-full flex items-center gap-3 px-4 py-2 hover:bg-gray-50 rounded-lg transition-colors">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span class="text-sm font-medium">Salin Link</span>
                                </button>
                            </div>
                        </div>
                    </header>

                    <!-- Featured Image -->
                    @if ($kegiatan->thumbnail)
                        <figure class="mb-6">
                            <img src="{{ asset('storage/' . $kegiatan->thumbnail) }}" alt="{{ $kegiatan->judul }}"
                                loading="lazy" class="w-full rounded-lg shadow-lg">

                            <!-- Gallery Photos -->
                            @if ($kegiatan->media_path && is_array($kegiatan->media_path) && count($kegiatan->media_path) > 0)
                                <div class="mb-4 mt-6">
                                    <h3
                                        class="text-base sm:text-lg font-bold text-gray-900 mb-3 sm:mb-4 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Galeri Foto ({{ count($kegiatan->media_path) }})
                                    </h3>
                                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2 sm:gap-3">
                                        @foreach ($kegiatan->media_path as $index => $media)
                                            @if ($index < 8)
                                                <div class="relative aspect-square overflow-hidden rounded-lg cursor-pointer group shadow-md hover:shadow-xl transition-shadow {{ $index === 7 && count($kegiatan->media_path) > 8 ? 'relative' : '' }}"
                                                    onclick="openLightbox({{ $index }})">
                                                    <img src="{{ asset('storage/' . $media) }}"
                                                        alt="Foto {{ $index + 1 }}"
                                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                                        loading="lazy">

                                                    @if ($index === 7 && count($kegiatan->media_path) > 8)
                                                        <div
                                                            class="absolute inset-0 bg-black/70 flex items-center justify-center backdrop-blur-sm">
                                                            <span
                                                                class="text-white text-2xl sm:text-3xl font-bold">+{{ count($kegiatan->media_path) - 8 }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Lightbox Modal -->
                                <div id="lightbox"
                                    class="flex fixed inset-0 bg-black/95 backdrop-blur-sm z-50 hidden items-center justify-center p-2 sm:p-4"
                                    onclick="closeLightbox(event)">
                                    <button onclick="closeLightbox(event)"
                                        class="absolute top-2 right-2 sm:top-4 sm:right-4 z-50 bg-white/10 hover:bg-white/20 text-white p-2 sm:p-3 rounded-lg transition-all">
                                        <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>

                                    <button onclick="previousImage(event)"
                                        class="absolute left-2 sm:left-4 top-1/2 transform -translate-y-1/2 z-50 bg-white/10 hover:bg-white/20 text-white p-2 sm:p-3 rounded-lg transition-all">
                                        <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7">
                                            </path>
                                        </svg>
                                    </button>

                                    <div class="flex flex-col items-center justify-center max-w-5xl w-full px-2 sm:px-4">
                                        <img id="lightbox-image" src="" alt="Preview"
                                            class="max-w-full max-h-[calc(100vh-120px)] sm:max-h-[calc(100vh-150px)] object-contain rounded-lg shadow-2xl">

                                        <!-- Image Counter -->
                                        <div class="mt-4 text-center">
                                            <p id="lightbox-caption"
                                                class="text-sm sm:text-base lg:text-lg font-semibold text-white bg-black/50 backdrop-blur-sm py-2 px-4 sm:px-6 rounded-full inline-block">
                                            </p>
                                        </div>
                                    </div>

                                    <button onclick="nextImage(event)"
                                        class="absolute right-2 sm:right-4 top-1/2 transform -translate-y-1/2 z-50 bg-white/10 hover:bg-white/20 text-white p-2 sm:p-3 rounded-lg transition-all">
                                        <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            @endif
                            <figcaption class="mt-3 text-sm text-gray-500 text-center">
                                {{ $kegiatan->judul }} (Karang Taruna)
                            </figcaption>
                        </figure>
                    @endif

                    <!-- Article Content -->
                    <div class="prose prose-lg max-w-none mb-8">
                        <p class="text-lg text-gray-800 font-sm text-justify whitespace-pre-line leading-relaxed mb-6">
                            {{ $kegiatan->deskripsi }}
                        </p>

                        @if ($kegiatan->isi)
                            <div class="text-gray-700 leading-relaxed space-y-4">
                                {!! nl2br(e($kegiatan->isi)) !!}
                            </div>
                        @endif
                    </div>

                    <!-- Video Section -->
                    @if ($kegiatan->link_video)
                        <div class="mb-8">
                            <h3 class="text-base sm:text-lg font-bold text-gray-900 mb-3 sm:mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                                </svg>
                                Video Kegiatan
                            </h3>
                            <div class="relative aspect-video bg-gray-900 rounded-lg overflow-hidden shadow-xl">
                                @php
                                    $videoUrl = $kegiatan->link_video;
                                    $embedUrl = '';
                                    if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $videoUrl, $matches)) {
                                        $embedUrl = 'https://www.youtube.com/embed/' . $matches[1];
                                    } elseif (preg_match('/youtu\.be\/([^\&\?\/]+)/', $videoUrl, $matches)) {
                                        $embedUrl = 'https://www.youtube.com/embed/' . $matches[1];
                                    } elseif (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $videoUrl, $matches)) {
                                        $embedUrl = $videoUrl;
                                    } else {
                                        $embedUrl = $videoUrl;
                                    }
                                @endphp
                                <iframe src="{{ $embedUrl }}" title="Video {{ $kegiatan->judul }}"
                                    class="absolute inset-0 w-full h-full" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen loading="lazy">
                                </iframe>
                            </div>
                            <p class="mt-2 text-xs sm:text-sm text-gray-500 text-center">
                                Tonton video kegiatan {{ $kegiatan->judul }}
                            </p>
                        </div>
                    @endif
                </article>

                <!-- Sidebar -->
                <aside class="lg:w-80 space-y-6">
                    <!-- News Info Card -->
                    <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Informasi Berita</h3>
                        <div class="space-y-4">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Kategori</p>
                                <span
                                    class="inline-block bg-primary-100 text-primary-700 px-3 py-1 rounded-full text-sm font-medium capitalize">
                                    {{ $kegiatan->kategori }}
                                </span>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Tanggal</p>
                                <p class="text-gray-900 font-medium">{{ $kegiatan->tanggal_kegiatan->format('d F Y') }}
                                </p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Waktu Baca</p>
                                <p class="text-gray-900 font-medium">
                                    {{ ceil(str_word_count(strip_tags($kegiatan->isi ?? $kegiatan->deskripsi)) / 200) }}
                                    menit
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Related Articles -->
                    @php
                        $relatedArticles = \App\Models\Berita::where('id', '!=', $kegiatan->id)
                            ->latest('tanggal_kegiatan')
                            ->limit(4)
                            ->get();
                    @endphp

                    <div class="mt-5">
                        @if ($relatedArticles->count() > 0)
                            <h3 class="text-lg font-bold text-gray-900">Artikel Terkait</h3>
                            <div class="bg-gradient-to-r from-primary-600 to-primary-700 h-1 w-40%"></div>
                            <div class="bg-white rounded-lg mt-5">
                                <div class="space-y-5">
                                    @foreach ($relatedArticles as $index => $related)
                                        <a href="{{ route('galeri.berita.show', $related->id) }}" class="block group">
                                            <div class="flex gap-3">
                                                @if ($related->thumbnail)
                                                    <div
                                                        class="w-32 h-24 flex-shrink-0 overflow-hidden rounded-lg bg-gray-100">
                                                        <img src="{{ asset('storage/' . $related->thumbnail) }}"
                                                            alt="{{ $related->judul }}"
                                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                                    </div>
                                                @else
                                                    <div
                                                        class="w-32 h-24 flex-shrink-0 overflow-hidden rounded-lg bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                                        <svg class="w-8 h-8 text-gray-400" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                @endif
                                                <div class="flex-1 min-w-0">
                                                    <h4
                                                        class="text-sm font-bold text-gray-900 group-hover:text-primary-600 transition-colors line-clamp-2 mb-2 leading-snug">
                                                        {{ $related->judul }}
                                                    </h4>
                                                    <p class="text-xs text-gray-500">
                                                        {{ $related->tanggal_kegiatan->format('d F Y H:i') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        @if (!$loop->last)
                                            <hr class="border-gray-200">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="bg-gray-50 rounded-lg p-6 text-center border border-gray-200">
                                <p class="text-gray-600 text-sm">Tidak ada berita terkait saat ini.</p>
                                <a href="{{ route('galeri.berita') }}"
                                    class="inline-block mt-3 text-primary-600 hover:text-primary-700 font-medium text-sm">
                                    ← Kembali ke Arsip Berita
                                </a>
                            </div>
                        @endif
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <!-- Keyboard Navigation Script -->
    <script>
        // Toggle share menu
        function toggleShareMenu() {
            const menu = document.getElementById('shareMenu');
            menu.classList.toggle('hidden');
        }

        // Close share menu when clicking outside
        document.addEventListener('click', function(event) {
            const shareButton = event.target.closest('button[onclick="toggleShareMenu()"]');
            const shareMenu = document.getElementById('shareMenu');

            if (!shareButton && shareMenu && !shareMenu.contains(event.target)) {
                shareMenu.classList.add('hidden');
            }
        });

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

        // Touch swipe for mobile lightbox navigation
        let touchStartX = 0;
        let touchEndX = 0;

        const lightboxImage = document.getElementById('lightbox-image');

        if (lightboxImage) {
            lightboxImage.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            }, {
                passive: true
            });

            lightboxImage.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleLightboxSwipe();
            }, {
                passive: true
            });
        }

        function handleLightboxSwipe() {
            const lightbox = document.getElementById('lightbox');
            if (lightbox.classList.contains('hidden') || images.length <= 1) return;

            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;

            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    // Swipe left - next image
                    const event = new Event('click');
                    nextImage(event);
                } else {
                    // Swipe right - previous image
                    const event = new Event('click');
                    previousImage(event);
                }
            }
        }

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
