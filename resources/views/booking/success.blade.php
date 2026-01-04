@extends('layouts.app')

@section('seo_title', 'Booking Berhasil | KOLASE')
@section('seo_description', 'Booking konsultasi Anda telah berhasil. Kami akan menghubungi Anda segera untuk konfirmasi.')

@section('content')

<section class="py-20 bg-gradient-to-br from-cream-50 to-rose-50 min-h-screen flex items-center">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 w-full">

        {{-- Success Card --}}
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            {{-- Success Header --}}
            <div class="bg-gradient-to-r from-rose-500 to-rose-600 text-white px-8 py-12 text-center">
                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-xl animate-bounce">
                    <svg class="w-12 h-12 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h1 class="font-display text-3xl md:text-4xl font-bold mb-3">Booking Berhasil!</h1>
                <p class="text-rose-100 text-lg">Terima kasih telah mempercayakan KOLASE sebagai pendamping menyusui Anda</p>
            </div>

            {{-- Booking Details --}}
            <div class="p-8 md:p-10">

                {{-- Booking Code --}}
                <div class="bg-gradient-to-br from-rose-50 to-cream-100 rounded-2xl p-6 mb-8 text-center border-2 border-rose-200">
                    <div class="text-sm font-semibold text-mauve-dark mb-2">Kode Booking Anda</div>
                    <div class="font-display text-3xl font-bold text-rose-600 tracking-wider">{{ $consultation->booking_code }}</div>
                    <div class="text-xs text-mauve-dark mt-2">Simpan kode ini untuk referensi Anda</div>
                </div>

                {{-- Details Grid --}}
                <div class="space-y-6 mb-8">

                    {{-- Service Info --}}
                    <div class="border-l-4 border-rose-500 pl-4">
                        <div class="text-sm font-semibold text-mauve-dark mb-1">Layanan</div>
                        <div class="font-semibold text-brown-700 text-lg">{{ $consultation->service->name }}</div>
                        <div class="text-sm text-mauve-dark mt-1">Durasi: {{ $consultation->service->duration_minutes }} menit</div>
                    </div>

                    {{-- Schedule Info --}}
                    <div class="border-l-4 border-rose-500 pl-4">
                        <div class="text-sm font-semibold text-mauve-dark mb-1">Jadwal Konsultasi</div>
                        <div class="font-semibold text-brown-700 text-lg">
                            {{ \Carbon\Carbon::parse($consultation->scheduled_date)->isoFormat('dddd, D MMMM YYYY') }}
                        </div>
                        <div class="text-sm text-mauve-dark mt-1">Pukul {{ $consultation->scheduled_time }}</div>
                        <div class="inline-flex items-center mt-2 px-3 py-1 bg-rose-100 text-rose-700 rounded-full text-sm font-medium">
                            @if($consultation->consultation_type === 'home_visit')
                                🏠 Home Visit
                            @elseif($consultation->consultation_type === 'clinic')
                                🏥 Di Klinik
                            @elseif($consultation->consultation_type === 'online')
                                💻 Online
                            @endif
                        </div>
                    </div>

                    {{-- Contact Info --}}
                    <div class="border-l-4 border-rose-500 pl-4">
                        <div class="text-sm font-semibold text-mauve-dark mb-1">Informasi Kontak</div>
                        <div class="text-brown-700">{{ $consultation->mother_name }}</div>
                        <div class="text-sm text-mauve-dark">{{ $consultation->mother_phone }}</div>
                        <div class="text-sm text-mauve-dark">{{ $consultation->mother_email }}</div>
                    </div>

                    {{-- Status Badge --}}
                    <div class="border-l-4 border-amber-500 pl-4">
                        <div class="text-sm font-semibold text-mauve-dark mb-1">Status Booking</div>
                        <div class="inline-flex items-center px-4 py-2 bg-amber-100 text-amber-800 rounded-full font-semibold">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            Menunggu Konfirmasi
                        </div>
                    </div>

                </div>

                {{-- Next Steps --}}
                <div class="bg-blue-50 rounded-2xl p-6 mb-8">
                    <h3 class="font-display text-xl font-bold text-brown-700 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        Langkah Selanjutnya
                    </h3>
                    <ol class="space-y-3 text-sm text-mauve-dark">
                        <li class="flex items-start">
                            <span class="flex-shrink-0 w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold text-xs mr-3">1</span>
                            <span>Kami akan menghubungi Anda via <strong>WhatsApp</strong> dalam waktu maksimal <strong>2 jam</strong> untuk konfirmasi jadwal</span>
                        </li>
                        <li class="flex items-start">
                            <span class="flex-shrink-0 w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold text-xs mr-3">2</span>
                            <span>Anda akan menerima detail pembayaran dan informasi persiapan konsultasi</span>
                        </li>
                        <li class="flex items-start">
                            <span class="flex-shrink-0 w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold text-xs mr-3">3</span>
                            <span>H-1 sebelum konsultasi, kami akan mengirimkan pengingat dan link meeting (untuk online)</span>
                        </li>
                        <li class="flex items-start">
                            <span class="flex-shrink-0 w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold text-xs mr-3">4</span>
                            <span>Jika ada perubahan jadwal, harap informasikan minimal H-1</span>
                        </li>
                    </ol>
                </div>

                {{-- Contact Info Banner --}}
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border-2 border-green-200 mb-8">
                    <div class="flex items-center mb-4">
                        <div class="text-4xl mr-3">📱</div>
                        <div>
                            <h3 class="font-display text-lg font-bold text-brown-700">Belum Dihubungi?</h3>
                            <p class="text-sm text-mauve-dark">Jangan ragu untuk menghubungi kami</p>
                        </div>
                    </div>
                    <a href="https://wa.me/6289560622054?text=Halo%20KOLASE%2C%20saya%20sudah%20booking%20dengan%20kode%20{{ $consultation->booking_code }}"
                       target="_blank"
                       class="flex items-center justify-center w-full px-6 py-4 bg-[#25D366] text-white font-bold rounded-xl hover:bg-[#20ba5a] transition shadow-lg">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        Hubungi via WhatsApp
                    </a>
                    <div class="text-center mt-4">
                        <a href="tel:0895606220540" class="text-mauve-dark hover:text-rose-600 text-sm font-semibold">
                            <svg class="w-4 h-4 inline-block mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            Atau telepon: 0895-606-220-540
                        </a>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('home') }}"
                       class="flex-1 text-center px-6 py-4 bg-white border-2 border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition">
                        Kembali ke Beranda
                    </a>
                    <a href="{{ route('services.index') }}"
                       class="flex-1 text-center px-6 py-4 bg-rose-500 text-white font-bold rounded-xl hover:bg-rose-600 transition shadow-rose">
                        Lihat Layanan Lain
                    </a>
                </div>

                {{-- Social Share --}}
                <div class="mt-8 pt-8 border-t-2 border-gray-100 text-center">
                    <p class="text-sm text-mauve-dark mb-3">Bantu ibu lain menemukan KOLASE</p>
                    <div class="flex justify-center gap-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('home')) }}"
                           target="_blank"
                           class="inline-flex items-center px-4 py-2 bg-[#1877F2] text-white rounded-lg hover:bg-[#166FE5] transition">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            Share
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('home')) }}&text=Konseling%20menyusui%20profesional%20di%20KOLASE"
                           target="_blank"
                           class="inline-flex items-center px-4 py-2 bg-[#1DA1F2] text-white rounded-lg hover:bg-[#1A91DA] transition">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                            Tweet
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
