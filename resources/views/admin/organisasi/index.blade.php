@extends('admin.layouts.app')

@section('title', 'Kelola Kepengurusan')
@section('page-title', 'Kelola Kepengurusan')

@section('content')
    <div x-data="{ deleteModalOpen: false, deleteId: null }" class="space-y-6">
        <!-- Header Card -->
        <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-2xl shadow-lg p-8 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold font-montserrat mb-2">Menu Kepengurusan</h1>
                    <p class="text-primary-100">Kelola semua data kepengurusan Karang Taruna</p>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Success Alert -->
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="show = false"
                class="bg-green-50 border-l-4 border-green-500 rounded-lg p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
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
            <div x-data="{ show: true }" x-show="show" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="show = false"
                class="bg-red-50 border-l-4 border-red-500 rounded-lg p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
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
                <p class="text-gray-600 text-sm">Total pengurus: <span
                        class="font-bold text-primary-600">{{ $pengurus->total() }}</span></p>
            </div>
            <a href="{{ route('admin.kepengurusan.create') }}"
                class="bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold py-3 px-6 rounded-xl transition duration-300 flex items-center space-x-2 shadow-lg hover:shadow-xl inline-flex">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Tambah Pengurus</span>
            </a>
        </div>

        <!-- Kepengurusan Table -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">No</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Foto</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nama</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Jabatan</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Tugas</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Tokoh Utama</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($pengurus as $index => $item)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $pengurus->firstItem() + $index }}</td>
                                <td class="px-6 py-4">
                                    @if($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
                                            class="w-16 h-16 rounded-lg object-cover shadow-sm">
                                    @else
                                        <div class="w-16 h-16 rounded-lg bg-gray-200 flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-800">{{ $item->nama }}</div>
                                    @if($item->profil_singkat)
                                        <div class="text-xs text-gray-500 mt-1">{{ Str::limit($item->profil_singkat, 50) }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-primary-50 text-primary-700">
                                        {{ $item->jabatan }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-600">
                                        {{ $item->tugas ? Str::limit($item->tugas, 60) : '-' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center">
                                        <input type="checkbox"
                                            class="w-5 h-5 text-green bg-gray-100 border-gray-300 rounded focus:ring-green focus:ring-2 cursor-pointer toggle-tokoh-utama"
                                            data-id="{{ $item->id }}" {{ $item->is_tokoh_utama ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.kepengurusan.edit', $item->id) }}"
                                            class="bg-blue-50 hover:bg-blue-100 text-blue-600 p-2 rounded-lg transition group">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>
                                        <button @click="deleteModalOpen = true; deleteId = {{ $item->id }}"
                                            class="bg-red-50 hover:bg-red-100 text-red-600 p-2 rounded-lg transition group">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-3">
                                        <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                            </path>
                                        </svg>
                                        <p class="text-gray-500 font-medium">Belum ada data kepengurusan</p>
                                        <a href="{{ route('admin.kepengurusan.create') }}"
                                            class="text-primary-600 hover:text-primary-700 font-semibold text-sm">
                                            Tambah pengurus pertama →
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($pengurus->hasPages())
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                    {{ $pengurus->links() }}
                </div>
            @endif
        </div>

        <!-- Delete Modal -->
        <div x-show="deleteModalOpen" @keydown.escape="deleteModalOpen = false"
            class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4"
            style="display: none;">
            <div
                class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-8 space-y-6 animate-in fade-in zoom-in duration-300">
                <div class="flex justify-center">
                    <div class="bg-red-50 rounded-full p-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4v2m0-10a9 9 0 110 18 9 9 0 010-18z"></path>
                        </svg>
                    </div>
                </div>

                <div class="text-center space-y-2">
                    <h3 class="text-xl font-bold text-gray-800">Hapus Pengurus?</h3>
                    <p class="text-gray-600 text-sm">Anda yakin ingin menghapus data pengurus ini? Tindakan ini tidak dapat
                        dibatalkan.</p>
                </div>

                <div class="flex gap-3">
                    <button @click="deleteModalOpen = false"
                        class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-3 px-4 rounded-lg transition">
                        Batal
                    </button>
                    <form :action="`{{ route('admin.kepengurusan.destroy', '') }}/${deleteId}`" method="POST"
                        class="flex-1">
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

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Handle toggle tokoh utama
                const toggles = document.querySelectorAll('.toggle-tokoh-utama');

                toggles.forEach(toggle => {
                    toggle.addEventListener('change', function () {
                        const id = this.dataset.id;
                        const isChecked = this.checked;

                        // Disable checkbox while processing
                        this.disabled = true;

                        // Send AJAX request
                        fetch(`/admin/kepengurusan/${id}/toggle-tokoh-utama`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({
                                is_tokoh_utama: isChecked
                            })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Show success notification
                                    showNotification('success', data.message);
                                } else {
                                    // Revert checkbox state
                                    this.checked = !isChecked;
                                    showNotification('error', data.message);
                                }
                            })
                            .catch(error => {
                                // Revert checkbox state on error
                                this.checked = !isChecked;
                                showNotification('error', 'Terjadi kesalahan saat memperbarui status.');
                                console.error('Error:', error);
                            })
                            .finally(() => {
                                // Re-enable checkbox
                                this.disabled = false;
                            });
                    });
                });

                // Notification function
                function showNotification(type, message) {
                    const notification = document.createElement('div');
                    const bgColor = type === 'success' ? 'bg-green-50 border-green-500' : 'bg-red-50 border-red-500';
                    const textColor = type === 'success' ? 'text-green-700' : 'text-red-700';
                    const iconPath = type === 'success'
                        ? 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'
                        : 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z';

                    notification.className = `fixed top-4 right-4 ${bgColor} border-l-4 rounded-lg p-4 shadow-lg z-50 animate-in fade-in slide-in-from-right duration-300`;
                    notification.innerHTML = `
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 ${textColor.replace('text-', 'text-')}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${iconPath}"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-semibold ${textColor}">${message}</p>
                        </div>
                    </div>
                `;

                    document.body.appendChild(notification);

                    setTimeout(() => {
                        notification.classList.add('animate-out', 'fade-out', 'slide-out-to-right');
                        setTimeout(() => notification.remove(), 300);
                    }, 3000);
                }
            });
        </script>
    @endpush

@endsection