@extends('layouts.app')

@section('title', 'Logo Karang Taruna')

@section('content')

    @if($profile)
        <!-- Logo Section with Modern Design -->
        <div class="relative mx-auto px-4 md:px-8 lg:px-20 py-12 md:py-16 lg:py-20 bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 w-full overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 md:w-48 md:h-48 lg:w-64 lg:h-64 bg-white opacity-5 rounded-full -mr-16 md:-mr-24 lg:-mr-32 -mt-16 md:-mt-24 lg:-mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 md:w-72 md:h-72 lg:w-96 lg:h-96 bg-white opacity-5 rounded-full -ml-24 md:-ml-36 lg:-ml-48 -mb-24 md:-mb-36 lg:-mb-48"></div>
            <div class="grid lg:grid-cols-2 gap-8 md:gap-12 lg:gap-16 items-center mt-8 md:mt-12 lg:mt-16 relative z-10">
                <div class="relative justify-items-center">
                    <div class="absolute">
                    </div>
                    
                        @if($profile->logo_path)
                            <div class="transform hover:scale-105 transition duration-500">
                                @php
                                    $isUrl = preg_match('/^https?:\/\//i', $profile->logo_path);
                                    $logoSrc = $isUrl ? $profile->logo_path : asset('storage/' . $profile->logo_path);
                                @endphp
                                <img src="{{ htmlspecialchars($logoSrc, ENT_QUOTES, 'UTF-8') }}" 
                                     alt="Logo {{ $profile->nama_organisasi }}"
                                     class="max-w-md w-full drop-shadow-2xl"
                                     onerror="this.parentElement.innerHTML='<div class=\'text-center\'><div class=\'relative inline-block\'><svg class=\'relative w-32 h-32 mx-auto text-primary-400 mb-6\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z\'></path></svg></div><p class=\'text-gray-400 text-lg font-medium\'>Logo tidak dapat dimuat</p></div>'">
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
                                                    @case('teratai')
                                                        <img src="{{ asset('assets/teratai.png') }}" 
                                                             alt="teratai"
                                                             class="w-20 h-20 object-contain rounded-lg shadow-md">
                                                        @break
                                                    @case('daun')
                                                        <img src="{{ asset('assets/helai_daun.png') }}" 
                                                             alt="helai daun"
                                                             class="w-20 h-20 object-contain rounded-lg shadow-md">
                                                        @break
                                                    @case('pita')
                                                        <img src="{{ asset('assets/pita.png') }}" 
                                                             alt="pita"
                                                             class="w-20 h-20 object-contain rounded-lg shadow-md">
                                                        @break
                                                    @case('lingkaran')
                                                        <img src="{{ asset('assets/lingkaran.png') }}" 
                                                             alt="lingkaran"
                                                             class="w-20 h-20 object-contain rounded-lg shadow-md">
                                                        @break
                                                    @case('teratai mekar')
                                                        <img src="{{ asset('assets/bg.png') }}" 
                                                             alt="teratai mekar"
                                                             class="w-20 h-20 object-contain rounded-lg shadow-md">
                                                        @break

                                                    @case('palet')
                                                        <img src="{{ asset('assets/palet.png') }}" 
                                                             alt="palet"
                                                             class="w-20 h-20 object-contain rounded-lg shadow-md">
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