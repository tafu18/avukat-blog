@extends('layouts.client')

@section('content')
<div class="text-center mb-12 mt-8">
    <div class="logo-ring mb-6 mx-auto" style="width: 120px; aspect-ratio: 1/1; border-radius: 50%; position: relative; box-shadow: 0 0 0 1px rgba(255, 255, 255, .03) inset, 0 18px 40px rgba(0, 0, 0, .6), 0 2px 0 rgba(255, 255, 255, .06) inset; display: inline-grid; place-items: center;">
        <img class="logo" src="{{ asset('logo-avukat.png') }}" alt="Tarık Taşdemir — Logo" style="width: 86%; height: 86%; object-fit: contain; border-radius: 50%; filter: drop-shadow(0 8px 14px rgba(0, 0, 0, .55));" />
    </div>
    <h1 class="text-4xl md:text-5xl font-bold gold-text tracking-wide mb-2 text-shadow">
        Tarık Taşdemir
    </h1>
    <p class="text-xl md:text-2xl text-[#e0c791] tracking-wide mb-8">
        Avukat & Hukuki Danışman
    </p>

    <nav class="flex justify-center gap-4">
            <a href="{{ route('contact') }}" class="px-4 py-2 rounded-full border border-[#c9a052]/30 text-[#d8d1c3] hover:text-white hover:border-[#c9a052] transition">
            İletişim
        </a>
        <a href="{{ route('about') }}" class="px-4 py-2 rounded-full border border-[#c9a052]/30 text-[#d8d1c3] hover:text-white hover:border-[#c9a052] transition">
            Hakkımda
        </a>
    </nav>
</div>

<!-- Featured Slider (Horizontal Scroll) -->
@if($sliderPosts->count() > 0)
<div class="mb-20">
    <h3 class="text-2xl md:text-3xl font-serif text-[#e0c791] text-center mb-8">Günün Öne Çıkanları</h3>
    
    <!-- Horizontal Scroll Container -->
    <div class="flex overflow-x-auto space-x-6 pb-8 -mx-4 px-4 md:px-0 custom-scrollbar">
        @foreach($sliderPosts as $post)
        <div class="flex-shrink-0 w-72 md:w-80">
            <a href="{{ route('posts.show', $post->slug) }}" class="block bg-[#1b1b1d] border border-white/10 shadow-xl rounded-xl overflow-hidden group transform hover:-translate-y-2 transition-all duration-300 h-full">
                <div class="relative h-48 overflow-hidden">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="{{ $post->title }}">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-gray-900 to-black flex items-center justify-center">
                            <img src="{{ asset('logo-avukat.png') }}" class="w-16 opacity-30" alt="Logo">
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-[#1b1b1d] to-transparent opacity-60"></div>
                </div>
                
                <div class="p-5">
                    <h3 class="font-bold text-lg text-[#eee9dd] mb-2 line-clamp-2 group-hover:text-[#c9a052] transition-colors font-serif">
                        {{ $post->title }}
                    </h3>
                    <div class="flex items-center justify-between text-xs text-gray-500 mt-4 border-t border-white/5 pt-4">
                        <span class="flex items-center gap-1">
                            <span>👁️</span> {{ $post->views }} okuma
                        </span>
                        <span>{{ $post->created_at->format('d.m.Y') }}</span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endif

<style>
    /* Custom Scrollbar Styling */
    .custom-scrollbar::-webkit-scrollbar {
        height: 6px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 4px;
        margin: 0 16px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #c9a052;
        border-radius: 4px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #e0c791;
    }

    /* For Firefox */
    .custom-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: #c9a052 rgba(255, 255, 255, 0.05);
    }
</style>

<div class="grid lg:grid-cols-3 gap-12">
        <div class="lg:col-span-2">
            <h2 class="text-3xl font-serif text-[#e0c791] border-b border-[#c9a052]/20 pb-4 mb-8">
                Son Yazılar
            </h2>

            @if($posts->count() > 0)
                <div class="grid gap-6 md:grid-cols-2">
                    @foreach($posts as $post)
                        <a href="{{ route('posts.show', $post->slug) }}" class="post-card p-6 rounded-xl group block" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.05);">
                            <div class="text-sm text-[#e0c791]/60 mb-2">
                                {{ $post->created_at->format('d.m.Y') }}
                            </div>
                            <h3 class="text-xl font-bold text-[#eee9dd] group-hover:text-[#c9a052] transition mb-3">
                                {{ $post->title }}
                            </h3>
                            <p class="text-gray-400 text-sm line-clamp-3">
                                {{ Str::limit(strip_tags($post->content), 120) }}
                            </p>
                        </a>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{ $posts->links('pagination.client') }}
                </div>
            @else
                <div class="text-center py-12 text-gray-500">
                    <p>Henüz yazı eklenmemiş.</p>
                </div>
            @endif
        </div>

        <aside>
            <h3 class="text-xl font-serif text-[#e0c791] border-b border-[#c9a052]/20 pb-2 mb-6">
                En Çok Okunanlar
            </h3>
            <div class="space-y-4">
                @foreach($mostRead as $popular)
                    <a href="{{ route('posts.show', $popular->slug) }}" class="block group">
                        <div class="text-xs text-[#e0c791]/50 mb-1">
                            {{ $popular->views }} okuma
                        </div>
                        <h4 class="text-[#d8d1c3] font-bold group-hover:text-[#c9a052] transition">
                            {{ $popular->title }}
                        </h4>
                    </a>
                @endforeach
            </div>
        </aside>
    </div>
@endsection


