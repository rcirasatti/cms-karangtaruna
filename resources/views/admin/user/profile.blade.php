@extends('admin.layouts.app')

@section('title', 'Profil Saya')
@section('page-title', 'Profil Saya')
@section('page-description', 'Lihat dan kelola informasi profil Anda')

@section('content')
<div class="space-y-6">
    @if (session('success'))
        <div class="bg-green-50 border border-green-200 rounded-2xl p-4 flex items-center gap-3 shadow-lg">
            <div class="bg-green-100 rounded-lg p-2">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <span class="text-green-800 font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Profile Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
        <!-- Header Section with Gradient -->
        <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-8 py-12">
            <div class="flex items-center justify-between gap-6">
                <div class="flex items-center gap-6">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-xl border-4 border-primary-100">
                        <svg class="w-10 h-10 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="text-white">
                        <h2 class="text-3xl font-bold font-montserrat">{{ $user->name }}</h2>
                        <p class="text-primary-100 font-poppins">{{ $user->email }}</p>
                    </div>
                </div>
                <a href="{{ route('admin.user.profile.edit') }}" 
                   class="flex items-center gap-2 px-6 py-3 bg-white text-primary-600 rounded-xl font-semibold hover:bg-primary-50 transition shadow-lg hover:shadow-xl duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Profil
                </a>
            </div>
        </div>

        <!-- Content Section -->
        <div class="p-8">
            <!-- Information Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Nama -->
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-100 hover:shadow-md transition">
                    <label class="block text-sm font-semibold text-gray-600 mb-2 font-poppins">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Nama Lengkap
                        </div>
                    </label>
                    <p class="text-xl font-semibold text-gray-800 font-montserrat">{{ $user->name }}</p>
                </div>

                <!-- Email -->
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-100 hover:shadow-md transition">
                    <label class="block text-sm font-semibold text-gray-600 mb-2 font-poppins">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Email
                        </div>
                    </label>
                    <p class="text-lg font-semibold text-gray-800 font-montserrat break-all">{{ $user->email }}</p>
                </div>
            </div>

            <!-- Dates Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6 border-t border-gray-200">
                <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-6 border border-blue-100">
                    <label class="block text-sm font-semibold text-gray-600 mb-2 font-poppins">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Bergabung sejak
                        </div>
                    </label>
                    <p class="text-lg font-semibold text-gray-800 font-montserrat">{{ $user->created_at->format('d M Y') }}</p>
                    <p class="text-sm text-gray-500 mt-1">{{ $user->created_at->format('H:i') }}</p>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-white rounded-xl p-6 border border-purple-100">
                    <label class="block text-sm font-semibold text-gray-600 mb-2 font-poppins">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Terakhir diperbarui
                        </div>
                    </label>
                    <p class="text-lg font-semibold text-gray-800 font-montserrat">{{ $user->updated_at->format('d M Y') }}</p>
                    <p class="text-sm text-gray-500 mt-1">{{ $user->updated_at->format('H:i') }}</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-4 pt-8 border-t border-gray-200 mt-8">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-2 px-6 py-3 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition shadow-md hover:shadow-lg duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 15l-3-3m0 0l3-3m-3 3h18"></path>
                    </svg>
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
