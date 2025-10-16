@extends('layouts.app')

@section('navbar_transparent')
@endsection

@section('title', $kegiatan->judul . ' - Berita Karang Taruna')

@section('content')
    <!-- Meta Tags untuk SEO -->
    <meta name="description" content="{{ Str::limit($kegiatan->deskripsi, 160) }}">
    <meta property="og:title" content="{{ $kegiatan->judul }}">
    <meta property="og:description" content="{{ Str::limit($kegiatan->deskripsi, 160) }}">
    @if($kegiatan->thumbnail)
        <meta property="og:image" content="{{ $kegiatan->thumbnail }}">
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
    @if($kegiatan->thumbnail)
        <meta name="twitter:image" content="{{ $kegiatan->thumbnail }}">
    @endif

    <!-- Back Button Section -->
    <div class="bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <a href="{{ route('galeri.berita') }}" class="inline-flex items-center space-x-2 text-blue-200 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-300 rounded" aria-label="Kembali ke Arsip Berita">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span>Kembali ke Arsip Berita</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-gray-100 py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <!-- Featured Image -->
                @if($kegiatan->thumbnail)
                    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden mb-8 border border-gray-100">
                        <div class="relative w-full aspect-video bg-gray-300">
                            <img src="{{ $kegiatan->thumbnail }}" alt="{{ $kegiatan->judul }}" 
                                 loading="lazy" class="w-full h-full object-cover">
                            <!-- Badge -->
                            <div class="absolute top-4 right-4 bg-primary-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                                Kegiatan
                            </div>
                        </div>
                    </div>
                @endif

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Main Content -->
                    <div class="lg:col-span-2">
                        <!-- Title and Info -->
                        <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100 mb-8">
                            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $kegiatan->judul }}</h1>
                            
                            <!-- Meta Information -->
                            <div class="flex flex-wrap gap-6 text-sm text-gray-600 pb-6 border-b border-gray-200 mb-6">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-primary-600" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v2h16V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5H4v8a2 2 0 002 2h12a2 2 0 002-2V7h-2v1a1 1 0 11-2 0V7h-4v1a1 1 0 11-2 0V7H6v1a1 1 0 11-2 0V7z" clip-rule="evenodd"></path>
                                    </svg>
                                    <time datetime="{{ $kegiatan->tanggal_kegiatan->format('Y-m-d') }}" class="font-medium">{{ $kegiatan->tanggal_kegiatan->format('d F Y') }}</time>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-primary-600" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                                    </svg>
                                    <span class="font-medium">Kegiatan Karang Taruna</span>
                                </div>
                                <div class="flex items-center space-x-2" title="Estimasi waktu baca">
                                    <svg class="w-5 h-5 text-primary-600" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="font-medium">{{ ceil(str_word_count(strip_tags($kegiatan->isi ?? $kegiatan->deskripsi)) / 200) }} min baca</span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed mb-8">
                                <p class="text-lg text-gray-700 mb-6">{{ $kegiatan->deskripsi }}</p>
                                
                                @if($kegiatan->isi)
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
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M8 1h4v3H8V1z"/>
                                        </svg>
                                        <span>Facebook</span>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($kegiatan->judul . ' - ' . request()->url()) }}" 
                                       target="_blank" rel="noopener noreferrer" 
                                       class="inline-flex items-center space-x-2 px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-400"
                                       aria-label="Bagikan ke Twitter">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-7.556 3.769 11.986 11.986 0 01-8.702-4.413 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.95 11.95 0 006.29 1.84"/>
                                        </svg>
                                        <span>Twitter</span>
                                    </a>
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode($kegiatan->judul . ' - ' . request()->url()) }}" 
                                       target="_blank" rel="noopener noreferrer" 
                                       class="inline-flex items-center space-x-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                       aria-label="Bagikan ke WhatsApp">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"/>
                                        </svg>
                                        <span>WhatsApp</span>
                                    </a>
                                    <button onclick="copyToClipboard()" 
                                            class="inline-flex items-center space-x-2 px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                                            aria-label="Salin link">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>Salin Link</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div>
                        <!-- Quick Links -->
                        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 mb-8 sticky top-24">
                            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                                <div class="bg-primary-50 p-2 rounded-lg mr-3">
                                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                    </svg>
                                </div>
                                Menu Galeri
                            </h3>
                            <div class="space-y-2">
                                <a href="{{ route('galeri.index') }}" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors font-medium border border-gray-100 hover:border-primary-200 focus:outline-none focus:ring-2 focus:ring-primary-500">
                                    ← Semua Galeri
                                </a>
                                <a href="{{ route('galeri.foto') }}" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors font-medium border border-gray-100 hover:border-primary-200 focus:outline-none focus:ring-2 focus:ring-primary-500">
                                    📸 Galeri Foto
                                </a>
                                <a href="{{ route('galeri.video') }}" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors font-medium border border-gray-100 hover:border-primary-200 focus:outline-none focus:ring-2 focus:ring-primary-500">
                                    🎬 Galeri Video
                                </a>
                                <a href="{{ route('galeri.berita') }}" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors font-medium border border-gray-100 hover:border-primary-200 focus:outline-none focus:ring-2 focus:ring-primary-500">
                                    📰 Arsip Berita
                                </a>
                            </div>
                        </div>

                        <!-- Info Card -->
                        <div class="bg-gradient-to-br from-primary-600 to-primary-700 rounded-2xl shadow-lg p-6 border border-primary-500 text-white">
                            <h3 class="text-lg font-bold mb-4">Informasi Kegiatan</h3>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm text-primary-100 font-medium">Tanggal Kegiatan</p>
                                    <p class="text-lg font-semibold">{{ $kegiatan->tanggal_kegiatan->format('d F Y') }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-primary-100 font-medium">Tipe Konten</p>
                                    <p class="text-lg font-semibold capitalize">{{ $kegiatan->kategori }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Previous / Next Navigation -->
    <div class="bg-gradient-to-r from-primary-50 to-blue-50 py-8 border-t border-b border-primary-200">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto grid grid-cols-2 gap-4">
                @php
                    $prevArticle = \App\Models\Kegiatan::where('tanggal_kegiatan', '<', $kegiatan->tanggal_kegiatan)
                        ->latest('tanggal_kegiatan')
                        ->first();
                    $nextArticle = \App\Models\Kegiatan::where('tanggal_kegiatan', '>', $kegiatan->tanggal_kegiatan)
                        ->oldest('tanggal_kegiatan')
                        ->first();
                @endphp

                @if($prevArticle)
                    <a href="{{ route('kegiatan.show', $prevArticle->id) }}" data-prev-article class="group text-left hover:text-primary-600 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500 rounded p-2">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            <div class="min-w-0">
                                <p class="text-xs text-gray-600 font-medium">← Artikel Sebelumnya</p>
                                <p class="text-sm font-semibold text-gray-800 group-hover:text-primary-600 truncate">{{ $prevArticle->judul }}</p>
                            </div>
                        </div>
                    </a>
                @else
                    <div></div>
                @endif

                @if($nextArticle)
                    <a href="{{ route('kegiatan.show', $nextArticle->id) }}" data-next-article class="group text-right hover:text-primary-600 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500 rounded p-2">
                        <div class="flex items-center justify-end space-x-3">
                            <div class="min-w-0">
                                <p class="text-xs text-gray-600 font-medium">Artikel Berikutnya →</p>
                                <p class="text-sm font-semibold text-gray-800 group-hover:text-primary-600 truncate">{{ $nextArticle->judul }}</p>
                            </div>
                            <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </a>
                @else
                    <div></div>
                @endif
            </div>
        </div>
    </div>

    <!-- Related Kegiatan Section -->
    <div class="bg-white py-16 border-t border-gray-200">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-800 mb-12">Berita Terkait</h2>
                @php
                    $relatedArticles = \App\Models\Kegiatan::where('id', '!=', $kegiatan->id)
                        ->latest('tanggal_kegiatan')
                        ->limit(3)
                        ->get();
                @endphp

                @if($relatedArticles->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($relatedArticles as $related)
                            <a href="{{ route('kegiatan.show', $related->id) }}" class="group">
                                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-primary-200 transform hover:-translate-y-1 h-full flex flex-col">
                                    <div class="relative h-40 bg-gradient-to-br from-gray-200 to-gray-300 overflow-hidden">
                                        @if($related->thumbnail)
                                            <img src="{{ $related->thumbnail }}" alt="{{ $related->judul }}" 
                                                 loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-200 to-primary-300">
                                                <svg class="w-12 h-12 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-4 flex flex-col flex-grow">
                                        <h3 class="text-sm font-bold text-gray-800 group-hover:text-primary-600 transition-colors mb-2 line-clamp-2">{{ $related->judul }}</h3>
                                        <p class="text-gray-600 text-xs mb-3 line-clamp-2 flex-grow">{{ $related->deskripsi }}</p>
                                        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                                            <span class="text-gray-500 text-xs font-medium">{{ $related->tanggal_kegiatan->format('d M Y') }}</span>
                                            <span class="text-primary-600 font-semibold group-hover:text-primary-700 text-xs">Baca →</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="bg-gray-50 rounded-xl p-8 text-center border border-gray-200">
                        <p class="text-gray-600">Tidak ada berita terkait saat ini.</p>
                        <a href="{{ route('galeri.berita') }}" class="inline-block mt-4 text-primary-600 hover:text-primary-700 font-medium">
                            ← Kembali ke Arsip Berita
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Keyboard Navigation Script -->
    <script>
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

        // Keyboard navigation support
        document.addEventListener('keydown', function(e) {
            const prevLink = document.querySelector('[data-prev-article]');
            const nextLink = document.querySelector('[data-next-article]');
            
            if (e.key === 'ArrowLeft' && prevLink) {
                e.preventDefault();
                window.location.href = prevLink.href;
            }
            if (e.key === 'ArrowRight' && nextLink) {
                e.preventDefault();
                window.location.href = nextLink.href;
            }
        });
    </script>

@endsection
