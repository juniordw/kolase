@extends('admin.layout')

@section('title', 'Detail Konsultasi')
@section('header_title', 'Detail Konsultasi')

@section('content')
{{-- Back Button --}}
<div class="mb-6">
    <a href="{{ route('admin.consultations.index') }}" class="inline-flex items-center text-gray-600 hover:text-gray-900 transition">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Kembali ke Daftar Konsultasi
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    {{-- Main Content --}}
    <div class="lg:col-span-2 space-y-6">
        {{-- Booking Information --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Informasi Booking</h2>
                @php
                    $statusConfig = [
                        'pending' => ['bg' => 'bg-amber-100', 'text' => 'text-amber-700', 'label' => 'Menunggu'],
                        'confirmed' => ['bg' => 'bg-green-100', 'text' => 'text-green-700', 'label' => 'Dikonfirmasi'],
                        'completed' => ['bg' => 'bg-purple-100', 'text' => 'text-purple-700', 'label' => 'Selesai'],
                        'cancelled' => ['bg' => 'bg-red-100', 'text' => 'text-red-700', 'label' => 'Dibatalkan'],
                    ];
                    $config = $statusConfig[$consultation->status] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-700', 'label' => ucfirst($consultation->status)];
                @endphp
                <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-bold {{ $config['bg'] }} {{ $config['text'] }}">
                    {{ $config['label'] }}
                </span>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <div class="text-sm text-gray-600 mb-1">Kode Booking</div>
                    <div class="font-mono text-lg font-bold text-gray-900">{{ $consultation->booking_code }}</div>
                </div>
                <div>
                    <div class="text-sm text-gray-600 mb-1">Tanggal Booking</div>
                    <div class="font-semibold text-gray-900">{{ $consultation->created_at->format('d F Y, H:i') }} WIB</div>
                </div>
            </div>
        </div>

        {{-- Mother Data --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Data Ibu
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="text-sm text-gray-600 mb-1">Nama Lengkap</div>
                    <div class="font-semibold text-gray-900">{{ $consultation->mother_name }}</div>
                </div>
                <div>
                    <div class="text-sm text-gray-600 mb-1">Nomor WhatsApp</div>
                    <div class="font-semibold text-gray-900">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $consultation->mother_phone) }}" target="_blank" class="text-green-600 hover:text-green-700">
                            {{ $consultation->mother_phone }}
                        </a>
                    </div>
                </div>
                <div>
                    <div class="text-sm text-gray-600 mb-1">Email</div>
                    <div class="font-semibold text-gray-900">{{ $consultation->mother_email }}</div>
                </div>
                <div>
                    <div class="text-sm text-gray-600 mb-1">Kota</div>
                    <div class="font-semibold text-gray-900">{{ $consultation->city }}</div>
                </div>
                @if($consultation->address)
                <div class="md:col-span-2">
                    <div class="text-sm text-gray-600 mb-1">Alamat Lengkap</div>
                    <div class="font-semibold text-gray-900">{{ $consultation->address }}</div>
                </div>
                @endif
            </div>
        </div>

        {{-- Baby Data --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Data Bayi
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="text-sm text-gray-600 mb-1">Status Bayi</div>
                    <div class="font-semibold text-gray-900">
                        @php
                            $babyStatusLabels = [
                                'newborn' => '👶 Newborn (0-28 hari)',
                                'infant' => '👧 Infant (1-12 bulan)',
                                'toddler' => '🧒 Toddler (>12 bulan)',
                            ];
                        @endphp
                        {{ $babyStatusLabels[$consultation->baby_status] ?? ucfirst($consultation->baby_status) }}
                    </div>
                </div>
                @if($consultation->baby_age_months)
                <div>
                    <div class="text-sm text-gray-600 mb-1">Usia Bayi</div>
                    <div class="font-semibold text-gray-900">{{ $consultation->baby_age_months }} bulan</div>
                </div>
                @endif
                @if($consultation->baby_birthdate)
                <div>
                    <div class="text-sm text-gray-600 mb-1">Tanggal Lahir</div>
                    <div class="font-semibold text-gray-900">{{ \Carbon\Carbon::parse($consultation->baby_birthdate)->format('d F Y') }}</div>
                </div>
                @endif
                @if($consultation->baby_weight)
                <div>
                    <div class="text-sm text-gray-600 mb-1">Berat Badan</div>
                    <div class="font-semibold text-gray-900">{{ $consultation->baby_weight }} kg</div>
                </div>
                @endif
            </div>

            @if($consultation->concerns)
            <div class="mt-6 pt-6 border-t border-gray-200">
                <div class="text-sm text-gray-600 mb-2">Keluhan/Kekhawatiran</div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-900">
                    {{ $consultation->concerns }}
                </div>
            </div>
            @endif
        </div>

        {{-- Schedule & Notes --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Jadwal Konsultasi
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="text-sm text-gray-600 mb-1">Layanan</div>
                    <div class="font-semibold text-gray-900">{{ $consultation->service->name ?? 'N/A' }}</div>
                </div>
                <div>
                    <div class="text-sm text-gray-600 mb-1">Tipe Konsultasi</div>
                    <div class="font-semibold text-gray-900">
                        @php
                            $consultationTypes = [
                                'home_visit' => '🏠 Home Visit',
                                'clinic' => '🏥 Di Klinik',
                                'online' => '💻 Online',
                            ];
                        @endphp
                        {{ $consultationTypes[$consultation->consultation_type] ?? ucfirst($consultation->consultation_type) }}
                    </div>
                </div>
                <div>
                    <div class="text-sm text-gray-600 mb-1">Tanggal</div>
                    <div class="font-semibold text-gray-900">{{ \Carbon\Carbon::parse($consultation->scheduled_date)->format('d F Y') }}</div>
                </div>
                <div>
                    <div class="text-sm text-gray-600 mb-1">Waktu</div>
                    <div class="font-semibold text-gray-900">{{ $consultation->scheduled_time }} WIB</div>
                </div>
            </div>

            @if($consultation->notes)
            <div class="mt-6 pt-6 border-t border-gray-200">
                <div class="text-sm text-gray-600 mb-2">Catatan Tambahan</div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-900">
                    {{ $consultation->notes }}
                </div>
            </div>
            @endif
        </div>
    </div>

    {{-- Sidebar --}}
    <div class="space-y-6">
        {{-- Update Status --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Update Status</h3>

            <form action="{{ route('admin.consultations.updateStatus', $consultation->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status Baru</label>
                    <select name="status" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                        <option value="pending" {{ $consultation->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                        <option value="confirmed" {{ $consultation->status == 'confirmed' ? 'selected' : '' }}>Dikonfirmasi</option>
                        <option value="completed" {{ $consultation->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                        <option value="cancelled" {{ $consultation->status == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                    </select>
                </div>

                <button type="submit" class="w-full px-4 py-3 bg-rose-600 text-white font-bold rounded-lg hover:bg-rose-700 transition">
                    Update Status
                </button>
            </form>

            <div class="mt-4 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-blue-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-xs text-blue-800">
                        Klien akan menerima notifikasi WhatsApp otomatis setelah status diupdate
                    </p>
                </div>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Aksi Cepat</h3>

            <div class="space-y-3">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $consultation->mother_phone) }}?text=Halo%20{{ urlencode($consultation->mother_name) }}%2C%20saya%20dari%20KOLASE"
                   target="_blank"
                   class="w-full inline-flex items-center justify-center px-4 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                    Chat WhatsApp
                </a>

                <a href="mailto:{{ $consultation->mother_email }}"
                   class="w-full inline-flex items-center justify-center px-4 py-3 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Kirim Email
                </a>
            </div>
        </div>

        {{-- Metadata --}}
        <div class="bg-gray-50 rounded-xl p-4 text-xs text-gray-600">
            <div class="mb-2">
                <strong>Dibuat:</strong> {{ $consultation->created_at->format('d M Y, H:i') }} WIB
            </div>
            <div>
                <strong>Terakhir Update:</strong> {{ $consultation->updated_at->format('d M Y, H:i') }} WIB
            </div>
            @if($consultation->utm_source || $consultation->utm_medium || $consultation->utm_campaign)
            <div class="mt-3 pt-3 border-t border-gray-300">
                <strong>Sumber Traffic:</strong>
                <div class="mt-1">
                    @if($consultation->utm_source) Source: {{ $consultation->utm_source }}<br> @endif
                    @if($consultation->utm_medium) Medium: {{ $consultation->utm_medium }}<br> @endif
                    @if($consultation->utm_campaign) Campaign: {{ $consultation->utm_campaign }} @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
