@extends('layouts.app')

@section('seo_title', 'Hubungi Kami | KOLASE - Konselor Laktasi Profesional')
@section('seo_description', 'Hubungi KOLASE untuk konsultasi laktasi profesional. Kami siap membantu perjalanan menyusui Anda.')

@section('content')

{{-- Hero Section --}}
<section class="bg-gradient-to-br from-rose-600 via-rose-500 to-mauve text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-4xl mx-auto">
            <h1 class="font-display text-5xl md:text-6xl font-bold mb-6">Hubungi Kami</h1>
            <p class="text-xl text-rose-100 leading-relaxed">
                Ada pertanyaan? Ingin berkonsultasi? Kami siap membantu Anda
            </p>
        </div>
    </div>
</section>

{{-- Contact Info & Form --}}
<section class="py-16 bg-cream-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12">

            {{-- Contact Information --}}
            <div>
                <h2 class="font-display text-3xl font-bold text-brown-700 mb-8">Informasi Kontak</h2>

                <div class="space-y-6">
                    {{-- WhatsApp --}}
                    <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition">
                        <div class="flex items-start gap-4">
                            <div class="bg-[#25D366] text-white p-3 rounded-xl">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-brown-700 mb-2">WhatsApp</h3>
                                <p class="text-mauve-dark mb-3">Respon cepat untuk pertanyaan mendesak</p>
                                <a href="https://wa.me/6289560622054?text=Halo%20KOLASE%2C%20saya%20ingin%20konsultasi"
                                   target="_blank"
                                   class="inline-flex items-center text-[#25D366] hover:text-[#20ba5a] font-semibold">
                                    <span class="mr-2">Chat Sekarang</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Phone --}}
                    <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition">
                        <div class="flex items-start gap-4">
                            <div class="bg-rose-500 text-white p-3 rounded-xl">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-brown-700 mb-2">Telepon</h3>
                                <p class="text-mauve-dark mb-1">+62 895-6062-2054</p>
                                <p class="text-sm text-mauve">Senin - Sabtu: 08:00 - 20:00 WIB</p>
                            </div>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition">
                        <div class="flex items-start gap-4">
                            <div class="bg-mauve text-white p-3 rounded-xl">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-brown-700 mb-2">Email</h3>
                                <p class="text-mauve-dark mb-1">konsultasi@kolase.com</p>
                                <p class="text-sm text-mauve">Respon dalam 1x24 jam</p>
                            </div>
                        </div>
                    </div>

                    {{-- Location --}}
                    <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition">
                        <div class="flex items-start gap-4">
                            <div class="bg-rose-600 text-white p-3 rounded-xl">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-brown-700 mb-2">Lokasi Layanan</h3>
                                <p class="text-mauve-dark">Cluster Heliconia, Jl. Griya Taman Asri Blk. EB No.32, Tawangsari, Sidoarjo, Jawa Timur 61257</p>
                                <p class="text-sm text-mauve mt-2">Kunjungan rumah, klinik, atau online</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Social Media --}}
                <div class="mt-8 bg-gradient-to-r from-rose-50 to-cream-100 rounded-2xl p-6">
                    <h3 class="font-bold text-brown-700 mb-4">Ikuti Kami</h3>
                    <div class="flex gap-4">
                        <a href="#" class="bg-white p-3 rounded-xl shadow-md hover:shadow-xl transition text-rose-600">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="bg-white p-3 rounded-xl shadow-md hover:shadow-xl transition text-rose-600">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="bg-white p-3 rounded-xl shadow-md hover:shadow-xl transition text-rose-600">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Contact Form --}}
            <div>
                <h2 class="font-display text-3xl font-bold text-brown-700 mb-8">Kirim Pesan</h2>

                <form method="POST" action="{{ route('contact.store') }}" class="bg-white rounded-3xl p-8 shadow-xl">
                    @csrf

                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-brown-700 mb-2">Nama Lengkap *</label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   required
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-rose-500 focus:ring-0 transition">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-brown-700 mb-2">Email *</label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   required
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-rose-500 focus:ring-0 transition">
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-semibold text-brown-700 mb-2">Nomor Telepon *</label>
                            <input type="tel"
                                   id="phone"
                                   name="phone"
                                   required
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-rose-500 focus:ring-0 transition">
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-semibold text-brown-700 mb-2">Subjek</label>
                            <input type="text"
                                   id="subject"
                                   name="subject"
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-rose-500 focus:ring-0 transition">
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-semibold text-brown-700 mb-2">Pesan *</label>
                            <textarea id="message"
                                      name="message"
                                      rows="5"
                                      required
                                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-rose-500 focus:ring-0 transition"></textarea>
                        </div>

                        <button type="submit"
                                class="w-full bg-gradient-to-r from-rose-500 to-rose-600 text-white font-bold py-4 px-6 rounded-xl hover:from-rose-600 hover:to-rose-700 transition shadow-lg hover:shadow-xl">
                            Kirim Pesan
                        </button>
                    </div>
                </form>

                <div class="mt-6 bg-rose-50 rounded-xl p-6 border-2 border-rose-200">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-rose-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-sm text-mauve-dark">
                            <strong class="text-brown-700">Butuh respon cepat?</strong><br>
                            Untuk pertanyaan mendesak, kami sarankan hubungi melalui WhatsApp untuk respon lebih cepat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Map Section --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">Lokasi Kami</h2>
            <p class="text-mauve-dark">Area layanan kami di Sidoarjo dan sekitarnya</p>
        </div>

        <div class="rounded-3xl overflow-hidden shadow-2xl">
            {{-- Google Maps Embed --}}
            {{-- TO UPDATE: Get embed code from https://maps.app.goo.gl/dWWhvFu796HURtdVA --}}
            {{-- 1. Open link in browser --}}
            {{-- 2. Click "Share" button > "Embed a map" --}}
            {{-- 3. Copy iframe code and replace below --}}
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.0942735668437!2d112.71378007501896!3d-7.382899492621895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e46e2e8d84eb%3A0x8d0a9e6a0e6a9e6a!2sCluster%20Heliconia%2C%20Griya%20Taman%20Asri!5e0!3m2!1sid!2sid!4v1704400000000!5m2!1sid!2sid"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

{{-- FAQ Quick Section --}}
<section class="py-16 bg-cream-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="font-display text-3xl font-bold text-brown-700 mb-4">Pertanyaan Yang Sering Diajukan</h2>
        </div>

        <div class="space-y-4">
            <div class="bg-white rounded-xl p-6 shadow-md">
                <h4 class="font-bold text-brown-700 mb-2">Berapa lama durasi konsultasi?</h4>
                <p class="text-mauve-dark">Rata-rata 60-120 menit, tergantung kebutuhan. Kami tidak memburu waktu untuk memastikan semua kekhawatiran Anda teratasi.</p>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-md">
                <h4 class="font-bold text-brown-700 mb-2">Apakah ada layanan home visit?</h4>
                <p class="text-mauve-dark">Ya, kami menyediakan layanan kunjungan rumah untuk area Yogyakarta dan sekitarnya. Cocok untuk ibu yang baru melahirkan atau kesulitan mobilitas.</p>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-md">
                <h4 class="font-bold text-brown-700 mb-2">Bagaimana cara booking konsultasi?</h4>
                <p class="text-mauve-dark">Anda bisa booking melalui website, WhatsApp, atau telepon langsung. Tim kami akan konfirmasi jadwal dalam 1x24 jam.</p>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-md">
                <h4 class="font-bold text-brown-700 mb-2">Apakah konselor bersertifikat?</h4>
                <p class="text-mauve-dark">Ya, semua konselor kami memiliki sertifikasi laktasi internasional dan terus mengupdate pengetahuan melalui pelatihan berkala.</p>
            </div>
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('faq') }}" class="inline-flex items-center text-rose-600 hover:text-rose-700 font-semibold">
                Lihat Semua FAQ
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

@endsection
