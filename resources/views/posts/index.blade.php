@extends('layouts.client')

@section('title', __('Tüm Makaleler') . ' | Tarık Taşdemir')
@section('description', 'Hukuk, vatandaşlık ve yatırım alanlarında güncel makaleler ve hukuki bilgilendirmeler.')

@section('breadcrumb')
    <a href="{{ route('home') }}" class="hover:text-[#c9a052] transition-colors" x-text="t('Ana Sayfa')"></a>
    <span class="mx-2 text-gray-600">/</span>
    <span x-text="t('Makaleler')"></span>
@endsection

@section('content')
<div class="mb-20 mt-8">
    <div class="text-center mb-16">
        <h1 class="text-4xl md:text-5xl font-serif text-[#e0c791] mb-6" x-text="t('Blog & Makaleler')"></h1>
        <p class="text-[#a9a198] text-lg max-w-2xl mx-auto font-light">
             <span x-show="lang === 'tr'">Türk hukuku, vatandaşlık süreçleri ve yatırım fırsatları hakkında güncel hukuki değerlendirmelerimiz.</span>
             <span x-show="lang === 'en'">Our current legal assessments on Turkish law, citizenship processes and investment opportunities.</span>
        </p>
    </div>

    @if($posts->count() > 0)
        <!-- Articles Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            @foreach($posts as $post)
            <a href="{{ route('posts.show', $post->slug) }}" class="group bg-[#1b1b1d]/50 border border-white/5 rounded-2xl overflow-hidden hover:border-[#c9a052]/30 transition-all duration-300 hover:-translate-y-1 block h-full flex flex-col">
                <!-- Image -->
                <div class="relative h-56 overflow-hidden">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="{{ $post->title }}">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-[#1b1b1d] to-black flex items-center justify-center">
                            <img src="{{ asset('logo-avukat.png') }}" class="w-16 opacity-30" alt="Logo">
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-[#1b1b1d] via-transparent to-transparent opacity-80"></div>
                    
                    <!-- Date Badge -->
                    <div class="absolute top-4 right-4 bg-black/60 backdrop-blur-md px-3 py-1 rounded-full border border-white/10 text-xs text-[#c9a052]">
                        {{ $post->created_at->format('d.m.Y') }}
                    </div>
                </div>

                <div class="p-6 flex-grow flex flex-col">
            <div class="text-[#e0c791] text-xs mb-3">{{ $post->created_at->format('d.m.Y') }}</div>
            <h2 class="text-xl font-bold text-[#eee9dd] mb-3 group-hover:text-[#c9a052] transition font-serif">
                <span x-show="lang === 'tr'">{{ $post->title }}</span>
                <span x-show="lang === 'en'">{{ $post->title_en ?: $post->title }}</span>
            </h2>
            <p class="text-[#a9a198] text-sm line-clamp-3 mb-4 flex-grow">
                 <span x-show="lang === 'tr'">{{ Str::limit(strip_tags($post->content), 120) }}</span>
                 <span x-show="lang === 'en'">{{ Str::limit(strip_tags($post->content_en ?: $post->content), 120) }}</span>
            </p>
                    
                    <div class="flex items-center justify-between pt-4 border-t border-white/5 mt-auto">
                        <span class="text-xs text-[#a9a198]/60 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                            {{ $post->views }} <span x-text="t('okuma')"></span>
                        </span>
                        <span class="text-[#c9a052] text-sm font-medium flex items-center gap-1 group-hover:gap-2 transition-all">
                            <span x-text="t('Devamını Oku')"></span> <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            {{ $posts->links('pagination.client') }}
        </div>
    @else
        <div class="text-center py-24 bg-[#1b1b1d]/30 rounded-3xl border border-white/5">
            <div class="w-16 h-16 bg-[#c9a052]/10 rounded-full flex items-center justify-center mx-auto mb-6 text-[#c9a052]">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg>
            </div>
            <h3 class="text-xl font-serif text-[#eee9dd] mb-2" x-text="t('Henüz Yazı Eklenmemiş')"></h3>
            <p class="text-[#a9a198]" x-text="t('Çok yakında güncel makalelerimizle buradayız.')"></p>
        </div>
    @endif
</div>
@endsection
