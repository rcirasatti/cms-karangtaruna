<!-- Sidebar Overlay (Mobile) -->
<div x-show="sidebarOpen" 
     @click="sidebarOpen = false"
     x-transition:enter="transition-opacity ease-linear duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-opacity ease-linear duration-300"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 bg-gray-900 bg-opacity-50 z-40 lg:hidden"
     style="display: none;">
</div>

<!-- Sidebar -->
<aside x-show="sidebarOpen"
       x-transition:enter="transition ease-in-out duration-300 transform"
       x-transition:enter-start="-translate-x-full"
       x-transition:enter-end="translate-x-0"
       x-transition:leave="transition ease-in-out duration-300 transform"
       x-transition:leave-start="translate-x-0"
       x-transition:leave-end="-translate-x-full"
       :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
       class="fixed lg:static inset-y-0 left-0 bg-gradient-to-b from-primary-800 to-primary-900 text-white w-64 flex-shrink-0 overflow-y-auto shadow-2xl z-50 transition-transform duration-300 ease-in-out"
       style="display: none;">
    
    <!-- Navigation -->
    <nav class="p-4">
        <ul class="space-y-2">
            <!-- Dashboard -->
            <li>
                <a href="<?php echo e(route('admin.dashboard')); ?>" 
                   class="flex items-center px-4 py-3 rounded-xl transition duration-200 <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white shadow-lg' : 'hover:bg-primary-800/50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <li class="pt-4 pb-2">
                <span class="px-4 text-xs font-semibold text-primary-300 uppercase tracking-wider">Konten</span>
            </li>

            <!-- Profile -->
            <li>
                <a href="<?php echo e(route('admin.profile.index')); ?>" 
                   class="flex items-center px-4 py-3 rounded-xl transition duration-200 <?php echo e(request()->routeIs('admin.profile.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white shadow-lg' : 'hover:bg-primary-800/50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="font-medium">Profile</span>
                </a>
            </li>

            <!-- Visi & Misi -->
            <li>
                <a href="<?php echo e(route('admin.visi-misi.index')); ?>" 
                   class="flex items-center px-4 py-3 rounded-xl transition duration-200 <?php echo e(request()->routeIs('admin.visi-misi.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white shadow-lg' : 'hover:bg-primary-800/50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    <span class="font-medium">Visi & Misi</span>
                </a>
            </li>

            <!-- Kepengurusan -->
            <li>
                <a href="<?php echo e(route('admin.kepengurusan.index')); ?>" 
                   class="flex items-center px-4 py-3 rounded-xl transition duration-200 <?php echo e(request()->routeIs('admin.kepengurusan.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white shadow-lg' : 'hover:bg-primary-800/50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span class="font-medium">Kepengurusan</span>
                </a>
            </li>

            <!-- Berita/Kegiatan -->
            <li>
                <a href="<?php echo e(route('admin.kegiatan.index')); ?>" 
                   class="flex items-center px-4 py-3 rounded-xl transition duration-200 <?php echo e(request()->routeIs('admin.kegiatan.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white shadow-lg' : 'hover:bg-primary-800/50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    <span class="font-medium">Berita</span>
                </a>
            </li>

            <!-- Produk -->
            <li>
                <a href="<?php echo e(route('admin.produk.index')); ?>" 
                   class="flex items-center px-4 py-3 rounded-xl transition duration-200 <?php echo e(request()->routeIs('admin.produk.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white shadow-lg' : 'hover:bg-primary-800/50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <span class="font-medium">Produk</span>
                </a>
            </li>

            <!-- Mitra -->
            <li>
                <a href="<?php echo e(route('admin.mitra.index')); ?>" 
                   class="flex items-center px-4 py-3 rounded-xl transition duration-200 <?php echo e(request()->routeIs('admin.mitra.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white shadow-lg' : 'hover:bg-primary-800/50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span class="font-medium">Mitra</span>
                </a>
            </li>

            <!-- Kontak -->
            <li>
                <a href="<?php echo e(route('admin.kontak.index')); ?>" 
                   class="flex items-center px-4 py-3 rounded-xl transition duration-200 <?php echo e(request()->routeIs('admin.kontak.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white shadow-lg' : 'hover:bg-primary-800/50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span class="font-medium">Kontak</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
<?php /**PATH D:\Magang\cms-karangtaruna\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>