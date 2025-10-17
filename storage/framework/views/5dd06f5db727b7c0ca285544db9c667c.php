

<?php $__env->startSection('title', 'Kontak - Karang Taruna'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section with Enhanced Design -->
<div class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white py-24 overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-secondary rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-accent rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-1/2 w-96 h-96 bg-primary-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>
    </div>

    <!-- Geometric Decorations -->
    <div class="absolute top-10 right-10 w-20 h-20 border-4 border-secondary/30 rounded-full"></div>
    <div class="absolute bottom-10 left-10 w-16 h-16 border-4 border-accent/30 rotate-45"></div>
    <div class="absolute top-1/2 right-1/4 w-3 h-3 bg-secondary rounded-full"></div>
    <div class="absolute top-1/3 left-1/4 w-2 h-2 bg-accent rounded-full"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Icon with Gradient Background -->
            <div class="relative inline-block mb-8">
                <div class="absolute inset-0 bg-gradient-to-br from-secondary to-accent rounded-2xl blur-xl opacity-60"></div>
                <div class="relative bg-white/10 backdrop-blur-sm p-5 rounded-2xl shadow-2xl border border-white/20">
                    <svg class="w-10 h-10 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>

            <!-- Title Section -->
            <div class="space-y-4">
                <h1 class="text-5xl md:text-6xl font-bold mb-4 tracking-tight">
                    Hubungi <span class="text-secondary">Kami</span>
                </h1>
                <div class="w-24 h-1.5 bg-gradient-to-r from-transparent via-secondary to-transparent mx-auto rounded-full"></div>
                <p class="text-xl text-primary-100 leading-relaxed max-w-2xl mx-auto mt-6">
                    Kami siap membantu dan menjawab pertanyaan Anda. Jangan ragu untuk menghubungi kami melalui berbagai saluran komunikasi yang tersedia.
                </p>
            </div>
        </div>
    </div>
</div>

<?php if($kontak): ?>
<!-- Main Content Section -->
<div class="bg-color_bg py-20">
    <div class="container mx-auto px-4">
        <!-- Quick Contact Cards - Enhanced Design -->
        <div class="max-w-6xl mx-auto -mt-32 mb-16 relative z-20">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- WhatsApp Card -->
                <?php if($kontak->whatsapp): ?>
                <a href="https://wa.me/<?php echo e(str_replace(['+', '-', ' '], '', $kontak->whatsapp)); ?>" target="_blank" 
                   class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-8 transform hover:-translate-y-2 border border-gray-100 hover:border-green-300">
                    <!-- Decorative Corner -->
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-green-400/10 to-green-600/10 rounded-bl-full"></div>
                    
                    <div class="relative">
                        <div class="bg-gradient-to-br from-green-500 to-green-600 w-16 h-16 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-lg shadow-green-500/30">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg mb-2">WhatsApp</h3>
                        <p class="text-sm text-gray-600">Chat dengan kami secara langsung</p>
                        <div class="mt-4 flex items-center text-green-600 font-semibold text-sm">
                            <span>Hubungi Sekarang</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </div>
                    </div>
                </a>
                <?php endif; ?>

                <!-- Email Card -->
                <?php if($kontak->email): ?>
                <a href="mailto:<?php echo e($kontak->email); ?>" 
                   class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-8 transform hover:-translate-y-2 border border-gray-100 hover:border-primary-300">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-primary-400/10 to-primary-600/10 rounded-bl-full"></div>
                    
                    <div class="relative">
                        <div class="bg-gradient-to-br from-primary-600 to-primary-700 w-16 h-16 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-lg shadow-primary-500/30">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Email</h3>
                        <p class="text-sm text-gray-600">Kirim pesan via email</p>
                        <div class="mt-4 flex items-center text-primary-600 font-semibold text-sm">
                            <span>Kirim Email</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </div>
                    </div>
                </a>
                <?php endif; ?>

                <!-- Phone Card -->
                <?php if($kontak->telepon): ?>
                <a href="tel:<?php echo e($kontak->telepon); ?>" 
                   class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-8 transform hover:-translate-y-2 border border-gray-100 hover:border-secondary">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-secondary/20 to-accent/20 rounded-bl-full"></div>
                    
                    <div class="relative">
                        <div class="bg-gradient-to-br from-secondary to-accent w-16 h-16 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-lg shadow-secondary/30">
                            <svg class="w-8 h-8 text-primary-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Telepon</h3>
                        <p class="text-sm text-gray-600">Hubungi via telepon</p>
                        <div class="mt-4 flex items-center text-primary-700 font-semibold text-sm">
                            <span>Hubungi Kami</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </div>
                    </div>
                </a>
                <?php endif; ?>

                <!-- Location Card -->
                <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-8 transform hover:-translate-y-2 border border-gray-100 hover:border-primary-300 overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-primary-400/10 to-primary-600/10 rounded-bl-full"></div>

                    <div class="relative">
                        <div class="bg-gradient-to-br from-primary-600 to-primary-700 w-16 h-16 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-lg shadow-primary-500/30">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Sekretariat</h3>
                        <p class="text-sm text-gray-600">Kunjungi kantor kami</p>
                        <div class="mt-4 flex items-center text-primary-600 font-semibold text-sm">
                            <span>Lihat Lokasi</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Two Columns Layout -->
        <div class="max-w-6xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Left Column - Informasi Kontak -->
                <div class="space-y-6">
                    <!-- Contact Info Card -->
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                        <!-- Header with Gradient -->
                        <div class="bg-gradient-to-r from-primary-700 to-primary-800 px-8 py-5 flex items-center">
                            <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-white ml-4">Informasi Kontak</h2>
                        </div>
                        
                        <div class="p-8 space-y-6">
                            <!-- Alamat Sekretariat -->
                            <div class="group">
                                <div class="flex items-start p-5 rounded-2xl transition-all duration-300 hover:bg-gradient-to-br hover:from-primary-50 hover:to-accent/30">
                                    <div class="flex-shrink-0">
                                        <div class="bg-gradient-to-br from-primary-100 to-primary-200 p-4 rounded-2xl group-hover:scale-110 transition-transform duration-300 shadow-md">
                                            <svg class="w-7 h-7 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-5 flex-1">
                                        <h3 class="font-bold text-gray-900 text-lg mb-2">Alamat Sekretariat</h3>
                                        <p class="text-gray-600 leading-relaxed mb-3"><?php echo e($kontak->alamat_sekretariat); ?></p>
                                        <a href="https://maps.google.com/?q=<?php echo e(urlencode($kontak->alamat_sekretariat)); ?>" target="_blank" 
                                           class="inline-flex items-center text-primary-600 hover:text-primary-700 font-semibold text-sm group/link">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                                            </svg>
                                            Buka di Google Maps
                                            <svg class="w-4 h-4 ml-1 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- WhatsApp -->
                            <?php if($kontak->whatsapp): ?>
                            <div class="group">
                                <div class="flex items-start p-5 rounded-2xl transition-all duration-300 hover:bg-gradient-to-br hover:from-green-50 hover:to-green-100/50">
                                    <div class="flex-shrink-0">
                                        <div class="bg-gradient-to-br from-green-100 to-green-200 p-4 rounded-2xl group-hover:scale-110 transition-transform duration-300 shadow-md">
                                            <svg class="w-7 h-7 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-5 flex-1">
                                        <h3 class="font-bold text-gray-900 text-lg mb-2">WhatsApp</h3>
                                        <p class="text-gray-600 mb-3 font-medium"><?php echo e($kontak->whatsapp); ?></p>
                                        <a href="https://wa.me/<?php echo e(str_replace(['+', '-', ' '], '', $kontak->whatsapp)); ?>" target="_blank" 
                                           class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold rounded-xl transition-all duration-300 shadow-md hover:shadow-lg group/btn">
                                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 1.856.001 3.598.723 4.907 2.034 1.310 1.311 2.031 3.054 2.030 4.908-.001 3.825-3.113 6.938-6.937 6.938z"/>
                                            </svg>
                                            Chat Sekarang
                                            <svg class="w-4 h-4 ml-2 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Telepon -->
                            <?php if($kontak->telepon): ?>
                            <div class="group">
                                <div class="flex items-start p-5 rounded-2xl transition-all duration-300 hover:bg-gradient-to-br hover:from-accent/50 hover:to-secondary/30">
                                    <div class="flex-shrink-0">
                                        <div class="bg-gradient-to-br from-secondary/60 to-accent p-4 rounded-2xl group-hover:scale-110 transition-transform duration-300 shadow-md">
                                            <svg class="w-7 h-7 text-primary-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-5">
                                        <h3 class="font-bold text-gray-900 text-lg mb-2">Telepon</h3>
                                        <a href="tel:<?php echo e($kontak->telepon); ?>" class="text-primary-600 hover:text-primary-700 font-semibold text-lg"><?php echo e($kontak->telepon); ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Email -->
                            <?php if($kontak->email): ?>
                            <div class="group">
                                <div class="flex items-start p-5 rounded-2xl transition-all duration-300 hover:bg-gradient-to-br hover:from-blue-50 hover:to-blue-100/50">
                                    <div class="flex-shrink-0">
                                        <div class="bg-gradient-to-br from-blue-100 to-blue-200 p-4 rounded-2xl group-hover:scale-110 transition-transform duration-300 shadow-md">
                                            <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-5">
                                        <h3 class="font-bold text-gray-900 text-lg mb-2">Email</h3>
                                        <a href="mailto:<?php echo e($kontak->email); ?>" class="text-primary-600 hover:text-primary-700 font-medium break-all"><?php echo e($kontak->email); ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Media Sosial & Jam Operasional -->
                <div class="space-y-6">
                    <!-- Media Sosial Card -->
                    <div class="bg-gradient-to-br from-primary-700 to-primary-800 rounded-3xl shadow-xl overflow-hidden text-white">
                        <div class="px-8 py-5 flex items-center border-b border-white/10">
                            <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold ml-4">Media Sosial</h2>
                        </div>
                        <div class="p-8">
                            <p class="text-sm text-primary-100 mb-6">
                                Ikuti kami untuk update terbaru tentang kegiatan dan program Karang Taruna
                            </p>
                            
                            <div class="space-y-3">
                                <?php if($kontak->instagram): ?>
                                <a href="https://instagram.com/<?php echo e(ltrim($kontak->instagram, '@')); ?>" target="_blank" 
                                   class="flex items-center p-4 bg-white/10 backdrop-blur-sm rounded-xl hover:bg-white/20 transition-all duration-300 group/social">
                                    <div class="bg-gradient-to-br from-pink-500 to-purple-600 p-3 rounded-xl">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <span class="font-semibold block">Instagram</span>
                                        <span class="text-xs text-primary-100"><?php echo e($kontak->instagram); ?></span>
                                    </div>
                                    <svg class="w-5 h-5 group-hover/social:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <?php endif; ?>

                                <?php if($kontak->facebook): ?>
                                <a href="https://facebook.com/<?php echo e($kontak->facebook); ?>" target="_blank" 
                                   class="flex items-center p-4 bg-white/10 backdrop-blur-sm rounded-xl hover:bg-white/20 transition-all duration-300 group/social">
                                    <div class="bg-blue-600 p-3 rounded-xl">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <span class="font-semibold block">Facebook</span>
                                        <span class="text-xs text-primary-100"><?php echo e($kontak->facebook); ?></span>
                                    </div>
                                    <svg class="w-5 h-5 group-hover/social:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <?php endif; ?>

                                <?php if($kontak->twitter): ?>
                                <a href="https://twitter.com/<?php echo e(ltrim($kontak->twitter, '@')); ?>" target="_blank" 
                                   class="flex items-center p-4 bg-white/10 backdrop-blur-sm rounded-xl hover:bg-white/20 transition-all duration-300 group/social">
                                    <div class="bg-sky-500 p-3 rounded-xl">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <span class="font-semibold block">Twitter</span>
                                        <span class="text-xs text-primary-100"><?php echo e($kontak->twitter); ?></span>
                                    </div>
                                    <svg class="w-5 h-5 group-hover/social:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <?php endif; ?>

                                <?php if($kontak->youtube): ?>
                                <a href="https://youtube.com/<?php echo e($kontak->youtube); ?>" target="_blank" 
                                   class="flex items-center p-4 bg-white/10 backdrop-blur-sm rounded-xl hover:bg-white/20 transition-all duration-300 group/social">
                                    <div class="bg-red-600 p-3 rounded-xl">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <span class="font-semibold block">YouTube</span>
                                        <span class="text-xs text-primary-100"><?php echo e($kontak->youtube); ?></span>
                                    </div>
                                    <svg class="w-5 h-5 group-hover/social:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Jam Operasional Card -->
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                        <div class="px-8 py-5 flex items-center bg-gradient-to-r from-accent/40 to-secondary/30 border-b border-secondary/20">
                            <div class="bg-secondary p-3 rounded-xl">
                                <svg class="w-6 h-6 text-primary-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 ml-4">Jam Operasional</h3>
                        </div>
                        <div class="p-8 space-y-4">
                            <div class="flex justify-between items-center p-4 rounded-xl hover:bg-gray-50 transition-colors">
                                <span class="font-bold text-gray-900">Senin - Jumat</span>
                                <span class="text-gray-600 font-medium">08:00 - 16:00</span>
                            </div>
                            <div class="flex justify-between items-center p-4 rounded-xl hover:bg-gray-50 transition-colors">
                                <span class="font-bold text-gray-900">Sabtu</span>
                                <span class="text-gray-600 font-medium">08:00 - 12:00</span>
                            </div>
                            <div class="flex justify-between items-center p-4 rounded-xl hover:bg-red-50 transition-colors">
                                <span class="font-bold text-gray-900">Minggu</span>
                                <span class="text-red-500 font-bold flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Tutup
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<div class="bg-color_bg py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto bg-gradient-to-br from-amber-50 to-orange-50 border-2 border-amber-200 rounded-3xl p-12 text-center shadow-xl">
            <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl mb-6 shadow-lg">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-4">Informasi Tidak Tersedia</h3>
            <p class="text-gray-600 leading-relaxed text-lg">Informasi kontak belum tersedia saat ini. Silakan cek kembali nanti atau hubungi administrator.</p>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Magang\cms-karangtaruna\resources\views/frontend/kontak/index.blade.php ENDPATH**/ ?>