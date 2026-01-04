@extends('layouts.app')

@section('seo_title', 'KOLASE - Konselor Menyusui Sepanjang | Konsultasi Laktasi Profesional')
@section('seo_description', 'Layanan konseling menyusui profesional. Pendampingan dari persiapan hamil hingga relaktasi. Home visit tersedia. Hubungi 0895-606-220-540.')
@section('seo_keywords', 'konselor menyusui, konsultan laktasi, konseling ASI, pijat laktasi, relaktasi, masalah menyusui')

@section('content')

{{-- Hero Section --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-primary-50 via-white to-accent-50">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-20 left-10 w-96 h-96 bg-primary-200 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-80 h-80 bg-accent-200 rounded-full blur-3xl animate-float" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-secondary-200 rounded-full blur-3xl animate-pulse-slow"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            {{-- Left Column: Content --}}
            <div class="text-center lg:text-left animate-slide-in-up">
                {{-- Badge --}}
                <div class="inline-flex items-center px-4 py-2 bg-accent-100 text-accent-700 rounded-full text-sm font-semibold mb-6">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Konselor Laktasi Tersertifikasi</span>
                </div>

                {{-- Headline --}}
                <h1 class="font-display text-4xl md:text-5xl lg:text-6xl font-bold text-neutral-800 mb-6 leading-tight">
                    Pendamping Perjalanan
                    <span class="gradient-text block">Menyusui Anda</span>
                </h1>

                {{-- Tagline --}}
                <p class="font-script text-xl md:text-2xl text-primary-500 mb-6">
                    Konselor Menyusui Sepanjang
                </p>

                {{-- Description --}}
                <p class="text-base md:text-lg text-neutral-600 mb-8 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                    Konseling dan pendampingan menyusui profesional untuk ibu hamil dan menyusui.
                    Kami hadir mendukung kesuksesan ASI eksklusif Anda dengan pendekatan evidence-based dan penuh kehangatan.
                </p>

                {{-- CTAs --}}
                <div class="flex flex-col sm:flex-row gap-4 mb-10 justify-center lg:justify-start">
                    <a href="{{ route('booking') }}"
                       class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-primary-500 to-primary-600 text-white font-bold text-base rounded-xl hover:from-primary-600 hover:to-primary-700 transition-all duration-300 shadow-primary hover:shadow-primary hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>Jadwalkan Konsultasi</span>
                    </a>
                    <a href="{{ route('services.index') }}"
                       class="inline-flex items-center justify-center px-8 py-4 bg-white text-primary-600 font-semibold text-base rounded-xl border-2 border-primary-200 hover:border-primary-300 hover:bg-primary-50 transition-all duration-300 shadow-md">
                        <span>Lihat Layanan</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                {{-- Trust Indicators --}}
                <div class="flex flex-wrap gap-6 justify-center lg:justify-start text-sm text-neutral-600">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <span class="font-medium">Tersertifikasi</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-accent-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-accent-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <span class="font-medium">Home Visit</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-secondary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-secondary-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <span class="font-medium">Protokol ABM</span>
                    </div>
                </div>
            </div>

            {{-- Right Column: Illustration --}}
            <div class="relative lg:block animate-fade-in" style="animation-delay: 0.2s;">
                {{-- Main Illustration Card --}}
                <div class="relative z-10">
                    <div class="aspect-square bg-gradient-to-br from-primary-400 to-primary-600 rounded-3xl p-1 shadow-2xl">
                        <div class="w-full h-full bg-gradient-to-br from-primary-50 to-white rounded-3xl flex items-center justify-center">
                            <div class="text-center p-8">
                                <div class="text-9xl mb-4 animate-float">🤱</div>
                                <div class="text-2xl font-bold text-neutral-800 mb-2">KOLASE</div>
                                <div class="text-sm text-neutral-600">Konselor Menyusui Sepanjang</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Floating Cards --}}
                <div class="absolute -top-8 -right-8 z-20 bg-white rounded-2xl p-6 shadow-xl border border-neutral-100 animate-float hidden lg:block">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-accent-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-accent-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-neutral-800">500+</div>
                            <div class="text-sm text-neutral-600">Ibu Terbantu</div>
                        </div>
                    </div>
                </div>

                <div class="absolute -bottom-8 -left-8 z-20 bg-white rounded-2xl p-6 shadow-xl border border-neutral-100 animate-float hidden lg:block" style="animation-delay: 1s;">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-neutral-800">4.9/5</div>
                            <div class="text-sm text-neutral-600">Rating Klien</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Scroll Down Indicator --}}
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce hidden lg:block">
        <div class="flex flex-col items-center gap-2 text-neutral-400">
            <span class="text-xs font-medium">Scroll</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </div>
