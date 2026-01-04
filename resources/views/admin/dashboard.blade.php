@extends('admin.layout')

@section('title', 'Dashboard')
@section('header_title', 'Dashboard')

@section('content')

{{-- Welcome Message --}}
<div class="mb-8">
    <h2 class="text-2xl font-bold text-gray-800">Selamat datang, {{ session('admin_name') }}!</h2>
    <p class="text-gray-600 mt-1">Berikut ringkasan aktivitas sistem KOLASE hari ini</p>
</div>

{{-- Statistics Cards --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

    {{-- Total Bookings --}}
    <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-blue-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Booking</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['total_bookings'] }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Pending Bookings --}}
    <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-amber-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Menunggu Konfirmasi</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['pending_bookings'] }}</p>
            </div>
            <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Confirmed Bookings --}}
    <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Dikonfirmasi</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['confirmed_bookings'] }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Total Services --}}
    <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-rose-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Layanan</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['total_services'] }}</p>
            </div>
            <div class="w-12 h-12 bg-rose-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Pending Testimonials --}}
    <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-purple-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Testimonial Pending</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['pending_testimonials'] }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Published Articles --}}
    <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-teal-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Artikel Published</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['published_articles'] }}</p>
            </div>
            <div class="w-12 h-12 bg-teal-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
            </div>
        </div>
    </div>

</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

    {{-- Recent Bookings --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-800">Booking Terbaru</h3>
            <a href="{{ route('admin.consultations.index') }}" class="text-sm text-rose-600 hover:text-rose-700 font-semibold">Lihat Semua →</a>
        </div>

        @if($recentBookings->count() > 0)
        <div class="divide-y divide-gray-200">
            @foreach($recentBookings as $booking)
            <div class="px-6 py-4 hover:bg-gray-50 transition">
                <div class="flex items-center justify-between mb-2">
                    <div class="font-semibold text-gray-800">{{ $booking->mother_name }}</div>
                    <span class="px-3 py-1 text-xs font-semibold rounded-full
                        {{ $booking->status === 'pending' ? 'bg-amber-100 text-amber-700' : '' }}
                        {{ $booking->status === 'confirmed' ? 'bg-green-100 text-green-700' : '' }}
                        {{ $booking->status === 'completed' ? 'bg-blue-100 text-blue-700' : '' }}
                        {{ $booking->status === 'cancelled' ? 'bg-red-100 text-red-700' : '' }}">
                        {{ ucfirst($booking->status) }}
                    </span>
                </div>
                <div class="text-sm text-gray-600">{{ $booking->service->name }}</div>
                <div class="text-xs text-gray-500 mt-1">{{ $booking->created_at->diffForHumans() }}</div>
            </div>
            @endforeach
        </div>
        @else
        <div class="px-6 py-12 text-center text-gray-500">
            <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <p>Belum ada booking</p>
        </div>
        @endif
    </div>

    {{-- Popular Services --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-800">Layanan Populer</h3>
            <a href="{{ route('admin.services.index') }}" class="text-sm text-rose-600 hover:text-rose-700 font-semibold">Kelola →</a>
        </div>

        @if($popularServices->count() > 0)
        <div class="divide-y divide-gray-200">
            @foreach($popularServices as $service)
            <div class="px-6 py-4 hover:bg-gray-50 transition">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="text-3xl">{{ $service->icon }}</div>
                        <div>
                            <div class="font-semibold text-gray-800">{{ $service->name }}</div>
                            <div class="text-sm text-gray-600">{{ $service->consultations_count }} booking</div>
                        </div>
                    </div>
                    <span class="px-3 py-1 {{ $service->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }} text-xs font-semibold rounded-full">
                        {{ $service->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="px-6 py-12 text-center text-gray-500">
            <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
            </svg>
            <p>Belum ada layanan</p>
        </div>
        @endif
    </div>

</div>

@endsection
