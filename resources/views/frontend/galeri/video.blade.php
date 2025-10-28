@extends('layouts.app')

@section('navbar_transparent')
@endsection

@section('title', 'Galeri Video - Karang Taruna')

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
                    <span class="text-white font-medium">Video</span>
                </nav>

                <!-- Title dengan Icon -->
                <div class="flex items-center space-x-4 mb-4">
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-2xl">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold tracking-tight">Galeri Video</h1>
                        <p class="mt-2 text-xl text-blue-100">Video dokumentasi kegiatan dan momen spesial Karang Taruna</p>
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
                            <form method="GET" action="{{ route('galeri.video') }}" class="relative">
                                <input type="hidden" name="kegiatan_id" value="{{ $kegiatan_id }}">
                                <div class="relative">
                                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    <input type="text" name="search" value="{{ $search }}" placeholder="Cari video berdasarkan judul..."
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
                            <form method="GET" action="{{ route('galeri.video') }}" class="relative">
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

                        <!-- Link to Foto -->
                        <a href="{{ route('galeri.foto') }}" class="inline-block bg-secondary hover:bg-yellow-500 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            Lihat Foto
                        </a>
                    </div>
                </div>
            </div>

            <!-- Video Grid -->
            @if($galeris->count() > 0)
                <div class="max-w-6xl mx-auto">
                    <!-- Galeri Video -->
                    @if($galeris->count() > 0)
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                                <svg class="w-6 h-6 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                Galeri Video
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($galeris as $item)
                                    @php
                                        $videoUrl = $item->link_video;
                                        $videoId = '';
                                        
                                        // Extract YouTube video ID
                                        if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $videoUrl, $matches)) {
                                            $videoId = $matches[1];
                                        } elseif (preg_match('/youtu\.be\/([^\&\?\/]+)/', $videoUrl, $matches)) {
                                            $videoId = $matches[1];
                                        } elseif (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $videoUrl, $matches)) {
                                            $videoId = $matches[1];
                                        }
                                        
                                        $thumbnail = $videoId ? "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg" : ($item->thumbnail ? asset('storage/' . $item->thumbnail) : '');
                                        $embedUrl = $videoId ? "https://www.youtube.com/embed/{$videoId}?autoplay=1&rel=0" : $videoUrl;
                                    @endphp
                                    
                                    <a href="{{ route('galeri.berita.show', $item->id) }}" class="group block" 
                                       data-video-id="{{ $item->id }}"
                                       data-video-url="{{ $embedUrl }}"
                                       data-video-title="{{ $item->judul }}"
                                       data-video-description="{{ $item->deskripsi ?? 'Tidak ada deskripsi' }}"
                                       data-video-date="{{ $item->tanggal_kegiatan->format('d M Y') }}"
                                       data-video-category="{{ $item->kategori }}">
                                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 h-full flex flex-col border border-gray-100 hover:border-primary-200 transform hover:-translate-y-1">
                                            <!-- Video Thumbnail -->
                                            <div class="relative w-full aspect-video bg-black overflow-hidden">
                                                @if($thumbnail)
                                                    <img src="{{ $thumbnail }}" alt="{{ $item->judul }}" 
                                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                                         loading="lazy">
                                                @else
                                                    <div class="w-full h-full bg-gradient-to-br from-gray-800 to-black flex items-center justify-center">
                                                        <svg class="w-20 h-20 text-white/50" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                                                        </svg>
                                                    </div>
                                                @endif
                                                
                                                <!-- Play Button Overlay -->
                                                <div class="absolute inset-0 transition-all duration-300 flex items-center justify-center">
                                                    <button class="play-video-btn relative z-20 bg-accent hover:bg-yellow-400 text-primary-800 rounded-full w-16 h-16 flex items-center justify-center transform group-hover:scale-110 transition-all duration-300 shadow-2xl" 
                                                            onclick="event.preventDefault(); event.stopPropagation();"
                                                            title="Putar Video">
                                                        <svg class="w-7 h-7 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                
                                                <div class="absolute top-3 right-3 bg-accent text-primary-800 px-3 py-1 rounded-lg text-xs font-semibold flex items-center space-x-1 z-10">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                                                    </svg>
                                                    <span>Video</span>
                                                </div>
                                            </div>

                                            <!-- Content -->
                                            <div class="p-4 flex-1 flex flex-col">
                                                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-primary-600 transition-colors line-clamp-2">
                                                    {{ $item->judul }}
                                                </h3>
                                                <p class="text-sm text-gray-600 mt-2 line-clamp-2 flex-grow">
                                                    {{ $item->deskripsi ?? 'Tidak ada deskripsi' }}
                                                </p>
                                                <div class="mt-auto pt-4 border-t border-gray-100">
                                                    <div class="flex items-center justify-between text-xs">
                                                        <span class="font-medium text-primary-600">{{ $item->kategori }}</span>
                                                        <span class="text-gray-500">{{ $item->tanggal_kegiatan->format('d M Y') }}</span>
                                                    </div>
                                                    <!-- Hint text -->
                                                    <div class="mt-3 pt-3 border-t border-gray-50">
                                                        <p class="text-xs text-gray-400 italic">
                                                            <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                            </svg>
                                                            Klik tombol play untuk menonton, atau klik card untuk detail
                                                        </p>
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
                        <svg class="w-24 h-24 text-accent mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                        </svg>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Video Tidak Ditemukan</h3>
                        <p class="text-gray-600 mb-6">Belum ada video yang sesuai dengan filter Anda.</p>
                        <a href="{{ route('galeri.video') }}" class="inline-block bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                            Lihat Semua Video
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Video Modal -->
    <div id="videoModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-white/20 backdrop-blur-sm transition-all duration-300">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="relative w-full max-w-5xl bg-white rounded-2xl shadow-2xl overflow-hidden animate-fade-in">
                <!-- Close Button -->
                <button id="closeVideoModal" class="absolute top-4 right-4 z-50 bg-black/70 hover:bg-black/90 text-white p-2 rounded-full transition-all duration-300 group backdrop-blur-sm">
                    <svg class="w-6 h-6 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <!-- Video Container -->
                <div class="relative w-full bg-black" style="padding-bottom: 56.25%;">
                    <iframe id="videoPlayer" 
                            class="absolute inset-0 w-full h-full"
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                </div>

                <!-- Video Info -->
                <div class="p-6 bg-white">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 id="modalVideoTitle" class="text-2xl font-bold text-gray-800 mb-2"></h3>
                            <p id="modalVideoDescription" class="text-gray-600 mb-4"></p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm border-t pt-4">
                        <span id="modalVideoCategory" class="inline-flex items-center px-3 py-1 rounded-full bg-primary-100 text-primary-700 font-medium">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </span>
                        <span id="modalVideoDate" class="text-gray-500 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Modal Scripts -->
    <script>
        (function() {
            const modal = document.getElementById('videoModal');
            const videoPlayer = document.getElementById('videoPlayer');
            const closeBtn = document.getElementById('closeVideoModal');
            const playButtons = document.querySelectorAll('.play-video-btn');
            
            // Modal title and info elements
            const modalTitle = document.getElementById('modalVideoTitle');
            const modalDescription = document.getElementById('modalVideoDescription');
            const modalCategory = document.getElementById('modalVideoCategory');
            const modalDate = document.getElementById('modalVideoDate');

            // Open video modal when play button clicked
            playButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    // Get parent link element with data attributes
                    const card = this.closest('a');
                    const videoUrl = card.dataset.videoUrl;
                    const videoTitle = card.dataset.videoTitle;
                    const videoDescription = card.dataset.videoDescription;
                    const videoCategory = card.dataset.videoCategory;
                    const videoDate = card.dataset.videoDate;
                    
                    // Set video source
                    videoPlayer.src = videoUrl;
                    
                    // Set video info
                    modalTitle.textContent = videoTitle;
                    modalDescription.textContent = videoDescription;
                    modalCategory.textContent = videoCategory;
                    modalDate.textContent = videoDate;
                    
                    // Show modal
                    modal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                });
            });

            // Close video modal
            function closeModal() {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
                // Stop video by clearing src
                videoPlayer.src = '';
            }

            closeBtn.addEventListener('click', closeModal);

            // Close on backdrop click
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });

            // Close on Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });
        })();
    </script>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.3s ease-out;
        }
    </style>
@endsection
