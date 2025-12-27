@extends('layouts.client')

@section('title', 'Çalışma Alanlarımız | Tarık Taşdemir')
@section('description', 'Uluslararası ticaret, şirketler hukuku, vatandaşlık ve gayrimenkul hukuku alanlarında uzman hukuki danışmanlık hizmetlerimiz.')

@section('breadcrumb')
    <a href="{{ route('home') }}" class="hover:text-[#c9a052] transition-colors" x-text="t('Ana Sayfa')"></a>
    <span class="mx-2 text-gray-600">/</span>
    <span x-text="t('Çalışma Alanlarımız')"></span>
@endsection

@section('content')
<div class="mb-20 mt-8">
    <div class="text-center mb-16">
        <h1 class="text-4xl md:text-5xl font-serif text-[#e0c791] mb-6" x-text="t('Çalışma Alanlarımız')"></h1>
        <p class="text-[#a9a198] text-lg max-w-2xl mx-auto font-light">
             <span x-show="lang === 'tr'">Yerli ve yabancı müvekkillerimize sunduğumuz başlıca hukuki danışmanlık hizmetleri.</span>
             <span x-show="lang === 'en'">Main legal consultancy services we provide to our local and foreign clients.</span>
        </p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($practices as $slug => $practice)
        <a href="{{ route('practices.show', $slug) }}" class="group bg-[#1b1b1d]/50 border border-white/5 p-8 rounded-2xl hover:border-[#c9a052]/30 transition-all duration-300 hover:-translate-y-1 block h-full">
            <div class="w-16 h-16 bg-[#c9a052]/10 rounded-2xl flex items-center justify-center text-[#c9a052] mb-6 group-hover:scale-110 transition-transform duration-500">
                {!! $practice['icon'] !!}
            </div>
            
            <h3 class="text-xl font-serif font-bold text-[#eee9dd] mb-3 group-hover:text-[#c9a052] transition-colors">
                <span x-show="lang === 'tr'">{{ $practice['tr']['title'] }}</span>
                <span x-show="lang === 'en'">{{ $practice['en']['title'] }}</span>
            </h3>
            
            <p class="text-[#a9a198] text-sm leading-relaxed mb-6">
                <span x-show="lang === 'tr'">{{ $practice['tr']['excerpt'] }}</span>
                <span x-show="lang === 'en'">{{ $practice['en']['excerpt'] }}</span>
            </p>
            
            <div class="flex items-center text-[#c9a052] text-sm font-medium gap-2 group-hover:gap-3 transition-all">
                <span x-text="t('Detaylı Bilgi')"></span> <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
