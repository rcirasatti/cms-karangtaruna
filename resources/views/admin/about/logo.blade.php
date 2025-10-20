@extends('admin.layouts.app')

@section('title', 'Kelola logo')
@section('page-title', 'Kelola logo')

@section('content')
    @php
        $filosofiItemsData = $filosofiItems->map(function($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'description' => $item->description,
                'icon' => $item->icon,
                'gambar' => $item->gambar,
                'use_icon' => $item->icon ? true : false,
                'urutan' => $item->urutan
            ];
        })->toArray();
    @endphp
    
    <div x-data="{
        visiMisiModalOpen: false,
        filosofiItems: {{ json_encode($filosofiItemsData) }},
        addFilosofiItem() {
            this.filosofiItems.push({
                id: null,
                title: '',
                description: '',
                icon: 'star',
                gambar: null,
                use_icon: true,
                urutan: this.filosofiItems.length + 1
            })
        },
        removeFilosofiItem(index) {
            this.filosofiItems.splice(index, 1)
            this.filosofiItems.forEach((item, idx) => {
                item.urutan = idx + 1
            })
        }
    }" class="space-y-6">
        <!-- Header Card -->
        <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-2xl shadow-lg p-8 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold font-montserrat mb-2">Kelola Logo</h1>
                    <p class="text-primary-100">Kelola logo dan filosofi logo organisasi</p>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden p-5 m-10">
            <div class="text-center mb-12 relative">
                <div class="text-center mb-12 relative">
                        <div class="w-24 h-1 mx-auto"></div>

                        <button @click="visiMisiModalOpen = true"
                            class="absolute top-0 right-0 bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg shadow-md transition-all duration-200 flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            <span>Edit</span>
                        </button>
                    </div>

                <div class="relative mx-auto px-4 md:px-8 lg:px-20 py-12 md:py-16 lg:py-20 bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 w-full overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 md:w-48 md:h-48 lg:w-64 lg:h-64 bg-white opacity-5 rounded-full -mr-16 md:-mr-24 lg:-mr-32 -mt-16 md:-mt-24 lg:-mt-32"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 md:w-72 md:h-72 lg:w-96 lg:h-96 bg-white opacity-5 rounded-full -ml-24 md:-ml-36 lg:-ml-48 -mb-24 md:-mb-36 lg:-mb-48"></div>

                    <div class="grid lg:grid-cols-2 gap-8 md:gap-12 lg:gap-16 items-center mt-8 md:mt-12 lg:mt-16 relative z-10">
                        <div class="relative">
                            <div class="absolute"></div>

                            @if($profile->logo_path)
                                <div class="transform hover:scale-105 transition duration-500">
                                    <img src="{{ asset('storage/' . $profile->logo_path) }}"
                                         alt="Logo {{ $profile->nama_organisasi }}"
                                         class="max-w-md w-full drop-shadow-2xl">
                                </div>
                            @else
                                <div class="text-center">
                                    <div class="relative inline-block">
                                        <div class="absolute inset-0 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full blur-2xl opacity-30 animate-pulse"></div>
                                        <svg class="relative w-32 h-32 mx-auto text-primary-400 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                            <div class="absolute -top-6 -right-6 w-24 h-24 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full opacity-20 blur-xl"></div>
                            <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-gradient-to-br from-primary-500 to-primary-700 rounded-full opacity-20 blur-xl"></div>
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
                                <div class="absolute -inset-1 bg-gradient-to-r from-primary-500 to-primary-700 rounded-2xl opacity-20 group-hover:opacity-30 blur transition duration-300"></div>
                                <div class="relative bg-white rounded-2xl shadow-xl p-8 border border-gray-100 ">
                                    @if($profile->filosofi_logo)
                                        <div class="prose prose-lg max-w-none">
                                            <p class="text-gray-700 leading-relaxed text-lg text-justify">
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-gray-500 text-lg">Filosofi logo belum tersedia</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div x-show="visiMisiModalOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 overflow-y-auto"
             style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center">
                <!-- Background overlay -->
                <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" @click="visiMisiModalOpen = false"></div>

                <!-- Modal panel -->
                <div class="relative inline-block w-full max-w-2xl overflow-hidden text-left align-middle transition-all transform bg-white shadow-2xl rounded-2xl">
                    <!-- Modal Header -->
                    <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-8 py-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-xl bg-white bg-opacity-20">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-white font-montserrat">
                                        Edit Logo & Filosofi
                                    </h3>
                                </div>
                            </div>
                            <button type="button"
                                    @click="visiMisiModalOpen = false"
                                    class="text-white hover:bg-primary-800/30 rounded-lg p-2 transition">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Modal Content -->
                    <form action="{{ route('admin.about.logo.update') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
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

                        <!-- Upload Logo -->
                        <div>
                            <label for="logo_path" class="block text-sm font-semibold text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline-block text-primary-600 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Upload Logo Baru
                            </label>
                            <div class="mt-2">
                                <input
                                    type="file"
                                    id="logo_path"
                                    name="logo_path"
                                    accept="image/*"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent font-poppins @error('logo_path') border-red-500 @enderror"
                                >
                                <p class="mt-2 text-sm text-gray-500">
                                    <svg class="w-4 h-4 inline-block text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Format: JPG, PNG, GIF. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah logo.
                                </p>
                            </div>
                            @error('logo_path')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror

                            @if($profile->logo_path)
                                <div class="mt-3 p-3 bg-gray-50 rounded-lg">
                                    <p class="text-sm font-medium text-gray-700 mb-2">Logo saat ini:</p>
                                    <img src="{{ asset('storage/' . $profile->logo_path) }}" 
                                         alt="Current Logo" 
                                         class="h-24 w-auto object-contain border border-gray-200 rounded-lg">
                                </div>
                            @endif
                        </div>

                        <!-- Filosofi Logo -->
                        <div>
                            <label for="filosofi_logo" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="text-red-500">*</span>
                                <svg class="w-4 h-4 inline-block text-primary-600 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Filosofi Logo
                            </label>
                            <textarea
                                id="filosofi_logo"
                                name="filosofi_logo"
                                rows="6"
                                placeholder="Jelaskan makna dan filosofi di balik logo organisasi..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent font-poppins resize-none @error('filosofi_logo') border-red-500 @enderror"
                                required>{{ old('filosofi_logo', $profile->filosofi_logo) }}</textarea>
                            @error('filosofi_logo')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Filosofi Items Section -->
                        <div class="border-t pt-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h3 class="text-lg font-bold font-montserrat text-gray-800">Item Filosofi Logo</h3>
                                    <p class="text-sm text-gray-500 mt-1">Tambahkan detail elemen-elemen filosofi logo</p>
                                </div>
                                <button type="button"
                                        @click="addFilosofiItem()"
                                        class="px-4 py-2 bg-secondary hover:bg-secondary/90 hover:shadow-lg text-white font-semibold rounded-lg transition duration-300 flex items-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <span>Tambah Item</span>
                                </button>
                            </div>

                            <div class="space-y-4 max-h-96 overflow-y-auto pr-2">
                                <template x-for="(item, index) in filosofiItems" :key="index">
                                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 hover:border-primary-300 transition-colors">
                                        <!-- Hidden ID field -->
                                        <input type="hidden" :name="'filosofi_items[' + index + '][id]'" :value="item.id">
                                        
                                        <div class="flex items-start justify-between mb-3">
                                            <div class="flex items-center space-x-2">
                                                <div class="bg-primary-100 text-primary-600 w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm" x-text="index + 1"></div>
                                                <span class="font-semibold text-gray-700">Item Filosofi</span>
                                            </div>
                                            <button type="button"
                                                    @click="removeFilosofiItem(index)"
                                                    class="text-red-500 hover:text-red-700 transition-colors p-1">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="grid grid-cols-1 gap-4">
                                            <!-- Pilihan: Icon atau Upload Gambar -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                                    <span class="text-red-500">*</span> Tipe Visual
                                                </label>
                                                <div class="flex gap-4">
                                                    <label class="flex items-center space-x-2 cursor-pointer">
                                                        <input type="radio" 
                                                               :name="'filosofi_items[' + index + '][use_icon]'"
                                                               value="1"
                                                               x-model="item.use_icon"
                                                               @change="item.use_icon = true"
                                                               class="text-primary-600 focus:ring-primary-500">
                                                        <span class="text-sm font-medium text-gray-700">Gunakan Icon</span>
                                                    </label>
                                                    <label class="flex items-center space-x-2 cursor-pointer">
                                                        <input type="radio" 
                                                               :name="'filosofi_items[' + index + '][use_icon]'"
                                                               value="0"
                                                               x-model="item.use_icon"
                                                               @change="item.use_icon = false"
                                                               class="text-primary-600 focus:ring-primary-500">
                                                        <span class="text-sm font-medium text-gray-700">Upload Gambar</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Icon Selection (shown when use_icon is true) -->
                                            <div x-show="item.use_icon">
                                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                                    <span class="text-red-500">*</span> Pilih Icon
                                                </label>
                                                <select :name="'filosofi_items[' + index + '][icon]'"
                                                        x-model="item.icon"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                                                    <option value="fire">🔥 Fire (Api)</option>
                                                    <option value="sun">☀️ Sun (Matahari)</option>
                                                    <option value="leaf">🍃 Leaf (Daun)</option>
                                                    <option value="circle">⭕ Circle (Lingkaran)</option>
                                                    <option value="flower">🌸 Flower (Bunga)</option>
                                                    <option value="star">⭐ Star (Bintang)</option>
                                                    <option value="mountain">🏔️ Mountain (Gunung)</option>
                                                    <option value="sea">🌊 Sea (Laut)</option>
                                                    <option value="ribbon">🎗️ Ribbon (Pita)</option>
                                                </select>
                                            </div>

                                            <!-- Image Upload (shown when use_icon is false) -->
                                            <div x-show="!item.use_icon">
                                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                                    <span class="text-red-500">*</span> Upload Gambar
                                                </label>
                                                <input type="file"
                                                       :name="'filosofi_items[' + index + '][gambar]'"
                                                       accept="image/*"
                                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                                                <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Maksimal 2MB</p>
                                                
                                                <!-- Show current image if exists -->
                                                <template x-if="item.gambar">
                                                    <div class="mt-2 p-2 bg-gray-50 rounded border border-gray-200">
                                                        <p class="text-xs text-gray-600 mb-1">Gambar saat ini:</p>
                                                        <img :src="'/storage/' + item.gambar" 
                                                             alt="Current Image"
                                                             class="h-16 w-auto object-contain">
                                                    </div>
                                                </template>
                                            </div>

                                            <!-- Title -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                                    <span class="text-red-500">*</span> Judul
                                                </label>
                                                <input type="text"
                                                       :name="'filosofi_items[' + index + '][title]'"
                                                       x-model="item.title"
                                                       placeholder="Contoh: Warna Merah"
                                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                                                       required>
                                            </div>

                                            <!-- Description -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                                    <span class="text-red-500">*</span> Deskripsi
                                                </label>
                                                <textarea :name="'filosofi_items[' + index + '][description]'"
                                                          x-model="item.description"
                                                          rows="3"
                                                          placeholder="Jelaskan makna dari elemen ini..."
                                                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 resize-none"
                                                          required></textarea>
                                            </div>
                                        </div>

                                            <!-- Hidden urutan field -->
                                            <input type="hidden" :name="'filosofi_items[' + index + '][urutan]'" :value="item.urutan">
                                        </div>
                                    </div>
                                </template>

                                <!-- Empty State -->
                                <div x-show="filosofiItems.length === 0" class="text-center py-8 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300">
                                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                    <p class="text-gray-500 font-medium">Belum ada item filosofi logo</p>
                                    <p class="text-gray-400 text-sm mt-1">Klik tombol "Tambah Item" untuk menambahkan</p>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Actions -->
                        <div class="sticky bottom-0 bg-gray-50 px-8 py-4 -mx-8 -mb-8 flex items-center space-x-3 border-t rounded-b-2xl">
                            <button type="button"
                                    @click="visiMisiModalOpen = false"
                                    class="flex-1 px-4 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition duration-300">
                                Batal
                            </button>
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
        </div>
    </div>
@endsection
