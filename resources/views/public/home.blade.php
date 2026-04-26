@extends('layouts.app')

@section('title', 'GMEDIA NOC Homepage')

@section('content')
<main class="flex-grow w-full max-w-[1440px] mx-auto px-6 lg:px-12 py-lg flex flex-col gap-md">
    <!-- High-Impact Hero Carousel Section -->
    <div class="relative bg-slate-900 dark:bg-slate-950 rounded-2xl overflow-hidden shadow-2xl border border-slate-800 min-h-[400px] lg:min-h-[500px] flex group mb-md" data-cms-category="home-carousel">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1558494949-ef010cbdcc31?q=80&amp;w=2000&amp;auto=format&amp;fit=crop')] bg-cover bg-center opacity-40 mix-blend-luminosity pointer-events-none"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/80 to-transparent pointer-events-none"></div>
        
        <!-- Side Arrows -->
        <button aria-label="Previous slide" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur border border-white/20 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-technical">
            <span class="material-symbols-outlined">chevron_left</span>
        </button>
        <button aria-label="Next slide" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur border border-white/20 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-technical">
            <span class="material-symbols-outlined">chevron_right</span>
        </button>
        
        <!-- Slide Content -->
        <div class="relative z-10 flex flex-col items-center justify-center text-center px-6 py-20 lg:py-24 w-full max-w-4xl mx-auto h-full">
            <!-- Status Indicator -->
            <div class="inline-flex items-center gap-2 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-4 py-1.5 rounded-full font-label-md text-sm mb-8 shadow-sm backdrop-blur-sm">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                Current Network Status: Operational
            </div>
            
            <!-- Headline -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white tracking-tight mb-6 leading-tight drop-shadow-md">
                {{ $page->title ?? 'GMEDIA Network Operations Center' }}
            </h1>
            
            <!-- Subtext -->
            <p class="text-lg md:text-xl text-slate-300 mb-10 max-w-2xl font-body-lg drop-shadow">
                {{ $page->content ?? 'Delivering 24/7 monitoring, incident management, and infrastructure resilience to ensure uninterrupted global connectivity.' }}
            </p>
            
            <!-- CTA -->
            <button class="bg-primary-container text-on-primary px-8 py-4 rounded-lg border border-transparent hover:bg-primary transition-all flex items-center gap-2 shadow-technical hover:shadow-lg hover:-translate-y-0.5">
                <span class="material-symbols-outlined" style="font-size: 20px;">warning</span>
                <span class="font-bold">Report an Issue</span>
            </button>
        </div>
        
        <!-- Navigation Dots -->
        <div class="absolute bottom-6 left-0 right-0 flex justify-center gap-2 z-20">
            <button aria-label="Slide 1" class="w-8 h-1.5 rounded-full bg-primary transition-colors"></button>
            <button aria-label="Slide 2" class="w-2 h-1.5 rounded-full bg-white/30 hover:bg-white/50 transition-colors"></button>
            <button aria-label="Slide 3" class="w-2 h-1.5 rounded-full bg-white/30 hover:bg-white/50 transition-colors"></button>
        </div>
    </div>
    
    <!-- Bento Grid: Quick Metrics Row -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
        <!-- Metric 1: Uptime -->
        <div class="bg-surface-container-lowest dark:bg-slate-900 border border-outline-variant dark:border-slate-800 rounded-xl p-md flex items-center justify-between shadow-sm hover:border-primary transition-colors">
            <div class="flex flex-col gap-xs">
                <span class="font-label-sm text-label-sm text-outline dark:text-slate-400 uppercase tracking-wider">Uptime (30d)</span>
                <span class="font-h1 text-h1 text-on-surface dark:text-slate-100">99.9%</span>
            </div>
            <div class="w-10 h-10 rounded bg-surface-container dark:bg-slate-800 flex items-center justify-center text-primary dark:text-blue-400">
                <span class="material-symbols-outlined">network_check</span>
            </div>
        </div>
        
        <!-- Metric 2: Active Tickets -->
        <div class="bg-surface-container-lowest dark:bg-slate-900 border border-outline-variant dark:border-slate-800 rounded-xl p-md flex items-center justify-between shadow-sm hover:border-primary transition-colors">
            <div class="flex flex-col gap-xs">
                <span class="font-label-sm text-label-sm text-outline dark:text-slate-400 uppercase tracking-wider">Active Tickets</span>
                <span class="font-h1 text-h1 text-on-surface dark:text-slate-100">12</span>
            </div>
            <div class="w-10 h-10 rounded bg-surface-container dark:bg-slate-800 flex items-center justify-center text-secondary-container dark:text-yellow-400">
                <span class="material-symbols-outlined">confirmation_number</span>
            </div>
        </div>
        
        <!-- Metric 3: Response Time -->
        <div class="bg-surface-container-lowest dark:bg-slate-900 border border-outline-variant dark:border-slate-800 rounded-xl p-md flex items-center justify-between shadow-sm hover:border-primary transition-colors">
            <div class="flex flex-col gap-xs">
                <span class="font-label-sm text-label-sm text-outline dark:text-slate-400 uppercase tracking-wider">Avg Response Time</span>
                <span class="font-h1 text-h1 text-on-surface dark:text-slate-100">5min</span>
            </div>
            <div class="w-10 h-10 rounded bg-surface-container dark:bg-slate-800 flex items-center justify-center text-tertiary-container dark:text-purple-400">
                <span class="material-symbols-outlined">timer</span>
            </div>
        </div>
    </div>
    
    <!-- Latest Updates Section -->
    <div class="mt-sm flex flex-col gap-md">
        <div class="flex justify-between items-end border-b border-outline-variant dark:border-slate-800 pb-xs">
            <h3 class="font-h3 text-h3 text-on-surface dark:text-slate-100">Latest Updates</h3>
            <a href="{{ route('articles.index') }}" class="font-label-md text-label-md text-primary dark:text-blue-400 hover:underline">View All</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
            @forelse($latestUpdates as $update)
            <div class="bg-surface-container-lowest dark:bg-slate-900 border {{ $update->category->slug === 'incident' ? 'border-error-container dark:border-red-900/50 shadow-[0_0_0_1px_rgba(186,26,26,0.1)] dark:shadow-[0_0_0_1px_rgba(186,26,26,0.3)]' : 'border-outline-variant dark:border-slate-800 hover:shadow-technical transition-shadow' }} rounded-xl p-md flex flex-col gap-sm relative overflow-hidden group">
                @if($update->category->slug === 'incident')
                    <div class="absolute top-0 left-0 w-1 h-full bg-error dark:bg-red-500"></div>
                @endif
                <div class="flex justify-between items-start {{ $update->category->slug === 'incident' ? 'pl-xs' : '' }}">
                    <span class="inline-flex items-center gap-1 font-label-sm text-label-sm uppercase px-2 py-1 rounded-full 
                        {{ $update->category->slug === 'incident' ? 'bg-error-container text-on-error-container dark:bg-red-900/30 dark:text-red-400' : 
                          ($update->category->slug === 'maintenance' ? 'bg-yellow-50 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400' : 'bg-emerald-50 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400') }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $update->category->slug === 'incident' ? 'bg-on-error-container dark:bg-red-400' : ($update->category->slug === 'maintenance' ? 'bg-yellow-600 dark:bg-yellow-400' : 'bg-emerald-600 dark:bg-emerald-400') }}"></span> 
                        {{ $update->category->name }}
                    </span>
                    <span class="font-code text-code text-outline dark:text-slate-500">
                        {{ $update->published_at ? $update->published_at->diffForHumans() : $update->created_at->diffForHumans() }}
                    </span>
                </div>
                <div class="font-body-lg text-body-lg text-on-surface dark:text-slate-100 font-semibold leading-tight {{ $update->category->slug === 'incident' ? 'pl-xs' : '' }}">
                    {{ $update->title }}
                </div>
                <div class="mt-auto pt-sm {{ $update->category->slug === 'incident' ? 'pl-xs text-error dark:text-red-400' : 'text-primary dark:text-blue-400' }} flex items-center gap-xs font-label-md text-label-md cursor-pointer group-hover:underline">
                    <a href="{{ route('articles.show', $update) }}" class="flex items-center gap-xs">
                        {{ $update->category->slug === 'incident' ? 'Post-Mortem' : ($update->category->slug === 'maintenance' ? 'View Schedule' : 'Read Details') }} 
                        <span class="material-symbols-outlined" style="font-size: 16px;">arrow_forward</span>
                    </a>
                </div>
            </div>
            @empty
                <div class="col-span-3 p-8 text-center text-slate-500 dark:text-slate-400">No recent updates available.</div>
            @endforelse
        </div>
    </div>
</main>
@endsection