@extends('layouts.app')

@section('title', 'Visi & Misi - Karang Taruna')

@section('content')
    <div
        class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white py-32 md:h-[420px] h-[420px] overflow-hidden">
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
                    <span class="text-blue-200">Organisasi</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-white font-medium">Struktur Organisasi</span>
                </nav>

                <!-- Title dengan Icon -->
                <div class="flex items-center space-x-4 mb-4">
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-2xl">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold tracking-tight">Struktur Organisasi</h1>
                        <p class="mt-2 text-xl text-blue-100">Susunan kepengurusan yang mendukung kerja tim, memperkuat komunikasi, dan mempercepat eksekusi kegiatan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($pengurus && $pengurus->count() > 0)
        <div class="py-20">
            <div class="container mx-auto px-4">
                <!-- Tokoh Utama Section -->
                @php
                    $tokohUtama = $pengurus->where('is_tokoh_utama', true);
                @endphp

                @if($tokohUtama->count() > 0)
                    <div id="tokoh_utama" class="scroll-mt-24 mb-20">
                        <div class="text-center mb-16">
                            <h2 class="text-4xl font-bold text-gray-800 mb-3 uppercase tracking-wide">Tokoh Utama</h2>
                            <div class="w-24 h-1 bg-secondary mx-auto"></div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 max-w-7xl mx-auto px-4">
                            @foreach($tokohUtama as $tokoh)
                                <div class="text-center cursor-pointer" onclick="openModal('{{ $tokoh->nama }}', '{{ $tokoh->jabatan }}', '{{ $tokoh->foto }}', '{{ addslashes($tokoh->tugas ?? 'Tidak ada deskripsi tugas') }}', '{{ addslashes($tokoh->profil_singkat ?? '') }}')">
                                    <!-- Photo with Gold Background -->
                                    <div class="bg-gradient-to-b from-yellow-600 to-yellow-700 mb-6 inline-block">
                                        <div class="w-full aspect-[3/4] hover:scale-105 transition-transform">
                                            @if($tokoh->foto)
                                                <img src="{{ asset('storage/' . $tokoh->foto) }}" alt="{{ $tokoh->nama }}"
                                                    class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                                                    <svg class="w-24 h-24 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Name and Position -->
                                    <h3 class="text-primary-600 font-bold text-base md:text-lg uppercase tracking-wide mb-1">
                                        {{ $tokoh->nama }}
                                    </h3>
                                    <p class="text-secondary text-sm">{{ $tokoh->jabatan }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Struktur Pengurus Section -->
                @php
                    $strukturPengurus = $pengurus->where('is_tokoh_utama', false);
                @endphp

                @if($strukturPengurus->count() > 0)
                    <div id="struktur_pengurus" class="scroll-mt-24">
                        <div class="text-center mb-16">
                            <h2 class="text-4xl font-bold text-gray-800 mb-3 uppercase tracking-wide">Struktur Pengurus</h2>
                            <div class="w-24 h-1 bg-secondary mx-auto"></div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-12 max-w-7xl mx-auto px-4">
                            @foreach($strukturPengurus as $anggota)
                                <div class="text-center cursor-pointer" onclick="openModal('{{ $anggota->nama }}', '{{ $anggota->jabatan }}', '{{ $anggota->foto }}', '{{ addslashes($anggota->tugas ?? 'Tidak ada deskripsi tugas') }}', '{{ addslashes($anggota->profil_singkat ?? '') }}')">
                                    <!-- Photo with Gold Background -->
                                    <div class="bg-gradient-to-b from-yellow-600 to-yellow-700 mb-6 inline-block">
                                        <div class="w-full aspect-[3/4] hover:scale-105 transition-transform">
                                            @if($anggota->foto)
                                                <img src="{{ asset('storage/' . $anggota->foto) }}" alt="{{ $anggota->nama }}"
                                                    class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                                                    <svg class="w-24 h-24 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Name and Position -->
                                    <h3 class="text-primary-600 font-bold text-base md:text-lg uppercase tracking-wide mb-1">
                                        {{ $anggota->nama }}
                                    </h3>
                                    <p class="text-secondary text-sm">{{ $anggota->jabatan }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Modal Detail Pengurus -->
        <div id="pengurusModal" class="hidden fixed inset-0 bg-transparent bg-opacity-75 z-50 flex items-center justify-center p-4" onclick="closeModal(event)">
            <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl" onclick="event.stopPropagation()">
                <!-- Modal Header -->
                <div class="relative bg-gradient-to-r from-primary-600 to-primary-800 text-white p-6 rounded-t-2xl">
                    <button onclick="closeModal()" class="absolute top-4 right-4 text-white hover:text-gray-200 transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <div class="flex items-center space-x-4">
                        <div class="w-24 h-24 bg-gradient-to-b from-yellow-600 to-yellow-700 rounded-lg overflow-hidden flex-shrink-0">
                            <img id="modalFoto" src="" alt="" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 id="modalNama" class="text-2xl font-bold text-yellow-400 uppercase mb-1"></h3>
                            <p id="modalJabatan" class="text-blue-100 text-sm"></p>
                        </div>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="p-6">
                    <!-- Profil Singkat -->
                    <div id="modalProfilSection" class="mb-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-primary-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                            Profil Singkat
                        </h4>
                        <p id="modalProfil" class="text-gray-700 leading-relaxed whitespace-pre-line"></p>
                    </div>

                    <!-- Tugas & Tanggung Jawab -->
                    <div>
                        <h4 class="text-lg font-bold text-gray-800 mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-primary-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                            Tugas & Tanggung Jawab
                        </h4>
                        <p id="modalTugas" class="text-gray-700 leading-relaxed whitespace-pre-line"></p>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="bg-gray-50 px-6 py-4 rounded-b-2xl flex justify-end">
                    <button onclick="closeModal()" class="px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors font-medium">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    @else
        <div class="container mx-auto px-4 py-16">
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-8 text-center">
                <p class="text-yellow-800">Data visi dan misi belum tersedia.</p>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    <script>
        // Modal Functions
        function openModal(nama, jabatan, foto, tugas, profil) {
            const modal = document.getElementById('pengurusModal');
            const modalFoto = document.getElementById('modalFoto');
            const modalNama = document.getElementById('modalNama');
            const modalJabatan = document.getElementById('modalJabatan');
            const modalTugas = document.getElementById('modalTugas');
            const modalProfil = document.getElementById('modalProfil');
            const modalProfilSection = document.getElementById('modalProfilSection');

            // Set content
            modalNama.textContent = nama;
            modalJabatan.textContent = jabatan;
            modalTugas.textContent = tugas;
            
            // Set foto
            if (foto) {
                modalFoto.src = "{{ asset('storage') }}/" + foto;
                modalFoto.alt = nama;
            } else {
                modalFoto.src = "{{ asset('images/default-avatar.png') }}";
                modalFoto.alt = "No photo";
            }

            // Show/hide profil section
            if (profil && profil.trim() !== '') {
                modalProfil.textContent = profil;
                modalProfilSection.classList.remove('hidden');
            } else {
                modalProfilSection.classList.add('hidden');
            }

            // Show modal with animation
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            // Trigger animation
            setTimeout(() => {
                modal.classList.add('opacity-100');
            }, 10);
        }

        function closeModal(event) {
            if (event) {
                event.preventDefault();
            }
            const modal = document.getElementById('pengurusModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        });

        // Smooth scroll dengan offset untuk fixed header
        document.addEventListener('DOMContentLoaded', function () {
            // Handle hash pada URL saat halaman dimuat
            if (window.location.hash) {
                setTimeout(function () {
                    const target = document.querySelector(window.location.hash);
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }, 100);
            }

            // Handle klik pada link dengan hash
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);

                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });

                        // Update URL tanpa jump
                        history.pushState(null, null, targetId);
                    }
                });
            });
        });
    </script>
@endpush