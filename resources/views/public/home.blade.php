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
            <button class="bg-primary-container text-on-primary font-label-md text-base px-8 py-4 rounded-lg border border-transparent hover:bg-primary transition-all flex items-center gap-2 shadow-technical hover:shadow-lg hover:-translate-y-0.5">
                <span class="material-symbols-outlined" style="font-size: 20px;">warning</span>
                Report an Issue
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
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex items-center justify-between shadow-sm hover:border-primary transition-colors">
            <div class="flex flex-col gap-xs">
                <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Uptime (30d)</span>
                <span class="font-h1 text-h1 text-on-surface">99.9%</span>
            </div>
            <div class="w-10 h-10 rounded bg-surface-container flex items-center justify-center text-primary">
                <span class="material-symbols-outlined">network_check</span>
            </div>
        </div>
        
        <!-- Metric 2: Active Tickets -->
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex items-center justify-between shadow-sm hover:border-primary transition-colors">
            <div class="flex flex-col gap-xs">
                <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Active Tickets</span>
                <span class="font-h1 text-h1 text-on-surface">12</span>
            </div>
            <div class="w-10 h-10 rounded bg-surface-container flex items-center justify-center text-secondary-container">
                <span class="material-symbols-outlined">confirmation_number</span>
            </div>
        </div>
        
        <!-- Metric 3: Response Time -->
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex items-center justify-between shadow-sm hover:border-primary transition-colors">
            <div class="flex flex-col gap-xs">
                <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Avg Response Time</span>
                <span class="font-h1 text-h1 text-on-surface">5min</span>
            </div>
            <div class="w-10 h-10 rounded bg-surface-container flex items-center justify-center text-tertiary-container">
                <span class="material-symbols-outlined">timer</span>
            </div>
        </div>
    </div>
    
    <!-- Latest Updates Section -->
    <div class="mt-sm flex flex-col gap-md">
        <h3 class="font-h3 text-h3 text-on-surface border-b border-outline-variant pb-xs">Latest Updates</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
            <!-- Update Card 1: News -->
            <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex flex-col gap-sm hover:shadow-technical transition-shadow">
                <div class="flex justify-between items-start">
                    <span class="inline-flex items-center gap-1 bg-tertiary-fixed text-on-tertiary-fixed px-2 py-1 rounded-full font-label-sm text-label-sm uppercase">
                        <span class="w-1.5 h-1.5 rounded-full bg-on-tertiary-fixed"></span> News
                    </span>
                    <span class="font-code text-code text-outline">10:45 AM</span>
                </div>
                <div class="font-body-lg text-body-lg text-on-surface font-semibold leading-tight">
                    New peering agreement finalized with EU regional transit provider.
                </div>
                <div class="mt-auto pt-sm flex items-center gap-xs text-primary font-label-md text-label-md cursor-pointer hover:underline">
                    Read Details <span class="material-symbols-outlined" style="font-size: 16px;">arrow_forward</span>
                </div>
            </div>
            
            <!-- Update Card 2: Maintenance -->
            <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex flex-col gap-sm hover:shadow-technical transition-shadow">
                <div class="flex justify-between items-start">
                    <span class="inline-flex items-center gap-1 bg-secondary-fixed text-on-secondary-fixed px-2 py-1 rounded-full font-label-sm text-label-sm uppercase">
                        <span class="w-1.5 h-1.5 rounded-full bg-on-secondary-fixed"></span> Maintenance
                    </span>
                    <span class="font-code text-code text-outline">Yesterday</span>
                </div>
                <div class="font-body-lg text-body-lg text-on-surface font-semibold leading-tight">
                    Scheduled core router firmware upgrade (NYC-01-CR). No expected impact.
                </div>
                <div class="mt-auto pt-sm flex items-center gap-xs text-primary font-label-md text-label-md cursor-pointer hover:underline">
                    View Schedule <span class="material-symbols-outlined" style="font-size: 16px;">arrow_forward</span>
                </div>
            </div>
            
            <!-- Update Card 3: Incident -->
            <div class="bg-surface-container-lowest border border-error-container rounded-xl p-md flex flex-col gap-sm shadow-[0_0_0_1px_rgba(186,26,26,0.1)] relative overflow-hidden">
                <div class="absolute top-0 left-0 w-1 h-full bg-error"></div>
                <div class="flex justify-between items-start pl-xs">
                    <span class="inline-flex items-center gap-1 bg-error-container text-on-error-container px-2 py-1 rounded-full font-label-sm text-label-sm uppercase">
                        <span class="w-1.5 h-1.5 rounded-full bg-on-error-container"></span> Incident
                    </span>
                    <span class="font-code text-code text-outline">Oct 24</span>
                </div>
                <div class="font-body-lg text-body-lg text-on-surface font-semibold leading-tight pl-xs">
                    [Resolved] Latency spikes observed on transatlantic submarine cable bundle A.
                </div>
                <div class="mt-auto pt-sm pl-xs flex items-center gap-xs text-error font-label-md text-label-md cursor-pointer hover:underline">
                    Post-Mortem <span class="material-symbols-outlined" style="font-size: 16px;">arrow_forward</span>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection