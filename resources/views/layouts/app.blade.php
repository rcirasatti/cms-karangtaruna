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
    <nav class="bg-primary-600 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('https://clipground.com/images/logo-karang-taruna-png-5.png') }}"
                        alt="Logo Karang Taruna" class="h-12">
                    <div class="text-left">
                        <span class="text-xl font-Montserrat font-bold text-white">Karang Taruna</span>
                        <br>
                        <span class="text-sm text-primary-100">Kelurahan Tembalang</span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-1">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 rounded-lg hover:bg-primary-700 transition {{ request()->routeIs('home') ? 'text-white bg-primary-700 font-semibold' : 'text-white' }}">
                        Home
                    </a>

                    <!-- Tentang Dropdown -->
                    <div class="relative group">
                        <button
                            class="px-4 py-2 rounded-lg hover:bg-primary-700 transition flex items-center {{ request()->routeIs('tentang.*') ? 'text-white bg-primary-700 font-semibold' : 'text-white' }}">
                            About
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <div class="py-1">
                                <a href="{{ route('tentang.logo') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Logo
                                    Karang Taruna</a>
                                <a href="{{ route('tentang.filosofi') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Filosofi
                                    Logo</a>
                                <a href="{{ route('tentang.profil') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Profil
                                    Organisasi</a>
                            </div>
                        </div>
                    </div>

                    <!-- Visi & Nilai Dropdown -->
                    <div class="relative group">
                        <button
                            class="px-4 py-2 rounded-lg hover:bg-primary-700 transition flex items-center {{ request()->routeIs('visi.*') ? 'text-white bg-primary-700 font-semibold' : 'text-white' }}">
                            Profile
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <div class="py-1">
                                <a href="{{ route('visi.visi') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Visi</a>
                                <a href="{{ route('visi.misi') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Misi</a>
                                <a href="{{ route('visi.tujuan') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Tujuan
                                    & Fungsi</a>
                                <a href="{{ route('visi.nilai') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Nilai-Nilai
                                    Dasar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Kepengurusan Dropdown -->
                    <div class="relative group">
                        <button
                            class="px-4 py-2 rounded-lg hover:bg-primary-700 transition flex items-center {{ request()->routeIs('kepengurusan.*') ? 'text-white bg-primary-700 font-semibold' : 'text-white' }}">
                            Organization
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <div class="py-1">
                                <a href="{{ route('kepengurusan.struktur') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Struktur
                                    Pengurus</a>
                                <a href="{{ route('kepengurusan.tugas') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Tugas
                                    Pengurus</a>
                                <a href="{{ route('kepengurusan.tokoh') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Tokoh
                                    Utama</a>
                            </div>
                        </div>
                    </div>

                    <!-- Kegiatan Dropdown -->
                    <div class="relative group">
                        <button
                            class="px-4 py-2 rounded-lg hover:bg-primary-700 transition flex items-center {{ request()->routeIs('kegiatan.*') ? 'text-white bg-primary-700 font-semibold' : 'text-white' }}">
                            Gallery
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <div class="py-1">
                                <a href="{{ route('kegiatan.galeri') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Galeri
                                    Foto</a>
                                <a href="{{ route('kegiatan.video') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Video/Dokumenter</a>
                                <a href="{{ route('kegiatan.berita') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Arsip
                                    Berita</a>
                            </div>
                        </div>
                    </div>

                    <!-- Produk & Mitra Dropdown -->
                    <div class="relative group">
                        <button
                            class="px-4 py-2 rounded-lg hover:bg-primary-700 transition flex items-center {{ request()->routeIs('produk.*') ? 'text-white bg-primary-700 font-semibold' : 'text-white' }}">
                            Product & Partners
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <div class="py-1">
                                <a href="{{ route('produk.list') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Daftar
                                    Produk</a>
                                <a href="{{ route('produk.mitra') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Mitra/UMKM</a>
                                <a href="{{ route('produk.testimoni') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Testimoni</a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('kontak.index') }}"
                        class="px-4 py-2 rounded-lg hover:bg-primary-700 transition {{ request()->routeIs('kontak.*') ? 'text-white bg-primary-700 font-semibold' : 'text-white' }}">
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
                    class="block px-4 py-2 text-white hover:bg-primary-700 rounded">Beranda</a>

                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-button w-full text-left px-4 py-2 text-white hover:bg-primary-700 rounded flex justify-between items-center">
                        Tentang
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-4">
                        <a href="{{ route('tentang.logo') }}"
                            class="block px-4 py-2 text-sm text-primary-100 hover:bg-primary-700 rounded">Logo Karang
                            Taruna</a>
                        <a href="{{ route('tentang.filosofi') }}"
                            class="block px-4 py-2 text-sm text-primary-100 hover:bg-primary-700 rounded">Filosofi Logo</a>
                        <a href="{{ route('tentang.profil') }}"
                            class="block px-4 py-2 text-sm text-primary-100 hover:bg-primary-700 rounded">Profil
                            Organisasi</a>
                    </div>
                </div>

                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-button w-full text-left px-4 py-2 text-white hover:bg-primary-700 rounded flex justify-between items-center">
                        Visi & Nilai
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-4">
                        <a href="{{ route('visi.visi') }}"
                            class="block px-4 py-2 text-sm text-primary-100 hover:bg-primary-700 rounded">Visi</a>
                        <a href="{{ route('visi.misi') }}"
                            class="block px-4 py-2 text-sm text-primary-100 hover:bg-primary-700 rounded">Misi</a>
                        <a href="{{ route('visi.tujuan') }}"
                            class="block px-4 py-2 text-sm text-primary-100 hover:bg-primary-700 rounded">Tujuan &
                            Fungsi</a>
                        <a href="{{ route('visi.nilai') }}"
                            class="block px-4 py-2 text-sm text-primary-100 hover:bg-primary-700 rounded">Nilai-Nilai
                            Dasar</a>
                    </div>
                </div>

                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-button w-full text-left px-4 py-2 text-white hover:bg-primary-700 rounded flex justify-between items-center">
                        Kepengurusan
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-4">
                        <a href="{{ route('kepengurusan.struktur') }}"
                            class="block px-4 py-2 text-sm text-primary-100 hover:bg-primary-700 rounded">Struktur
                            Pengurus</a>
                        <a href="{{ route('kepengurusan.tugas') }}"
                            class="block px-4 py-2 text-sm text-primary-100 hover:bg-primary-700 rounded">Tugas Pengurus</a>
                        <a href="{{ route('kepengurusan.tokoh') }}"
                            class="block px-4 py-2 text-sm text-primary-100 hover:bg-primary-700 rounded">Tokoh Utama</a>
                    </div>
                </div>

                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-button w-full text-left px-4 py-2 text-white hover:bg-primary-700 rounded flex justify-between items-center">
                        Kegiatan
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-4">
                        <a href="{{ route('kegiatan.galeri') }}"
                            class="block px-4 py-2 text-sm text-primary-100 hover:bg-primary-700 rounded">Galeri Foto</a>
                        <a href="{{ route('kegiatan.video') }}"
                            class="block px-4 py-2 text-sm text-primary-100 hover:bg-primary-700 rounded">Video/Dokumenter</a>
                        <a href="{{ route('kegiatan.berita') }}"
                            class="block px-4 py-2 text-sm text-primary-100 hover:bg-primary-700 rounded">Arsip Berita</a>
                    </div>
                </div>

                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-button w-full text-left px-4 py-2 text-white hover:bg-primary-700 rounded flex justify-between items-center">
                        Produk & Mitra
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-4">
                        <a href="{{ route('produk.list') }}"
                            class="block px-4 py-2 text-sm text-primary-100 hover:bg-primary-700 rounded">Daftar Produk</a>
                        <a href="{{ route('produk.mitra') }}"
                            class="block px-4 py-2 text-sm text-primary-100 hover:bg-primary-700 rounded">Mitra/UMKM</a>
                        <a href="{{ route('produk.testimoni') }}"
                            class="block px-4 py-2 text-sm text-primary-100 hover:bg-primary-700 rounded">Testimoni</a>
                    </div>
                </div>

                <a href="{{ route('kontak.index') }}"
                    class="block px-4 py-2 text-white hover:bg-primary-700 rounded">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
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
        // Mobile Menu Toggle
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

</html>