@extends('admin.layouts.app')

@section('title', 'Hero Section')

@section('content')
    <div class="max-w-4xl">
        <!-- Page Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Hero Section</h1>
            <p class="text-gray-600">Kelola tampilan hero section dan navbar pada halaman utama</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('admin.hero.update') }}" method="POST" id="heroForm">
                @csrf
                @method('PUT')

                <!-- Hero Section -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b-2 border-color_primary">
                        <i class="fas fa-image mr-2"></i>Hero Section
                    </h2>

                    <!-- Title Hero -->
                    <div class="mb-6">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Title Hero <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title', $hero->title ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-color_primary focus:border-transparent transition @error('title') border-red-500 @enderror"
                            placeholder="Masukkan title hero..." required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Judul utama yang akan ditampilkan di hero section</p>
                    </div>

                    <!-- Subtitle Hero -->
                    <div class="mb-6">
                        <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-2">
                            Subtitle Hero
                        </label>
                        <textarea name="subtitle" id="subtitle" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-color_primary focus:border-transparent transition @error('subtitle') border-red-500 @enderror"
                            placeholder="Masukkan subtitle hero...">{{ old('subtitle', $hero->subtitle ?? '') }}</textarea>
                        @error('subtitle')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Deskripsi tambahan di bawah title hero (opsional)</p>
                    </div>
                </div>

                <!-- Navbar Section -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b-2 border-color_primary">
                        <i class="fas fa-bars mr-2"></i>Navbar Section
                    </h2>

                    <!-- Title Navbar -->
                    <div class="mb-6">
                        <label for="title_navbar" class="block text-sm font-medium text-gray-700 mb-2">
                            Title Navbar <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title_navbar" id="title_navbar"
                            value="{{ old('title_navbar', $hero->title_navbar ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-color_primary focus:border-transparent transition @error('title_navbar') border-red-500 @enderror"
                            placeholder="Masukkan title navbar..." required>
                        @error('title_navbar')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Judul yang akan ditampilkan di navbar</p>
                    </div>

                    <!-- Subtitle Navbar -->
                    <div class="mb-6">
                        <label for="subtitle_navbar" class="block text-sm font-medium text-gray-700 mb-2">
                            Subtitle Navbar
                        </label>
                        <input type="text" name="subtitle_navbar" id="subtitle_navbar"
                            value="{{ old('subtitle_navbar', $hero->subtitle_navbar ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-color_primary focus:border-transparent transition @error('subtitle_navbar') border-red-500 @enderror"
                            placeholder="Masukkan subtitle navbar...">
                        @error('subtitle_navbar')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Teks tambahan di bawah title navbar (opsional)</p>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                    <div class="text-sm text-gray-500">
                        <span class="text-red-500">*</span> Wajib diisi
                    </div>
                    <div class="flex gap-3">
                        <button type="button" onclick="window.location.href='{{ route('admin.dashboard') }}'"
                            class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                            <i class="fas fa-times mr-2"></i>Batal
                        </button>
                        <button type="submit"
                            class="px-6 py-2 bg-gradient-to-r from-primary-700 to-primary-800 text-white rounded-lg hover:bg-gradient-to-r hover:from-primary-800 hover:to-primary-900 transition">
                            <i class="fas fa-save mr-2"></i>Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Info Card -->
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <i class="fas fa-info-circle text-blue-500 text-xl"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-blue-800">Informasi</h3>
                    <div class="mt-2 text-sm text-blue-700">
                        <ul class="list-disc list-inside space-y-1">
                            <li><strong>Title Hero:</strong> Judul utama yang akan ditampilkan pada hero section di halaman
                                utama</li>
                            <li><strong>Subtitle Hero:</strong> Deskripsi atau tagline yang melengkapi title hero</li>
                            <li><strong>Title Navbar:</strong> Nama organisasi atau brand yang ditampilkan di navigation bar
                            </li>
                            <li><strong>Subtitle Navbar:</strong> Slogan atau tagline singkat di navigation bar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Form validation
            document.getElementById('heroForm').addEventListener('submit', function (e) {
                const title = document.getElementById('title').value.trim();
                const titleNavbar = document.getElementById('title_navbar').value.trim();

                if (!title) {
                    e.preventDefault();
                    alert('Title Hero wajib diisi!');
                    document.getElementById('title').focus();
                    return false;
                }

                if (!titleNavbar) {
                    e.preventDefault();
                    alert('Title Navbar wajib diisi!');
                    document.getElementById('title_navbar').focus();
                    return false;
                }
            });

            // Auto-resize textarea
            const textarea = document.getElementById('subtitle');
            if (textarea) {
                textarea.addEventListener('input', function () {
                    this.style.height = 'auto';
                    this.style.height = (this.scrollHeight) + 'px';
                });
            }
        </script>
    @endpush

    @push('styles')
        <style>
            /* Custom focus styles */
            input:focus,
            textarea:focus {
                outline: none;
            }

            /* Smooth transitions */
            button {
                transition: all 0.2s ease-in-out;
            }

            button:active {
                transform: scale(0.98);
            }
        </style>
    @endpush
@endsection