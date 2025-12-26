@extends('layouts.client')

@section('title', 'İletişim | Tarık Taşdemir')

@section('content')

<section class="mb-16">
    <header class="mb-12 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-[#eee9dd] mb-4 text-shadow">
            İletişim
        </h1>
        <div class="w-24 h-1 bg-[#c9a052] mx-auto rounded-full"></div>
    </header>

    <div class="grid md:grid-cols-2 gap-12">
        <!-- Contact Info -->
        <div class="space-y-8">
            <h2 class="text-2xl font-serif text-[#e0c791] mb-6">Bize Ulaşın</h2>
            <p class="text-[#d8d1c3] leading-relaxed">
                Hukuki sorunlarınız ve danışmanlık talepleriniz için aşağıdaki iletişim kanallarından veya yandaki formu doldurarak bize ulaşabilirsiniz. En kısa sürede size geri dönüş yapacağız.
            </p>

            <div class="space-y-4">
                <div class="flex items-center gap-4 text-[#d8d1c3]">
                    <div class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-[#c9a052]">
                        📍
                    </div>
                    <div>
                        <div class="text-sm text-gray-400">Adres</div>
                        <div>İstanbul, Türkiye</div>
                    </div>
                </div>

                <div class="flex items-center gap-4 text-[#d8d1c3]">
                    <div class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-[#c9a052]">
                        📧
                    </div>
                    <div>
                        <div class="text-sm text-gray-400">E-posta</div>
                        <a href="mailto:info@avukattariktasdemir.com" class="hover:text-[#c9a052] transition">info@avukattariktasdemir.com</a>
                    </div>
                </div>

                <div class="flex items-center gap-4 text-[#d8d1c3]">
                    <div class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-[#c9a052]">
                        📞
                    </div>
                    <div>
                        <div class="text-sm text-gray-400">Telefon</div>
                        <a href="tel:+905555555555" class="hover:text-[#c9a052] transition">+90 555 555 55 55</a>
                    </div>
                </div>
            </div>
            
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d192697.888505476!2d28.87209633512966!3d41.00546324296546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caa7040068086b%3A0xe1ccfe98bc01b0d0!2zxLBzdGFuYnVs!5e0!3m2!1str!2str!4v1703623000000!5m2!1str!2str" width="100%" height="250" style="border:0; border-radius: 12px; opacity: 0.8;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <!-- Contact Form -->
        <div class="bg-white/5 p-8 rounded-2xl border border-white/10">
            <h3 class="text-xl font-bold text-white mb-6">İletişim Formu</h3>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-900/50 border border-green-500/30 text-green-200 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm text-gray-400 mb-1">Adınız Soyadınız</label>
                        <input type="text" name="name" id="name" class="w-full bg-black/20 border border-white/10 rounded-lg p-3 text-white focus:border-[#c9a052] outline-none transition" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm text-gray-400 mb-1">E-posta Adresiniz</label>
                        <input type="email" name="email" id="email" class="w-full bg-black/20 border border-white/10 rounded-lg p-3 text-white focus:border-[#c9a052] outline-none transition" required>
                    </div>

                    <div>
                        <label for="subject" class="block text-sm text-gray-400 mb-1">Konu</label>
                        <input type="text" name="subject" id="subject" class="w-full bg-black/20 border border-white/10 rounded-lg p-3 text-white focus:border-[#c9a052] outline-none transition" required>
                    </div>

                    <div>
                        <label for="message" class="block text-sm text-gray-400 mb-1">Mesajınız</label>
                        <textarea name="message" id="message" rows="5" class="w-full bg-black/20 border border-white/10 rounded-lg p-3 text-white focus:border-[#c9a052] outline-none transition" required></textarea>
                    </div>

                    <button type="submit" class="w-full py-3 bg-[#c9a052] text-black font-bold rounded-lg hover:bg-[#e0c791] transition shadow-lg shadow-[#c9a052]/20">
                        Gönder
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
