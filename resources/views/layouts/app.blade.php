<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO Meta Tags --}}
    <title>@yield('seo_title', 'KOLASE - Konselor Menyusui Sepanjang | Konsultasi Laktasi Profesional')</title>
    <meta name="description" content="@yield('seo_description', 'Layanan konseling menyusui profesional. Pendampingan dari persiapan hamil hingga relaktasi. Home visit tersedia. Hubungi 0895-606-220-540.')">
    <meta name="keywords" content="@yield('seo_keywords', 'konselor menyusui, konsultan laktasi, konseling ASI, pijat laktasi, relaktasi, masalah menyusui')">
    <meta name="author" content="KOLASE">
    <meta name="robots" content="index, follow">

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Favicons & App Icons --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('seo_title', 'KOLASE - Konselor Menyusui Sepanjang')">
    <meta property="og:description" content="@yield('seo_description', 'Layanan konseling menyusui profesional')">
    @php
        $ogImage = \App\Models\Setting::get('og_image');
        $ogImageUrl = $ogImage ? asset('storage/' . $ogImage) : asset('images/og-image.jpg');
    @endphp
    <meta property="og:image" content="{{ $ogImageUrl }}">
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="KOLASE">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('seo_title', 'KOLASE - Konselor Menyusui Sepanjang')">
    <meta name="twitter:description" content="@yield('seo_description')">
    @php
        $twitterImage = \App\Models\Setting::get('twitter_image');
        $twitterImageUrl = $twitterImage ? asset('storage/' . $twitterImage) : $ogImageUrl;
    @endphp
    <meta name="twitter:image" content="{{ $twitterImageUrl }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Nunito:wght@300;400;500;600;700&family=Dancing+Script:wght@400;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    {{-- Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="font-body bg-cream-50 text-brown-700 antialiased">

    {{-- Navigation --}}
    <nav x-data="{ mobileMenuOpen: false, scrolled: false }"
         @scroll.window="scrolled = window.pageYOffset > 20"
         :class="scrolled ? 'glass shadow-lg' : 'bg-white/95 backdrop-blur-sm shadow-md'"
         class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <div class="text-primary-500 text-3xl transition-transform group-hover:scale-110 duration-300">🤱</div>
                    <div>
                        <div class="font-display text-2xl font-bold bg-gradient-to-r from-primary-500 to-primary-600 bg-clip-text text-transparent">
                            KOLASE
                        </div>
                        <div class="font-script text-xs text-secondary-400 -mt-1">Konselor Menyusui Sepanjang</div>
                    </div>
                </a>

                {{-- Desktop Menu --}}
                <div class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}"
                       class="relative px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('home') ? 'text-primary-600 bg-primary-50' : 'text-neutral-700 hover:text-primary-500 hover:bg-primary-50/50' }}">
                        <span>Beranda</span>
                        @if(request()->routeIs('home'))
                        <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-1/2 h-0.5 bg-primary-500 rounded-full"></span>
                        @endif
                    </a>
                    <a href="{{ route('services.index') }}"
                       class="relative px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('services.*') ? 'text-primary-600 bg-primary-50' : 'text-neutral-700 hover:text-primary-500 hover:bg-primary-50/50' }}">
                        <span>Layanan</span>
                        @if(request()->routeIs('services.*'))
                        <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-1/2 h-0.5 bg-primary-500 rounded-full"></span>
                        @endif
                    </a>
                    <a href="{{ route('articles.index') }}"
                       class="relative px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('articles.*') ? 'text-primary-600 bg-primary-50' : 'text-neutral-700 hover:text-primary-500 hover:bg-primary-50/50' }}">
                        <span>Artikel</span>
                        @if(request()->routeIs('articles.*'))
                        <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-1/2 h-0.5 bg-primary-500 rounded-full"></span>
                        @endif
                    </a>
                    <a href="{{ route('about') }}"
                       class="relative px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('about') ? 'text-primary-600 bg-primary-50' : 'text-neutral-700 hover:text-primary-500 hover:bg-primary-50/50' }}">
                        <span>Tentang</span>
                        @if(request()->routeIs('about'))
                        <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-1/2 h-0.5 bg-primary-500 rounded-full"></span>
                        @endif
                    </a>
                    <a href="{{ route('contact') }}"
                       class="relative px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('contact') ? 'text-primary-600 bg-primary-50' : 'text-neutral-700 hover:text-primary-500 hover:bg-primary-50/50' }}">
                        <span>Kontak</span>
                        @if(request()->routeIs('contact'))
                        <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-1/2 h-0.5 bg-primary-500 rounded-full"></span>
                        @endif
                    </a>

                    {{-- CTA Button --}}
                    <div class="ml-4">
                        <a href="{{ route('booking') }}"
                           class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-primary-500 to-primary-600 text-white text-sm font-semibold rounded-xl hover:from-primary-600 hover:to-primary-700 transition-all duration-300 shadow-primary hover:shadow-primary hover:scale-105">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>Booking Sekarang</span>
                        </a>
                    </div>
                </div>

                {{-- Mobile Menu Button --}}
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="lg:hidden p-2.5 rounded-xl text-neutral-700 hover:bg-primary-50 hover:text-primary-500 transition-all duration-200">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="lg:hidden border-t border-neutral-200/50 bg-white/98 backdrop-blur-md"
             x-cloak>
            <div class="max-w-7xl mx-auto px-4 py-6 space-y-1">
                <a href="{{ route('home') }}"
                   class="block px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('home') ? 'bg-primary-50 text-primary-600' : 'text-neutral-700 hover:bg-primary-50/50 hover:text-primary-500' }}">
                    Beranda
                </a>
                <a href="{{ route('services.index') }}"
                   class="block px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('services.*') ? 'bg-primary-50 text-primary-600' : 'text-neutral-700 hover:bg-primary-50/50 hover:text-primary-500' }}">
                    Layanan
                </a>
                <a href="{{ route('articles.index') }}"
                   class="block px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('articles.*') ? 'bg-primary-50 text-primary-600' : 'text-neutral-700 hover:bg-primary-50/50 hover:text-primary-500' }}">
                    Artikel
                </a>
                <a href="{{ route('about') }}"
                   class="block px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('about') ? 'bg-primary-50 text-primary-600' : 'text-neutral-700 hover:bg-primary-50/50 hover:text-primary-500' }}">
                    Tentang
                </a>
                <a href="{{ route('contact') }}"
                   class="block px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('contact') ? 'bg-primary-50 text-primary-600' : 'text-neutral-700 hover:bg-primary-50/50 hover:text-primary-500' }}">
                    Kontak
                </a>

                {{-- Mobile CTA --}}
                <div class="pt-4">
                    <a href="{{ route('booking') }}"
                       class="block w-full text-center px-6 py-3.5 bg-gradient-to-r from-primary-500 to-primary-600 text-white font-semibold rounded-xl shadow-primary hover:from-primary-600 hover:to-primary-700 transition-all duration-300">
                        <div class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>Booking Sekarang</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="pt-20">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gradient-to-br from-neutral-900 via-neutral-800 to-neutral-900 text-white relative overflow-hidden">
        {{-- Decorative Elements --}}
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-0 right-0 w-96 h-96 bg-primary-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-accent-500 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8">
                {{-- Brand Column --}}
                <div class="lg:col-span-1">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="text-5xl">🤱</div>
                        <div>
                            <div class="font-display text-2xl font-bold bg-gradient-to-r from-primary-400 to-accent-400 bg-clip-text text-transparent">
                                KOLASE
                            </div>
                            <div class="font-script text-sm text-neutral-400">Konselor Menyusui Sepanjang</div>
                        </div>
                    </div>
                    <p class="text-neutral-300 text-sm mb-6 leading-relaxed">
                        Layanan konseling menyusui profesional dengan pendekatan holistik dan evidence-based untuk mendukung perjalanan menyusui Anda.
                    </p>

                    {{-- Social Media --}}
                    <div class="flex items-center gap-3 mb-6">
                        <a href="#"
                           class="group w-11 h-11 flex items-center justify-center rounded-xl bg-white/5 border border-white/10 hover:bg-primary-500 hover:border-primary-500 transition-all duration-300">
                            <svg class="w-5 h-5 text-neutral-400 group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#"
                           class="group w-11 h-11 flex items-center justify-center rounded-xl bg-white/5 border border-white/10 hover:bg-gradient-to-br hover:from-purple-600 hover:via-pink-600 hover:to-orange-500 hover:border-transparent transition-all duration-300">
                            <svg class="w-5 h-5 text-neutral-400 group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="https://wa.me/6289560622054"
                           class="group w-11 h-11 flex items-center justify-center rounded-xl bg-white/5 border border-white/10 hover:bg-[#25D366] hover:border-[#25D366] transition-all duration-300">
                            <svg class="w-5 h-5 text-neutral-400 group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                        </a>
                    </div>

                    {{-- Certification Badge --}}
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/5 border border-white/10 rounded-xl">
                        <svg class="w-5 h-5 text-accent-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-xs font-semibold text-neutral-300">Tersertifikasi</span>
                    </div>
                </div>

                {{-- Layanan Column --}}
                <div>
                    <h3 class="font-display text-lg font-bold text-white mb-6 flex items-center">
                        <span class="w-1 h-5 bg-primary-500 rounded-full mr-2"></span>
                        Layanan
                    </h3>
                    <ul class="space-y-3 text-sm">
                        <li>
                            <a href="{{ route('services.show', 'persiapan-menyusui-bumil') }}"
                               class="text-neutral-300 hover:text-primary-400 transition-colors duration-200 flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-neutral-500 group-hover:text-primary-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Persiapan Menyusui
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'menyusui-newborn') }}"
                               class="text-neutral-300 hover:text-primary-400 transition-colors duration-200 flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-neutral-500 group-hover:text-primary-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Menyusui Newborn
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'payudara-sakit') }}"
                               class="text-neutral-300 hover:text-primary-400 transition-colors duration-200 flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-neutral-500 group-hover:text-primary-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Payudara Sakit
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'pumping') }}"
                               class="text-neutral-300 hover:text-primary-400 transition-colors duration-200 flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-neutral-500 group-hover:text-primary-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Pumping
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'relaktasi') }}"
                               class="text-neutral-300 hover:text-primary-400 transition-colors duration-200 flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-neutral-500 group-hover:text-primary-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Relaktasi
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'pijat-laktasi') }}"
                               class="text-neutral-300 hover:text-primary-400 transition-colors duration-200 flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-neutral-500 group-hover:text-primary-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Pijat Laktasi
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Informasi Column --}}
                <div>
                    <h3 class="font-display text-lg font-bold text-white mb-6 flex items-center">
                        <span class="w-1 h-5 bg-accent-500 rounded-full mr-2"></span>
                        Informasi
                    </h3>
                    <ul class="space-y-3 text-sm">
                        <li>
                            <a href="{{ route('about') }}"
                               class="text-neutral-300 hover:text-accent-400 transition-colors duration-200 flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-neutral-500 group-hover:text-accent-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Tentang KOLASE
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('articles.index') }}"
                               class="text-neutral-300 hover:text-accent-400 transition-colors duration-200 flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-neutral-500 group-hover:text-accent-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Artikel & Blog
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('faq') }}"
                               class="text-neutral-300 hover:text-accent-400 transition-colors duration-200 flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-neutral-500 group-hover:text-accent-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                FAQ
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}"
                               class="text-neutral-300 hover:text-accent-400 transition-colors duration-200 flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-neutral-500 group-hover:text-accent-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Kontak
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('booking') }}"
                               class="text-neutral-300 hover:text-accent-400 transition-colors duration-200 flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-neutral-500 group-hover:text-accent-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Booking Online
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Kontak Column --}}
                <div>
                    <h3 class="font-display text-lg font-bold text-white mb-6 flex items-center">
                        <span class="w-1 h-5 bg-secondary-500 rounded-full mr-2"></span>
                        Hubungi Kami
                    </h3>
                    <ul class="space-y-4 text-sm">
                        <li>
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-10 h-10 bg-white/5 rounded-xl flex items-center justify-center border border-white/10">
                                    <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-white font-semibold mb-1">Lokasi</div>
                                    <a href="https://maps.app.goo.gl/dWWhvFu796HURtdVA" target="_blank"
                                       class="text-neutral-300 hover:text-primary-400 transition-colors duration-200 leading-relaxed">
                                        Sidoarjo, Jawa Timur
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-10 h-10 bg-white/5 rounded-xl flex items-center justify-center border border-white/10">
                                    <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-white font-semibold mb-1">Telepon</div>
                                    <a href="https://wa.me/6289560622054"
                                       class="text-neutral-300 hover:text-primary-400 transition-colors duration-200">
                                        0895-606-220-540
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-10 h-10 bg-white/5 rounded-xl flex items-center justify-center border border-white/10">
                                    <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-white font-semibold mb-1">Jam Operasional</div>
                                    <div class="text-neutral-300">
                                        <div>Senin - Sabtu</div>
                                        <div>08:00 - 17:00 WIB</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Bottom Bar --}}
            <div class="mt-16 pt-8 border-t border-white/10">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-sm">
                    <div class="text-neutral-400 text-center md:text-left">
                        &copy; {{ date('Y') }} <span class="text-white font-semibold">KOLASE</span>. All rights reserved.
                    </div>
                    <div class="flex flex-wrap items-center justify-center gap-4 text-neutral-400">
                        <a href="{{ route('privacy') }}"
                           class="hover:text-primary-400 transition-colors duration-200">
                            Kebijakan Privasi
                        </a>
                        <span class="text-neutral-600">•</span>
                        <a href="{{ route('terms') }}"
                           class="hover:text-primary-400 transition-colors duration-200">
                            Syarat & Ketentuan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    {{-- WhatsApp Floating Button --}}
    <div class="fixed bottom-6 right-6 z-1030"
         x-data="{ showTooltip: false }">
        {{-- Pulse Rings --}}
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="absolute w-16 h-16 bg-whatsapp rounded-full opacity-75 animate-ping"></div>
            <div class="absolute w-16 h-16 bg-whatsapp rounded-full opacity-50 animate-pulse-slow"></div>
        </div>

        {{-- Button --}}
        <a href="https://wa.me/6289560622054?text=Halo%20KOLASE%2C%20saya%20ingin%20bertanya%20tentang%20layanan%20konseling%20menyusui."
           target="_blank"
           rel="noopener noreferrer"
           @mouseenter="showTooltip = true"
           @mouseleave="showTooltip = false"
           class="relative flex items-center justify-center w-16 h-16 bg-whatsapp text-white rounded-full shadow-xl hover:shadow-2xl hover:scale-110 transition-all duration-300 group">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
            </svg>
        </a>

        {{-- Tooltip --}}
        <div x-show="showTooltip"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 translate-x-2"
             x-transition:enter-end="opacity-100 translate-x-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-x-0"
             x-transition:leave-end="opacity-0 translate-x-2"
             class="absolute right-full mr-4 top-1/2 transform -translate-y-1/2 px-4 py-2 bg-neutral-800 text-white text-sm font-medium rounded-xl shadow-lg whitespace-nowrap"
             x-cloak>
            <span>Butuh Bantuan? Chat Kami!</span>
            {{-- Arrow --}}
            <div class="absolute top-1/2 -right-1 transform -translate-y-1/2 w-2 h-2 bg-neutral-800 rotate-45"></div>
        </div>
    </div>

    {{-- Alpine Cloak Style --}}
    <style>
        [x-cloak] { display: none !important; }
    </style>

    @stack('scripts')
</body>
</html>
