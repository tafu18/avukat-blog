@extends('layouts.client')

@section('title', 'Hakkımda | Tarık Taşdemir')

@section('content')

<section class="mb-16">
    <header class="mb-12 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-[#eee9dd] mb-4 text-shadow">
            Hakkımda
        </h1>
        <div class="w-24 h-1 bg-[#c9a052] mx-auto rounded-full"></div>
    </header>

    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div class="order-2 md:order-1">
            <h2 class="text-2xl font-serif text-[#e0c791] mb-6">Tarık Taşdemir Kimdir?</h2>
            <div class="text-[#d8d1c3] space-y-4 leading-relaxed text-lg">
                <p>
                    Merhaba, ben Avukat Tarık Taşdemir. Hukuk dünyasındaki yolculuğuma, adaletin ve hakkaniyetin herkes için ulaşılabilir olması gerektiği inancıyla başladım.
                </p>
                <p>
                    İstanbul Üniversitesi Hukuk Fakültesi'nden mezun olduktan sonra, çeşitli alanlarda uzmanlaşarak müvekkillerime en doğru hukuki desteği sağlamayı amaç edindim. Ceza hukuku, aile hukuku ve ticaret hukuku başta olmak üzere geniş bir yelpazede hizmet vermekteyim.
                </p>
                <p>
                    Mesleğimi icra ederken dürüstlük, şeffaflık ve güven ilkelerinden asla taviz vermiyorum. Her davanın kendine özgü dinamikleri olduğunu biliyor ve müvekkillerimle birebir iletişim kurarak süreci şeffaf bir şekilde yürütüyorum.
                </p>
                <p>
                    Hukukun karmaşık labirentlerinde size rehberlik etmek ve haklarınızı en güçlü şekilde savunmak için buradayım.
                </p>
            </div>

            <div class="mt-8 flex gap-4">
                <a href="mailto:info@avukattariktasdemir.com" class="px-6 py-3 bg-[#c9a052] text-black font-bold rounded hover:bg-[#e0c791] transition shadow-lg shadow-[#c9a052]/20">
                    İletişime Geç
                </a>
            </div>
        </div>

        <div class="order-1 md:order-2 flex justify-center">
            <div class="relative w-full max-w-sm aspect-[3/4]">
                <div class="absolute inset-0 bg-[#c9a052] rounded-2xl rotate-3 opacity-20 blur-sm"></div>
                <div class="absolute inset-0 border border-[#c9a052]/30 rounded-2xl -rotate-2"></div>
                <!-- Placeholder for user image -->
                <div class="relative h-full w-full bg-gray-800 rounded-2xl overflow-hidden flex items-center justify-center border border-white/10 shadow-2xl">
                    <img src="{{ asset('logo-avukat.png') }}" class="w-1/2 opacity-50" alt="Tarık Taşdemir">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="grid md:grid-cols-3 gap-8 mb-16">
    <div class="p-6 bg-white/5 border border-white/5 rounded-xl text-center">
        <div class="text-4xl text-[#c9a052] mb-4">⚖️</div>
        <h3 class="text-xl font-bold text-white mb-2">Uzmanlık</h3>
        <p class="text-gray-400">Alanında uzman yaklaşım ve detaylı hukuki analiz.</p>
    </div>
    <div class="p-6 bg-white/5 border border-white/5 rounded-xl text-center">
        <div class="text-4xl text-[#c9a052] mb-4">🤝</div>
        <h3 class="text-xl font-bold text-white mb-2">Güven</h3>
        <p class="text-gray-400">Şeffaf iletişim ve karşılıklı güvene dayalı ilişki.</p>
    </div>
    <div class="p-6 bg-white/5 border border-white/5 rounded-xl text-center">
        <div class="text-4xl text-[#c9a052] mb-4">🔍</div>
        <h3 class="text-xl font-bold text-white mb-2">Çözüm</h3>
        <p class="text-gray-400">Sonuç odaklı stratejiler ve etkili çözümler.</p>
    </div>
</section>

@endsection
