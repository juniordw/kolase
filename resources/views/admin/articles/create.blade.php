@extends('admin.layout')

@section('title', 'Tambah Artikel Baru')
@section('header_title', 'Tambah Artikel Baru')

@section('content')
{{-- Header Section with Gradient --}}
<div class="mb-8 relative overflow-hidden rounded-2xl bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 p-8 text-white">
    <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>

    <div class="relative z-10">
        <div class="flex items-center justify-between">
            <div>
                {{-- Breadcrumb --}}
                <nav class="flex items-center space-x-2 text-sm mb-4 text-purple-100">
                    <a href="{{ route('admin.articles.index') }}" class="hover:text-white transition">Artikel</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    <span class="text-white font-medium">Tambah Baru</span>
                </nav>

                <h1 class="text-3xl font-bold mb-2 flex items-center">
                    <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Buat Artikel Baru
                </h1>
                <p class="text-purple-100">Tulis konten berkualitas untuk meningkatkan engagement dengan audiens</p>
            </div>
            <div class="hidden lg:block">
                <div class="w-24 h-24 bg-white/10 backdrop-blur rounded-2xl flex items-center justify-center">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    {{-- Main Form --}}
    <div class="lg:col-span-2">
        <form action="{{ route('admin.articles.store') }}" method="POST">
            @csrf
            @include('admin.articles._form')

            <div class="mt-6 flex flex-wrap items-center gap-4">
                <button type="submit" class="group relative inline-flex items-center px-8 py-3.5 bg-gradient-to-r from-purple-600 via-purple-500 to-pink-500 text-white font-bold rounded-xl hover:from-purple-700 hover:via-purple-600 hover:to-pink-600 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                    <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Artikel
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
            </div>
        </form>
    </div>

    {{-- Sidebar Help with Modern Design --}}
    <div class="lg:col-span-1">
        <div class="sticky top-6 space-y-6">
            {{-- Guidelines Card --}}
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 border-2 border-blue-200 rounded-2xl p-6 shadow-lg">
                <div class="flex items-center mb-5">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mr-3 shadow">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-blue-900 text-lg">Panduan Menulis</h3>
                </div>

                <div class="space-y-4 text-sm">
                    <div class="bg-white/60 backdrop-blur rounded-xl p-4 border border-blue-100">
                        <div class="font-bold text-blue-900 mb-2 flex items-center">
                            <span class="text-2xl mr-2">📝</span>
                            Judul Artikel
                        </div>
                        <p class="text-blue-800 text-xs leading-relaxed">Buat judul yang menarik dan SEO-friendly. Maksimal 60 karakter untuk hasil terbaik di search engine.</p>
                    </div>

                    <div class="bg-white/60 backdrop-blur rounded-xl p-4 border border-blue-100">
                        <div class="font-bold text-blue-900 mb-2 flex items-center">
                            <span class="text-2xl mr-2">✍️</span>
                            Konten Berkualitas
                        </div>
                        <p class="text-blue-800 text-xs leading-relaxed">Tulis konten informatif dan mudah dibaca. Gunakan paragraf pendek dan subjudul untuk keterbacaan.</p>
                    </div>

                    <div class="bg-white/60 backdrop-blur rounded-xl p-4 border border-blue-100">
                        <div class="font-bold text-blue-900 mb-2 flex items-center">
                            <span class="text-2xl mr-2">🏷️</span>
                            Kategori & Tag
                        </div>
                        <p class="text-blue-800 text-xs leading-relaxed">Pilih kategori relevan dan tambahkan tag untuk memudahkan pencarian artikel.</p>
                    </div>

                    <div class="bg-white/60 backdrop-blur rounded-xl p-4 border border-blue-100">
                        <div class="font-bold text-blue-900 mb-2 flex items-center">
                            <span class="text-2xl mr-2">⭐</span>
                            Featured Article
                        </div>
                        <p class="text-blue-800 text-xs leading-relaxed">Artikel featured akan ditampilkan di halaman utama dengan prioritas lebih tinggi.</p>
                    </div>

                    <div class="bg-white/60 backdrop-blur rounded-xl p-4 border border-blue-100">
                        <div class="font-bold text-blue-900 mb-2 flex items-center">
                            <span class="text-2xl mr-2">🔍</span>
                            SEO Optimization
                        </div>
                        <p class="text-blue-800 text-xs leading-relaxed">Isi meta title dan description untuk meningkatkan peringkat di search engine.</p>
                    </div>
                </div>
            </div>

            {{-- Tips Card --}}
            <div class="bg-gradient-to-br from-purple-50 to-pink-50 border-2 border-purple-200 rounded-2xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mr-3 shadow">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-purple-900 text-lg">Tips Pro</h3>
                </div>
                <ul class="space-y-3 text-sm text-purple-800">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-purple-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="leading-relaxed">Gunakan gambar berkualitas tinggi untuk featured image</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-purple-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="leading-relaxed">Simpan draft secara berkala untuk menghindari kehilangan data</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-purple-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="leading-relaxed">Targetkan 5-10 menit waktu baca untuk engagement optimal</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-purple-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="leading-relaxed">Pilih minimal 1 kategori untuk organisasi yang lebih baik</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
