@extends('layouts.client')

@section('content')
<div class="relative min-h-[600px] flex flex-col justify-center mb-20 mt-8">
    
    <!-- Hero Grid -->
    <div class="grid lg:grid-cols-3 gap-8 items-center relative z-10">
        
        <!-- Left Column: Citizenship & Residence -->
        <div class="hidden lg:flex flex-col items-end text-right space-y-6 animate-in slide-in-from-left duration-700">
            <!-- Item 1 -->
            <div class="p-6 bg-[#1b1b1d]/50 border border-[#c9a052]/10 rounded-2xl backdrop-blur-sm hover:border-[#c9a052]/30 transition group w-full max-w-sm ml-auto">
                <div class="flex justify-end mb-4">
                    <div class="w-12 h-12 rounded-full bg-[#c9a052]/10 flex items-center justify-center text-[#c9a052] group-hover:scale-110 transition">
                         <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                </div>
                <h3 class="text-xl font-serif text-[#eee9dd] mb-2 group-hover:text-[#c9a052] transition" x-text="t('Türk Vatandaşlığı')"></h3>
                <p class="text-sm text-[#a9a198] leading-relaxed">
                    <span x-show="lang === 'tr'">Yatırım yoluyla Türk vatandaşlığı kazanımı süreçlerinde yabancı yatırımcılara uçtan uca hukuki danışmanlık hizmeti sunuyoruz.</span>
                    <span x-show="lang === 'en'">We provide end-to-end legal consultancy services to foreign investors in the processes of acquiring Turkish citizenship through investment.</span>
                </p>
                <a href="{{ route('practices.show', 'turk-vatandasligi-hukuku') }}" class="inline-flex items-center gap-2 text-[#c9a052] text-sm mt-4 hover:gap-3 transition-all">
                    <span x-text="t('İncele')"></span> <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            <!-- Item 2 -->
            <div class="p-6 bg-[#1b1b1d]/50 border border-[#c9a052]/10 rounded-2xl backdrop-blur-sm hover:border-[#c9a052]/30 transition group w-full max-w-sm ml-auto">
                 <div class="flex justify-end mb-4">
                    <div class="w-12 h-12 rounded-full bg-[#c9a052]/10 flex items-center justify-center text-[#c9a052] group-hover:scale-110 transition">
                         <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                </div>
                <h3 class="text-xl font-serif text-[#eee9dd] mb-2 group-hover:text-[#c9a052] transition" x-text="t('Oturma İzni')"></h3>
                <p class="text-sm text-[#a9a198] leading-relaxed">
                    <span x-show="lang === 'tr'">Türkiye'de ikamet etmek isteyen yabancılar için kısa ve uzun dönem ikamet izni başvurularının yönetimi.</span>
                    <span x-show="lang === 'en'">Management of short and long-term residence permit applications for foreigners who want to reside in Turkey.</span>
                </p>
                <a href="{{ route('practices.show', 'turk-vatandasligi-hukuku') }}" class="inline-flex items-center gap-2 text-[#c9a052] text-sm mt-4 hover:gap-3 transition-all">
                    <span x-text="t('İncele')"></span> <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Center: Profile & Branding -->
        <div class="text-center relative">
            <div class="absolute inset-0 bg-gradient-to-b from-[#c9a052]/5 to-transparent blur-3xl -z-10 rounded-full"></div>
            
            <div class="logo-ring mb-8 mx-auto hover:scale-105 transition duration-500" style="width: 160px; aspect-ratio: 1/1; border-radius: 50%; position: relative; box-shadow: 0 0 0 1px rgba(255, 255, 255, .03) inset, 0 18px 40px rgba(0, 0, 0, .6), 0 2px 0 rgba(255, 255, 255, .06) inset; display: inline-grid; place-items: center;">
                <img class="logo" src="{{ asset('logo-avukat.png') }}" alt="Tarık Taşdemir — Logo" style="width: 86%; height: 86%; object-fit: contain; border-radius: 50%; filter: drop-shadow(0 8px 14px rgba(0, 0, 0, .55));" />
            </div>
            
            <h1 class="text-5xl md:text-7xl font-bold gold-text tracking-wide mb-3 text-shadow font-serif">
                Tarık Taşdemir
            </h1>
            <p class="text-xl md:text-2xl text-[#e0c791] tracking-wider font-light mb-8 opacity-90 mx-auto max-w-lg" x-text="t('Yabancılar & Yatırım Hukuku')"></p>

            <!-- Social Media Icons -->
            <div class="flex justify-center gap-6 mb-10">
                <a href="#" class="text-[#a9a198] hover:text-[#c9a052] transition-colors duration-300 transform hover:scale-110">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                </a>
                <a href="#" class="text-[#a9a198] hover:text-[#c9a052] transition-colors duration-300 transform hover:scale-110">
                   <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                </a>
                <a href="#" class="text-[#a9a198] hover:text-[#c9a052] transition-colors duration-300 transform hover:scale-110">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
                 <a href="mailto:info@tariktasdemir.com" class="text-[#a9a198] hover:text-[#c9a052] transition-colors duration-300 transform hover:scale-110">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" /><path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" /></svg>
                 </a>
            </div>

            <!-- Buttons -->
            <nav class="flex justify-center gap-6">
                <a href="{{ route('contact') }}" class="px-8 py-3 rounded-full border border-[#c9a052] bg-[#c9a052]/10 text-[#e0c791] hover:bg-[#c9a052] hover:text-black transition-all duration-300 font-medium tracking-wide shadow-[0_0_20px_rgba(201,160,82,0.15)] hover:shadow-[0_0_30px_rgba(201,160,82,0.4)]" x-text="t('İletişim Kur')"></a>
            </nav>
        </div>

        <!-- Right Column: Real Estate & Investment -->
        <div class="hidden lg:flex flex-col items-start space-y-6 animate-in slide-in-from-right duration-700">
            <!-- Item 3 -->
            <div class="p-6 bg-[#1b1b1d]/50 border border-[#c9a052]/10 rounded-2xl backdrop-blur-sm hover:border-[#c9a052]/30 transition group w-full max-w-sm mr-auto">
                 <div class="mb-4">
                    <div class="w-12 h-12 rounded-full bg-[#c9a052]/10 flex items-center justify-center text-[#c9a052] group-hover:scale-110 transition">
                         <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    </div>
                </div>
                <h3 class="text-xl font-serif text-[#eee9dd] mb-2 group-hover:text-[#c9a052] transition" x-text="t('Gayrimenkul Hukuku')"></h3>
                <p class="text-sm text-[#a9a198] leading-relaxed">
                    <span x-show="lang === 'tr'">Türkiye'de mülk edinimi, tapu süreçleri ve gayrimenkul yatırımı konularında güvenilir hukuki destek.</span>
                    <span x-show="lang === 'en'">Reliable legal support on property acquisition, land registry processes and real estate investment in Turkey.</span>
                </p>
                <a href="{{ route('practices.show', 'gayrimenkul-hukuku') }}" class="inline-flex items-center gap-2 text-[#c9a052] text-sm mt-4 hover:gap-3 transition-all">
                    <span x-text="t('İncele')"></span> <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            <!-- Item 4 -->
            <div class="p-6 bg-[#1b1b1d]/50 border border-[#c9a052]/10 rounded-2xl backdrop-blur-sm hover:border-[#c9a052]/30 transition group w-full max-w-sm mr-auto">
                 <div class="mb-4">
                    <div class="w-12 h-12 rounded-full bg-[#c9a052]/10 flex items-center justify-center text-[#c9a052] group-hover:scale-110 transition">
                         <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                </div>
                <h3 class="text-xl font-serif text-[#eee9dd] mb-2 group-hover:text-[#c9a052] transition" x-text="t('Yatırım Danışmanlığı')"></h3>
                <p class="text-sm text-[#a9a198] leading-relaxed">
                    <span x-show="lang === 'tr'">Stratejik yatırım planlaması ve hukuki risk raporlaması ile yatırımlarınızı güvence altına alın.</span>
                    <span x-show="lang === 'en'">Secure your investments with strategic investment planning and legal risk reporting.</span>
                </p>
                <a href="{{ route('practices.show', 'yatirim-danismanligi') }}" class="inline-flex items-center gap-2 text-[#c9a052] text-sm mt-4 hover:gap-3 transition-all">
                    <span x-text="t('İncele')"></span> <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</div>



