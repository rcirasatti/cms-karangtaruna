@extends('admin.layouts.app')

@section('title', 'Edit Mitra')
@section('page-title', 'Edit Data Mitra')

@section('content')
<div class="space-y-6">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-2xl shadow-lg p-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold font-montserrat mb-2">Edit Mitra</h1>
                <p class="text-primary-100">Perbarui informasi mitra, logo, dan testimoni</p>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-lg p-8">
        <form action="{{ route('admin.mitra.update', $mitra->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6" data-validate="true">
            @csrf
            @method('PUT')

            <!-- Error Validation Alert -->
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-semibold text-red-700 mb-2">Ada masalah dengan input Anda:</p>
                            <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Form -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Nama Mitra -->
                    <div>
                        <label for="nama_mitra" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="text-red-500">*</span> Nama Mitra
                        </label>
                        <input type="text"
                               id="nama_mitra"
                               name="nama_mitra"
                               value="{{ old('nama_mitra', $mitra->nama_mitra) }}"
                               placeholder="Contoh: PT. Mitra Jaya"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent font-poppins @error('nama_mitra') border-red-500 @enderror"
                               required>
                        @error('nama_mitra')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis Mitra -->
                    <div>
                        <label for="jenis" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="text-red-500">*</span> Jenis Mitra
                        </label>
                        <select id="jenis"
                                name="jenis"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent font-poppins @error('jenis') border-red-500 @enderror"
                                required>
                            <option value="">-- Pilih Jenis Mitra --</option>
                            <option value="UMKM" {{ old('jenis', $mitra->jenis) === 'UMKM' ? 'selected' : '' }}>UMKM</option>
                            <option value="Makanan" {{ old('jenis', $mitra->jenis) === 'Makanan' ? 'selected' : '' }}>Makanan</option>
                            <option value="Fashion" {{ old('jenis', $mitra->jenis) === 'Fashion' ? 'selected' : '' }}>Fashion</option>
                            <option value="Kerajinan" {{ old('jenis', $mitra->jenis) === 'Kerajinan' ? 'selected' : '' }}>Kerajinan</option>
                            <option value="Tanaman" {{ old('jenis', $mitra->jenis) === 'Tanaman' ? 'selected' : '' }}>Tanaman</option>
                            <option value="Sponsor" {{ old('jenis', $mitra->jenis) === 'Sponsor' ? 'selected' : '' }}>Sponsor</option>
                            <option value="Kemitraan" {{ old('jenis', $mitra->jenis) === 'Kemitraan' ? 'selected' : '' }}>Kemitraan</option>
                            <option value="Donatur" {{ old('jenis', $mitra->jenis) === 'Donatur' ? 'selected' : '' }}>Donatur</option>
                            <option value="Supplier" {{ old('jenis', $mitra->jenis) === 'Supplier' ? 'selected' : '' }}>Supplier</option>
                            <option value="Lainnya" {{ old('jenis', $mitra->jenis) === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('jenis')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-2">
                            Deskripsi
                        </label>
                        <textarea id="deskripsi"
                                  name="deskripsi"
                                  rows="4"
                                  placeholder="Jelaskan tentang mitra..."
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent font-poppins resize-none @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi', $mitra->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kontak -->
                    <div>
                        <label for="kontak" class="block text-sm font-semibold text-gray-700 mb-2">
                            Kontak (Telepon/Email)
                        </label>
                        <input type="text"
                               id="kontak"
                               name="kontak"
                               value="{{ old('kontak', $mitra->kontak) }}"
                               placeholder="Contoh: 021-123456 atau contact@mitra.com"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent font-poppins @error('kontak') border-red-500 @enderror">
                        @error('kontak')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Testimoni -->
                    <div>
                        <label for="testimoni" class="block text-sm font-semibold text-gray-700 mb-2">
                            Testimoni
                        </label>
                        <textarea id="testimoni"
                                  name="testimoni"
                                  rows="4"
                                  placeholder="Tuliskan testimoni dari mitra tentang kerjasama dengan Karang Taruna..."
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent font-poppins resize-none @error('testimoni') border-red-500 @enderror">{{ old('testimoni', $mitra->testimoni) }}</textarea>
                        <p class="text-gray-500 text-xs mt-2">Maksimal 1000 karakter</p>
                        @error('testimoni')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Upload Logo Section -->
                <div class="lg:col-span-1">
                    <div class="bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl p-6 border-2 border-dashed border-primary-300 sticky top-8">
                        <h3 class="text-lg font-bold font-montserrat text-gray-800 mb-4">Logo Mitra</h3>

                        <div x-data="{ fileName: '' }" class="space-y-4">
                            <!-- Current Logo -->
                            @if($mitra->logo)
                                <div class="bg-white rounded-xl p-4 text-center">
                                    <p class="text-xs font-semibold text-gray-700 mb-3">Logo Saat Ini</p>
                                    <img src="{{ asset('storage/' . $mitra->logo) }}" alt="{{ $mitra->nama_mitra }}" class="h-24 mx-auto mb-3 rounded-lg object-cover">
                                    <p class="text-xs text-gray-600">Upload logo baru untuk mengganti</p>
                                </div>
                            @endif

                            <!-- File Input -->
                            <label class="relative block">
                                <input type="file"
                                       name="logo"
                                       accept="image/*"
                                       class="hidden"
                                       @change="fileName = $event.target.files[0]?.name || ''">
                                <div class="bg-white rounded-xl border-2 border-dashed border-primary-300 hover:border-primary-400 p-6 text-center cursor-pointer transition">
                                    <svg class="w-12 h-12 mx-auto text-primary-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    <p class="text-sm font-semibold text-gray-700 mb-1">Klik untuk upload</p>
                                    <p class="text-xs text-gray-500">atau drag & drop</p>
                                    <p x-show="fileName" class="text-xs text-primary-600 mt-2 font-semibold">
                                        <span x-text="fileName"></span>
                                    </p>
                                </div>
                            </label>

                            <!-- Requirements -->
                            <div class="bg-white/60 rounded-lg p-3 space-y-2">
                                <p class="text-xs font-semibold text-gray-700">Persyaratan:</p>
                                <ul class="text-xs text-gray-600 space-y-1">
                                    <li class="flex items-center">
                                        <svg class="w-3 h-3 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Format: JPG, PNG, GIF
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-3 h-3 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Ukuran max: 2 MB
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-3 h-3 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Bersifat opsional
                                    </li>
                                </ul>
                            </div>

                            <!-- Info -->
                            <div class="bg-blue-50 rounded-lg p-3 border-l-4 border-blue-500">
                                <p class="text-xs text-blue-800 font-poppins">
                                    <span class="font-semibold">💡 Tips:</span> Logo mitra akan ditampilkan di halaman mitra frontend dengan ukuran konsisten.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="sticky bottom-0 bg-gray-50 px-8 py-4 -mx-8 -mb-8 flex items-center space-x-3 border-t rounded-b-2xl">
                <a href="{{ route('admin.mitra.index') }}"
                   class="flex-1 px-4 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition duration-300 text-center">
                    Batal
                </a>
                <button type="submit"
                        class="flex-1 px-4 py-3 bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold rounded-lg transition duration-300 flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Simpan Perubahan</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