</section>

{{-- How It Works Section --}}
<section class="py-20 lg:py-24 bg-white relative overflow-hidden">
    {{-- Decorative Background --}}
    <div class="absolute inset-0 opacity-40">
        <div class="absolute top-20 right-10 w-72 h-72 bg-primary-100 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-80 h-80 bg-accent-100 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <div class="inline-block px-4 py-2 bg-primary-100 text-primary-700 rounded-full text-sm font-semibold mb-4">
                Cara Kerja Kami
            </div>
            <h2 class="font-display text-4xl md:text-5xl font-bold text-neutral-800 mb-4">
                Bagaimana Kami <span class="gradient-text">Membantu Anda</span>
            </h2>
            <p class="text-lg text-neutral-600 max-w-2xl mx-auto">
                Proses konsultasi yang mudah dan terstruktur untuk mendukung perjalanan menyusui Anda
            </p>
        </div>

        {{-- Process Steps --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-6 mb-16">
            {{-- Step 1 --}}
            <div class="relative group">
                {{-- Connector Line (desktop only) --}}
                <div class="hidden lg:block absolute top-16 left-1/2 w-full h-0.5 bg-gradient-to-r from-primary-200 to-primary-300 -z-10"></div>

                <div class="text-center">
                    {{-- Number Circle --}}
                    <div class="relative inline-flex items-center justify-center w-32 h-32 mb-6">
                        <div class="absolute inset-0 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full opacity-10 group-hover:opacity-20 transition-opacity duration-300"></div>
                        <div class="relative flex items-center justify-center w-24 h-24 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full shadow-primary group-hover:scale-110 transition-transform duration-300">
                            <span class="text-4xl font-bold text-white">1</span>
                        </div>
                    </div>

                    <h3 class="font-display text-xl font-bold text-neutral-800 mb-3">Pilih Layanan</h3>
                    <p class="text-neutral-600 text-sm leading-relaxed">
                        Tentukan layanan yang sesuai dengan kebutuhan Anda melalui website atau WhatsApp
                    </p>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="relative group">
                <div class="hidden lg:block absolute top-16 left-1/2 w-full h-0.5 bg-gradient-to-r from-primary-300 to-accent-200 -z-10"></div>

                <div class="text-center">
                    <div class="relative inline-flex items-center justify-center w-32 h-32 mb-6">
                        <div class="absolute inset-0 bg-gradient-to-br from-accent-400 to-accent-600 rounded-full opacity-10 group-hover:opacity-20 transition-opacity duration-300"></div>
                        <div class="relative flex items-center justify-center w-24 h-24 bg-gradient-to-br from-accent-500 to-accent-600 rounded-full shadow-accent group-hover:scale-110 transition-transform duration-300">
                            <span class="text-4xl font-bold text-white">2</span>
                        </div>
                    </div>

                    <h3 class="font-display text-xl font-bold text-neutral-800 mb-3">Jadwalkan Konsultasi</h3>
                    <p class="text-neutral-600 text-sm leading-relaxed">
                        Pilih waktu yang sesuai dan tipe konsultasi: home visit, klinik, atau online
                    </p>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="relative group">
                <div class="hidden lg:block absolute top-16 left-1/2 w-full h-0.5 bg-gradient-to-r from-accent-200 to-secondary-300 -z-10"></div>

                <div class="text-center">
                    <div class="relative inline-flex items-center justify-center w-32 h-32 mb-6">
                        <div class="absolute inset-0 bg-gradient-to-br from-secondary-400 to-secondary-600 rounded-full opacity-10 group-hover:opacity-20 transition-opacity duration-300"></div>
                        <div class="relative flex items-center justify-center w-24 h-24 bg-gradient-to-br from-secondary-500 to-secondary-600 rounded-full shadow-secondary group-hover:scale-110 transition-transform duration-300">
                            <span class="text-4xl font-bold text-white">3</span>
                        </div>
                    </div>

                    <h3 class="font-display text-xl font-bold text-neutral-800 mb-3">Konseling & Pemeriksaan</h3>
                    <p class="text-neutral-600 text-sm leading-relaxed">
                        Konselor akan mendengar, memeriksa, dan memberikan solusi sesuai kondisi Anda
                    </p>
                </div>
            </div>

            {{-- Step 4 --}}
            <div class="relative group">
                <div class="text-center">
                    <div class="relative inline-flex items-center justify-center w-32 h-32 mb-6">
                        <div class="absolute inset-0 bg-gradient-to-br from-primary-400 to-secondary-600 rounded-full opacity-10 group-hover:opacity-20 transition-opacity duration-300"></div>
                        <div class="relative flex items-center justify-center w-24 h-24 bg-gradient-to-br from-primary-500 to-secondary-600 rounded-full shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <span class="text-4xl font-bold text-white">4</span>
                        </div>
                    </div>

                    <h3 class="font-display text-xl font-bold text-neutral-800 mb-3">Follow-Up Gratis</h3>
                    <p class="text-neutral-600 text-sm leading-relaxed">
                        Dapatkan pendampingan lanjutan via chat untuk memastikan progress Anda
                    </p>
                </div>
            </div>
        </div>

        {{-- Services Quick Preview Grid --}}
        <div class="bg-gradient-to-br from-cream-50 to-primary-50 rounded-3xl p-8 md:p-12">
            <div class="text-center mb-10">
                <h3 class="font-display text-3xl font-bold text-neutral-800 mb-3">Layanan Kami</h3>
                <p class="text-neutral-600">Solusi lengkap untuk setiap tahap perjalanan menyusui Anda</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">
                @foreach($services->take(8) as $service)
                <a href="{{ route('services.show', $service->slug) }}"
                   class="group bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-neutral-100">
                    {{-- Badge --}}
                    @if($service->badge)
                    <div class="mb-3">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full
                            @if($service->badge_color === 'rose') bg-rose-100 text-rose-700
                            @elseif($service->badge_color === 'amber') bg-amber-100 text-amber-700
                            @elseif($service->badge_color === 'blue') bg-blue-100 text-blue-700
                            @else bg-green-100 text-green-700
                            @endif">
                            {{ $service->badge }}
                        </span>
                    </div>
                    @endif

                    {{-- Icon --}}
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform duration-300">{{ $service->icon }}</div>

                    {{-- Service Name --}}
                    <h4 class="font-display text-base font-bold text-neutral-800 mb-2 group-hover:text-primary-600 transition-colors duration-200">
                        {{ $service->name }}
                    </h4>

                    {{-- Duration --}}
                    <div class="flex items-center text-xs text-neutral-500">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $service->duration_minutes }} menit
                    </div>
                </a>
                @endforeach
            </div>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('services.index') }}"
                   class="inline-flex items-center justify-center px-8 py-4 bg-white border-2 border-primary-200 text-primary-600 font-semibold text-base rounded-xl hover:border-primary-300 hover:bg-primary-50 transition-all duration-300 shadow-md">
                    <span>Lihat Semua Layanan</span>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <a href="{{ route('booking') }}"
                   class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-primary-500 to-primary-600 text-white font-bold text-base rounded-xl hover:from-primary-600 hover:to-primary-700 transition-all duration-300 shadow-primary hover:shadow-primary hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>Booking Sekarang</span>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Featured Program Section --}}
