<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Manage Articles') }}
            </h2>
            <a href="{{ route('articles.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                {{ __('Create New Article') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 dark:border-gray-700">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th class="py-4 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400">Title</th>
                                    <th class="py-4 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400">Category</th>
                                    <th class="py-4 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400">Status</th>
                                    <th class="py-4 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400">Published</th>
                                    <th class="py-4 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                <tr class="border-b border-gray-100 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-900 transition-colors">
                                    <td class="py-4 px-4 text-sm">
                                        <div class="font-medium text-gray-900 dark:text-white">{{ $article->title }}</div>
                                        <div class="text-gray-500 dark:text-gray-400 text-xs">{{ $article->slug }}</div>
                                    </td>
                                    <td class="py-4 px-4 text-sm">
                                        <span class="px-2 py-1 bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 rounded-md text-xs font-medium">
                                            {{ $article->category->name ?? 'Uncategorized' }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 text-sm">
                                        @if($article->is_published)
                                            <span class="inline-flex items-center gap-1 text-emerald-600 dark:text-emerald-400">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                Published
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 text-amber-600 dark:text-amber-400">
                                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                                Draft
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4 text-sm text-gray-500 dark:text-gray-400">
                                        {{ $article->published_at ? $article->published_at->format('M d, Y') : '-' }}
                                    </td>
                                    <td class="py-4 px-4 text-sm text-right space-x-2">
                                        <a href="{{ route('articles.show', $article) }}" target="_blank" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">View</a>
                                        <a href="{{ route('articles.edit', $article) }}" class="text-amber-600 hover:text-amber-900 dark:text-amber-400 dark:hover:text-amber-300">Edit</a>
                                        <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this article?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-6">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
