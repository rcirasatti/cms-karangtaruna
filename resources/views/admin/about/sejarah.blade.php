@extends('admin.layouts.app')

@section('title', 'Kelola Sejarah Organisasi')
@section('page-title', 'Kelola Sejarah Organisasi')

@section('content')
    <div class="space-y-6">
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

        <!-- Content Card -->
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <form action="{{ route('admin.about.sejarah.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div>
                        <label for="sejarah" class="block text-sm font-medium text-gray-700 mb-2">
                            Sejarah Organisasi
                        </label>
                        <textarea id="sejarah" name="sejarah" rows="10"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200"
                            placeholder="Masukkan sejarah organisasi...">{{ old('sejarah', $profile->sejarah) }}</textarea>
                        @error('sejarah')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('admin.dashboard') }}"
                            class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all duration-200">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-3 bg-primary-600 text-white rounded-xl hover:bg-primary-700 transition-all duration-200">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection