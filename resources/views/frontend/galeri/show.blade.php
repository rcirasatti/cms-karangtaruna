@extends('layouts.app')

@section('navbar_transparent')
@endsection

@section('title', $galeri->judul . ' - Galeri Karang Taruna')

@section('content')
    <!-- Back Button Section -->
    <div class="bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <a href="{{ request()->referrer ?? route('galeri.index') }}" class="inline-flex items-center space-x-2 text-blue-200 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span>Kembali ke Galeri</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-gray-100 py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <!-- Media Display -->
                <div class="bg-white rounded-2xl shadow-2xl overflow-hidden mb-8 border border-gray-100">
                    @if($galeri->tipe === 'foto')
                        <!-- Display Foto -->
                        <div class="relative w-full aspect-video bg-black">
                            <img src="{{ $galeri->url }}" alt="{{ $galeri->judul }}" 
                                 class="w-full h-full object-contain">
                        </div>
                    @else
                        <!-- Display Video (Embed YouTube/Vimeo) -->
                        <div class="relative w-full aspect-video bg-black">
                            @if(str_contains($galeri->url, 'youtube.com') || str_contains($galeri->url, 'youtu.be'))
                                @php
                                    // Extract YouTube video ID
                                    $videoId = '';
                                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?\s]{11})%i', $galeri->url, $match)) {
                                        $videoId = $match[1];
                                    }
                                @endphp
                                <iframe class="w-full h-full" 
                                        src="https://www.youtube.com/embed/{{ $videoId }}" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                </iframe>
                            @elseif(str_contains($galeri->url, 'vimeo.com'))
                                @php
                                    // Extract Vimeo video ID
                                    $videoId = '';
                                    if (preg_match('%vimeo\.com/(?:channels/(?:\w+/)?|groups/(?:[^/]+/)?videos/)?(\d+)(?:|/?)%', $galeri->url, $match)) {
                                        $videoId = $match[1];
                                    }
                                @endphp
                                <iframe class="w-full h-full" 
                                        src="https://player.vimeo.com/video/{{ $videoId }}" 
                                        frameborder="0" 
                                        allow="autoplay; fullscreen; picture-in-picture" 
                                        allowfullscreen>
                                </iframe>
                            @else
                                <!-- Fallback for direct video URL -->
                                <video class="w-full h-full" controls>
                                    <source src="{{ $galeri->url }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Main Content -->
                    <div class="lg:col-span-2">
                        <!-- Title and Info -->
                        <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100 mb-8">
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">{{ $galeri->judul }}</h1>
                                    <div class="flex flex-wrap gap-4 text-sm text-gray-600">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v2h16V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5H4v8a2 2 0 002 2h12a2 2 0 002-2V7h-2v1a1 1 0 11-2 0V7h-4v1a1 1 0 11-2 0V7H6v1a1 1 0 11-2 0V7z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span>{{ $galeri->created_at->format('d M Y') }}</span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 100 2H3a1 1 0 00-1 1v12a1 1 0 001 1h14a1 1 0 001-1V6a1 1 0 00-1-1h-3a1 1 0 100 2h2v11H4V5z" clip-rule="evenodd"></path>
                            </svg>
                                            <a href="{{ route('galeri.index', ['tipe' => $galeri->tipe]) }}" class="text-primary-600 hover:text-primary-700 font-medium">
                                                {{ ucfirst($galeri->tipe) }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-primary-100 text-primary-600 px-4 py-2 rounded-lg font-semibold">
                                    {{ ucfirst($galeri->tipe) }}
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        @if($galeri->deskripsi)
                            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100 mb-8">
                                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">Deskripsi</h2>
                                <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $galeri->deskripsi }}</p>
                            </div>
                        @endif

                        <!-- Kegiatan Info -->
                        @if($galeri->kegiatan)
                            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">Dari Kegiatan</h2>
                                <a href="{{ route('galeri.berita.show', $galeri->kegiatan->id) }}" class="group block">
                                    <div class="p-4 bg-gradient-to-br from-primary-50 to-blue-50 rounded-xl hover:shadow-md transition-shadow">
                                        <h3 class="text-lg font-semibold text-primary-600 group-hover:text-primary-700 transition-colors">
                                            {{ $galeri->kegiatan->judul }}
                                        </h3>
                                        <p class="text-sm text-gray-600 mt-2 line-clamp-2">
                                            {{ $galeri->kegiatan->deskripsi }}
                                        </p>
                                        <div class="mt-3 text-xs text-gray-500">
                                            {{ $galeri->kegiatan->tanggal->format('d M Y') }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Sidebar -->
                    <div>
                        <!-- Quick Links -->
                        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 mb-8">
                            <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-4">Menu Galeri</h3>
                            <div class="space-y-2">
                                <a href="{{ route('galeri.index') }}" class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors font-medium">
                                    ← Semua Galeri
                                </a>
                                <a href="{{ route('galeri.foto') }}" class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors font-medium">
                                    📸 Galeri Foto
                                </a>
                                <a href="{{ route('galeri.video') }}" class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors font-medium">
                                    🎬 Galeri Video
                                </a>
                                <a href="{{ route('galeri.berita') }}" class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors font-medium">
                                    📰 Arsip Berita
                                </a>
                            </div>
                        </div>

                        <!-- Share Section -->
                        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 mb-8">
                            <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-4">Bagikan</h3>
                            <div class="space-y-2">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" rel="noopener noreferrer" class="block px-4 py-2 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors font-medium text-center">
                                    Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($galeri->judul) }}" target="_blank" rel="noopener noreferrer" class="block px-4 py-2 rounded-lg bg-sky-50 text-sky-600 hover:bg-sky-100 transition-colors font-medium text-center">
                                    Twitter
                                </a>
                                <button onclick="navigator.clipboard.writeText('{{ request()->url() }}')" class="w-full px-4 py-2 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors font-medium">
                                    Salin Link
                                </button>
                            </div>
                        </div>

                        <!-- Related Galeri -->
                        @if($relatedGaleris->count() > 0)
                            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                                <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-4">Galeri Terkait</h3>
                                <div class="space-y-3">
                                    @foreach($relatedGaleris->take(3) as $related)
                                        <a href="{{ route('galeri.show', $related->id) }}" class="group block">
                                            <div class="flex items-start space-x-3 hover:bg-gray-50 p-3 rounded-lg transition-colors">
                                                <div class="w-16 h-16 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg overflow-hidden flex-shrink-0">
                                                    @if($related->tipe === 'foto')
                                                        <img src="{{ $related->url }}" alt="{{ $related->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                                    @else
                                                        <div class="w-full h-full bg-black/20 flex items-center justify-center">
                                                            <svg class="w-8 h-8 text-white/50" fill="currentColor" viewBox="0 0 24 24">
                                                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <h4 class="text-sm font-semibold text-gray-800 group-hover:text-primary-600 transition-colors line-clamp-2">
                                                        {{ $related->judul }}
                                                    </h4>
                                                    <p class="text-xs text-gray-500 mt-1">
                                                        {{ $related->created_at->format('d M Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
