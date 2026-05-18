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
                        <table id="articles-table" class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th class="py-4 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400">Title</th>
                                    <th class="py-4 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400">Category</th>
                                    <th class="py-4 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400">Status</th>
                                    <th class="py-4 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400">Views</th>
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
                                    <td class="py-4 px-4 text-sm text-gray-600 dark:text-gray-300">
                                        <div class="flex items-center gap-1">
                                            <span class="material-symbols-outlined text-[16px]">visibility</span>
                                            {{ number_format($article->views ?? 0) }}
                                        </div>
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
                </div>
            </div>
        </div>
    </div>

    <!-- DataTables Styling and Integration -->
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.tailwindcss.css" rel="stylesheet">
    <style>
        /* Custom Premium Dark Mode/NOC Aesthetic overrides for DataTables */
        .dt-container {
            padding: 1rem 0;
        }
        .dt-layout-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.25rem;
            gap: 1rem;
            flex-wrap: wrap;
        }
        .dt-search input {
            background-color: #f9fafb !important;
            border-color: #e5e7eb !important;
            color: #111827 !important;
            border-radius: 0.5rem !important;
            padding: 0.5rem 1rem !important;
            font-size: 0.875rem !important;
            transition: all 0.2s;
        }
        .dark .dt-search input {
            background-color: #1f2937 !important;
            border-color: #374151 !important;
            color: #f9fafb !important;
        }
        .dt-search input:focus {
            outline: none !important;
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2) !important;
        }
        .dt-length select {
            background-color: #f9fafb !important;
            border-color: #e5e7eb !important;
            color: #111827 !important;
            border-radius: 0.5rem !important;
            padding: 0.5rem 2rem 0.5rem 1rem !important;
            font-size: 0.875rem !important;
        }
        .dark .dt-length select {
            background-color: #1f2937 !important;
            border-color: #374151 !important;
            color: #f9fafb !important;
        }
        .dt-paging {
            display: flex;
            gap: 0.25rem;
        }
        .dt-paging-button {
            padding: 0.5rem 0.875rem !important;
            border-radius: 0.375rem !important;
            font-size: 0.875rem !important;
            font-weight: 500 !important;
            transition: all 0.2s;
            cursor: pointer;
        }
        .dt-paging-button.current {
            background-color: #2563eb !important;
            color: white !important;
        }
        .dt-paging-button:hover:not(.current):not(.disabled) {
            background-color: #f3f4f6 !important;
        }
        .dark .dt-paging-button:hover:not(.current):not(.disabled) {
            background-color: #374151 !important;
        }
        .dt-info {
            font-size: 0.875rem;
            color: #6b7280;
        }
        .dark .dt-info {
            color: #9ca3af;
        }
    </style>

    <!-- DataTables Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.tailwindcss.js"></script>
    <script>
        $(document).ready(function() {
            $('#articles-table').DataTable({
                columnDefs: [
                    { orderable: false, targets: 5 } // Actions column is not orderable
                ],
                order: [[4, 'desc']], // Sort by 'Published' column by default
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ articles",
                    infoEmpty: "Showing 0 to 0 of 0 articles",
                    infoFiltered: "(filtered from _MAX_ total articles)",
                    zeroRecords: "No matching articles found"
                }
            });
        });
    </script>
</x-app-layout>
