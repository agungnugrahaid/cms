@extends('layouts.app')

@section('title', $article->title . ' - GMEDIA NOC')

@section('content')
<main class="flex-grow w-full max-w-3xl mx-auto px-6 py-12 lg:py-16">
    <!-- Back Navigation -->
    <a class="inline-flex items-center gap-2 text-primary font-label-md text-label-md mb-8 hover:text-primary-container transition-colors" href="{{ route('articles.index') }}">
        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
        Back to Updates
    </a>
    
    <!-- Article Header -->
    <header class="mb-10">
        <div class="flex items-center gap-4 mb-4">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full font-label-sm text-label-sm border 
                {{ $article->category->slug === 'incident' ? 'bg-red-50 text-red-700 border-red-200 dark:bg-red-900/30 dark:text-red-400 dark:border-red-800' : 
                  ($article->category->slug === 'maintenance' ? 'bg-yellow-50 text-yellow-800 border-yellow-200 dark:bg-yellow-900/30 dark:text-yellow-400 dark:border-yellow-800' : 'bg-emerald-50 text-emerald-800 border-emerald-200 dark:bg-emerald-900/30 dark:text-emerald-400 dark:border-emerald-800') }}">
                <span class="w-1.5 h-1.5 rounded-full {{ $article->category->slug === 'incident' ? 'bg-red-600' : ($article->category->slug === 'maintenance' ? 'bg-yellow-600' : 'bg-emerald-600') }}"></span>
                {{ strtoupper($article->category->name ?? 'UPDATE') }}
            </span>
            <span class="text-outline dark:text-slate-400 font-body-md text-body-md flex items-center gap-1">
                <span class="material-symbols-outlined text-[16px]">schedule</span>
                {{ $article->published_at ? $article->published_at->format('M d, Y H:i T') : $article->created_at->format('M d, Y H:i T') }}
            </span>
        </div>
        
        <h1 class="font-h1 text-h1 text-on-surface dark:text-slate-100 mb-6 leading-tight">
            {{ $article->title }}
        </h1>
    </header>

    @if($article->featured_image)
    <div class="mb-10 rounded-xl overflow-hidden shadow-sm border border-outline-variant/30 dark:border-slate-800">
        <img alt="{{ $article->title }}" class="w-full h-[400px] object-cover" src="{{ $article->featured_image }}"/>
    </div>
    @endif
    
    <!-- Divider -->
    <hr class="border-outline-variant/30 dark:border-slate-800 mb-10"/>
    
    <!-- Article Body -->
    <article class="prose prose-slate dark:prose-invert max-w-none prose-headings:font-h2 prose-headings:text-h2 prose-headings:text-on-surface dark:prose-headings:text-slate-100 prose-p:font-body-lg prose-p:text-body-lg prose-p:text-on-surface-variant dark:prose-p:text-slate-300 prose-p:leading-relaxed prose-a:text-primary prose-a:font-medium prose-strong:text-on-surface dark:prose-strong:text-slate-100 prose-strong:font-bold prose-ul:font-body-md prose-ul:text-body-md prose-ul:text-on-surface-variant dark:prose-ul:text-slate-300">
        {!! nl2br(e($article->content)) !!}
    </article>
    
    <!-- Bottom Action -->
    <div class="mt-16 pt-8 border-t border-outline-variant/30 dark:border-slate-800 flex justify-center">
        <a class="inline-flex items-center justify-center h-10 px-6 bg-surface-container dark:bg-slate-800 border border-outline-variant dark:border-slate-700 text-on-surface dark:text-slate-200 font-label-md text-label-md rounded-lg hover:bg-surface-container-high dark:hover:bg-slate-700 hover:border-primary transition-all duration-200" href="{{ route('articles.index') }}">
            Back to Updates
        </a>
    </div>
</main>
@endsection
