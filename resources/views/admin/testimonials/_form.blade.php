@php
    $isEdit = isset($testimonial);
@endphp

<div x-data="{
    rating: {{ old('rating', $testimonial->rating ?? 5) }},
    setRating(value) {
        this.rating = value;
    }
}" class="space-y-8">

    {{-- Client Information Section --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            Informasi Klien
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Client Name --}}
            <div class="md:col-span-2">
                <label for="client_name" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Klien <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       id="client_name"
                       name="client_name"
                       value="{{ old('client_name', $testimonial->client_name ?? '') }}"
                       required
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('client_name') border-red-500 @enderror"
                       placeholder="Contoh: Ibu Sarah">
                @error('client_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Service --}}
            <div class="md:col-span-2">
                <label for="service_id" class="block text-sm font-semibold text-gray-700 mb-2">
                    Layanan Terkait
                </label>
                <select id="service_id"
                        name="service_id"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('service_id') border-red-500 @enderror">
                    <option value="">Pilih Layanan (Opsional)</option>
                    @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ old('service_id', $testimonial->service_id ?? '') == $service->id ? 'selected' : '' }}>
                        {{ $service->name }}
                    </option>
                    @endforeach
                </select>
                <p class="mt-1 text-xs text-gray-500">Pilih layanan yang terkait dengan testimoni ini</p>
                @error('service_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Service Date --}}
            <div>
                <label for="service_date" class="block text-sm font-semibold text-gray-700 mb-2">
                    Tanggal Layanan
                </label>
                <input type="date"
                       id="service_date"
                       name="service_date"
                       value="{{ old('service_date', isset($testimonial) && $testimonial->service_date ? $testimonial->service_date->format('Y-m-d') : '') }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('service_date') border-red-500 @enderror">
                <p class="mt-1 text-xs text-gray-500">Tanggal ketika layanan diberikan</p>
                @error('service_date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- Rating & Testimonial Section --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
            </svg>
            Rating & Testimoni
        </h3>

        <div class="space-y-6">
            {{-- Rating Star Input --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    Rating <span class="text-red-500">*</span>
                </label>
                <div class="flex items-center gap-6">
                    {{-- Star Display --}}
                    <div class="flex items-center gap-1">
                        <template x-for="star in 5" :key="star">
                            <button type="button"
                                    @click="setRating(star)"
                                    class="focus:outline-none transition-transform hover:scale-110">
                                <svg class="w-10 h-10 fill-current transition-colors"
                                     :class="star <= rating ? 'text-amber-400' : 'text-gray-300'"
                                     viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </button>
                        </template>
                    </div>

                    {{-- Rating Text --}}
                    <div class="flex items-center gap-3">
                        <span class="text-2xl font-bold text-gray-900" x-text="rating"></span>
                        <span class="text-gray-500">/5</span>
                    </div>
                </div>

                {{-- Hidden Input --}}
                <input type="hidden" name="rating" :value="rating" required>

                @error('rating')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Testimonial Text --}}
            <div>
                <label for="testimonial" class="block text-sm font-semibold text-gray-700 mb-2">
                    Testimoni <span class="text-red-500">*</span>
                </label>
                <textarea id="testimonial"
                          name="testimonial"
                          rows="6"
                          required
                          class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('testimonial') border-red-500 @enderror"
                          placeholder="Tulis testimoni dari klien di sini...">{{ old('testimonial', $testimonial->testimonial ?? '') }}</textarea>
                <p class="mt-1 text-xs text-gray-500">Tulis testimoni yang lengkap dan autentik dari klien</p>
                @error('testimonial')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- Status & Settings Section --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            Status & Pengaturan
        </h3>

        <div class="space-y-6">
            {{-- Status Radio Buttons --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    Status <span class="text-red-500">*</span>
                </label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    {{-- Pending --}}
                    <label class="flex items-start p-4 border-2 rounded-lg cursor-pointer transition-all {{ old('status', $testimonial->status ?? 'pending') == 'pending' ? 'border-amber-500 bg-amber-50' : 'border-gray-300 hover:border-amber-300' }}">
                        <input type="radio"
                               name="status"
                               value="pending"
                               {{ old('status', $testimonial->status ?? 'pending') == 'pending' ? 'checked' : '' }}
                               class="mt-1 w-5 h-5 text-amber-600 border-gray-300 focus:ring-amber-500">
                        <div class="ml-3">
                            <div class="font-semibold text-gray-900">Menunggu</div>
                            <div class="text-sm text-gray-600">Testimoni belum disetujui</div>
                        </div>
                    </label>

                    {{-- Approved --}}
                    <label class="flex items-start p-4 border-2 rounded-lg cursor-pointer transition-all {{ old('status', $testimonial->status ?? 'pending') == 'approved' ? 'border-green-500 bg-green-50' : 'border-gray-300 hover:border-green-300' }}">
                        <input type="radio"
                               name="status"
                               value="approved"
                               {{ old('status', $testimonial->status ?? 'pending') == 'approved' ? 'checked' : '' }}
                               class="mt-1 w-5 h-5 text-green-600 border-gray-300 focus:ring-green-500">
                        <div class="ml-3">
                            <div class="font-semibold text-gray-900">Disetujui</div>
                            <div class="text-sm text-gray-600">Tampilkan di website</div>
                        </div>
                    </label>

                    {{-- Rejected --}}
                    <label class="flex items-start p-4 border-2 rounded-lg cursor-pointer transition-all {{ old('status', $testimonial->status ?? 'pending') == 'rejected' ? 'border-red-500 bg-red-50' : 'border-gray-300 hover:border-red-300' }}">
                        <input type="radio"
                               name="status"
                               value="rejected"
                               {{ old('status', $testimonial->status ?? 'pending') == 'rejected' ? 'checked' : '' }}
                               class="mt-1 w-5 h-5 text-red-600 border-gray-300 focus:ring-red-500">
                        <div class="ml-3">
                            <div class="font-semibold text-gray-900">Ditolak</div>
                            <div class="text-sm text-gray-600">Tidak tampil di website</div>
                        </div>
                    </label>
                </div>
                @error('status')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Additional Settings --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Is Featured --}}
                <div>
                    <label class="flex items-start p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                        <input type="hidden" name="is_featured" value="0">
                        <input type="checkbox"
                               name="is_featured"
                               value="1"
                               {{ old('is_featured', $testimonial->is_featured ?? false) ? 'checked' : '' }}
                               class="mt-1 w-5 h-5 text-rose-600 border-gray-300 rounded focus:ring-rose-500">
                        <div class="ml-3">
                            <div class="font-semibold text-gray-900">Testimoni Unggulan</div>
                            <div class="text-sm text-gray-600">Tampilkan di bagian unggulan pada halaman utama</div>
                        </div>
                    </label>
                </div>

                {{-- Sort Order --}}
                <div>
                    <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">
                        Urutan Tampilan
                    </label>
                    <input type="number"
                           id="sort_order"
                           name="sort_order"
                           value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}"
                           min="0"
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('sort_order') border-red-500 @enderror"
                           placeholder="0">
                    <p class="mt-1 text-xs text-gray-500">Angka lebih kecil akan ditampilkan lebih dulu</p>
                    @error('sort_order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    {{-- Form Actions --}}
    <div class="flex items-center justify-end gap-4 pt-6">
        <a href="{{ route('admin.testimonials.index') }}"
           class="px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition">
            Batal
        </a>
        <button type="submit"
                class="px-8 py-3 bg-rose-600 text-white font-semibold rounded-lg hover:bg-rose-700 transition shadow-sm flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            {{ $isEdit ? 'Update Testimoni' : 'Simpan Testimoni' }}
        </button>
    </div>

</div>
