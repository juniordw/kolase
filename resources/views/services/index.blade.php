@extends('layouts.app')

@section('seo_title', 'Layanan Konseling Menyusui | KOLASE')
@section('seo_description', 'Daftar lengkap layanan konseling menyusui profesional dari KOLASE. Dari persiapan menyusui, newborn, hingga relaktasi dan pijat laktasi.')
@section('seo_keywords', 'layanan konseling menyusui, konsultasi laktasi, home visit, pijat laktasi, relaktasi')

@section('content')

{{-- Hero Section --}}
<section class="bg-gradient-to-br from-rose-600 via-rose-500 to-mauve text-white py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="text-6xl mb-6">💝</div>
        <h1 class="font-display text-5xl md:text-6xl font-bold mb-6">Layanan Konseling Menyusui</h1>
        <p class="text-xl text-rose-100 max-w-3xl mx-auto leading-relaxed">
            Pilih layanan yang sesuai dengan kebutuhan Anda. Kami siap mendampingi di setiap tahap perjalanan menyusui dengan pendekatan profesional dan penuh kehangatan.
        </p>
    </div>
</section>

{{-- Services Grid Section --}}
<section class="py-20 bg-cream-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Filter Tabs (Optional) --}}
        <div class="flex flex-wrap justify-center gap-3 mb-12" x-data="{ activeFilter: 'all' }">
            <button @click="activeFilter = 'all'"
                    :class="activeFilter === 'all' ? 'bg-rose-500 text-white' : 'bg-white text-brown-700 hover:bg-rose-50'"
                    class="px-6 py-3 rounded-full font-semibold transition shadow-sm">
                Semua Layanan
            </button>
            <button @click="activeFilter = 'preparation'"
                    :class="activeFilter === 'preparation' ? 'bg-rose-500 text-white' : 'bg-white text-brown-700 hover:bg-rose-50'"
                    class="px-6 py-3 rounded-full font-semibold transition shadow-sm">
                Persiapan
            </button>
            <button @click="activeFilter = 'support'"
                    :class="activeFilter === 'support' ? 'bg-rose-500 text-white' : 'bg-white text-brown-700 hover:bg-rose-50'"
                    class="px-6 py-3 rounded-full font-semibold transition shadow-sm">
                Pendampingan
            </button>
            <button @click="activeFilter = 'treatment'"
                    :class="activeFilter === 'treatment' ? 'bg-rose-500 text-white' : 'bg-white text-brown-700 hover:bg-rose-50'"
                    class="px-6 py-3 rounded-full font-semibold transition shadow-sm">
                Perawatan
            </button>
            <button @click="activeFilter = 'special'"
                    :class="activeFilter === 'special' ? 'bg-rose-500 text-white' : 'bg-white text-brown-700 hover:bg-rose-50'"
                    class="px-6 py-3 rounded-full font-semibold transition shadow-sm">
                Program Khusus
            </button>
        </div>

        {{-- Services Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-cream-200 group">
                {{-- Header with Icon & Badge --}}
                <div class="relative bg-gradient-to-br from-rose-50 to-cream-100 p-8 text-center">
                    <div class="text-7xl mb-4 group-hover:scale-110 transition-transform duration-300">
                        {{ $service->icon }}
                    </div>

                    @if($service->badge)
                    <div class="absolute top-4 right-4">
                        <span class="px-3 py-1 text-xs font-bold rounded-full shadow-md
                            @if($service->badge_color === 'rose') bg-rose-500 text-white
                            @elseif($service->badge_color === 'amber') bg-amber-500 text-white
                            @elseif($service->badge_color === 'blue') bg-blue-500 text-white
                            @elseif($service->badge_color === 'green') bg-green-500 text-white
                            @else bg-gray-500 text-white
                            @endif">
                            {{ $service->badge }}
                        </span>
                    </div>
                    @endif
                </div>

                {{-- Content --}}
                <div class="p-8">
                    {{-- Service Name --}}
                    <h3 class="font-display text-2xl font-bold text-brown-700 mb-3 group-hover:text-rose-600 transition">
                        {{ $service->name }}
                    </h3>

                    {{-- Tagline --}}
                    @if($service->tagline)
                    <p class="font-script text-rose-600 mb-4 text-lg">{{ $service->tagline }}</p>
                    @endif

                    {{-- Short Description --}}
                    <p class="text-mauve-dark text-sm mb-6 line-clamp-3 leading-relaxed">
                        {{ $service->short_description }}
                    </p>

                    {{-- Features List --}}
                    <div class="mb-6">
                        <h4 class="text-xs font-bold text-brown-600 uppercase tracking-wide mb-3">Yang Anda Dapatkan:</h4>
                        <ul class="space-y-2">
                            @foreach(array_slice($service->features, 0, 3) as $feature)
                            <li class="flex items-start text-sm text-brown-700">
                                <svg class="w-5 h-5 text-rose-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="line-clamp-2">{{ Str::before($feature, ' - ') }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Meta Info --}}
                    <div class="flex items-center justify-between text-sm mb-6 pb-6 border-b border-cream-200">
                        <div class="flex items-center text-mauve">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $service->duration_minutes }} menit
                        </div>
                        <div class="flex gap-1">
                            @foreach($service->available_types as $type)
                                @if($type === 'home_visit')
                                <span class="inline-flex items-center px-2 py-1 bg-rose-100 text-rose-700 rounded text-xs font-medium" title="Home Visit">
                                    🏠
                                </span>
                                @elseif($type === 'clinic')
                                <span class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs font-medium" title="Di Klinik">
                                    🏥
                                </span>
                                @elseif($type === 'online')
                                <span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-medium" title="Online">
                                    💻
                                </span>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="flex flex-col gap-3">
                        <a href="{{ route('services.show', $service->slug) }}"
                           class="block text-center py-3 px-6 bg-white border-2 border-rose-500 text-rose-600 font-semibold rounded-xl hover:bg-rose-50 transition">
                            Lihat Detail
                        </a>
                        @if($service->is_active)
                        <a href="{{ route('booking') }}?service={{ $service->id }}"
                           class="block text-center py-3 px-6 bg-gradient-to-r from-rose-500 to-rose-600 text-white font-bold rounded-xl hover:from-rose-600 hover:to-rose-700 transition shadow-rose">
                            Booking Sekarang
                        </a>
                        @else
                        <a href="{{ route('services.show', $service->slug) }}"
                           class="block text-center py-3 px-6 bg-gradient-to-r from-amber-500 to-amber-600 text-white font-bold rounded-xl hover:from-amber-600 hover:to-amber-700 transition">
                            Reservasi (Waiting List)
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Info Banner --}}
        <div class="mt-16 bg-gradient-to-r from-rose-100 to-cream-200 rounded-3xl p-8 md:p-12 text-center">
            <div class="text-5xl mb-4">💡</div>
            <h3 class="font-display text-3xl font-bold text-brown-700 mb-4">Tidak Yakin Layanan Mana yang Tepat?</h3>
            <p class="text-mauve-dark mb-6 max-w-2xl mx-auto">
                Jangan khawatir! Kami siap membantu Anda memilih layanan yang paling sesuai dengan kondisi Anda.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="https://wa.me/6289560622054?text=Halo%20KOLASE%2C%20saya%20ingin%20konsultasi%20untuk%20memilih%20layanan%20yang%20tepat."
                   target="_blank"
                   class="inline-flex items-center justify-center px-8 py-4 bg-[#25D366] text-white font-bold rounded-xl hover:bg-[#20ba5a] transition shadow-lg">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                    Konsultasi Gratis via WhatsApp
                </a>
                <a href="{{ route('contact') }}"
                   class="inline-flex items-center justify-center px-8 py-4 bg-white border-2 border-rose-500 text-rose-600 font-semibold rounded-xl hover:bg-rose-50 transition">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>

