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
                        
                        <!-- Tabs Navigation -->
                        <div class="mb-6 border-b border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="languageTabs" role="tablist">
                                <li class="mr-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg text-indigo-500 border-indigo-500" id="tr-tab" data-tabs-target="#tr" type="button" role="tab" aria-controls="tr" aria-selected="true" onclick="switchTab('tr')">Türkçe (Varsayılan)</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-300 hover:border-gray-300 text-gray-400" id="en-tab" data-tabs-target="#en" type="button" role="tab" aria-controls="en" aria-selected="false" onclick="switchTab('en')">English</button>
                                </li>
                            </ul>
                        </div>

                        <div id="tabContent">
                            <!-- Turkish Content -->
                            <div class="hidden p-4 rounded-lg bg-gray-900 border border-gray-700 block" id="tr" role="tabpanel" aria-labelledby="tr-tab">
                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium mb-1 text-gray-300">Başlık (TR)</label>
                                    <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="w-full bg-gray-800 border-gray-600 rounded shadow-sm text-white focus:border-indigo-500 focus:ring-indigo-500" required>
                                </div>
                                <div class="mb-4">
                                    <label for="content" class="block text-sm font-medium mb-1 text-gray-300">İçerik (TR)</label>
                                    <textarea name="content" id="content" rows="10" class="w-full bg-gray-800 border-gray-600 rounded shadow-sm text-white focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('content', $post->content) }}</textarea>
                                </div>
                            </div>

                            <!-- English Content -->
                            <div class="hidden p-4 rounded-lg bg-gray-900 border border-gray-700" id="en" role="tabpanel" aria-labelledby="en-tab">
                                <div class="mb-4">
                                    <label for="title_en" class="block text-sm font-medium mb-1 text-gray-300">Title (EN)</label>
                                    <input type="text" name="title_en" id="title_en" value="{{ old('title_en', $post->title_en) }}" class="w-full bg-gray-800 border-gray-600 rounded shadow-sm text-white focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div class="mb-4">
                                    <label for="content_en" class="block text-sm font-medium mb-1 text-gray-300">Content (EN)</label>
                                    <textarea name="content_en" id="content_en" rows="10" class="w-full bg-gray-800 border-gray-600 rounded shadow-sm text-white focus:border-indigo-500 focus:ring-indigo-500">{{ old('content_en', $post->content_en) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <script>
                            function switchTab(lang) {
                                // Hide all contents
                                document.getElementById('tr').classList.add('hidden');
                                document.getElementById('tr').classList.remove('block');
                                document.getElementById('en').classList.add('hidden');
                                document.getElementById('en').classList.remove('block');
                                
                                // Show selected content
                                document.getElementById(lang).classList.remove('hidden');
                                document.getElementById(lang).classList.add('block');
                                
                                // Reset tabs styles
                                document.getElementById('tr-tab').className = "inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-300 hover:border-gray-300 text-gray-400";
                                document.getElementById('en-tab').className = "inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-300 hover:border-gray-300 text-gray-400";
                                
                                // Set active tab style
                                document.getElementById(lang + '-tab').className = "inline-block p-4 border-b-2 rounded-t-lg text-indigo-500 border-indigo-500";
                            }
                        </script>

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
