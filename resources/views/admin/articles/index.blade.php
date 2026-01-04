@extends('admin.layout')

@section('title', 'Manajemen Artikel')
@section('header_title', 'Manajemen Artikel')

@section('content')
{{-- Page Header --}}
<div class="mb-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Manajemen Artikel</h1>
            <p class="text-gray-600 mt-1">Kelola semua artikel dan konten blog</p>
        </div>
        <a href="{{ route('admin.articles.create') }}"
           class="inline-flex items-center px-5 py-2.5 bg-rose-600 text-white font-semibold rounded-lg hover:bg-rose-700 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Artikel
        </a>
    </div>
</div>

{{-- Stats Cards --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-lg border border-gray-200 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 font-medium">Total Artikel</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['total'] }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg border border-gray-200 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 font-medium">Dipublikasikan</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['published'] }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg border border-gray-200 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 font-medium">Draft</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['draft'] }}</p>
            </div>
            <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg border border-gray-200 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 font-medium">Featured</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['featured'] }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

{{-- Filters --}}
<div class="bg-white rounded-lg border border-gray-200 p-5 mb-6">
    <form method="GET" action="{{ route('admin.articles.index') }}">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
            {{-- Search --}}
            <div class="md:col-span-5">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Cari Artikel</label>
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari berdasarkan judul, konten, atau penulis..."
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 text-gray-900">
            </div>

            {{-- Status --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 text-gray-900">
                    <option value="">Semua</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>

            {{-- Category --}}
            <div class="md:col-span-3">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-rose-500 text-gray-900">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Buttons --}}
            <div class="md:col-span-2 flex items-end gap-2">
                <button type="submit" class="flex-1 px-4 py-2 bg-rose-600 text-white font-semibold rounded-lg hover:bg-rose-700 transition">
                    Filter
                </button>
                @if(request()->hasAny(['search', 'status', 'category', 'featured']))
                <a href="{{ route('admin.articles.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition">
                    Reset
                </a>
                @endif
            </div>
        </div>

        {{-- Featured Filter --}}
        <div class="mt-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="featured" value="1" {{ request('featured') == '1' ? 'checked' : '' }}
                       class="rounded border-gray-300 text-rose-600 focus:ring-rose-500">
                <span class="ml-2 text-sm font-semibold text-gray-700">Tampilkan hanya artikel featured</span>
            </label>
        </div>
    </form>
</div>

{{-- Articles Table --}}
<div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Artikel</th>
                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Penulis</th>
                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Kategori</th>
                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Tanggal</th>
                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Views</th>
                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($articles as $article)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        @if($article->is_featured)
                        <span class="flex-shrink-0 w-6 h-6 bg-amber-100 rounded flex items-center justify-center">
                            <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </span>
                        @endif
                        <div>
                            <div class="font-semibold text-gray-900">{{ $article->title }}</div>
                            <div class="text-sm text-gray-600 mt-0.5 line-clamp-1">{{ $article->excerpt }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm font-medium text-gray-900">{{ $article->author_name }}</div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex flex-wrap gap-1">
                        @forelse($article->categories as $category)
                        <span class="px-2 py-0.5 bg-blue-100 text-blue-800 text-xs font-medium rounded">
                            {{ $category->name }}
                        </span>
                        @empty
                        <span class="text-sm text-gray-400">-</span>
                        @endforelse
                    </div>
                </td>
                <td class="px-6 py-4">
                    @if($article->status === 'published')
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Published
                    </span>
                    @else
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                        </svg>
                        Draft
                    </span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    @if($article->published_at)
                    <div class="text-sm text-gray-900">{{ $article->published_at->format('d M Y') }}</div>
                    <div class="text-xs text-gray-500">{{ $article->published_at->format('H:i') }}</div>
                    @else
                    <span class="text-sm text-gray-400">-</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm font-medium text-gray-900">{{ number_format($article->views_count) }}</div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.articles.edit', $article->id) }}"
                           class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit
                        </a>
                        <a href="{{ route('articles.show', $article->slug) }}"
                           target="_blank"
                           class="inline-flex items-center px-3 py-1.5 bg-gray-100 text-gray-700 text-sm font-medium rounded hover:bg-gray-200 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="px-6 py-12 text-center">
                    <div class="flex flex-col items-center">
                        <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">Belum ada artikel</h3>
                        <p class="text-gray-600 mb-4">Mulai buat artikel pertama Anda</p>
                        <a href="{{ route('admin.articles.create') }}"
                           class="inline-flex items-center px-4 py-2 bg-rose-600 text-white font-semibold rounded-lg hover:bg-rose-700 transition">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Buat Artikel
                        </a>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    @if($articles->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $articles->links() }}
    </div>
    @endif
</div>
@endsection
