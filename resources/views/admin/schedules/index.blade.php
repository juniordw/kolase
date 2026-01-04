@extends('admin.layout')

@section('title', 'Manajemen Jadwal Konsultasi')

@section('content')
<div class="p-6">
    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Jadwal Konsultasi</h1>
            <p class="text-gray-600 text-sm mt-1">Kelola jadwal waktu konsultasi yang tersedia</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.schedules.bulk-create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Buat Massal
            </a>
            <a href="{{ route('admin.schedules.create') }}"
               class="inline-flex items-center px-4 py-2 bg-rose-600 text-white font-semibold rounded-lg hover:bg-rose-700 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Jadwal
            </a>
        </div>
    </div>

    {{-- Success/Error Messages --}}
    @if(session('success'))
    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
        {{ session('error') }}
    </div>
    @endif

    {{-- Filters --}}
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <form method="GET" action="{{ route('admin.schedules.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Dari Tanggal</label>
                <input type="date" name="date_from" value="{{ request('date_from') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sampai Tanggal</label>
                <input type="date" name="date_to" value="{{ request('date_to') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tipe Konsultasi</label>
                <select name="type" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent">
                    <option value="">Semua Tipe</option>
                    <option value="home_visit" {{ request('type') == 'home_visit' ? 'selected' : '' }}>Home Visit</option>
                    <option value="clinic" {{ request('type') == 'clinic' ? 'selected' : '' }}>Di Klinik</option>
                    <option value="online" {{ request('type') == 'online' ? 'selected' : '' }}>Online</option>
                    <option value="regular" {{ request('type') == 'regular' ? 'selected' : '' }}>Regular</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="is_available" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent">
                    <option value="">Semua Status</option>
                    <option value="1" {{ request('is_available') == '1' ? 'selected' : '' }}>Tersedia</option>
                    <option value="0" {{ request('is_available') == '0' ? 'selected' : '' }}>Tidak Tersedia</option>
                </select>
            </div>
            <div class="md:col-span-4 flex gap-2">
                <button type="submit"
                        class="px-4 py-2 bg-gray-800 text-white font-semibold rounded-lg hover:bg-gray-900 transition">
                    Filter
                </button>
                <a href="{{ route('admin.schedules.index') }}"
                   class="px-4 py-2 bg-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-400 transition">
                    Reset
                </a>
            </div>
        </form>
    </div>

    {{-- Schedules Table --}}
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kapasitas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($schedules as $schedule)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $schedule->date->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $schedule->time }}
                            @if($schedule->end_time)
                            - {{ $schedule->end_time }}
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($schedule->type === 'home_visit')
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">🏠 Home Visit</span>
                            @elseif($schedule->type === 'clinic')
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">🏥 Klinik</span>
                            @elseif($schedule->type === 'online')
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">💻 Online</span>
                            @else
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Regular</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $schedule->current_bookings }}/{{ $schedule->max_bookings }}
                            @if($schedule->is_full)
                            <span class="ml-2 px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Penuh</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <form action="{{ route('admin.schedules.toggle', $schedule) }}" method="POST" class="inline">
                                @csrf
                                @if($schedule->is_available)
                                <button type="submit" class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 hover:bg-green-200 transition">
                                    ✓ Tersedia
                                </button>
                                @else
                                <button type="submit" class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 hover:bg-red-200 transition">
                                    ✗ Tidak Tersedia
                                </button>
                                @endif
                            </form>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                            <a href="{{ route('admin.schedules.edit', $schedule) }}"
                               class="text-blue-600 hover:text-blue-900">Edit</a>
                            <form action="{{ route('admin.schedules.destroy', $schedule) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                            Tidak ada jadwal ditemukan. <a href="{{ route('admin.schedules.create') }}" class="text-rose-600 hover:text-rose-700 font-semibold">Tambah jadwal</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($schedules->hasPages())
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
            {{ $schedules->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
