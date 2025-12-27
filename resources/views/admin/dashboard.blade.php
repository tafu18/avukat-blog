<x-app-layout>
    @section('header', 'Genel Bakış')

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Posts -->
        <div class="bg-[#1b1b1d] border border-white/5 p-6 rounded-2xl shadow-lg hover:border-[#c9a052]/30 transition group">
            <div class="flex items-center justify-between mb-4">
                <div class="text-[#a9a198] text-sm font-medium">Toplam Yazı</div>
                <div class="w-10 h-10 rounded-full bg-[#c9a052]/10 flex items-center justify-center text-[#c9a052]">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg>
                </div>
            </div>
            <div class="text-3xl font-bold text-[#eee9dd] group-hover:text-[#c9a052] transition">{{ $stats['posts'] }}</div>
        </div>

        <!-- Views -->
        <div class="bg-[#1b1b1d] border border-white/5 p-6 rounded-2xl shadow-lg hover:border-[#c9a052]/30 transition group">
            <div class="flex items-center justify-between mb-4">
                <div class="text-[#a9a198] text-sm font-medium">Toplam Görüntülenme</div>
                 <div class="w-10 h-10 rounded-full bg-blue-500/10 flex items-center justify-center text-blue-500">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                </div>
            </div>
            <div class="text-3xl font-bold text-[#eee9dd] group-hover:text-blue-400 transition">{{ number_format($stats['views']) }}</div>
        </div>

        <!-- Pending Comments -->
        <div class="bg-[#1b1b1d] border border-white/5 p-6 rounded-2xl shadow-lg hover:border-[#c9a052]/30 transition group">
            <div class="flex items-center justify-between mb-4">
                <div class="text-[#a9a198] text-sm font-medium">Onay Bekleyen Yorum</div>
                 <div class="w-10 h-10 rounded-full bg-red-500/10 flex items-center justify-center text-red-500">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" /></svg>
                </div>
            </div>
            <div class="text-3xl font-bold text-[#eee9dd] group-hover:text-red-400 transition">{{ $stats['pending_comments'] }}</div>
        </div>
        
         <!-- Total Comments -->
        <div class="bg-[#1b1b1d] border border-white/5 p-6 rounded-2xl shadow-lg hover:border-[#c9a052]/30 transition group">
            <div class="flex items-center justify-between mb-4">
                <div class="text-[#a9a198] text-sm font-medium">Toplam Yorum</div>
                 <div class="w-10 h-10 rounded-full bg-green-500/10 flex items-center justify-center text-green-500">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" /></svg>
                </div>
            </div>
            <div class="text-3xl font-bold text-[#eee9dd] group-hover:text-green-400 transition">{{ $stats['comments'] }}</div>
        </div>
    </div>


    <div class="grid lg:grid-cols-2 gap-8">
        <!-- Top Posts -->
        <div class="bg-[#1b1b1d] border border-white/5 rounded-2xl overflow-hidden">
            <div class="p-6 border-b border-white/5 flex items-center justify-between">
                <h3 class="font-bold text-[#e0c791] font-serif text-lg">En Çok Okunan Yazılar</h3>
                <a href="{{ route('admin.posts.index') }}" class="text-xs text-[#a9a198] hover:text-white">Tümünü Gör</a>
            </div>
            <div class="p-0">
                <table class="w-full text-left">
                    <thead class="bg-white/5 text-[#a9a198] text-xs uppercase">
                        <tr>
                            <th class="px-6 py-4 font-medium">Başlık</th>
                            <th class="px-6 py-4 font-medium text-center">Görüntülenme</th>
                            <th class="px-6 py-4 font-medium text-center">Yorum</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach($topPosts as $post)
                        <tr class="hover:bg-white/5 transition">
                            <td class="px-6 py-4">
                                <div class="text-sm font-bold text-[#eee9dd] line-clamp-1">{{ $post->title }}</div>
                                <div class="text-xs text-[#a9a198]">{{ $post->created_at->format('d.m.Y') }}</div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="bg-blue-500/10 text-blue-400 px-2 py-1 rounded text-xs font-bold">{{ $post->views }}</span>
                            </td>
                            <td class="px-6 py-4 text-center text-sm text-[#a9a198]">
                                {{ $post->comments_count }}
                            </td>
                        </tr>
                        @endforeach
                        @if($topPosts->isEmpty())
                            <tr><td colspan="3" class="px-6 py-8 text-center text-[#a9a198]">Henüz veri yok.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pending Comments -->
        <div class="bg-[#1b1b1d] border border-white/5 rounded-2xl overflow-hidden">
            <div class="p-6 border-b border-white/5 flex items-center justify-between">
                <h3 class="font-bold text-[#e0c791] font-serif text-lg">Son Bekleyen Yorumlar</h3>
                <a href="{{ route('admin.comments.index') }}" class="text-xs text-[#a9a198] hover:text-white">Tümünü Gör</a>
            </div>
            <div class="divide-y divide-white/5">
                @foreach($pendingComments as $comment)
                <div class="p-6 hover:bg-white/5 transition">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <span class="text-[#eee9dd] font-bold text-sm">{{ $comment->name }}</span>
                            <span class="text-[#a9a198] text-xs ml-2">({{ $comment->email }})</span>
                        </div>
                        <span class="text-[#a9a198] text-[10px]">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="text-[#d8d1c3] text-sm mb-3 line-clamp-2">
                        "{{ $comment->comment }}"
                    </div>
                    <div class="flex items-center justify-between">
                         <div class="text-xs text-[#a9a198] italic">
                            Yazı: {{ Str::limit($comment->post->title, 30) }}
                        </div>
                        <div class="flex gap-2">
                            <form action="{{ route('admin.comments.toggle', $comment) }}" method="POST">
                                @csrf @method('PUT')
                                <button class="px-3 py-1 bg-green-500/20 text-green-400 hover:bg-green-500 hover:text-white rounded text-xs transition">Onayla</button>
                            </form>
                            <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="px-3 py-1 bg-red-500/20 text-red-400 hover:bg-red-500 hover:text-white rounded text-xs transition">Sil</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                @if($pendingComments->isEmpty())
                    <div class="p-8 text-center text-[#a9a198]">Bekleyen yorum bulunmuyor.</div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