@if($featuredService)
<section class="py-20 bg-gradient-to-r from-rose-50 to-cream-100 relative overflow-hidden">
    {{-- Decorative Elements --}}
    <div class="absolute top-0 right-0 w-64 h-64 bg-rose-200/30 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-mauve-light/20 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            {{-- Left: Image --}}
            <div class="relative">
                <div class="aspect-square rounded-3xl bg-gradient-to-br from-rose-400 to-rose-600 p-1">
                    <div class="w-full h-full rounded-3xl bg-white flex items-center justify-center text-9xl">
                        {{ $featuredService->icon }}
                    </div>
                </div>
                <div class="absolute -top-4 -left-4 bg-amber-400 text-amber-900 px-6 py-3 rounded-full font-bold text-sm shadow-lg">
                    {{ $featuredService->badge }}
                </div>
            </div>

            {{-- Right: Content --}}
            <div>
                <div class="inline-block px-4 py-2 bg-amber-100 text-amber-800 rounded-full text-sm font-semibold mb-4">
                    Program Eksklusif
                </div>
                <h2 class="font-display text-4xl md:text-5xl font-bold text-brown-700 mb-4">
                    {{ $featuredService->name }}
                </h2>
                <p class="font-script text-xl text-rose-600 mb-6">{{ $featuredService->tagline }}</p>
                <div class="text-mauve-dark mb-8 leading-relaxed">
                    {!! Str::limit(strip_tags($featuredService->full_description), 250) !!}
                </div>

                {{-- Key Points --}}
                <ul class="space-y-3 mb-8">
                    @foreach(array_slice($featuredService->features, 0, 4) as $feature)
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-rose-500 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-brown-700">{{ Str::before($feature, ' - ') }}</span>
                    </li>
                    @endforeach
                </ul>

                <div class="flex flex-col sm:flex-row gap-4">
                    @if($featuredService->is_active)
                    <a href="{{ route('services.show', $featuredService->slug) }}" class="inline-flex items-center justify-center px-8 py-4 bg-rose-500 text-white font-bold rounded-xl hover:bg-rose-600 transition shadow-rose">
                        Selengkapnya
                    </a>
                    @else
                    <a href="{{ route('services.show', $featuredService->slug) }}" class="inline-flex items-center justify-center px-8 py-4 bg-amber-500 text-white font-bold rounded-xl hover:bg-amber-600 transition">
                        Reservasi Sekarang (Waiting List)
                    </a>
                    @endif
                    <a href="https://wa.me/6289560622054" target="_blank" class="inline-flex items-center justify-center px-8 py-4 bg-white border-2 border-rose-500 text-rose-600 font-semibold rounded-xl hover:bg-rose-50 transition">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        Tanya via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- Why Choose Us Section --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            {{-- Left: Image Gallery --}}
            <div class="relative">
                <div class="grid grid-cols-2 gap-4">
                    <div class="aspect-square rounded-2xl bg-gradient-to-br from-rose-200 to-rose-300 flex items-center justify-center text-6xl">
                        🤱
                    </div>
                    <div class="aspect-square rounded-2xl bg-gradient-to-br from-mauve-light to-mauve flex items-center justify-center text-6xl">
                        💝
                    </div>
                    <div class="aspect-square rounded-2xl bg-gradient-to-br from-cream-200 to-cream-400 flex items-center justify-center text-6xl">
                        👶
                    </div>
                    <div class="aspect-square rounded-2xl bg-gradient-to-br from-rose-300 to-rose-400 flex items-center justify-center text-6xl">
                        ✨
                    </div>
                </div>
            </div>

            {{-- Right: Benefits --}}
            <div>
                <h2 class="font-display text-4xl md:text-5xl font-bold text-brown-700 mb-8">Mengapa KOLASE?</h2>

                <div class="space-y-8">
                    {{-- Benefit 1 --}}
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-rose-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-rose-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-display text-xl font-semibold text-brown-700 mb-2">Tersertifikasi & Berpengalaman</h3>
                            <p class="text-mauve-dark">Konselor dengan sertifikasi resmi dan pengalaman menangani berbagai kasus menyusui</p>
                        </div>
                    </div>

                    {{-- Benefit 2 --}}
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-rose-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-rose-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-display text-xl font-semibold text-brown-700 mb-2">Fleksibel & Nyaman</h3>
                            <p class="text-mauve-dark">Home visit sesuai jadwal Anda, konsultasi online tersedia, dan lokasi klinik strategis</p>
                        </div>
                    </div>

                    {{-- Benefit 3 --}}
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-rose-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-rose-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-display text-xl font-semibold text-brown-700 mb-2">Pendekatan Holistik</h3>
                            <p class="text-mauve-dark">Tidak hanya teknis, tapi juga dukungan emosional dan melibatkan support system keluarga</p>
                        </div>
                    </div>

                    {{-- Benefit 4 --}}
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-rose-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-rose-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-display text-xl font-semibold text-brown-700 mb-2">Evidence-Based</h3>
                            <p class="text-mauve-dark">Mengikuti protokol ABM internasional dan selalu update dengan riset terbaru</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Testimonials Section --}}
