@extends('layouts.app')

@section('seo_title', 'Artikel Menyusui | KOLASE')
@section('seo_description', 'Kumpulan artikel, tips, dan informasi seputar menyusui, ASI eksklusif, dan kesehatan ibu & bayi dari konselor laktasi profesional.')
@section('seo_keywords', 'artikel menyusui, tips ASI, informasi laktasi, panduan menyusui, kesehatan bayi')

@section('content')

{{-- Hero Section --}}
<section class="bg-gradient-to-br from-rose-600 via-rose-500 to-mauve text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="text-6xl mb-6">📚</div>
        <h1 class="font-display text-5xl md:text-6xl font-bold mb-6">Artikel & Tips Menyusui</h1>
        <p class="text-xl text-rose-100 max-w-3xl mx-auto leading-relaxed">
            Temukan informasi terpercaya seputar menyusui, ASI eksklusif, dan kesehatan ibu & bayi dari konselor laktasi bersertifikat.
        </p>
    </div>
</section>

{{-- Main Content --}}
<section class="py-16 bg-cream-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            {{-- Sidebar --}}
            <aside class="lg:col-span-1">

                {{-- Search --}}
                <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
                    <h3 class="font-display text-lg font-bold text-brown-700 mb-4">Cari Artikel</h3>
                    <form action="{{ route('articles.index') }}" method="GET">
                        <div class="relative">
                            <input type="text"
                                   name="search"
                                   value="{{ request('search') }}"
                                   placeholder="Cari artikel..."
                                   class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-rose-500 focus:ring-0">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </form>
                </div>

                {{-- Categories --}}
                <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
                    <h3 class="font-display text-lg font-bold text-brown-700 mb-4">Kategori</h3>
                    <div class="space-y-2">
                        <a href="{{ route('articles.index') }}"
                           class="block px-4 py-2 rounded-lg {{ !request('category') ? 'bg-rose-100 text-rose-700 font-semibold' : 'hover:bg-gray-50' }} transition">
                            Semua Artikel
                        </a>
                        @foreach($categories as $category)
                        <a href="{{ route('articles.category', $category->slug) }}"
                           class="block px-4 py-2 rounded-lg {{ request()->route('slug') === $category->slug ? 'bg-rose-100 text-rose-700 font-semibold' : 'hover:bg-gray-50' }} transition">
                            {{ $category->name }}
                        </a>
                        @endforeach
                    </div>
                </div>

                {{-- Popular Articles --}}
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <h3 class="font-display text-lg font-bold text-brown-700 mb-4">Artikel Populer</h3>
                    <div class="space-y-4">
                        @foreach($popularArticles as $popular)
                        <a href="{{ route('articles.show', $popular->slug) }}" class="block group">
                            <h4 class="font-semibold text-sm text-brown-700 group-hover:text-rose-600 transition line-clamp-2 mb-1">
                                {{ $popular->title }}
                            </h4>
                            <div class="flex items-center text-xs text-gray-500">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                {{ $popular->views_count }} views
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

            </aside>

            {{-- Articles Grid --}}
            <div class="lg:col-span-3">

                @if($articles->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    @foreach($articles as $article)
                    <article class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        {{-- Image Placeholder --}}
                        <div class="aspect-video bg-gradient-to-br from-rose-200 to-rose-300 flex items-center justify-center text-6xl">
                            📝
                        </div>

                        {{-- Content --}}
                        <div class="p-6">
                            {{-- Category --}}
                            @if($article->categories->first())
                            <a href="{{ route('articles.category', $article->categories->first()->slug) }}"
                               class="inline-block px-3 py-1 bg-rose-100 text-rose-700 rounded-full text-xs font-semibold mb-3 hover:bg-rose-200 transition">
                                {{ $article->categories->first()->name }}
                            </a>
                            @endif

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
                <div class="bg-white rounded-2xl p-12 text-center shadow-md">
                    <div class="text-6xl mb-4">📭</div>
                    <h3 class="font-display text-2xl font-bold text-brown-700 mb-2">Tidak Ada Artikel</h3>
                    <p class="text-mauve-dark mb-6">Belum ada artikel yang diterbitkan untuk kriteria pencarian Anda.</p>
                    <a href="{{ route('articles.index') }}" class="inline-flex items-center text-rose-600 hover:text-rose-700 font-semibold">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Semua Artikel
                    </a>
                </div>
                @endif

            </div>
        </div>

    </div>
</section>

{{-- Newsletter CTA --}}
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
