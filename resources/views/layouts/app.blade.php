<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Karang Taruna')</title>
    <!-- Favicon (explicit) - prefer PNG then ICO fallback -->
    <link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}" />
    <link rel="alternate icon" href="{{ asset('favicon.ico') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent">
        @php
            $navTransparent = true;
            $hoverLink = $navTransparent ? 'hover:text-white/90' : 'hover:text-primary-800';
            $activeClass = $navTransparent ? 'text-white bg-white/10 font-semibold' : 'text-white bg-primary-700 font-semibold';
            $mobileHoverBg = $navTransparent ? 'hover:bg-white/10' : 'hover:bg-primary-700';
        @endphp
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo (use local asset) -->
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('assets/logo.png') }}" alt="Logo Karang Taruna" class="h-12">
                    <div class="text-left">
                        <span class="text-xl font-Montserrat font-bold text-white">Karang Taruna</span>
                        <br>
                        <span class="font-italic text-sm text-[#EBCB90]">Kelurahan Tembalang</span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-1">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 rounded-lg {{ $hoverLink }} transition {{ request()->routeIs('home') ? $activeClass : 'text-white' }}">
                        Home
                    </a>

                    <!-- Tentang Dropdown -->
                    <div class="relative group">
                        <button
                            class="px-4 py-2 rounded-lg {{ $hoverLink }} transition flex items-center {{ request()->routeIs('tentang.*') ? $activeClass : 'text-white' }}">
                            About
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="{{ $navTransparent ? 'absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-primary-900/80 ring-1 ring-white/20 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300' : 'absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300' }}">
                            <div class="py-1">
                                <a href="{{ route('tentang.logo') }}"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Logo
                                    Karang Taruna</a>
                                <a href="{{ route('tentang.profil') }}"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Sejarah
                                    Organisasi</a>
                            </div>
                        </div>
                    </div>

                    <!-- Visi & Nilai Dropdown -->
                    <div class="relative group">
                        <button
                            class="px-4 py-2 rounded-lg {{ $hoverLink }} transition flex items-center {{ request()->routeIs('profil.*') ? $activeClass : 'text-white' }}">
                            Profile
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="{{ $navTransparent ? 'absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-primary-900/80 ring-1 ring-white/20 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300' : 'absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300' }}">
                            <div class="py-1">
                                <a href="{{ route('profil.visimisi') }}#vision"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Visi
                                    & Misi</a>
                                <a href="{{ route('profil.visimisi') }}#tujuan"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Tujuan
                                    & Fungsi</a>
                                <a href="{{ route('profil.visimisi') }}#nilai-dasar"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Nilai-Nilai
                                    Dasar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Kepengurusan Dropdown -->
                    <div class="relative group">
                        <button
                            class="px-4 py-2 rounded-lg {{ $hoverLink }} transition flex items-center {{ request()->routeIs('kepengurusan.*') ? $activeClass : 'text-white' }}">
                            Organization
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="{{ $navTransparent ? 'absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-primary-900/80 ring-1 ring-white/20 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300' : 'absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300' }}">
                            <div class="py-1">
                                <a href="{{ route('kepengurusan.index') }}#tokoh_utama"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Tokoh Utama</a>
                                <a href="{{ route('kepengurusan.index') }}#struktur_pengurus"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Struktur Kepengurusan</a>
                            </div>
                        </div>
                    </div>

                    <!-- Gallery Dropdown (Foto, Video & Arsip Berita) -->
                    <div class="relative group">
                        <button
                            class="px-4 py-2 rounded-lg {{ $hoverLink }} transition flex items-center {{ request()->routeIs('galeri.*') ? $activeClass : 'text-white' }}">
                            Gallery
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="{{ $navTransparent ? 'absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-primary-900/80 ring-1 ring-white/20 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300' : 'absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300' }}">
                            <div class="py-1">
                                <a href="{{ route('galeri.foto') }}"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Foto</a>
                                <a href="{{ route('galeri.video') }}"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Video</a>
                                <a href="{{ route('galeri.berita') }}"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Arsip
                                    Berita</a>
                            </div>
                        </div>
                    </div>

                    <!-- Produk & Mitra Dropdown -->
                    <div class="relative group">
                        <button
                            class="px-4 py-2 rounded-lg {{ $hoverLink }} transition flex items-center {{ request()->routeIs('produk.*') ? $activeClass : 'text-white' }}">
                            Product & Partners
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="{{ $navTransparent ? 'absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-primary-900/80 ring-1 ring-white/20 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300' : 'absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300' }}">
                            <div class="py-1">
                                <a href="{{ route('produk.list') }}"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Daftar
                                    Produk</a>
                                <a href="{{ route('produk.mitra') }}"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Mitra/UMKM</a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('kontak.index') }}"
                        class="px-4 py-2 rounded-lg {{ $hoverLink }} transition {{ request()->routeIs('kontak.*') ? $activeClass : 'text-white' }}">
                        Contact
                    </a>

                    <!-- Admin Login Button -->
                    <a href="{{ route('admin.login') }}"
                        class="ml-2 px-4 py-2 rounded-lg bg-white/20 text-white hover:bg-white/30 transition font-semibold border border-white/30">
                        <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Admin
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-white p-2 focus:outline-none"
                    aria-label="Toggle menu">
                    <svg class="w-6 h-6 transition-transform duration-300" id="menu-icon" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu (full-screen overlay) -->
    <div id="mobile-menu"
        class="hidden md:hidden fixed inset-0 z-40 pt-16 bg-primary-900/95 backdrop-blur-md overflow-y-auto">
        <div class="w-full h-full">
            <!-- Close button at top -->
            <div class="flex justify-end p-4 border-b border-white/10">
                <button id="mobile-menu-close" class="md:hidden text-white p-2 focus:outline-none"
                    aria-label="Close menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <!-- Menu content -->
            <div class="py-4 px-4">
                <a href="{{ route('home') }}"
                    class="block px-4 py-2 {{ $navTransparent ? 'text-white' : 'text-white' }} {{ $mobileHoverBg }} rounded">Home</a>

                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-button w-full text-left px-4 py-2 text-white {{ $mobileHoverBg }} rounded flex justify-between items-center">
                        About
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-4">
                        <a href="{{ route('tentang.logo') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Logo
                            Karang
                            Taruna</a>
                        <a href="{{ route('tentang.profil') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Sejarah
                            Organisasi</a>
                    </div>
                </div>

                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-button w-full text-left px-4 py-2 text-white {{ $mobileHoverBg }} rounded flex justify-between items-center">
                        Profile
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-4">
                        <a href="{{ route('profil.visimisi') }}#vision"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Visi
                            & Misi</a>
                        <a href="{{ route('profil.visimisi') }}#tujuan"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Tujuan
                            &
                            Fungsi</a>
                        <a href="{{ route('profil.visimisi') }}#nilai-dasar"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Nilai-Nilai
                            Dasar</a>
                    </div>
                </div>

                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-button w-full text-left px-4 py-2 text-white {{ $mobileHoverBg }} rounded flex justify-between items-center">
                        Organization
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-4">
                        <a href="{{ route('kepengurusan.index') }}#tokoh_utama"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Tokoh Utama</a>
                        <a href="{{ route('kepengurusan.index') }}#struktur_pengurus"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Struktur Pengurus</a>
                    </div>
                </div>

                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-button w-full text-left px-4 py-2 text-white {{ $mobileHoverBg }} rounded flex justify-between items-center">
                        Gallery
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-4">
                        <a href="{{ route('galeri.foto') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Foto</a>
                        <a href="{{ route('galeri.video') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Video</a>
                        <a href="{{ route('galeri.berita') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Arsip
                            Berita</a>
                    </div>
                </div>

                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-button w-full text-left px-4 py-2 text-white {{ $mobileHoverBg }} rounded flex justify-between items-center">
                        Product & Partners
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-4">
                        <a href="{{ route('produk.list') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Daftar
                            Produk</a>
                        <a href="{{ route('produk.mitra') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Mitra/UMKM</a>
                    </div>
                </div>

                <a href="{{ route('kontak.index') }}"
                    class="block px-4 py-2 {{ $navTransparent ? 'text-white' : 'text-white' }} {{ $mobileHoverBg }} rounded">Contact</a>

                <!-- Mobile Admin Login Button -->
                <div class="border-t border-white/20 mt-4 pt-4">
                    <a href="{{ route('admin.login') }}"
                        class="flex items-center justify-center px-4 py-3 bg-white/20 text-white hover:bg-white/30 transition font-semibold rounded border border-white/30">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Admin Login
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- CTA Section (Optional - can be yielded from pages) -->
    @yield('cta')

    <!-- Footer -->
    <footer class="bg-gradient-to-b from-primary-700 via-primary to-primary-900 text-white relative">
        <!-- Decorative top border -->
        <div class="h-1 bg-gradient-to-r from-secondary via-accent to-secondary"></div>
        <div class="container mx-auto px-4 py-12">
            <!-- Main Footer Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- About Section -->
                <div class="col-span-1 md:col-span-1 lg:col-span-1">
                    <div class="flex items-center mb-4">
                        <img src="https://clipground.com/images/logo-karang-taruna-png-5.png" alt="Logo Karang Taruna"
                            class="h-10 mr-3">
                        <div>
                            <h3 class="text-lg font-bold font-montserrat">Karang Taruna</h3>
                            <p class="text-xs text-secondary">Tembalang</p>
                        </div>
                    </div>
                    <p class="text-gray-100 text-sm leading-relaxed mb-4">
                        Organisasi sosial yang berdedikasi untuk pengembangan generasi muda dan pemberdayaan masyarakat.
                    </p>
                    <!-- Social Media -->
                    <div class="flex space-x-4">
                        @if(isset($kontak) && $kontak)
                            @if($kontak->facebook)
                                <a href="{{ $kontak->facebook }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-secondary/20 hover:bg-secondary/40 flex items-center justify-center transition-all duration-150 transform hover:scale-110 group" title="Facebook">
                                    <svg class="w-5 h-5 text-secondary group-hover:text-accent transition-colors duration-150" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                            @endif
                            @if($kontak->twitter)
                                <a href="{{ $kontak->twitter }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-secondary/20 hover:bg-secondary/40 flex items-center justify-center transition-all duration-150 transform hover:scale-110 group" title="Twitter">
                                    <svg class="w-5 h-5 text-secondary group-hover:text-accent transition-colors duration-150" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2s9 5 20 5a9.5 9.5 0 00-9-5.5c4.75 2.25 9-7.27 9-7.27z"/>
                                    </svg>
                                </a>
                            @endif
                            @if($kontak->instagram)
                                <a href="{{ $kontak->instagram }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-secondary/20 hover:bg-secondary/40 flex items-center justify-center transition-all duration-150 transform hover:scale-110 group" title="Instagram">
                                    <svg class="w-5 h-5 text-secondary group-hover:text-accent transition-colors duration-150" fill="currentColor" viewBox="0 0 24 24">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5" fill="none" stroke="currentColor" stroke-width="2"/>
                                        <path d="M16.5 7.5a1 1 0 0 0 0-2 1 1 0 0 0 0 2z" fill="currentColor"/>
                                        <circle cx="12" cy="12" r="4" fill="none" stroke="currentColor" stroke-width="2"/>
                                    </svg>
                                </a>
                            @endif
                            @if($kontak->youtube)
                                <a href="{{ $kontak->youtube }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-secondary/20 hover:bg-secondary/40 flex items-center justify-center transition-all duration-150 transform hover:scale-110 group" title="YouTube">
                                    <svg class="w-5 h-5 text-secondary group-hover:text-accent transition-colors duration-150" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19.615 3.175c-3.899-.369-11.369-.369-15.268 0-3.899.369-4.613 1.472-4.613 5.365v11.12c0 3.893.692 4.995 4.613 5.364 3.899.369 11.369.369 15.268 0 3.899-.369 4.613-1.471 4.613-5.364V8.54c0-3.893-.692-4.995-4.613-5.365zm-10.615 12.582v-11.391l11.344 5.727-11.344 5.664z"/>
                                    </svg>
                                </a>
                            @endif
                        @endif
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-span-1">
                    <h4 class="text-lg font-bold mb-4 text-secondary">Navigasi</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}"
                                class="text-gray-100 hover:text-secondary transition-colors duration-150 flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-secondary mr-2"></span>Home
                            </a></li>
                        <li><a href="{{ route('tentang.logo') }}"
                                class="text-gray-100 hover:text-secondary transition-colors duration-150 flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-secondary mr-2"></span>About
                            </a></li>
                        <li><a href="{{ route('galeri.index') }}"
                                class="text-gray-100 hover:text-secondary transition-colors duration-150 flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-secondary mr-2"></span>Gallery
                            </a></li>
                        <li><a href="{{ route('produk.list') }}"
                                class="text-gray-100 hover:text-secondary transition-colors duration-150 flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-secondary mr-2"></span>Products
                            </a></li>
                        <li><a href="{{ route('kontak.index') }}"
                                class="text-gray-100 hover:text-secondary transition-colors duration-150 flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-secondary mr-2"></span>Contact
                            </a></li>
                    </ul>
                </div>

                <!-- Contact Information -->
                <div class="col-span-1">
                    <h4 class="text-lg font-bold mb-4 text-secondary">Hubungi Kami</h4>
                    @if(isset($kontak) && $kontak)
                    <div class="space-y-4">
                        @if($kontak->alamat_sekretariat)
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-secondary mr-3 mt-1 flex-shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <a href="https://www.google.com/maps/search/{{ urlencode($kontak->alamat_sekretariat) }}" target="_blank" rel="noopener noreferrer" class="text-gray-100 hover:text-secondary transition-colors duration-150 cursor-pointer">
                                {{ $kontak->alamat_sekretariat }}
                            </a>
                        </div>
                        @endif
                        @if($kontak->telepon)
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-secondary mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 00.948-.684l1.498-4.493a1 1 0 011.502-.684l1.498 4.493a1 1 0 00.948.684H19a2 2 0 012 2v1M3 5h18v13a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />
                            </svg>
                            <a href="tel:{{ $kontak->telepon }}" class="text-gray-100 hover:text-secondary transition-colors duration-150">{{ $kontak->telepon }}</a>
                        </div>
                        @endif
                        @if($kontak->whatsapp)
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-secondary mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <a href="mailto:{{ $kontak->email }}" class="text-gray-100 hover:text-secondary transition-colors duration-150">{{ $kontak->email }}</a>
                        </div>
                        @endif
                        @if($kontak->whatsapp)
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-secondary mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-5.031 1.378c-3.055 2.116-4.687 5.351-4.687 8.905 0 3.554 1.632 6.789 4.686 8.905 3.055 2.117 7.144 2.117 10.199 0 3.054-2.116 4.687-5.351 4.687-8.905 0-3.554-1.633-6.789-4.687-8.905a9.87 9.87 0 00-5.165-1.378zm0-1.932a11.88 11.88 0 0111.923 11.923c0 6.59-2.953 11.923-11.923 11.923C5.265 23.97.932 21.017.932 14.427.932 7.836 3.886 2.503 11.051 2.503z" />
                            </svg>
                            <a href="https://wa.me/{{ $kontak->whatsapp }}" target="_blank" rel="noopener noreferrer" class="text-gray-100 hover:text-secondary transition-colors duration-150">Chat WhatsApp</a>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>

                <!-- Map/Additional Info -->
                <div class="col-span-1">
                    <h4 class="text-lg font-bold mb-4 text-secondary">Lokasi</h4>
                    <p class="text-gray-100 text-sm mb-4">Temukan kami di Google Maps untuk navigasi lebih mudah.</p>
                    <a href="https://www.google.com/maps/search/Jl.+Turus+Asri+IV+No.+6,+Tembalang,+Semarang"
                        target="_blank" rel="noopener noreferrer"
                        class="inline-block bg-secondary hover:bg-secondary/90 text-primary px-4 py-2 rounded-lg font-semibold transition-all duration-150 transform hover:scale-105">
                        <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 0C7.3 0 3.5 3.8 3.5 8.5c0 5.7 8.5 15.5 8.5 15.5s8.5-9.8 8.5-15.5C20.5 3.8 16.7 0 12 0z" />
                        </svg>
                        Buka Maps
                    </a>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t border-white/20 pt-8">
                <!-- Footer Bottom -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div class="text-gray-100 text-sm">
                        <p>&copy; 2025 <span class="font-semibold">Karang Taruna</span>. All rights reserved.</p>
                    </div>
                    <div class="flex flex-col md:flex-row gap-6 text-sm text-gray-100">
                        <a href="#" class="hover:text-secondary transition-colors duration-150">Privacy Policy</a>
                        <a href="#" class="hover:text-secondary transition-colors duration-150">Terms of Service</a>
                        <a href="#" class="hover:text-secondary transition-colors duration-150">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        const navbar = document.getElementById('navbar');
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenuClose = document.getElementById('mobile-menu-close');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');

        // Scroll effect
        window.addEventListener('scroll', function () {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-primary-600/90', 'shadow-lg', 'backdrop-blur-md');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('bg-primary-600/90', 'shadow-lg', 'backdrop-blur-md');
                navbar.classList.add('bg-transparent');
            }
        });

        // Set initial state
        if (window.scrollY > 50) {
            navbar.classList.add('bg-primary-600', 'shadow-lg');
        } else {
            navbar.classList.add('bg-transparent');
        }

        // Accessibility state
        mobileMenuButton.setAttribute('aria-expanded', 'false');
        mobileMenuButton.setAttribute('aria-controls', 'mobile-menu');

        // Function to toggle mobile menu
        function toggleMobileMenu() {
            const isHidden = mobileMenu.classList.contains('hidden');
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                mobileMenuButton.setAttribute('aria-expanded', 'true');
                menuIcon.style.transform = 'rotate(90deg)';
                document.body.style.overflow = 'hidden'; // Prevent scrolling when menu is open
            } else {
                mobileMenu.classList.add('hidden');
                mobileMenuButton.setAttribute('aria-expanded', 'false');
                menuIcon.style.transform = 'rotate(0deg)';
                document.body.style.overflow = '';
            }
        }

        // Menu button click
        mobileMenuButton.addEventListener('click', toggleMobileMenu);

        // Close button click
        mobileMenuClose.addEventListener('click', toggleMobileMenu);

        // Close menu when clicking a link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', function () {
                if (!mobileMenu.classList.contains('hidden')) {
                    toggleMobileMenu();
                }
            });
        });

        // Mobile Dropdown Toggle with smooth animation
        document.querySelectorAll('.mobile-dropdown-button').forEach(button => {
            button.addEventListener('click', function (e) {
                e.stopPropagation();
                const content = this.nextElementSibling;
                const svg = this.querySelector('svg');
                const isHidden = content.classList.contains('hidden');

                // Close other dropdowns
                document.querySelectorAll('.mobile-dropdown-content').forEach(el => {
                    if (el !== content) {
                        el.classList.add('hidden');
                    }
                });

                document.querySelectorAll('.mobile-dropdown-button svg').forEach(s => {
                    if (s !== svg) {
                        s.style.transform = 'rotate(0deg)';
                    }
                });

                // Toggle current dropdown
                content.classList.toggle('hidden');
                svg.style.transform = isHidden ? 'rotate(180deg)' : 'rotate(0deg)';
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function (e) {
            if (!e.target.closest('.mobile-dropdown')) {
                document.querySelectorAll('.mobile-dropdown-content').forEach(el => {
                    el.classList.add('hidden');
                });
                document.querySelectorAll('.mobile-dropdown-button svg').forEach(svg => {
                    svg.style.transform = 'rotate(0deg)';
                });
            }
        });
    </script>
</body>

{{-- Stacked scripts from child views (e.g. pesanWhatsApp, product highlight) --}}
@stack('scripts')

</html>