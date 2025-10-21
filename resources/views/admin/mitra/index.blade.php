@extends('admin.layouts.app')

@section('title', 'Kelola Mitra')
@section('page-title', 'Kelola Mitra')

@section('content')
<div x-data="{ deleteModalOpen: false, deleteId: null }" class="space-y-6">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-2xl shadow-lg p-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold font-montserrat mb-2">Menu Mitra</h1>
                <p class="text-primary-100">Kelola data mitra dan testimoni Karang Taruna</p>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 12H9m6 0a6 6 0 11-12 0 6 6 0 0112 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Success Alert -->
    @if (session('success'))
        <div x-data="{ show: true }"
             x-show="show"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click.away="show = false"
             class="bg-green-50 border-l-4 border-green-500 rounded-lg p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-semibold text-green-700">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Error Alert -->
    @if (session('error'))
        <div x-data="{ show: true }"
             x-show="show"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click.away="show = false"
             class="bg-red-50 border-l-4 border-red-500 rounded-lg p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-semibold text-red-700">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Add Button -->
    <div class="flex justify-between items-center">
        <div>
            <p class="text-gray-600 text-sm">Total mitra: <span class="font-bold text-primary-600">{{ $mitra->total() }}</span></p>
        </div>
        <a href="{{ route('admin.mitra.create') }}"
           class="bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold py-3 px-6 rounded-xl transition duration-300 flex items-center space-x-2 shadow-lg hover:shadow-xl inline-flex">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Tambah Mitra</span>
        </a>
    </div>

    <!-- Mitra Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">No</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Logo</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nama Mitra</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Jenis</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Kontak</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Testimoni</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($mitra as $index => $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $mitra->firstItem() + $index }}</td>
                            <td class="px-6 py-4 text-sm">
                                @if($item->logo)
                                    <img src="{{ asset('storage/' . $item->logo) }}" alt="{{ $item->nama_mitra }}" class="h-12 w-12 object-cover rounded-lg">
                                @else
                                    <div class="h-12 w-12 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-gray-800">{{ $item->nama_mitra }}</div>
                                @if($item->deskripsi)
                                    <div class="text-xs text-gray-500 mt-1 truncate">{{ Str::limit($item->deskripsi, 50) }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-sky-100 text-sky-800">
                                    {{ $item->jenis }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $item->kontak ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm">
                                @if($item->testimoni)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Ada
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-700">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center space-x-3">
                                    <a href="{{ route('admin.mitra.edit', $item->id) }}"
                                       class="inline-flex items-center px-3 py-2 rounded-lg text-sm font-medium text-primary-700 bg-primary-100 hover:bg-primary-200 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <button @click="deleteModalOpen = true; deleteId = {{ $item->id }}"
                                            class="inline-flex items-center px-3 py-2 rounded-lg text-sm font-medium text-red-700 bg-red-100 hover:bg-red-200 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center space-y-4">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <p class="text-gray-500 text-lg font-semibold">Belum ada data mitra</p>
                                    <p class="text-gray-400 text-sm">Mulai tambahkan mitra baru dengan klik tombol di atas</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($mitra->hasPages())
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                {{ $mitra->links() }}
            </div>
        @endif
    </div>

    <!-- Delete Modal -->
    <div x-show="deleteModalOpen"
         @keydown.escape="deleteModalOpen = false"
         class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4"
         style="display: none;">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-8 space-y-6 animate-in fade-in zoom-in duration-300">
            <div class="flex justify-center">
                <div class="bg-red-50 rounded-full p-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4v2m0-10a9 9 0 110 18 9 9 0 010-18z"></path>
                    </svg>
                </div>
            </div>
            
            <div class="text-center space-y-2">
                <h3 class="text-xl font-bold text-gray-800">Hapus Mitra?</h3>
                <p class="text-gray-600 text-sm">Anda yakin ingin menghapus mitra ini? Tindakan ini tidak dapat dibatalkan.</p>
            </div>

            <div class="flex gap-3">
                <button @click="deleteModalOpen = false"
                        class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-3 px-4 rounded-lg transition">
                    Batal
                </button>
                <form :action="`{{ route('admin.mitra.destroy', '') }}/${deleteId}`" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-4 rounded-lg transition">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
