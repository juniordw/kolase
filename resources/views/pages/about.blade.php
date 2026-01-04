@extends('layouts.app')

@section('seo_title', 'Tentang Kami | KOLASE - Konselor Laktasi Profesional')
@section('seo_description', 'KOLASE adalah layanan konseling laktasi profesional yang membantu ibu menyusui dengan konselor laktasi bersertifikat dan berpengalaman.')

@section('content')

{{-- Hero Section --}}
<section class="bg-gradient-to-br from-rose-600 via-rose-500 to-mauve text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-4xl mx-auto">
            <h1 class="font-display text-5xl md:text-6xl font-bold mb-6">Tentang KOLASE</h1>
            <p class="text-xl text-rose-100 leading-relaxed">
                Konselor Laktasi Sepanjang - Mendampingi perjalanan menyusui Anda dengan penuh kasih sayang dan profesional
            </p>
        </div>
    </div>
</section>

{{-- Our Story --}}
<section class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="bg-gradient-to-br from-rose-100 to-rose-200 rounded-3xl aspect-square flex items-center justify-center text-9xl">
                🤱
            </div>
            <div>
                <h2 class="font-display text-4xl font-bold text-brown-700 mb-6">Cerita Kami</h2>
                <div class="space-y-4 text-lg text-mauve-dark leading-relaxed">
                    <p>
                        KOLASE (Konselor Laktasi Sepanjang) lahir dari kepedulian mendalam terhadap kesejahteraan ibu dan bayi. Kami memahami bahwa perjalanan menyusui setiap ibu adalah unik dan penuh tantangan.
                    </p>
                    <p>
                        Dengan tim konselor laktasi bersertifikat dan berpengalaman, kami berkomitmen untuk memberikan dukungan profesional, penuh empati, dan berbasis evidens kepada setiap ibu yang mempercayakan perjalanan menyusuinya kepada kami.
                    </p>
                    <p>
                        Nama "Sepanjang" mencerminkan komitmen kami untuk mendampingi Anda di setiap tahap perjalanan menyusui - dari persiapan sejak kehamilan hingga menyusui berkelanjutan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Our Values --}}
<section class="py-16 bg-cream-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="font-display text-4xl font-bold text-brown-700 mb-4">Nilai-Nilai Kami</h2>
            <p class="text-xl text-mauve-dark">Prinsip yang memandu setiap layanan kami</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl p-8 shadow-md hover:shadow-xl transition">
                <div class="text-6xl mb-4">💖</div>
                <h3 class="font-display text-2xl font-bold text-brown-700 mb-4">Empati & Kasih Sayang</h3>
                <p class="text-mauve-dark leading-relaxed">
                    Kami memahami bahwa setiap ibu memiliki cerita dan kebutuhan yang unik. Pendekatan kami selalu penuh empati dan tanpa judgment.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-md hover:shadow-xl transition">
                <div class="text-6xl mb-4">📚</div>
                <h3 class="font-display text-2xl font-bold text-brown-700 mb-4">Evidence-Based</h3>
                <p class="text-mauve-dark leading-relaxed">
                    Semua rekomendasi kami berdasarkan penelitian ilmiah terkini dan best practice internasional dalam laktasi.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-md hover:shadow-xl transition">
                <div class="text-6xl mb-4">🎯</div>
                <h3 class="font-display text-2xl font-bold text-brown-700 mb-4">Personal & Holistic</h3>
                <p class="text-mauve-dark leading-relaxed">
                    Kami melihat setiap klien secara menyeluruh - fisik, emosional, dan sosial - untuk solusi yang tepat sasaran.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Team Section --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="font-display text-4xl font-bold text-brown-700 mb-4">Tim Konselor Kami</h2>
            <p class="text-xl text-mauve-dark">Konselor laktasi bersertifikat dan berpengalaman</p>
        </div>

        <div class="max-w-3xl mx-auto bg-gradient-to-r from-rose-50 to-cream-100 rounded-3xl p-8 text-center">
            <div class="text-6xl mb-4">👩‍⚕️</div>
            <p class="text-lg text-mauve-dark leading-relaxed">
                Tim kami terdiri dari konselor laktasi bersertifikat yang telah membantu ratusan ibu dalam perjalanan menyusui mereka. Dengan kombinasi pengetahuan medis, pengalaman klinis, dan kepekaan emosional, kami siap mendampingi Anda.
            </p>
        </div>
    </div>
</section>

{{-- Why Choose Us --}}
<section class="py-16 bg-cream-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="font-display text-4xl font-bold text-brown-700 mb-4">Mengapa Memilih KOLASE?</h2>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-white rounded-xl p-6 shadow-md flex items-start gap-4">
                <div class="text-4xl">✅</div>
                <div>
                    <h4 class="font-bold text-brown-700 mb-2">Konselor Bersertifikat</h4>
                    <p class="text-sm text-mauve-dark">Semua konselor kami memiliki sertifikasi internasional dan terus mengupdate pengetahuan</p>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-md flex items-start gap-4">
                <div class="text-4xl">🏡</div>
                <div>
                    <h4 class="font-bold text-brown-700 mb-2">Layanan Fleksibel</h4>
                    <p class="text-sm text-mauve-dark">Kunjungan rumah, klinik, atau online - sesuai kebutuhan dan kenyamanan Anda</p>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-md flex items-start gap-4">
                <div class="text-4xl">💬</div>
                <div>
                    <h4 class="font-bold text-brown-700 mb-2">Konsultasi Komprehensif</h4>
                    <p class="text-sm text-mauve-dark">Tidak terburu-buru, kami luangkan waktu untuk memahami situasi Anda sepenuhnya</p>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-md flex items-start gap-4">
                <div class="text-4xl">🔄</div>
                <div>
                    <h4 class="font-bold text-brown-700 mb-2">Follow-Up Support</h4>
                    <p class="text-sm text-mauve-dark">Dukungan berkelanjutan melalui chat untuk memastikan kesuksesan menyusui Anda</p>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-md flex items-start gap-4">
                <div class="text-4xl">📱</div>
                <div>
                    <h4 class="font-bold text-brown-700 mb-2">Respon Cepat</h4>
                    <p class="text-sm text-mauve-dark">Tim kami responsif dan siap membantu saat Anda membutuhkan</p>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-md flex items-start gap-4">
                <div class="text-4xl">🌟</div>
                <div>
                    <h4 class="font-bold text-brown-700 mb-2">Testimoni Positif</h4>
                    <p class="text-sm text-mauve-dark">Ratusan ibu telah mempercayakan perjalanan menyusui mereka kepada kami</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="py-16 bg-gradient-to-r from-rose-500 to-rose-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-display text-3xl md:text-4xl font-bold mb-4">Siap Memulai Perjalanan Menyusui yang Lebih Baik?</h2>
        <p class="text-xl text-rose-100 mb-8">Hubungi kami hari ini untuk konsultasi</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('booking') }}"
               class="inline-flex items-center justify-center px-8 py-4 bg-white text-rose-600 font-bold rounded-xl hover:bg-rose-50 transition shadow-xl">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Jadwalkan Konsultasi
            </a>
            <a href="https://wa.me/6289560622054?text=Halo%20KOLASE%2C%20saya%20ingin%20konsultasi"
               target="_blank"
               class="inline-flex items-center justify-center px-8 py-4 bg-[#25D366] text-white font-bold rounded-xl hover:bg-[#20ba5a] transition">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                Hubungi via WhatsApp
            </a>
        </div>
    </div>
</section>

@endsection
