<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mitra;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mitra = [
            [
                'nama_mitra' => 'Kue Leker Mama Siti',
                'jenis' => 'Makanan',
                'deskripsi' => 'Spesialis kue leker tradisional dengan resep turun temurun. Menyediakan berbagai varian rasa dan ukuran untuk berbagai acara.',
                'kontak' => '081234567890',
                'testimoni' => 'Berkat bantuan Karang Taruna, usaha saya semakin berkembang dan bisa menjangkau lebih banyak pelanggan.'
            ],
            [
                'nama_mitra' => 'Toko Batik Nusantara',
                'jenis' => 'Fashion',
                'deskripsi' => 'Menjual berbagai kain batik tulis dan cap dengan motif tradisional. Kualitas premium dengan harga terjangkau.',
                'kontak' => '081234567891',
                'testimoni' => 'Karang Taruna memberikan platform yang sangat membantu untuk memasarkan produk batik kami ke masyarakat luas.'
            ],
            [
                'nama_mitra' => 'Kerajinan Bambu Lestari',
                'jenis' => 'Kerajinan',
                'deskripsi' => 'Membuat berbagai produk kerajinan dari bambu seperti furniture, dekorasi rumah, dan souvenir dengan teknik tradisional.',
                'kontak' => '081234567892',
                'testimoni' => 'Kolaborasi dengan Karang Taruna membuka peluang pasar baru dan meningkatkan pendapatan keluarga kami.'
            ],
            [
                'nama_mitra' => 'Tanaman Hias Hijau Sejahtera',
                'jenis' => 'Tanaman',
                'deskripsi' => 'Menanam dan menjual berbagai jenis tanaman hias indoor dan outdoor. Spesialis tanaman mudah perawatan.',
                'kontak' => '081234567893',
                'testimoni' => 'Dengan dukungan Karang Taruna, kami bisa memperluas jaringan pemasaran dan meningkatkan kualitas produk.'
            ],
            [
                'nama_mitra' => 'Sambal Pedas Maknyos',
                'jenis' => 'Makanan',
                'deskripsi' => 'Produsen sambal homemade dengan berbagai tingkat kepedasan. Menggunakan bahan-bahan segar dan resep rahasia keluarga.',
                'kontak' => '081234567894',
                'testimoni' => 'Karang Taruna tidak hanya membantu pemasaran, tapi juga memberikan pelatihan untuk pengembangan usaha.'
            ],
            [
                'nama_mitra' => 'Tas Rotan Handmade',
                'jenis' => 'Kerajinan',
                'deskripsi' => 'Spesialis tas dan aksesoris dari rotan pilihan. Desain modern dengan sentuhan tradisional yang elegan.',
                'kontak' => '081234567895',
                'testimoni' => 'Bergabung dengan Karang Taruna memberikan kami akses ke pasar yang lebih luas dan networking yang berharga.'
            ],
            [
                'nama_mitra' => 'Kopi Specialty Lokal',
                'jenis' => 'Makanan',
                'deskripsi' => 'Menghasilkan kopi specialty grade dari perkebunan lokal. Proses roasting dan packaging dilakukan dengan standar internasional.',
                'kontak' => '081234567896',
                'testimoni' => 'Karang Taruna membantu kami mendapatkan sertifikasi dan membuka peluang ekspor untuk produk kopi kami.'
            ],
            [
                'nama_mitra' => 'Batik Printing Modern',
                'jenis' => 'Fashion',
                'deskripsi' => 'Menggabungkan teknik batik tradisional dengan desain modern. Menyediakan layanan custom printing untuk berbagai kebutuhan.',
                'kontak' => '081234567897',
                'testimoni' => 'Dukungan Karang Taruna sangat berarti dalam mengembangkan inovasi produk dan memperluas pasar.'
            ]
        ];

        foreach ($mitra as $item) {
            Mitra::create($item);
        }

        $this->command->info('✅ Mitra seeder berhasil dijalankan!');
        $this->command->info('📝 Total mitra: ' . count($mitra));
        $this->command->info('🏪 Jenis usaha: Makanan, Fashion, Kerajinan, Tanaman');
    }
}
