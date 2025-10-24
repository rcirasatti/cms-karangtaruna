@extends('admin.layouts.app')

@section('title', 'Tambah Berita')
@section('page-title', 'Tambah Berita Baru')

@section('content')
<div class="space-y-6">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-2xl shadow-lg p-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold font-montserrat mb-2">Tambah Berita Baru</h1>
                <p class="text-primary-100">Tambahkan berita dan kegiatan baru dengan informasi lengkap dan media menarik</p>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" data-validate="true">
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

                    <!-- Judul -->
                    <div>
                        <label for="judul" class="block text-sm font-semibold text-gray-800 mb-2.5">
                            <span class="text-red-500 font-bold">*</span> Judul Berita
                        </label>
                        <input type="text"
                               id="judul"
                               name="judul"
                               value="{{ old('judul') }}"
                               placeholder="Contoh: Kegiatan Bersih-Bersih Lingkungan"
                               class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 transition font-poppins @error('judul') border-red-500 @enderror"
                               required>
                        @error('judul')
                            <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <!-- Kategori -->
                    <div>
                        <label for="kategori" class="block text-sm font-semibold text-gray-800 mb-2.5">
                            <span class="text-red-500 font-bold">*</span> 📂 Kategori
                        </label>
                        <select id="kategori"
                                name="kategori"
                                class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 transition font-poppins appearance-none cursor-pointer @error('kategori') border-red-500 @enderror"
                                style="background-image: url('data:image/svg+xml;utf8,<svg fill=\"%236B7280\" viewBox=\"0 0 20 20\" xmlns=\"http://www.w3.org/2000/svg\"><path fill-rule=\"evenodd\" d=\"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z\" clip-rule=\"evenodd\"></path></svg>'); background-repeat: no-repeat; background-position: right 0.75rem center; background-size: 1.5em 1.5em; padding-right: 2.5rem;"
                                required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Kegiatan" {{ old('kategori') === 'Kegiatan' ? 'selected' : '' }}>🎯 Kegiatan</option>
                            <option value="Penghargaan" {{ old('kategori') === 'Penghargaan' ? 'selected' : '' }}>🏆 Penghargaan</option>
                            <option value="Pelatihan" {{ old('kategori') === 'Pelatihan' ? 'selected' : '' }}>📚 Pelatihan</option>
                            <option value="Acara" {{ old('kategori') === 'Acara' ? 'selected' : '' }}>🎉 Acara</option>
                            <option value="Lainnya" {{ old('kategori') === 'Lainnya' ? 'selected' : '' }}>📰 Lainnya</option>
                        </select>
                        @error('kategori')
                            <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Kegiatan -->
                    <div>
                        <label for="tanggal_kegiatan" class="block text-sm font-semibold text-gray-800 mb-2.5">
                            <span class="text-red-500 font-bold">*</span> 📅 Tanggal Kegiatan
                        </label>
                        <input type="date"
                               id="tanggal_kegiatan"
                               name="tanggal_kegiatan"
                               value="{{ old('tanggal_kegiatan', now()->format('Y-m-d')) }}"
                               class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 transition font-poppins @error('tanggal_kegiatan') border-red-500 @enderror"
                               required>
                        @error('tanggal_kegiatan')
                            <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="border-t pt-6">
                        <label for="deskripsi" class="block text-sm font-semibold text-gray-800 mb-2.5">
                            📝 Deskripsi Berita
                        </label>
                        <textarea id="deskripsi"
                                  name="deskripsi"
                                  rows="4"
                                  placeholder="Tuliskan deskripsi berita secara lengkap dan detail..."
                                  class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 transition font-poppins resize-none @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi') }}</textarea>
                        <p class="text-gray-500 text-xs mt-1.5">Maksimal 2000 karakter</p>
                        @error('deskripsi')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Link Video (Optional) -->
                    <div>
                        <label for="link_video" class="block text-sm font-semibold text-gray-800 mb-2.5">
                            🎥 Link Video (Opsional)
                        </label>
                        <input type="text"
                               id="link_video"
                               name="link_video"
                               value="{{ old('link_video') }}"
                               placeholder="Contoh: https://www.youtube.com/watch?v=... atau ID video"
                               class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 transition font-poppins @error('link_video') border-red-500 @enderror">
                        @error('link_video')
                            <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Sidebar - Upload Area -->
            <div class="lg:col-span-1">
                <!-- Upload Container -->
                <div class="bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl p-6 border-2 border-primary-200 sticky top-8 space-y-6">
                    <!-- Thumbnail Section -->
                    <div>
                        <h3 class="text-lg font-bold font-montserrat text-gray-800 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"></path>
                            </svg>
                            Thumbnail
                        </h3>

                        <div x-data="{ previewUrl: '', fileName: '' }" class="space-y-4">
                            <!-- Upload Area -->
                            <label class="relative block group">
                                <input type="file"
                                       name="thumbnail"
                                       accept="image/*"
                                       class="hidden"
                                       @change="previewUrl = URL.createObjectURL($event.target.files[0]); fileName = $event.target.files[0]?.name || ''"
                                       data-max-size="5242880">
                                <div class="bg-white rounded-xl border-2 border-dashed border-primary-300 hover:border-primary-500 hover:bg-primary-50 p-6 text-center cursor-pointer transition duration-200">
                                    <svg class="w-10 h-10 mx-auto text-primary-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="text-sm font-semibold text-gray-700">Klik untuk upload</p>
                                    <p class="text-xs text-gray-500 mt-1">atau drag & drop</p>
                                    <p class="text-xs text-red-500 mt-1 font-medium">⚠️ Maksimal ukuran: 5 MB</p>
                                    <p x-show="fileName" x-cloak class="text-xs text-primary-600 mt-2 font-semibold">
                                        ✓ <span x-text="fileName"></span>
                                    </p>
                                </div>
                            </label>

                            <!-- Preview -->
                            <div x-show="previewUrl" x-cloak class="relative rounded-xl overflow-hidden border-2 border-primary-300">
                                <img :src="previewUrl" class="w-full h-48 object-cover">
                                <div class="absolute inset-0 bg-black/0 hover:bg-black/10 transition"></div>
                            </div>
                        </div>
                    </div>

                    <hr class="border-primary-200">

                    <!-- Media Galeri Section -->
                    <div>
                        <h3 class="text-lg font-bold font-montserrat text-gray-800 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5 3a2 2 0 00-2 2v6h6V5a2 2 0 00-2-2H5zM15 3a2 2 0 00-2 2v6h6V5a2 2 0 00-2-2h-2zM5 13a2 2 0 00-2 2v2h6v-2a2 2 0 00-2-2H5zM15 13a2 2 0 00-2 2v2h6v-2a2 2 0 00-2-2h-2z"></path>
                            </svg>
                            Media Galeri
                        </h3>

                        <div x-data="{ galleries: [] }" class="space-y-4">
                            <!-- Upload Area -->
                            <label class="relative block group">
                                <input type="file"
                                       name="media_path[]"
                                       @change="
                                           galleries = [];
                                           for(let i = 0; i < $event.target.files.length; i++) {
                                               galleries.push(URL.createObjectURL($event.target.files[i]));
                                           }
                                       "
                                       multiple
                                       accept="image/*"
                                       class="hidden"
                                       data-max-size="5242880"
                                       data-max-total="52428800">
                                <div class="bg-white rounded-xl border-2 border-dashed border-primary-300 hover:border-primary-500 hover:bg-primary-50 p-6 text-center cursor-pointer transition duration-200">
                                    <svg class="w-10 h-10 mx-auto text-primary-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    <p class="text-sm font-semibold text-gray-700">Klik untuk upload</p>
                                    <p class="text-xs text-gray-500 mt-1">Multiple gambar bisa</p>
                                    <p class="text-xs text-red-500 mt-1 font-medium">⚠️ Maksimal per file: 5 MB | Total: 50 MB</p>
                                    <p x-show="galleries.length > 0" x-cloak class="text-xs text-primary-600 mt-2 font-semibold">
                                        ✓ <span x-text="galleries.length"></span> gambar
                                    </p>
                                </div>
                            </label>

                            <!-- Preview Gallery -->
                            <div x-show="galleries.length > 0" x-cloak class="grid grid-cols-2 gap-2">
                                <template x-for="(gallery, index) in galleries" :key="index">
                                    <div class="relative rounded-lg overflow-hidden border-2 border-primary-300">
                                        <img :src="gallery" class="w-full h-24 object-cover">
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                    <hr class="border-primary-200">

                    <!-- Info Box -->
                    <div class="bg-white/70 rounded-lg p-3.5 space-y-2 border border-primary-200">
                        <p class="text-xs font-semibold text-gray-700">📋 Persyaratan File:</p>
                        <ul class="text-xs text-gray-600 space-y-1.5">
                            <li class="flex items-start">
                                <svg class="w-3.5 h-3.5 mr-2 text-primary-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Format: JPG, PNG, GIF</span>
                            </li>
                           
                            <li class="flex items-start">
                                <svg class="w-3.5 h-3.5 mr-2 text-primary-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Semua opsional</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Tip Box -->
                    <div class="bg-amber-50 rounded-lg p-3.5 border-l-4 border-amber-400">
                        <p class="text-xs text-amber-800 font-poppins">
                            <span class="font-semibold">💡 Tips:</span> Gunakan gambar berkualitas tinggi untuk hasil tampilan terbaik.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col sm:flex-row items-center gap-4 mt-6">
            <a href="{{ route('admin.berita.index') }}"
               class="w-full sm:flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition duration-200 text-center inline-block">
                ← Batal
            </a>
            <button type="submit"
                    class="w-full sm:flex-1 px-6 py-3 bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold rounded-lg transition duration-200 flex items-center justify-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Simpan Berita</span>
            </button>
        </div>
    </form>
</div>
@endsection
