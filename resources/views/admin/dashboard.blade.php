<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Hoş Geldiniz, {{ auth()->user()->name }}</h3>
                    <p class="mb-6">Buradan içeriklerinizi yönetebilirsiniz.</p>

                    <div class="grid md:grid-cols-4 gap-6 mb-8">
                        <div class="bg-gray-700/50 p-6 rounded-lg border border-gray-600">
                            <h4 class="text-sm text-gray-400 uppercase">Toplam Yazı</h4>
                            <div class="text-3xl font-bold mt-2">{{ $stats['posts'] }}</div>
                        </div>
                        <div class="bg-gray-700/50 p-6 rounded-lg border border-gray-600">
                            <h4 class="text-sm text-gray-400 uppercase">Toplam Yorum</h4>
                            <div class="text-3xl font-bold mt-2">{{ $stats['comments'] }}</div>
                        </div>
                        <div class="bg-gray-700/50 p-6 rounded-lg border border-gray-600">
                            <h4 class="text-sm text-gray-400 uppercase">Bekleyen Yorum</h4>
                            <div class="text-3xl font-bold mt-2 text-yellow-500">{{ $stats['pending_comments'] }}</div>
                        </div>
                        <div class="bg-gray-700/50 p-6 rounded-lg border border-gray-600">
                            <h4 class="text-sm text-gray-400 uppercase">Toplam Okunma</h4>
                            <div class="text-3xl font-bold mt-2 text-green-500">{{ $stats['views'] }}</div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-6">
                        <a href="{{ route('admin.posts.index') }}" class="block p-6 bg-gray-700/50 rounded-lg border border-gray-600 hover:border-gray-500 transition hover:bg-gray-700">
                            <h4 class="font-bold text-xl mb-2 text-indigo-400">Yazıları Yönet</h4>
                            <p class="text-sm text-gray-400">Blog içeriğini düzenle.</p>
                        </a>
                        
                        <a href="{{ route('admin.comments.index') }}" class="block p-6 bg-gray-700/50 rounded-lg border border-gray-600 hover:border-gray-500 transition hover:bg-gray-700">
                            <h4 class="font-bold text-xl mb-2 text-indigo-400">Yorumları Yönet</h4>
                            <p class="text-sm text-gray-400">Onay bekleyen yorumları incele.</p>
                        </a>

                        <a href="{{ route('admin.contacts.index') }}" class="block p-6 bg-gray-700/50 rounded-lg border border-gray-600 hover:border-gray-500 transition hover:bg-gray-700">
                            <h4 class="font-bold text-xl mb-2 text-pink-400">İletişim Mesajları</h4>
                            <p class="text-sm text-gray-400">Gelen mesajları görüntüle.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
