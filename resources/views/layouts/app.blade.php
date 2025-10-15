<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Karang Taruna')</title>
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
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('https://clipground.com/images/logo-karang-taruna-png-5.png') }}"
                        alt="Logo Karang Taruna" class="h-12">
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
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Profil
                                    Organisasi</a>
                            </div>
                        </div>
                    </div>

                    <!-- Visi & Nilai Dropdown -->
                    <div class="relative group">
                        <button
                            class="px-4 py-2 rounded-lg {{ $hoverLink }} transition flex items-center {{ request()->routeIs('visi.*') ? $activeClass : 'text-white' }}">
                            Profile
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="{{ $navTransparent ? 'absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-primary-900/80 ring-1 ring-white/20 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300' : 'absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300' }}">
                            <div class="py-1">
                                <a href="{{ route('visi.visi') }}"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Visi</a>
                                <a href="{{ route('visi.misi') }}"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Misi</a>
                                <a href="{{ route('visi.tujuan') }}"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Tujuan
                                    & Fungsi</a>
                                <a href="{{ route('visi.nilai') }}"
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
                                <a href="{{ route('kepengurusan.struktur') }}"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Struktur
                                    Pengurus</a>
                                <a href="{{ route('kepengurusan.tugas') }}"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Tugas
                                    Pengurus</a>
                                <a href="{{ route('kepengurusan.tokoh') }}"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Tokoh
                                    Utama</a>
                            </div>
                        </div>
                    </div>

                    <!-- Kegiatan Dropdown -->
                    <div class="relative group">
                        <button
                            class="px-4 py-2 rounded-lg {{ $hoverLink }} transition flex items-center {{ request()->routeIs('kegiatan.*') ? $activeClass : 'text-white' }}">
                            Gallery
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="{{ $navTransparent ? 'absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-primary-900/80 ring-1 ring-white/20 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300' : 'absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300' }}">
                            <div class="py-1">
                                <a href="{{ route('kegiatan.galeri') }}"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Galeri
                                    Foto</a>
                                <a href="{{ route('kegiatan.video') }}"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Video/Dokumenter</a>
                                <a href="{{ route('kegiatan.berita') }}"
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
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Daftar Produk</a>
                                <a href="{{ route('produk.mitra') }}"
                                    class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-gray-700' }} {{ $navTransparent ? 'hover:bg-white/10 hover:text-white' : 'hover:bg-primary-50 hover:text-primary-600' }}">Mitra/UMKM</a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('kontak.index') }}"
                        class="px-4 py-2 rounded-lg {{ $hoverLink }} transition {{ request()->routeIs('kontak.*') ? $activeClass : 'text-white' }}">
                        Contact
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4">
                <a href="{{ route('home') }}"
                    class="block px-4 py-2 {{ $navTransparent ? 'text-white' : 'text-white' }} {{ $mobileHoverBg }} rounded">Beranda</a>

                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-button w-full text-left px-4 py-2 text-white {{ $mobileHoverBg }} rounded flex justify-between items-center">
                        Tentang
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-4">
                        <a href="{{ route('tentang.logo') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Logo Karang
                            Taruna</a>
                        <a href="{{ route('tentang.filosofi') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Filosofi
                            Logo</a>
                        <a href="{{ route('tentang.profil') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Profil
                            Organisasi</a>
                    </div>
                </div>

                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-button w-full text-left px-4 py-2 text-white {{ $mobileHoverBg }} rounded flex justify-between items-center">
                        Visi & Nilai
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-4">
                        <a href="{{ route('visi.visi') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Visi</a>
                        <a href="{{ route('visi.misi') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Misi</a>
                        <a href="{{ route('visi.tujuan') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Tujuan &
                            Fungsi</a>
                        <a href="{{ route('visi.nilai') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Nilai-Nilai
                            Dasar</a>
                    </div>
                </div>

                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-button w-full text-left px-4 py-2 text-white {{ $mobileHoverBg }} rounded flex justify-between items-center">
                        Kepengurusan
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-4">
                        <a href="{{ route('kepengurusan.struktur') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Struktur
                            Pengurus</a>
                        <a href="{{ route('kepengurusan.tugas') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Tugas
                            Pengurus</a>
                        <a href="{{ route('kepengurusan.tokoh') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Tokoh
                            Utama</a>
                    </div>
                </div>

                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-button w-full text-left px-4 py-2 text-white {{ $mobileHoverBg }} rounded flex justify-between items-center">
                        Kegiatan
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-4">
                        <a href="{{ route('kegiatan.galeri') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Galeri
                            Foto</a>
                        <a href="{{ route('kegiatan.video') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Video/Dokumenter</a>
                        <a href="{{ route('kegiatan.berita') }}"
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
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Produk</a>
                        <a href="{{ route('produk.mitra') }}"
                            class="block px-4 py-2 text-sm {{ $navTransparent ? 'text-white' : 'text-primary-100' }} {{ $mobileHoverBg }} rounded">Mitra</a>
                    </div>
                </div>

                <a href="{{ route('kontak.index') }}"
                    class="block px-4 py-2 {{ $navTransparent ? 'text-white' : 'text-white' }} {{ $mobileHoverBg }} rounded">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- CTA Section (Optional - can be yielded from pages) -->
    @yield('cta')

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">Karang Taruna</h3>
                    <p class="text-gray-400">Organisasi sosial wadah pengembangan generasi muda.</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Link Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white">Beranda</a></li>
                        <li><a href="{{ route('tentang.index') }}" class="text-gray-400 hover:text-white">Tentang</a>
                        </li>
                        <li><a href="{{ route('kegiatan.index') }}" class="text-gray-400 hover:text-white">Kegiatan</a>
                        </li>
                        <li><a href="{{ route('kontak.index') }}" class="text-gray-400 hover:text-white">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Hubungi Kami</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>Email: info@karangtaruna.com</li>
                        <li>Telepon: (021) 1234567</li>
                        <li>WhatsApp: 0812-3456-7890</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Karang Taruna. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        const navbar = document.getElementById('navbar');

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
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Mobile Dropdown Toggle
        document.querySelectorAll('.mobile-dropdown-button').forEach(button => {
            button.addEventListener('click', function () {
                const content = this.nextElementSibling;
                content.classList.toggle('hidden');
                const svg = this.querySelector('svg');
                svg.style.transform = content.classList.contains('hidden') ? '' : 'rotate(180deg)';
            });
        });
    </script>
</body>

    {{-- Stacked scripts from child views (e.g. pesanWhatsApp, product highlight) --}}
    @stack('scripts')

</html>

</html>