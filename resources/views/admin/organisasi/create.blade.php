@extends('admin.layouts.app')

@section('title', 'Tambah Pengurus')
@section('page-title', 'Tambah Pengurus Baru')

@section('content')
<div class="space-y-6">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-2xl shadow-lg p-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold font-montserrat mb-2">Tambah Pengurus</h1>
                <p class="text-primary-100">Tambahkan pengurus baru dan identitasnya</p>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <form action="{{ route('admin.kepengurusan.store') }}" method="POST" enctype="multipart/form-data" data-validate="true">
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

                    <!-- Nama Pengurus -->
                    <div>
                        <label for="nama" class="block text-sm font-semibold text-gray-800 mb-2.5">
                            <span class="text-red-500 font-bold">*</span> Nama Lengkap
                        </label>
                        <input type="text"
                               id="nama"
                               name="nama"
                               value="{{ old('nama') }}"
                               placeholder="Contoh: Budi Santoso"
                               class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 transition font-poppins @error('nama') border-red-500 @enderror"
                               required>
                        @error('nama')
                            <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jabatan -->
                    <div>
                        <label for="jabatan" class="block text-sm font-semibold text-gray-800 mb-2.5">
                            <span class="text-red-500 font-bold">*</span> Jabatan
                        </label>
                        <input type="text"
                               id="jabatan"
                               name="jabatan"
                               value="{{ old('jabatan') }}"
                               placeholder="Contoh: Ketua, Wakil Ketua, Sekretaris"
                               class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 transition font-poppins @error('jabatan') border-red-500 @enderror"
                               required>
                        @error('jabatan')
                            <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tugas -->
                    <div>
                        <label for="tugas" class="block text-sm font-semibold text-gray-800 mb-2.5">
                            Tugas & Tanggung Jawab
                        </label>
                        <textarea id="tugas"
                                  name="tugas"
                                  rows="3"
                                  placeholder="Contoh: Memimpin rapat koordinasi, mengawasi kegiatan, dll..."
                                  class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 transition font-poppins resize-none @error('tugas') border-red-500 @enderror">{{ old('tugas') }}</textarea>
                        @error('tugas')
                            <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Profil Singkat -->
                    <div class="border-t pt-6">
                        <label for="profil_singkat" class="block text-sm font-semibold text-gray-800 mb-2.5">
                            Profil Singkat
                        </label>
                        <textarea id="profil_singkat"
                                  name="profil_singkat"
                                  rows="4"
                                  placeholder="Tuliskan profil singkat pengurus, pengalaman, atau latar belakang..."
                                  class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 transition font-poppins resize-none @error('profil_singkat') border-red-500 @enderror">{{ old('profil_singkat') }}</textarea>
                        <p class="text-gray-500 text-xs mt-1.5">Maksimal 500 karakter</p>
                        @error('profil_singkat')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tokoh Utama & Urutan -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t pt-6">
                        <!-- Tokoh Utama -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-3">
                                Tokoh Utama
                            </label>
                            <div class="flex items-center space-x-4">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio"
                                           name="is_tokoh_utama"
                                           value="1"
                                           {{ old('is_tokoh_utama') == '1' ? 'checked' : '' }}
                                           class="w-4 h-4 text-primary-600 focus:ring-primary-500">
                                    <span class="ml-2 text-sm text-gray-700">Ya</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio"
                                           name="is_tokoh_utama"
                                           value="0"
                                           {{ old('is_tokoh_utama', '0') == '0' ? 'checked' : '' }}
                                           class="w-4 h-4 text-primary-600 focus:ring-primary-500">
                                    <span class="ml-2 text-sm text-gray-700">Tidak</span>
                                </label>
                            </div>
                            <p class="text-xs text-gray-500 mt-2">Tampilkan sebagai tokoh utama di halaman depan</p>
                            @error('is_tokoh_utama')
                                <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Urutan -->
                        <div>
                            <label for="urutan" class="block text-sm font-semibold text-gray-800 mb-2.5">
                                🔢 Urutan Tampil
                            </label>
                            <input type="number"
                                   id="urutan"
                                   name="urutan"
                                   value="{{ old('urutan', 0) }}"
                                   placeholder="0"
                                   step="1"
                                   min="0"
                                   class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 transition font-poppins @error('urutan') border-red-500 @enderror">
                            <p class="text-xs text-gray-500 mt-2">Angka lebih kecil tampil lebih awal</p>
                            @error('urutan')
                                <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar - Upload Area -->
            <div class="lg:col-span-1">
                <!-- Upload Container -->
                <div class="bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl p-6 border-2 border-primary-200 sticky top-8 space-y-6">
                    <!-- Foto Pengurus Section -->
                    <div>
                        <h3 class="text-lg font-bold font-montserrat text-gray-800 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path>
                            </svg>
                            Foto Pengurus
                        </h3>

                        <div x-data="{ previewUrl: '', fileName: '' }" class="space-y-4">
                            <!-- Upload Area -->
                            <label class="relative block group">
                                <input type="file"
                                       name="foto"
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
                                    <p class="text-xs text-red-500 mt-1 font-medium">⚠️ Maksimal: 5 MB</p>
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

                    <!-- Info Box -->
                    <div class="bg-white/70 rounded-lg p-3.5 space-y-2 border border-primary-200">
                        <p class="text-xs font-semibold text-gray-700">Persyaratan Foto:</p>
                        <ul class="text-xs text-gray-600 space-y-1.5">
                            <li class="flex items-start">
                                <svg class="w-3.5 h-3.5 mr-2 text-primary-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Format: JPG, PNG</span>
                            </li>
                           
                            <li class="flex items-start">
                                <svg class="w-3.5 h-3.5 mr-2 text-primary-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Foto formal lebih baik</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-3.5 h-3.5 mr-2 text-primary-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Opsional</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Tip Box -->
                    <div class="bg-amber-50 rounded-lg p-3.5 border-l-4 border-amber-400">
                        <p class="text-xs text-amber-800 font-poppins">
                            <span class="font-semibold">💡 Tips:</span> Gunakan foto dengan latar belakang formal dan pencahayaan yang baik.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col sm:flex-row items-center gap-4 mt-6">
            <a href="{{ route('admin.kepengurusan.index') }}"
               class="w-full sm:flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition duration-200 text-center inline-block">
                ← Batal
            </a>
            <button type="submit"
                    class="w-full sm:flex-1 px-6 py-3 bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold rounded-lg transition duration-200 flex items-center justify-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Simpan Pengurus</span>
            </button>
        </div>
    </form>
</div>
@endsection
