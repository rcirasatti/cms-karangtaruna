@extends('admin.layouts.app')

@section('title', 'Kelola Profil')
@section('page-title', 'Kelola Profil')

@section('content')

    <div x-data="{
                                                                                    visiMisiModalOpen: false,
                                                                                    tujuanFungsiModalOpen: false,
                                                                                    nilaiDasarModalOpen: false
                                                                                }" class="space-y-6">
        <!-- Header Card -->
        <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-2xl shadow-lg p-8 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold font-montserrat mb-2">Menu Profil</h1>
                    <p class="text-primary-100">Kelola Profil Karang Taruna yang ditampilkan di frontend</p>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-2xl rounded-2xl">
            <div class="bg-color_bg py-16">
                <div class="container mx-auto px-4">
                    <div class="text-center mb-12 relative sm:pt-10">
                        <h2 class="text-4xl font-bold text-gray-800 mb-3 uppercase tracking-wide">Visi & Misi</h2>
                        <div class="w-24 h-1 bg-secondary mx-auto"></div>

                        <button @click="visiMisiModalOpen = true"
                            class="absolute top-0 right-0 bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg shadow-md transition-all duration-200 flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            <span>Edit Visi & Misi</span>
                        </button>
                    </div>
                    <div class="m-4 md:m-20">
                        <div id="vision" class="relative flex flex-col md:flex-row mb-10 scroll-mt-24">
                            <div class="md:w-[400px] bg-gray-100 md:absolute shadow-xl hover:scale-105">
                                @if($profil->gambar_visi)
                                    <img src="{{ asset('storage/' . $profil->gambar_visi) }}" alt="Vision"
                                        class="w-full h-full object-cover">
                                @else
                                    <img src="{{ asset('images/default/default.jpg') }}" alt="Vision No Picture"
                                        class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div class="w-full">
                                <div
                                    class="bg-gradient-to-br from-primary-700 via-primary-800 to-primary-700 py-16 px-8 md:px-16 md:rounded md:min-h-[400px] md:ml-[350px] md:pl-32 shadow-xl">
                                    <h2 class="text-3xl font-bold text-secondary mb-10 uppercase tracking-wide">VISI</h2>
                                    <div class="text-gray-300 leading-relaxed text-base lg:text-lg">
                                        {!! \App\Helpers\TextHelper::formatList($profil->visi) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="mission" class="relative flex flex-col md:flex-row mb-20 scroll-mt-24">
                            <div class="w-full">
                                <div
                                    class="order-last bg-gradient-to-br from-primary-700 via-primary-800 to-primary-700 py-16 px-8 md:px-16 md:rounded md:min-h-[400px] md:mr-[350px] md:pr-32 shadow-xl">
                                    <h2 class="text-3xl font-bold text-secondary mb-10 uppercase tracking-wide">MISI</h2>
                                    <div class="text-gray-300 leading-relaxed text-base lg:text-lg">
                                        {!! \App\Helpers\TextHelper::formatList($profil->misi) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="md:w-[400px] bg-gray-100 md:absolute right-0 top-0 shadow-xl hover:scale-105">
                                @if($profil->gambar_misi)
                                    <img src="{{ asset('storage/' . $profil->gambar_misi) }}" alt="Mission"
                                        class="w-full h-full object-cover">
                                @else
                                    <img src="{{ asset('images/default/default.jpg') }}" alt="Mission No Picture"
                                        class="w-full h-full object-cover">
                                @endif
                            </div>
                        </div>

                        @if($profil->tujuan && $profil->fungsi)
                            <div id="tujuan" class="scroll-mt-24 mb-10">
                                <div class="text-center mb-12 relative sm:pt-10">
                                    <h2 class="text-4xl font-bold text-gray-800 mb-3 uppercase tracking-wide">Tujuan & Fungsi
                                    </h2>
                                    <div class="w-24 h-1 bg-secondary mx-auto"></div>

                                    <button @click="tujuanFungsiModalOpen = true"
                                        class="absolute top-0 right-0 bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg shadow-md transition-all duration-200 flex items-center space-x-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                        <span>Edit Tujuan & Fungsi</span>
                                    </button>
                                </div>

                                <div class="grid md:grid-cols-2 gap-8">
                                    <div
                                        class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:scale-105">
                                        <div class="relative h-48 overflow-hidden">
                                            <img src="{{ asset('storage/' . $profil->gambar_tujuan) }}" alt="Tujuan"
                                                class="w-full h-full object-cover">
                                            <div class="absolute inset-0 bg-gradient-to-t from-primary-900/90 to-transparent">
                                            </div>
                                            <div class="absolute bottom-0 left-0 p-6">
                                                <div class="flex items-center space-x-3">
                                                    <div class="bg-secondary p-3 rounded-lg">
                                                        <svg class="w-8 h-8 text-primary-900" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <h3 class="text-2xl font-bold text-white uppercase tracking-wide">Tujuan
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-8">
                                            <div class="text-gray-700 leading-relaxed text-base lg:text-lg">
                                                {!! \App\Helpers\TextHelper::formatList($profil->tujuan) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div id="fungsi"
                                        class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:scale-105">
                                        <div class="relative h-48 overflow-hidden">
                                            <img src="{{ asset('storage/' . $profil->gambar_fungsi) }}" alt="Fungsi"
                                                class="w-full h-full object-cover">
                                            <div class="absolute inset-0 bg-gradient-to-t from-primary-900/90 to-transparent">
                                            </div>
                                            <div class="absolute bottom-0 left-0 p-6">
                                                <div class="flex items-center space-x-3">
                                                    <div class="bg-secondary p-3 rounded-lg">
                                                        <svg class="w-8 h-8 text-primary-900" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <h3 class="text-2xl font-bold text-white uppercase tracking-wide">Fungsi
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-8">
                                            <div class="text-gray-700 leading-relaxed text-base lg:text-lg">
                                                {!! \App\Helpers\TextHelper::formatList($profil->fungsi) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($profil->tujuan)
                            <div id="tujuan" class="scroll-mt-24 mb-10">
                                <div class="bg-white rounded-2xl shadow-2xl overflow-hidden max-w-4xl mx-auto">
                                    <div class="relative h-64 overflow-hidden">
                                        <img src={{ $profil->gambar_tujuan }} alt="Tujuan" class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-gradient-to-t from-primary-900/90 to-transparent"></div>
                                        <div class="absolute bottom-0 left-0 p-8">
                                            <h2 class="text-3xl font-bold text-white uppercase tracking-wide">Tujuan</h2>
                                        </div>
                                    </div>
                                    <div class="p-12">
                                        <div class="text-gray-700 leading-relaxed text-lg whitespace-pre-line">
                                            {{ $profil->tujuan }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($profil->fungsi)
                            <div id="fungsi" class="scroll-mt-24 mb-10">
                                <div class="bg-white rounded-2xl shadow-2xl overflow-hidden max-w-4xl mx-auto">
                                    <div class="relative h-64 overflow-hidden">
                                        <img src={{ $profil->gambar_fungsi }} alt="Fungsi" class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-gradient-to-t from-primary-900/90 to-transparent"></div>
                                        <div class="absolute bottom-0 left-0 p-8">
                                            <h2 class="text-3xl font-bold text-white uppercase tracking-wide">Fungsi</h2>
                                        </div>
                                    </div>
                                    <div class="p-12">
                                        <div class="text-gray-700 leading-relaxed text-lg whitespace-pre-line">
                                            {{ $profil->fungsi }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div id="nilai-dasar" class="scroll-mt-24 relative">
                            <!-- Edit Button for Nilai Dasar -->
                            <button @click="nilaiDasarModalOpen = true"
                                class="absolute top-4 right-4 z-20 bg-white hover:bg-gray-100 text-primary-700 px-4 py-2 rounded-lg shadow-md transition-all duration-200 flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                                <span>Edit Nilai Dasar</span>
                            </button>

                            <div
                                class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-primary-900 rounded-2xl shadow-2xl overflow-hidden">
                                <!-- Decorative Pattern -->
                                <div class="absolute inset-0 opacity-10">
                                    <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full -mr-48 -mt-48"></div>
                                    <div class="absolute bottom-0 left-0 w-96 h-96 bg-white rounded-full -ml-48 -mb-48">
                                    </div>
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

                                    <div
                                        class="text-white leading-relaxed text-base lg:text-lg text-{{ $profil->nilai_dasar_align ?? 'left' }} max-w-5xl mx-auto">
                                        @if($profil->nilai_dasar && is_array($profil->nilai_dasar) && count($profil->nilai_dasar) > 0)
                                            <ul class="space-y-3 flex gap-4 flex-wrap justify-center">
                                                @foreach($profil->nilai_dasar as $nilai)
                                                    @if(!empty(trim($nilai)))
                                                        <li class="flex items-start">
                                                            <div
                                                                class="flex bg-white/10 backdrop-blur-sm rounded-xl border border-white/20 p-2 md:p-4">
                                                                <svg class="w-6 h-6 text-secondary mr-3 mt-1 flex-shrink-0"
                                                                    fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span>{{ $nilai }}</span>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @else
                                            <div class="text-center py-8">
                                                <svg class="w-16 h-16 mx-auto mb-3 text-white/30" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                                <p class="text-white/70 text-lg font-semibold">Belum ada nilai dasar yang
                                                    ditambahkan.</p>
                                                <p class="text-white/50 text-sm mt-2">Klik tombol "Edit Nilai Dasar" untuk
                                                    menambahkan.</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Visi & Misi -->
        <div x-show="visiMisiModalOpen" @keydown.escape.window="visiMisiModalOpen = false"
            class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
            <div x-show="visiMisiModalOpen" @click="visiMisiModalOpen = false"
                class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-all duration-300"></div>

            <!-- Modal panel -->
            <div x-show="visiMisiModalOpen" class="relative bg-white rounded-2xl shadow-xl max-w-3xl w-full">
                <form action="{{ route('admin.profile.update', $profil->id ?? 1) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Header -->
                    <div
                        class="sticky top-0 bg-gradient-to-r from-primary-600 to-primary-700 text-white p-6 flex items-center justify-between rounded-t-2xl">
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            <h3 class="text-xl font-bold text-white">Edit Visi & Misi</h3>
                        </div>
                        <button type="button" @click="visiMisiModalOpen = false"
                            class="text-white hover:bg-primary-800/30 rounded-lg p-2 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Body -->
                    <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                        <!-- Info Box -->
                        <div class="mb-4 p-4 bg-blue-50 border-l-4 border-blue-400 rounded">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-blue-700">
                                        Edit visi dan misi organisasi Anda di sini.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Visi -->
                            <div>
                                <label for="visi" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <span class="text-red-500">*</span> Visi
                                </label>
                                <textarea name="visi" id="visi" rows="5" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan visi organisasi...">{{ $profil->visi }}</textarea>
                            </div>

                            <!-- Misi -->
                            <div>
                                <label for="misi" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <span class="text-red-500">*</span> Misi
                                </label>
                                <textarea name="misi" id="misi" rows="5" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan misi organisasi...">{{ $profil->misi }}</textarea>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Visi</label>
                                <input type="file" name="gambar_visi" accept="image/*"
                                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                    data-max-size="5242880">
                                <p class="text-xs text-red-500 mt-1 font-medium">⚠️ Maksimal: 5 MB</p>
                                @if($profil->gambar_visi)
                                    <p class="text-xs text-gray-500 mt-1">Current:
                                        {{ basename('storage/' . $profil->gambar_visi) }}
                                    </p>
                                @endif
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Misi</label>
                                <input type="file" name="gambar_misi" accept="image/*"
                                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                    data-max-size="5242880">
                                <p class="text-xs text-red-500 mt-1 font-medium">⚠️ Maksimal: 5 MB</p>
                                @if($profil->gambar_misi)
                                    <p class="text-xs text-gray-500 mt-1">Current:
                                        {{ basename('storage/' . $profil->gambar_misi) }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="bg-gray-50 px-6 py-4 flex justify-center gap-3 border-t rounded-b-2xl">
                        <button type="button" @click="visiMisiModalOpen = false"
                            class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 min-w-[120px]">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-6 py-2.5 bg-gradient-to-r from-primary-600 to-primary-700 text-white font-medium rounded-lg hover:from-primary-700 hover:to-primary-800 min-w-[120px] flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Edit Tujuan & Fungsi -->
        <div x-show="tujuanFungsiModalOpen" @keydown.escape.window="tujuanFungsiModalOpen = false"
            class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
            <div x-show="tujuanFungsiModalOpen" @click="tujuanFungsiModalOpen = false"
                class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-all duration-300"></div>

            <!-- Modal panel -->
            <div x-show="tujuanFungsiModalOpen" class="relative bg-white rounded-2xl shadow-xl max-w-3xl w-full">
                <form action="{{ route('admin.profile.update', $profil->id ?? 1) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Header -->
                    <div
                        class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-4 flex items-center justify-between rounded-t-2xl">
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            <h3 class="text-xl font-bold text-white">Edit Tujuan & Fungsi</h3>
                        </div>
                        <button type="button" @click="tujuanFungsiModalOpen = false"
                            class="text-white hover:bg-primary-800/30 rounded-lg p-2 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Body -->
                    <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                        <!-- Info Box -->
                        <div class="mb-4 p-4 bg-blue-50 border-l-4 border-blue-400 rounded">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-blue-700">
                                        Edit Fungsi dan Tujuan organisasi Anda di sini.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Tujuan -->
                            <div>
                                <label for="tujuan" class="block text-sm font-semibold text-gray-700 mb-2">Tujuan</label>
                                <textarea name="tujuan" id="tujuan" rows="5"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan tujuan organisasi...">{{ $profil->tujuan }}</textarea>
                            </div>

                            <!-- Fungsi -->
                            <div>
                                <label for="fungsi" class="block text-sm font-semibold text-gray-700 mb-2">Fungsi</label>
                                <textarea name="fungsi" id="fungsi" rows="5"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan fungsi organisasi...">{{ $profil->fungsi }}</textarea>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Tujuan</label>
                                <input type="file" name="gambar_tujuan" accept="image/*"
                                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                    data-max-size="5242880">
                                <p class="text-xs text-red-500 mt-1 font-medium">⚠️ Maksimal: 5 MB</p>
                                @if($profil->gambar_tujuan)
                                    <p class="text-xs text-gray-500 mt-1">Current:
                                        {{ basename('storage/' . $profil->gambar_tujuan) }}
                                    </p>
                                @endif
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Fungsi</label>
                                <input type="file" name="gambar_fungsi" accept="image/*"
                                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                    data-max-size="5242880">
                                <p class="text-xs text-red-500 mt-1 font-medium">⚠️ Maksimal: 5 MB</p>
                                @if($profil->gambar_fungsi)
                                    <p class="text-xs text-gray-500 mt-1">Current:
                                        {{ basename('storage/' . $profil->gambar_fungsi) }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="bg-gray-50 px-6 py-4 flex justify-center gap-3 border-t rounded-b-2xl">
                        <button type="button" @click="tujuanFungsiModalOpen = false"
                            class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 min-w-[120px]">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-6 py-2.5 bg-gradient-to-r from-primary-600 to-primary-700 text-white font-medium rounded-lg hover:from-primary-700 hover:to-primary-800 min-w-[120px] flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Edit Nilai Dasar -->
        <div x-show="nilaiDasarModalOpen" @keydown.escape.window="nilaiDasarModalOpen = false"
            class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
            <div x-show="nilaiDasarModalOpen" @click="nilaiDasarModalOpen = false"
                class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-all duration-300"></div>

            <!-- Modal panel -->
            <div x-show="nilaiDasarModalOpen" @modal-opened.window="if (nilaiDasarModalOpen) initNilaiDasar()" x-data="{
                                nilaiDasarItems: [],
                                nextId: 1,
                                initNilaiDasar() {
                                    // Reset and initialize from database
                                    let dbData = @js($profil->nilai_dasar ?? []);
                                    console.log('Initializing with data:', dbData);

                                    if (Array.isArray(dbData) && dbData.length > 0) {
                                        this.nilaiDasarItems = dbData.map((value, index) => ({
                                            id: Date.now() + index,
                                            value: value
                                        }));
                                        this.nextId = Date.now() + dbData.length;
                                    } else {
                                        this.nilaiDasarItems = [];
                                        this.nextId = 1;
                                    }
                                    console.log('Initialized items:', this.nilaiDasarItems);
                                },
                                init() {
                                    this.initNilaiDasar();
                                },
                                addNilaiDasar() {
                                    const newItem = { 
                                        id: this.nextId++, 
                                        value: '' 
                                    };
                                    this.nilaiDasarItems.push(newItem);
                                    console.log('Added item:', newItem);
                                    console.log('Current items:', this.nilaiDasarItems);
                                },
                                removeNilaiDasar(id) {
                                    console.log('Removing item with id:', id);
                                    console.log('Before removal:', this.nilaiDasarItems);
                                    this.nilaiDasarItems = this.nilaiDasarItems.filter(item => item.id !== id);
                                    console.log('After removal:', this.nilaiDasarItems);
                                    // Force Alpine to detect the change
                                    this.$nextTick(() => {
                                        console.log('Next tick - items:', this.nilaiDasarItems);
                                    });
                                }
                            }" class="relative bg-white rounded-2xl shadow-xl max-w-3xl w-full">
                <form action="{{ route('admin.profile.update', $profil->id ?? 1) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Header -->
                    <div
                        class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-4 flex items-center justify-between rounded-t-2xl">
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            <h3 class="text-xl font-bold text-white">Edit Nilai Dasar</h3>
                        </div>
                        <button type="button" @click="nilaiDasarModalOpen = false"
                            class="text-white hover:bg-primary-800/30 rounded-lg p-2 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Body -->
                    <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                        <!-- Info Box -->
                        <div class="mb-4 p-4 bg-blue-50 border-l-4 border-blue-400 rounded">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-blue-700">
                                        <strong>Tips:</strong> Tambahkan nilai-nilai dasar organisasi satu per satu dengan
                                        mengklik tombol "Tambah Nilai".
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Nilai-Nilai Dasar</label>

                            <!-- Dynamic Input Fields -->
                            <div class="space-y-3 mb-4">
                                <template x-for="(item, index) in nilaiDasarItems" :key="item.id">
                                    <div class="flex gap-2">
                                        <input type="text" :name="'nilai_dasar[' + index + ']'" x-model="item.value"
                                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            :placeholder="'Nilai dasar #' + (index + 1)">
                                        <button type="button" @click="removeNilaiDasar(item.id)"
                                            class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors flex items-center">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </template>

                                <!-- Empty State -->
                                <div x-show="nilaiDasarItems.length === 0" class="text-center py-8 text-gray-500">
                                    <svg class="w-16 h-16 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <p>Belum ada nilai dasar. Klik tombol di bawah untuk menambahkan.</p>
                                </div>
                            </div>

                            <!-- Add Button -->
                            <button type="button" @click="addNilaiDasar()"
                                class="w-full px-4 py-2 bg-green-500 hover:bg-green-600 text-white font-medium rounded-lg transition-colors flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Tambah Nilai
                            </button>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="bg-gray-50 px-6 py-4 flex justify-center gap-3 border-t rounded-b-2xl">
                        <button type="button" @click="nilaiDasarModalOpen = false"
                            class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 min-w-[120px]">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-6 py-2.5 bg-gradient-to-r from-primary-600 to-primary-700 text-white font-medium rounded-lg hover:from-primary-700 hover:to-primary-800 min-w-[120px] flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection