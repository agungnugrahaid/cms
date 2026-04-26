@extends('layouts.app')

@section('title', 'GMEDIA NOC Updates')

@section('content')
<main class="flex-grow w-full max-w-[1440px] mx-auto px-6 lg:px-12 py-8 grid grid-cols-12 gap-gutter">
    <!-- Page Header -->
    <div class="col-span-12 mb-6">
        <h1 class="font-h1 text-h1 text-on-surface dark:text-slate-100 mb-2">NOC Updates &amp; Advisories</h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant dark:text-slate-300">Real-time tracking of network events, maintenance windows, and global infrastructure news.</p>
    </div>
    
    <!-- Filters (Tab Style) -->
    <div class="col-span-12 md:col-span-3 lg:col-span-2 mb-6 md:mb-0">
        <div class="bg-surface-container-lowest dark:bg-slate-900 border border-outline-variant dark:border-slate-800 rounded-lg p-2 sticky top-24">
            <div class="flex flex-col gap-1">
                <a href="{{ route('articles.index') }}" class="flex items-center justify-between px-3 py-2 {{ !request('category') ? 'bg-primary-container text-on-primary' : 'text-on-surface-variant dark:text-slate-300 hover:bg-surface-container dark:hover:bg-slate-800 hover:text-on-surface dark:hover:text-slate-100' }} rounded-md font-label-md text-label-md transition-colors w-full text-left">
                    <span>All Updates</span>
                    <span class="{{ !request('category') ? 'bg-primary' : 'bg-surface-container-high dark:bg-slate-800 group-hover:bg-surface-variant dark:group-hover:bg-slate-700' }} px-2 py-0.5 rounded-full text-[10px]">{{ \App\Models\Article::count() }}</span>
                </a>
                
                @foreach($categories as $category)
                    @php
                        $colorClass = $category->slug === 'incident' ? 'red' : ($category->slug === 'maintenance' ? 'yellow' : 'emerald');
                        $isActive = request('category') === $category->slug;
                    @endphp
                    <a href="{{ route('articles.index', ['category' => $category->slug]) }}" class="flex items-center justify-between px-3 py-2 {{ $isActive ? 'bg-primary-container text-on-primary' : 'text-on-surface-variant dark:text-slate-300 hover:bg-surface-container dark:hover:bg-slate-800 hover:text-on-surface dark:hover:text-slate-100' }} rounded-md font-label-md text-label-md transition-colors w-full text-left group">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-{{ $colorClass }}-500"></span>
                            <span>{{ $category->name }}</span>
                        </div>
                        <span class="{{ $isActive ? 'bg-primary' : 'bg-surface-container-high dark:bg-slate-800 group-hover:bg-surface-variant dark:group-hover:bg-slate-700' }} px-2 py-0.5 rounded-full text-[10px]">{{ $category->articles_count }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- Feed List -->
    <div class="col-span-12 md:col-span-9 lg:col-span-10 flex flex-col gap-4">
        @forelse($articles as $article)
            <div class="bg-surface-container-lowest dark:bg-slate-900 border border-outline-variant dark:border-slate-800 rounded-xl p-5 hover:border-primary transition-colors group relative overflow-hidden">
                <div class="absolute left-0 top-0 bottom-0 w-1 {{ $article->category->slug === 'incident' ? 'bg-red-500' : ($article->category->slug === 'maintenance' ? 'bg-yellow-500' : 'bg-emerald-500') }}"></div>
                <div class="flex flex-col md:flex-row gap-4 items-start md:items-center">
                    <div class="flex-grow">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full font-label-sm text-label-sm border 
                                {{ $article->category->slug === 'incident' ? 'bg-red-50 text-red-700 border-red-200 dark:bg-red-900/30 dark:text-red-400 dark:border-red-800' : 
                                  ($article->category->slug === 'maintenance' ? 'bg-yellow-50 text-yellow-800 border-yellow-200 dark:bg-yellow-900/30 dark:text-yellow-400 dark:border-yellow-800' : 'bg-emerald-50 text-emerald-800 border-emerald-200 dark:bg-emerald-900/30 dark:text-emerald-400 dark:border-emerald-800') }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $article->category->slug === 'incident' ? 'bg-red-600' : ($article->category->slug === 'maintenance' ? 'bg-yellow-600' : 'bg-emerald-600') }}"></span>
                                {{ strtoupper($article->category->name ?? 'UPDATE') }}
                            </span>
                            <span class="text-on-surface-variant dark:text-slate-400 text-sm flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px]">schedule</span>
                                {{ $article->published_at ? $article->published_at->format('M d, Y H:i T') : $article->created_at->format('M d, Y H:i T') }}
                            </span>
                        </div>
                        <h3 class="font-h3 text-h3 text-on-surface dark:text-slate-100 mb-1 group-hover:text-primary transition-colors">{{ $article->title }}</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant dark:text-slate-300 line-clamp-2">{{ Str::limit(strip_tags($article->content), 150) }}</p>
                    </div>
                    @if($article->featured_image)
                    <div class="hidden sm:block w-32 h-24 flex-shrink-0 rounded-lg overflow-hidden border border-outline-variant dark:border-slate-800 bg-slate-100 dark:bg-slate-800">
                        <img alt="{{ $article->title }}" class="w-full h-full object-cover" src="{{ $article->featured_image }}"/>
                    </div>
                    @endif
                    <div class="flex-shrink-0">
                        <a href="{{ route('articles.show', $article) }}" class="px-4 py-2 border border-outline-variant dark:border-slate-700 text-on-surface dark:text-slate-200 rounded-md font-label-md text-label-md hover:bg-surface-container dark:hover:bg-slate-800 transition-colors flex items-center gap-2">
                            View Details
                            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="p-8 text-center text-slate-500 dark:text-slate-400">No updates found.</div>
        @endforelse
        
        <!-- Pagination -->
        <div class="flex justify-center mt-6">
            {{ $articles->links() }}
        </div>
    </div>
</main>
@endsection
