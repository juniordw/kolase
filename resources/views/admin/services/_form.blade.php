@php
    $isEdit = isset($service);
@endphp

<div x-data="{
    features: {{ json_encode(old('features', $service->features ?? [])) }},
    targetClients: {{ json_encode(old('target_clients', $service->target_clients ?? [])) }},
    casesHandled: {{ json_encode(old('cases_handled', $service->cases_handled ?? [])) }},
    availableTypes: {{ json_encode(old('available_types', $service->available_types ?? [])) }},
    showSeo: false,
    addFeature() {
        this.features.push('');
    },
    removeFeature(index) {
        this.features.splice(index, 1);
    },
    addTargetClient() {
        this.targetClients.push('');
    },
    removeTargetClient(index) {
        this.targetClients.splice(index, 1);
    },
    addCase() {
        this.casesHandled.push('');
    },
    removeCase(index) {
        this.casesHandled.splice(index, 1);
    },
    toggleType(type) {
        const index = this.availableTypes.indexOf(type);
        if (index > -1) {
            this.availableTypes.splice(index, 1);
        } else {
            this.availableTypes.push(type);
        }
    },
    isTypeSelected(type) {
        return this.availableTypes.includes(type);
    }
}" class="space-y-8">

    {{-- Basic Information Section --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Informasi Dasar
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Name --}}
            <div class="md:col-span-2">
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Layanan <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       id="name"
                       name="name"
                       value="{{ old('name', $service->name ?? '') }}"
                       required
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('name') border-red-500 @enderror"
                       placeholder="Contoh: Konsultasi Laktasi">
                @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Icon --}}
            <div>
                <label for="icon" class="block text-sm font-semibold text-gray-700 mb-2">
                    Icon (Emoji)
                </label>
                <input type="text"
                       id="icon"
                       name="icon"
                       value="{{ old('icon', $service->icon ?? '') }}"
                       maxlength="10"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('icon') border-red-500 @enderror"
                       placeholder="🤱">
                <p class="mt-1 text-xs text-gray-500">Gunakan emoji untuk ikon layanan</p>
                @error('icon')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tagline --}}
            <div>
                <label for="tagline" class="block text-sm font-semibold text-gray-700 mb-2">
                    Tagline
                </label>
                <input type="text"
                       id="tagline"
                       name="tagline"
                       value="{{ old('tagline', $service->tagline ?? '') }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('tagline') border-red-500 @enderror"
                       placeholder="Tagline singkat untuk layanan">
                @error('tagline')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Short Description --}}
            <div class="md:col-span-2">
                <label for="short_description" class="block text-sm font-semibold text-gray-700 mb-2">
                    Deskripsi Singkat <span class="text-red-500">*</span>
                </label>
                <textarea id="short_description"
                          name="short_description"
                          rows="3"
                          required
                          maxlength="500"
                          class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('short_description') border-red-500 @enderror"
                          placeholder="Deskripsi singkat layanan (maksimal 500 karakter)">{{ old('short_description', $service->short_description ?? '') }}</textarea>
                <p class="mt-1 text-xs text-gray-500">Maksimal 500 karakter</p>
                @error('short_description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Full Description --}}
            <div class="md:col-span-2">
                <label for="full_description" class="block text-sm font-semibold text-gray-700 mb-2">
                    Deskripsi Lengkap <span class="text-red-500">*</span>
                </label>
                <textarea id="full_description"
                          name="full_description"
                          rows="6"
                          required
                          class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('full_description') border-red-500 @enderror"
                          placeholder="Deskripsi lengkap layanan">{{ old('full_description', $service->full_description ?? '') }}</textarea>
                <p class="mt-1 text-xs text-gray-500">Mendukung format WYSIWYG - tambahkan detail lengkap tentang layanan</p>
                @error('full_description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- Features Section --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Fitur & Detail
        </h3>

        <div class="space-y-6">
            {{-- Features Array --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    Fitur Layanan
                </label>
                <div class="space-y-3">
                    <template x-for="(feature, index) in features" :key="index">
                        <div class="flex items-center gap-2">
                            <input type="text"
                                   :name="'features[' + index + ']'"
                                   x-model="features[index]"
                                   class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500"
                                   placeholder="Contoh: Konsultasi privat dengan ahli">
                            <button type="button"
                                    @click="removeFeature(index)"
                                    class="px-3 py-2.5 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </template>
                </div>
                <button type="button"
                        @click="addFeature"
                        class="mt-3 inline-flex items-center px-4 py-2 bg-rose-100 text-rose-700 rounded-lg hover:bg-rose-200 transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Tambah Fitur
                </button>
            </div>

            {{-- Target Clients Array --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    Target Klien
                </label>
                <div class="space-y-3">
                    <template x-for="(client, index) in targetClients" :key="index">
                        <div class="flex items-center gap-2">
                            <input type="text"
                                   :name="'target_clients[' + index + ']'"
                                   x-model="targetClients[index]"
                                   class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500"
                                   placeholder="Contoh: Ibu menyusui">
                            <button type="button"
                                    @click="removeTargetClient(index)"
                                    class="px-3 py-2.5 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </template>
                </div>
                <button type="button"
                        @click="addTargetClient"
                        class="mt-3 inline-flex items-center px-4 py-2 bg-rose-100 text-rose-700 rounded-lg hover:bg-rose-200 transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Tambah Target Klien
                </button>
            </div>

            {{-- Cases Handled Array --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    Kasus yang Ditangani
                </label>
                <div class="space-y-3">
                    <template x-for="(caseItem, index) in casesHandled" :key="index">
                        <div class="flex items-center gap-2">
                            <input type="text"
                                   :name="'cases_handled[' + index + ']'"
                                   x-model="casesHandled[index]"
                                   class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500"
                                   placeholder="Contoh: Masalah produksi ASI">
                            <button type="button"
                                    @click="removeCase(index)"
                                    class="px-3 py-2.5 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </template>
                </div>
                <button type="button"
                        @click="addCase"
                        class="mt-3 inline-flex items-center px-4 py-2 bg-rose-100 text-rose-700 rounded-lg hover:bg-rose-200 transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Tambah Kasus
                </button>
            </div>
        </div>
    </div>

    {{-- Pricing & Duration Section --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Harga & Durasi
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Duration --}}
            <div>
                <label for="duration_minutes" class="block text-sm font-semibold text-gray-700 mb-2">
                    Durasi (menit) <span class="text-red-500">*</span>
                </label>
                <input type="number"
                       id="duration_minutes"
                       name="duration_minutes"
                       value="{{ old('duration_minutes', $service->duration_minutes ?? '') }}"
                       required
                       min="15"
                       step="15"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('duration_minutes') border-red-500 @enderror"
                       placeholder="60">
                <p class="mt-1 text-xs text-gray-500">Minimal 15 menit</p>
                @error('duration_minutes')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Price --}}
            <div>
                <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">
                    Harga (Rp)
                </label>
                <input type="number"
                       id="price"
                       name="price"
                       value="{{ old('price', $service->price ?? '') }}"
                       min="0"
                       step="1000"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('price') border-red-500 @enderror"
                       placeholder="150000">
                <p class="mt-1 text-xs text-gray-500">Kosongkan jika gratis</p>
                @error('price')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Price Note --}}
            <div class="md:col-span-2">
                <label for="price_note" class="block text-sm font-semibold text-gray-700 mb-2">
                    Catatan Harga
                </label>
                <input type="text"
                       id="price_note"
                       name="price_note"
                       value="{{ old('price_note', $service->price_note ?? '') }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('price_note') border-red-500 @enderror"
                       placeholder="Contoh: Per sesi">
                <p class="mt-1 text-xs text-gray-500">Keterangan tambahan tentang harga</p>
                @error('price_note')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- Available Types Section --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            Tipe Layanan Tersedia
        </h3>

        <div class="space-y-3">
            {{-- Home Visit --}}
            <label class="flex items-start p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                <input type="checkbox"
                       name="available_types[]"
                       value="home_visit"
                       :checked="isTypeSelected('home_visit')"
                       @change="toggleType('home_visit')"
                       class="mt-1 w-5 h-5 text-rose-600 border-gray-300 rounded focus:ring-rose-500">
                <div class="ml-3">
                    <div class="font-semibold text-gray-900">Kunjungan Rumah</div>
                    <div class="text-sm text-gray-600">Layanan datang ke rumah klien</div>
                </div>
            </label>

            {{-- Clinic --}}
            <label class="flex items-start p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                <input type="checkbox"
                       name="available_types[]"
                       value="clinic"
                       :checked="isTypeSelected('clinic')"
                       @change="toggleType('clinic')"
                       class="mt-1 w-5 h-5 text-rose-600 border-gray-300 rounded focus:ring-rose-500">
                <div class="ml-3">
                    <div class="font-semibold text-gray-900">Klinik</div>
                    <div class="text-sm text-gray-600">Layanan di klinik</div>
                </div>
            </label>

            {{-- Online --}}
            <label class="flex items-start p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                <input type="checkbox"
                       name="available_types[]"
                       value="online"
                       :checked="isTypeSelected('online')"
                       @change="toggleType('online')"
                       class="mt-1 w-5 h-5 text-rose-600 border-gray-300 rounded focus:ring-rose-500">
                <div class="ml-3">
                    <div class="font-semibold text-gray-900">Online</div>
                    <div class="text-sm text-gray-600">Konsultasi via video call atau telepon</div>
                </div>
            </label>
        </div>
    </div>

    {{-- Badge & Status Section --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
            </svg>
            Badge & Status
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Badge Text --}}
            <div>
                <label for="badge" class="block text-sm font-semibold text-gray-700 mb-2">
                    Badge Text
                </label>
                <input type="text"
                       id="badge"
                       name="badge"
                       value="{{ old('badge', $service->badge ?? '') }}"
                       maxlength="50"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('badge') border-red-500 @enderror"
                       placeholder="Contoh: POPULER">
                <p class="mt-1 text-xs text-gray-500">Maksimal 50 karakter</p>
                @error('badge')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Badge Color --}}
            <div>
                <label for="badge_color" class="block text-sm font-semibold text-gray-700 mb-2">
                    Warna Badge
                </label>
                <select id="badge_color"
                        name="badge_color"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('badge_color') border-red-500 @enderror">
                    <option value="">Pilih Warna</option>
                    <option value="rose" {{ old('badge_color', $service->badge_color ?? '') == 'rose' ? 'selected' : '' }}>Rose</option>
                    <option value="amber" {{ old('badge_color', $service->badge_color ?? '') == 'amber' ? 'selected' : '' }}>Amber</option>
                    <option value="blue" {{ old('badge_color', $service->badge_color ?? '') == 'blue' ? 'selected' : '' }}>Blue</option>
                    <option value="green" {{ old('badge_color', $service->badge_color ?? '') == 'green' ? 'selected' : '' }}>Green</option>
                </select>
                @error('badge_color')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Launch Date --}}
            <div>
                <label for="launch_date" class="block text-sm font-semibold text-gray-700 mb-2">
                    Tanggal Peluncuran
                </label>
                <input type="date"
                       id="launch_date"
                       name="launch_date"
                       value="{{ old('launch_date', isset($service) && $service->launch_date ? $service->launch_date->format('Y-m-d') : '') }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('launch_date') border-red-500 @enderror">
                @error('launch_date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Sort Order --}}
            <div>
                <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">
                    Urutan Tampilan
                </label>
                <input type="number"
                       id="sort_order"
                       name="sort_order"
                       value="{{ old('sort_order', $service->sort_order ?? 0) }}"
                       min="0"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('sort_order') border-red-500 @enderror"
                       placeholder="0">
                <p class="mt-1 text-xs text-gray-500">Angka lebih kecil akan ditampilkan lebih dulu</p>
                @error('sort_order')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status Toggles --}}
            <div class="md:col-span-2 space-y-4">
                {{-- Is Active --}}
                <label class="flex items-center cursor-pointer">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox"
                           name="is_active"
                           value="1"
                           {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}
                           class="w-5 h-5 text-rose-600 border-gray-300 rounded focus:ring-rose-500">
                    <div class="ml-3">
                        <div class="font-semibold text-gray-900">Layanan Aktif</div>
                        <div class="text-sm text-gray-600">Layanan dapat dilihat dan dibooking oleh klien</div>
                    </div>
                </label>

                {{-- Is Featured --}}
                <label class="flex items-center cursor-pointer">
                    <input type="hidden" name="is_featured" value="0">
                    <input type="checkbox"
                           name="is_featured"
                           value="1"
                           {{ old('is_featured', $service->is_featured ?? false) ? 'checked' : '' }}
                           class="w-5 h-5 text-rose-600 border-gray-300 rounded focus:ring-rose-500">
                    <div class="ml-3">
                        <div class="font-semibold text-gray-900">Layanan Unggulan</div>
                        <div class="text-sm text-gray-600">Tampilkan di bagian unggulan pada halaman utama</div>
                    </div>
                </label>
            </div>
        </div>
    </div>

    {{-- SEO Section --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <button type="button"
                @click="showSeo = !showSeo"
                class="w-full px-6 py-4 flex items-center justify-between text-left hover:bg-gray-50 transition">
            <h3 class="text-lg font-bold text-gray-900 flex items-center">
                <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                SEO (Search Engine Optimization)
            </h3>
            <svg class="w-5 h-5 text-gray-400 transition-transform"
                 :class="{ 'rotate-180': showSeo }"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>

        <div x-show="showSeo"
             x-transition
             class="px-6 pb-6 space-y-6">
            {{-- SEO Title --}}
            <div>
                <label for="seo_title" class="block text-sm font-semibold text-gray-700 mb-2">
                    SEO Title
                </label>
                <input type="text"
                       id="seo_title"
                       name="seo_title"
                       value="{{ old('seo_title', $service->seo_title ?? '') }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('seo_title') border-red-500 @enderror"
                       placeholder="Judul untuk mesin pencari">
                <p class="mt-1 text-xs text-gray-500">Akan menggunakan nama layanan jika kosong</p>
                @error('seo_title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- SEO Description --}}
            <div>
                <label for="seo_description" class="block text-sm font-semibold text-gray-700 mb-2">
                    SEO Description
                </label>
                <textarea id="seo_description"
                          name="seo_description"
                          rows="3"
                          class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('seo_description') border-red-500 @enderror"
                          placeholder="Deskripsi untuk mesin pencari (maksimal 160 karakter)">{{ old('seo_description', $service->seo_description ?? '') }}</textarea>
                <p class="mt-1 text-xs text-gray-500">Maksimal 160 karakter untuk hasil terbaik</p>
                @error('seo_description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- SEO Keywords --}}
            <div>
                <label for="seo_keywords" class="block text-sm font-semibold text-gray-700 mb-2">
                    SEO Keywords
                </label>
                <input type="text"
                       id="seo_keywords"
                       name="seo_keywords"
                       value="{{ old('seo_keywords', $service->seo_keywords ?? '') }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('seo_keywords') border-red-500 @enderror"
                       placeholder="kata kunci, dipisah, dengan, koma">
                <p class="mt-1 text-xs text-gray-500">Pisahkan kata kunci dengan koma</p>
                @error('seo_keywords')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- Form Actions --}}
    <div class="flex items-center justify-end gap-4 pt-6">
        <a href="{{ route('admin.services.index') }}"
           class="px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition">
            Batal
        </a>
        <button type="submit"
                class="px-8 py-3 bg-rose-600 text-white font-semibold rounded-lg hover:bg-rose-700 transition shadow-sm flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            {{ $isEdit ? 'Update Layanan' : 'Simpan Layanan' }}
        </button>
    </div>

</div>
