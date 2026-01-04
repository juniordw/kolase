@extends('layouts.app')

@section('seo_title', 'Jadwalkan Konsultasi | KOLASE')
@section('seo_description', 'Jadwalkan konsultasi menyusui dengan konselor tersertifikasi KOLASE. Pilih layanan, tentukan jadwal, dan dapatkan pendampingan profesional.')
@section('seo_keywords', 'booking konsultasi, jadwal konseling menyusui, reservasi laktasi')

@section('content')

<section class="py-20 bg-gradient-to-br from-cream-50 to-rose-50 min-h-screen">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="text-center mb-12">
            <div class="text-6xl mb-4">📅</div>
            <h1 class="font-display text-4xl md:text-5xl font-bold text-brown-700 mb-4">Jadwalkan Konsultasi</h1>
            <p class="text-lg text-mauve-dark max-w-2xl mx-auto">
                Isi formulir di bawah ini untuk menjadwalkan konsultasi menyusui dengan konselor kami
            </p>
        </div>

        {{-- Multi-Step Form --}}
        <div x-data="bookingForm()" class="relative">

            {{-- Progress Indicator --}}
            <div class="bg-white rounded-t-3xl px-8 pt-8 pb-6 shadow-md">
                <div class="flex items-center justify-between mb-2">
                    <template x-for="i in 5" :key="i">
                        <div class="flex items-center" :class="i < 5 ? 'flex-1' : ''">
                            {{-- Step Circle --}}
                            <div class="relative">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold transition-all duration-300"
                                     :class="currentStep >= i ? 'bg-rose-500 text-white' : 'bg-gray-200 text-gray-500'">
                                    <span x-text="i"></span>
                                </div>
                                <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 whitespace-nowrap text-xs font-medium"
                                     :class="currentStep >= i ? 'text-rose-600' : 'text-gray-400'"
                                     x-text="getStepName(i)">
                                </div>
                            </div>

                            {{-- Connector Line --}}
                            <div x-show="i < 5" class="flex-1 h-1 mx-2 transition-all duration-300"
                                 :class="currentStep > i ? 'bg-rose-500' : 'bg-gray-200'">
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            {{-- Form Container --}}
            <form @submit.prevent="submitForm" class="bg-white rounded-b-3xl shadow-md p-8 md:p-10">

                {{-- Step 1: Service Selection --}}
                <div x-show="currentStep === 1" x-transition>
                    <h2 class="font-display text-2xl font-bold text-brown-700 mb-6">Pilih Layanan</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($services as $service)
                        <label class="relative cursor-pointer">
                            <input type="radio"
                                   name="service_id"
                                   value="{{ $service->id }}"
                                   x-model="formData.service_id"
                                   class="peer sr-only">
                            <div class="border-2 rounded-2xl p-6 transition-all peer-checked:border-rose-500 peer-checked:bg-rose-50 hover:border-rose-300">
                                <div class="flex items-start space-x-4">
                                    <div class="text-4xl flex-shrink-0">{{ $service->icon }}</div>
                                    <div class="flex-1">
                                        <h3 class="font-display text-lg font-semibold text-brown-700 mb-1">{{ $service->name }}</h3>
                                        <p class="text-sm text-mauve-dark mb-2 line-clamp-2">{{ $service->short_description }}</p>
                                        <div class="flex items-center text-xs text-mauve">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            {{ $service->duration_minutes }} menit
                                        </div>
                                        @if($service->badge)
                                        <span class="inline-block mt-2 px-2 py-1 text-xs font-semibold rounded-full
                                            @if($service->badge_color === 'rose') bg-rose-100 text-rose-700
                                            @elseif($service->badge_color === 'amber') bg-amber-100 text-amber-700
                                            @endif">
                                            {{ $service->badge }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- Selection Indicator --}}
                                <div class="absolute top-4 right-4 w-6 h-6 rounded-full border-2 border-gray-300 peer-checked:bg-primary-500 peer-checked:border-primary-500 transition-all flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white opacity-0 peer-checked:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                        </label>
                        @endforeach
                    </div>

                    <p class="text-sm text-mauve-dark mt-4">
                        Belum yakin? <a href="https://wa.me/6289560622054?text=Halo%20KOLASE%2C%20saya%20ingin%20konsultasi%20untuk%20memilih%20layanan" target="_blank" class="text-rose-600 hover:text-rose-700 font-semibold">Konsultasi via WhatsApp</a>
                    </p>
                </div>

                {{-- Step 2: Mother Data --}}
                <div x-show="currentStep === 2" x-transition>
                    <h2 class="font-display text-2xl font-bold text-brown-700 mb-6">Data Ibu</h2>

                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-semibold text-brown-700 mb-2">Nama Lengkap <span class="text-rose-500">*</span></label>
                            <input type="text"
                                   x-model="formData.mother_name"
                                   required
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-rose-500 focus:ring-0 transition"
                                   placeholder="Nama lengkap Ibu">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-semibold text-brown-700 mb-2">Nomor WhatsApp <span class="text-rose-500">*</span></label>
                                <input type="tel"
                                       x-model="formData.mother_phone"
                                       required
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-rose-500 focus:ring-0 transition"
                                       placeholder="08xxxxxxxxxx">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-brown-700 mb-2">Email <span class="text-rose-500">*</span></label>
                                <input type="email"
                                       x-model="formData.mother_email"
                                       required
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-rose-500 focus:ring-0 transition"
                                       placeholder="email@example.com">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-brown-700 mb-2">Kota/Kabupaten <span class="text-rose-500">*</span></label>
                            <input type="text"
                                   x-model="formData.city"
                                   required
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-rose-500 focus:ring-0 transition"
                                   placeholder="Contoh: Bandung">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-brown-700 mb-2">Alamat Lengkap</label>
                            <textarea x-model="formData.address"
                                      rows="3"
                                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-rose-500 focus:ring-0 transition"
                                      placeholder="Alamat lengkap (untuk home visit)"></textarea>
                            <p class="text-xs text-mauve-dark mt-1">*Wajib diisi jika memilih Home Visit</p>
                        </div>
                    </div>
                </div>

                {{-- Step 3: Baby Data --}}
                <div x-show="currentStep === 3" x-transition>
                    <h2 class="font-display text-2xl font-bold text-brown-700 mb-6">Data Bayi</h2>

                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-semibold text-brown-700 mb-2">Status Bayi <span class="text-rose-500">*</span></label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                <label class="relative cursor-pointer">
                                    <input type="radio" name="baby_status" value="newborn" x-model="formData.baby_status" class="peer sr-only">
                                    <div class="border-2 rounded-xl p-4 text-center transition-all peer-checked:border-rose-500 peer-checked:bg-rose-50 hover:border-rose-300">
                                        <div class="text-3xl mb-2">👶</div>
                                        <div class="font-semibold text-brown-700">Newborn</div>
                                        <div class="text-xs text-mauve-dark">0-28 hari</div>
                                    </div>
                                </label>

                                <label class="relative cursor-pointer">
                                    <input type="radio" name="baby_status" value="infant" x-model="formData.baby_status" class="peer sr-only">
                                    <div class="border-2 rounded-xl p-4 text-center transition-all peer-checked:border-rose-500 peer-checked:bg-rose-50 hover:border-rose-300">
                                        <div class="text-3xl mb-2">👧</div>
                                        <div class="font-semibold text-brown-700">Infant</div>
                                        <div class="text-xs text-mauve-dark">1-12 bulan</div>
                                    </div>
                                </label>

                                <label class="relative cursor-pointer">
                                    <input type="radio" name="baby_status" value="toddler" x-model="formData.baby_status" class="peer sr-only">
                                    <div class="border-2 rounded-xl p-4 text-center transition-all peer-checked:border-rose-500 peer-checked:bg-rose-50 hover:border-rose-300">
                                        <div class="text-3xl mb-2">🧒</div>
                                        <div class="font-semibold text-brown-700">Toddler</div>
                                        <div class="text-xs text-mauve-dark">>12 bulan</div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-semibold text-brown-700 mb-2">Usia Bayi (bulan)</label>
                                <input type="number"
                                       x-model="formData.baby_age_months"
                                       min="0"
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-rose-500 focus:ring-0 transition"
                                       placeholder="Contoh: 3">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-brown-700 mb-2">Tanggal Lahir Bayi</label>
                                <input type="date"
                                       x-model="formData.baby_birthdate"
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-rose-500 focus:ring-0 transition">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-brown-700 mb-2">Berat Badan Bayi (kg)</label>
                            <input type="number"
                                   x-model="formData.baby_weight"
                                   step="0.1"
                                   min="0"
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-rose-500 focus:ring-0 transition"
                                   placeholder="Contoh: 4.5">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-brown-700 mb-2">Keluhan/Kekhawatiran Utama <span class="text-rose-500">*</span></label>
                            <textarea x-model="formData.concerns"
                                      rows="4"
                                      required
                                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-rose-500 focus:ring-0 transition"
                                      placeholder="Ceritakan keluhan atau kekhawatiran Anda terkait menyusui..."></textarea>
                        </div>
                    </div>
                </div>

                {{-- Step 4: Schedule Selection --}}
                <div x-show="currentStep === 4" x-transition>
                    <h2 class="font-display text-2xl font-bold text-brown-700 mb-6">Pilih Jadwal</h2>

                    <div class="space-y-6">
                        {{-- Consultation Type --}}
                        <div>
                            <label class="block text-sm font-semibold text-brown-700 mb-3">Tipe Konsultasi <span class="text-rose-500">*</span></label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                <label class="relative cursor-pointer">
                                    <input type="radio" name="consultation_type" value="home_visit" x-model="formData.consultation_type" class="peer sr-only">
                                    <div class="border-2 rounded-xl p-4 transition-all peer-checked:border-rose-500 peer-checked:bg-rose-50 hover:border-rose-300">
                                        <div class="text-3xl mb-2 text-center">🏠</div>
                                        <div class="font-semibold text-brown-700 text-center">Home Visit</div>
                                        <div class="text-xs text-mauve-dark text-center mt-1">Konselor datang ke rumah</div>
                                    </div>
                                </label>

                                <label class="relative cursor-pointer">
                                    <input type="radio" name="consultation_type" value="clinic" x-model="formData.consultation_type" class="peer sr-only">
                                    <div class="border-2 rounded-xl p-4 transition-all peer-checked:border-rose-500 peer-checked:bg-rose-50 hover:border-rose-300">
                                        <div class="text-3xl mb-2 text-center">🏥</div>
                                        <div class="font-semibold text-brown-700 text-center">Di Klinik</div>
                                        <div class="text-xs text-mauve-dark text-center mt-1">Datang ke lokasi kami</div>
                                    </div>
                                </label>

                                <label class="relative cursor-pointer">
                                    <input type="radio" name="consultation_type" value="online" x-model="formData.consultation_type" class="peer sr-only">
                                    <div class="border-2 rounded-xl p-4 transition-all peer-checked:border-rose-500 peer-checked:bg-rose-50 hover:border-rose-300">
                                        <div class="text-3xl mb-2 text-center">💻</div>
                                        <div class="font-semibold text-brown-700 text-center">Online</div>
                                        <div class="text-xs text-mauve-dark text-center mt-1">Via Zoom/Google Meet</div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        {{-- Date Selection --}}
                        <div>
                            <label class="block text-sm font-semibold text-brown-700 mb-2">Tanggal Konsultasi <span class="text-rose-500">*</span></label>
                            <input type="date"
                                   x-model="formData.scheduled_date"
                                   @change="checkAvailability"
                                   :min="getMinDate()"
                                   required
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-rose-500 focus:ring-0 transition">
                            <p class="text-xs text-mauve-dark mt-1">*Minimal booking H+1</p>
                        </div>

                        {{-- Time Slot Selection --}}
                        <div x-show="formData.scheduled_date">
                            <label class="block text-sm font-semibold text-brown-700 mb-3">Waktu Konsultasi <span class="text-rose-500">*</span></label>

                            <div x-show="loadingSlots" class="text-center py-8">
                                <div class="inline-block animate-spin rounded-full h-8 w-8 border-4 border-rose-500 border-t-transparent"></div>
                                <p class="text-sm text-mauve-dark mt-2">Memeriksa ketersediaan...</p>
                            </div>

                            <div x-show="!loadingSlots && availableSlots.length === 0" class="text-center py-8 bg-amber-50 rounded-xl">
                                <div class="text-4xl mb-2">📅</div>
                                <p class="text-mauve-dark">Tidak ada slot tersedia untuk tanggal ini.</p>
                                <p class="text-sm text-mauve-dark mt-1">Silakan pilih tanggal lain.</p>
                            </div>

                            <div x-show="!loadingSlots && availableSlots.length > 0" class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                <template x-for="slot in availableSlots" :key="slot">
                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="scheduled_time" :value="slot" x-model="formData.scheduled_time" class="peer sr-only">
                                        <div class="border-2 rounded-xl p-3 text-center transition-all peer-checked:border-rose-500 peer-checked:bg-rose-50 hover:border-rose-300">
                                            <div class="font-semibold text-brown-700" x-text="slot"></div>
                                        </div>
                                    </label>
                                </template>
                            </div>
                        </div>

                        {{-- Additional Notes --}}
                        <div>
                            <label class="block text-sm font-semibold text-brown-700 mb-2">Catatan Tambahan</label>
                            <textarea x-model="formData.notes"
                                      rows="3"
                                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-rose-500 focus:ring-0 transition"
                                      placeholder="Catatan atau permintaan khusus..."></textarea>
                        </div>
                    </div>
                </div>

                {{-- Step 5: Confirmation --}}
                <div x-show="currentStep === 5" x-transition>
                    <h2 class="font-display text-2xl font-bold text-brown-700 mb-6">Konfirmasi Booking</h2>

                    <div class="bg-gradient-to-br from-rose-50 to-cream-100 rounded-2xl p-6 md:p-8 space-y-6">
                        {{-- Service Info --}}
                        <div class="bg-white rounded-xl p-5">
                            <h3 class="font-semibold text-brown-700 mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-rose-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1zm0 3a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                </svg>
                                Layanan
                            </h3>
                            <p class="text-mauve-dark" x-text="getServiceName()"></p>
                        </div>

                        {{-- Mother Data --}}
                        <div class="bg-white rounded-xl p-5">
                            <h3 class="font-semibold text-brown-700 mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-rose-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                                Data Ibu
                            </h3>
                            <div class="space-y-2 text-sm text-mauve-dark">
                                <p><span class="font-medium">Nama:</span> <span x-text="formData.mother_name"></span></p>
                                <p><span class="font-medium">WhatsApp:</span> <span x-text="formData.mother_phone"></span></p>
                                <p><span class="font-medium">Email:</span> <span x-text="formData.mother_email"></span></p>
                                <p><span class="font-medium">Kota:</span> <span x-text="formData.city"></span></p>
                            </div>
                        </div>

                        {{-- Schedule Info --}}
                        <div class="bg-white rounded-xl p-5">
                            <h3 class="font-semibold text-brown-700 mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-rose-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                </svg>
                                Jadwal Konsultasi
                            </h3>
                            <div class="space-y-2 text-sm text-mauve-dark">
                                <p><span class="font-medium">Tipe:</span> <span x-text="getConsultationType()"></span></p>
                                <p><span class="font-medium">Tanggal:</span> <span x-text="formatDate(formData.scheduled_date)"></span></p>
                                <p><span class="font-medium">Waktu:</span> <span x-text="formData.scheduled_time"></span></p>
                            </div>
                        </div>

                        {{-- Terms Agreement --}}
                        <div class="bg-white rounded-xl p-5">
                            <label class="flex items-start cursor-pointer">
                                <input type="checkbox"
                                       x-model="formData.agreed_to_terms"
                                       required
                                       class="mt-1 rounded border-gray-300 text-rose-500 focus:ring-rose-500">
                                <span class="ml-3 text-sm text-mauve-dark">
                                    Saya menyetujui <a href="{{ route('terms') }}" target="_blank" class="text-rose-600 hover:text-rose-700 font-semibold">syarat dan ketentuan</a> yang berlaku dan memberikan persetujuan untuk dihubungi melalui WhatsApp
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Navigation Buttons --}}
                <div class="flex justify-between items-center mt-8 pt-6 border-t-2 border-gray-100">
                    <button type="button"
                            @click="prevStep"
                            x-show="currentStep > 1"
                            class="inline-flex items-center px-6 py-3 bg-white border-2 border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Kembali
                    </button>

                    <div x-show="currentStep < 5">
                        <button type="button"
                                @click="nextStep"
                                class="inline-flex items-center px-8 py-3 bg-rose-500 text-white font-bold rounded-xl hover:bg-rose-600 transition shadow-rose ml-auto">
                            Lanjutkan
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>

                    <div x-show="currentStep === 5">
                        <button type="submit"
                                :disabled="submitting || !formData.agreed_to_terms"
                                class="inline-flex items-center px-8 py-3 bg-rose-500 text-white font-bold rounded-xl hover:bg-rose-600 transition shadow-rose disabled:opacity-50 disabled:cursor-not-allowed ml-auto">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span x-show="!submitting">Konfirmasi Booking</span>
                            <span x-show="submitting">Memproses...</span>
                        </button>
                    </div>
                </div>

            </form>
        </div>

        {{-- Help Section --}}
        <div class="mt-8 bg-white rounded-2xl p-6 shadow-md text-center">
            <p class="text-mauve-dark mb-3">Butuh bantuan mengisi formulir?</p>
            <a href="https://wa.me/6289560622054?text=Halo%20KOLASE%2C%20saya%20butuh%20bantuan%20untuk%20booking"
               target="_blank"
               class="inline-flex items-center text-rose-600 hover:text-rose-700 font-semibold">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                Hubungi via WhatsApp
            </a>
        </div>

    </div>
