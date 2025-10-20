@extends('admin.layouts.app')

@section('title', 'Tambah Mitra')
@section('page-title', 'Tambah Mitra Baru')

@section('content')
<div class="space-y-6">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-2xl shadow-lg p-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold font-montserrat mb-2">Tambah Mitra Baru</h1>
                <p class="text-primary-100">Tambahkan informasi mitra baru termasuk logo dan testimoni</p>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <form action="{{ route('admin.mitra.store') }}" method="POST" enctype="multipart/form-data" data-validate="true">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Form Column -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl shadow-lg p-8 space-y-6">
                    <!-- Error Alert -->
                    @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-semibold text-red-700 mb-2">Terjadi kesalahan:</p>
                                    <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Nama Mitra -->
                    <div>
                        <label for="nama_mitra" class="block text-sm font-semibold text-gray-800 mb-2.5">
                            <span class="text-red-500 font-bold">*</span> Nama Mitra
                        </label>
                        <input type="text"
                               id="nama_mitra"
                               name="nama_mitra"
                               value="{{ old('nama_mitra') }}"
                               placeholder="Contoh: Toko Batik Nusantara"
                               class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 transition font-poppins @error('nama_mitra') border-red-500 @enderror"
                               required>
                        @error('nama_mitra')
                            <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis Mitra -->
                    <div>
                        <label for="jenis" class="block text-sm font-semibold text-gray-800 mb-2.5">
                            <span class="text-red-500 font-bold">*</span> Jenis Mitra
                        </label>
                        <select id="jenis"
                                name="jenis"
                                class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 transition font-poppins appearance-none cursor-pointer @error('jenis') border-red-500 @enderror"
                                required>
                            <option value="">-- Pilih Jenis Mitra --</option>
                            <option value="UMKM" {{ old('jenis') === 'UMKM' ? 'selected' : '' }}>UMKM</option>
                            <option value="Makanan" {{ old('jenis') === 'Makanan' ? 'selected' : '' }}>🍽️ Makanan</option>
                            <option value="Fashion" {{ old('jenis') === 'Fashion' ? 'selected' : '' }}>👔 Fashion</option>
                            <option value="Kerajinan" {{ old('jenis') === 'Kerajinan' ? 'selected' : '' }}>🎨 Kerajinan</option>
                            <option value="Tanaman" {{ old('jenis') === 'Tanaman' ? 'selected' : '' }}>🌿 Tanaman</option>
                            <option value="Sponsor" {{ old('jenis') === 'Sponsor' ? 'selected' : '' }}>⭐ Sponsor</option>
                            <option value="Kemitraan" {{ old('jenis') === 'Kemitraan' ? 'selected' : '' }}>🤝 Kemitraan</option>
                            <option value="Donatur" {{ old('jenis') === 'Donatur' ? 'selected' : '' }}>❤️ Donatur</option>
                            <option value="Supplier" {{ old('jenis') === 'Supplier' ? 'selected' : '' }}>📦 Supplier</option>
                            <option value="Lainnya" {{ old('jenis') === 'Lainnya' ? 'selected' : '' }}>📝 Lainnya</option>
                        </select>
                        @error('jenis')
                            <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-sm font-semibold text-gray-800 mb-2.5">
                            Deskripsi
                        </label>
                        <textarea id="deskripsi"
                                  name="deskripsi"
                                  rows="3"
                                  placeholder="Jelaskan apa yang dilakukan mitra ini..."
                                  class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 transition font-poppins resize-none @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi') }}</textarea>
                        <p class="text-gray-500 text-xs mt-1">Maksimal 1000 karakter</p>
                        @error('deskripsi')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kontak -->
                    <div>
                        <label for="kontak" class="block text-sm font-semibold text-gray-800 mb-2.5">
                            📞 Kontak (Telepon/Email)
                        </label>
                        <input type="text"
                               id="kontak"
                               name="kontak"
                               value="{{ old('kontak') }}"
                               placeholder="Contoh: 0812-3456-7890 atau contact@mitra.com"
                               class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 transition font-poppins @error('kontak') border-red-500 @enderror">
                        @error('kontak')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Testimoni -->
                    <div class="border-t pt-6">
                        <label for="testimoni" class="block text-sm font-semibold text-gray-800 mb-2.5">
                            💬 Testimoni
                        </label>
                        <textarea id="testimoni"
                                  name="testimoni"
                                  rows="3"
                                  placeholder="Tuliskan testimoni/ulasan mitra tentang kerjasama dengan Karang Taruna..."
                                  class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 transition font-poppins resize-none @error('testimoni') border-red-500 @enderror">{{ old('testimoni') }}</textarea>
                        <p class="text-gray-500 text-xs mt-1">Maksimal 1000 karakter</p>
                        @error('testimoni')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Sidebar - Upload Area -->
            <div class="lg:col-span-1">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 border-2 border-blue-200 sticky top-8">
                    <h3 class="text-lg font-bold font-montserrat text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"></path>
                        </svg>
                        Logo Mitra
                    </h3>

                    <div x-data="{ fileName: '' }" class="space-y-4">
                        <!-- Upload Area -->
                        <label class="relative block group">
                            <input type="file"
                                   name="logo"
                                   accept="image/*"
                                   class="hidden"
                                   @change="fileName = $event.target.files[0]?.name || ''">
                            <div class="bg-white rounded-xl border-2 border-dashed border-blue-300 hover:border-blue-500 hover:bg-blue-50 p-6 text-center cursor-pointer transition duration-200">
                                <svg class="w-10 h-10 mx-auto text-blue-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <p class="text-sm font-semibold text-gray-700">Klik untuk upload</p>
                                <p class="text-xs text-gray-500 mt-1">atau drag & drop</p>
                                <p x-show="fileName" x-cloak class="text-xs text-blue-600 mt-2 font-semibold">
                                    ✓ <span x-text="fileName"></span>
                                </p>
                            </div>
                        </label>

                        <!-- Info Box -->
                        <div class="bg-white/70 rounded-lg p-3.5 space-y-2 border border-blue-200">
                            <p class="text-xs font-semibold text-gray-700">📋 Persyaratan File:</p>
                            <ul class="text-xs text-gray-600 space-y-1.5">
                                <li class="flex items-start">
                                    <svg class="w-3.5 h-3.5 mr-2 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>Format: JPG, PNG, GIF</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-3.5 h-3.5 mr-2 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>Ukuran max: 2 MB</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-3.5 h-3.5 mr-2 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>Bersifat opsional</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Tip Box -->
                        <div class="bg-amber-50 rounded-lg p-3.5 border-l-4 border-amber-400">
                            <p class="text-xs text-amber-800 font-poppins">
                                <span class="font-semibold">💡 Tips:</span> Gunakan logo dengan background transparan untuk hasil terbaik.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="bg-white rounded-2xl shadow-lg p-6 flex items-center space-x-4 mt-6">
            <a href="{{ route('admin.mitra.index') }}"
               class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition duration-200 text-center">
                ← Batal
            </a>
            <button type="submit"
                    class="flex-1 px-6 py-3 bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold rounded-lg transition duration-200 flex items-center justify-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Simpan Mitra</span>
            </button>
        </div>
    </form>
</div>
@endsection
