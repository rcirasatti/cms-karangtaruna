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
    <div class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white py-20 md:py-32 md:h-[420px] h-auto overflow-hidden">
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
                                {{ $kegiatan->created_at->format('d/m/Y, H:i') }} WIB
                            </time>
                        </div>
                        
                        <!-- Share Section -->
                        <div class="mt-4">
                            <h3 class="text-sm font-semibold text-gray-600 mb-3">Bagikan</h3>
                            <div class="flex flex-wrap gap-2 pb-4">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                    target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center space-x-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 min-h-[44px] min-w-[44px]"
                                    aria-label="Bagikan ke Facebook">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M8 1h4v3H8V1z" />
                                    </svg>
                                    <span>Facebook</span>
                                </a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($kegiatan->judul . ' - ' . request()->url()) }}"
                                    target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center space-x-2 px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-400 min-h-[44px] min-w-[44px]"
                                    aria-label="Bagikan ke Twitter">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path
                                            d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-7.556 3.769 11.986 11.986 0 01-8.702-4.413 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.95 11.95 0 006.29 1.84" />
                                    </svg>
                                    <span>Twitter</span>
                                </a>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($kegiatan->judul . ' - ' . request()->url()) }}"
                                    target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center space-x-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 min-h-[44px] min-w-[44px]"
                                    aria-label="Bagikan ke WhatsApp">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                                    </svg>
                                    <span>WhatsApp</span>
                                </a>
                                <button onclick="copyToClipboard()"
                                    class="inline-flex items-center space-x-2 px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 min-h-[44px] min-w-[44px]"
                                    aria-label="Salin link">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>Salin Link</span>
                                </button>
                            </div>
                            <div class="border-t border-gray-200"></div>
                        </div>

                    </header>

                    <!-- Featured Image -->
                    @if ($kegiatan->thumbnail)
                        <figure class="mb-6">
                            <img src="{{ asset('storage/' . $kegiatan->thumbnail) }}" alt="{{ $kegiatan->judul }}"
                                loading="lazy" class="w-full rounded-lg">
                            <!-- Gallery Photos -->
                            @if ($kegiatan->media_path && is_array($kegiatan->media_path) && count($kegiatan->media_path) > 0)
                                <div class="mb-4 mt-4">
                                    <div class="flex flex-wrap justify-center items-center gap-3 py-3">
                                        @foreach ($kegiatan->media_path as $index => $media)
                                            @if ($index < 4)
                                                <div class="relative aspect-[4/3] overflow-hidden rounded-lg cursor-pointer group {{ $index === 3 && count($kegiatan->media_path) > 4 ? 'relative' : '' }}"
                                                    onclick="openLightbox({{ $index }})">
                                                    <img src="{{ asset('storage/' . $media) }}"
                                                        alt="Foto {{ $index + 1 }}"
                                                        class="w-[100px] h-[100px] object-cover group-hover:scale-110 transition-transform duration-300"
                                                        loading="lazy">

                                                    @if ($index === 3 && count($kegiatan->media_path) > 4)
                                                        <div
                                                            class="absolute inset-0 bg-black/70 flex items-center justify-center">
                                                            <span
                                                                class="text-white text-3xl font-bold">+{{ count($kegiatan->media_path) - 4 }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Lightbox Modal -->
                                <div id="lightbox"
                                    class="fixed inset-0 bg-black/95 backdrop-blur-sm z-50 hidden items-center justify-center p-4"
                                    onclick="closeLightbox(event)">
                                    <button onclick="closeLightbox(event)"
                                        class="absolute top-4 right-4 z-50 bg-white/10 hover:bg-white/20 text-white p-2 rounded-lg transition-all">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>

                                    <button onclick="previousImage(event)"
                                        class="absolute left-4 top-1/2 transform -translate-y-1/2 z-50 bg-white/10 hover:bg-white/20 text-white p-3 rounded-lg transition-all">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7">
                                            </path>
                                        </svg>
                                    </button>

                                    <div class="flex flex-col items-center justify-center max-w-4xl w-full">
                                        <img id="lightbox-image" src="" alt="Preview"
                                            class="max-w-full max-h-[70vh] object-contain rounded-lg">
                                    </div>

                                    <button onclick="nextImage(event)"
                                        class="absolute right-4 top-1/2 transform -translate-y-1/2 z-50 bg-white/10 hover:bg-white/20 text-white p-3 rounded-lg transition-all">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7">
                                            </path>
                                        </svg>
                                    </button>

                                    <div class="absolute bottom-4 left-0 right-0 text-center">
                                        <p id="lightbox-caption"
                                            class="text-lg font-semibold text-white bg-black/50 backdrop-blur-sm py-2 px-4 rounded-full inline-block">
                                        </p>
                                    </div>
                                </div>
                            @endif
                            <figcaption class="mt-3 text-sm text-gray-500 text-center">
                                {{ $kegiatan->judul }} (Karang Taruna)
                            </figcaption>
                        </figure>
                    @endif

                    <!-- Article Content -->
                    <div class="prose prose-lg max-w-none mb-8 border-b border-gray-200">
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
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Video Kegiatan</h3>
                            <div class="relative aspect-video bg-black rounded-lg overflow-hidden">
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
                                    class="w-full h-full" frameborder="0" loading="lazy"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
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

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-4 right-4 bg-gray-900 text-white px-6 py-3 rounded-lg shadow-lg transform translate-y-20 opacity-0 transition-all duration-300 ease-in-out z-50 flex items-center space-x-3">
        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <span id="toast-message">Link berhasil disalin!</span>
    </div>

    <!-- Keyboard Navigation Script -->
    <script>
        // Toast notification function
        function showToast(message, duration = 3000) {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toast-message');
            
            toastMessage.textContent = message;
            toast.classList.remove('translate-y-20', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
            
            setTimeout(() => {
                toast.classList.remove('translate-y-0', 'opacity-100');
                toast.classList.add('translate-y-20', 'opacity-0');
            }, duration);
        }

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
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox(event) {
            if (event.target.id === 'lightbox' || event.target.closest('button')) {
                const lightbox = document.getElementById('lightbox');
                lightbox.classList.add('hidden');
                lightbox.classList.remove('flex');
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

        // Copy to clipboard function with toast notification
        function copyToClipboard() {
            const url = window.location.href;
            
            // Try modern clipboard API first
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(url)
                    .then(() => {
                        showToast('Link berhasil disalin!');
                    })
                    .catch(() => {
                        // Fallback to old method
                        fallbackCopyToClipboard(url);
                    });
            } else {
                // Fallback for older browsers
                fallbackCopyToClipboard(url);
            }
        }

        function fallbackCopyToClipboard(text) {
            const textarea = document.createElement('textarea');
            textarea.value = text;
            textarea.style.position = 'fixed';
            textarea.style.opacity = '0';
            document.body.appendChild(textarea);
            textarea.select();
            
            try {
                document.execCommand('copy');
                showToast('Link berhasil disalin!');
            } catch (err) {
                showToast('Gagal menyalin link', 3000);
            }
            
            document.body.removeChild(textarea);
        }
    </script>

@endsection
