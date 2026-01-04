@extends('admin.layout')

@section('title', 'Edit Artikel')
@section('header_title', 'Edit Artikel')

@section('content')
{{-- Header Section with Gradient --}}
<div class="mb-8 relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-500 via-indigo-500 to-purple-500 p-8 text-white">
    <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>

    <div class="relative z-10">
        <div class="flex items-center justify-between">
            <div>
                {{-- Breadcrumb --}}
                <nav class="flex items-center space-x-2 text-sm mb-4 text-blue-100">
                    <a href="{{ route('admin.articles.index') }}" class="hover:text-white transition">Artikel</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    <span class="text-white font-medium">Edit</span>
                </nav>

                <h1 class="text-3xl font-bold mb-2 flex items-center">
                    <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit Artikel
                </h1>
                <p class="text-blue-100">{{ $article->title }}</p>
            </div>
            @if($article->is_featured)
            <div class="hidden lg:block">
                <div class="w-24 h-24 bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl flex items-center justify-center shadow-xl">
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
            </div>
            @else
            <div class="hidden lg:block">
                <div class="w-24 h-24 bg-white/10 backdrop-blur rounded-2xl flex items-center justify-center">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

{{-- Stats Cards with Modern Design --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
    <div class="group relative bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-5 text-white overflow-hidden hover:shadow-xl transition-all duration-300 hover:scale-105 cursor-pointer">
        <div class="absolute top-0 right-0 w-20 h-20 bg-white/10 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-2">
                <span class="text-blue-100 text-xs font-medium uppercase tracking-wide">Total Views</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
            </div>
            <div class="text-2xl font-bold">{{ number_format($article->views_count) }}</div>
        </div>
    </div>

    <div class="group relative bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl p-5 text-white overflow-hidden hover:shadow-xl transition-all duration-300 hover:scale-105 cursor-pointer">
        <div class="absolute top-0 right-0 w-20 h-20 bg-white/10 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-2">
                <span class="text-green-100 text-xs font-medium uppercase tracking-wide">Status</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    @if($article->status === 'published')
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    @else
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                    @endif
                </svg>
            </div>
            <div class="text-2xl font-bold capitalize">{{ $article->status }}</div>
        </div>
    </div>

    <div class="group relative bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl p-5 text-white overflow-hidden hover:shadow-xl transition-all duration-300 hover:scale-105 cursor-pointer">
        <div class="absolute top-0 right-0 w-20 h-20 bg-white/10 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-2">
                <span class="text-purple-100 text-xs font-medium uppercase tracking-wide">Waktu Baca</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="text-2xl font-bold">{{ $article->read_time_minutes ?? 5 }} <span class="text-sm font-normal">mnt</span></div>
        </div>
    </div>

    <div class="group relative bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl p-5 text-white overflow-hidden hover:shadow-xl transition-all duration-300 hover:scale-105 cursor-pointer">
        <div class="absolute top-0 right-0 w-20 h-20 bg-white/10 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-2">
                <span class="text-amber-100 text-xs font-medium uppercase tracking-wide">Dibuat</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <div class="text-lg font-bold">{{ $article->created_at->format('d M Y') }}</div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    {{-- Main Form --}}
    <div class="lg:col-span-2">
        <form action="{{ route('admin.articles.update', $article->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.articles._form')

            <div class="mt-6 flex flex-wrap items-center gap-4">
                <button type="submit" class="group relative inline-flex items-center px-8 py-3.5 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 text-white font-bold rounded-xl hover:from-blue-700 hover:via-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                    <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Update Artikel
                    {{-- Shine effect --}}
                    <div class="absolute inset-0 rounded-xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                    </div>
                </button>
                <a href="{{ route('admin.articles.index') }}" class="inline-flex items-center px-6 py-3.5 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition-all hover:scale-105 duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Batal
                </a>
                <a href="{{ route('articles.show', $article->slug) }}" target="_blank" class="inline-flex items-center px-6 py-3.5 bg-white border-2 border-blue-500 text-blue-600 font-bold rounded-xl hover:bg-blue-50 transition-all hover:scale-105 duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    Lihat Artikel
                </a>
            </div>
        </form>

        {{-- Danger Zone with Enhanced Design --}}
        <div class="mt-8 relative overflow-hidden bg-gradient-to-br from-red-50 to-red-100 border-2 border-red-300 rounded-2xl p-6 shadow-lg">
            <div class="absolute top-0 right-0 w-32 h-32 bg-red-200/30 rounded-full blur-2xl"></div>
            <div class="relative z-10">
                <h3 class="text-xl font-bold text-red-900 mb-3 flex items-center">
                    <div class="w-10 h-10 bg-red-500 rounded-xl flex items-center justify-center mr-3 shadow">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    Danger Zone
                </h3>
                <p class="text-sm text-red-800 mb-4 bg-white/50 rounded-lg p-3 border border-red-200">
                    ⚠️ Tindakan ini tidak dapat dibatalkan. Artikel akan dihapus secara permanen dari database termasuk semua data terkait.
                </p>
                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST"
                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini? Tindakan ini tidak dapat dibatalkan.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-all shadow hover:shadow-lg hover:scale-105 duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Hapus Artikel Permanen
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Sidebar --}}
    <div class="lg:col-span-1">
        <div class="sticky top-6 space-y-6">
            {{-- Article Meta --}}
            <div class="bg-gradient-to-br from-indigo-50 to-purple-50 border-2 border-indigo-200 rounded-2xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mr-3 shadow">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-indigo-900 text-lg">Meta Artikel</h3>
                </div>

                <div class="space-y-3 text-sm">
                    <div class="bg-white/60 backdrop-blur rounded-lg p-3 border border-indigo-100">
                        <div class="text-indigo-700 font-medium mb-1">Slug</div>
                        <code class="text-indigo-900 text-xs bg-white px-2 py-1 rounded border border-indigo-200 block overflow-x-auto">{{ $article->slug }}</code>
                    </div>
                    <div class="bg-white/60 backdrop-blur rounded-lg p-3 border border-indigo-100">
                        <div class="text-indigo-700 font-medium mb-1">Penulis</div>
                        <div class="text-indigo-900 font-semibold">{{ $article->author_name }}</div>
                    </div>
                    <div class="bg-white/60 backdrop-blur rounded-lg p-3 border border-indigo-100">
                        <div class="text-indigo-700 font-medium mb-1">Terakhir Update</div>
                        <div class="text-indigo-900">{{ $article->updated_at->format('d M Y, H:i') }}</div>
                    </div>
                    @if($article->published_at)
                    <div class="bg-white/60 backdrop-blur rounded-lg p-3 border border-indigo-100">
                        <div class="text-indigo-700 font-medium mb-1">Dipublikasi</div>
                        <div class="text-indigo-900">{{ $article->published_at->format('d M Y, H:i') }}</div>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Quick Tips --}}
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 border-2 border-green-200 rounded-2xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-3 shadow">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-green-900 text-lg">Tips Update</h3>
                </div>
                <ul class="space-y-2 text-sm text-green-800">
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-green-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span>Periksa kembali grammar dan typo</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-green-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span>Update SEO meta untuk performa lebih baik</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-green-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span>Lihat preview sebelum update</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
