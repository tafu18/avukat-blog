@extends('layouts.client')

@section('title', $post->localized_title . ' | Tarık Taşdemir')

@section('breadcrumb')
    <a href="{{ route('blog.index') }}" class="hover:text-[#c9a052] transition-colors" x-text="t('Makaleler')"></a>
    <span class="mx-2 text-gray-600">/</span>
    <span class="text-[#d8d1c3]">
        <span x-show="lang === 'tr'">{{ Str::limit($post->title, 30) }}</span>
        <span x-show="lang === 'en'">{{ Str::limit($post->title_en ?: $post->title, 30) }}</span>
    </span>
@endsection

@section('content')

<article class="mb-16">
    <header class="mb-8 text-center md:text-left">
        <div class="text-[#e0c791]/60 mb-2">{{ $post->created_at->format('d F Y') }}</div>
        <h1 class="text-3xl md:text-5xl font-bold text-[#eee9dd] mb-6 leading-tight">
            <span x-show="lang === 'tr'">{{ $post->title }}</span>
            <span x-show="lang === 'en'">{{ $post->title_en ?: $post->title }}</span>
        </h1>
        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-auto rounded-xl border border-white/10 shadow-2xl mb-8" alt="{{ $post->localized_title }}">
        @endif
    </header>

    <div class="prose prose-invert prose-lg max-w-none text-[#d8d1c3] leading-relaxed">
        <div x-show="lang === 'tr'">{!! nl2br(e($post->content)) !!}</div>
        <div x-show="lang === 'en'">{!! nl2br(e($post->content_en ?: $post->content)) !!}</div>
    </div>
</article>

@if($recommended->count() > 0)
<section class="mb-16">
    <h3 class="text-xl font-serif text-[#e0c791] border-b border-[#c9a052]/20 pb-2 mb-6" x-text="t('Bunları da Beğenebilirsiniz')"></h3>
    <div class="grid md:grid-cols-3 gap-6">
        @foreach($recommended as $rec)
            <a href="{{ route('posts.show', $rec->slug) }}" class="block p-4 rounded-lg bg-white/5 hover:bg-white/10 transition border border-white/5">
                <h4 class="text-[#eee9dd] font-bold mb-2 line-clamp-1">
                    <span x-show="lang === 'tr'">{{ $rec->title }}</span>
                    <span x-show="lang === 'en'">{{ $rec->title_en ?: $rec->title }}</span>
                </h4>
                <div class="text-xs text-[#e0c791]">{{ $rec->created_at->format('d.m.Y') }}</div>
            </a>
        @endforeach
    </div>
</section>
@endif

<section class="border-t border-[#c9a052]/20 pt-12">
    <h3 class="text-2xl font-serif text-[#e0c791] mb-8" x-text="t('Yorumlar')"></h3>

    <div class="bg-white/5 p-6 rounded-xl border border-white/10 mb-12">
        <h4 class="text-lg font-bold text-white mb-4" x-text="t('Bir Yorum Bırakın')"></h4>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-900/50 border border-green-500/30 text-green-200 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('comments.store', $post) }}" method="POST">
            @csrf
            <div class="grid md:grid-cols-2 gap-4 mb-4">
                <input type="text" name="name" :placeholder="t('Adınız Soyadınız')" class="w-full bg-black/20 border border-white/10 rounded p-3 text-white focus:border-[#c9a052] outline-none transition" required>
                <input type="email" name="email" :placeholder="t('E-posta Adresiniz')" class="w-full bg-black/20 border border-white/10 rounded p-3 text-white focus:border-[#c9a052] outline-none transition" required>
            </div>
            <textarea name="comment" rows="4" :placeholder="t('Yorumunuzu buraya yazın...')" class="w-full bg-black/20 border border-white/10 rounded p-3 text-white focus:border-[#c9a052] outline-none transition mb-4" required></textarea>
            <button type="submit" class="px-6 py-2 bg-[#c9a052] text-black font-bold rounded hover:bg-[#e0c791] transition" x-text="t('Gönder')">
            </button>
        </form>
    </div>

    <!-- Comments List -->
    <div class="space-y-6">
        @if($post->comments && $post->comments->where('is_approved', true)->count() > 0)
            @foreach($post->comments->where('is_approved', true) as $comment)
                <div class="border-b border-white/5 pb-6 last:border-0">
                    <div class="flex items-center justify-between mb-2">
                        <div class="font-bold text-[#e0c791]">{{ $comment->name }}</div>
                        <div class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</div>
                    </div>
                    <div class="text-gray-300 text-sm leading-relaxed">
                        {{ $comment->comment }}
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-gray-500 italic" x-text="t('Henüz yorum yapılmamış. İlk yorumu siz yapın.')"></p>
        @endif
    </div>
</section>

@endsection
