@extends('admin.layout')

@section('title', 'Pengaturan Website')
@section('header_title', 'Pengaturan Website')

@section('content')
{{-- Page Header --}}
<div class="mb-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Pengaturan Website</h1>
            <p class="text-gray-600 mt-1">Kelola logo, gambar, dan informasi website</p>
        </div>
    </div>
</div>

{{-- Success Message --}}
@if(session('success'))
<div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-lg">
    <div class="flex items-center">
        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
        </svg>
        <span class="text-green-700 font-medium">{{ session('success') }}</span>
    </div>
</div>
@endif

<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Logo & Images Section --}}
    <div class="bg-white rounded-lg border border-gray-200 p-6 mb-6">
        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            Logo & Gambar
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Site Logo --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Logo Website
                </label>
                @if(isset($settings['site_logo']) && $settings['site_logo'])
                <div class="mb-3 p-3 border border-gray-200 rounded-lg">
                    <img src="{{ asset('storage/' . $settings['site_logo']) }}" alt="Site Logo" class="h-20 object-contain">
                    <button type="button" onclick="deleteImage('site_logo')" class="mt-2 text-xs text-red-600 hover:text-red-700">
                        Hapus Logo
                    </button>
                </div>
                @endif
                <input type="file" name="site_logo" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, SVG. Maksimal 2MB</p>
                @error('site_logo')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Logo Dark Mode --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Logo Dark Mode
                </label>
                @if(isset($settings['site_logo_dark']) && $settings['site_logo_dark'])
                <div class="mb-3 p-3 border border-gray-200 rounded-lg bg-gray-900">
                    <img src="{{ asset('storage/' . $settings['site_logo_dark']) }}" alt="Logo Dark" class="h-20 object-contain">
                    <button type="button" onclick="deleteImage('site_logo_dark')" class="mt-2 text-xs text-red-400 hover:text-red-300">
                        Hapus Logo Dark
                    </button>
                </div>
                @endif
                <input type="file" name="site_logo_dark" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                <p class="mt-1 text-xs text-gray-500">Logo versi dark mode. Format: JPG, PNG, SVG. Maksimal 2MB</p>
                @error('site_logo_dark')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Admin Logo --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Logo Admin Panel
                </label>
                @if(isset($settings['admin_logo']) && $settings['admin_logo'])
                <div class="mb-3 p-3 border border-gray-200 rounded-lg">
                    <img src="{{ asset('storage/' . $settings['admin_logo']) }}" alt="Admin Logo" class="h-20 object-contain">
                    <button type="button" onclick="deleteImage('admin_logo')" class="mt-2 text-xs text-red-600 hover:text-red-700">
                        Hapus Logo Admin
                    </button>
                </div>
                @endif
                <input type="file" name="admin_logo" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, SVG. Maksimal 2MB</p>
                @error('admin_logo')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Profile Image --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Gambar Profil Default
                </label>
                @if(isset($settings['profile_image']) && $settings['profile_image'])
                <div class="mb-3 p-3 border border-gray-200 rounded-lg">
                    <img src="{{ asset('storage/' . $settings['profile_image']) }}" alt="Profile Image" class="h-20 w-20 rounded-full object-cover">
                    <button type="button" onclick="deleteImage('profile_image')" class="mt-2 text-xs text-red-600 hover:text-red-700">
                        Hapus Gambar Profil
                    </button>
                </div>
                @endif
                <input type="file" name="profile_image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG. Maksimal 2MB</p>
                @error('profile_image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- Browser Favicons Section --}}
    <div class="bg-white rounded-lg border border-gray-200 p-6 mb-6">
        <h3 class="text-lg font-bold text-gray-900 mb-2 flex items-center">
            <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
            </svg>
            Browser Favicons
        </h3>
        <p class="text-sm text-gray-600 mb-6">Icon yang muncul di tab browser. File akan otomatis dicopy ke folder public/</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Favicon ICO --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Favicon ICO
                </label>
                @if(isset($settings['favicon_ico']) && $settings['favicon_ico'])
                <div class="mb-3 p-3 border border-gray-200 rounded-lg">
                    <img src="{{ asset('storage/' . $settings['favicon_ico']) }}" alt="Favicon ICO" class="h-12 object-contain">
                    <button type="button" onclick="deleteImage('favicon_ico')" class="mt-2 text-xs text-red-600 hover:text-red-700">
                        Hapus
                    </button>
                </div>
                @endif
                <input type="file" name="favicon_ico" accept=".ico,.png" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                <p class="mt-1 text-xs text-gray-500">Format: ICO, PNG. Multi-size. Maks 512KB</p>
                @error('favicon_ico')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Favicon 16x16 --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Favicon 16x16
                </label>
                @if(isset($settings['favicon_16']) && $settings['favicon_16'])
                <div class="mb-3 p-3 border border-gray-200 rounded-lg">
                    <img src="{{ asset('storage/' . $settings['favicon_16']) }}" alt="Favicon 16" class="h-12 object-contain">
                    <button type="button" onclick="deleteImage('favicon_16')" class="mt-2 text-xs text-red-600 hover:text-red-700">
                        Hapus
                    </button>
                </div>
                @endif
                <input type="file" name="favicon_16" accept="image/png" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                <p class="mt-1 text-xs text-gray-500">PNG, 16x16px. Maks 256KB</p>
                @error('favicon_16')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Favicon 32x32 --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Favicon 32x32
                </label>
                @if(isset($settings['favicon_32']) && $settings['favicon_32'])
                <div class="mb-3 p-3 border border-gray-200 rounded-lg">
                    <img src="{{ asset('storage/' . $settings['favicon_32']) }}" alt="Favicon 32" class="h-12 object-contain">
                    <button type="button" onclick="deleteImage('favicon_32')" class="mt-2 text-xs text-red-600 hover:text-red-700">
                        Hapus
                    </button>
                </div>
                @endif
                <input type="file" name="favicon_32" accept="image/png" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                <p class="mt-1 text-xs text-gray-500">PNG, 32x32px. Maks 256KB</p>
                @error('favicon_32')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- PWA Icons Section --}}
    <div class="bg-white rounded-lg border border-gray-200 p-6 mb-6">
        <h3 class="text-lg font-bold text-gray-900 mb-2 flex items-center">
            <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
            </svg>
            PWA Icons (Progressive Web App)
        </h3>
        <p class="text-sm text-gray-600 mb-6">Icon untuk instalasi website di perangkat mobile. File akan otomatis dicopy ke folder public/</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Apple Touch Icon --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Apple Touch Icon
                </label>
                @if(isset($settings['apple_touch_icon']) && $settings['apple_touch_icon'])
                <div class="mb-3 p-3 border border-gray-200 rounded-lg">
                    <img src="{{ asset('storage/' . $settings['apple_touch_icon']) }}" alt="Apple Touch Icon" class="h-16 object-contain">
                    <button type="button" onclick="deleteImage('apple_touch_icon')" class="mt-2 text-xs text-red-600 hover:text-red-700">
                        Hapus
                    </button>
                </div>
                @endif
                <input type="file" name="apple_touch_icon" accept="image/png" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                <p class="mt-1 text-xs text-gray-500">PNG, 180x180px. iOS home screen. Maks 1MB</p>
                @error('apple_touch_icon')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Android Chrome 192 --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Android Chrome 192x192
                </label>
                @if(isset($settings['android_chrome_192']) && $settings['android_chrome_192'])
                <div class="mb-3 p-3 border border-gray-200 rounded-lg">
                    <img src="{{ asset('storage/' . $settings['android_chrome_192']) }}" alt="Android 192" class="h-16 object-contain">
                    <button type="button" onclick="deleteImage('android_chrome_192')" class="mt-2 text-xs text-red-600 hover:text-red-700">
                        Hapus
                    </button>
                </div>
                @endif
                <input type="file" name="android_chrome_192" accept="image/png" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                <p class="mt-1 text-xs text-gray-500">PNG, 192x192px. Android home. Maks 1MB</p>
                @error('android_chrome_192')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Android Chrome 512 --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Android Chrome 512x512
                </label>
                @if(isset($settings['android_chrome_512']) && $settings['android_chrome_512'])
                <div class="mb-3 p-3 border border-gray-200 rounded-lg">
                    <img src="{{ asset('storage/' . $settings['android_chrome_512']) }}" alt="Android 512" class="h-16 object-contain">
                    <button type="button" onclick="deleteImage('android_chrome_512')" class="mt-2 text-xs text-red-600 hover:text-red-700">
                        Hapus
                    </button>
                </div>
                @endif
                <input type="file" name="android_chrome_512" accept="image/png" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                <p class="mt-1 text-xs text-gray-500">PNG, 512x512px. Android splash. Maks 2MB</p>
                @error('android_chrome_512')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- Social Media Images Section --}}
    <div class="bg-white rounded-lg border border-gray-200 p-6 mb-6">
        <h3 class="text-lg font-bold text-gray-900 mb-2 flex items-center">
            <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
            </svg>
            Social Media Images
        </h3>
        <p class="text-sm text-gray-600 mb-6">Gambar yang muncul saat link website dibagikan di social media</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- OG Image --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Open Graph Image
                </label>
                @if(isset($settings['og_image']) && $settings['og_image'])
                <div class="mb-3 p-3 border border-gray-200 rounded-lg">
                    <img src="{{ asset('storage/' . $settings['og_image']) }}" alt="OG Image" class="h-24 object-cover rounded">
                    <button type="button" onclick="deleteImage('og_image')" class="mt-2 text-xs text-red-600 hover:text-red-700">
                        Hapus
                    </button>
                </div>
                @endif
                <input type="file" name="og_image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                <p class="mt-1 text-xs text-gray-500">1200x630px. Untuk Facebook, WhatsApp, LinkedIn. Maks 2MB</p>
                @error('og_image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Twitter Image --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Twitter Card Image
                </label>
                @if(isset($settings['twitter_image']) && $settings['twitter_image'])
                <div class="mb-3 p-3 border border-gray-200 rounded-lg">
                    <img src="{{ asset('storage/' . $settings['twitter_image']) }}" alt="Twitter Image" class="h-24 object-cover rounded">
                    <button type="button" onclick="deleteImage('twitter_image')" class="mt-2 text-xs text-red-600 hover:text-red-700">
                        Hapus
                    </button>
                </div>
                @endif
                <input type="file" name="twitter_image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                <p class="mt-1 text-xs text-gray-500">1200x600px. Untuk Twitter/X. Maks 2MB</p>
                @error('twitter_image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- Site Information --}}
    <div class="bg-white rounded-lg border border-gray-200 p-6 mb-6">
        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Informasi Website
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Site Name --}}
            <div>
                <label for="site_name" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Website
                </label>
                <input type="text" id="site_name" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? 'KOLASE') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                @error('site_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Site Tagline --}}
            <div>
                <label for="site_tagline" class="block text-sm font-semibold text-gray-700 mb-2">
                    Tagline
                </label>
                <input type="text" id="site_tagline" name="site_tagline" value="{{ old('site_tagline', $settings['site_tagline'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                @error('site_tagline')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- Contact Information --}}
    <div class="bg-white rounded-lg border border-gray-200 p-6 mb-6">
        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            Informasi Kontak
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Contact Email --}}
            <div>
                <label for="contact_email" class="block text-sm font-semibold text-gray-700 mb-2">
                    Email Kontak
                </label>
                <input type="email" id="contact_email" name="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                @error('contact_email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Contact Phone --}}
            <div>
                <label for="contact_phone" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nomor Telepon
                </label>
                <input type="text" id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500" placeholder="+62 812 3456 7890">
                @error('contact_phone')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- WhatsApp --}}
            <div>
                <label for="contact_whatsapp" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nomor WhatsApp
                </label>
                <input type="text" id="contact_whatsapp" name="contact_whatsapp" value="{{ old('contact_whatsapp', $settings['contact_whatsapp'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500" placeholder="6281234567890">
                <p class="mt-1 text-xs text-gray-500">Masukkan dengan format internasional (tanpa +)</p>
                @error('contact_whatsapp')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Contact Address --}}
            <div class="md:col-span-2">
                <label for="contact_address" class="block text-sm font-semibold text-gray-700 mb-2">
                    Alamat Lengkap
                </label>
                <textarea id="contact_address" name="contact_address" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500" placeholder="Alamat lengkap kantor/klinik/lokasi layanan">{{ old('contact_address', $settings['contact_address'] ?? '') }}</textarea>
                <p class="mt-1 text-xs text-gray-500">Alamat yang ditampilkan di halaman kontak dan footer</p>
                @error('contact_address')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- Social Media --}}
    <div class="bg-white rounded-lg border border-gray-200 p-6 mb-6">
        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
            </svg>
            Media Sosial
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Facebook --}}
            <div>
                <label for="social_facebook" class="block text-sm font-semibold text-gray-700 mb-2">
                    Facebook URL
                </label>
                <input type="url" id="social_facebook" name="social_facebook" value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500" placeholder="https://facebook.com/kolase">
                @error('social_facebook')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Instagram --}}
            <div>
                <label for="social_instagram" class="block text-sm font-semibold text-gray-700 mb-2">
                    Instagram URL
                </label>
                <input type="url" id="social_instagram" name="social_instagram" value="{{ old('social_instagram', $settings['social_instagram'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500" placeholder="https://instagram.com/kolase">
                @error('social_instagram')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Twitter --}}
            <div>
                <label for="social_twitter" class="block text-sm font-semibold text-gray-700 mb-2">
                    Twitter/X URL
                </label>
                <input type="url" id="social_twitter" name="social_twitter" value="{{ old('social_twitter', $settings['social_twitter'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500" placeholder="https://twitter.com/kolase">
                @error('social_twitter')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- Submit Button --}}
    <div class="flex items-center justify-end gap-4">
        <button type="submit" class="px-8 py-3 bg-rose-600 text-white font-semibold rounded-lg hover:bg-rose-700 transition shadow-sm flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            Simpan Pengaturan
        </button>
    </div>
</form>

<script>
function deleteImage(key) {
    if (!confirm('Apakah Anda yakin ingin menghapus gambar ini?')) {
        return;
    }

    fetch('{{ route("admin.settings.deleteImage") }}', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ key: key })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert(data.message || 'Gagal menghapus gambar');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menghapus gambar');
    });
}
</script>
@endsection
