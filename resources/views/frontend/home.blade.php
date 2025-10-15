@extends('layouts.app')

@section('navbar_transparent')
@endsection

@section('title', 'Beranda - Karang Taruna')

@section('content')
<!-- Hero Section -->
<section class="relative h-[580px] flex items-center justify-center mb-16">
    <img src="{{ asset('images/hero.jpg') }}" 
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
                <a href="{{ route('tentang.profil') }}" class="inline-block bg-primary-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-700 transition">
                    Tentang Kami
                </a>
                <a href="{{ route('kontak.index') }}" class="inline-block bg-white text-primary-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Hubungi Kami
                </a>
            </div>
    </div>
</section>

<!-- Profil Singkat -->
@if($profile)
<div class="container mx-auto px-4 py-16">
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div>
            <h2 class="text-3xl font-bold mb-4 text-gray-800">Tentang Kami</h2>
            <p class="text-gray-600 leading-relaxed mb-6">{{ Str::limit($profile->profil_singkat, 300) }}</p>
            <a href="{{ route('tentang.profil') }}" class="text-primary-600 font-semibold hover:text-primary-700">
                Selengkapnya →
            </a>
        </div>
        <div>
            @if($profile->logo_path)
                <img src="{{ asset('storage/' . $profile->logo_path) }}" alt="Logo {{ $profile->nama_organisasi }}" class="w-full max-w-md mx-auto">
            @else
                <div class="bg-gray-200 w-full h-64 rounded-lg flex items-center justify-center">
                    <span class="text-gray-400">Logo Karang Taruna</span>
                </div>
            @endif
        </div>
    </div>
</div>
@endif

<!-- Kegiatan Terbaru -->
<div class="bg-gray-100 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Kegiatan Terbaru</h2>
            <p class="text-gray-600">Dokumentasi kegiatan dan program Karang Taruna</p>
        </div>

        @if($kegiatanTerbaru->count() > 0)
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            @foreach($kegiatanTerbaru as $kegiatan)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                @if($kegiatan->thumbnail)
                    <img src="{{ asset('storage/' . $kegiatan->thumbnail) }}" alt="{{ $kegiatan->judul }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400">No Image</span>
                    </div>
                @endif
                <div class="p-6">
                    <span class="text-xs text-primary-600 font-semibold uppercase">{{ $kegiatan->kategori }}</span>
                    <h3 class="text-xl font-bold mt-2 mb-3">{{ $kegiatan->judul }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($kegiatan->deskripsi, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $kegiatan->tanggal_kegiatan->format('d M Y') }}</span>
                        <a href="{{ route('kegiatan.show', $kegiatan->id) }}" class="text-primary-600 text-sm font-semibold hover:text-primary-700">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center text-gray-500">Belum ada kegiatan tersedia.</p>
        @endif

        <div class="text-center">
            <a href="{{ route('kegiatan.index') }}" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition">
                Lihat Semua Kegiatan
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

    @if($produkTerbaru->count() > 0)
    <div class="grid md:grid-cols-4 gap-6 mb-8">
    @foreach($produkTerbaru->take(4) as $produk)
    <a href="{{ route('produk.list') }}?highlight={{ $produk->id }}" class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition relative group">
            @if($produk->foto)
                <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}" class="w-full h-48 object-cover">
            @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400">No Image</span>
                </div>
            @endif
            <div class="p-4 text-center">
                <h3 class="font-bold mb-2">{{ $produk->nama_produk }}</h3>
                @if($produk->harga)
                <p class="text-primary-600 font-bold text-lg mb-3">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                @endif

                
            </div>
        </a>
        @endforeach
    </div>
    @else
    <p class="text-center text-gray-500">Belum ada produk tersedia.</p>
    @endif

    <div class="text-center">
        <a href="{{ route('produk.list') }}" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition">
            Lihat Semua Produk
        </a>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-primary-600 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Bergabung Bersama Kami</h2>
        <p class="text-xl mb-8">Mari berkontribusi untuk membangun generasi muda yang lebih baik</p>
        <a href="{{ route('kontak.index') }}" class="inline-block bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
            Hubungi Kami
        </a>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        function pesanWhatsApp(namaProduk, harga) {
            @if (isset($kontak) && $kontak && $kontak->whatsapp)
                const nomorAdmin = '{{ $kontak->whatsapp }}';
            @else
                const nomorAdmin = '6285725040030'; // default
                console.warn('Nomor WhatsApp admin belum diatur di database');
            @endif

            const pesan = `Halo Admin Karang Taruna,%0A%0ASaya tertarik dengan produk:%0A- ${namaProduk}%0A- Harga: ${harga}%0A%0AMohon info selanjutnya.`;
            const url = `https://wa.me/${nomorAdmin}?text=${encodeURIComponent(pesan)}`;
            window.open(url, '_blank');
        }
    </script>
@endpush
