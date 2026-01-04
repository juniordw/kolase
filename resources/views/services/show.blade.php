@extends('layouts.app')

@section('seo_title', $service->seo_title ?? $service->name . ' | KOLASE')
@section('seo_description', $service->seo_description ?? $service->short_description)
@section('seo_keywords', $service->seo_keywords ?? 'konseling menyusui, laktasi, ' . $service->name)

@section('content')

{{-- Hero Section --}}
<section class="relative bg-gradient-to-br from-rose-600 via-rose-500 to-mauve text-white py-20 overflow-hidden">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-white rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-center">
            {{-- Left: Service Icon --}}
            <div class="lg:col-span-1 flex justify-center">
                <div class="relative">
                    <div class="w-48 h-48 bg-white rounded-3xl flex items-center justify-center text-8xl shadow-2xl">
                        {{ $service->icon }}
                    </div>
                    @if($service->badge)
                    <div class="absolute -top-4 -right-4">
                        <span class="px-4 py-2 text-sm font-bold rounded-full shadow-xl
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
            </div>

            {{-- Right: Service Info --}}
            <div class="lg:col-span-2">
                {{-- Breadcrumb --}}
                <nav class="mb-6 text-rose-100 text-sm">
                    <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
                    <span class="mx-2">/</span>
                    <a href="{{ route('services.index') }}" class="hover:text-white transition">Layanan</a>
                    <span class="mx-2">/</span>
                    <span class="text-white">{{ $service->name }}</span>
                </nav>

                <h1 class="font-display text-4xl md:text-5xl lg:text-6xl font-bold mb-4">{{ $service->name }}</h1>

                @if($service->tagline)
                <p class="font-script text-2xl text-rose-100 mb-6">{{ $service->tagline }}</p>
                @endif

                <p class="text-xl text-rose-50 leading-relaxed mb-8">{{ $service->short_description }}</p>

                {{-- Meta Info Badges --}}
                <div class="flex flex-wrap gap-4 mb-8">
                    {{-- Duration --}}
                    <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-xl">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="font-semibold">{{ $service->duration_minutes }} menit</span>
                    </div>

                    {{-- Available Types --}}
                    @foreach($service->available_types as $type)
                        @if($type === 'home_visit')
                        <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-xl">
                            <span class="mr-2">🏠</span>
                            <span class="font-semibold">Home Visit</span>
                        </div>
                        @elseif($type === 'clinic')
                        <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-xl">
                            <span class="mr-2">🏥</span>
                            <span class="font-semibold">Di Klinik</span>
                        </div>
                        @elseif($type === 'online')
                        <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-xl">
                            <span class="mr-2">💻</span>
                            <span class="font-semibold">Online</span>
                        </div>
                        @endif
                    @endforeach
                </div>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4">
                    @if($service->is_active)
                    <a href="{{ route('booking') }}?service={{ $service->id }}"
                       class="inline-flex items-center justify-center px-8 py-4 bg-white text-rose-600 font-bold text-lg rounded-xl hover:bg-rose-50 transition shadow-xl">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Booking Sekarang
                    </a>
                    @else
                    <a href="{{ route('booking') }}?service={{ $service->id }}"
                       class="inline-flex items-center justify-center px-8 py-4 bg-amber-500 text-white font-bold text-lg rounded-xl hover:bg-amber-600 transition shadow-xl">
                        Reservasi (Waiting List)
                    </a>
                    @endif

                    <a href="https://wa.me/6289560622054?text=Halo%20KOLASE%2C%20saya%20ingin%20bertanya%20tentang%20{{ urlencode($service->name) }}"
                       target="_blank"
                       class="inline-flex items-center justify-center px-8 py-4 bg-[#25D366] text-white font-semibold text-lg rounded-xl hover:bg-[#20ba5a] transition">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        Tanya via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Main Content --}}
