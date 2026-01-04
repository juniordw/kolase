@extends('layouts.app')

@section('seo_title', $category->name . ' | Artikel KOLASE')
@section('seo_description', $category->description ?? 'Kumpulan artikel ' . $category->name . ' dari konselor laktasi profesional KOLASE.')

@section('content')

{{-- Hero Section --}}
<section class="bg-gradient-to-br from-rose-600 via-rose-500 to-mauve text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Breadcrumb --}}
        <nav class="mb-6 text-sm text-rose-100">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('articles.index') }}" class="hover:text-white transition">Artikel</a>
            <span class="mx-2">/</span>
            <span class="text-white">{{ $category->name }}</span>
        </nav>

        <div class="text-center">
            <div class="text-6xl mb-6">📚</div>
            <h1 class="font-display text-5xl md:text-6xl font-bold mb-6">{{ $category->name }}</h1>
            @if($category->description)
            <p class="text-xl text-rose-100 max-w-3xl mx-auto leading-relaxed">
                {{ $category->description }}
            </p>
            @else
            <p class="text-xl text-rose-100 max-w-3xl mx-auto leading-relaxed">
                Artikel dan informasi seputar {{ strtolower($category->name) }} untuk mendukung perjalanan menyusui Anda.
            </p>
            @endif
        </div>
    </div>
</section>

{{-- Articles Grid --}}
<section class="py-16 bg-cream-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Back Link --}}
        <div class="mb-8">
            <a href="{{ route('articles.index') }}"
               class="inline-flex items-center text-rose-600 hover:text-rose-700 font-semibold">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Semua Artikel
            </a>
        </div>

        @if($articles->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($articles as $article)
            <article class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                {{-- Image Placeholder --}}
                <div class="aspect-video bg-gradient-to-br from-rose-200 to-rose-300 flex items-center justify-center text-6xl">
                    📝
                </div>

                {{-- Content --}}
                <div class="p-6">
                    {{-- Category Badge --}}
                    <span class="inline-block px-3 py-1 bg-rose-100 text-rose-700 rounded-full text-xs font-semibold mb-3">
                        {{ $category->name }}
                    </span>

                    {{-- Title --}}
                    <h3 class="font-display text-xl font-semibold text-brown-700 mb-3 line-clamp-2">
                        <a href="{{ route('articles.show', $article->slug) }}" class="hover:text-rose-600 transition">
                            {{ $article->title }}
                        </a>
                    </h3>

                    {{-- Excerpt --}}
                    <p class="text-mauve-dark text-sm mb-4 line-clamp-3">{{ $article->excerpt }}</p>

                    {{-- Meta --}}
                    <div class="flex items-center justify-between text-xs text-mauve border-t border-gray-100 pt-4">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $article->read_time_minutes }} min
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            {{ $article->views_count }}
                        </div>
                        <span>{{ $article->published_at->diffForHumans() }}</span>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $articles->links() }}
        </div>

        @else
        <div class="bg-white rounded-2xl p-16 text-center shadow-md">
            <div class="text-6xl mb-4">📭</div>
            <h3 class="font-display text-2xl font-bold text-brown-700 mb-2">Belum Ada Artikel</h3>
            <p class="text-mauve-dark mb-6">Belum ada artikel yang diterbitkan dalam kategori ini.</p>
            <a href="{{ route('articles.index') }}" class="inline-flex items-center text-rose-600 hover:text-rose-700 font-semibold">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Lihat Semua Artikel
            </a>
        </div>
        @endif

    </div>
</section>

{{-- CTA Section --}}
<section class="py-16 bg-gradient-to-r from-rose-500 to-rose-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-display text-3xl md:text-4xl font-bold mb-4">Butuh Konsultasi Langsung?</h2>
        <p class="text-xl text-rose-100 mb-8">Hubungi konselor kami untuk mendapatkan bantuan profesional</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/6289560622054?text=Halo%20KOLASE%2C%20saya%20ingin%20konsultasi"
               target="_blank"
               class="inline-flex items-center justify-center px-8 py-4 bg-[#25D366] text-white font-bold rounded-xl hover:bg-[#20ba5a] transition shadow-xl">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                Konsultasi via WhatsApp
            </a>
            <a href="{{ route('booking') }}"
               class="inline-flex items-center justify-center px-8 py-4 bg-white text-rose-600 font-semibold rounded-xl hover:bg-rose-50 transition">
                Jadwalkan Konsultasi
            </a>
        </div>
    </div>
</section>

@endsection
