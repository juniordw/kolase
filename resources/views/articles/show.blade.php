@extends('layouts.app')

@section('seo_title', $article->seo_title ?? $article->title . ' | KOLASE')
@section('seo_description', $article->seo_description ?? $article->excerpt)
@section('seo_keywords', $article->seo_keywords ?? implode(', ', $article->tags->pluck('name')->toArray()))

@section('content')

{{-- Article Header --}}
<article class="py-16 bg-cream-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Breadcrumb --}}
        <nav class="mb-8 text-sm text-mauve-dark">
            <a href="{{ route('home') }}" class="hover:text-rose-600">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('articles.index') }}" class="hover:text-rose-600">Artikel</a>
            @if($article->categories->first())
            <span class="mx-2">/</span>
            <a href="{{ route('articles.category', $article->categories->first()->slug) }}" class="hover:text-rose-600">
                {{ $article->categories->first()->name }}
            </a>
            @endif
            <span class="mx-2">/</span>
            <span class="text-brown-700">{{ $article->title }}</span>
        </nav>

        {{-- Category Badge --}}
        @if($article->categories->first())
        <a href="{{ route('articles.category', $article->categories->first()->slug) }}"
           class="inline-block px-4 py-2 bg-rose-100 text-rose-700 rounded-full text-sm font-semibold mb-4 hover:bg-rose-200 transition">
            {{ $article->categories->first()->name }}
        </a>
        @endif

        {{-- Title --}}
        <h1 class="font-display text-4xl md:text-5xl font-bold text-brown-700 mb-6 leading-tight">
            {{ $article->title }}
        </h1>

        {{-- Meta Info --}}
        <div class="flex flex-wrap items-center gap-6 text-sm text-mauve-dark mb-8 pb-8 border-b-2 border-gray-200">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                {{ $article->published_at->isoFormat('D MMMM YYYY') }}
            </div>
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ $article->read_time_minutes }} menit baca
            </div>
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                {{ $article->views_count }} kali dibaca
            </div>
        </div>

        {{-- Featured Image Placeholder --}}
        <div class="aspect-video bg-gradient-to-br from-rose-200 to-rose-300 rounded-3xl flex items-center justify-center text-9xl mb-12">
            📝
        </div>

        {{-- Article Content --}}
        <div class="prose prose-lg max-w-none mb-12">
            {!! $article->content !!}
        </div>

        {{-- Tags --}}
        @if($article->tags->count() > 0)
        <div class="mb-12 pb-8 border-b-2 border-gray-200">
            <h3 class="font-semibold text-brown-700 mb-3">Tags:</h3>
            <div class="flex flex-wrap gap-2">
                @foreach($article->tags as $tag)
                <span class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-rose-100 hover:text-rose-700 transition">
                    #{{ $tag->name }}
                </span>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Share Buttons --}}
        <div class="bg-gradient-to-r from-rose-50 to-cream-100 rounded-3xl p-8 mb-12">
            <h3 class="font-display text-xl font-bold text-brown-700 mb-4 text-center">Bagikan Artikel Ini</h3>
            <div class="flex flex-wrap justify-center gap-3">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                   target="_blank"
                   class="inline-flex items-center px-6 py-3 bg-[#1877F2] text-white rounded-xl hover:bg-[#166FE5] transition font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                    Facebook
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($article->title) }}"
                   target="_blank"
                   class="inline-flex items-center px-6 py-3 bg-[#1DA1F2] text-white rounded-xl hover:bg-[#1A91DA] transition font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                    </svg>
                    Twitter
                </a>
                <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . request()->url()) }}"
                   target="_blank"
                   class="inline-flex items-center px-6 py-3 bg-[#25D366] text-white rounded-xl hover:bg-[#20ba5a] transition font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                    WhatsApp
                </a>
            </div>
        </div>

        {{-- Related Articles --}}
        @if($relatedArticles->count() > 0)
        <div>
            <h2 class="font-display text-3xl font-bold text-brown-700 mb-8">Artikel Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedArticles as $related)
                <article class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="aspect-video bg-gradient-to-br from-rose-200 to-rose-300 flex items-center justify-center text-5xl">
                        📝
                    </div>
                    <div class="p-6">
                        @if($related->categories->first())
                        <span class="inline-block px-3 py-1 bg-rose-100 text-rose-700 rounded-full text-xs font-semibold mb-2">
                            {{ $related->categories->first()->name }}
                        </span>
                        @endif
                        <h3 class="font-display text-lg font-semibold text-brown-700 mb-2 line-clamp-2">
                            <a href="{{ route('articles.show', $related->slug) }}" class="hover:text-rose-600 transition">
                                {{ $related->title }}
                            </a>
                        </h3>
                        <p class="text-sm text-mauve-dark line-clamp-2">{{ $related->excerpt }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</article>

{{-- CTA Section --}}
<section class="py-16 bg-gradient-to-r from-rose-500 to-rose-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-display text-3xl md:text-4xl font-bold mb-4">Butuh Konsultasi Lebih Lanjut?</h2>
        <p class="text-xl text-rose-100 mb-8">Konselor kami siap membantu Anda dengan pendekatan personal dan profesional</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('booking') }}"
               class="inline-flex items-center justify-center px-8 py-4 bg-white text-rose-600 font-bold rounded-xl hover:bg-rose-50 transition shadow-xl">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Jadwalkan Konsultasi
            </a>
            <a href="https://wa.me/6289560622054?text=Halo%20KOLASE%2C%20saya%20ingin%20konsultasi"
               target="_blank"
               class="inline-flex items-center justify-center px-8 py-4 bg-[#25D366] text-white font-bold rounded-xl hover:bg-[#20ba5a] transition">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                Hubungi via WhatsApp
            </a>
        </div>
    </div>
</section>

@endsection
