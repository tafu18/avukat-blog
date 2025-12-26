<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Yazıyı Düzenle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium mb-1">Başlık</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="w-full bg-gray-900 border-gray-700 rounded shadow-sm text-white" required>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium mb-1">İçerik</label>
                            <textarea name="content" id="content" rows="10" class="w-full bg-gray-900 border-gray-700 rounded shadow-sm text-white" required>{{ old('content', $post->content) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium mb-1">Görsel (Opsiyonel)</label>
                            @if($post->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" class="h-20 w-auto rounded border border-gray-600">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-700 file:text-white hover:file:bg-gray-600">
                        </div>

                        <div class="mb-6 flex items-center">
                            <input type="checkbox" name="is_published" id="is_published" value="1" {{ $post->is_published ? 'checked' : '' }} class="rounded bg-gray-900 border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <label for="is_published" class="ml-2 text-sm">Yayınla</label>
                        </div>

                        <div class="flex gap-4">
                            <button type="submit" class="px-6 py-2 bg-indigo-600 rounded text-white font-bold hover:bg-indigo-500">Güncelle</button>
                            <a href="{{ route('admin.posts.index') }}" class="px-6 py-2 bg-gray-600 rounded text-white hover:bg-gray-500">İptal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
