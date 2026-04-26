<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Static Pages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 dark:border-gray-700">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th class="py-4 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400">Page Title</th>
                                    <th class="py-4 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400">Slug</th>
                                    <th class="py-4 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400">Last Updated</th>
                                    <th class="py-4 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pages as $page)
                                <tr class="border-b border-gray-100 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-900 transition-colors">
                                    <td class="py-4 px-4 text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $page->title }}
                                    </td>
                                    <td class="py-4 px-4 text-sm text-gray-500 dark:text-gray-400">
                                        /{{ $page->slug }}
                                    </td>
                                    <td class="py-4 px-4 text-sm text-gray-500 dark:text-gray-400">
                                        {{ $page->updated_at->format('M d, Y') }}
                                    </td>
                                    <td class="py-4 px-4 text-sm text-right space-x-2">
                                        <a href="{{ url('/' . $page->slug) }}" target="_blank" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">View</a>
                                        <a href="{{ route('pages.edit', $page) }}" class="text-amber-600 hover:text-amber-900 dark:text-amber-400 dark:hover:text-amber-300">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