</section>

@push('scripts')
<script>
function bookingForm() {
    return {
        currentStep: 1,
        submitting: false,
        loadingSlots: false,
        availableSlots: [],
        services: @json($services),

        formData: {
            service_id: '{{ request("service") ?? "" }}',
            mother_name: '',
            mother_phone: '',
            mother_email: '',
            city: '',
            address: '',
            baby_status: '',
            baby_age_months: '',
            baby_birthdate: '',
            baby_weight: '',
            concerns: '',
            consultation_type: '',
            scheduled_date: '',
            scheduled_time: '',
            notes: '',
            agreed_to_terms: false,
            utm_source: '{{ request("utm_source") ?? "" }}',
            utm_medium: '{{ request("utm_medium") ?? "" }}',
            utm_campaign: '{{ request("utm_campaign") ?? "" }}'
        },

        getStepName(step) {
            const names = ['Layanan', 'Data Ibu', 'Data Bayi', 'Jadwal', 'Konfirmasi'];
            return names[step - 1];
        },

        nextStep() {
            if (this.validateStep(this.currentStep)) {
                this.currentStep++;
            }
        },

        prevStep() {
            this.currentStep--;
        },

        validateStep(step) {
            if (step === 1 && !this.formData.service_id) {
                alert('Silakan pilih layanan terlebih dahulu');
                return false;
            }
            if (step === 2) {
                if (!this.formData.mother_name || !this.formData.mother_phone || !this.formData.mother_email || !this.formData.city) {
                    alert('Mohon lengkapi semua data yang wajib diisi');
                    return false;
                }
            }
            if (step === 3 && (!this.formData.baby_status || !this.formData.concerns)) {
                alert('Mohon lengkapi status bayi dan keluhan utama');
                return false;
            }
            if (step === 4) {
                if (!this.formData.consultation_type || !this.formData.scheduled_date || !this.formData.scheduled_time) {
                    alert('Mohon pilih tipe konsultasi, tanggal, dan waktu');
                    return false;
                }
            }
            return true;
        },

        getMinDate() {
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            return tomorrow.toISOString().split('T')[0];
        },

        async checkAvailability() {
            if (!this.formData.scheduled_date) return;

            this.loadingSlots = true;
            this.availableSlots = [];
            this.formData.scheduled_time = ''; // Reset selected time

            try {
                const response = await fetch(`{{ route('booking.slots') }}?date=${this.formData.scheduled_date}&type=${this.formData.consultation_type || 'regular'}`);
                const data = await response.json();

                // Only show slots that are configured by admin
                this.availableSlots = data.slots && data.slots.length > 0
                    ? data.slots.map(slot => slot.time)
                    : [];

            } catch (error) {
                console.error('Error checking availability:', error);
                // If API fails, show no slots (admin must configure schedules)
                this.availableSlots = [];
            } finally {
                this.loadingSlots = false;
            }
        },

        getServiceName() {
            const service = this.services.find(s => s.id == this.formData.service_id);
            return service ? service.name : '';
        },

        getConsultationType() {
            const types = {
                'home_visit': '🏠 Home Visit',
                'clinic': '🏥 Di Klinik',
                'online': '💻 Online'
            };
            return types[this.formData.consultation_type] || '';
        },

        formatDate(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            return date.toLocaleDateString('id-ID', options);
        },

        async submitForm() {
            if (!this.formData.agreed_to_terms) {
                alert('Mohon setujui syarat dan ketentuan untuk melanjutkan');
                return;
            }

            this.submitting = true;

            try {
                const response = await fetch('{{ route('booking.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(this.formData)
                });

                const data = await response.json();

                if (data.success) {
                    window.location.href = `/jadwal/success/${data.booking_code}`;
                } else {
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                }
            } catch (error) {
                console.error('Error submitting form:', error);
                alert('Terjadi kesalahan. Silakan coba lagi.');
            } finally {
                this.submitting = false;
            }
        }
    }
}
</script>
@endpush

@endsection
