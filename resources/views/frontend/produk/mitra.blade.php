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
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
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
                            "{{ $mitra->first()->testimoni ?? 'Memuat testimoni...' }}"
                        </blockquote>

                        <!-- Mitra Info -->
                        <div class="flex justify-center items-center space-x-6">
                            <div class="w-20 h-20 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full flex items-center justify-center text-white font-bold text-2xl shadow-lg ring-4 ring-accent/30" id="active-avatar">
                                {{ substr($mitra->first()->nama_mitra ?? 'M', 0, 2) }}
                            </div>
                            <div class="text-left">
                                <h4 class="font-bold text-gray-900 text-2xl mb-2" id="active-nama">{{ $mitra->first()->nama_mitra ?? 'Memuat...' }}</h4>
                                <p class="text-primary-600 font-semibold text-lg" id="active-jenis">{{ $mitra->first()->jenis ?? 'UMKM' }}</p>
                            </div>
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
                <div class="relative overflow-hidden">
                    <!-- Gradient Overlays -->
                    <div class="absolute left-0 top-0 bottom-0 w-20 bg-gradient-to-r from-white to-transparent z-10"></div>
                    <div class="absolute right-0 top-0 bottom-0 w-20 bg-gradient-to-l from-white to-transparent z-10"></div>

                    <!-- Scrolling Animation -->
                    <div class="flex animate-mitra-scroll" id="mitra-container">
                        @foreach($mitra as $index => $item)
                        <div class="flex-shrink-0 mx-6 group mitra-item cursor-pointer"
                             data-index="{{ $index }}"
                             data-nama="{{ $item->nama_mitra }}"
                             data-jenis="{{ $item->jenis }}"
                             data-testimoni="{{ $item->testimoni }}"
                             data-deskripsi="{{ $item->deskripsi }}"
                             onclick="selectMitra({{ $index }})">
                            <div class="bg-white rounded-2xl p-8 hover:bg-gradient-to-br hover:from-primary-50 hover:to-accent/10 transition-all duration-300 transform hover:scale-105 hover:shadow-xl border-2 border-gray-100 group-hover:border-primary-300 w-[280px]">
                                <!-- Logo Placeholder / Untuk logo mitra nanti -->
                                <div class="w-24 h-24 bg-gradient-to-br from-primary-400 to-primary-600 rounded-xl mx-auto mb-4 flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                    {{ substr($item->nama_mitra, 0, 2) }}
                                </div>

                                <!-- Mitra Name -->
                                <h4 class="font-bold text-gray-900 text-center text-lg mb-2">{{ $item->nama_mitra }}</h4>
                                <p class="text-primary-600 font-semibold text-center text-sm">{{ $item->jenis }}</p>

                                <!-- Hover Details -->
                                <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 mt-4">
                                    <p class="text-gray-600 text-sm text-center leading-relaxed">{{ Str::limit($item->deskripsi, 80) }}</p>
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
                            <div class="bg-white rounded-2xl p-8 hover:bg-gradient-to-br hover:from-primary-50 hover:to-accent/10 transition-all duration-300 transform hover:scale-105 hover:shadow-xl border-2 border-gray-100 group-hover:border-primary-300 w-[280px]">
                                <!-- Logo Placeholder / Untuk logo mitra nanti -->
                                <div class="w-24 h-24 bg-gradient-to-br from-primary-400 to-primary-600 rounded-xl mx-auto mb-4 flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                    {{ substr($item->nama_mitra, 0, 2) }}
                                </div>

                                <!-- Mitra Name -->
                                <h4 class="font-bold text-gray-900 text-center text-lg mb-2">{{ $item->nama_mitra }}</h4>
                                <p class="text-primary-600 font-semibold text-center text-sm">{{ $item->jenis }}</p>

                                <!-- Hover Details -->
                                <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 mt-4">
                                    <p class="text-gray-600 text-sm text-center leading-relaxed">{{ Str::limit($item->deskripsi, 80) }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Navigation Dots -->
                <div class="flex justify-center mt-8 space-x-2" id="navigation-dots">
                    @for($i = 0; $i < $mitra->count(); $i++)
                    <button class="w-3 h-3 rounded-full bg-gray-300 hover:bg-primary-500 transition-colors duration-300 nav-dot {{ $i === 0 ? 'bg-primary-500' : '' }}"
                            data-index="{{ $i }}"
                            onclick="selectMitra({{ $i }})"></button>
                    @endfor
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

function selectMitra(index) {
    currentIndex = index;
    updateActiveTestimoni(index);
    updateNavigationDots(index);
    highlightActiveMitra(index);
    resetAutoScroll();
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

function updateNavigationDots(activeIndex) {
    const dots = document.querySelectorAll('.nav-dot');
    dots.forEach((dot, index) => {
        if (index === activeIndex) {
            dot.classList.add('bg-primary-500');
            dot.classList.remove('bg-gray-300');
        } else {
            dot.classList.remove('bg-primary-500');
            dot.classList.add('bg-gray-300');
        }
    });
}

function highlightActiveMitra(activeIndex) {
    // Remove active class from all items
    const allItems = document.querySelectorAll('.mitra-item');
    allItems.forEach(item => item.classList.remove('active'));

    // Add active class to current item (considering the duplicate items)
    const activeItems = document.querySelectorAll(`.mitra-item[data-index="${activeIndex}"]`);
    activeItems.forEach(item => item.classList.add('active'));
}

function startAutoScroll() {
    autoScrollInterval = setInterval(() => {
        currentIndex = (currentIndex + 1) % mitraData.length;
        selectMitra(currentIndex);
    }, 5000); // Change every 5 seconds
}

function resetAutoScroll() {
    clearInterval(autoScrollInterval);
    startAutoScroll();
}

function pauseAutoScroll() {
    clearInterval(autoScrollInterval);
}

function resumeAutoScroll() {
    startAutoScroll();
}

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    highlightActiveMitra(0); // Highlight first mitra
    startAutoScroll();

    // Pause on hover
    const container = document.getElementById('mitra-container');
    container.addEventListener('mouseenter', pauseAutoScroll);
    container.addEventListener('mouseleave', resumeAutoScroll);

    // Pause on dot hover
    const dots = document.querySelectorAll('.nav-dot');
    dots.forEach(dot => {
        dot.addEventListener('mouseenter', pauseAutoScroll);
        dot.addEventListener('mouseleave', resumeAutoScroll);
    });
});
</script>
@endpush