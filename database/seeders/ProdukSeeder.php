<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;
use App\Models\Kontak;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Kontak untuk WhatsApp
        Kontak::updateOrCreate(
            ['id' => 1],
            [
                'whatsapp' => '6285725040030', 
                'telepon' => '021-12345678',
                'email' => 'info@karangtaruna.org',
                'alamat_sekretariat' => 'Jl. Contoh No. 123, Jakarta',
            ]
        );

        // Seed Produk Contoh
        $produk = [
            [
                'nama_produk' => 'Kue Kering Lebaran Premium',
                'deskripsi' => 'Kue kering istimewa dengan berbagai varian rasa yang lezat dan renyah. Cocok untuk hampers lebaran atau oleh-oleh keluarga.',
                'harga' => 75000,
                'kategori' => 'Makanan',
            ],
            [
                'nama_produk' => 'Tas Anyaman Handmade',
                'deskripsi' => 'Tas anyaman berkualitas tinggi dibuat dengan tangan oleh pengrajin lokal. Desain modern dan ramah lingkungan.',
                'harga' => 150000,
                'kategori' => 'Kerajinan',
            ],
            [
                'nama_produk' => 'Sambal Khas Nusantara',
                'deskripsi' => 'Sambal homemade dengan resep turun temurun, pedas gurih dan menggugah selera. Tersedia berbagai tingkat kepedasan.',
                'harga' => 35000,
                'kategori' => 'Makanan',
            ],
            [
                'nama_produk' => 'Keripik Pisang Aneka Rasa',
                'deskripsi' => 'Keripik pisang crispy dengan berbagai varian rasa: original, coklat, keju, dan balado. Camilan favorit keluarga.',
                'harga' => 25000,
                'kategori' => 'Makanan',
            ],
            [
                'nama_produk' => 'Batik Tulis Exclusive',
                'deskripsi' => 'Kain batik tulis asli dengan motif tradisional yang elegan. Cocok untuk acara formal dan kasual.',
                'harga' => 500000,
                'kategori' => 'Fashion',
            ],
            [
                'nama_produk' => 'Tanaman Hias Indoor',
                'deskripsi' => 'Tanaman hias pilihan untuk mempercantik ruangan Anda. Mudah perawatan dan cocok untuk indoor.',
                'harga' => 50000,
                'kategori' => 'Tanaman',
            ],
        ];

        foreach ($produk as $item) {
            Produk::create($item);
        }

        $this->command->info('✅ Produk seeder berhasil dijalankan!');
        $this->command->info('📝 Total produk: ' . count($produk));
        $this->command->info('📱 Nomor WhatsApp admin: 6281234567890 (silakan update di database)');
    }
}
