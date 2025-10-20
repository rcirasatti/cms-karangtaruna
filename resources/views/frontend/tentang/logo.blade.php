@extends('layouts.app')

@section('title', 'Logo Karang Taruna')

@section('content')

    @if($profile)
        <!-- Logo Section with Modern Design -->
        <div class="relative mx-auto px-4 md:px-8 lg:px-20 py-12 md:py-16 lg:py-20 bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 w-full overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 md:w-48 md:h-48 lg:w-64 lg:h-64 bg-white opacity-5 rounded-full -mr-16 md:-mr-24 lg:-mr-32 -mt-16 md:-mt-24 lg:-mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 md:w-72 md:h-72 lg:w-96 lg:h-96 bg-white opacity-5 rounded-full -ml-24 md:-ml-36 lg:-ml-48 -mb-24 md:-mb-36 lg:-mb-48"></div>
            <div class="grid lg:grid-cols-2 gap-8 md:gap-12 lg:gap-16 items-center mt-8 md:mt-12 lg:mt-16 relative z-10">
                <div class="relative">
                    <div class="absolute">
                    </div>
                    
                        @if($profile->logo_path)
                            <div class="transform hover:scale-105 transition duration-500">
                                <img src="{{ asset('storage/' . $profile->logo_path) }}" alt="Logo {{ $profile->nama_organisasi }}"
                                    class="max-w-md w-full drop-shadow-2xl">
                            </div>
                        @else
                            <div class="text-center">
                                <div class="relative inline-block">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full blur-2xl opacity-30 animate-pulse">
                                    </div>
                                    <svg class="relative w-32 h-32 mx-auto text-primary-400 mb-6" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="text-gray-400 text-lg font-medium">Logo belum tersedia</p>
                                <p class="text-gray-300 text-sm mt-2">Segera hadir</p>
                            </div>
                        @endif

                    <!-- Decorative Elements -->
                    <div
                        class="absolute -top-6 -right-6 w-24 h-24 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full opacity-20 blur-xl">
                    </div>
                    <div
                        class="absolute -bottom-6 -left-6 w-32 h-32 bg-gradient-to-br from-primary-500 to-primary-700 rounded-full opacity-20 blur-xl">
                    </div>
                </div>

                <!-- Filosofi Logo -->
                <div class="space-y-8">
                    <!-- Title Section -->
                    <div class="relative">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-1.5 h-16 bg-gradient-to-b from-primary-500 to-primary-700 rounded-full"></div>
                            <div>
                                <p class="text-primary-100 font-semibold uppercase tracking-wider text-sm mb-1">Philosophy</p>
                                <h2 class="text-4xl lg:text-5xl font-bold text-white">Filosofi Logo</h2>
                            </div>
                        </div>
                    </div>

                    <!-- Content Card -->
                    <div class="relative group">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-primary-500 to-primary-700 rounded-2xl opacity-20 group-hover:opacity-30 blur transition duration-300">
                        </div>
                        <div class="relative bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                            @if($profile->filosofi_logo)
                                <div class="prose prose-lg max-w-none">
                                    <p class="text-gray-700 leading-relaxed text-lg">
                                        {{ $profile->filosofi_logo }}
                                    </p>
                                </div>
                            @else
                                <div class="flex items-center gap-4 text-gray-400">
                                    <svg class="w-12 h-12 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-lg font-medium">Filosofi logo belum tersedia</p>
                                        <p class="text-sm text-gray-300 mt-1">Segera akan ditambahkan</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white py-16">
            <div class="mx-auto px-4">
                <div class="max-w-5xl mx-auto">
                    @if($filosofiItems && $filosofiItems->count() > 0)
                        <div class="space-y-6">
                            @foreach($filosofiItems as $item)
                                <div class="flex items-start gap-6 p-6 hover:bg-gray-50 rounded-xl transition duration-300">
                                  
                                    <div class="flex-shrink-0">
                                            @if($item->gambar)
                                                <img src="{{ asset('storage/' . $item->gambar) }}" 
                                                     alt="{{ $item->title }}"
                                                     class="w-20 h-20 object-contain rounded-lg shadow-md">
                                            @else
                                                @switch($item->icon)
                                                    @case('fire')
                                                        <svg class="w-20 h-20 text-secondary" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M12 2c1.5 2 4 4.5 4 7.5 0 2.5-1.5 4.5-4 4.5s-4-2-4-4.5c0-3 2.5-5.5 4-7.5zm-1 11c-.8 0-1.5.7-1.5 1.5S10.2 16 11 16s1.5-.7 1.5-1.5S11.8 13 11 13zm6-3c0-1.8-.9-3.5-2.4-4.5.3.8.4 1.6.4 2.5 0 3.3-2.7 6-6 6s-6-2.7-6-6c0-.9.1-1.7.4-2.5C2.9 6.5 2 8.2 2 10c0 4.4 3.6 8 8 8s8-3.6 8-8c0-1-.2-2-.6-2.9.4.9.6 1.9.6 2.9z"/>
                                                        </svg>
                                                        @break
                                                    @case('sun')
                                                        <svg class="w-20 h-20 text-secondary" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M12 18a6 6 0 100-12 6 6 0 000 12zm0-2a4 4 0 110-8 4 4 0 010 8zM11 1h2v3h-2V1zm0 19h2v3h-2v-3zM3.515 4.929l1.414-1.414L7.05 5.636 5.636 7.05 3.515 4.93zM16.95 18.364l1.414-1.414 2.121 2.121-1.414 1.414-2.121-2.121zm2.121-14.85l1.414 1.415-2.121 2.121-1.414-1.414 2.121-2.121zM5.636 16.95l1.414 1.414-2.121 2.121-1.414-1.414 2.121-2.121zM23 11v2h-3v-2h3zM4 11v2H1v-2h3z"/>
                                                        </svg>
                                                        @break
                                                    @case('leaf')
                                                        <svg class="w-20 h-20 text-secondary" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M17 8C8 10 5.9 16.17 3.82 21.34l1.89.66.66-1.89C6 20 6 20 7 19c1-1 4-4 4-6 0-1.66 1.34-3 3-3s3 1.34 3 3c0 2-3 5-4 6-1 1-1 1-1.11 1.11l.66 1.89 1.89-.66C19.1 16.17 17 10 8 8c2.82 0 5.11 2.29 5.11 5.11 0 .39-.06.79-.18 1.16C15.05 14.1 17 12.19 17 10c0-2.21-1.79-4-4-4zm-3 8.5c.28 0 .5.22.5.5s-.22.5-.5.5-.5-.22-.5-.5.22-.5.5-.5z"/>
                                                        </svg>
                                                        @break
                                                    @case('circle')
                                                        <svg class="w-20 h-20 text-secondary" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/>
                                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                                                        </svg>
                                                        @break
                                                    @case('flower')
                                                        <svg class="w-20 h-20 text-secondary" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M12 2C9.24 2 7 4.24 7 7c0 1.28.48 2.44 1.27 3.32C7.48 11.2 7 12.36 7 13.64c0 2.76 2.24 5 5 5s5-2.24 5-5c0-1.28-.48-2.44-1.27-3.32C16.52 9.44 17 8.28 17 7c0-2.76-2.24-5-5-5zm0 14c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm0-10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                                                        </svg>
                                                        @break
                                                    @default
                                                        <svg class="w-20 h-20 text-secondary" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                                        </svg>
                                                @endswitch
                                            @endif
                                        </div>
                                    
                                    <div class="flex-1">
                                        <h3 class="text-xl font-bold text-primary-600 mb-3 uppercase tracking-wide">
                                            {{ $item->title }}
                                        </h3>
                                        <p class="text-gray-600 leading-relaxed text-justify">
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-gray-500 text-lg">Filosofi logo belum tersedia</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="container mx-auto px-4 py-16">
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-8 text-center">
                <p class="text-yellow-800">Data profil belum tersedia.</p>
            </div>
        </div>
    @endif
@endsection