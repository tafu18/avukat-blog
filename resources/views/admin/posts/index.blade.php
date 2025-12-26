<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Yazılar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-4">
                        <h3 class="text-lg">Tüm Yazılar</h3>
                        <a href="{{ route('admin.posts.create') }}" class="px-4 py-2 bg-indigo-600 rounded text-white text-sm hover:bg-indigo-500">Yeni Yazı Ekle</a>
                    </div>
                    
                    @if(session('success'))
                        <div class="mb-4 text-green-400">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-700 text-sm uppercase">
                                <th class="py-3">Başlık</th>
                                <th class="py-3">Durum</th>
                                <th class="py-3">Tarih</th>
                                <th class="py-3 text-right">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr class="border-b border-gray-700/50 hover:bg-gray-700/20">
                                <td class="py-3">{{ $post->title }}</td>
                                <td class="py-3">
                                    @if($post->is_published)
                                        <span class="text-green-400 text-xs border border-green-400/50 px-2 py-1 rounded">Yayında</span>
                                    @else
                                        <span class="text-yellow-400 text-xs border border-yellow-400/50 px-2 py-1 rounded">Taslak</span>
                                    @endif
                                </td>
                                <td class="py-3">{{ $post->created_at->format('d.m.Y') }}</td>
                                <td class="py-3 text-right space-x-2">
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="text-indigo-400 hover:text-white">Düzenle</a>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Emin misiniz?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-white">Sil</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                    {{ $posts->links('pagination.admin') }}
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
