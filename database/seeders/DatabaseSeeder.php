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
use App\Models\Quote;
use App\Models\Hero;
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
            'sejarah' => "Karang Taruna adalah organisasi sosial kepemudaan yang berfungsi sebagai wadah pengembangan generasi muda dalam berbagai aspek, termasuk sosial, ekonomi, dan budaya. Organisasi ini didirikan sebagai respons terhadap berbagai permasalahan yang dihadapi oleh anak-anak muda, seperti kemiskinan, pengangguran, serta berbagai bentuk penyimpangan sosial yang mengancam masa depan generasi muda. Dengan semangat gotong royong dan kepedulian sosial, Karang Taruna berupaya memberikan solusi nyata bagi persoalan-persoalan sosial yang terjadi di masyarakat.\nSejarah berdirinya Karang Taruna bermula pada 26 September 1960 di Kebon Baru, Jakarta Selatan. Pada masa itu, banyak anak muda yang mengalami kesulitan dalam mengakses pendidikan, pekerjaan, serta sarana untuk mengembangkan potensi mereka. Situasi ini mendorong lahirnya sebuah komunitas kepemudaan yang bertujuan untuk membantu pemerintah dalam menangani berbagai persoalan sosial yang muncul di lingkungan desa atau kelurahan. Dengan pendekatan berbasis komunitas dan kebersamaan, Karang Taruna berusaha memberdayakan pemuda agar mampu mandiri dan memiliki peran aktif dalam pembangunan masyarakat.\n Seiring waktu, keberadaan Karang Taruna semakin mendapatkan pengakuan dan dukungan dari pemerintah. Pada tahun 1971, Kementerian Sosial Republik Indonesia secara resmi mengakui Karang Taruna sebagai organisasi sosial kepemudaan yang berperan dalam pembangunan sosial masyarakat. Pengakuan ini membuka peluang bagi Karang Taruna untuk berkembang lebih luas dan membentuk kepengurusan yang terstruktur di berbagai daerah, mulai dari tingkat desa, kecamatan, kabupaten/kota, hingga tingkat provinsi. Dengan adanya struktur kepengurusan yang kuat, Karang Taruna dapat lebih efektif dalam menjalankan program-programnya di berbagai daerah di Indonesia.\nSebagai organisasi yang berlandaskan nilai sosial dan kebersamaan, Karang Taruna memiliki misi utama untuk menciptakan pemuda yang mandiri, kreatif, serta memiliki kontribusi nyata dalam pembangunan daerahnya. Berbagai kegiatan yang dilakukan oleh Karang Taruna tidak hanya terbatas pada bidang sosial, tetapi juga meluas ke sektor ekonomi kreatif, kewirausahaan, pendidikan, olahraga, hingga pelestarian budaya. Dengan mengikuti perkembangan zaman, Karang Taruna terus berinovasi dalam menghadirkan program-program yang relevan dengan kebutuhan pemuda dan masyarakat di era modern.\nSetiap tanggal 26 September, masyarakat Indonesia memperingati Hari Karang Taruna Nasional. Peringatan ini menjadi momen refleksi bagi seluruh anggota Karang Taruna untuk meninjau kembali peran dan kontribusi mereka dalam pembangunan bangsa. Selain itu, perayaan Hari Karang Taruna Nasional juga menjadi ajang untuk mempererat solidaritas antaranggota serta memperkuat komitmen dalam mewujudkan masyarakat yang lebih sejahtera melalui berbagai program pemberdayaan pemuda.",
            'profil_singkat' => 'Karang Taruna Maju Bersama adalah organisasi kepemudaan yang fokus pada pengembangan karakter, keterampilan, dan pemberdayaan masyarakat. Kami berkomitmen untuk menciptakan generasi muda yang berkarakter dan berprestasi.',
            'logo_path' => 'https://i.pinimg.com/originals/79/e2/b5/79e2b5897b6bfaaac9d314a4b0a89348.png',
            'filosofi_logo' => 'lambang Karang Taruna berarti tekad insan remaja/generasi muda Indonesia (warga Karang Taruna) untuk mengembangkan dirinya menjadi patriot/pejuang yang berkepribadian, berpengetahuan/cerdas, serta terampil dan selalu berkarya nyata agar mampu ikut secara aktif dalam pembangunan untuk menciptakan masyarakat yang adil dan makmur berdasarkan Pancasila.'
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
            ['nama' => 'Lina Marlina', 'jabatan' => 'Koordinator Bidang Kewirausahaan', 'urutan' => 7, 'is_tokoh_utama' => false],
            ['nama' => 'Eko Prabowo', 'jabatan' => 'Koordinator Bidang Olahraga', 'urutan' => 8, 'is_tokoh_utama' => false],
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

        $filosofiItems = [
            [
                'title' => 'Sekuntum bunga teratai yang mulai mekar',
                'description' => 'Melambangkan generasi muda yang berjiwa sosial. Terdiri dari tujuh kuntum: Taat, Tanggap, Tanggon, Tandas, Tangkas, Terampil, Tulus.',
                'icon' => 'teratai',
                'urutan' => 1,
            ],
            [
                'title' => 'Empat helai daun bunga',
                'description' => 'Memaknai 4 fungsi: memupuk kreativitas & tanggung jawab; membina kegiatan sosial-edukatif-ekoproduktif; mengembangkan harapan & kapasitas remaja; menanamkan & mengimplementasikan nilai Pancasila.',
                'icon' => 'daun',
                'urutan' => 2,
            ],
            [
                'title' => 'Dua helai pita terpampang di bagian atas dan bawah',
                'description' => 'Pita atas: motto “Adhitya Karya Mahatva Yodha” (cerdas, berkarya, berbudi luhur, pejuang). Pita bawah: “Karang Taruna” sebagai wadah pengembangan remaja; bermakna generasi muda yang kokoh & tegar.',
                'icon' => 'pita',
                'urutan' => 3,
            ],
            [
                'title' => 'Sebuah lingkaran yang melingkari sekuntum bunga teratai dan dua pita',
                'description' => 'Lambang ketahanan nasional; berfungsi sebagai tameng/perisai.',
                'icon' => 'lingkaran',
                'urutan' => 4,
            ],
            [
                'title' => 'Bunga teratai yang mekar berdaun lima helai sebagai latar belakang',
                'description' => 'Melambangkan lingkaran kehidupan masyarakat yang adil dan sejahtera berdasarkan Pancasila.',
                'icon' => 'teratai mekar',
                'urutan' => 5,
            ],
            [
                'title' => 'Unsur Warna',
                'description' => 'Putih: kesucian; Merah: keberanian, tenang, tekad pantang mundur; Kuning: keagungan & keluhuran budi.',
                'icon' => 'palette',
                'urutan' => 6,
            ],
        ];

        $quotes = [
            [
                'nama' => 'Prabowo Subianto',
                'peran' => 'Presiden Republik Indonesia',
                'quote' => 'Karang Taruna membentuk generasi muda yang peduli dan berpikiran sosial, sangat bermanfaat dalam membangun kepemimpinan dan jiwa sosial.',
                'foto' => null
            ],
            [
                'nama' => 'Tri Rismaharini',
                'peran' => 'Menteri Sosial Republik Indonesia',
                'quote' => 'Peran Karang Taruna sangat strategis dalam memberdayakan masyarakat, terutama di bidang sosial dan kemanusiaan.',
                'foto' => null
            ]
        ];

        // Insert quotes to database
        foreach ($quotes as $q) {
            Quote::create($q);
        }

        // Create Hero with all required fields
        Hero::create([
            'title' => 'Selamat Datang di Karang Taruna Maju Bersama',
            'subtitle' => 'Bersama Membangun Generasi Muda yang Berkarakter dan Berprestasi',
            'title_navbar' => 'Karang Taruna',
            'subtitle_navbar' => 'Kelurahan Tembalang'
        ]);

        foreach ($filosofiItems as $item) {
            FilosofiLogoItem::create($item);
        }

        // Call ProdukSeeder
        $this->call(ProdukSeeder::class);

        // Call MitraSeeder
        $this->call(MitraSeeder::class);

    }
}

