

<?php $__env->startSection('title', 'Kelola Kontak'); ?>
<?php $__env->startSection('page-title', 'Kelola Kontak'); ?>

<?php $__env->startSection('content'); ?>
<div x-data="{
    editModalOpen: false,
    formData: {
        alamat_sekretariat: '<?php echo e($kontak->alamat_sekretariat); ?>',
        telepon: '<?php echo e($kontak->telepon); ?>',
        whatsapp: '<?php echo e($kontak->whatsapp); ?>',
        email: '<?php echo e($kontak->email); ?>',
        instagram: '<?php echo e($kontak->instagram); ?>',
        facebook: '<?php echo e($kontak->facebook); ?>',
        twitter: '<?php echo e($kontak->twitter); ?>',
        youtube: '<?php echo e($kontak->youtube); ?>'
    },
    resetForm() {
        this.formData = {
            alamat_sekretariat: '<?php echo e($kontak->alamat_sekretariat); ?>',
            telepon: '<?php echo e($kontak->telepon); ?>',
            whatsapp: '<?php echo e($kontak->whatsapp); ?>',
            email: '<?php echo e($kontak->email); ?>',
            instagram: '<?php echo e($kontak->instagram); ?>',
            facebook: '<?php echo e($kontak->facebook); ?>',
            twitter: '<?php echo e($kontak->twitter); ?>',
            youtube: '<?php echo e($kontak->youtube); ?>'
        };
    }
}" class="space-y-6">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-2xl shadow-lg p-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold font-montserrat mb-2">Menu Kontak</h1>
                <p class="text-primary-100">Kelola informasi kontak Karang Taruna yang ditampilkan di frontend</p>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Live Preview Section -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-2xl font-bold font-montserrat text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    Live Preview
                </h2>

                <!-- Contact Info Cards -->
                <div class="space-y-4">
                    <!-- Alamat -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 border-l-4 border-blue-500">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <p class="text-gray-600 text-sm font-semibold uppercase tracking-wider mb-2">Alamat Sekretariat</p>
                                <p class="text-gray-800 font-poppins text-lg" x-text="formData.alamat_sekretariat || 'Belum diatur'"></p>
                            </div>
                            <svg class="w-8 h-8 text-blue-500 opacity-30 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Telepon & WhatsApp -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-6 border-l-4 border-green-500">
                            <p class="text-gray-600 text-sm font-semibold uppercase tracking-wider mb-2">Telepon</p>
                            <p class="text-gray-800 font-poppins text-lg" x-text="formData.telepon || 'Belum diatur'"></p>
                        </div>
                        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-6 border-l-4 border-green-500">
                            <p class="text-gray-600 text-sm font-semibold uppercase tracking-wider mb-2">WhatsApp</p>
                            <p class="text-gray-800 font-poppins text-lg" x-text="formData.whatsapp || 'Belum diatur'"></p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-6 border-l-4 border-purple-500">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <p class="text-gray-600 text-sm font-semibold uppercase tracking-wider mb-2">Email</p>
                                <p class="text-gray-800 font-poppins text-lg" x-text="formData.email || 'Belum diatur'"></p>
                            </div>
                            <svg class="w-8 h-8 text-purple-500 opacity-30 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-xl p-6 border-l-4 border-indigo-500">
                        <p class="text-gray-600 text-sm font-semibold uppercase tracking-wider mb-4">Media Sosial</p>
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Instagram -->
                            <div class="bg-white rounded-lg p-4">
                                <div class="flex items-center mb-2">
                                    <svg class="w-5 h-5 text-pink-600 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM5.838 12c0-3.403 2.759-6.162 6.162-6.162 3.403 0 6.162 2.759 6.162 6.162 0 3.403-2.759 6.162-6.162 6.162-3.403 0-6.162-2.759-6.162-6.162zm2.988 0c0 1.762 1.412 3.174 3.174 3.174 1.762 0 3.174-1.412 3.174-3.174 0-1.762-1.412-3.174-3.174-3.174-1.762 0-3.174 1.412-3.174 3.174zm9.776-6.492c0 .795.645 1.44 1.44 1.44.795 0 1.44-.645 1.44-1.44 0-.795-.645-1.44-1.44-1.44-.795 0-1.44.645-1.44 1.44z"></path>
                                    </svg>
                                    <span class="text-gray-700 font-semibold text-sm">Instagram</span>
                                </div>
                                <p class="text-gray-800 text-sm font-poppins" x-text="formData.instagram || '-'"></p>
                            </div>

                            <!-- Facebook -->
                            <div class="bg-white rounded-lg p-4">
                                <div class="flex items-center mb-2">
                                    <svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
                                    </svg>
                                    <span class="text-gray-700 font-semibold text-sm">Facebook</span>
                                </div>
                                <p class="text-gray-800 text-sm font-poppins" x-text="formData.facebook || '-'"></p>
                            </div>

                            <!-- Twitter -->
                            <div class="bg-white rounded-lg p-4">
                                <div class="flex items-center mb-2">
                                    <svg class="w-5 h-5 text-blue-400 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2s9 5 20 5a9.5 9.5 0 00-9-5.5c4.75 2.25 7-7 7-7a10.6 10.6 0 01-10-10z"></path>
                                    </svg>
                                    <span class="text-gray-700 font-semibold text-sm">Twitter</span>
                                </div>
                                <p class="text-gray-800 text-sm font-poppins" x-text="formData.twitter || '-'"></p>
                            </div>

                            <!-- YouTube -->
                            <div class="bg-white rounded-lg p-4">
                                <div class="flex items-center mb-2">
                                    <svg class="w-5 h-5 text-red-600 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"></path>
                                    </svg>
                                    <span class="text-gray-700 font-semibold text-sm">YouTube</span>
                                </div>
                                <p class="text-gray-800 text-sm font-poppins" x-text="formData.youtube || '-'"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Button Card -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-lg p-8 sticky top-8">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary-100 mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold font-montserrat text-gray-800 mb-2">Edit Kontak</h3>
                    <p class="text-gray-600 text-sm mb-6">Perbarui informasi kontak yang ditampilkan di halaman kontak frontend.</p>
                </div>

                <button @click="editModalOpen = true"
                        class="w-full bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold py-3 px-6 rounded-xl transition duration-300 flex items-center justify-center space-x-2 shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <span>Edit Kontak</span>
                </button>

                <div class="mt-6 p-4 bg-blue-50 rounded-xl border border-blue-200">
                    <p class="text-blue-800 text-xs font-poppins">
                        <span class="font-semibold">💡 Tips:</span> Semua perubahan akan langsung tampil di halaman kontak frontend setelah Anda menyimpan.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div x-show="editModalOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 backdrop-blur-sm flex items-center justify-center z-50 p-4"
         style="display: none;">        <div x-show="editModalOpen"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-300 transform"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             @click.away="editModalOpen = false"
             class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto"
             style="display: none;">
            
            <!-- Modal Header -->
            <div class="sticky top-0 bg-gradient-to-r from-primary-600 to-primary-700 text-white p-6 flex items-center justify-between rounded-t-2xl">
                <div class="flex items-center space-x-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <h2 class="text-2xl font-bold font-montserrat">Edit Informasi Kontak</h2>
                </div>
                <button @click="editModalOpen = false; resetForm();"
                        class="text-white hover:bg-primary-800/30 rounded-lg p-2 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Content -->
            <form action="<?php echo e(route('admin.kontak.update', $kontak->id)); ?>" method="POST" class="p-8 space-y-6">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <!-- Error Validation Alert -->
                <?php if($errors->any()): ?>
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
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Alamat Sekretariat -->
                <div>
                    <label for="alamat_sekretariat" class="block text-sm font-semibold text-gray-700 mb-2">
                        <span class="text-red-500">*</span> Alamat Sekretariat
                    </label>
                    <textarea id="alamat_sekretariat" 
                              name="alamat_sekretariat" 
                              rows="3"
                              x-model="formData.alamat_sekretariat"
                              placeholder="Masukkan alamat sekretariat lengkap"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent font-poppins resize-none <?php $__errorArgs = ['alamat_sekretariat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                              required></textarea>
                    <?php $__errorArgs = ['alamat_sekretariat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Telepon & WhatsApp -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="telepon" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="text-red-500">*</span> Telepon
                        </label>
                        <input type="tel" 
                               id="telepon" 
                               name="telepon" 
                               x-model="formData.telepon"
                               placeholder="Contoh: 021-12345678"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent font-poppins <?php $__errorArgs = ['telepon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               required>
                        <?php $__errorArgs = ['telepon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label for="whatsapp" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="text-red-500">*</span> WhatsApp
                        </label>
                        <input type="tel" 
                               id="whatsapp" 
                               name="whatsapp" 
                               x-model="formData.whatsapp"
                               placeholder="Contoh: 62812345678"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent font-poppins <?php $__errorArgs = ['whatsapp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               required>
                        <?php $__errorArgs = ['whatsapp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        <span class="text-red-500">*</span> Email
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           x-model="formData.email"
                           placeholder="Contoh: kontak@karangtaruna.com"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent font-poppins <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Media Sosial -->
                <div class="border-t pt-6">
                    <h3 class="text-lg font-bold font-montserrat text-gray-800 mb-4">Media Sosial</h3>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Instagram -->
                        <div>
                            <label for="instagram" class="block text-sm font-semibold text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline-block text-pink-600 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073z"></path>
                                </svg>
                                Instagram
                            </label>
                            <input type="text" 
                                   id="instagram" 
                                   name="instagram" 
                                   x-model="formData.instagram"
                                   placeholder="Username atau URL"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent font-poppins">
                        </div>

                        <!-- Facebook -->
                        <div>
                            <label for="facebook" class="block text-sm font-semibold text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline-block text-blue-600 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
                                </svg>
                                Facebook
                            </label>
                            <input type="text" 
                                   id="facebook" 
                                   name="facebook" 
                                   x-model="formData.facebook"
                                   placeholder="Username atau URL"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent font-poppins">
                        </div>

                        <!-- Twitter -->
                        <div>
                            <label for="twitter" class="block text-sm font-semibold text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline-block text-blue-400 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2s9 5 20 5a9.5 9.5 0 00-9-5.5c4.75 2.25 7-7 7-7a10.6 10.6 0 01-10-10z"></path>
                                </svg>
                                Twitter
                            </label>
                            <input type="text" 
                                   id="twitter" 
                                   name="twitter" 
                                   x-model="formData.twitter"
                                   placeholder="Username atau URL"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent font-poppins">
                        </div>

                        <!-- YouTube -->
                        <div>
                            <label for="youtube" class="block text-sm font-semibold text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline-block text-red-600 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"></path>
                                </svg>
                                YouTube
                            </label>
                            <input type="text" 
                                   id="youtube" 
                                   name="youtube" 
                                   x-model="formData.youtube"
                                   placeholder="Username atau URL Channel"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent font-poppins">
                        </div>
                    </div>
                </div>

                <!-- Modal Actions -->
                <div class="sticky bottom-0 bg-gray-50 px-8 py-4 -mx-8 -mb-8 flex items-center space-x-3 border-t rounded-b-2xl">
                    <button type="button"
                            @click="editModalOpen = false; resetForm();"
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Magang\cms-karangtaruna\resources\views/admin/kontak/index.blade.php ENDPATH**/ ?>