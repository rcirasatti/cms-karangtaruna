@extends('layouts.app')

@section('navbar_transparent')
@endsection

@section('title', 'Galeri Foto - Karang Taruna')

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
                    <span class="text-white font-medium">Foto</span>
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
                        <h1 class="text-4xl md:text-5xl font-bold tracking-tight">Galeri Foto</h1>
                        <p class="mt-2 text-xl text-blue-100">Koleksi foto-foto menarik dari kegiatan Karang Taruna</p>
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
                            <form method="GET" action="{{ route('galeri.foto') }}" class="relative">
                                <input type="hidden" name="kegiatan_id" value="{{ $kegiatan_id }}">
                                <div class="relative">
                                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    <input type="text" name="search" value="{{ $search }}" placeholder="Cari foto berdasarkan judul..."
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
                            <form method="GET" action="{{ route('galeri.foto') }}" class="relative">
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

                        <!-- Link to Video -->
                        <a href="{{ route('galeri.video') }}" class="inline-block bg-accent hover:bg-yellow-200 text-primary-800 px-6 py-3 rounded-lg font-semibold transition-colors">
                            Lihat Video
                        </a>
                    </div>
                </div>
            </div>

            <!-- Foto Grid -->
            @if($galeris->count() > 0)
                <div class="max-w-6xl mx-auto">
                    <!-- Galeri Foto -->
                    @if($galeris->count() > 0)
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                                <svg class="w-6 h-6 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Galeri Foto
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($galeris as $item)
                                    @if($item->media_path && is_array($item->media_path))
                                        <a href="{{ route('galeri.berita.show', $item->id) }}" class="group" id="foto-{{ $item->id }}">
                                            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-primary-200 transform hover:-translate-y-1 flex flex-col h-full group/gallery">
                                                <!-- Carousel Container -->
                                                <div class="relative aspect-square bg-gradient-to-br from-gray-200 to-gray-300 overflow-hidden {{ count($item->media_path) > 1 ? 'carousel' : '' }} select-none touch-pan-y" data-images="{{ json_encode($item->media_path) }}" style="cursor: grab;">
                                                    @foreach($item->media_path as $index => $media)
                                                        <img src="{{ asset('storage/' . $media) }}" 
                                                             alt="{{ $item->judul }} - {{ $index + 1 }}" 
                                                             class="w-full h-full object-cover transition-transform duration-300 {{ $index === 0 ? 'block' : 'hidden' }} gallery-image pointer-events-none"
                                                             data-index="{{ $index }}"
                                                             loading="lazy">
                                                    @endforeach

                                                    @if(count($item->media_path) > 1)
                                                        <!-- Navigation Arrows -->
                                                        <button class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white p-1.5 rounded-full transition-all opacity-0 md:group-hover/gallery:opacity-100 prev-image z-10" data-target="foto-{{ $item->id }}">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                            </svg>
                                                        </button>
                                                        <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white p-1.5 rounded-full transition-all opacity-0 md:group-hover/gallery:opacity-100 next-image z-10" data-target="foto-{{ $item->id }}">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                            </svg>
                                                        </button>

                                                        <!-- Image Indicators -->
                                                        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-1 z-10">
                                                            @for ($i = 0; $i < count($item->media_path); $i++)
                                                                <button class="w-2 h-2 rounded-full transition-all {{ $i === 0 ? 'bg-white' : 'bg-white/50' }} indicator" data-target="foto-{{ $item->id }}" data-index="{{ $i }}"></button>
                                                            @endfor
                                                        </div>

                                                        <!-- Multiple Images Badge -->
                                                        <div class="absolute top-3 left-3 z-10">
                                                            <span class="bg-black/70 backdrop-blur-sm text-white px-2 py-1 rounded-full text-xs font-medium flex items-center">
                                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                                </svg>
                                                                {{ count($item->media_path) }}
                                                            </span>
                                                        </div>

                                                        <!-- Swipe Hint (Mobile Only) -->
                                                        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 md:hidden swipe-hint opacity-0 animate-pulse">
                                                            <div class="bg-black/70 backdrop-blur-sm text-white px-3 py-1.5 rounded-full text-xs font-medium flex items-center">
                                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                                                                </svg>
                                                                Geser
                                                                <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                
                                                <!-- Content -->
                                                <div class="p-4 flex flex-col flex-grow bg-white">
                                                    <h3 class="text-sm font-semibold text-gray-800 group-hover:text-primary-600 transition-colors line-clamp-2">
                                                        {{ $item->judul }}
                                                    </h3>
                                                    <p class="text-xs text-gray-500 mt-2">
                                                        {{ $item->tanggal_kegiatan->format('d M Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
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
                        <svg class="w-24 h-24 text-primary-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Foto Tidak Ditemukan</h3>
                        <p class="text-gray-600 mb-6">Belum ada foto yang sesuai dengan filter Anda.</p>
                        <a href="{{ route('galeri.foto') }}" class="inline-block bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                            Lihat Semua Foto
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Carousel JavaScript -->
    <script>
        // Gallery Carousel Functionality
        (function() {
            // Initialize carousels for each gallery item
            document.querySelectorAll('.carousel').forEach(carousel => {
                const container = carousel.closest('[id^="foto-"]');
                const targetId = container?.id;
                
                if (!targetId) return;
                
                const images = carousel.querySelectorAll('.gallery-image');
                const indicators = carousel.querySelectorAll('.indicator');
                const prevBtn = container.querySelector(`.prev-image[data-target="${targetId}"]`);
                const nextBtn = container.querySelector(`.next-image[data-target="${targetId}"]`);
                const swipeHint = carousel.querySelector('.swipe-hint');
                let currentIndex = 0;

                // Touch/Swipe variables
                let touchStartX = 0;
                let touchEndX = 0;
                let touchStartY = 0;
                let touchEndY = 0;
                let isDragging = false;

                // Show swipe hint on mobile for first carousel only (once)
                if (swipeHint && window.innerWidth < 768) {
                    const hasSeenHint = localStorage.getItem('gallerySwipeHintSeen');
                    if (!hasSeenHint) {
                        setTimeout(() => {
                            swipeHint.classList.remove('opacity-0');
                            swipeHint.classList.add('opacity-100');
                            setTimeout(() => {
                                swipeHint.classList.remove('opacity-100');
                                swipeHint.classList.add('opacity-0');
                                localStorage.setItem('gallerySwipeHintSeen', 'true');
                            }, 3000);
                        }, 500);
                    }
                }

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

                function handleSwipe() {
                    const diffX = touchEndX - touchStartX;
                    const diffY = touchEndY - touchStartY;
                    const minSwipeDistance = 50;
                    
                    // Check if horizontal swipe is more dominant than vertical
                    if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > minSwipeDistance) {
                        if (diffX > 0) {
                            // Swiped right - show previous image
                            prevImage();
                        } else {
                            // Swiped left - show next image
                            nextImage();
                        }
                    }
                }

                // Touch Event Listeners for Mobile/Tablet
                carousel.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                    touchStartY = e.changedTouches[0].screenY;
                    isDragging = true;
                    stopAutoplay();
                }, { passive: true });

                carousel.addEventListener('touchmove', (e) => {
                    if (!isDragging) return;
                    touchEndX = e.changedTouches[0].screenX;
                    touchEndY = e.changedTouches[0].screenY;
                }, { passive: true });

                carousel.addEventListener('touchend', (e) => {
                    if (!isDragging) return;
                    touchEndX = e.changedTouches[0].screenX;
                    touchEndY = e.changedTouches[0].screenY;
                    handleSwipe();
                    isDragging = false;
                }, { passive: true });

                // Mouse Event Listeners for Desktop (drag support)
                carousel.addEventListener('mousedown', (e) => {
                    touchStartX = e.screenX;
                    touchStartY = e.screenY;
                    isDragging = true;
                    carousel.style.cursor = 'grabbing';
                    e.preventDefault();
                });

                carousel.addEventListener('mousemove', (e) => {
                    if (!isDragging) return;
                    touchEndX = e.screenX;
                    touchEndY = e.screenY;
                });

                carousel.addEventListener('mouseup', (e) => {
                    if (!isDragging) return;
                    touchEndX = e.screenX;
                    touchEndY = e.screenY;
                    handleSwipe();
                    isDragging = false;
                    carousel.style.cursor = 'grab';
                });

                carousel.addEventListener('mouseleave', (e) => {
                    if (isDragging) {
                        isDragging = false;
                        carousel.style.cursor = 'grab';
                    }
                });

                // Button Event listeners
                if (nextBtn) {
                    nextBtn.addEventListener('click', (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        nextImage();
                    });
                }

                if (prevBtn) {
                    prevBtn.addEventListener('click', (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        prevImage();
                    });
                }

                indicators.forEach((indicator, index) => {
                    indicator.addEventListener('click', (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        showImage(index);
                    });
                });

                // Auto-play functionality
                let autoplayInterval;
                function startAutoplay() {
                    autoplayInterval = setInterval(nextImage, 3000);
                }

                function stopAutoplay() {
                    clearInterval(autoplayInterval);
                }

                // Start autoplay on hover, stop on mouse leave (desktop only)
                if (window.innerWidth > 768) {
                    carousel.addEventListener('mouseenter', startAutoplay);
                    carousel.addEventListener('mouseleave', stopAutoplay);
                }
            });
        })();
    </script>
@endsection
