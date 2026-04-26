@extends('layouts.app')

@section('title', 'GMEDIA NOC Homepage')

@section('content')
<main class="flex-grow w-full max-w-[1440px] mx-auto px-6 lg:px-12 py-lg flex flex-col gap-md">
    <!-- High-Impact Hero Carousel Section -->
    <div class="relative bg-slate-900 dark:bg-slate-950 rounded-2xl overflow-hidden shadow-2xl border border-slate-800 min-h-[400px] lg:min-h-[500px] flex group mb-md" id="home-carousel">
        
        <!-- Slides -->
        <div id="carousel-slides-container" class="absolute inset-0 w-full h-full">
            @forelse($carouselItems as $index => $item)
                <div class="carousel-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out flex flex-col items-center justify-center text-center px-6 py-20 lg:py-24 z-10 {{ $index === 0 ? 'opacity-100' : 'opacity-0 pointer-events-none' }}" data-index="{{ $index }}">
                    <!-- Background Image (Dynamic) -->
                    <div class="absolute inset-0 bg-cover bg-center opacity-40 mix-blend-luminosity pointer-events-none -z-10" style="background-image: url('{{ $item->featured_image }}')"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/80 to-transparent pointer-events-none -z-10"></div>
                    
                    <!-- Content -->
                    <div class="relative z-20 flex flex-col items-center max-w-4xl mx-auto w-full">
                        <!-- Category -->
                        @php
                            $catColor = $item->category->slug === 'incident' ? 'red' : ($item->category->slug === 'maintenance' ? 'yellow' : 'emerald');
                        @endphp
                        <div class="inline-flex items-center gap-2 bg-{{ $catColor }}-500/10 border border-{{ $catColor }}-500/20 text-{{ $catColor }}-400 px-4 py-1.5 rounded-full font-label-md text-sm mb-8 shadow-sm backdrop-blur-sm">
                            <span class="w-2.5 h-2.5 rounded-full bg-{{ $catColor }}-500 {{ $catColor === 'emerald' ? 'animate-pulse' : '' }}"></span>
                            {{ $item->category->slug === 'home-carousel' ? 'FEATURED' : strtoupper($item->category->name) }}
                        </div>
                        
                        <!-- Headline -->
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white tracking-tight mb-6 leading-tight drop-shadow-md line-clamp-2">
                            {{ $item->title }}
                        </h1>
                        
                        <!-- Subtext -->
                        <p class="text-lg md:text-xl text-slate-300 mb-10 max-w-2xl font-body-lg drop-shadow line-clamp-2">
                            {{ Str::limit(strip_tags($item->content), 150) }}
                        </p>
                        
                        <!-- CTA -->
                        <a href="{{ route('articles.show', $item) }}" class="bg-primary-container text-on-primary px-8 py-4 rounded-lg border border-transparent hover:bg-primary transition-all flex items-center gap-2 shadow-technical hover:shadow-lg hover:-translate-y-0.5">
                            <span class="font-bold">Read Full Details</span>
                        </a>
                    </div>
                </div>
            @empty
                <!-- Fallback Static Slide -->
                <div class="carousel-slide absolute inset-0 w-full h-full opacity-100 flex flex-col items-center justify-center text-center px-6 py-20 lg:py-24 z-10">
                    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1558494949-ef010cbdcc31?q=80&w=2000&auto=format&fit=crop')] bg-cover bg-center opacity-40 mix-blend-luminosity pointer-events-none -z-10"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/80 to-transparent pointer-events-none -z-10"></div>
                    
                    <div class="relative z-20 flex flex-col items-center max-w-4xl mx-auto w-full">
                        <div class="inline-flex items-center gap-2 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-4 py-1.5 rounded-full font-label-md text-sm mb-8 shadow-sm backdrop-blur-sm">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            Current Network Status: Operational
                        </div>
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white tracking-tight mb-6 leading-tight drop-shadow-md">
                            {{ $page->title ?? 'GMEDIA Network Operations Center' }}
                        </h1>
                        <p class="text-lg md:text-xl text-slate-300 mb-10 max-w-2xl font-body-lg drop-shadow">
                            {{ $page->content ?? 'Delivering 24/7 monitoring, incident management, and infrastructure resilience.' }}
                        </p>
                        <button class="bg-primary-container text-on-primary px-8 py-4 rounded-lg border border-transparent hover:bg-primary transition-all flex items-center gap-2 shadow-technical">
                            <span class="font-bold">Welcome</span>
                        </button>
                    </div>
                </div>
            @endforelse
        </div>
        
        <!-- Side Arrows -->
        @if(count($carouselItems) > 1)
        <button onclick="prevSlide()" aria-label="Previous slide" class="absolute left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur border border-white/20 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-technical">
            <span class="material-symbols-outlined">chevron_left</span>
        </button>
        <button onclick="nextSlide()" aria-label="Next slide" class="absolute right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur border border-white/20 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-technical">
            <span class="material-symbols-outlined">chevron_right</span>
        </button>
        
        <!-- Navigation Dots -->
        <div class="absolute bottom-6 left-0 right-0 flex justify-center gap-2 z-30" id="carousel-dots">
            @foreach($carouselItems as $index => $item)
                <button onclick="goToSlide({{ $index }})" aria-label="Slide {{ $index + 1 }}" class="carousel-dot h-1.5 rounded-full transition-all duration-300 {{ $index === 0 ? 'w-8 bg-primary' : 'w-2 bg-white/30 hover:bg-white/50' }}"></button>
            @endforeach
        </div>
        @endif
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

@if(count($carouselItems) > 1)
<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.carousel-dot');
    const totalSlides = slides.length;
    let autoPlayInterval;

    function updateCarousel() {
        slides.forEach((slide, index) => {
            if (index === currentSlide) {
                slide.classList.remove('opacity-0', 'pointer-events-none');
                slide.classList.add('opacity-100');
            } else {
                slide.classList.add('opacity-0', 'pointer-events-none');
                slide.classList.remove('opacity-100');
            }
        });
        
        dots.forEach((dot, index) => {
            if (index === currentSlide) {
                dot.classList.remove('w-2', 'bg-white/30');
                dot.classList.add('w-8', 'bg-primary');
            } else {
                dot.classList.remove('w-8', 'bg-primary');
                dot.classList.add('w-2', 'bg-white/30');
            }
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateCarousel();
        resetAutoPlay();
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateCarousel();
        resetAutoPlay();
    }

    function goToSlide(index) {
        currentSlide = index;
        updateCarousel();
        resetAutoPlay();
    }

    function startAutoPlay() {
        autoPlayInterval = setInterval(nextSlide, 5000);
    }

    function resetAutoPlay() {
        clearInterval(autoPlayInterval);
        startAutoPlay();
    }

    // Start auto-play on load
    startAutoPlay();
</script>
@endif
@endsection