@if($testimonials->count() > 0)
<section class="py-20 lg:py-24 bg-gradient-to-br from-primary-50 via-white to-accent-50 relative overflow-hidden">
    {{-- Decorative Elements --}}
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-10 left-10 w-64 h-64 bg-primary-200 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-72 h-72 bg-accent-200 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <div class="inline-block px-4 py-2 bg-accent-100 text-accent-700 rounded-full text-sm font-semibold mb-4">
                Testimoni Klien
            </div>
            <h2 class="font-display text-4xl md:text-5xl font-bold text-neutral-800 mb-4">
                Apa Kata <span class="gradient-text">Mereka</span>
            </h2>
            <p class="text-lg text-neutral-600 max-w-2xl mx-auto">
                Cerita sukses dari ibu-ibu yang telah kami dampingi dalam perjalanan menyusui mereka
            </p>
        </div>

        {{-- Testimonials Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @foreach($testimonials as $testimonial)
            <div class="group bg-white rounded-3xl p-8 shadow-md hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-neutral-100 relative">
                {{-- Quote Icon --}}
                <div class="absolute top-6 right-6 opacity-10 group-hover:opacity-20 transition-opacity duration-300">
                    <svg class="w-16 h-16 text-primary-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>

                {{-- Rating Stars --}}
                <div class="flex gap-1 mb-5">
                    @for($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 {{ $i < $testimonial->rating ? 'text-amber-400' : 'text-neutral-200' }} transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    @endfor
                </div>

                {{-- Testimonial Text --}}
                <p class="text-neutral-700 mb-6 leading-relaxed line-clamp-5 text-sm">
                    "{{ $testimonial->testimonial }}"
                </p>

                {{-- Client Info --}}
                <div class="flex items-center pt-6 border-t border-neutral-100">
                    {{-- Avatar --}}
                    <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg mr-4 group-hover:scale-110 transition-transform duration-300">
                        {{ substr($testimonial->client_name, 0, 1) }}
                    </div>

                    {{-- Name & Service --}}
                    <div class="flex-1 min-w-0">
                        <div class="font-bold text-neutral-800 truncate">{{ $testimonial->client_name }}</div>
                        @if($testimonial->service)
                        <div class="text-sm text-neutral-500 truncate">{{ $testimonial->service->name }}</div>
                        @endif
                        @if($testimonial->service_date)
                        <div class="text-xs text-neutral-400 mt-1">
                            {{ \Carbon\Carbon::parse($testimonial->service_date)->format('F Y') }}
                        </div>
                        @endif
                    </div>

                    {{-- Verified Badge (if applicable) --}}
                    @if($testimonial->is_featured)
                    <div class="flex-shrink-0 ml-2" title="Testimoni Terverifikasi">
                        <div class="w-7 h-7 bg-accent-100 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-accent-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        {{-- CTA --}}
        <div class="text-center mt-12">
            <p class="text-neutral-600 mb-6">Ingin menjadi bagian dari cerita sukses berikutnya?</p>
            <a href="{{ route('booking') }}"
               class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-primary-500 to-primary-600 text-white font-bold text-base rounded-xl hover:from-primary-600 hover:to-primary-700 transition-all duration-300 shadow-primary hover:shadow-primary hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>Mulai Konsultasi Sekarang</span>
            </a>
        </div>
    </div>
</section>
@endif

{{-- Latest Articles Section --}}
@if($latestArticles->count() > 0)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="font-display text-4xl md:text-5xl font-bold text-brown-700 mb-4">Artikel Terbaru</h2>
            <p class="text-lg text-mauve-dark">Tips dan informasi seputar menyusui</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            @foreach($latestArticles as $article)
            <article class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-cream-200">
                {{-- Image --}}
                <div class="aspect-video bg-gradient-to-br from-rose-200 to-rose-300 flex items-center justify-center text-6xl">
                    📝
                </div>

                {{-- Content --}}
                <div class="p-6">
                    {{-- Category --}}
                    @if($article->categories->first())
                    <span class="inline-block px-3 py-1 bg-rose-100 text-rose-700 rounded-full text-xs font-semibold mb-3">
                        {{ $article->categories->first()->name }}
                    </span>
                    @endif

                    {{-- Title --}}
                    <h3 class="font-display text-xl font-semibold text-brown-700 mb-3 line-clamp-2 hover:text-rose-600 transition">
                        <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                    </h3>

                    {{-- Excerpt --}}
                    <p class="text-mauve-dark text-sm mb-4 line-clamp-3">{{ $article->excerpt }}</p>

                    {{-- Meta --}}
                    <div class="flex items-center justify-between text-xs text-mauve">
                        <span>{{ $article->published_at->diffForHumans() }}</span>
                        @if($article->read_time_minutes)
                        <span>{{ $article->read_time_minutes }} min baca</span>
                        @endif
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <div class="text-center">
            <a href="{{ route('articles.index') }}" class="inline-flex items-center text-rose-600 hover:text-rose-700 font-semibold text-lg">
                Lihat Semua Artikel
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>
    </div>
</section>
@endif

{{-- CTA Section --}}
<section class="py-20 bg-gradient-to-r from-rose-500 via-rose-600 to-rose-700 text-white relative overflow-hidden">
    {{-- Decorative Elements --}}
    <div class="absolute top-0 left-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="font-display text-4xl md:text-5xl font-bold mb-6">Siap Memulai Perjalanan Menyusui yang Lebih Baik?</h2>
        <p class="text-xl text-rose-100 mb-10 leading-relaxed">Jadwalkan konsultasi pertama Anda atau hubungi kami untuk informasi lebih lanjut</p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('booking') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white text-rose-600 font-bold text-lg rounded-xl hover:bg-rose-50 transition shadow-xl">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Jadwalkan Konsultasi
            </a>
            <a href="https://wa.me/6289560622054" target="_blank" class="inline-flex items-center justify-center px-8 py-4 bg-[#25D366] text-white font-bold text-lg rounded-xl hover:bg-[#20ba5a] transition shadow-xl">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                Chat via WhatsApp
            </a>
        </div>
    </div>
</section>

{{-- Google Maps Section --}}
<section class="py-20 bg-cream-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="font-display text-4xl md:text-5xl font-bold text-brown-700 mb-4">Lokasi Kami</h2>
            <p class="text-lg text-mauve-dark">Kunjungi klinik kami atau kami datang ke tempat Anda</p>
        </div>

        <div class="relative rounded-3xl overflow-hidden shadow-2xl">
            {{-- Google Maps Embed --}}
            {{-- TO UPDATE: Get embed code from https://maps.app.goo.gl/dWWhvFu796HURtdVA --}}
            {{-- 1. Open link in browser --}}
            {{-- 2. Click "Share" button > "Embed a map" --}}
            {{-- 3. Copy iframe code and replace below --}}
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.0942735668437!2d112.71378007501896!3d-7.382899492621895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e46e2e8d84eb%3A0x8d0a9e6a0e6a9e6a!2sCluster%20Heliconia%2C%20Griya%20Taman%20Asri!5e0!3m2!1sid!2sid!4v1704400000000!5m2!1sid!2sid"
                width="100%"
                height="450"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                class="w-full">
            </iframe>

            {{-- Info Overlay --}}
            <div class="absolute bottom-8 left-8 bg-white rounded-2xl p-6 shadow-2xl max-w-sm">
                <h3 class="font-display text-xl font-bold text-brown-700 mb-3">KOLASE</h3>
                <div class="space-y-2 text-sm text-mauve-dark">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-rose-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="flex-1">Cluster Heliconia, Jl. Griya Taman Asri Blk. EB No.32, Tawangsari, Sidoarjo, Jawa Timur 61257</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-rose-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Senin - Sabtu, 08:00 - 17:00 WIB</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-rose-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <a href="tel:0895606220540" class="hover:text-rose-600">0895-606-220-540</a>
                    </div>
                </div>
                <a href="https://maps.app.goo.gl/dWWhvFu796HURtdVA" target="_blank" class="inline-flex items-center mt-4 text-rose-600 hover:text-rose-700 font-semibold text-sm">
                    Lihat di Google Maps
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
