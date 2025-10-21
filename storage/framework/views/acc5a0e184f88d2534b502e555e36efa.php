

<?php $__env->startSection('navbar_transparent'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Beranda - Karang Taruna'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative h-[580px] flex items-center justify-center mb-16">
    <img src="<?php echo e(asset('images/hero.jpg')); ?>" 
             class="absolute inset-0 w-full h-full object-cover z-0" alt="Hero Image" />

    <div class="absolute inset-0 bg-black/50 z-10"></div> <!-- Overlay Gelap -->

    <div class="relative z-20 flex flex-col items-center justify-center text-center px-6 py-28 w-full">
        <h1 class="text-4xl md:text-5xl font-bold text-white drop-shadow-lg mb-4">
            Selamat Datang di Website Karang Taruna
        </h1>
        <p class="text-lg md:text-xl text-white drop-shadow mb-8 max-w-2xl">
            Bersama kita membangun pemuda dan masyarakat yang berdaya!
        </p>
            <div class="flex space-x-4">
                <a href="<?php echo e(route('tentang.profil')); ?>" class="inline-block bg-primary-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-700 transition">
                    Tentang Kami
                </a>
                <a href="<?php echo e(route('kontak.index')); ?>" class="inline-block bg-white text-primary-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Hubungi Kami
                </a>
            </div>
    </div>
</section>

<!-- Profil Singkat -->
<?php if($profile): ?>
<div class="container mx-auto px-4 py-16">
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div>
            <h2 class="text-3xl font-bold mb-4 text-gray-800">Tentang Kami</h2>
            <p class="text-gray-600 leading-relaxed mb-6"><?php echo e(Str::limit($profile->profil_singkat, 300)); ?></p>
            <a href="<?php echo e(route('tentang.profil')); ?>" class="text-primary-600 font-semibold hover:text-primary-700">
                Selengkapnya →
            </a>
        </div>
        <div>
            <?php if($profile->logo_path): ?>
                <img src="<?php echo e(asset('storage/' . $profile->logo_path)); ?>" alt="Logo <?php echo e($profile->nama_organisasi); ?>" class="w-full max-w-md mx-auto">
            <?php else: ?>
                <div class="bg-gray-200 w-full h-64 rounded-lg flex items-center justify-center">
                    <span class="text-gray-400">Logo Karang Taruna</span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Galeri Terbaru -->
<div class="bg-gray-100 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Galeri Terbaru</h2>
            <p class="text-gray-600">Koleksi foto dan video terbaru dari kegiatan Karang Taruna</p>
        </div>

        <?php if($galeriTerbaru->count() > 0): ?>
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <?php $__currentLoopData = $galeriTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition group">
                <?php
                    $isVideo = !empty($galeri->link_video);
                    $tipe = $isVideo ? 'video' : 'foto';
                    $url = $isVideo ? ($galeri->thumbnail ?: '') : (is_array($galeri->media_path) ? $galeri->media_path[0] : $galeri->media_path);
                ?>
                <?php if($tipe === 'foto'): ?>
                    <div class="w-full h-48 bg-gray-200 overflow-hidden">
                        <img src="<?php echo e(asset('storage/' . $url)); ?>" alt="<?php echo e($galeri->judul); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    </div>
                <?php else: ?>
                    <div class="w-full h-48 bg-black/20 flex items-center justify-center relative">
                        <?php if($galeri->thumbnail): ?>
                            <img src="<?php echo e(asset('storage/' . $galeri->thumbnail)); ?>" alt="<?php echo e($galeri->judul); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <?php else: ?>
                            <svg class="w-12 h-12 text-white/50" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                            </svg>
                        <?php endif; ?>
                        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/60 transition-colors flex items-center justify-center">
                            <svg class="w-16 h-16 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                            </svg>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs bg-primary-100 text-primary-600 font-semibold px-2 py-1 rounded"><?php echo e(ucfirst($tipe)); ?></span>
                        <span class="text-xs text-gray-500"><?php echo e($galeri->tanggal_kegiatan->format('d M Y')); ?></span>
                    </div>
                    <h3 class="text-lg font-bold mt-2 mb-2 line-clamp-2"><?php echo e($galeri->judul); ?></h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2"><?php echo e($galeri->deskripsi ?? 'Tidak ada deskripsi'); ?></p>
                    <a href="<?php echo e(route('galeri.berita.show', $galeri->id)); ?>" class="text-primary-600 text-sm font-semibold hover:text-primary-700">
                        Lihat Detail →
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>
        <p class="text-center text-gray-500">Belum ada galeri tersedia.</p>
        <?php endif; ?>

        <div class="text-center">
            <a href="<?php echo e(route('galeri.berita')); ?>" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition">
                Lihat Semua Galeri
            </a>
        </div>
    </div>
</div>

<!-- Produk UMKM -->
<div class="container mx-auto px-4 py-24">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Produk UMKM</h2>
        <p class="text-gray-600">Produk unggulan dari mitra Karang Taruna</p>
    </div>

    <?php if($produkTerbaru->count() > 0): ?>
    <div class="grid md:grid-cols-4 gap-6 mb-8">
    <?php $__currentLoopData = $produkTerbaru->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('produk.list')); ?>?highlight=<?php echo e($produk->id); ?>" class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition relative group">
            <?php if($produk->foto): ?>
                <img src="<?php echo e(asset('storage/' . $produk->foto)); ?>" alt="<?php echo e($produk->nama_produk); ?>" class="w-full h-48 object-cover">
            <?php else: ?>
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400">No Image</span>
                </div>
            <?php endif; ?>
            <div class="p-4 text-center">
                <h3 class="font-bold mb-2"><?php echo e($produk->nama_produk); ?></h3>
                <?php if($produk->harga): ?>
                <p class="text-primary-600 font-bold text-lg mb-3">Rp <?php echo e(number_format($produk->harga, 0, ',', '.')); ?></p>
                <?php endif; ?>

                
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
    <p class="text-center text-gray-500">Belum ada produk tersedia.</p>
    <?php endif; ?>

    <div class="text-center">
        <a href="<?php echo e(route('produk.list')); ?>" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition">
            Lihat Semua Produk
        </a>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-primary-600 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Bergabung Bersama Kami</h2>
        <p class="text-xl mb-8">Mari berkontribusi untuk membangun generasi muda yang lebih baik</p>
        <a href="<?php echo e(route('kontak.index')); ?>" class="inline-block bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
            Hubungi Kami
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        function pesanWhatsApp(namaProduk, harga) {
            <?php if(isset($kontak) && $kontak && $kontak->whatsapp): ?>
                const nomorAdmin = '<?php echo e($kontak->whatsapp); ?>';
            <?php else: ?>
                const nomorAdmin = '6285725040030'; // default
                console.warn('Nomor WhatsApp admin belum diatur di database');
            <?php endif; ?>

            const pesan = `Halo Admin Karang Taruna,%0A%0ASaya tertarik dengan produk:%0A- ${namaProduk}%0A- Harga: ${harga}%0A%0AMohon info selanjutnya.`;
            const url = `https://wa.me/${nomorAdmin}?text=${encodeURIComponent(pesan)}`;
            window.open(url, '_blank');
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Magang\cms-karangtaruna\resources\views/frontend/home.blade.php ENDPATH**/ ?>