<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') | KOLASE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50" x-data="{ sidebarOpen: false }">

    <div class="min-h-screen flex">
        {{-- Sidebar --}}
        <aside class="fixed inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-rose-600 to-rose-700 text-white transform transition-transform duration-300 lg:translate-x-0"
               :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

            {{-- Logo --}}
            <div class="h-16 flex items-center justify-center border-b border-rose-500">
                <div class="flex items-center space-x-2">
                    <div class="text-3xl">🤱</div>
                    <div>
                        <div class="font-display text-xl font-bold">KOLASE</div>
                        <div class="text-xs text-rose-200">Admin Panel</div>
                    </div>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="mt-6 px-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-white text-rose-600' : 'hover:bg-rose-500' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.consultations.index') }}"
                   class="flex items-center px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.consultations.*') ? 'bg-white text-rose-600' : 'hover:bg-rose-500' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Konsultasi
                </a>

                <a href="{{ route('admin.services.index') }}"
                   class="flex items-center px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.services.*') ? 'bg-white text-rose-600' : 'hover:bg-rose-500' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    Layanan
                </a>

                <a href="{{ route('admin.testimonials.index') }}"
                   class="flex items-center px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.testimonials.*') ? 'bg-white text-rose-600' : 'hover:bg-rose-500' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                    Testimonial
                </a>

                <a href="{{ route('admin.articles.index') }}"
                   class="flex items-center px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.articles.*') ? 'bg-white text-rose-600' : 'hover:bg-rose-500' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Artikel
                </a>

                <a href="{{ route('admin.schedules.index') }}"
                   class="flex items-center px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.schedules.*') ? 'bg-white text-rose-600' : 'hover:bg-rose-500' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Jadwal Konsultasi
                </a>

                <a href="{{ route('admin.settings.index') }}"
                   class="flex items-center px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.settings.*') ? 'bg-white text-rose-600' : 'hover:bg-rose-500' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Pengaturan
                </a>
            </nav>

            {{-- Logout --}}
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-rose-500">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="w-full flex items-center px-4 py-3 rounded-xl hover:bg-rose-500 transition text-left">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        {{-- Overlay for mobile --}}
        <div x-show="sidebarOpen"
             @click="sidebarOpen = false"
             class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
        </div>

        {{-- Main Content --}}
        <div class="flex-1 lg:ml-64">

            {{-- Top Bar --}}
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-4 lg:px-8 sticky top-0 z-30">
                {{-- Mobile Menu Button --}}
                <button @click="sidebarOpen = !sidebarOpen"
                        class="lg:hidden p-2 rounded-lg hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                {{-- Page Title --}}
                <h1 class="text-xl font-semibold text-gray-800">@yield('header_title', 'Dashboard')</h1>

                {{-- Admin Info --}}
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" target="_blank" class="text-sm text-gray-600 hover:text-rose-600 hidden md:block">
                        Lihat Website
                    </a>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-rose-100 rounded-full flex items-center justify-center text-rose-600 font-semibold">
                            {{ substr(session('admin_name'), 0, 1) }}
                        </div>
                        <div class="hidden md:block">
                            <div class="text-sm font-semibold text-gray-700">{{ session('admin_name') }}</div>
                            <div class="text-xs text-gray-500">Admin</div>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Content Area --}}
            <main class="p-4 lg:p-8">

                {{-- Success/Error Messages --}}
                @if(session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-xl">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-green-700 text-sm">{{ session('success') }}</span>
                    </div>
                </div>
                @endif

                @if(session('error'))
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-xl">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-red-700 text-sm">{{ session('error') }}</span>
                    </div>
                </div>
                @endif

                {{-- Main Content --}}
                @yield('content')
            </main>

            {{-- Footer --}}
            <footer class="border-t border-gray-200 py-6 px-4 lg:px-8 text-center text-sm text-gray-600">
                <p>&copy; {{ date('Y') }} KOLASE Admin Panel. All rights reserved.</p>
            </footer>
        </div>
    </div>

</body>
</html>
