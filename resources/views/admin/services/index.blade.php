@extends('admin.layout')

@section('title', 'Manajemen Layanan')
@section('header_title', 'Manajemen Layanan')

@section('content')
<div x-data="{
    showToast: false,
    toastMessage: '',
    toastType: 'success',
    toggleStatus(serviceId, currentStatus) {
        fetch(`/admin/services/${serviceId}/toggle-status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
            },
            body: JSON.stringify({ is_active: !currentStatus })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                this.toastMessage = data.message;
                this.toastType = 'success';
                this.showToast = true;
                setTimeout(() => window.location.reload(), 1000);
            }
        })
        .catch(error => {
            this.toastMessage = 'Terjadi kesalahan';
            this.toastType = 'error';
            this.showToast = true;
        });
    }
}">

{{-- Toast Notification --}}
<div x-show="showToast"
     x-transition
     class="fixed top-4 right-4 z-50 max-w-sm">
    <div :class="toastType === 'success' ? 'bg-green-500' : 'bg-red-500'"
         class="text-white px-6 py-4 rounded-lg shadow-lg flex items-center">
        <svg x-show="toastType === 'success'" class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        <svg x-show="toastType === 'error'" class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
        <span x-text="toastMessage"></span>
    </div>
</div>

{{-- Stats Cards --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    {{-- Total Services --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
        </div>
        <div class="text-2xl font-bold text-gray-900">{{ $stats['total'] ?? 0 }}</div>
        <div class="text-sm text-gray-600 mt-1">Total Layanan</div>
    </div>

    {{-- Active Services --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <div class="text-2xl font-bold text-gray-900">{{ $stats['active'] ?? 0 }}</div>
        <div class="text-sm text-gray-600 mt-1">Aktif</div>
    </div>

    {{-- Inactive Services --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                </svg>
            </div>
        </div>
        <div class="text-2xl font-bold text-gray-900">{{ $stats['inactive'] ?? 0 }}</div>
        <div class="text-sm text-gray-600 mt-1">Tidak Aktif</div>
    </div>

    {{-- Featured Services --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
            </div>
        </div>
        <div class="text-2xl font-bold text-gray-900">{{ $stats['featured'] ?? 0 }}</div>
        <div class="text-sm text-gray-600 mt-1">Unggulan</div>
    </div>
</div>

{{-- Action Bar --}}
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <h2 class="text-xl font-bold text-gray-900">Daftar Layanan</h2>
    <a href="{{ route('admin.services.create') }}"
       class="inline-flex items-center px-6 py-3 bg-rose-600 text-white font-semibold rounded-lg hover:bg-rose-700 transition shadow-sm">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
        </svg>
        Tambah Layanan
    </a>
</div>

{{-- Filters and Search --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
    <form method="GET" action="{{ route('admin.services.index') }}" class="flex flex-col md:flex-row gap-4">
        {{-- Search --}}
        <div class="flex-1">
            <div class="relative">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari nama layanan atau deskripsi..."
                       class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                <svg class="absolute left-3 top-3 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>

        {{-- Status Filter --}}
        <div class="w-full md:w-48">
            <select name="status"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                <option value="">Semua Status</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                <option value="featured" {{ request('status') == 'featured' ? 'selected' : '' }}>Unggulan</option>
            </select>
        </div>

        {{-- Filter Button --}}
        <button type="submit" class="px-6 py-2.5 bg-rose-600 text-white font-semibold rounded-lg hover:bg-rose-700 transition">
            Filter
        </button>

        {{-- Reset Button --}}
        @if(request('search') || request('status'))
        <a href="{{ route('admin.services.index') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition">
            Reset
        </a>
        @endif
    </form>
</div>

{{-- Services Table --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Layanan</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Durasi</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Harga</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($services as $service)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-rose-100 to-pink-100 rounded-xl flex items-center justify-center text-2xl mr-4 flex-shrink-0">
                                {{ $service->icon ?? '📋' }}
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="font-semibold text-gray-900 truncate">{{ $service->name }}</div>
                                <div class="text-sm text-gray-600 line-clamp-1">{{ $service->tagline }}</div>
                                @if($service->badge)
                                <span class="inline-block mt-1 px-2 py-1 rounded text-xs font-semibold
                                    @if($service->badge_color === 'rose') bg-rose-100 text-rose-700
                                    @elseif($service->badge_color === 'amber') bg-amber-100 text-amber-700
                                    @elseif($service->badge_color === 'blue') bg-blue-100 text-blue-700
                                    @elseif($service->badge_color === 'green') bg-green-100 text-green-700
                                    @else bg-gray-100 text-gray-700
                                    @endif">
                                    {{ $service->badge }}
                                </span>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900 font-medium">{{ $service->duration_minutes }} menit</div>
                    </td>
                    <td class="px-6 py-4">
                        @if($service->price)
                        <div class="text-sm font-semibold text-gray-900">Rp {{ number_format($service->price, 0, ',', '.') }}</div>
                        @if($service->price_note)
                        <div class="text-xs text-gray-500">{{ $service->price_note }}</div>
                        @endif
                        @else
                        <div class="text-sm text-gray-500 italic">Gratis</div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col gap-2">
                            {{-- Active/Inactive Badge --}}
                            <div class="flex items-center">
                                <button @click="toggleStatus({{ $service->id }}, {{ $service->is_active ? 'true' : 'false' }})"
                                        class="relative inline-flex items-center h-6 rounded-full w-11 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 {{ $service->is_active ? 'bg-green-500' : 'bg-gray-300' }}">
                                    <span class="sr-only">Toggle status</span>
                                    <span class="inline-block w-4 h-4 transform transition-transform bg-white rounded-full {{ $service->is_active ? 'translate-x-6' : 'translate-x-1' }}"></span>
                                </button>
                                <span class="ml-3 text-sm font-medium {{ $service->is_active ? 'text-green-700' : 'text-gray-500' }}">
                                    {{ $service->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </div>

                            {{-- Featured Badge --}}
                            @if($service->is_featured)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-700">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                Unggulan
                            </span>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.services.edit', $service->id) }}"
                               class="inline-flex items-center px-4 py-2 bg-rose-600 text-white text-sm font-semibold rounded-lg hover:bg-rose-700 transition">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center text-gray-400">
                            <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                            <p class="text-lg font-medium">Belum ada layanan</p>
                            <p class="text-sm mt-1">Klik tombol "Tambah Layanan" untuk membuat layanan baru</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if($services->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $services->links() }}
    </div>
    @endif
</div>

</div>
@endsection
