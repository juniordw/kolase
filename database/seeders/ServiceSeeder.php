<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Persiapan Menyusui (Bumil)',
                'slug' => 'persiapan-menyusui-bumil',
                'tagline' => 'Persiapan matang untuk perjalanan menyusui yang sukses',
                'short_description' => 'Layanan konseling untuk ibu hamil yang ingin mempersiapkan diri untuk menyusui. Konseling ini membantu ibu memahami proses menyusui, memeriksa kondisi payudara, dan merencanakan persalinan di fasilitas kesehatan yang mendukung ASI.',
                'full_description' => '<p>Mempersiapkan menyusui sejak masa kehamilan adalah kunci keberhasilan pemberian ASI eksklusif. Layanan Persiapan Menyusui KOLASE dirancang khusus untuk ibu hamil (trimester 2-3) yang ingin memulai perjalanan menyusui dengan percaya diri.</p><p>Konselor akan membantu Anda memahami anatomi payudara, proses produksi ASI, dan apa yang diharapkan di hari-hari pertama setelah melahirkan. Kami juga akan membahas tantangan umum yang mungkin dihadapi dan cara mengatasinya.</p>',
                'features' => [
                    'Cek Payudara - Pemeriksaan kondisi payudara dan puting untuk mengidentifikasi potensi tantangan menyusui (puting datar, inverted, dll)',
                    'Materi Dasar Menyusui - Edukasi komprehensif tentang mekanisme menyusui, posisi, pelekatan, dan tanda bayi cukup ASI',
                    'Tantangan Awal Menyusui - Pembahasan masalah umum di minggu pertama dan cara mengatasinya',
                    'Memilih Faskes dan Nakes Pro-ASI - Panduan memilih rumah sakit/bidan yang mendukung IMD dan rawat gabung'
                ],
                'target_clients' => [
                    'Ibu hamil trimester 2-3',
                    'Ibu hamil dengan kondisi puting khusus (datar/inverted)',
                    'Ibu hamil yang pernah gagal menyusui sebelumnya',
                    'Calon ibu yang ingin informasi lengkap'
                ],
                'cases_handled' => null,
                'duration_minutes' => 75,
                'price' => null,
                'price_note' => 'Hubungi untuk info harga',
                'icon' => '🤰',
                'image' => null,
                'available_types' => ['home_visit', 'clinic', 'online'],
                'is_active' => true,
                'is_featured' => false,
                'badge' => null,
                'badge_color' => null,
                'launch_date' => null,
                'seo_title' => 'Persiapan Menyusui untuk Ibu Hamil | KOLASE',
                'seo_description' => 'Layanan konseling persiapan menyusui untuk ibu hamil. Cek payudara, edukasi dasar menyusui, dan persiapan matang untuk kesuksesan ASI eksklusif.',
                'seo_keywords' => 'persiapan menyusui, konseling ibu hamil, prenatal breastfeeding, cek payudara sebelum melahirkan, edukasi menyusui',
                'sort_order' => 1,
            ],
            [
                'name' => 'Menyusui Newborn',
                'slug' => 'menyusui-newborn',
                'tagline' => 'Pendampingan di momen-momen krusial awal menyusui',
                'short_description' => 'Layanan pendampingan untuk ibu dengan bayi baru lahir (0-28 hari) yang membutuhkan bantuan memulai dan memantapkan proses menyusui di hari-hari pertama yang krusial.',
                'full_description' => '<p>Hari-hari pertama setelah melahirkan adalah periode emas untuk membangun fondasi menyusui yang kuat. Sayangnya, banyak ibu menghadapi tantangan di masa ini tanpa dukungan yang memadai.</p><p>Layanan Menyusui Newborn KOLASE hadir untuk mendampingi Anda langsung setelah melahirkan - bahkan kami bisa hadir di rumah sakit! Konselor akan memastikan bayi dapat menyusu dengan efektif dan ibu merasa nyaman serta percaya diri.</p>',
                'features' => [
                    'Pendampingan Pasca Lahiran di Faskes - Kunjungan ke rumah sakit/klinik untuk membantu inisiasi menyusui dini',
                    'Cek Kondisi Mulut Bayi - Pemeriksaan oral (lidah, langit-langit, lip tie, tongue tie) yang dapat mempengaruhi pelekatan',
                    'Cek Posisi Pelekatan - Evaluasi dan koreksi posisi menyusui untuk kenyamanan dan efektivitas transfer ASI',
                    'Menstimulasi Payudara - Teknik stimulasi untuk membantu produksi ASI (hand expression, power pumping guidance)'
                ],
                'target_clients' => [
                    'Ibu dengan bayi baru lahir (0-28 hari)',
                    'Ibu yang baru pulang dari RS dan kesulitan menyusui',
                    'Ibu yang bayinya prematur/BBLR',
                    'Ibu yang mengalami flat/inverted nipple'
                ],
                'cases_handled' => null,
                'duration_minutes' => 105,
                'price' => null,
                'price_note' => 'Hubungi untuk info harga',
                'icon' => '👶',
                'image' => null,
                'available_types' => ['home_visit', 'clinic'],
                'is_active' => true,
                'is_featured' => false,
                'badge' => 'Populer',
                'badge_color' => 'rose',
                'launch_date' => null,
                'seo_title' => 'Konseling Menyusui Bayi Baru Lahir (Newborn) | KOLASE',
                'seo_description' => 'Pendampingan menyusui untuk bayi baru lahir 0-28 hari. Cek pelekatan, tongue tie, dan stimulasi ASI dengan konselor berpengalaman.',
                'seo_keywords' => 'menyusui bayi baru lahir, newborn breastfeeding, pendampingan menyusui, posisi pelekatan ASI, tongue tie check',
                'sort_order' => 2,
            ],
            [
                'name' => 'Payudara Sakit',
                'slug' => 'payudara-sakit',
                'tagline' => 'Solusi cepat untuk masalah payudara saat menyusui',
                'short_description' => 'Layanan penanganan berbagai masalah payudara yang dialami ibu menyusui, dari puting lecet hingga mastitis, dengan pendekatan minim nyeri menggunakan protokol ABM (Academy of Breastfeeding Medicine).',
                'full_description' => '<p>Masalah payudara adalah salah satu alasan utama ibu berhenti menyusui. Padahal, dengan penanganan yang tepat dan cepat, sebagian besar masalah dapat diatasi tanpa harus menyapih.</p><p>KOLASE menggunakan pendekatan evidence-based dengan protokol ABM yang terbukti efektif dan minim nyeri. Kami percaya bahwa penanganan masalah payudara tidak harus menyakitkan!</p>',
                'features' => [
                    'Cek Payudara - Pemeriksaan menyeluruh untuk menentukan diagnosis dan rencana penanganan',
                    'Pijat Laktasi Minim Nyeri - Teknik pijat lembut untuk melancarkan saluran tanpa trauma',
                    'Protokol ABM - Penerapan standar internasional Academy of Breastfeeding Medicine'
                ],
                'target_clients' => [
                    'Ibu dengan puting lecet/luka',
                    'Ibu dengan payudara bengkak keras',
                    'Ibu dengan benjolan/saluran tersumbat',
                    'Ibu dengan gejala mastitis (demam, nyeri, kemerahan)',
                    'Ibu dengan produksi ASI tidak seimbang'
                ],
                'cases_handled' => [
                    'Puting Lecet - Luka/pecah-pecah pada puting akibat pelekatan kurang tepat',
                    'Bengkak, Tersumbat, & Mastitis - Dari engorgement ringan hingga infeksi yang memerlukan kolaborasi dengan dokter',
                    'ASI Seret atau Hiperlaktasi - Produksi ASI terlalu sedikit atau berlebihan'
                ],
                'duration_minutes' => 75,
                'price' => null,
                'price_note' => 'Hubungi untuk info harga',
                'icon' => '💊',
                'image' => null,
                'available_types' => ['home_visit', 'clinic'],
                'is_active' => true,
                'is_featured' => false,
                'badge' => 'Same Day',
                'badge_color' => 'blue',
                'launch_date' => null,
                'seo_title' => 'Penanganan Payudara Sakit Saat Menyusui | KOLASE',
                'seo_description' => 'Penanganan puting lecet, mastitis, payudara bengkak dengan protokol ABM. Pijat laktasi minim nyeri oleh konselor berpengalaman.',
                'seo_keywords' => 'payudara sakit menyusui, puting lecet, mastitis, saluran ASI tersumbat, pijat laktasi, engorgement',
                'sort_order' => 3,
            ],
            [
                'name' => 'Pumping',
                'slug' => 'pumping',
                'tagline' => 'Manajemen ASI perah untuk ibu aktif',
                'short_description' => 'Layanan edukasi dan konsultasi seputar penggunaan pompa ASI, manajemen ASI perah, dan persiapan kembali bekerja bagi ibu menyusui.',
                'full_description' => '<p>Menyusui tidak harus berhenti ketika ibu kembali bekerja. Dengan manajemen yang tepat, ibu tetap bisa memberikan ASI eksklusif melalui ASI perah.</p><p>Layanan Pumping KOLASE membantu ibu memahami seluk-beluk pumping, dari pemilihan pompa yang tepat, teknik pumping efektif, hingga penyimpanan dan pemberian ASI perah. Kami juga membantu ibu yang tidak bekerja namun membutuhkan stok ASI untuk keperluan tertentu.</p>',
                'features' => [
                    'Manajemen ASI Perah - Panduan lengkap penyimpanan, pelabelan, dan pemberian ASIP (suhu, wadah, durasi)',
                    'Penggunaan Pumping - Edukasi pemilihan pompa (manual/elektrik/hospital grade), fitting flange, dan perawatan',
                    'Tantangan Menggunakan Pumping - Solusi untuk masalah umum (output sedikit, nipple pain, pump aversion)',
                    'Persiapan Ibu Bekerja maupun Tidak Bekerja - Strategi membangun stok sebelum cuti habis, jadwal pumping di kantor'
                ],
                'target_clients' => [
                    'Ibu yang akan kembali bekerja',
                    'Ibu yang bayinya di NICU/perlu ASIP',
                    'Ibu yang ingin membangun stok ASI',
                    'Ibu yang kesulitan dengan pumping'
                ],
                'cases_handled' => null,
                'duration_minutes' => 75,
                'price' => null,
                'price_note' => 'Hubungi untuk info harga',
                'icon' => '🍼',
                'image' => null,
                'available_types' => ['home_visit', 'clinic', 'online'],
                'is_active' => true,
                'is_featured' => false,
                'badge' => null,
                'badge_color' => null,
                'launch_date' => null,
                'seo_title' => 'Konsultasi Pumping ASI & Manajemen ASIP | KOLASE',
                'seo_description' => 'Konsultasi pumping ASI untuk ibu bekerja. Panduan pompa ASI, manajemen ASIP, dan strategi membangun stok ASI eksklusif.',
                'seo_keywords' => 'pumping ASI, manajemen ASI perah, ibu bekerja menyusui, cara pumping efektif, stok ASI, ASIP',
                'sort_order' => 4,
            ],
            [
                'name' => 'Relaktasi',
                'slug' => 'relaktasi',
                'tagline' => 'Tidak ada kata terlambat untuk kembali menyusui',
                'short_description' => 'Program intensif untuk ibu yang ingin kembali menyusui setelah sempat berhenti atau mengurangi pemberian ASI, dengan pendampingan bertahap 2-3 kali sesi.',
                'full_description' => '<p>Relaktasi adalah proses membangun kembali produksi ASI setelah sempat menurun drastis atau berhenti sama sekali. Meskipun menantang, relaktasi BISA berhasil dengan pendekatan yang tepat dan komitmen yang kuat.</p><p>KOLASE menawarkan program relaktasi terstruktur dengan pendampingan intensif. Kami akan membantu Anda memahami kondisi saat ini, membuat target realistis, dan mendampingi prosesnya langkah demi langkah.</p>',
                'features' => [
                    'Cek Oromotor - Pemeriksaan fungsi oral bayi untuk memastikan kemampuan menyusu langsung',
                    'Cek Kebutuhan ASI - Kalkulasi kebutuhan ASI bayi berdasarkan usia dan berat badan',
                    'Pendampingan 2-3x Layanan - Sesi bertahap untuk monitoring progress dan penyesuaian strategi (Sesi 1: Assessment lengkap dan rencana, Sesi 2: Evaluasi progress, Sesi 3: Fine-tuning dan transisi)'
                ],
                'target_clients' => [
                    'Ibu yang bayinya sudah terbiasa susu formula',
                    'Ibu yang produksi ASI-nya drop drastis',
                    'Ibu yang ingin induced lactation (adopsi)',
                    'Ibu yang terpaksa pisah dari bayi dalam waktu lama'
                ],
                'cases_handled' => null,
                'duration_minutes' => 105,
                'price' => null,
                'price_note' => 'Paket 2-3 sesi, hubungi untuk info',
                'icon' => '🔄',
                'image' => null,
                'available_types' => ['home_visit', 'clinic'],
                'is_active' => true,
                'is_featured' => false,
                'badge' => null,
                'badge_color' => null,
                'launch_date' => null,
                'seo_title' => 'Program Relaktasi - Kembali Menyusui | KOLASE',
                'seo_description' => 'Program relaktasi intensif dengan pendampingan 2-3 sesi. Solusi untuk kembali menyusui dan membangun produksi ASI kembali.',
                'seo_keywords' => 'relaktasi, kembali menyusui, induced lactation, ASI kembali, bayi menolak payudara',
                'sort_order' => 5,
            ],
            [
                'name' => 'Pijat Laktasi',
                'slug' => 'pijat-laktasi',
                'tagline' => 'Rileksasi dan lancarkan ASI dengan sentuhan lembut',
                'short_description' => 'Layanan pijat payudara khusus untuk ibu menyusui menggunakan teknik gentle massage dan aromaterapi untuk melancarkan ASI dan memberikan relaksasi.',
                'full_description' => '<p>Pijat laktasi bukan hanya untuk mengatasi masalah - ini juga self-care yang layak didapatkan setiap ibu menyusui! Dengan teknik pijat yang lembut (BUKAN pijat keras yang menyakitkan), kami membantu melancarkan aliran ASI sekaligus memberikan momen relaksasi.</p><p>KOLASE menggunakan teknik gentle massage yang terbukti efektif dan nyaman. Kami juga menyediakan aromatic oil GRATIS sebagai bagian dari layanan untuk pengalaman yang lebih menyenangkan.</p>',
                'features' => [
                    'Cek Kondisi Payudara - Pemeriksaan sebelum pijat untuk memastikan tidak ada kontraindikasi',
                    'Gentle Massage - Pijat lembut dengan teknik yang sudah teruji, TANPA rasa sakit',
                    'Free Aromatic Oil - Minyak aromaterapi (food grade, aman untuk ibu menyusui) sebagai bonus'
                ],
                'target_clients' => [
                    'Semua ibu menyusui yang ingin self-care',
                    'Ibu dengan ASI tidak lancar',
                    'Ibu yang sering stress/tegang',
                    'Ibu pasca penanganan mastitis (maintenance)'
                ],
                'cases_handled' => null,
                'duration_minutes' => 52,
                'price' => null,
                'price_note' => 'Hubungi untuk info harga',
                'icon' => '💆‍♀️',
                'image' => null,
                'available_types' => ['home_visit', 'clinic'],
                'is_active' => true,
                'is_featured' => false,
                'badge' => null,
                'badge_color' => null,
                'launch_date' => null,
                'seo_title' => 'Pijat Laktasi Gentle Massage dengan Aromaterapi | KOLASE',
                'seo_description' => 'Pijat laktasi gentle massage untuk melancarkan ASI dan relaksasi. Free aromatic oil, teknik lembut tanpa sakit.',
                'seo_keywords' => 'pijat laktasi, pijat payudara menyusui, breast massage, ASI lancar, relaksasi ibu menyusui',
                'sort_order' => 6,
            ],
            [
                'name' => 'Rawat Inap Relaktasi',
                'slug' => 'rawat-inap-relaktasi',
                'tagline' => 'Program intensif 24 jam untuk kesuksesan relaktasi',
                'short_description' => 'Program rawat inap dengan pendampingan konselor menyusui 24 jam penuh untuk proses relaktasi atau kasus menyusui kompleks. Tersedia dalam paket harian atau mingguan. Launching Maret 2026!',
                'full_description' => '<p>Rawat Inap Relaktasi adalah program EKSKLUSIF dan PERTAMA dari KOLASE - pendampingan intensif 24 jam untuk kasus-kasus yang membutuhkan perhatian penuh.</p><p>Program ini cocok untuk: Relaktasi yang membutuhkan monitoring ketat, Kasus menyusui kompleks yang tidak bisa diselesaikan dalam 1-2 sesi, Ibu yang membutuhkan dukungan penuh tanpa distraksi rumah tangga.</p><p>Selama program, ibu dan bayi akan tinggal di tempat yang nyaman dengan konselor yang siap mendampingi kapan saja - siang maupun malam. Kami memastikan setiap momen menyusui didampingi dan setiap masalah ditangani segera.</p>',
                'features' => [
                    'Pendampingan 24 Jam - Konselor standby round-the-clock',
                    'Assessment Komprehensif - Evaluasi menyeluruh di awal program',
                    'Monitoring Menyusui - Setiap sesi menyusui didampingi',
                    'Edukasi Intensif - Materi lengkap untuk kemandirian setelah program',
                    'Dokumentasi Progress - Catatan detail untuk follow-up',
                    'Paket Tersedia: 1 Hari (24 Jam), 3 Hari, 7 Hari (1 Minggu)'
                ],
                'target_clients' => [
                    'Ibu dengan kasus relaktasi berat',
                    'Ibu dengan bayi yang bingung puting parah',
                    'Ibu dengan produksi ASI sangat rendah',
                    'Ibu yang membutuhkan fokus penuh tanpa distraksi'
                ],
                'cases_handled' => null,
                'duration_minutes' => 1440,
                'price' => null,
                'price_note' => 'Paket mulai 1 hari, hubungi untuk reservasi',
                'icon' => '🏥',
                'image' => null,
                'available_types' => ['clinic'],
                'is_active' => false,
                'is_featured' => true,
                'badge' => 'Coming Soon',
                'badge_color' => 'amber',
                'launch_date' => '2026-03-01',
                'seo_title' => 'Rawat Inap Relaktasi Program Intensif 24 Jam | KOLASE',
                'seo_description' => 'Program rawat inap relaktasi dengan pendampingan konselor 24 jam. Paket 1 hari, 3 hari, atau 1 minggu untuk kesuksesan menyusui. Launching Maret 2026.',
                'seo_keywords' => 'rawat inap relaktasi, program menyusui intensif, pendampingan 24 jam menyusui, lactation inpatient program',
                'sort_order' => 7,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