<!-- Featured Slider (Horizontal Scroll) -->
@if($sliderPosts->count() > 0)
<div class="mb-20">
    <h3 class="text-2xl md:text-3xl font-serif text-[#e0c791] text-center mb-8" x-text="t('Günün Öne Çıkanları')"></h3>
    
    <!-- Horizontal Scroll Container -->
    <div class="flex overflow-x-auto space-x-6 pb-8 -mx-4 px-4 md:px-0 custom-scrollbar">
        @foreach($sliderPosts as $post)
        <a href="{{ route('posts.show', $post->slug) }}" class="flex-none w-[300px] md:w-[400px] group bg-[#1b1b1d]/50 rounded-2xl border border-white/5 overflow-hidden hover:border-[#c9a052]/30 transition relative">
            @if($post->image)
                <div class="h-48 overflow-hidden relative">
                     <div class="absolute inset-0 bg-gradient-to-t from-[#1b1b1d] to-transparent opacity-60 z-10 w-full h-full"></div>
                     <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                </div>
            @else
                <div class="h-48 bg-gradient-to-br from-gray-900 to-black flex items-center justify-center relative">
                    <img src="{{ asset('logo-avukat.png') }}" class="w-16 opacity-30" alt="Logo">
                </div>
            @endif
            <div class="p-6 relative z-20 -mt-10">
                <h3 class="text-xl font-serif font-bold text-[#eee9dd] group-hover:text-[#c9a052] transition line-clamp-2 mb-2">
                    <span x-show="lang === 'tr'">{{ $post->title }}</span>
                    <span x-show="lang === 'en'">{{ $post->title_en ?: $post->title }}</span>
                </h3>
                <div class="flex items-center justify-between text-xs text-gray-500 mt-4 border-t border-white/5 pt-4">
                    <span class="flex items-center gap-1">
                        <span>👁️</span> {{ $post->views }} <span x-text="t('okuma')"></span>
                    </span>
                    <span>{{ $post->created_at->format('d.m.Y') }}</span>
                </div>
            </div>
        </a>
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

