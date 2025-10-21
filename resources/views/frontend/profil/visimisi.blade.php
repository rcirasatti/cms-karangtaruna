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
                    <span class="text-blue-200">Profil</span>
                </nav>

                <div class="flex items-center space-x-4 mb-4">
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-2xl">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold tracking-tight">Profil Organisasi</h1>
                        <p class="mt-2 text-xl text-blue-100">Organisasi kepemudaan untuk pengembangan dan pemberdayaan
                            masyarakat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($visiMisi)
        <div class="bg-color_bg py-16">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-800 mb-3 uppercase tracking-wide">Visi & Misi</h2>
                    <div class="w-24 h-1 bg-secondary mx-auto"></div>
                </div>
                <div class="m-4 md:m-20">
                    <div id="vision" class="relative flex flex-col md:flex-row mb-10 scroll-mt-24">
                        <div class="md:w-[400px] bg-gray-100 md:absolute shadow-xl hover:scale-105">
                            <img src="{{ asset('storage/' . $visiMisi->gambar_visi) }}" alt="Vision" class="w-full h-full object-cover">
                        </div>
                        <div
                            class="bg-gradient-to-br from-primary-700 via-primary-800 to-primary-700 py-16 px-8 md:px-16 md:rounded md:min-h-[400px] md:ml-[350px] md:pl-32 shadow-xl">
                            <h2 class="text-3xl font-bold text-secondary mb-10 uppercase tracking-wide">VISI</h2>
                            <div class="text-gray-300 leading-relaxed text-base lg:text-lg">
                                <p class="whitespace-pre-line">{{ $visiMisi->visi }}</p>
                            </div>
                        </div>
                    </div>

                    <div id="mission" class="relative flex flex-col md:flex-row mb-20 scroll-mt-24">
                        <div
                            class="order-last bg-gradient-to-br from-primary-700 via-primary-800 to-primary-700 py-16 px-8 md:px-16 md:rounded md:min-h-[400px] md:mr-[350px] md:pr-32 shadow-xl">
                            <h2 class="text-3xl font-bold text-secondary mb-10 uppercase tracking-wide">MISI</h2>
                            <div class="text-gray-300 leading-relaxed text-base lg:text-lg">
                                <p class="whitespace-pre-line">{{ $visiMisi->misi }}</p>
                            </div>
                        </div>
                        <div class="md:w-[400px] bg-gray-100 md:absolute right-0 top-0 shadow-xl hover:scale-105">
                            <img src="{{ asset('storage/' . $visiMisi->gambar_misi) }}" alt="Mission" class="w-full h-full object-cover">
                        </div>
                    </div>

                    @if($visiMisi->tujuan && $visiMisi->fungsi)
                        <div id="tujuan" class="scroll-mt-24 mb-10">
                            <div class="text-center mb-12">
                                <h2 class="text-4xl font-bold text-gray-800 mb-3 uppercase tracking-wide">Tujuan & Fungsi</h2>
                                <div class="w-24 h-1 bg-secondary mx-auto"></div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-8">
                                <div
                                    class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:scale-105">
                                    <div class="relative h-48 overflow-hidden">
                                        <img src="{{ asset('storage/' . $visiMisi->gambar_tujuan) }}" alt="Tujuan"
                                            class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-gradient-to-t from-primary-900/90 to-transparent"></div>
                                        <div class="absolute bottom-0 left-0 p-6">
                                            <div class="flex items-center space-x-3">
                                                <div class="bg-secondary p-3 rounded-lg">
                                                    <svg class="w-8 h-8 text-primary-900" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <h3 class="text-2xl font-bold text-white uppercase tracking-wide">Tujuan</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-8">
                                        <div class="text-gray-700 leading-relaxed text-base whitespace-pre-line">
                                            {{ $visiMisi->tujuan }}
                                        </div>
                                    </div>
                                </div>
                                <div id="fungsi"
                                    class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:scale-105">
                                    <div class="relative h-48 overflow-hidden">
                                        <img src="{{ asset('storage/' . $visiMisi->gambar_fungsi) }}" alt="Fungsi"
                                            class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-gradient-to-t from-primary-900/90 to-transparent"></div>
                                        <div class="absolute bottom-0 left-0 p-6">
                                            <div class="flex items-center space-x-3">
                                                <div class="bg-secondary p-3 rounded-lg">
                                                    <svg class="w-8 h-8 text-primary-900" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <h3 class="text-2xl font-bold text-white uppercase tracking-wide">Fungsi</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-8">
                                        <div class="text-gray-700 leading-relaxed text-base whitespace-pre-line">
                                            {{ $visiMisi->fungsi }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($visiMisi->tujuan)
                        <div id="tujuan" class="scroll-mt-24 mb-10">
                            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden max-w-4xl mx-auto">
                                <div class="relative h-64 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=800&h=600&fit=crop"
                                        alt="Tujuan" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-primary-900/90 to-transparent"></div>
                                    <div class="absolute bottom-0 left-0 p-8">
                                        <h2 class="text-3xl font-bold text-white uppercase tracking-wide">Tujuan</h2>
                                    </div>
                                </div>
                                <div class="p-12">
                                    <div class="text-gray-700 leading-relaxed text-lg whitespace-pre-line">
                                        {{ $visiMisi->tujuan }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($visiMisi->fungsi)
                        <div id="fungsi" class="scroll-mt-24 mb-10">
                            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden max-w-4xl mx-auto">
                                <div class="relative h-64 overflow-hidden">
                                    <img src={{ $visiMisi->gambar_fungsi }} alt="Fungsi" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-primary-900/90 to-transparent"></div>
                                    <div class="absolute bottom-0 left-0 p-8">
                                        <h2 class="text-3xl font-bold text-white uppercase tracking-wide">Fungsi</h2>
                                    </div>
                                </div>
                                <div class="p-12">
                                    <div class="text-gray-700 leading-relaxed text-lg whitespace-pre-line">
                                        {{ $visiMisi->fungsi }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($visiMisi->nilai_dasar)
                        <div id="nilai-dasar" class="scroll-mt-24">
                            <div
                                class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-primary-900 rounded-2xl shadow-2xl overflow-hidden">
                                <!-- Decorative Pattern -->
                                <div class="absolute inset-0 opacity-10">
                                    <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full -mr-48 -mt-48"></div>
                                    <div class="absolute bottom-0 left-0 w-96 h-96 bg-white rounded-full -ml-48 -mb-48"></div>
                                    <div
                                        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 border-4 border-white rounded-full">
                                    </div>
                                </div>

                                <div class="relative z-10 p-8 md:p-16">
                                    <div class="flex flex-col items-center mb-12">
                                        <div class="bg-secondary p-4 rounded-full mb-6 shadow-lg">
                                            <svg class="w-12 h-12 text-primary-900" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                                </path>
                                            </svg>
                                        </div>
                                        <h2 class="text-4xl font-bold text-white mb-3 uppercase tracking-wide text-center">
                                            Nilai-Nilai Dasar</h2>
                                        <div class="w-32 h-1 bg-secondary"></div>
                                    </div>

                                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-8 md:p-12 border border-white/20">
                                        <div
                                            class="text-white leading-relaxed text-base lg:text-lg whitespace-pre-line text-center max-w-5xl mx-auto">
                                            {{ $visiMisi->nilai_dasar }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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
        document.addEventListener('DOMContentLoaded', function () {
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