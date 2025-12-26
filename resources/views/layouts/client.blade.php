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
    <script src="https://cdn.tailwindcss.com"></script>
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
</head>
<body class="flex flex-col items-center p-6">

    @if(!request()->routeIs('home'))
    <header class="w-full max-w-4xl flex items-center justify-between mb-12 border-b border-[#c9a052]/20 pb-4">
        <a href="{{ route('home') }}" class="flex items-center gap-4 group">
            <div class="logo-ring-sm group-hover:border-[#c9a052] transition">
                <img class="w-10 h-10 object-contain" src="{{ asset('logo-avukat.png') }}" alt="Logo" />
            </div>
            <div>
                <h1 class="text-xl font-bold gold-text tracking-wide">Tarık Taşdemir</h1>
                <p class="text-xs text-[#e0c791]">Avukat & Hukuki Danışman</p>
            </div>
        </a>
        
        <nav class="flex gap-6">
            <a href="{{ route('home') }}" class="text-sm text-[#d8d1c3] hover:text-[#c9a052] transition">Ana Sayfa</a>
            <a href="{{ route('about') }}" class="text-sm text-[#d8d1c3] hover:text-[#c9a052] transition">Hakkımda</a>
            <a href="{{ route('contact') }}" class="text-sm text-[#d8d1c3] hover:text-[#c9a052] transition">İletişim</a>
        </nav>
    </header>
    @endif

    <main class="w-full max-w-4xl flex-grow">
        @yield('content')
    </main>

    <footer class="mt-20 w-full max-w-4xl text-center text-sm text-[#a9a198]/60 border-t border-[#c9a052]/10 pt-8">
        © {{ date('Y') }} Tarık Taşdemir. Tüm hakları saklıdır.
    </footer>

</body>
</html>