<section class="py-20 bg-cream-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            {{-- Left Column: Main Content --}}
            <div class="lg:col-span-2 space-y-12">

                {{-- Full Description --}}
                <div class="bg-white rounded-3xl p-8 md:p-10 shadow-md">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-6">Tentang Layanan Ini</h2>
                    <div class="prose prose-lg max-w-none text-mauve-dark leading-relaxed">
                        {!! nl2br(e($service->full_description)) !!}
                    </div>
                </div>

                {{-- Features Section --}}
                <div class="bg-white rounded-3xl p-8 md:p-10 shadow-md">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-6">Yang Anda Dapatkan</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($service->features as $feature)
                        <div class="flex items-start space-x-3 p-4 bg-cream-50 rounded-xl hover:bg-rose-50 transition">
                            <svg class="w-6 h-6 text-rose-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-brown-700 font-medium">{{ $feature }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Target Clients Section --}}
                @if($service->target_clients && count($service->target_clients) > 0)
                <div class="bg-white rounded-3xl p-8 md:p-10 shadow-md">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-6">Untuk Siapa Layanan Ini?</h2>
                    <div class="space-y-3">
                        @foreach($service->target_clients as $client)
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-rose-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-mauve-dark text-lg">{{ $client }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Cases Handled Section --}}
                @if($service->cases_handled && count($service->cases_handled) > 0)
                <div class="bg-gradient-to-br from-rose-50 to-cream-100 rounded-3xl p-8 md:p-10 border-2 border-rose-200">
                    <div class="flex items-center mb-6">
                        <div class="text-4xl mr-4">🩺</div>
                        <h2 class="font-display text-3xl font-bold text-brown-700">Kasus yang Ditangani</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @foreach($service->cases_handled as $case)
                        <div class="flex items-start space-x-3 bg-white p-4 rounded-xl">
                            <svg class="w-5 h-5 text-rose-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-brown-700">{{ $case }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Testimonials Section --}}
                @if($testimonials->count() > 0)
                <div class="bg-white rounded-3xl p-8 md:p-10 shadow-md">
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-6">Testimoni Layanan Ini</h2>
                    <div class="space-y-6">
                        @foreach($testimonials as $testimonial)
                        <div class="border-l-4 border-rose-500 pl-6 py-4 bg-cream-50 rounded-r-xl">
                            {{-- Rating --}}
                            <div class="flex mb-3">
                                @for($i = 0; $i < 5; $i++)
                                    <svg class="w-5 h-5 {{ $i < $testimonial->rating ? 'text-amber-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>

                            {{-- Testimonial Text --}}
                            <p class="text-mauve-dark italic mb-4">"{{ $testimonial->testimonial }}"</p>

                            {{-- Client Info --}}
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-rose-100 rounded-full flex items-center justify-center text-rose-600 font-bold mr-3">
                                    {{ substr($testimonial->client_name, 0, 1) }}
                                </div>
                                <div>
                                    <div class="font-semibold text-brown-700">{{ $testimonial->client_name }}</div>
                                    <div class="text-sm text-mauve">{{ $testimonial->service_date->diffForHumans() }}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Related Services --}}
                @if($relatedServices->count() > 0)
                <div>
                    <h2 class="font-display text-3xl font-bold text-brown-700 mb-6">Layanan Lainnya</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($relatedServices as $related)
                        <a href="{{ route('services.show', $related->slug) }}"
                           class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group">
                            <div class="text-5xl mb-4 text-center group-hover:scale-110 transition-transform">{{ $related->icon }}</div>
                            <h3 class="font-display text-xl font-semibold text-brown-700 mb-2 group-hover:text-rose-600 transition text-center">
                                {{ $related->name }}
                            </h3>
                            <p class="text-sm text-mauve-dark text-center line-clamp-2">{{ $related->short_description }}</p>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- Right Column: Sticky Sidebar --}}
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">

                    {{-- Booking Card --}}
                    <div class="bg-gradient-to-br from-rose-500 to-rose-600 text-white rounded-3xl p-8 shadow-xl">
                        <h3 class="font-display text-2xl font-bold mb-4">Siap Booking?</h3>

                        {{-- Price Info --}}
                        @if($service->price)
                        <div class="mb-6">
                            <div class="text-3xl font-bold mb-1">Rp {{ number_format($service->price, 0, ',', '.') }}</div>
                            @if($service->price_note)
                            <div class="text-sm text-rose-100">{{ $service->price_note }}</div>
                            @endif
                        </div>
                        @endif

                        {{-- Quick Info --}}
                        <div class="space-y-3 mb-6 text-sm">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>{{ $service->duration_minutes }} menit</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>Jadwal fleksibel</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Konselor tersertifikasi</span>
                            </div>
                        </div>

                        @if($service->is_active)
                        <a href="{{ route('booking') }}?service={{ $service->id }}"
                           class="block w-full text-center py-4 bg-white text-rose-600 font-bold rounded-xl hover:bg-rose-50 transition mb-3">
                            Booking Sekarang
                        </a>
                        @else
                        <a href="{{ route('booking') }}?service={{ $service->id }}"
                           class="block w-full text-center py-4 bg-amber-500 text-white font-bold rounded-xl hover:bg-amber-600 transition mb-3">
                            Reservasi (Waiting List)
                        </a>
                        @endif

                        <a href="https://wa.me/6289560622054?text=Halo%20KOLASE%2C%20saya%20ingin%20bertanya%20tentang%20{{ urlencode($service->name) }}"
                           target="_blank"
                           class="block w-full text-center py-4 bg-[#25D366] text-white font-semibold rounded-xl hover:bg-[#20ba5a] transition">
                            <svg class="w-5 h-5 inline-block mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                            Tanya via WA
                        </a>
                    </div>

                    {{-- Info Card --}}
                    <div class="bg-white rounded-2xl p-6 shadow-md">
                        <h4 class="font-display text-lg font-semibold text-brown-700 mb-4">Informasi Penting</h4>
                        <ul class="space-y-3 text-sm text-mauve-dark">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-rose-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span>Konfirmasi jadwal maks H-1</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-rose-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span>Reschedule gratis jika info H-1</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-rose-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span>Protokol kesehatan ketat</span>
                            </li>
                            @if(in_array('home_visit', $service->available_types))
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-rose-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span>Home visit: area Bandung & sekitarnya</span>
                            </li>
                            @endif
                        </ul>
                    </div>

                    {{-- Trust Badges --}}
                    <div class="bg-cream-100 rounded-2xl p-6 text-center">
                        <div class="text-4xl mb-3">🏆</div>
                        <h4 class="font-display text-lg font-semibold text-brown-700 mb-2">Konselor Tersertifikasi</h4>
                        <p class="text-sm text-mauve-dark">Mengikuti protokol ABM internasional</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="py-16 bg-gradient-to-r from-rose-500 to-rose-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-display text-3xl md:text-4xl font-bold mb-4">Masih Ada Pertanyaan?</h2>
        <p class="text-xl text-rose-100 mb-8">Kami siap membantu Anda memilih layanan yang tepat</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/6289560622054?text=Halo%20KOLASE%2C%20saya%20ingin%20bertanya%20tentang%20{{ urlencode($service->name) }}"
               target="_blank"
               class="inline-flex items-center justify-center px-8 py-4 bg-[#25D366] text-white font-bold rounded-xl hover:bg-[#20ba5a] transition shadow-xl">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                Hubungi via WhatsApp
            </a>
            <a href="{{ route('faq') }}"
               class="inline-flex items-center justify-center px-8 py-4 bg-white text-rose-600 font-semibold rounded-xl hover:bg-rose-50 transition">
                Lihat FAQ
            </a>
        </div>
    </div>
</section>

@endsection
