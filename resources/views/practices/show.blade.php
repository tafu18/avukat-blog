@extends('layouts.client')

@section('title', $practice['tr']['seo_title'])
@section('description', $practice['tr']['seo_desc'])

@section('breadcrumb')
@section('breadcrumb')
    <a href="{{ route('practices.index') }}" class="hover:text-[#c9a052] transition-colors" x-text="t('Çalışma Alanlarımız')"></a>
    <span class="mx-2 text-gray-600">/</span>
    <span x-show="lang === 'tr'">{{ $practice['tr']['title'] }}</span>
    <span x-show="lang === 'en'">{{ $practice['en']['title'] }}</span>
@endsection

@section('content')
<div class="grid lg:grid-cols-3 gap-12 mb-20">
    <!-- Main Content -->
    <div class="lg:col-span-2 space-y-8 animate-in slide-in-from-left duration-700">
        <div class="bg-[#1b1b1d]/30 border border-white/5 p-8 rounded-3xl">
            <div class="flex items-center gap-6 mb-8">
                <div class="w-20 h-20 bg-[#c9a052]/10 rounded-2xl flex items-center justify-center text-[#c9a052] shrink-0">
                    {!! str_replace('w-8 h-8', 'w-10 h-10', $practice['icon']) !!}
                </div>
                <h1 class="text-3xl md:text-4xl font-serif font-bold text-[#eee9dd]">
                    <span x-show="lang === 'tr'">{{ $practice['tr']['title'] }}</span>
                    <span x-show="lang === 'en'">{{ $practice['en']['title'] }}</span>
                </h1>
            </div>

            <div class="prose prose-invert prose-gold max-w-none text-[#a9a198]">
                <p class="text-lg leading-relaxed mb-6 text-[#d8d1c3]">
                    <span x-show="lang === 'tr'">{{ $practice['tr']['excerpt'] }}</span>
                    <span x-show="lang === 'en'">{{ $practice['en']['excerpt'] }}</span>
                </p>
                <div class="w-full h-px bg-white/5 my-8"></div>
                <div class="leading-relaxed">
                    <span x-show="lang === 'tr'">{!! nl2br(e($practice['tr']['content'])) !!}</span>
                    <span x-show="lang === 'en'">{!! nl2br(e($practice['en']['content'])) !!}</span>
                </div>
                 <p class="mt-4">
                     <span x-show="lang === 'tr'">Alanında liyakat sahibi, mevzuata hakim ve çözüm odaklı yaklaşımımızla <strong>{{ $practice['tr']['title'] }}</strong> konusundaki tüm ihtiyaçlarınızda yanınızdayız.</span>
                     <span x-show="lang === 'en'">We are with you in all your needs regarding <strong>{{ $practice['en']['title'] }}</strong> with our competent, legislation-savvy and solution-oriented approach.</span>
                </p>
            </div>
        </div>

        <!-- FAQ Section -->
        @if(isset($practice['tr']['faqs']) && count($practice['tr']['faqs']) > 0)
        <div class="mt-12" x-show="lang === 'tr'">
            <h2 class="text-2xl font-serif text-[#e0c791] mb-6 pl-4 border-l-4 border-[#c9a052]">{{ __('Sıkça Sorulan Sorular') }}</h2>
            <div class="grid gap-4">
                @foreach($practice['tr']['faqs'] as $faq)
                <div class="bg-[#1b1b1d]/50 border border-white/5 rounded-xl p-6 hover:border-[#c9a052]/30 transition group">
                    <h3 class="font-bold text-[#eee9dd] group-hover:text-[#c9a052] transition mb-2 flex gap-3">
                        <span class="text-[#c9a052]">Q.</span> {{ $faq['q'] }}
                    </h3>
                    <p class="text-[#a9a198] text-sm pl-7 leading-relaxed border-l border-[#c9a052]/10">
                        {{ $faq['a'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        @if(isset($practice['en']['faqs']) && count($practice['en']['faqs']) > 0)
        <div class="mt-12" x-show="lang === 'en'">
            <h2 class="text-2xl font-serif text-[#e0c791] mb-6 pl-4 border-l-4 border-[#c9a052]">Frequently Asked Questions</h2>
            <div class="grid gap-4">
                @foreach($practice['en']['faqs'] as $faq)
                <div class="bg-[#1b1b1d]/50 border border-white/5 rounded-xl p-6 hover:border-[#c9a052]/30 transition group">
                    <h3 class="font-bold text-[#eee9dd] group-hover:text-[#c9a052] transition mb-2 flex gap-3">
                        <span class="text-[#c9a052]">Q.</span> {{ $faq['q'] }}
                    </h3>
                    <p class="text-[#a9a198] text-sm pl-7 leading-relaxed border-l border-[#c9a052]/10">
                        {{ $faq['a'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    <!-- Sidebar -->
    <aside class="space-y-6 animate-in slide-in-from-right duration-700">
        <!-- Contact Card -->
        <div class="bg-[#c9a052] rounded-3xl p-8 text-center shadow-[0_0_50px_rgba(201,160,82,0.15)] relative overflow-hidden group">
            <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition duration-500"></div>
            <div class="relative z-10">
            <div class="relative z-10">
                <h3 class="text-black font-bold text-xl mb-2 font-serif" x-text="t('Hukuki Destek Alın')"></h3>
                <p class="text-black/70 text-sm mb-6" x-text="t('Bu konuda profesyonel desteğe mi ihtiyacınız var?')"></p>
                <a href="{{ route('contact') }}" class="inline-block w-full bg-black text-[#c9a052] font-bold py-3 rounded-xl hover:bg-[#1a1a1a] transition shadow-lg" x-text="t('İletişime Geçin')">
                </a>
            </div>
            </div>
        </div>

        <!-- Other Services -->
        <div class="bg-[#1b1b1d]/30 border border-white/5 rounded-3xl p-6">
            <h3 class="text-[#e0c791] font-serif border-b border-white/5 pb-4 mb-4" x-text="t('Diğer Çalışma Alanları')"></h3>
            <ul class="space-y-3">
                @foreach(['uluslararasi-ticaret-hukuku' => 'Uluslararası Ticaret', 'ticaret-hukuku' => 'Ticaret Hukuku', 'gayrimenkul-hukuku' => 'Gayrimenkul Hukuku', 'yatirim-danismanligi' => 'Yatırım Danışmanlığı', 'turk-vatandasligi-hukuku' => 'Vatandaşlık Hukuku'] as $key => $label)
                    @if($key !== $practice['slug'])
                    <li>
                        <a href="{{ route('practices.show', $key) }}" class="flex items-center justify-between text-[#a9a198] hover:text-[#c9a052] transition p-2 rounded-lg hover:bg-white/5 group">
                            <span class="text-sm font-medium" x-text="t('{{ $label }}')"></span>
                            <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                        </a>
                    </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </aside>
</div>
@endsection
