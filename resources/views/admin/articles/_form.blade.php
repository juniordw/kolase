{{-- Basic Information --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
    <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
        <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        Informasi Dasar
    </h3>

    <div class="space-y-5">
        {{-- Title --}}
        <div>
            <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                Judul Artikel <span class="text-red-500">*</span>
            </label>
            <input type="text"
                   name="title"
                   id="title"
                   value="{{ old('title', $article->title ?? '') }}"
                   required
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('title') border-red-500 @enderror"
                   placeholder="Masukkan judul artikel yang menarik">
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Excerpt --}}
        <div>
            <label for="excerpt" class="block text-sm font-semibold text-gray-700 mb-2">
                Ringkasan <span class="text-red-500">*</span>
            </label>
            <textarea name="excerpt"
                      id="excerpt"
                      rows="3"
                      required
                      maxlength="500"
                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('excerpt') border-red-500 @enderror"
                      placeholder="Tulis ringkasan singkat artikel (maks. 500 karakter)">{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
            @error('excerpt')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            <p class="mt-1 text-xs text-gray-500">Ringkasan ini akan ditampilkan di daftar artikel dan preview</p>
        </div>

        {{-- Author --}}
        <div>
            <label for="author_name" class="block text-sm font-semibold text-gray-700 mb-2">
                Nama Penulis <span class="text-red-500">*</span>
            </label>
            <input type="text"
                   name="author_name"
                   id="author_name"
                   value="{{ old('author_name', $article->author_name ?? 'Admin KOLASE') }}"
                   required
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('author_name') border-red-500 @enderror"
                   placeholder="Nama penulis">
            @error('author_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

{{-- Content --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
    <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
        <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
        Konten Artikel
    </h3>

    <div>
        <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">
            Konten <span class="text-red-500">*</span>
        </label>
        <textarea name="content"
                  id="content"
                  rows="15"
                  required
                  class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 font-mono text-sm @error('content') border-red-500 @enderror"
                  placeholder="Tulis konten artikel lengkap di sini...">{{ old('content', $article->content ?? '') }}</textarea>
        @error('content')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
        <p class="mt-1 text-xs text-gray-500">Gunakan HTML atau Markdown untuk formatting</p>
    </div>
</div>

{{-- Featured Image --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
    <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
        <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        Gambar Unggulan
    </h3>

    <div class="space-y-4">
        <div>
            <label for="featured_image" class="block text-sm font-semibold text-gray-700 mb-2">
                URL Gambar
            </label>
            <input type="text"
                   name="featured_image"
                   id="featured_image"
                   value="{{ old('featured_image', $article->featured_image ?? '') }}"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('featured_image') border-red-500 @enderror"
                   placeholder="https://example.com/image.jpg">
            @error('featured_image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="featured_image_alt" class="block text-sm font-semibold text-gray-700 mb-2">
                Alt Text
            </label>
            <input type="text"
                   name="featured_image_alt"
                   id="featured_image_alt"
                   value="{{ old('featured_image_alt', $article->featured_image_alt ?? '') }}"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('featured_image_alt') border-red-500 @enderror"
                   placeholder="Deskripsi gambar untuk aksesibilitas">
            @error('featured_image_alt')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            <p class="mt-1 text-xs text-gray-500">Alt text penting untuk SEO dan aksesibilitas</p>
        </div>
    </div>
</div>

{{-- Categories & Tags --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
    <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
        <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
        </svg>
        Kategori & Tag
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Categories --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">Kategori</label>
            <div class="space-y-2 max-h-64 overflow-y-auto border border-gray-200 rounded-lg p-4">
                @foreach($categories as $category)
                <label class="flex items-start cursor-pointer hover:bg-gray-50 p-2 rounded transition">
                    <input type="checkbox"
                           name="categories[]"
                           value="{{ $category->id }}"
                           {{ in_array($category->id, old('categories', isset($article) ? $article->categories->pluck('id')->toArray() : [])) ? 'checked' : '' }}
                           class="w-4 h-4 text-rose-600 border-gray-300 rounded focus:ring-rose-500 mt-0.5">
                    <span class="ml-3 text-sm text-gray-700">{{ $category->name }}</span>
                </label>
                @endforeach
            </div>
            <p class="mt-2 text-xs text-gray-500">Pilih satu atau lebih kategori yang sesuai</p>
        </div>

        {{-- Tags --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">Tag</label>
            <div class="space-y-2 max-h-64 overflow-y-auto border border-gray-200 rounded-lg p-4">
                @foreach($tags as $tag)
                <label class="flex items-start cursor-pointer hover:bg-gray-50 p-2 rounded transition">
                    <input type="checkbox"
                           name="tags[]"
                           value="{{ $tag->id }}"
                           {{ in_array($tag->id, old('tags', isset($article) ? $article->tags->pluck('id')->toArray() : [])) ? 'checked' : '' }}
                           class="w-4 h-4 text-rose-600 border-gray-300 rounded focus:ring-rose-500 mt-0.5">
                    <span class="ml-3 text-sm text-gray-700">{{ $tag->name }}</span>
                </label>
                @endforeach
            </div>
            <p class="mt-2 text-xs text-gray-500">Pilih tag yang relevan untuk artikel ini</p>
        </div>
    </div>
</div>

{{-- Publishing Settings --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
    <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
        <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        Pengaturan Publikasi
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Status --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">
                Status <span class="text-red-500">*</span>
            </label>
            <div class="space-y-3">
                <label class="flex items-center cursor-pointer p-3 border-2 rounded-lg transition {{ old('status', $article->status ?? 'draft') === 'draft' ? 'border-amber-500 bg-amber-50' : 'border-gray-200 hover:border-gray-300' }}">
                    <input type="radio"
                           name="status"
                           value="draft"
                           {{ old('status', $article->status ?? 'draft') === 'draft' ? 'checked' : '' }}
                           class="w-4 h-4 text-amber-600 border-gray-300 focus:ring-amber-500">
                    <span class="ml-3">
                        <span class="block text-sm font-semibold text-gray-900">Draft</span>
                        <span class="block text-xs text-gray-600">Simpan tanpa publish</span>
                    </span>
                </label>
                <label class="flex items-center cursor-pointer p-3 border-2 rounded-lg transition {{ old('status', $article->status ?? '') === 'published' ? 'border-green-500 bg-green-50' : 'border-gray-200 hover:border-gray-300' }}">
                    <input type="radio"
                           name="status"
                           value="published"
                           {{ old('status', $article->status ?? '') === 'published' ? 'checked' : '' }}
                           class="w-4 h-4 text-green-600 border-gray-300 focus:ring-green-500">
                    <span class="ml-3">
                        <span class="block text-sm font-semibold text-gray-900">Dipublikasikan</span>
                        <span class="block text-xs text-gray-600">Artikel akan tayang di website</span>
                    </span>
                </label>
            </div>
        </div>

        {{-- Published Date & Read Time --}}
        <div class="space-y-4">
            <div>
                <label for="published_at" class="block text-sm font-semibold text-gray-700 mb-2">
                    Tanggal Publish
                </label>
                <input type="datetime-local"
                       name="published_at"
                       id="published_at"
                       value="{{ old('published_at', isset($article) && $article->published_at ? $article->published_at->format('Y-m-d\TH:i') : '') }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('published_at') border-red-500 @enderror">
                @error('published_at')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">Kosongkan untuk publish segera</p>
            </div>

            <div>
                <label for="read_time_minutes" class="block text-sm font-semibold text-gray-700 mb-2">
                    Waktu Baca (menit)
                </label>
                <input type="number"
                       name="read_time_minutes"
                       id="read_time_minutes"
                       value="{{ old('read_time_minutes', $article->read_time_minutes ?? '') }}"
                       min="1"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('read_time_minutes') border-red-500 @enderror"
                       placeholder="5">
                @error('read_time_minutes')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">Estimasi waktu baca artikel</p>
            </div>
        </div>
    </div>

    {{-- Featured Toggle --}}
    <div class="mt-6 pt-6 border-t border-gray-200">
        <label class="flex items-center cursor-pointer">
            <input type="hidden" name="is_featured" value="0">
            <input type="checkbox"
                   name="is_featured"
                   value="1"
                   {{ old('is_featured', $article->is_featured ?? false) ? 'checked' : '' }}
                   class="w-5 h-5 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
            <span class="ml-3">
                <span class="block text-sm font-semibold text-gray-900">Jadikan Featured Article</span>
                <span class="block text-xs text-gray-600">Artikel featured akan ditampilkan di halaman utama</span>
            </span>
        </label>
    </div>
</div>

{{-- SEO Settings (Collapsible) --}}
<div x-data="{ seoOpen: false }" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-bold text-gray-900 flex items-center">
            <svg class="w-5 h-5 mr-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            Pengaturan SEO
        </h3>
        <button type="button"
                @click="seoOpen = !seoOpen"
                class="text-sm text-rose-600 hover:text-rose-700 font-semibold">
            <span x-show="!seoOpen">Tampilkan</span>
            <span x-show="seoOpen">Sembunyikan</span>
        </button>
    </div>

    <div x-show="seoOpen" x-collapse>
        <div class="space-y-4 pt-4">
            <div>
                <label for="seo_title" class="block text-sm font-semibold text-gray-700 mb-2">
                    Meta Title
                </label>
                <input type="text"
                       name="seo_title"
                       id="seo_title"
                       value="{{ old('seo_title', $article->seo_title ?? '') }}"
                       maxlength="60"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('seo_title') border-red-500 @enderror"
                       placeholder="Judul untuk mesin pencari (maks. 60 karakter)">
                @error('seo_title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">Kosongkan untuk menggunakan judul artikel</p>
            </div>

            <div>
                <label for="seo_description" class="block text-sm font-semibold text-gray-700 mb-2">
                    Meta Description
                </label>
                <textarea name="seo_description"
                          id="seo_description"
                          rows="3"
                          maxlength="160"
                          class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('seo_description') border-red-500 @enderror"
                          placeholder="Deskripsi untuk mesin pencari (maks. 160 karakter)">{{ old('seo_description', $article->seo_description ?? '') }}</textarea>
                @error('seo_description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">Deskripsi yang muncul di hasil pencarian Google</p>
            </div>

            <div>
                <label for="seo_keywords" class="block text-sm font-semibold text-gray-700 mb-2">
                    Keywords
                </label>
                <input type="text"
                       name="seo_keywords"
                       id="seo_keywords"
                       value="{{ old('seo_keywords', $article->seo_keywords ?? '') }}"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 @error('seo_keywords') border-red-500 @enderror"
                       placeholder="keyword1, keyword2, keyword3">
                @error('seo_keywords')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">Pisahkan dengan koma. Contoh: konseling menyusui, laktasi, ASI</p>
            </div>
        </div>
    </div>
</div>
