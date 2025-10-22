@extends('admin.layouts.app')

@section('title', 'Kelola Sejarah Organisasi')
@section('page-title', 'Kelola Sejarah Organisasi')

@section('content')
    <div x-data="{ 
                                editSejarahModalOpen: false,
                                editIdentitasModalOpen: false,
                                editQuoteModalOpen: false
                            }" class="space-y-6">
        <!-- Header Card -->
        <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-2xl shadow-lg p-8 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold font-montserrat mb-2">Sejarah Organisasi</h1>
                    <p class="text-primary-100">Kelola sejarah organisasi Karang Taruna</p>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Three Edit Cards in Horizontal Layout -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
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
                    <h3 class="text-lg font-bold font-montserrat text-gray-800 mb-2">Edit Sejarah</h3>
                    <p class="text-gray-600 text-xs mb-4">Perbarui informasi sejarah organisasi</p>
                </div>

                <button @click="editSejarahModalOpen = true"
                    class="w-full bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold py-2.5 px-4 rounded-lg transition duration-300 flex items-center justify-center space-x-2 shadow-md hover:shadow-lg text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    <span>Edit</span>
                </button>
            </div>

            <!-- Card 2: Edit Identitas & Profil -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="text-center mb-4">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-primary-100 mb-3">
                        <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold font-montserrat text-gray-800 mb-2">Edit Identitas</h3>
                    <p class="text-gray-600 text-xs mb-4">Perbarui identitas dan profil organisasi</p>
                </div>

                <button @click="editIdentitasModalOpen = true"
                    class="w-full bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold py-2.5 px-4 rounded-lg transition duration-300 flex items-center justify-center space-x-2 shadow-md hover:shadow-lg text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    <span>Edit</span>
                </button>
            </div>

            <!-- Card 3: Edit Quote -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="text-center mb-4">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-primary-100 mb-3">
                        <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold font-montserrat text-gray-800 mb-2">Edit Quote</h3>
                    <p class="text-gray-600 text-xs mb-4">Perbarui kutipan inspiratif</p>
                </div>

                <button @click="editQuoteModalOpen = true"
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

            <div class="bg-white py-16">
                <div class="container mx-auto px-4">
                    <div class="grid lg:grid-cols-3 gap-8">
                        <div class="lg:col-span-2 space-y-12">
                            <div>
                                <h2
                                    class="text-3xl font-bold text-primary-800 mb-6 pb-3 border-b-4 border-secondary inline-block">
                                    Sejarah Karang Taruna
                                </h2>

                                <div class="space-y-4 text-gray-700 leading-relaxed text-justify whitespace-pre-line">
                                    {{ $profile->sejarah }}
                                </div>
                            </div>

                            <div class="bg-gray-50 rounded-xl p-8 border border-gray-200">
                                <h3 class="text-2xl font-bold text-primary-800 mb-6">Identitas Organisasi</h3>

                                <div class="space-y-4">
                                    <div class="flex border-b border-gray-200 pb-3">
                                        <div class="w-40 font-semibold text-gray-700">Nama Organisasi</div>
                                        <div class="flex-1 text-gray-600">: {{ $profile->nama_organisasi }}</div>
                                    </div>

                                    <div class="flex border-b border-gray-200 pb-3">
                                        <div class="w-40 font-semibold text-gray-700">Tahun Berdiri</div>
                                        <div class="flex-1 text-gray-600">: {{ $profile->tahun_berdiri }}</div>
                                    </div>

                                    <div class="flex border-b border-gray-200 pb-3">
                                        <div class="w-40 font-semibold text-gray-700">Legalitas</div>
                                        <div class="flex-1 text-gray-600">: {{ $profile->legalitas ?? '-' }}</div>
                                    </div>

                                    <div class="flex pb-3">
                                        <div class="w-40 font-semibold text-gray-700">Alamat</div>
                                        <div class="flex-1 text-gray-600">: {{ $profile->alamat }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-1">
                            <div class="sticky top-24 space-y-6">
                                <div class="bg-primary-800 text-white rounded-xl p-6 shadow-lg">
                                    <h3 class="text-xl font-bold mb-4 pb-2 border-b border-white/30">
                                        Profil Karang Taruna
                                    </h3>
                                    <p class="text-sm leading-relaxed text-blue-100">
                                        {{ Str::limit($profile->profil_singkat, 150) }}
                                    </p>
                                </div>

                                <div class="bg-gradient-to-br from-secondary to-accent rounded-xl p-6 shadow-lg">
                                    <h3 class="text-xl font-bold text-primary-900 mb-3">
                                        Mau Gabung atau Punya Pertanyaan?
                                    </h3>
                                    <p class="text-sm text-primary-800 mb-4 leading-relaxed">
                                        Yuk, hubungi Karang Taruna terdekat atau daftar keanggotaan langsung online! 🚀
                                    </p>
                                    <a href="{{ route('kontak.index') }}"
                                        class="block w-full bg-primary-700 hover:bg-primary-800 text-white text-center font-bold py-3 px-4 rounded-lg transition-all duration-300 shadow-md hover:shadow-xl">
                                        contacts
                                    </a>
                                </div>

                                <div class="bg-gray-50 rounded-xl p-6 border-l-4 border-secondary">
                                    <div class="text-6xl text-secondary mb-2 leading-none">"</div>
                                    <p class="text-gray-700 italic mb-4 leading-relaxed">
                                        {{ $quote->quote }}
                                    </p>
                                    <div class="flex items-center space-x-3 mt-4">
                                        @if($quote->foto)
                                            <img src="{{ asset('storage/' . $quote->foto) }}" alt="{{ $quote->nama }}"
                                                class="w-12 h-12 rounded-full object-cover border-2 border-primary-600">
                                        @else
                                            <div
                                                class="w-12 h-12 rounded-full bg-primary-100 border-2 border-primary-600 flex items-center justify-center">
                                                <span
                                                    class="text-primary-600 font-bold text-lg">{{ substr($quote->nama, 0, 1) }}</span>
                                            </div>
                                        @endif
                                        <div>
                                            <div class="font-bold text-gray-900">{{ $quote->nama }}</div>
                                            <div class="text-sm text-gray-600">{{ $quote->peran }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 1: Edit Sejarah -->
        <div x-show="editSejarahModalOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center">
                <div class="fixed inset-0 bg-black/50 backdrop-blur-sm bg-opacity-75 transition-opacity"
                    @click="editSejarahModalOpen = false"></div>

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
                                    <h3 class="text-2xl font-bold text-white font-montserrat">Edit Sejarah</h3>
                                    <p class="text-primary-100 text-sm mt-1">Perbarui informasi sejarah organisasi</p>
                                </div>
                            </div>
                            <button type="button" @click="editSejarahModalOpen = false"
                                class="text-white hover:text-gray-200 transition-colors">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <form action="{{ route('admin.about.sejarah.update') }}" method="POST" class="p-8 space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="sejarah" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="text-red-500">*</span> Sejarah Organisasi
                            </label>
                            <textarea id="sejarah" name="sejarah" rows="10"
                                placeholder="Tulis sejarah lengkap organisasi..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent font-poppins resize-none"
                                required>{{ old('sejarah', $profile->sejarah) }}</textarea>
                        </div>

                        <div
                            class="sticky bottom-0 bg-gray-50 px-8 py-4 -mx-8 -mb-8 flex items-center space-x-3 border-t rounded-b-2xl">
                            <button type="button" @click="editSejarahModalOpen = false"
                                class="flex-1 px-4 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition duration-300">
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

        <!-- Modal 2: Edit Identitas & Profil -->
        <div x-show="editIdentitasModalOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center">
                <div class="fixed inset-0 bg-black/50 backdrop-blur-sm bg-opacity-75 transition-opacity"
                    @click="editIdentitasModalOpen = false"></div>

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
                                    <h3 class="text-2xl font-bold text-white font-montserrat">Edit Identitas & Profil</h3>
                                    <p class="text-primary-100 text-sm mt-1">Perbarui identitas dan profil organisasi</p>
                                </div>
                            </div>
                            <button type="button" @click="editIdentitasModalOpen = false"
                                class="text-white hover:text-gray-200 transition-colors">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <form action="{{ route('admin.about.identitas.update') }}" method="POST" class="p-8 space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="nama_organisasi" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <span class="text-red-500">*</span> Nama Organisasi
                                </label>
                                <input type="text" id="nama_organisasi" name="nama_organisasi"
                                    value="{{ old('nama_organisasi', $profile->nama_organisasi) }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent"
                                    required>
                            </div>

                            <div>
                                <label for="tahun_berdiri" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <span class="text-red-500">*</span> Tahun Berdiri
                                </label>
                                <input type="number" id="tahun_berdiri" name="tahun_berdiri"
                                    value="{{ old('tahun_berdiri', $profile->tahun_berdiri) }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent"
                                    required>
                            </div>
                        </div>

                        <div>
                            <label for="legalitas" class="block text-sm font-semibold text-gray-700 mb-2">
                                Legalitas
                            </label>
                            <input type="text" id="legalitas" name="legalitas"
                                value="{{ old('legalitas', $profile->legalitas) }}"
                                placeholder="Contoh: SK Gubernur No. 123/2020"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent">
                        </div>

                        <div>
                            <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="text-red-500">*</span> Alamat
                            </label>
                            <textarea id="alamat" name="alamat" rows="3" placeholder="Alamat lengkap organisasi..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent resize-none"
                                required>{{ old('alamat', $profile->alamat) }}</textarea>
                        </div>

                        <div>
                            <label for="profil_singkat" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="text-red-500">*</span> Profil Singkat
                            </label>
                            <textarea id="profil_singkat" name="profil_singkat" rows="4"
                                placeholder="Deskripsi singkat organisasi..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent resize-none"
                                required>{{ old('profil_singkat', $profile->profil_singkat) }}</textarea>
                        </div>

                        <div
                            class="sticky bottom-0 bg-gray-50 px-8 py-4 -mx-8 -mb-8 flex items-center space-x-3 border-t rounded-b-2xl">
                            <button type="button" @click="editIdentitasModalOpen = false"
                                class="flex-1 px-4 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition duration-300">
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

        <!-- Modal 3: Edit Quote -->
        <div x-show="editQuoteModalOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center">
                <div class="fixed inset-0 bg-black/50 backdrop-blur-sm bg-opacity-75 transition-opacity"
                    @click="editQuoteModalOpen = false">
                </div>

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
                                    <h3 class="text-2xl font-bold text-white font-montserrat">Edit Quote</h3>
                                    <p class="text-primary-100 text-sm mt-1">Perbarui kutipan inspiratif</p>
                                </div>
                            </div>
                            <button type="button" @click="editQuoteModalOpen = false"
                                class="text-white hover:text-gray-200 transition-colors">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <form action="{{ route('admin.about.quote.update') }}" method="POST" enctype="multipart/form-data"
                        class="p-8 space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="quote" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="text-red-500">*</span> Kutipan
                            </label>
                            <textarea id="quote" name="quote" rows="4" placeholder="Tulis kutipan inspiratif..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent resize-none"
                                required>{{ old('quote', $quote->quote) }}</textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <span class="text-red-500">*</span> Nama Tokoh
                                </label>
                                <input type="text" id="nama" name="nama" value="{{ old('nama', $quote->nama) }}"
                                    placeholder="Contoh: Prabowo Subianto"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                    required>
                            </div>

                            <div>
                                <label for="peran" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <span class="text-red-500">*</span> Jabatan/Peran
                                </label>
                                <input type="text" id="peran" name="peran" value="{{ old('peran', $quote->peran) }}"
                                    placeholder="Contoh: Presiden RI"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                    required>
                            </div>
                        </div>

                        <div>
                            <label for="foto" class="block text-sm font-semibold text-gray-700 mb-2">
                                Foto Tokoh (Opsional)
                            </label>

                            @if($quote->foto)
                                <div class="mb-3 flex items-center space-x-4">
                                    <img src="{{ asset('storage/' . $quote->foto) }}" alt="Foto {{ $quote->nama }}"
                                        class="w-20 h-20 rounded-full object-cover border-2 border-gray-300">
                                    <div class="text-sm text-gray-600">
                                        <p class="font-medium">Foto saat ini</p>
                                        <p class="text-xs text-gray-500">Upload foto baru untuk menggantinya</p>
                                    </div>
                                </div>
                            @endif

                            <div class="relative">
                                <input type="file" id="foto" name="foto" accept="image/*"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100"
                                    onchange="previewQuoteImage(event)">
                                <p class="mt-2 text-xs text-gray-500">
                                    Format: JPG, PNG, JPEG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah foto.
                                </p>
                            </div>

                            <!-- Preview image -->
                            <div id="quoteImagePreview" class="mt-3 hidden">
                                <p class="text-sm font-medium text-gray-700 mb-2">Preview:</p>
                                <img id="quotePreviewImg" src="" alt="Preview"
                                    class="w-24 h-24 rounded-full object-cover border-2 border-green-500">
                            </div>
                        </div>

                        <div
                            class="sticky bottom-0 bg-gray-50 px-8 py-4 -mx-8 -mb-8 flex items-center space-x-3 border-t rounded-b-2xl">
                            <button type="button" @click="editQuoteModalOpen = false"
                                class="flex-1 px-4 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition duration-300">
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
@endsection

@push('scripts')
    <script>
        function previewQuoteImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('quoteImagePreview');
            const previewImg = document.getElementById('quotePreviewImg');

            if (file) {
                // Validasi ukuran file (2MB)
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar! Maksimal 2MB.');
                    event.target.value = '';
                    preview.classList.add('hidden');
                    return;
                }

                // Validasi tipe file
                const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                if (!validTypes.includes(file.type)) {
                    alert('Format file tidak valid! Gunakan JPG, JPEG, atau PNG.');
                    event.target.value = '';
                    preview.classList.add('hidden');
                    return;
                }

                // Tampilkan preview
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
            }
        }
    </script>
@endpush