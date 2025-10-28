@extends('layouts.app')

@section('navbar_transparent')
@endsection

@section('title', 'Beranda - Karang Taruna')

@section('content')
<!-- Hero Section with Slider -->
<section class="relative h-[450px] md:h-[580px] flex items-center justify-center overflow-hidden">
    @if($heroSlides && $heroSlides->count() > 0)
        <!-- Slider Container -->
        <div class="hero-slider absolute inset-0 w-full h-full">
            @foreach($heroSlides as $index => $slide)
            <div class="slide {{ $index === 0 ? 'active' : '' }} absolute inset-0 w-full h-full transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
                <img src="{{ asset('storage/' . $slide['image']) }}" 
                     class="w-full h-full object-cover" 
                     alt="{{ $slide['judul'] }}" />
            </div>
            @endforeach
        </div>

        <!-- Navigation Dots -->
        @if($heroSlides->count() > 1)
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-30 flex space-x-2">
            @foreach($heroSlides as $index => $slide)
            <button class="slider-dot w-10 md:w-14 h-1 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-white/50' }} transition-all hover:bg-white" data-slide="{{ $index }}"></button>
            @endforeach
        </div>
        @endif

        <!-- Navigation Arrows -->
        @if($heroSlides->count() > 1)
        <button class="slider-prev absolute left-4 top-1/2 transform -translate-y-1/2 z-30 bg-black/30 hover:bg-black/50 text-white p-3 rounded-full transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button class="slider-next absolute right-4 top-1/2 transform -translate-y-1/2 z-30 bg-black/30 hover:bg-black/50 text-white p-3 rounded-full transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
        @endif
    @else
        <!-- Fallback jika tidak ada gambar -->
        <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-primary-600 to-primary-800"></div>
    @endif

    <div class="absolute inset-0 bg-black/50 z-10"></div> <!-- Overlay Gelap -->

    <div class="relative z-20 flex flex-col items-center justify-center text-center px-4 md:px-6 py-20 md:py-28 w-full">
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white drop-shadow-lg mb-3 md:mb-4">
            {{ $hero->title ?? 'Tanpa Judul' }}
        </h1>
        <p class="text-base md:text-lg lg:text-xl text-white drop-shadow mb-6 md:mb-8 max-w-2xl">
            {{ $hero->subtitle ?? 'Null' }}
        </p>
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 w-full sm:w-auto px-4 sm:px-0">
            <a href="{{ route('tentang.profil') }}" class="inline-block bg-primary-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-700 transition text-center">
                Tentang Kami
            </a>
            <a href="{{ route('kontak.index') }}" class="inline-block bg-white text-primary-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition text-center">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

<!-- Quote Section -->
@if($quotes && $quotes->count() > 0)
<div class="bg-gradient-to-r from-primary-700 to-primary-900 py-12 md:py-16 lg:py-20 relative">
    <div class="container mx-auto px-4">
        <!-- Quote Carousel -->
        <div class="relative">
            <!-- Quotes Container -->
            <div class="quote-carousel-wrapper overflow-hidden">
                <div class="quote-carousel-track flex {{ $quotes->count() > 1 ? 'transition-transform duration-500 ease-in-out' : '' }} gap-8 {{ $quotes->count() <= 1 ? 'justify-center' : 'pr-8' }}">
                    @foreach($quotes as $index => $q)
                    <div class="quote-item flex-shrink-0 w-full md:w-1/2 lg:w-1/2" data-index="{{ $index }}">
                        <div class="flex flex-col gap-4 md:gap-6 backdrop-blur-sm rounded-lg p-4 md:p-6 items-center md:flex-row md:items-start">
                            <div class="flex-shrink-0">
                                @if($q->foto && file_exists(public_path('storage/' . $q->foto)))
                                    <div class="w-24 h-24 md:w-32 md:h-32 lg:w-40 lg:h-40 overflow-hidden shadow-lg rounded-lg">
                                        <img src="{{ asset('storage/' . $q->foto) }}" 
                                            alt="{{ $q->nama }}" 
                                            class="w-full h-full object-cover">
                                    </div>
                                @else
                                    @php
                                        $parts = preg_split('/\s+/', trim($q->nama));
                                        $initials = '';
                                        if (!empty($parts)) {
                                            $initials .= strtoupper(mb_substr($parts[0], 0, 1));
                                            if (isset($parts[1])) {
                                                $initials .= strtoupper(mb_substr($parts[1], 0, 1));
                                            }
                                        }
                                        if ($initials === '') $initials = strtoupper(mb_substr($q->nama, 0, 1));
                                    @endphp
                                    <div class="w-24 h-24 md:w-32 md:h-32 lg:w-40 lg:h-40 bg-secondary flex items-center justify-center shadow-lg rounded-lg">
                                        <p class="text-4xl md:text-5xl lg:text-7xl font-bold text-white">{{ $initials }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="flex-1 text-primary-100 text-center md:text-left">
                                
                                <p class="italic font-rajdhani text-sm md:text-base lg:text-base leading-relaxed mb-3 md:mb-4">
                                    "{{ $q->quote }}"
                                </p>

                                <p class="text-sm font-semibold text-yellow-400">{{ $q->nama }}</p>
                                <p class="text-xs text-primary-200">{{ $q->peran }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    @if($quotes->count() > 2)
                        @php $firstQuote = $quotes->first(); @endphp
                        <div class="quote-item quote-item-clone flex-shrink-0 w-full md:w-1/2" data-index="clone">
                            <div class="flex flex-col md:flex-row gap-6 backdrop-blur-sm rounded-lg p-6">
                                <div class="flex-shrink-0">
                                    @if($firstQuote->foto && file_exists(public_path('storage/' . $firstQuote->foto)))
                                        <div class="w-32 h-32 md:w-40 md:h-40 overflow-hidden shadow-lg rounded-lg">
                                            <img src="{{ asset('storage/' . $firstQuote->foto) }}" 
                                                alt="{{ $firstQuote->nama }}" 
                                                class="w-full h-full object-cover">
                                        </div>
                                    @else
                                        @php
                                            $parts = preg_split('/\s+/', trim($firstQuote->nama));
                                            $initials = '';
                                            if (!empty($parts)) {
                                                $initials .= strtoupper(mb_substr($parts[0], 0, 1));
                                                if (isset($parts[1])) {
                                                    $initials .= strtoupper(mb_substr($parts[1], 0, 1));
                                                }
                                            }
                                            if ($initials === '') $initials = strtoupper(mb_substr($firstQuote->nama, 0, 1));
                                        @endphp
                                        <div class="w-32 h-32 md:w-40 md:h-40 bg-secondary flex items-center justify-center shadow-lg rounded-lg">
                                            <p class="text-7xl font-bold text-white">{{ $initials }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="flex-1 text-primary-100 text-center md:text-left">
                                    <p class="italic font-rajdhani text-sm md:text-base leading-relaxed mb-4">
                                        "{{ $firstQuote->quote }}"
                                    </p>
                                    <p class="text-sm font-semibold text-yellow-400">{{ $firstQuote->nama }}</p>
                                    <p class="text-xs text-primary-200">{{ $firstQuote->peran }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Left Arrow -->
            @if($quotes->count() > 2)
            <button class="quote-prev absolute left-4 top-1/2 -translate-y-1/2 z-10 hover:bg-white/20 text-white p-3 rounded-full transition hidden md:block">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            @endif

            <!-- Right Arrow -->
            @if($quotes->count() > 2)
            <button class="quote-next absolute right-4 top-1/2 -translate-y-1/2 z-10 hover:bg-white/20 text-white p-3 rounded-full transition hidden md:block">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
            @endif
        </div>

        <!-- Navigation Dots -->
        @if($quotes->count() > 2)
        <div class="flex justify-center gap-3 mt-8">
            @foreach($quotes as $index => $q)
            <button
                class="quote-dot w-10 md:w-14 h-1 rounded-full bg-gray-600 hover:bg-secondary transition {{ $index === 0 ? 'bg-secondary' : '' }}"
                data-slide="{{ $index }}"
                aria-label="Pergi ke quote {{ $index + 1 }}"
            ></button>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endif

<!-- Produk UMKM -->
<div class="container mx-auto px-4 py-12 md:py-16 lg:py-24">
    <div class="text-center mb-8 md:mb-12">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3 md:mb-4">Produk UMKM</h2>
        <p class="text-sm md:text-base text-gray-600">Produk unggulan dari mitra Karang Taruna</p>
    </div>

    @if($produkTerbaru->count() > 0)
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6 mb-8">
    @foreach($produkTerbaru->take(4) as $produk)
    <a href="{{ route('produk.list') }}?highlight={{ $produk->id }}" class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition relative group">
            @if($produk->foto)
                <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}" class="w-full h-40 md:h-48 object-cover">
            @else
                <div class="w-full h-40 md:h-48 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400 text-sm">No Image</span>
                </div>
            @endif
            <div class="p-3 md:p-4 text-center">
                <h3 class="font-bold text-sm md:text-base mb-1 md:mb-2 line-clamp-2">{{ $produk->nama_produk }}</h3>
                @if($produk->harga)
                <p class="text-primary-600 font-bold text-base md:text-lg mb-2 md:mb-3">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                @endif

                
            </div>
        </a>
        @endforeach
    </div>
    @else
    <p class="text-center text-gray-500">Belum ada produk tersedia.</p>
    @endif

    <div class="text-center">
        <a href="{{ route('produk.list') }}" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition">
            Lihat Semua Produk
        </a>
    </div>
</div>

<!-- Galeri Terbaru -->
<div class="bg-gray-100 py-12 md:py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3 md:mb-4">Galeri Terbaru</h2>
            <p class="text-sm md:text-base text-gray-600">Koleksi foto dan video terbaru dari kegiatan Karang Taruna</p>
        </div>

        @if($galeriTerbaru->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 mb-8">
            @foreach($galeriTerbaru as $galeri)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition group">
                @php
                    $isVideo = !empty($galeri->link_video);
                    $url = $isVideo ? ($galeri->thumbnail ?: '') : (is_array($galeri->media_path) ? $galeri->media_path[0] : $galeri->media_path);
                @endphp
                <!-- Tampilan Foto Sampul -->
                <div class="w-full h-40 md:h-48 bg-gray-200 overflow-hidden">
                    @if($url)
                        <img src="{{ asset('storage/' . $url) }}" alt="{{ $galeri->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                            <svg class="w-10 h-10 md:w-12 md:h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="p-4 md:p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs bg-primary-100 text-primary-600 font-semibold px-2 py-1 rounded">{{ ucfirst($galeri->kategori) }}</span>
                        <span class="text-xs text-gray-500">{{ $galeri->tanggal_kegiatan->format('d M Y') }}</span>
                    </div>
                    <h3 class="text-base md:text-lg font-bold mt-2 mb-2 line-clamp-2">{{ $galeri->judul }}</h3>
                    <p class="text-gray-600 text-sm mb-3 md:mb-4 line-clamp-2">{{ $galeri->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                    <a href="{{ route('galeri.berita.show', $galeri->id) }}" class="text-primary-600 text-sm font-semibold hover:text-primary-700">
                        Lihat Detail →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center text-gray-500">Belum ada galeri tersedia.</p>
        @endif

        <div class="text-center mt-6 md:mt-0">
            <a href="{{ route('galeri.berita') }}" class="inline-block bg-primary-600 text-white px-6 md:px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition">
                Lihat Semua Galeri
            </a>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-primary-600 text-white py-12 md:py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-2xl md:text-3xl font-bold mb-3 md:mb-4">Bergabung Bersama Kami</h2>
        <p class="text-base md:text-xl mb-6 md:mb-8">Mari berkontribusi untuk membangun generasi muda yang lebih baik</p>
        <a href="{{ route('kontak.index') }}" class="inline-block bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
            Hubungi Kami
        </a>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        // Hero Slider
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.hero-slider .slide');
            const dots = document.querySelectorAll('.slider-dot');
            const prevBtn = document.querySelector('.slider-prev');
            const nextBtn = document.querySelector('.slider-next');
            let currentSlide = 0;
            let autoPlayInterval;

            if (slides.length === 0) return;

            function showSlide(index) {
                slides.forEach(slide => {
                    slide.classList.remove('opacity-100');
                    slide.classList.add('opacity-0');
                });
                
                // Hapus active dari semua dots
                dots.forEach(dot => {
                    dot.classList.remove('bg-white');
                    dot.classList.add('bg-white/50');
                });

                slides[index].classList.remove('opacity-0');
                slides[index].classList.add('opacity-100');
                dots[index].classList.remove('bg-white/50');
                dots[index].classList.add('bg-white');
                
                currentSlide = index;
            }

            function nextSlide() {
                let next = (currentSlide + 1) % slides.length;
                showSlide(next);
            }

            function prevSlide() {
                let prev = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(prev);
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    nextSlide();
                    resetAutoPlay();
                });
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    prevSlide();
                    resetAutoPlay();
                });
            }

            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    showSlide(index);
                    resetAutoPlay();
                });
            });

            // Auto play
            function startAutoPlay() {
                autoPlayInterval = setInterval(nextSlide, 5000); 
            }

            function resetAutoPlay() {
                clearInterval(autoPlayInterval);
                startAutoPlay();
            }

            // Mulai autoplay
            if (slides.length > 1) {
                startAutoPlay();
            }

            const quoteCarousel = document.querySelector('.quote-carousel-track');
            const quoteItems = document.querySelectorAll('.quote-item:not(.quote-item-clone)');
            const quoteDots = document.querySelectorAll('.quote-dot');
            const quotePrevBtn = document.querySelector('.quote-prev');
            const quoteNextBtn = document.querySelector('.quote-next');
            let currentQuoteSlide = 0;
            let quoteAutoPlayInterval;
            let isTransitioning = false;

            if (quoteCarousel && quoteItems.length > 2) {
                function getItemWidth() {
                    const item = quoteItems[0];
                    const gap = 32; 
                    return item.offsetWidth + gap;
                }

                function showQuoteSlide(index, instant = false) {
                    const itemWidth = getItemWidth();
                    const translateX = -(index * itemWidth);
                    
                    if (instant) {
                        quoteCarousel.style.transition = 'none';
                    } else {
                        quoteCarousel.style.transition = 'transform 500ms ease-in-out';
                    }
                    
                    quoteCarousel.style.transform = `translateX(${translateX}px)`;
                    
                    quoteDots.forEach(dot => {
                        dot.classList.remove('bg-secondary');
                        dot.classList.add('bg-gray-600');
                    });
                    const dotIndex = index % quoteItems.length;
                    if (quoteDots[dotIndex]) {
                        quoteDots[dotIndex].classList.remove('bg-gray-600');
                        quoteDots[dotIndex].classList.add('bg-secondary');
                    }
                    
                    currentQuoteSlide = index;
                }

                function nextQuoteSlide() {
                    if (isTransitioning) return;
                    isTransitioning = true;
                    
                    const nextIndex = currentQuoteSlide + 1;
                    showQuoteSlide(nextIndex);
                    if (nextIndex >= quoteItems.length) {
                        setTimeout(() => {
                            showQuoteSlide(0, true);
                            isTransitioning = false;
                        }, 500);
                    } else {
                        setTimeout(() => {
                            isTransitioning = false;
                        }, 500);
                    }
                }

                function prevQuoteSlide() {
                    if (isTransitioning) return;
                    isTransitioning = true;
                    
                    if (currentQuoteSlide === 0) {
                        showQuoteSlide(quoteItems.length, true);
                        setTimeout(() => {
                            showQuoteSlide(quoteItems.length - 1);
                            setTimeout(() => {
                                isTransitioning = false;
                            }, 500);
                        }, 20);
                    } else {
                        showQuoteSlide(currentQuoteSlide - 1);
                        setTimeout(() => {
                            isTransitioning = false;
                        }, 500);
                    }
                }

                if (quoteNextBtn) {
                    quoteNextBtn.addEventListener('click', () => {
                        nextQuoteSlide();
                        resetQuoteAutoPlay();
                    });
                }

                if (quotePrevBtn) {
                    quotePrevBtn.addEventListener('click', () => {
                        prevQuoteSlide();
                        resetQuoteAutoPlay();
                    });
                }

                quoteDots.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        if (isTransitioning) return;
                        showQuoteSlide(index);
                        resetQuoteAutoPlay();
                    });
                });

                function startQuoteAutoPlay() {
                    quoteAutoPlayInterval = setInterval(nextQuoteSlide, 6000);
                }

                function resetQuoteAutoPlay() {
                    clearInterval(quoteAutoPlayInterval);
                    startQuoteAutoPlay();
                }

                showQuoteSlide(0);
                startQuoteAutoPlay();

                let resizeTimeout;
                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimeout);
                    resizeTimeout = setTimeout(() => {
                        showQuoteSlide(currentQuoteSlide, true);
                    }, 250);
                });
            }
        });

        function pesanWhatsApp(namaProduk, harga) {
            @if (isset($kontak) && $kontak && $kontak->whatsapp)
                const nomorAdmin = '{{ $kontak->whatsapp }}';
            @else
                const nomorAdmin = '6285725040030'; // default
                console.warn('Nomor WhatsApp admin belum diatur di database');
            @endif

            const pesan = `Halo Admin Karang Taruna,%0A%0ASaya tertarik dengan produk:%0A- ${namaProduk}%0A- Harga: ${harga}%0A%0AMohon info selanjutnya.`;
            const url = `https://wa.me/${nomorAdmin}?text=${encodeURIComponent(pesan)}`;
            window.open(url, '_blank');
        }
    </script>
@endpush
