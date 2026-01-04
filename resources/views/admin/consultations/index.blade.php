@extends('admin.layout')

@section('title', 'Manajemen Konsultasi')
@section('header_title', 'Manajemen Konsultasi')

@section('content')
{{-- Stats Cards --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    {{-- Total Consultations --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
        </div>
        <div class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</div>
        <div class="text-sm text-gray-600 mt-1">Total Konsultasi</div>
    </div>

    {{-- Pending --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <div class="text-2xl font-bold text-gray-900">{{ $stats['pending'] }}</div>
        <div class="text-sm text-gray-600 mt-1">Menunggu</div>
    </div>

    {{-- Confirmed --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <div class="text-2xl font-bold text-gray-900">{{ $stats['confirmed'] }}</div>
        <div class="text-sm text-gray-600 mt-1">Dikonfirmasi</div>
    </div>

    {{-- Completed --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
        </div>
        <div class="text-2xl font-bold text-gray-900">{{ $stats['completed'] }}</div>
        <div class="text-sm text-gray-600 mt-1">Selesai</div>
    </div>
</div>

{{-- Filters and Search --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
    <form method="GET" action="{{ route('admin.consultations.index') }}" class="flex flex-col md:flex-row gap-4">
        {{-- Search --}}
        <div class="flex-1">
            <div class="relative">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari nama ibu, email, atau nomor booking..."
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
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
                <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Dikonfirmasi</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
        </div>

        {{-- Filter Button --}}
        <button type="submit" class="px-6 py-2.5 bg-rose-600 text-white font-semibold rounded-lg hover:bg-rose-700 transition">
            Filter
        </button>

        {{-- Reset Button --}}
        @if(request('search') || request('status'))
        <a href="{{ route('admin.consultations.index') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition">
            Reset
        </a>
        @endif
    </form>
</div>

{{-- Consultations Table --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Booking</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Klien</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Layanan</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Jadwal</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($consultations as $consultation)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        <div class="font-mono text-sm font-semibold text-gray-900">{{ $consultation->booking_code }}</div>
                        <div class="text-xs text-gray-500 mt-1">{{ $consultation->created_at->format('d M Y, H:i') }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-semibold text-gray-900">{{ $consultation->mother_name }}</div>
                        <div class="text-sm text-gray-600">{{ $consultation->mother_email }}</div>
                        <div class="text-sm text-gray-600">{{ $consultation->mother_phone }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">{{ $consultation->service->name ?? 'N/A' }}</div>
                        <div class="text-sm text-gray-600">{{ ucfirst($consultation->consultation_type) }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($consultation->scheduled_date)->format('d M Y') }}</div>
                        <div class="text-sm text-gray-600">{{ $consultation->scheduled_time }}</div>
                    </td>
                    <td class="px-6 py-4">
                        @php
                            $statusConfig = [
                                'pending' => ['bg' => 'bg-amber-100', 'text' => 'text-amber-700', 'label' => 'Menunggu'],
                                'confirmed' => ['bg' => 'bg-green-100', 'text' => 'text-green-700', 'label' => 'Dikonfirmasi'],
                                'completed' => ['bg' => 'bg-purple-100', 'text' => 'text-purple-700', 'label' => 'Selesai'],
                                'cancelled' => ['bg' => 'bg-red-100', 'text' => 'text-red-700', 'label' => 'Dibatalkan'],
                            ];
                            $config = $statusConfig[$consultation->status] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-700', 'label' => ucfirst($consultation->status)];
                        @endphp
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $config['bg'] }} {{ $config['text'] }}">
                            {{ $config['label'] }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.consultations.show', $consultation->id) }}"
                           class="inline-flex items-center px-4 py-2 bg-rose-600 text-white text-sm font-semibold rounded-lg hover:bg-rose-700 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center text-gray-400">
                            <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <p class="text-lg font-medium">Belum ada konsultasi</p>
                            <p class="text-sm mt-1">Konsultasi akan muncul di sini setelah ada booking</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if($consultations->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $consultations->links() }}
    </div>
    @endif
</div>
@endsection
