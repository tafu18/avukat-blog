<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('İletişim Mesajları') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    @if(session('success'))
                        <div class="mb-4 text-green-400">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-700 text-sm uppercase">
                                <th class="py-3">Gönderen</th>
                                <th class="py-3">Konu</th>
                                <th class="py-3">Mesaj</th>
                                <th class="py-3">Tarih</th>
                                <th class="py-3 text-right">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messages as $message)
                            <tr class="border-b border-gray-700/50 hover:bg-gray-700/20">
                                <td class="py-3">
                                    <div class="font-bold">{{ $message->name }}</div>
                                    <div class="text-xs text-gray-400">{{ $message->email }}</div>
                                </td>
                                <td class="py-3 font-bold text-sm">
                                    {{ $message->subject }}
                                </td>
                                <td class="py-3 max-w-xs text-sm text-gray-300">
                                    {{ Str::limit($message->message, 80) }}
                                </td>
                                <td class="py-3 text-xs">{{ $message->created_at->format('d.m.Y H:i') }}</td>
                                <td class="py-3 text-right space-x-2">
                                    <a href="mailto:{{ $message->email }}" class="text-indigo-400 hover:text-white text-xs border border-indigo-400/50 px-2 py-1 rounded">Cevapla</a>
                                    
                                    <form action="{{ route('admin.contacts.destroy', $message) }}" method="POST" class="inline" onsubmit="return confirm('Emin misiniz?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-white text-xs">Sil</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $messages->links('pagination.admin') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
