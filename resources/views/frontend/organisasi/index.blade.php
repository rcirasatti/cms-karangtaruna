@extends('layouts.app')

@section('title', 'Visi & Misi - Karang Taruna')

@section('content')
    <div
        class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white py-32 md:h-[420px] h-[420px] overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-white opacity-5 rounded-full -ml-48 -mb-48"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl">
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

                <div class="flex items-center space-x-4 mb-4">
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-2xl">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold tracking-tight">Struktur Organisasi</h1>
                        <p class="mt-2 text-xl text-blue-100">Susunan kepengurusan yang mendukung kerja tim, memperkuat
                            komunikasi, dan mempercepat eksekusi kegiatan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($pengurus && $pengurus->count() > 0)
        <div class="py-20">
            <div class="container mx-auto px-4">
                @php
                    $tokohUtama = $pengurus->where('is_tokoh_utama', true);
                @endphp

                @if($tokohUtama->count() > 0)
                    <div id="tokoh_utama" class="scroll-mt-24 mb-20">
                        <div class="text-center mb-16">
                            <h2 class="text-4xl font-bold text-gray-800 mb-3 uppercase tracking-wide">Tokoh Utama</h2>
                            <div class="w-24 h-1 bg-secondary mx-auto"></div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 max-w-7xl mx-auto px-4 justify-items-center">
                            @foreach($tokohUtama as $tokoh)
                                <div class="text-center w-40 sm:w-44 md:w-48 lg:w-52 cursor-pointer pengurus-card"
                                    data-nama="{{ $tokoh->nama }}" data-jabatan="{{ $tokoh->jabatan }}" data-foto="{{ $tokoh->foto }}"
                                    data-tugas="{{ $tokoh->tugas ?? 'Tidak ada deskripsi tugas' }}"
                                    data-profil="{{ $tokoh->profil_singkat ?? '' }}">
                                    <div
                                        class="aspect-[3/4] overflow-hidden rounded-xl shadow-2xl hover:scale-105 transition-transform mb-4">
                                        @if($tokoh->foto)
                                            <img src="{{ asset('storage/' . $tokoh->foto) }}" alt="{{ $tokoh->nama }}"
                                                class="block w-full h-full object-cover" loading="lazy">
                                        @else
                                            <div class="flex w-full h-full items-center justify-center bg-gray-300">
                                                <svg class="w-1/2 h-1/2 text-gray-400" viewBox="0 0 24 24" fill="currentColor"
                                                    aria-hidden="true">
                                                    <path
                                                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <h3 class="text-primary-600 font-bold text-base md:text-lg uppercase tracking-wide mb-1">
                                        {{ $tokoh->nama }}
                                    </h3>
                                    <p class="text-secondary text-sm">{{ $tokoh->jabatan }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $strukturPengurus = $pengurus->where('is_tokoh_utama', false);
                @endphp

                @if($strukturPengurus->count() > 0)
                    <div id="struktur_pengurus" class="scroll-mt-24">
                        <div class="text-center mb-16">
                            <h2 class="text-4xl font-bold text-gray-800 mb-3 uppercase tracking-wide">Struktur Pengurus</h2>
                            <div class="w-24 h-1 bg-secondary mx-auto"></div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-12 max-w-7xl mx-auto px-4 justify-items-center">
                            @foreach($strukturPengurus as $anggota)
                                <div class="text-center w-40 sm:w-44 md:w-48 lg:w-52 cursor-pointer pengurus-card"
                                    data-nama="{{ $anggota->nama }}" data-jabatan="{{ $anggota->jabatan }}"
                                    data-foto="{{ $anggota->foto }}" data-tugas="{{ $anggota->tugas ?? 'Tidak ada deskripsi tugas' }}"
                                    data-profil="{{ $anggota->profil_singkat ?? '' }}">
                                    <div
                                        class="aspect-[3/4] overflow-hidden rounded-xl shadow-lg hover:scale-105 transition-transform mb-4">
                                        @if($anggota->foto)
                                            <img src="{{ asset('storage/' . $anggota->foto) }}" alt="{{ $anggota->nama }}"
                                                class="block w-full h-full object-cover" loading="lazy">
                                        @else
                                            <div class="flex w-full h-full items-center justify-center bg-gray-300">
                                                <svg class="w-1/2 h-1/2 text-gray-400" viewBox="0 0 24 24" fill="currentColor"
                                                    aria-hidden="true">
                                                    <path
                                                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
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

        <div id="pengurusModal"
            class="hidden fixed inset-0 bg-transparent bg-opacity-75 z-50 flex items-center justify-center p-4"
            onclick="closeModal(event)">
            <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl"
                onclick="event.stopPropagation()">

                <div class="relative bg-gradient-to-r from-primary-600 to-primary-800 text-white p-6 rounded-t-2xl">
                    <button onclick="closeModal()"
                        class="absolute top-4 right-4 text-white hover:text-gray-200 transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                    <div class="flex items-center space-x-4">
                        <div
                            class="w-24 h-24 bg-gradient-to-b from-yellow-600 to-yellow-700 rounded-lg overflow-hidden flex-shrink-0">
                            <img id="modalFoto" src="" alt="" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 id="modalNama" class="text-2xl font-bold text-yellow-400 uppercase mb-1"></h3>
                            <p id="modalJabatan" class="text-blue-100 text-sm"></p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div id="modalProfilSection" class="mb-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-primary-600" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                            </svg>
                            Profil Singkat
                        </h4>
                        <p id="modalProfil" class="text-gray-700 leading-relaxed whitespace-pre-line"></p>
                    </div>

                    <div>
                        <h4 class="text-lg font-bold text-gray-800 mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-primary-600" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            Tugas & Tanggung Jawab
                        </h4>
                        <p id="modalTugas" class="text-gray-700 leading-relaxed whitespace-pre-line"></p>
                    </div>
                </div>

                <div class="bg-gray-50 px-6 py-4 rounded-b-2xl flex justify-end">
                    <button onclick="closeModal()"
                        class="px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors font-medium">
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
        function openModal(nama, jabatan, foto, tugas, profil) {
            const modal = document.getElementById('pengurusModal');
            const modalFoto = document.getElementById('modalFoto');
            const modalNama = document.getElementById('modalNama');
            const modalJabatan = document.getElementById('modalJabatan');
            const modalTugas = document.getElementById('modalTugas');
            const modalProfil = document.getElementById('modalProfil');
            const modalProfilSection = document.getElementById('modalProfilSection');

            modalNama.textContent = nama;
            modalJabatan.textContent = jabatan;
            modalTugas.textContent = tugas;

            if (foto) {
                modalFoto.src = "{{ asset('storage') }}/" + foto;
                modalFoto.alt = nama;
            } else {
                modalFoto.src = "{{ asset('images/default-avatar.png') }}";
                modalFoto.alt = "No photo";
            }

            if (profil && profil.trim() !== '') {
                modalProfil.textContent = profil;
                modalProfilSection.classList.remove('hidden');
            } else {
                modalProfilSection.classList.add('hidden');
            }

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';

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

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            // Event listener untuk pengurus cards
            document.querySelectorAll('.pengurus-card').forEach(card => {
                card.addEventListener('click', function () {
                    const nama = this.dataset.nama;
                    const jabatan = this.dataset.jabatan;
                    const foto = this.dataset.foto;
                    const tugas = this.dataset.tugas;
                    const profil = this.dataset.profil;

                    openModal(nama, jabatan, foto, tugas, profil);
                });
            });

            if (window.location.hash) {
                setTimeout(function () {
                    const target = document.querySelector(window.location.hash);
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }, 100);
            }

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

                        history.pushState(null, null, targetId);
                    }
                });
            });
        });
    </script>
@endpush