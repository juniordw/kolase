@extends('layouts.app')

@section('seo_title', 'Syarat & Ketentuan | KOLASE - Konselor Laktasi Profesional')
@section('seo_description', 'Syarat dan ketentuan penggunaan layanan konsultasi laktasi KOLASE.')

@section('content')

{{-- Hero Section --}}
<section class="bg-gradient-to-br from-rose-600 via-rose-500 to-mauve text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-4xl mx-auto">
            <h1 class="font-display text-5xl md:text-6xl font-bold mb-6">Syarat & Ketentuan</h1>
            <p class="text-xl text-rose-100 leading-relaxed">
                Ketentuan penggunaan layanan konsultasi laktasi KOLASE
            </p>
        </div>
    </div>
</section>

{{-- Content Section --}}
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="prose prose-lg max-w-none">

            <div class="mb-8">
                <p class="text-mauve-dark leading-relaxed">
                    Terakhir diperbarui: {{ date('d F Y') }}
                </p>
                <p class="text-mauve-dark leading-relaxed mt-4">
                    Selamat datang di KOLASE (Konselor Laktasi Sepanjang). Dengan menggunakan layanan kami, Anda menyetujui syarat dan ketentuan berikut. Harap baca dengan seksama sebelum menggunakan layanan kami.
                </p>
            </div>

            <div class="space-y-8">

                {{-- Section 1 --}}
                <div class="bg-cream-50 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">1. Penerimaan Ketentuan</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <p>Dengan mengakses dan menggunakan layanan KOLASE, Anda menyetujui untuk terikat dengan syarat dan ketentuan ini. Jika Anda tidak setuju dengan bagian manapun dari ketentuan ini, Anda tidak boleh menggunakan layanan kami.</p>
                    </div>
                </div>

                {{-- Section 2 --}}
                <div class="bg-white border-2 border-cream-100 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">2. Layanan yang Disediakan</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <p>KOLASE menyediakan layanan konsultasi laktasi profesional, termasuk namun tidak terbatas pada:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Konsultasi laktasi via kunjungan rumah, klinik, atau online</li>
                            <li>Edukasi dan dukungan menyusui</li>
                            <li>Asesmen dan penanganan masalah laktasi</li>
                            <li>Follow-up dan dukungan berkelanjutan</li>
                        </ul>
                        <p class="mt-4"><strong>Penting:</strong> Layanan kami tidak menggantikan perawatan medis. Untuk kondisi medis serius, kami akan merekomendasikan rujukan ke tenaga kesehatan yang sesuai.</p>
                    </div>
                </div>

                {{-- Section 3 --}}
                <div class="bg-cream-50 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">3. Janji Temu dan Pembatalan</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <h3 class="font-bold text-lg text-brown-700">Pemesanan:</h3>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Janji temu dapat dibuat melalui website, WhatsApp, atau telepon</li>
                            <li>Konfirmasi janji temu akan dikirimkan via email atau WhatsApp</li>
                            <li>Pembayaran dapat dilakukan sebelum atau setelah sesi konsultasi (sesuai kebijakan)</li>
                        </ul>

                        <h3 class="font-bold text-lg text-brown-700 mt-6">Pembatalan:</h3>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Pembatalan harus dilakukan minimal 24 jam sebelum waktu janji temu</li>
                            <li>Pembatalan kurang dari 24 jam akan dikenakan biaya pembatalan 50%</li>
                            <li>Ketidakhadiran tanpa pemberitahuan akan dikenakan biaya penuh</li>
                            <li>Penjadwalan ulang dapat dilakukan tanpa biaya tambahan jika dilakukan minimal 24 jam sebelumnya</li>
                        </ul>
                    </div>
                </div>

                {{-- Section 4 --}}
                <div class="bg-white border-2 border-cream-100 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">4. Pembayaran dan Pengembalian Dana</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <h3 class="font-bold text-lg text-brown-700">Pembayaran:</h3>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Harga layanan tercantum pada website dan dapat berubah sewaktu-waktu</li>
                            <li>Metode pembayaran yang diterima: transfer bank, e-wallet, dan kartu kredit</li>
                            <li>Bukti pembayaran harus disimpan untuk keperluan administrasi</li>
                        </ul>

                        <h3 class="font-bold text-lg text-brown-700 mt-6">Pengembalian Dana:</h3>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Pengembalian dana penuh untuk pembatalan lebih dari 24 jam</li>
                            <li>Pengembalian dana 50% untuk pembatalan kurang dari 24 jam</li>
                            <li>Tidak ada pengembalian dana untuk ketidakhadiran tanpa pemberitahuan</li>
                            <li>Proses pengembalian dana memerlukan waktu 7-14 hari kerja</li>
                        </ul>
                    </div>
                </div>

                {{-- Section 5 --}}
                <div class="bg-cream-50 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">5. Kerahasiaan dan Privasi</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <p>Kami berkomitmen untuk menjaga kerahasiaan informasi pribadi dan medis Anda:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Semua informasi konsultasi bersifat rahasia</li>
                            <li>Data hanya digunakan untuk keperluan layanan kesehatan</li>
                            <li>Informasi tidak akan dibagikan tanpa persetujuan Anda, kecuali diwajibkan oleh hukum</li>
                            <li>Lihat <a href="{{ route('privacy') }}" class="text-rose-600 hover:underline">Kebijakan Privasi</a> kami untuk informasi lebih lanjut</li>
                        </ul>
                    </div>
                </div>

                {{-- Section 6 --}}
                <div class="bg-white border-2 border-cream-100 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">6. Tanggung Jawab Klien</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <p>Sebagai klien, Anda bertanggung jawab untuk:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Memberikan informasi yang akurat dan lengkap tentang kondisi kesehatan Anda</li>
                            <li>Mengikuti rekomendasi yang diberikan oleh konselor</li>
                            <li>Menginformasikan konselor tentang perubahan kondisi atau masalah baru</li>
                            <li>Datang tepat waktu untuk janji temu</li>
                            <li>Menjaga sikap sopan dan menghormati konselor</li>
                        </ul>
                    </div>
                </div>

                {{-- Section 7 --}}
                <div class="bg-cream-50 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">7. Batasan Tanggung Jawab</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <p>KOLASE tidak bertanggung jawab atas:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Hasil konsultasi yang tidak sesuai harapan jika klien tidak mengikuti rekomendasi</li>
                            <li>Kondisi medis yang memerlukan intervensi medis di luar kompetensi konselor laktasi</li>
                            <li>Kerugian tidak langsung, insidental, atau konsekuensial dari penggunaan layanan</li>
                            <li>Gangguan layanan akibat force majeure (bencana alam, pandemi, dll.)</li>
                        </ul>
                    </div>
                </div>

                {{-- Section 8 --}}
                <div class="bg-white border-2 border-cream-100 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">8. Hak Kekayaan Intelektual</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <p>Semua konten di website dan materi edukasi KOLASE (termasuk teks, gambar, logo, video) adalah milik KOLASE dan dilindungi hak cipta. Anda tidak diperkenankan untuk:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Menyalin, memodifikasi, atau mendistribusikan konten tanpa izin tertulis</li>
                            <li>Menggunakan materi kami untuk tujuan komersial</li>
                            <li>Menghapus atau mengubah tanda hak cipta atau merek dagang</li>
                        </ul>
                    </div>
                </div>

                {{-- Section 9 --}}
                <div class="bg-cream-50 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">9. Perubahan Layanan dan Ketentuan</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <p>KOLASE berhak untuk:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Mengubah, menangguhkan, atau menghentikan layanan kapan saja</li>
                            <li>Memperbarui syarat dan ketentuan ini dari waktu ke waktu</li>
                            <li>Menolak memberikan layanan tanpa alasan tertentu</li>
                        </ul>
                        <p class="mt-4">Perubahan akan diberitahukan melalui website atau email. Penggunaan layanan setelah perubahan berarti Anda menerima ketentuan yang diperbarui.</p>
                    </div>
                </div>

                {{-- Section 10 --}}
                <div class="bg-white border-2 border-cream-100 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">10. Hukum yang Berlaku</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <p>Syarat dan ketentuan ini diatur oleh dan ditafsirkan sesuai dengan hukum Republik Indonesia. Setiap perselisihan akan diselesaikan melalui musyawarah, atau jika diperlukan, melalui pengadilan yang berwenang.</p>
                    </div>
                </div>

                {{-- Contact Section --}}
                <div class="bg-gradient-to-r from-rose-50 to-cream-100 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">11. Hubungi Kami</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <p>Jika Anda memiliki pertanyaan tentang syarat dan ketentuan ini, silakan hubungi kami:</p>
                        <div class="space-y-2 mt-4">
                            <p><strong>Email:</strong> info@kolase.id</p>
                            <p><strong>WhatsApp:</strong> +62 895-6062-2054</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

{{-- CTA Section --}}
<section class="py-16 bg-gradient-to-r from-rose-500 to-rose-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-display text-3xl md:text-4xl font-bold mb-4">Siap Memulai Konsultasi?</h2>
        <p class="text-xl text-rose-100 mb-8">Jadwalkan sesi konsultasi laktasi dengan kami</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('booking') }}"
               class="inline-flex items-center justify-center px-8 py-4 bg-white text-rose-600 font-bold rounded-xl hover:bg-rose-50 transition shadow-xl">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Jadwalkan Konsultasi
            </a>
            <a href="{{ route('home') }}"
               class="inline-flex items-center justify-center px-8 py-4 bg-rose-700 text-white font-bold rounded-xl hover:bg-rose-800 transition">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</section>

@endsection
