@extends('admin.layouts.app')

@section('title', 'Hero Section')
@section('page-title', 'Hero Section')

@section('content')
    <!-- Success Alert -->
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90"
            class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-lg shadow-md">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
                <button @click="show = false" class="text-green-500 hover:text-green-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    <div x-data="quoteManager()" class="space-y-6">
        <!-- Header Card -->
        <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-2xl shadow-lg p-8 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold font-montserrat mb-2">Hero Section</h1>
                    <p class="text-primary-100">Kelola tampilan hero section dan navbar pada halaman utama</p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Card 1: Edit Sejarah -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="text-center mb-4">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-primary-100 mb-3">
                        <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold font-montserrat text-gray-800 mb-2">Edit Navbar</h3>
                    <p class="text-gray-600 text-xs mb-4">Perbarui tittle navbar</p>
                </div>

                <button @click="editNavbarModalOpen = true"
                    class="w-full bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold py-2.5 px-4 rounded-lg transition duration-300 flex items-center justify-center space-x-2 shadow-md hover:shadow-lg text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    <span>Edit</span>
                </button>
            </div>

            <!-- Card 2: Edit Hero -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="text-center mb-4">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-primary-100 mb-3">
                        <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold font-montserrat text-gray-800 mb-2">Edit Hero</h3>
                    <p class="text-gray-600 text-xs mb-4">Perbarui hero section</p>
                </div>

                <button @click="editHeroModalOpen = true"
                    class="w-full bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold py-2.5 px-4 rounded-lg transition duration-300 flex items-center justify-center space-x-2 shadow-md hover:shadow-lg text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    <span>Edit</span>
                </button>
            </div>
        </div>

        <!-- Content Card -->
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <div>
                <h2 class="text-2xl font-bold font-montserrat text-gray-800 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                    Live Preview
                </h2>
                <div class="h-1 w-full bg-primary-900 rounded-full mt-2 mb-6"></div>
            </div>

            <!-- Live Preview Container -->
            <div class="space-y-6">
                <div class="border-2 border-gray-200 rounded-xl overflow-hidden shadow-lg">
                    <!-- Navbar Preview -->
                    <div class="bg-gradient-to-r from-[#1e3a5f] to-[#2d5278]">
                        <div class="container mx-auto px-6">
                            <div class="flex items-center justify-between py-4">
                                <!-- Logo & Title -->
                                <div class="flex items-center space-x-3">
                                    @if($profile && $profile->logo)
                                        <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo" class="h-12">
                                    @else
                                        <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="h-12">
                                    @endif
                                    <div class="text-left">
                                        <span class="text-xl font-montserrat font-bold text-white block">
                                            {{ $hero->title_navbar ?? 'Karang Taruna' }}
                                        </span>
                                        <span class="font-rajdhani font-italic text-md text-[#EBCB90] block">
                                            {{ $hero->subtitle_navbar ?? 'Kelurahan Tembalang' }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Menu Items (Static Preview) -->
                                <div class="hidden md:flex space-x-1 text-sm">
                                    <span class="px-3 py-2 text-white bg-white/10 rounded-lg font-semibold">Home</span>
                                    <span class="px-3 py-2 text-white/80">About</span>
                                    <span class="px-3 py-2 text-white/80">Profile</span>
                                    <span class="px-3 py-2 text-white/80">Organization</span>
                                    <span class="px-3 py-2 text-white/80">Gallery</span>
                                    <span class="px-3 py-2 text-white/80">Product & Partners</span>
                                    <span class="px-3 py-2 text-white/80">Contact</span>
                                    <span class="px-3 py-2 bg-white/5 text-white rounded-lg border border-white/20">
                                        <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Admin
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hero Section Preview -->
                    <div class="relative bg-gradient-to-r from-[#1e3a5f] to-[#2d5278] flex items-center justify-center"
                        style="height: 420px;">
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/40"></div>

                        <!-- Hero Content -->
                        <div class="relative z-10 text-center space-y-4 px-6">
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white drop-shadow-2xl">
                                {{ $hero->title ?? 'Selamat Datang di Karang Taruna Maju Bersama' }}
                            </h1>
                            <p class="text-lg md:text-xl text-white/95 drop-shadow-lg max-w-3xl mx-auto">
                                {{ $hero->subtitle ?? 'Bersama Membangun Generasi Muda yang Berkarakter dan Berprestasi' }}
                            </p>
                            <div class="flex flex-wrap justify-center gap-4 pt-6">
                                <button
                                    class="bg-[#2d5278] text-white px-8 py-3 rounded-lg font-semibold hover:bg-[#1e3a5f] transition shadow-lg">
                                    Tentang Kami
                                </button>
                                <button
                                    class="bg-white text-[#2d5278] px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg">
                                    Hubungi Kami
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-blue-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                        <div>
                            <p class="text-sm text-blue-700 font-medium">Informasi Preview</p>
                            <p class="text-xs text-blue-600 mt-1">Preview ini menampilkan tampilan navbar dan hero section
                                yang akan terlihat di halaman utama website. Klik tombol "Edit Navbar" atau "Edit Hero" di
                                atas untuk mengubah konten yang ditampilkan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Navbar -->
        <div x-show="editNavbarModalOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center">
                <div class="fixed inset-0 bg-black/50 backdrop-blur-sm bg-opacity-75 transition-opacity"
                    @click="editNavbarModalOpen = false"></div>

                <div
                    class="relative inline-block w-full max-w-2xl overflow-hidden text-left align-middle transition-all transform bg-white shadow-2xl rounded-2xl">
                    <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-8 py-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-xl bg-white bg-opacity-20">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-white font-montserrat">Edit Navbar</h3>
                                    <p class="text-primary-100 text-sm mt-1">Perbarui title dan subtitle navbar</p>
                                </div>
                            </div>
                            <button type="button" @click="editNavbarModalOpen = false"
                                class="text-white hover:text-gray-200 hover:bg-gray-500 rounded-lg transition-colors">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('admin.hero.update') }}" class="p-8 space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Title Navbar -->
                        <div>
                            <label for="title_navbar" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="text-red-500">*</span> Title Navbar
                            </label>
                            <input type="text" name="title_navbar" id="title_navbar"
                                value="{{ old('title_navbar', $hero->title_navbar) }}" placeholder="Contoh: Karang Taruna"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent font-poppins"
                                required>
                        </div>

                        <!-- Subtitle Navbar -->
                        <div>
                            <label for="subtitle_navbar" class="block text-sm font-semibold text-gray-700 mb-2">
                                Subtitle Navbar
                            </label>
                            <input type="text" name="subtitle_navbar" id="subtitle_navbar"
                                value="{{ old('subtitle_navbar', $hero->subtitle_navbar) }}"
                                placeholder="Contoh: Kelurahan Tembalang"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent font-poppins">
                        </div>
                        <input type="hidden" name="title" value="{{ $hero->title }}">
                        <input type="hidden" name="subtitle" value="{{ $hero->subtitle }}">

                        <div
                            class="sticky bottom-0 bg-gray-50 px-8 py-4 -mx-8 -mb-8 flex items-center space-x-3 border-t rounded-b-2xl">
                            <button type="button" @click="editNavbarModalOpen = false"
                                class="flex-1 px-4 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition duration-300">
                                Batal
                            </button>
                            <button type="submit"
                                class="flex-1 px-4 py-3 bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold rounded-lg transition duration-300">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit Hero -->
        <div x-show="editHeroModalOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center">
                <div class="fixed inset-0 bg-black/50 backdrop-blur-sm bg-opacity-75 transition-opacity"
                    @click="editHeroModalOpen = false"></div>

                <div
                    class="relative inline-block w-full max-w-2xl overflow-hidden text-left align-middle transition-all transform bg-white shadow-2xl rounded-2xl">
                    <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-8 py-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-xl bg-white bg-opacity-20">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-white font-montserrat">Edit Hero Section</h3>
                                    <p class="text-primary-100 text-sm mt-1">Perbarui title dan subtitle hero section</p>
                                </div>
                            </div>
                            <button type="button" @click="editHeroModalOpen = false"
                                class="text-white hover:text-gray-200 hover:bg-gray-500 rounded-lg transition-colors">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('admin.hero.update') }}" class="p-8 space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Title Hero -->
                        <div>
                            <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="text-red-500">*</span> Title Hero
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title', $hero->title) }}"
                                placeholder="Contoh: Selamat Datang di Karang Taruna Maju Bersama"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent font-poppins"
                                required>
                        </div>
                        <div>
                            <label for="subtitle" class="block text-sm font-semibold text-gray-700 mb-2">
                                Subtitle Hero
                            </label>
                            <textarea name="subtitle" id="subtitle" rows="4"
                                placeholder="Contoh: Bersama Membangun Generasi Muda yang Berkarakter dan Berprestasi"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent font-poppins resize-none">{{ old('subtitle', $hero->subtitle) }}</textarea>
                        </div>
                        <input type="hidden" name="title_navbar" value="{{ $hero->title_navbar }}">
                        <input type="hidden" name="subtitle_navbar" value="{{ $hero->subtitle_navbar }}">

                        <div
                            class="sticky bottom-0 bg-gray-50 px-8 py-4 -mx-8 -mb-8 flex items-center space-x-3 border-t rounded-b-2xl">
                            <button type="button" @click="editHeroModalOpen = false"
                                class="flex-1 px-4 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition duration-300">
                                Batal
                            </button>
                            <button type="submit"
                                class="flex-1 px-4 py-3 bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold rounded-lg transition duration-300">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function quoteManager() {
                return {
                    editNavbarModalOpen: false,
                    editHeroModalOpen: false,

                    init() {
                        // Initialize if needed
                    }
                }
            }

            // Form validation
            const heroForm = document.getElementById('heroForm');
            if (heroForm) {
                heroForm.addEventListener('submit', function (e) {
                    const title = document.getElementById('title').value.trim();
                    const titleNavbar = document.getElementById('title_navbar').value.trim();

                    if (!title) {
                        e.preventDefault();
                        alert('Title Hero wajib diisi!');
                        document.getElementById('title').focus();
                        return false;
                    }

                    if (!titleNavbar) {
                        e.preventDefault();
                        alert('Title Navbar wajib diisi!');
                        document.getElementById('title_navbar').focus();
                        return false;
                    }
                });
            }

            // Auto-resize textarea
            const textarea = document.getElementById('subtitle');
            if (textarea) {
                textarea.addEventListener('input', function () {
                    this.style.height = 'auto';
                    this.style.height = (this.scrollHeight) + 'px';
                });
            }
        </script>
    @endpush

    @push('styles')
        <style>
            /* Alpine.js cloak */
            [x-cloak] {
                display: none !important;
            }

            /* Custom focus styles */
            input:focus,
            textarea:focus {
                outline: none;
            }

            /* Smooth transitions */
            button {
                transition: all 0.2s ease-in-out;
            }

            button:active {
                transform: scale(0.98);
            }
        </style>
    @endpush
@endsection