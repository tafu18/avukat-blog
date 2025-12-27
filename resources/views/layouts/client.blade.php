<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Tarık Taşdemir | Avukat')</title>
    <meta name="description" content="Tarık Taşdemir Avukatlık Bürosu." />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ asset('logo-avukat.png') }}" />
    <meta name="theme-color" content="#c9a052" />
    <link rel="icon" type="image/png" href="{{ asset('logo-avukat.png') }}" />
    <style>
        :root {
            --gold: #c9a052;
            --gold-soft: #e0c791;
            --bg: #0f0f10;
            --text: #eee9dd;
        }

        body {
            margin: 0;
            font-family: "Times New Roman", Georgia, "Noto Serif", serif;
            color: var(--text);
            background:
                radial-gradient(1100px 1100px at 10% -10%, #1b1b1d 0%, transparent 60%),
                radial-gradient(900px 900px at 110% 110%, #1b1b1d 0%, transparent 60%),
                repeating-linear-gradient(60deg, rgba(255, 255, 255, .02) 0 2px, transparent 2px 12px),
                repeating-linear-gradient(-60deg, rgba(255, 255, 255, .015) 0 2px, transparent 2px 12px),
                var(--bg);
            min-height: 100vh;
        }

        .gold-text { color: var(--gold); }
        .gold-border { border-color: var(--gold); }
        
        .logo-ring-sm {
            display: inline-grid;
            place-items: center;
            width: 60px;
            aspect-ratio: 1/1;
            border-radius: 50%;
            position: relative;
            background: rgba(0,0,0,0.5);
            border: 1px solid rgba(255,255,255,0.1);
        }
    </style>
      <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script>
        window.trans = {
            tr: @json(file_exists(lang_path('tr.json')) ? json_decode(file_get_contents(lang_path('tr.json')), true) : []),
            en: @json(file_exists(lang_path('en.json')) ? json_decode(file_get_contents(lang_path('en.json')), true) : [])
        };
    </script>
</head>
<body class="font-sans antialiased bg-[#111112] text-[#eee9dd]" 
      x-data="{ 
          lang: localStorage.getItem('site_lang') || 'tr',
          t(key) {
              return window.trans[this.lang][key] || key;
          },
          setLang(l) {
            this.lang = l;
            localStorage.setItem('site_lang', l);
          }
      }"
      x-init="$watch('lang', val => localStorage.setItem('site_lang', val))"
>

    <header class="w-full max-w-[1400px] mx-auto flex items-center justify-between mb-8 border-b border-[#c9a052]/20 pb-4 px-4 md:px-8">
        <a href="{{ route('home') }}" class="flex items-center gap-4 group">
            <div class="logo-ring-sm group-hover:border-[#c9a052] transition">
                <img class="w-10 h-10 object-contain" src="{{ asset('logo-avukat.png') }}" alt="Logo" />
            </div>
            <div>
                <h1 class="text-xl font-bold gold-text tracking-wide">Tarık Taşdemir</h1>
                <p class="text-xs text-[#e0c791]">Avukat & Hukuki Danışman</p>
            </div>
        </a>
        
        <nav class="flex gap-8 hidden md:flex items-center">
            <a href="{{ route('home') }}" class="text-sm font-medium text-[#d8d1c3] hover:text-[#c9a052] transition {{ request()->routeIs('home') ? 'text-[#c9a052]' : '' }}" x-text="t('Ana Sayfa')"></a>
            <a href="{{ route('practices.index') }}" class="text-sm font-medium text-[#d8d1c3] hover:text-[#c9a052] transition {{ request()->routeIs('practices.*') ? 'text-[#c9a052]' : '' }}" x-text="t('Çalışma Alanları')"></a>
            <a href="{{ route('blog.index') }}" class="text-sm font-medium text-[#d8d1c3] hover:text-[#c9a052] transition {{ request()->routeIs('blog.*') ? 'text-[#c9a052]' : '' }}" x-text="t('Makaleler')"></a>
            <a href="{{ route('about') }}" class="text-sm font-medium text-[#d8d1c3] hover:text-[#c9a052] transition {{ request()->routeIs('about') ? 'text-[#c9a052]' : '' }}" x-text="t('Hakkımda')"></a>
            <a href="{{ route('contact') }}" class="px-5 py-2 rounded-full border border-[#c9a052]/50 text-[#c9a052] hover:bg-[#c9a052] hover:text-black transition text-sm font-medium" x-text="t('İletişim')"></a>
            
            <!-- Language Switcher -->
            <div class="flex items-center gap-2 border-l border-white/10 pl-4 cursor-pointer">
                <span @click="setLang('tr')" class="text-xs font-bold transition-colors" :class="lang === 'tr' ? 'text-[#c9a052]' : 'text-[#a9a198] hover:text-white'">TR</span>
                <span class="text-[#a9a198] text-xs">|</span>
                <span @click="setLang('en')" class="text-xs font-bold transition-colors" :class="lang === 'en' ? 'text-[#c9a052]' : 'text-[#a9a198] hover:text-white'">EN</span>
            </div>
        </nav>
    </header>
    
    <!-- Breadcrumbs -->
    <div class="w-full max-w-[1400px] mx-auto px-4 md:px-8 mb-6">
        <nav class="flex text-xs text-[#a9a198]" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="hover:text-[#c9a052] transition-colors" x-text="t('Ana Sayfa')"></a>
                </li>
                @hasSection('breadcrumb')
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-500 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ml-1 text-[#e0c791]">@yield('breadcrumb')</span>
                        </div>
                    </li>
                @endif
            </ol>
        </nav>
    </div>

    <main class="w-full max-w-[1400px] mx-auto flex-grow px-4 md:px-8">
        @yield('content')
    </main>

    <!-- Massive SEO Footer -->
    <footer class="mt-32 w-full border-t border-[#c9a052]/20 bg-[#151517] pt-16 pb-8">
        <div class="max-w-[1400px] mx-auto px-6 md:px-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            
            <!-- Column 1: Brand & About -->
            <div class="space-y-6">
                <div class="flex items-center gap-4">
                     <div class="w-12 h-12 rounded-full border border-[#c9a052]/30 flex items-center justify-center bg-[#0f0f10]">
                        <img src="{{ asset('logo-avukat.png') }}" class="w-8 opacity-80" alt="Footer Logo">
                    </div>
                     <div>
                        <h2 class="text-xl font-serif text-[#eee9dd]">Tarık Taşdemir</h2>
                        <p class="text-xs text-[#c9a052] uppercase tracking-wider" x-text="t('Hukuk & Danışmanlık')"></p>
                    </div>
                </div>
                <p class="text-[#a9a198] text-sm leading-relaxed">
                    <span x-text="t('footer_about_text')"></span>
                </p>
                <div class="flex gap-4">
                    <!-- Socials Small -->
                     <a href="#" class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center text-[#c9a052] hover:bg-[#c9a052] hover:text-black transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                     </a>
                     <a href="#" class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center text-[#c9a052] hover:bg-[#c9a052] hover:text-black transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                     </a>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div>
                <h3 class="text-lg font-serif text-[#e0c791] mb-6 relative inline-block">
                    <span x-text="t('Hızlı Erişim')"></span>
                    <span class="absolute -bottom-2 left-0 w-8 h-[1px] bg-[#c9a052]"></span>
                </h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('home') }}" class="text-[#a9a198] hover:text-[#c9a052] transition text-sm flex items-center gap-2"><span class="w-1 h-1 bg-[#c9a052] rounded-full"></span> <span x-text="t('Ana Sayfa')"></span></a></li>
                    <li><a href="{{ route('practices.index') }}" class="text-[#a9a198] hover:text-[#c9a052] transition text-sm flex items-center gap-2"><span class="w-1 h-1 bg-[#c9a052] rounded-full"></span> <span x-text="t('Çalışma Alanları')"></span></a></li>
                    <li><a href="{{ route('blog.index') }}" class="text-[#a9a198] hover:text-[#c9a052] transition text-sm flex items-center gap-2"><span class="w-1 h-1 bg-[#c9a052] rounded-full"></span> <span x-text="t('Makaleler')"></span></a></li>
                    <li><a href="{{ route('about') }}" class="text-[#a9a198] hover:text-[#c9a052] transition text-sm flex items-center gap-2"><span class="w-1 h-1 bg-[#c9a052] rounded-full"></span> <span x-text="t('Hakkımda')"></span></a></li>
                    <li><a href="{{ route('contact') }}" class="text-[#a9a198] hover:text-[#c9a052] transition text-sm flex items-center gap-2"><span class="w-1 h-1 bg-[#c9a052] rounded-full"></span> <span x-text="t('İletişim')"></span></a></li>
                </ul>
            </div>

            <!-- Column 3: Practice Areas (SEO) -->
            <div>
                <h3 class="text-lg font-serif text-[#e0c791] mb-6 relative inline-block">
                    <span x-text="t('Çalışma Alanları')"></span>
                    <span class="absolute -bottom-2 left-0 w-8 h-[1px] bg-[#c9a052]"></span>
                </h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-[#a9a198] hover:text-[#c9a052] transition text-sm flex items-center gap-2"><span class="w-1 h-1 bg-[#c9a052] rounded-full"></span> <span x-text="t('Türk Vatandaşlığı')"></span></a></li>
                    <li><a href="#" class="text-[#a9a198] hover:text-[#c9a052] transition text-sm flex items-center gap-2"><span class="w-1 h-1 bg-[#c9a052] rounded-full"></span> <span x-text="t('Yabancılar & Yatırım Hukuku')"></span></a></li>
                    <li><a href="#" class="text-[#a9a198] hover:text-[#c9a052] transition text-sm flex items-center gap-2"><span class="w-1 h-1 bg-[#c9a052] rounded-full"></span> <span x-text="t('Gayrimenkul Hukuku')"></span></a></li>
                    <li><a href="#" class="text-[#a9a198] hover:text-[#c9a052] transition text-sm flex items-center gap-2"><span class="w-1 h-1 bg-[#c9a052] rounded-full"></span> <span x-text="t('Yatırım Danışmanlığı')"></span></a></li>
                    <li><a href="#" class="text-[#a9a198] hover:text-[#c9a052] transition text-sm flex items-center gap-2"><span class="w-1 h-1 bg-[#c9a052] rounded-full"></span> <span x-text="t('Ticaret Hukuku')"></span></a></li>
                </ul>
            </div>

            <!-- Column 4: Contact & SEO Keywords -->
            <div>
                <h3 class="text-lg font-serif text-[#e0c791] mb-6 relative inline-block">
                    <span x-text="t('İletişim & Konum')"></span>
                    <span class="absolute -bottom-2 left-0 w-8 h-[1px] bg-[#c9a052]"></span>
                </h3>
                <div class="space-y-4 text-sm text-[#a9a198]">
                    <p class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-[#c9a052] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>İstanbul, Türkiye <br><span class="text-xs opacity-60">Barbaros Bulvarı, Beşiktaş</span></span>
                    </p>
                    <p class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-[#c9a052]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <a href="mailto:info@tariktasdemir.com" class="hover:text-[#c9a052] transition">info@tariktasdemir.com</a>
                    </p>
                    <div class="pt-4 mt-4 border-t border-white/5">
                        <p class="text-xs opacity-50 leading-relaxed" x-text="t('footer_lawyer_desc')">
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEO Bottom Text -->
        <div class="border-t border-white/5 pt-8 bg-[#111112]">
             <div class="max-w-[1400px] mx-auto px-6 md:px-12 text-center md:text-left">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div>
                         <p class="text-[10px] text-[#a9a198]/40 uppercase tracking-widest mb-2" x-text="t('Hukuki Uyarı')"></p>
                         <p class="text-xs text-[#a9a198]/60 leading-relaxed" x-text="t('footer_disclaimer_text')">
                        </p>
                    </div>
                    <div class="text-xs text-[#a9a198]/40 text-center md:text-right">
                        &copy; {{ date('Y') }} Tarık Taşdemir - <span x-text="t('Tüm Hakları Saklıdır')"></span>.
                    </div>
                </div>
             </div>
        </div>
    </footer>

</body>
</html>
