@extends('admin.layout')

@section('title', 'Edit Layanan')
@section('header_title', 'Edit Layanan')

@section('content')
{{-- Breadcrumb --}}
<div class="mb-6">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.services.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-rose-600">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    Layanan
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Edit: {{ $service->name }}</span>
                </div>
            </li>
        </ol>
    </nav>
</div>

{{-- Service Info Card --}}
<div class="bg-gradient-to-br from-rose-50 to-pink-50 rounded-2xl p-1 mb-6">
    <div class="bg-white rounded-xl p-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="w-16 h-16 bg-gradient-to-br from-rose-100 to-pink-100 rounded-xl flex items-center justify-center text-3xl mr-4">
                    {{ $service->icon ?? '📋' }}
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">{{ $service->name }}</h2>
                    <p class="text-sm text-gray-600 mt-1">{{ $service->tagline }}</p>
                    <div class="flex items-center gap-3 mt-2">
                        @if($service->is_active)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Aktif
                        </span>
                        @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            Nonaktif
                        </span>
                        @endif

                        @if($service->is_featured)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-700">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            Unggulan
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Quick Stats --}}
            <div class="hidden md:flex items-center gap-6">
                <div class="text-center">
                    <div class="text-2xl font-bold text-gray-900">{{ $service->duration_minutes }}</div>
                    <div class="text-xs text-gray-500">Menit</div>
                </div>
                @if($service->price)
                <div class="text-center">
                    <div class="text-2xl font-bold text-gray-900">Rp {{ number_format($service->price, 0, ',', '.') }}</div>
                    <div class="text-xs text-gray-500">Harga</div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Form Card --}}
<div class="bg-gradient-to-br from-rose-50 to-pink-50 rounded-2xl p-1 mb-8">
    <div class="bg-white rounded-xl p-8">
        <div class="flex items-center mb-6">
            <div class="w-12 h-12 bg-rose-100 rounded-xl flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Edit Layanan</h2>
                <p class="text-sm text-gray-600 mt-1">Update informasi layanan di bawah ini</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.services.update', $service->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @include('admin.services._form')
        </form>
    </div>
</div>

{{-- Danger Zone --}}
<div class="bg-red-50 border-l-4 border-red-400 p-6 rounded-lg">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
        </div>
        <div class="ml-3 flex-1">
            <h3 class="text-sm font-semibold text-red-800">Zona Berbahaya</h3>
            <div class="mt-2 text-sm text-red-700">
                <p>Menghapus layanan akan menghapus semua data terkait termasuk booking konsultasi dan testimoni. Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="mt-4">
                <form method="POST" action="{{ route('admin.services.destroy', $service->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini? Tindakan ini tidak dapat dibatalkan!');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm font-semibold rounded-lg hover:bg-red-700 transition">
                        Hapus Layanan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
