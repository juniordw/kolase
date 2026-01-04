@extends('layouts.app')

@section('seo_title', 'Kebijakan Privasi | KOLASE - Konselor Laktasi Profesional')
@section('seo_description', 'Kebijakan privasi KOLASE menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda.')

@section('content')

{{-- Hero Section --}}
<section class="bg-gradient-to-br from-rose-600 via-rose-500 to-mauve text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-4xl mx-auto">
            <h1 class="font-display text-5xl md:text-6xl font-bold mb-6">Kebijakan Privasi</h1>
            <p class="text-xl text-rose-100 leading-relaxed">
                Komitmen kami dalam melindungi privasi dan data pribadi Anda
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
                    KOLASE (Konselor Laktasi Sepanjang) berkomitmen untuk melindungi privasi Anda. Kebijakan privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda saat menggunakan layanan kami.
                </p>
            </div>

            <div class="space-y-8">

                {{-- Section 1 --}}
                <div class="bg-cream-50 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">1. Informasi yang Kami Kumpulkan</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <p>Kami mengumpulkan informasi yang Anda berikan secara langsung kepada kami, termasuk:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Nama lengkap dan informasi kontak (email, nomor telepon)</li>
                            <li>Informasi medis yang relevan dengan konsultasi laktasi</li>
                            <li>Riwayat kehamilan dan menyusui</li>
                            <li>Informasi pembayaran untuk transaksi layanan</li>
                            <li>Komunikasi dengan konselor kami</li>
                        </ul>
                    </div>
                </div>

                {{-- Section 2 --}}
                <div class="bg-white border-2 border-cream-100 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">2. Penggunaan Informasi</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <p>Kami menggunakan informasi yang dikumpulkan untuk:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Memberikan layanan konsultasi laktasi yang berkualitas</li>
                            <li>Berkomunikasi dengan Anda tentang janji temu dan layanan</li>
                            <li>Memproses pembayaran dan transaksi</li>
                            <li>Meningkatkan kualitas layanan kami</li>
                            <li>Mengirimkan informasi edukatif tentang laktasi (dengan persetujuan Anda)</li>
                            <li>Mematuhi kewajiban hukum dan regulasi</li>
                        </ul>
                    </div>
                </div>

                {{-- Section 3 --}}
                <div class="bg-cream-50 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">3. Keamanan Data</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <p>Kami menerapkan langkah-langkah keamanan yang sesuai untuk melindungi informasi pribadi Anda dari akses, perubahan, pengungkapan, atau penghancuran yang tidak sah, termasuk:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Enkripsi data saat transmisi dan penyimpanan</li>
                            <li>Akses terbatas hanya untuk staf yang berwenang</li>
                            <li>Pelatihan keamanan data untuk tim kami</li>
                            <li>Review keamanan sistem secara berkala</li>
                        </ul>
                    </div>
                </div>

                {{-- Section 4 --}}
                <div class="bg-white border-2 border-cream-100 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">4. Pembagian Informasi</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <p>Kami tidak menjual atau menyewakan informasi pribadi Anda kepada pihak ketiga. Kami hanya membagikan informasi Anda dalam situasi berikut:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Dengan persetujuan eksplisit dari Anda</li>
                            <li>Kepada penyedia layanan yang membantu operasional kami (dengan perjanjian kerahasiaan)</li>
                            <li>Jika diperlukan oleh hukum atau proses hukum</li>
                            <li>Untuk melindungi hak, properti, atau keselamatan KOLASE, klien, atau publik</li>
                        </ul>
                    </div>
                </div>

                {{-- Section 5 --}}
                <div class="bg-cream-50 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">5. Hak Anda</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <p>Anda memiliki hak untuk:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Mengakses informasi pribadi yang kami miliki tentang Anda</li>
                            <li>Meminta koreksi informasi yang tidak akurat</li>
                            <li>Meminta penghapusan informasi pribadi Anda (dengan pembatasan tertentu)</li>
                            <li>Menolak pemrosesan data pribadi Anda untuk tujuan tertentu</li>
                            <li>Menarik persetujuan Anda kapan saja</li>
                        </ul>
                    </div>
                </div>

                {{-- Section 6 --}}
                <div class="bg-white border-2 border-cream-100 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">6. Cookies dan Teknologi Pelacakan</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <p>Website kami menggunakan cookies dan teknologi serupa untuk meningkatkan pengalaman pengguna. Anda dapat mengatur browser Anda untuk menolak cookies, namun beberapa fitur website mungkin tidak berfungsi dengan baik.</p>
                    </div>
                </div>

                {{-- Section 7 --}}
                <div class="bg-cream-50 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">7. Penyimpanan Data</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <p>Kami menyimpan informasi pribadi Anda selama diperlukan untuk memberikan layanan dan mematuhi kewajiban hukum kami. Data medis disimpan sesuai dengan standar praktik profesional dan peraturan yang berlaku.</p>
                    </div>
                </div>

                {{-- Section 8 --}}
                <div class="bg-white border-2 border-cream-100 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">8. Perubahan Kebijakan</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <p>Kami dapat memperbarui kebijakan privasi ini dari waktu ke waktu. Perubahan akan diberitahukan melalui website kami dan/atau email. Penggunaan layanan kami setelah perubahan berarti Anda menerima kebijakan yang diperbarui.</p>
                    </div>
                </div>

                {{-- Contact Section --}}
                <div class="bg-gradient-to-r from-rose-50 to-cream-100 rounded-2xl p-8">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">9. Hubungi Kami</h2>
                    <div class="space-y-4 text-mauve-dark">
                        <p>Jika Anda memiliki pertanyaan tentang kebijakan privasi ini atau ingin menggunakan hak Anda, silakan hubungi kami:</p>
                        <div class="space-y-2 mt-4">
                            <p><strong>Email:</strong> privacy@kolase.id</p>
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
        <h2 class="font-display text-3xl md:text-4xl font-bold mb-4">Privasi Anda Adalah Prioritas Kami</h2>
        <p class="text-xl text-rose-100 mb-8">Konsultasi dengan aman dan nyaman</p>
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
