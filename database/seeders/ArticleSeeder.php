<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create categories
        $categories = [
            ['name' => 'Tips Menyusui', 'slug' => 'tips-menyusui', 'sort_order' => 1],
            ['name' => 'Masalah Menyusui', 'slug' => 'masalah-menyusui', 'sort_order' => 2],
            ['name' => 'ASI Eksklusif', 'slug' => 'asi-eksklusif', 'sort_order' => 3],
            ['name' => 'MPASI', 'slug' => 'mpasi', 'sort_order' => 4],
            ['name' => 'Kesehatan Ibu & Bayi', 'slug' => 'kesehatan-ibu-bayi', 'sort_order' => 5],
        ];

        foreach ($categories as $cat) {
            ArticleCategory::create($cat);
        }

        // Create tags
        $tags = [
            'newborn', 'pelekatan', 'pumping', 'nutrisi', 'tidur-bayi',
            'relaktasi', 'breastfeeding', 'mpasi', 'kesehatan', 'tips'
        ];

        foreach ($tags as $tag) {
            ArticleTag::create([
                'name' => ucfirst(str_replace('-', ' ', $tag)),
                'slug' => $tag
            ]);
        }

        // Create articles
        $articles = [
            [
                'title' => '10 Tips Sukses Menyusui untuk Ibu Baru',
                'slug' => '10-tips-sukses-menyusui-untuk-ibu-baru',
                'excerpt' => 'Panduan lengkap untuk ibu baru yang ingin sukses memberikan ASI eksklusif kepada buah hati.',
                'content' => "<h2>Persiapan Adalah Kunci</h2>\n<p>Menyusui adalah perjalanan yang indah namun tidak selalu mudah. Berikut 10 tips yang akan membantu Anda:</p>\n\n<h3>1. Inisiasi Menyusui Dini (IMD)</h3>\n<p>Segera setelah lahir, lakukan skin-to-skin contact dan biarkan bayi mencari puting sendiri. Ini membantu bonding dan produksi ASI.</p>\n\n<h3>2. Pelekatan yang Benar</h3>\n<p>Pastikan bayi membuka mulut lebar dan menghisap sebagian besar areola, bukan hanya puting.</p>\n\n<h3>3. Menyusui Sesering Mungkin</h3>\n<p>Di minggu-minggu awal, susui minimal 8-12 kali dalam 24 jam untuk merangsang produksi ASI.</p>\n\n<h3>4. Nutrisi Ibu yang Baik</h3>\n<p>Konsumsi makanan bergizi seimbang dan minum air putih minimal 2-3 liter per hari.</p>\n\n<h3>5. Istirahat Cukup</h3>\n<p>Tidur saat bayi tidur untuk menjaga energi dan produksi ASI.</p>",
                'status' => 'published',
                'published_at' => now()->subDays(5),
                'read_time_minutes' => 8,
                'views_count' => 234,
                'category_ids' => [1, 3],
                'tag_ids' => [1, 2, 7, 10]
            ],
            [
                'title' => 'Mengatasi Puting Lecet Saat Menyusui',
                'slug' => 'mengatasi-puting-lecet-saat-menyusui',
                'excerpt' => 'Puting lecet adalah masalah umum ibu menyusui. Pelajari cara mencegah dan mengatasinya.',
                'content' => "<h2>Penyebab Puting Lecet</h2>\n<p>Puting lecet biasanya disebabkan oleh:</p>\n<ul>\n<li>Pelekatan yang kurang tepat</li>\n<li>Posisi menyusui yang salah</li>\n<li>Tongue tie pada bayi</li>\n<li>Penggunaan pompa ASI yang tidak tepat</li>\n</ul>\n\n<h2>Cara Mengatasi</h2>\n<h3>1. Perbaiki Pelekatan</h3>\n<p>Konsultasikan dengan konselor laktasi untuk memastikan pelekatan yang benar.</p>\n\n<h3>2. Gunakan ASI</h3>\n<p>Oleskan ASI pada puting setelah menyusui dan biarkan kering dengan sendirinya.</p>\n\n<h3>3. Hindari Sabun</h3>\n<p>Cukup bilas dengan air hangat, hindari sabun yang dapat membuat kering.</p>",
                'status' => 'published',
                'published_at' => now()->subDays(3),
                'read_time_minutes' => 5,
                'views_count' => 189,
                'category_ids' => [2],
                'tag_ids' => [1, 2, 7]
            ],
            [
                'title' => 'ASI Eksklusif 6 Bulan: Manfaat dan Tips',
                'slug' => 'asi-eksklusif-6-bulan-manfaat-dan-tips',
                'excerpt' => 'Mengapa ASI eksklusif selama 6 bulan sangat penting? Simak manfaat dan tips suksesnya.',
                'content' => "<h2>Apa itu ASI Eksklusif?</h2>\n<p>ASI eksklusif berarti memberikan hanya ASI kepada bayi tanpa tambahan makanan atau minuman apapun (termasuk air putih) selama 6 bulan pertama kehidupan.</p>\n\n<h2>Manfaat ASI Eksklusif</h2>\n<h3>Untuk Bayi:</h3>\n<ul>\n<li>Nutrisi lengkap dan sempurna</li>\n<li>Perlindungan dari infeksi dan alergi</li>\n<li>Perkembangan otak optimal</li>\n<li>Sistem pencernaan yang sehat</li>\n</ul>\n\n<h3>Untuk Ibu:</h3>\n<ul>\n<li>Menurunkan risiko kanker payudara dan ovarium</li>\n<li>Membantu kontraksi rahim setelah melahirkan</li>\n<li>Bonding dengan bayi</li>\n<li>Hemat biaya</li>\n</ul>\n\n<h2>Tips Sukses ASI Eksklusif</h2>\n<p>1. Komitmen yang kuat\n2. Dukungan keluarga\n3. Manajemen waktu yang baik\n4. Konsultasi rutin dengan konselor laktasi</p>",
                'status' => 'published',
                'published_at' => now()->subDays(7),
                'read_time_minutes' => 10,
                'views_count' => 456,
                'category_ids' => [3],
                'tag_ids' => [4, 7, 9]
            ],
            [
                'title' => 'Cara Pumping ASI yang Efektif untuk Working Mom',
                'slug' => 'cara-pumping-asi-efektif-working-mom',
                'excerpt' => 'Panduan lengkap pumping ASI untuk ibu bekerja agar tetap bisa memberikan ASI eksklusif.',
                'content' => "<h2>Persiapan Kembali Bekerja</h2>\n<p>Sebagai working mom, Anda tetap bisa memberikan ASI eksklusif dengan pumping yang teratur.</p>\n\n<h2>Tips Pumping Efektif</h2>\n<h3>1. Mulai Latihan 2 Minggu Sebelum Bekerja</h3>\n<p>Biasakan diri dengan pompa ASI dan bangun stok ASI perah (ASIP).</p>\n\n<h3>2. Jadwal Pumping Teratur</h3>\n<p>Pumping setiap 3-4 jam sekali di tempat kerja untuk menjaga produksi ASI.</p>\n\n<h3>3. Pilih Pompa yang Tepat</h3>\n<p>Pompa elektrik double pump lebih efisien untuk working mom.</p>\n\n<h3>4. Ciptakan Suasana Rileks</h3>\n<p>Lihat foto/video bayi, dengarkan musik, atau lakukan teknik relaksasi.</p>\n\n<h2>Penyimpanan ASIP</h2>\n<ul>\n<li>Suhu ruang: 4-6 jam</li>\n<li>Cooler bag dengan ice pack: 24 jam</li>\n<li>Kulkas: 3-5 hari</li>\n<li>Freezer: 6-12 bulan</li>\n</ul>",
                'status' => 'published',
                'published_at' => now()->subDays(10),
                'read_time_minutes' => 12,
                'views_count' => 567,
                'category_ids' => [1, 3],
                'tag_ids' => [3, 7, 10]
            ],
            [
                'title' => 'Mengenali Tanda Bayi Cukup ASI',
                'slug' => 'mengenali-tanda-bayi-cukup-asi',
                'excerpt' => 'Khawatir ASI tidak cukup? Pelajari tanda-tanda bayi mendapat ASI yang cukup.',
                'content' => "<h2>Tanda Bayi Cukup ASI</h2>\n<p>Banyak ibu khawatir ASI-nya tidak cukup. Berikut tanda-tanda bayi mendapat ASI yang cukup:</p>\n\n<h3>1. Popok Basah</h3>\n<ul>\n<li>Hari 1: minimal 1 popok basah</li>\n<li>Hari 2: minimal 2 popok basah</li>\n<li>Hari 3: minimal 3 popok basah</li>\n<li>Hari 4-6: minimal 6 popok basah dengan urin jernih</li>\n</ul>\n\n<h3>2. Berat Badan Naik</h3>\n<p>Setelah turun 5-10% di minggu pertama, berat badan harus kembali ke berat lahir di hari ke-14.</p>\n\n<h3>3. Bayi Aktif dan Responsif</h3>\n<p>Bayi yang cukup ASI akan terlihat aktif saat bangun dan puas setelah menyusui.</p>\n\n<h3>4. Payudara Terasa Lebih Lunak</h3>\n<p>Payudara terasa lebih lunak setelah menyusui menandakan bayi menghisap dengan efektif.</p>\n\n<h2>Tanda yang BUKAN Indikator</h2>\n<ul>\n<li>Payudara tidak terasa penuh</li>\n<li>Bayi menyusu sebentar-sebentar</li>\n<li>Tidak bisa memompa banyak</li>\n<li>Bayi sering menangis</li>\n</ul>",
                'status' => 'published',
                'published_at' => now()->subDays(15),
                'read_time_minutes' => 7,
                'views_count' => 789,
                'category_ids' => [1, 5],
                'tag_ids' => [1, 7, 9]
            ]
        ];

        foreach ($articles as $articleData) {
            $categoryIds = $articleData['category_ids'];
            $tagIds = $articleData['tag_ids'];
            unset($articleData['category_ids'], $articleData['tag_ids']);

            $article = Article::create($articleData);
            $article->categories()->attach($categoryIds);
            $article->tags()->attach($tagIds);
        }

        echo "Created " . count($categories) . " categories\n";
        echo "Created " . count($tags) . " tags\n";
        echo "Created " . count($articles) . " articles\n";
    }
}
