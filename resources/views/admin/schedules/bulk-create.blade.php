@extends('admin.layout')

@section('title', 'Buat Jadwal Massal')

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
        <h1 class="text-2xl font-bold text-gray-800">Buat Jadwal Massal</h1>
        <p class="text-gray-600 text-sm mt-1">Buat banyak jadwal sekaligus untuk range tanggal tertentu</p>
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
        <form action="{{ route('admin.schedules.bulk-store') }}" method="POST" x-data="bulkScheduleForm()">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Date Range --}}
                <div>
                    <label for="date_from" class="block text-sm font-medium text-gray-700 mb-2">
                        Dari Tanggal <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="date_from" name="date_from" value="{{ old('date_from') }}" required
                           min="{{ date('Y-m-d') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent">
                </div>

                <div>
                    <label for="date_to" class="block text-sm font-medium text-gray-700 mb-2">
                        Sampai Tanggal <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="date_to" name="date_to" value="{{ old('date_to') }}" required
                           min="{{ date('Y-m-d') }}"
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
                        Maksimal Booking per Slot <span class="text-red-500">*</span>
                    </label>
                    <input type="number" id="max_bookings" name="max_bookings" value="{{ old('max_bookings', 1) }}" required
                           min="1" max="10"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent">
                </div>

                {{-- Skip Weekends --}}
                <div class="flex items-center md:col-span-2">
                    <input type="checkbox" id="skip_weekends" name="skip_weekends" value="1"
                           {{ old('skip_weekends') ? 'checked' : '' }}
                           class="w-5 h-5 text-rose-600 border-gray-300 rounded focus:ring-rose-500">
                    <label for="skip_weekends" class="ml-2 block text-sm text-gray-700">
                        Lewati akhir pekan (Sabtu & Minggu)
                    </label>
                </div>
            </div>

            {{-- Time Slots --}}
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-3">
                    Waktu Konsultasi <span class="text-red-500">*</span>
                </label>

                <div class="space-y-3">
                    {{-- Quick Select --}}
                    <div class="flex flex-wrap gap-2 mb-4">
                        <button type="button" @click="addDefaultSlots()"
                                class="px-3 py-1 text-sm bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition">
                            + Jam Kerja Standar (08:00-16:00)
                        </button>
                        <button type="button" @click="addMorningSlots()"
                                class="px-3 py-1 text-sm bg-green-100 text-green-700 rounded-lg hover:bg-green-200 transition">
                            + Pagi (08:00-12:00)
                        </button>
                        <button type="button" @click="addAfternoonSlots()"
                                class="px-3 py-1 text-sm bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200 transition">
                            + Siang (13:00-16:00)
                        </button>
                        <button type="button" @click="clearSlots()"
                                class="px-3 py-1 text-sm bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition">
                            ✗ Hapus Semua
                        </button>
                    </div>

                    {{-- Time Slots List --}}
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                        <template x-for="(time, index) in times" :key="index">
                            <div class="relative">
                                <input type="time" :name="'times[' + index + ']'" x-model="times[index]" required
                                       class="w-full px-3 py-2 pr-8 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent">
                                <button type="button" @click="removeTime(index)"
                                        class="absolute right-2 top-1/2 transform -translate-y-1/2 text-red-500 hover:text-red-700">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                        </template>
                    </div>

                    {{-- Add Time Button --}}
                    <button type="button" @click="addTime()"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Waktu
                    </button>

                    <p class="text-xs text-gray-500 mt-2">Total slot: <span x-text="times.length"></span></p>
                </div>
            </div>

            {{-- Submit Buttons --}}
            <div class="mt-6 flex gap-3">
                <button type="submit"
                        class="px-6 py-2 bg-rose-600 text-white font-semibold rounded-lg hover:bg-rose-700 transition">
                    Buat Jadwal
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
        <h3 class="font-semibold text-blue-900 mb-2">📋 Cara Penggunaan:</h3>
        <ul class="list-disc list-inside text-sm text-blue-800 space-y-1">
            <li>Pilih range tanggal (dari - sampai)</li>
            <li>Pilih tipe konsultasi yang akan dibuat</li>
            <li>Tambahkan waktu-waktu konsultasi yang diinginkan</li>
            <li>Gunakan tombol quick select untuk menambah waktu standar dengan cepat</li>
            <li>System akan membuat jadwal untuk setiap kombinasi tanggal dan waktu</li>
            <li>Jadwal yang sudah ada tidak akan di-duplicate</li>
        </ul>
    </div>
</div>

@push('scripts')
<script>
function bulkScheduleForm() {
    return {
        times: [],

        addTime() {
            this.times.push('09:00');
        },

        removeTime(index) {
            this.times.splice(index, 1);
        },

        clearSlots() {
            this.times = [];
        },

        addDefaultSlots() {
            // Working hours: 08:00 - 16:00 dengan interval 30 menit
            const slots = [
                '08:00', '08:30', '09:00', '09:30', '10:00', '10:30',
                '11:00', '11:30', '13:00', '13:30', '14:00', '14:30',
                '15:00', '15:30', '16:00'
            ];
            this.times = [...slots];
        },

        addMorningSlots() {
            const slots = [
                '08:00', '08:30', '09:00', '09:30', '10:00', '10:30',
                '11:00', '11:30'
            ];
            this.times = [...this.times, ...slots];
        },

        addAfternoonSlots() {
            const slots = [
                '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00'
            ];
            this.times = [...this.times, ...slots];
        }
    }
}
</script>
@endpush
@endsection
