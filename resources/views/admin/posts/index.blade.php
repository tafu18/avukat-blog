<x-app-layout>
    @section('header', 'Makaleler')

    <div class="bg-[#1b1b1d] border border-white/5 rounded-2xl overflow-hidden shadow-lg">
        <div class="p-6 border-b border-white/5 flex flex-col md:flex-row md:items-center justify-between gap-4">
             <div class="relative max-w-sm w-full">
                <!-- Search could go here -->
            </div>
            <a href="{{ route('admin.posts.create') }}" class="px-6 py-2 bg-[#c9a052] text-black font-bold rounded-lg hover:bg-[#e0c791] transition flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Yeni Yazı Ekle
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-white/5 text-[#a9a198] text-xs uppercase">
                    <tr>
                        <th class="px-6 py-4 font-medium w-20">Görsel</th>
                        <th class="px-6 py-4 font-medium">Başlık & İçerik</th>
                        <th class="px-6 py-4 font-medium text-center">Durum</th>
                        <th class="px-6 py-4 font-medium text-center">İstatistik</th>
                        <th class="px-6 py-4 font-medium text-right">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @foreach($posts as $post)
                    <tr class="hover:bg-white/5 transition group">
                        <td class="px-6 py-4">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="w-12 h-12 object-cover rounded-lg border border-white/10" alt="">
                            @else
                                <div class="w-12 h-12 bg-white/5 rounded-lg flex items-center justify-center text-white/20">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-[#eee9dd] font-bold mb-1">{{ $post->title }}</div>
                            <div class="text-[#a9a198] text-xs flex gap-2">
                                <span>{{ $post->created_at->format('d.m.Y') }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($post->is_published)
                                <span class="bg-green-500/10 text-green-400 px-3 py-1 rounded-full text-xs font-bold border border-green-500/20">Yayında</span>
                            @else
                                <span class="bg-yellow-500/10 text-yellow-500 px-3 py-1 rounded-full text-xs font-bold border border-yellow-500/20">Taslak</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-4 text-xs">
                                <span class="flex items-center gap-1 text-blue-400 bg-blue-500/10 px-2 py-1 rounded border border-blue-500/20" title="Görüntülenme">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                    {{ $post->views }}
                                </span>
                                <span class="flex items-center gap-1 text-[#c9a052] bg-[#c9a052]/10 px-2 py-1 rounded border border-[#c9a052]/20" title="Yorumlar">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" /></svg>
                                    {{ $post->comments->count() }}
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('posts.show', $post->slug) }}" target="_blank" class="p-2 text-[#a9a198] hover:text-white bg-white/5 hover:bg-white/10 rounded-lg transition" title="Görüntüle">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                                </a>
                                <a href="{{ route('admin.posts.edit', $post) }}" class="p-2 text-blue-400 hover:text-blue-300 bg-blue-500/10 hover:bg-blue-500/20 rounded-lg transition" title="Düzenle">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                </a>
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Bu yazıyı silmek istediğinize emin misiniz?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-400 hover:text-red-300 bg-red-500/10 hover:bg-red-500/20 rounded-lg transition" title="Sil">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="p-6 border-t border-white/5">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
