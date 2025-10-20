<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\VisiMisi;
use App\Models\Kepengurusan;
use App\Models\Berita;
use App\Models\Mitra;
use App\Models\Kontak;
use App\Models\FilosofiLogoItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call AdminSeeder first to create admin user
        $this->call(AdminSeeder::class);

        // Create Profile
        Profile::create([
            'nama_organisasi' => 'Karang Taruna Maju Bersama',
            'alamat' => 'Jl. Pemuda No. 123, Jakarta Selatan',
            'tahun_berdiri' => 2010,
            'legalitas' => 'SK Gubernur No. 123/2010',
            'sejarah' => 'Karang Taruna Maju Bersama didirikan pada tahun 2010 dengan tujuan memberdayakan pemuda di wilayah Jakarta Selatan. Organisasi ini lahir dari kesadaran para pemuda untuk berkontribusi dalam pembangunan masyarakat.',
            'profil_singkat' => 'Karang Taruna Maju Bersama adalah organisasi kepemudaan yang fokus pada pengembangan karakter, keterampilan, dan pemberdayaan masyarakat. Kami berkomitmen untuk menciptakan generasi muda yang berkarakter dan berprestasi.',
            'filosofi_logo' => 'Logo Karang Taruna menggambarkan semangat pemuda yang dinamis dan penuh makna. Warna merah melambangkan keberanian dan semangat juang para pemuda dalam menghadapi tantangan. Warna kuning melambangkan kemakmuran dan harapan cerah untuk masa depan generasi muda. Warna hijau melambangkan pertumbuhan, kesegaran, dan kehidupan yang terus berkembang. Lingkaran melambangkan persatuan, kesatuan, dan kebersamaan dalam organisasi.'
        ]);

        // Create Visi Misi
        VisiMisi::create([
            'visi' => 'Menjadi organisasi kepemudaan terdepan dalam pemberdayaan masyarakat dan pengembangan karakter generasi muda yang berintegritas.',
            'misi' => "1. Mengembangkan potensi pemuda melalui pelatihan dan pendampingan\n2. Memberdayakan masyarakat melalui program-program sosial\n3. Membangun karakter pemuda yang berintegritas dan berprestasi\n4. Menciptakan jejaring kerjasama dengan berbagai pihak",
            'tujuan' => "1. Meningkatkan kualitas SDM pemuda\n2. Menciptakan pemuda yang mandiri dan produktif\n3. Membangun kesadaran sosial di kalangan pemuda",
            'fungsi' => "1. Wadah pembinaan dan pengembangan generasi muda\n2. Penyelenggara kesejahteraan sosial\n3. Pencegahan dan penanggulangan masalah sosial",
            'nilai_dasar' => "1. Integritas\n2. Profesionalisme\n3. Kerjasama\n4. Inovasi\n5. Tanggung Jawab Sosial"
        ]);

        // Create Kepengurusan
        $jabatan = [
            ['nama' => 'Budi Santoso', 'jabatan' => 'Ketua', 'urutan' => 1, 'is_tokoh_utama' => true],
            ['nama' => 'Ani Wijaya', 'jabatan' => 'Wakil Ketua', 'urutan' => 2, 'is_tokoh_utama' => true],
            ['nama' => 'Siti Rahmawati', 'jabatan' => 'Sekretaris', 'urutan' => 3, 'is_tokoh_utama' => true],
            ['nama' => 'Agus Prasetyo', 'jabatan' => 'Bendahara', 'urutan' => 4, 'is_tokoh_utama' => true],
            ['nama' => 'Rina Kusuma', 'jabatan' => 'Koordinator Bidang Pendidikan', 'urutan' => 5, 'is_tokoh_utama' => false],
            ['nama' => 'Dedi Kurniawan', 'jabatan' => 'Koordinator Bidang Sosial', 'urutan' => 6, 'is_tokoh_utama' => false],
        ];

        foreach ($jabatan as $j) {
            Kepengurusan::create([
                'nama' => $j['nama'],
                'jabatan' => $j['jabatan'],
                'tugas' => 'Bertanggung jawab dalam ' . strtolower($j['jabatan']),
                'profil_singkat' => $j['nama'] . ' adalah ' . strtolower($j['jabatan']) . ' yang berpengalaman dalam organisasi kepemudaan.',
                'is_tokoh_utama' => $j['is_tokoh_utama'],
                'urutan' => $j['urutan']
            ]);
        }

        // Create Berita
        $berita = [
            [
                'judul' => 'Bakti Sosial Ramadan 2024',
                'deskripsi' => 'Kegiatan bakti sosial dalam rangka menyambut bulan Ramadan dengan membagikan sembako kepada masyarakat kurang mampu.',
                'tanggal_kegiatan' => now()->subMonths(2),
                'kategori' => 'galeri'
            ],
            [
                'judul' => 'Pelatihan Kewirausahaan Pemuda',
                'deskripsi' => 'Workshop kewirausahaan untuk pemuda dengan materi digital marketing dan manajemen usaha.',
                'tanggal_kegiatan' => now()->subMonths(1),
                'kategori' => 'berita'
            ],
            [
                'judul' => 'Gotong Royong Bersih Lingkungan',
                'deskripsi' => 'Kegiatan gotong royong membersihkan lingkungan sekitar untuk menciptakan lingkungan yang bersih dan sehat.',
                'tanggal_kegiatan' => now()->subWeeks(2),
                'kategori' => 'galeri'
            ],
            [
                'judul' => 'Dokumenter Profil Karang Taruna',
                'deskripsi' => 'Video dokumenter tentang perjalanan dan kegiatan Karang Taruna Maju Bersama.',
                'tanggal_kegiatan' => now()->subWeeks(1),
                'kategori' => 'video',
                'link_video' => 'https://youtube.com/watch?v=example'
            ],
        ];

        foreach ($berita as $b) {
            Berita::create($b);
        }

        // Create Mitra
        $mitra = [
            [
                'nama_mitra' => 'UMKM Sejahtera',
                'jenis' => 'UMKM',
                'deskripsi' => 'UMKM yang bergerak di bidang makanan dan minuman.',
                'kontak' => '081234567890',
                'testimoni' => 'Kerjasama dengan Karang Taruna sangat membantu perkembangan usaha kami.'
            ],
            [
                'nama_mitra' => 'Kerajinan Nusantara',
                'jenis' => 'UMKM',
                'deskripsi' => 'Produsen kerajinan tangan khas Indonesia.',
                'kontak' => '081234567891',
                'testimoni' => 'Melalui Karang Taruna, produk kami bisa lebih dikenal masyarakat luas.'
            ],
        ];

        foreach ($mitra as $m) {
            Mitra::create($m);
        }

        // Create Kontak
        Kontak::create([
            'alamat_sekretariat' => 'Jl. Pemuda No. 123, Jakarta Selatan, DKI Jakarta 12345',
            'telepon' => '021-1234567',
            'whatsapp' => '081234567890',
            'email' => 'info@karangtaruna.com',
            'instagram' => '@karangtaruna_majubersama',
            'facebook' => 'Karang Taruna Maju Bersama',
            'twitter' => '@ktmajubersama',
            'youtube' => 'Karang Taruna Channel'
        ]);

        // Create Filosofi Logo Items
        $filosofiItems = [
            [
                'title' => 'Warna Merah',
                'description' => 'Melambangkan keberanian, semangat juang, dan dedikasi para pemuda dalam menghadapi tantangan serta berkontribusi untuk masyarakat.',
                'icon' => 'fire',
                'urutan' => 1,
            ],
            [
                'title' => 'Warna Kuning',
                'description' => 'Melambangkan kemakmuran, harapan cerah, dan optimisme untuk masa depan generasi muda yang gemilang dan penuh prestasi.',
                'icon' => 'sun',
                'urutan' => 2,
            ],
            [
                'title' => 'Warna Hijau',
                'description' => 'Melambangkan pertumbuhan, kesegaran, kehidupan yang dinamis, serta kesinambungan pembangunan karakter pemuda yang terus berkembang.',
                'icon' => 'leaf',
                'urutan' => 3,
            ],
            [
                'title' => 'Bentuk Lingkaran',
                'description' => 'Melambangkan persatuan, kesatuan, kebersamaan, dan kekompakan dalam organisasi yang tidak terputus dan terus bersinergi.',
                'icon' => 'circle',
                'urutan' => 4,
            ],
            [
                'title' => 'Simbol Bunga Teratai',
                'description' => 'Melambangkan kesucian, ketahanan, dan kemampuan tumbuh di berbagai kondisi, mencerminkan kekuatan pemuda dalam menghadapi situasi apapun.',
                'icon' => 'flower',
                'urutan' => 5,
            ]
        ];

        foreach ($filosofiItems as $item) {
            FilosofiLogoItem::create($item);
        }

        // Call ProdukSeeder
        $this->call(ProdukSeeder::class);

        // Call MitraSeeder
        $this->call(MitraSeeder::class);

    }
}

