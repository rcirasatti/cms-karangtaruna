@extends('layouts.app')

@section('title', 'Beranda - Karang Taruna')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary-600 to-primary-800 text-white">
    <div class="container mx-auto px-4 py-20">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang di Karang Taruna</h1>
            <p class="text-xl mb-8">Wadah Pengembangan Generasi Muda yang Berkarakter dan Berprestasi</p>
            <div class="flex space-x-4">
                <a href="{{ route('tentang.profil') }}" class="bg-white text-primary-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Tentang Kami
                </a>
                <a href="{{ route('kontak.index') }}" class="border-2 border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary-600 transition">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</div>

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
<div class="container mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Produk UMKM</h2>
        <p class="text-gray-600">Produk unggulan dari mitra Karang Taruna</p>
    </div>

    @if($produkTerbaru->count() > 0)
    <div class="grid md:grid-cols-4 gap-6 mb-8">
        @foreach($produkTerbaru as $produk)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
            @if($produk->foto)
                <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}" class="w-full h-48 object-cover">
            @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400">No Image</span>
                </div>
            @endif
            <div class="p-4">
                <h3 class="font-bold mb-2">{{ $produk->nama_produk }}</h3>
                @if($produk->harga)
                <p class="text-primary-600 font-bold text-lg mb-3">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                @endif
                <a href="{{ route('produk.show', $produk->id) }}" class="block text-center bg-primary-600 text-white px-4 py-2 rounded hover:bg-primary-700 transition">
                    Lihat Detail
                </a>
            </div>
        </div>
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
