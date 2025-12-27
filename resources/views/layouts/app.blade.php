<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
             .gold-text { color: #c9a052; }
             .gold-border { border-color: #c9a052; }
             .bg-gold { background-color: #c9a052; }
             .font-serif { font-family: 'Playfair Display', serif; }
        </style>
    </head>
    <body class="font-sans antialiased bg-[#1b1b1d] text-[#eee9dd]">
        <div class="min-h-screen flex">
            <!-- Sidebar -->
            <aside class="w-64 bg-black/50 border-r border-white/5 flex flex-col fixed h-full z-50 backdrop-blur-md">
                <div class="p-6 border-b border-white/5 flex items-center gap-3">
                    <img src="{{ asset('logo-avukat.png') }}" class="w-8 h-8 object-contain" alt="Logo">
                    <span class="font-bold font-serif text-[#e0c791]">Yönetim Paneli</span>
                </div>

                <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-[#c9a052]/10 text-[#c9a052] border border-[#c9a052]/20' : 'text-[#a9a198] hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                        <span>Genel Bakış</span>
                    </a>
                    
                    <div class="mt-6 mb-2 px-4 text-xs font-bold text-[#e0c791]/50 uppercase tracking-wider">İçerik Yönetimi</div>

                    <a href="{{ route('admin.posts.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.posts.*') ? 'bg-[#c9a052]/10 text-[#c9a052] border border-[#c9a052]/20' : 'text-[#a9a198] hover:bg-white/5 hover:text-white' }}">
                         <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg>
                        <span>Makaleler</span>
                    </a>

                    <a href="{{ route('admin.comments.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.comments.*') ? 'bg-[#c9a052]/10 text-[#c9a052] border border-[#c9a052]/20' : 'text-[#a9a198] hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" /></svg>
                        <span>Yorumlar</span>
                        @if(\App\Models\Comment::where('is_approved', false)->count() > 0)
                            <span class="ml-auto bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">
                                {{ \App\Models\Comment::where('is_approved', false)->count() }}
                            </span>
                        @endif
                    </a>

                    <a href="{{ route('admin.contacts.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.contacts.*') ? 'bg-[#c9a052]/10 text-[#c9a052] border border-[#c9a052]/20' : 'text-[#a9a198] hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>
                        <span>İletişim Mesajları</span>
                    </a>
                </nav>

                <div class="p-4 border-t border-white/5">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-3 px-4 py-3 w-full rounded-lg text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-colors">
                             <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg>
                            <span>Çıkış Yap</span>
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 ml-64 min-h-screen relative">
                <!-- Top Header -->
                <header class="bg-[#1b1b1d]/80 backdrop-blur border-b border-white/5 sticky top-0 z-40 px-8 py-4 flex items-center justify-between">
                    <h2 class="font-semibold text-xl text-[#eee9dd] leading-tight">
                        @yield('header')
                    </h2>
                    <div class="flex items-center gap-4">
                        <a href="{{ route('home') }}" target="_blank" class="text-xs text-[#c9a052] hover:underline flex items-center gap-1">
                            Siteyi Görüntüle <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                        </a>
                        <div class="text-[#a9a198] text-sm">
                            Admin
                        </div>
                    </div>
                </header>

                <div class="py-8 px-8">
                    @if(session('success'))
                        <div class="mb-6 bg-green-900/40 border border-green-500/30 text-green-200 px-4 py-3 rounded-lg flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
