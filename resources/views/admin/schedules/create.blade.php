@extends('admin.layout')

@section('title', 'Tambah Jadwal Konsultasi')

@section('content')
<div class="p-6">
    {{-- Header --}}
    <div class="mb-6">
        <a href="{{ route('admin.schedules.index') }}" class="inline-flex items-center text-gray-600 hover:text-gray-900 mb-4">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali ke Daftar Jadwal
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Tambah Jadwal Konsultasi</h1>
        <p class="text-gray-600 text-sm mt-1">Tambah slot waktu konsultasi baru</p>
    </div>

    {{-- Validation Errors --}}
    @if($errors->any())
    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Form --}}
    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('admin.schedules.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Date --}}
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="date" name="date" value="{{ old('date') }}" required
                           min="{{ date('Y-m-d') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent">
                </div>

                {{-- Time --}}
                <div>
                    <label for="time" class="block text-sm font-medium text-gray-700 mb-2">
                        Waktu Mulai <span class="text-red-500">*</span>
                    </label>
                    <input type="time" id="time" name="time" value="{{ old('time') }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent">
                </div>

                {{-- End Time --}}
                <div>
                    <label for="end_time" class="block text-sm font-medium text-gray-700 mb-2">
                        Waktu Selesai <span class="text-gray-400">(Opsional)</span>
                    </label>
                    <input type="time" id="end_time" name="end_time" value="{{ old('end_time') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent">
                </div>

                {{-- Type --}}
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">
                        Tipe Konsultasi <span class="text-red-500">*</span>
                    </label>
                    <select id="type" name="type" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent">
                        <option value="">Pilih Tipe</option>
                        <option value="home_visit" {{ old('type') == 'home_visit' ? 'selected' : '' }}>🏠 Home Visit</option>
                        <option value="clinic" {{ old('type') == 'clinic' ? 'selected' : '' }}>🏥 Di Klinik</option>
                        <option value="online" {{ old('type') == 'online' ? 'selected' : '' }}>💻 Online</option>
                        <option value="regular" {{ old('type') == 'regular' ? 'selected' : '' }}>Regular (Semua Tipe)</option>
                    </select>
                </div>

                {{-- Max Bookings --}}
                <div>
                    <label for="max_bookings" class="block text-sm font-medium text-gray-700 mb-2">
                        Maksimal Booking <span class="text-red-500">*</span>
                    </label>
                    <input type="number" id="max_bookings" name="max_bookings" value="{{ old('max_bookings', 1) }}" required
                           min="1" max="10"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent">
                    <p class="text-xs text-gray-500 mt-1">Berapa banyak booking yang bisa diterima di waktu ini</p>
                </div>

                {{-- Is Available --}}
                <div class="flex items-center">
                    <input type="checkbox" id="is_available" name="is_available" value="1"
                           {{ old('is_available', true) ? 'checked' : '' }}
                           class="w-5 h-5 text-rose-600 border-gray-300 rounded focus:ring-rose-500">
                    <label for="is_available" class="ml-2 block text-sm text-gray-700">
                        Tersedia untuk booking
                    </label>
                </div>
            </div>

            {{-- Notes --}}
            <div class="mt-6">
                <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                    Catatan <span class="text-gray-400">(Opsional)</span>
                </label>
                <textarea id="notes" name="notes" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent"
                          placeholder="Catatan internal (tidak ditampilkan ke user)">{{ old('notes') }}</textarea>
            </div>

            {{-- Submit Buttons --}}
            <div class="mt-6 flex gap-3">
                <button type="submit"
                        class="px-6 py-2 bg-rose-600 text-white font-semibold rounded-lg hover:bg-rose-700 transition">
                    Simpan Jadwal
                </button>
                <a href="{{ route('admin.schedules.index') }}"
                   class="px-6 py-2 bg-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-400 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>

    {{-- Help Text --}}
    <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
        <h3 class="font-semibold text-blue-900 mb-2">💡 Tips:</h3>
        <ul class="list-disc list-inside text-sm text-blue-800 space-y-1">
            <li>Gunakan "Buat Massal" untuk menambah banyak jadwal sekaligus</li>
            <li>Tipe "Regular" akan tersedia untuk semua jenis konsultasi</li>
            <li>Anda bisa nonaktifkan jadwal tanpa menghapusnya dengan uncheck "Tersedia untuk booking"</li>
            <li>Maksimal booking berguna jika ingin menerima lebih dari 1 konsultasi di waktu yang sama</li>
        </ul>
    </div>
</div>
@endsection