{{-- FAQ Section --}}
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="font-display text-4xl font-bold text-brown-700 mb-4">Pertanyaan Umum</h2>
            <p class="text-mauve-dark">Beberapa pertanyaan yang sering ditanyakan</p>
        </div>

        <div class="space-y-4" x-data="{ openFaq: null }">
            {{-- FAQ 1 --}}
            <div class="border border-cream-200 rounded-2xl overflow-hidden">
                <button @click="openFaq = openFaq === 1 ? null : 1"
                        class="w-full flex items-center justify-between p-6 text-left hover:bg-cream-50 transition">
                    <span class="font-semibold text-brown-700 pr-4">Apa perbedaan antara Home Visit, Klinik, dan Online?</span>
                    <svg class="w-5 h-5 text-rose-500 flex-shrink-0 transition-transform"
                         :class="{ 'rotate-180': openFaq === 1 }"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openFaq === 1"
                     x-transition
                     class="px-6 pb-6 text-mauve-dark">
                    <p><strong>Home Visit:</strong> Konselor datang ke rumah Anda (ada biaya transport).</p>
                    <p class="mt-2"><strong>Di Klinik:</strong> Anda datang ke lokasi praktik kami.</p>
                    <p class="mt-2"><strong>Online:</strong> Konsultasi via video call (Zoom/Google Meet).</p>
                </div>
            </div>

            {{-- FAQ 2 --}}
            <div class="border border-cream-200 rounded-2xl overflow-hidden">
                <button @click="openFaq = openFaq === 2 ? null : 2"
                        class="w-full flex items-center justify-between p-6 text-left hover:bg-cream-50 transition">
                    <span class="font-semibold text-brown-700 pr-4">Berapa biaya konsultasi?</span>
                    <svg class="w-5 h-5 text-rose-500 flex-shrink-0 transition-transform"
                         :class="{ 'rotate-180': openFaq === 2 }"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openFaq === 2"
                     x-transition
                     class="px-6 pb-6 text-mauve-dark">
                    Biaya bervariasi tergantung jenis layanan dan tipe konsultasi (home visit/klinik/online).
                    Silakan hubungi kami via WhatsApp untuk informasi detail harga dan paket yang tersedia.
                </div>
            </div>

            {{-- FAQ 3 --}}
            <div class="border border-cream-200 rounded-2xl overflow-hidden">
                <button @click="openFaq = openFaq === 3 ? null : 3"
                        class="w-full flex items-center justify-between p-6 text-left hover:bg-cream-50 transition">
                    <span class="font-semibold text-brown-700 pr-4">Apakah bisa reschedule jadwal konsultasi?</span>
                    <svg class="w-5 h-5 text-rose-500 flex-shrink-0 transition-transform"
                         :class="{ 'rotate-180': openFaq === 3 }"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openFaq === 3"
                     x-transition
                     class="px-6 pb-6 text-mauve-dark">
                    Ya, bisa! Harap informasikan minimal H-1 hari sebelumnya agar kami dapat mengatur ulang jadwal dengan optimal.
                </div>
            </div>

            {{-- FAQ 4 --}}
            <div class="border border-cream-200 rounded-2xl overflow-hidden">
                <button @click="openFaq = openFaq === 4 ? null : 4"
                        class="w-full flex items-center justify-between p-6 text-left hover:bg-cream-50 transition">
                    <span class="font-semibold text-brown-700 pr-4">Area mana saja yang dilayani untuk Home Visit?</span>
                    <svg class="w-5 h-5 text-rose-500 flex-shrink-0 transition-transform"
                         :class="{ 'rotate-180': openFaq === 4 }"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openFaq === 4"
                     x-transition
                     class="px-6 pb-6 text-mauve-dark">
                    Kami melayani area Bandung dan sekitarnya. Untuk area di luar itu, silakan hubungi kami untuk konfirmasi ketersediaan dan biaya transport.
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('faq') }}" class="inline-flex items-center text-rose-600 hover:text-rose-700 font-semibold">
                Lihat Semua FAQ
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>
    </div>
</section>

@endsection