<!-- Latest Posts -->
<div class="grid lg:grid-cols-3 gap-12">
        <div class="lg:col-span-2">
            <h2 class="text-3xl font-serif text-[#e0c791] border-b border-[#c9a052]/20 pb-4 mb-8" x-text="t('Son Yazılar')"></h2>

            @if($posts->count() > 0)
                <div class="grid md:grid-cols-2 gap-8">
                    @foreach($posts as $post)
                        <a href="{{ route('posts.show', $post->slug) }}" class="group block bg-[#1b1b1d]/50 p-6 rounded-2xl border border-white/5 hover:border-[#c9a052]/30 transition hover:-translate-y-1">
                            <div class="text-[#c9a052] text-xs mb-3 font-medium tracking-wider">
                                {{ $post->created_at->format('d.m.Y') }}
                            </div>
                            <h3 class="text-xl font-bold text-[#eee9dd] group-hover:text-[#c9a052] transition mb-3">
                                <span x-show="lang === 'tr'">{{ $post->title }}</span>
                                <span x-show="lang === 'en'">{{ $post->title_en ?: $post->title }}</span>
                            </h3>
                            <p class="text-gray-400 text-sm line-clamp-3">
                                <span x-show="lang === 'tr'">{{ Str::limit(strip_tags($post->content), 120) }}</span>
                                <span x-show="lang === 'en'">{{ Str::limit(strip_tags($post->content_en ?: $post->content), 120) }}</span>
                            </p>
                        </a>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{ $posts->links('pagination.client') }}
                </div>
            @else
                <div class="text-center py-12 text-gray-500">
                    <p x-text="t('Henüz yazı eklenmemiş.')"></p>
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <aside>
            <h3 class="text-xl font-serif text-[#e0c791] border-b border-[#c9a052]/20 pb-2 mb-6" x-text="t('En Çok Okunanlar')"></h3>
            <div class="space-y-4">
                @foreach($mostRead as $popular)
                    <a href="{{ route('posts.show', $popular->slug) }}" class="block group">
                        <div class="text-xs text-[#e0c791]/50 mb-1">
                            {{ $popular->views }} <span x-text="t('okuma')"></span>
                        </div>
                        <h4 class="text-[#d8d1c3] font-bold group-hover:text-[#c9a052] transition">
                            <span x-show="lang === 'tr'">{{ $popular->title }}</span>
                            <span x-show="lang === 'en'">{{ $popular->title_en ?: $popular->title }}</span>
                        </h4>
                    </a>
                @endforeach
            </div>
        </aside>
    </div>
    <!-- SEO FAQ Section -->
    <div class="mt-24 border-t border-[#c9a052]/10 pt-16 mb-12">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-serif text-[#e0c791] mb-4" x-text="t('Sıkça Sorulan Sorular')"></h2>
            <p class="text-[#a9a198] max-w-2xl mx-auto">Türk vatandaşlığı başvurusu, gayrimenkul yatırımı ve hukuki süreçlerle ilgili merak edilenler.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <!-- FAQ Item 1 -->
            <div class="bg-[#1b1b1d]/50 p-6 rounded-xl border border-white/5 hover:border-[#c9a052]/30 transition group">
                <h3 class="font-bold text-lg text-[#eee9dd] group-hover:text-[#c9a052] transition mb-3 flex items-start gap-3">
                    <span class="text-[#c9a052] mt-1">Q.</span> Yatırım yoluyla Türk vatandaşlığı için minimum tutar nedir?
                </h3>
                <p class="text-[#a9a198] text-sm leading-relaxed pl-7 border-l border-[#c9a052]/20 ml-1">
                    Gayrimenkul yatırımı ile Türk vatandaşlığı kazanmak için minimum yatırım tutarı 400.000 USD'dir. Bu tutarın tapu devir işlemlerinde resmi olarak belgelenmesi gerekmektedir.
                </p>
            </div>

            <!-- FAQ Item 2 -->
            <div class="bg-[#1b1b1d]/50 p-6 rounded-xl border border-white/5 hover:border-[#c9a052]/30 transition group">
                <h3 class="font-bold text-lg text-[#eee9dd] group-hover:text-[#c9a052] transition mb-3 flex items-start gap-3">
                    <span class="text-[#c9a052] mt-1">Q.</span> Vatandaşlık başvuru süreci ne kadar sürer?
                </h3>
                <p class="text-[#a9a198] text-sm leading-relaxed pl-7 border-l border-[#c9a052]/20 ml-1">
                    Gerekli evrakların tamamlanması ve yatırımın yapılmasının ardından, vatandaşlık başvuru süreci genellikle 3 ila 6 ay arasında sonuçlanmaktadır. Hukuki danışmanlık hizmetimizle bu süreci en hızlı şekilde yönetiyoruz.
                </p>
            </div>

            <!-- FAQ Item 3 -->
            <div class="bg-[#1b1b1d]/50 p-6 rounded-xl border border-white/5 hover:border-[#c9a052]/30 transition group">
                <h3 class="font-bold text-lg text-[#eee9dd] group-hover:text-[#c9a052] transition mb-3 flex items-start gap-3">
                    <span class="text-[#c9a052] mt-1">Q.</span> Satın alınan gayrimenkulü kiraya verebilir miyim?
                </h3>
                <p class="text-[#a9a198] text-sm leading-relaxed pl-7 border-l border-[#c9a052]/20 ml-1">
                    Evet, vatandaşlık için satın aldığınız gayrimenkulü hemen kiraya verebilirsiniz. Tek şart, mülkün 3 yıl boyunca satılmaması ve tapu kaydına bu yönde şerh konulmasıdır.
                </p>
            </div>

            <!-- FAQ Item 4 -->
            <div class="bg-[#1b1b1d]/50 p-6 rounded-xl border border-white/5 hover:border-[#c9a052]/30 transition group">
                <h3 class="font-bold text-lg text-[#eee9dd] group-hover:text-[#c9a052] transition mb-3 flex items-start gap-3">
                    <span class="text-[#c9a052] mt-1">Q.</span> Ailem de vatandaşlık hakkından yararlanabilir mi?
                </h3>
                <p class="text-[#a9a198] text-sm leading-relaxed pl-7 border-l border-[#c9a052]/20 ml-1">
                    Yatırımcı ile birlikte eşi ve 18 yaş altındaki çocukları da aynı yatırım kapsamında Türk vatandaşlığına başvurabilir ve vatandaşlık hakkı kazanabilirler.
                </p>
            </div>
        </div>
    </div>
@endsection


