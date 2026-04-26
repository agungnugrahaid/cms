<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Pages Stat -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 dark:border-gray-700">
                    <div class="p-6">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Total Pages</div>
                        <div class="mt-2 flex items-baseline justify-between">
                            <div class="text-3xl font-bold text-gray-900 dark:text-white">{{ $stats['pages'] }}</div>
                            <a href="{{ route('pages.index') }}" class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline">View All</a>
                        </div>
                    </div>
                </div>

                <!-- Categories Stat -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 dark:border-gray-700">
                    <div class="p-6">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Total Categories</div>
                        <div class="mt-2 flex items-baseline justify-between">
                            <div class="text-3xl font-bold text-gray-900 dark:text-white">{{ $stats['categories'] }}</div>
                            <a href="{{ route('categories.index') }}" class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline">View All</a>
                        </div>
                    </div>
                </div>

                <!-- Articles Stat -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 dark:border-gray-700">
                    <div class="p-6">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Total Articles</div>
                        <div class="mt-2 flex items-baseline justify-between">
                            <div class="text-3xl font-bold text-gray-900 dark:text-white">{{ $stats['articles'] }}</div>
                            <a href="{{ route('articles.index') }}" class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline">View All</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 dark:border-gray-700">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Welcome to GMEDIA NOC Admin</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        You are logged in as <strong>{{ Auth::user()->name }}</strong>. Use the navigation links above to manage your website's content, incident reports, and categories.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
