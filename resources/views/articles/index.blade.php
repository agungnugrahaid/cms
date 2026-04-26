@extends('layouts.app')

@section('title', 'GMEDIA NOC Updates')

@section('content')
<main class="flex-grow w-full max-w-[1440px] mx-auto px-6 lg:px-12 py-8 grid grid-cols-12 gap-gutter">
    <!-- Page Header -->
    <div class="col-span-12 mb-6">
        <h1 class="font-h1 text-h1 text-on-surface mb-2">NOC Updates &amp; Advisories</h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant">Real-time tracking of network events, maintenance windows, and global infrastructure news.</p>
    </div>
    
    <!-- Filters (Tab Style) -->
    <div class="col-span-12 md:col-span-3 lg:col-span-2 mb-6 md:mb-0">
        <div class="bg-surface-container-lowest border border-outline-variant rounded-lg p-2 sticky top-24">
            <div class="flex flex-col gap-1">
                <button class="flex items-center justify-between px-3 py-2 bg-primary-container text-on-primary rounded-md font-label-md text-label-md transition-colors w-full text-left">
                    <span>All Updates</span>
                    <span class="bg-primary px-2 py-0.5 rounded-full text-[10px]">24</span>
                </button>
                <button class="flex items-center justify-between px-3 py-2 text-on-surface-variant hover:bg-surface-container hover:text-on-surface rounded-md font-label-md text-label-md transition-colors w-full text-left group">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span>News</span>
                    </div>
                    <span class="bg-surface-container-high px-2 py-0.5 rounded-full text-[10px] group-hover:bg-surface-variant">12</span>
                </button>
                <button class="flex items-center justify-between px-3 py-2 text-on-surface-variant hover:bg-surface-container hover:text-on-surface rounded-md font-label-md text-label-md transition-colors w-full text-left group">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-yellow-500"></span>
                        <span>Maintenance</span>
                    </div>
                    <span class="bg-surface-container-high px-2 py-0.5 rounded-full text-[10px] group-hover:bg-surface-variant">8</span>
                </button>
                <button class="flex items-center justify-between px-3 py-2 text-on-surface-variant hover:bg-surface-container hover:text-on-surface rounded-md font-label-md text-label-md transition-colors w-full text-left group">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-red-500"></span>
                        <span>Incidents</span>
                    </div>
                    <span class="bg-surface-container-high px-2 py-0.5 rounded-full text-[10px] group-hover:bg-surface-variant">4</span>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Feed List -->
    <div class="col-span-12 md:col-span-9 lg:col-span-10 flex flex-col gap-4">
        <!-- Item 1: Incident -->
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-5 hover:border-primary transition-colors group relative overflow-hidden">
            <div class="absolute left-0 top-0 bottom-0 w-1 bg-red-500"></div>
            <div class="flex flex-col md:flex-row gap-4 items-start md:items-center">
                <div class="flex-grow">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-red-50 text-red-700 font-label-sm text-label-sm border border-red-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-600"></span>
                            INCIDENT
                        </span>
                        <span class="font-code text-code text-on-surface-variant">ID-NOC-8492</span>
                        <span class="text-on-surface-variant text-sm flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">schedule</span>
                            Today, 14:30 UTC
                        </span>
                    </div>
                    <h3 class="font-h3 text-h3 text-on-surface mb-1 group-hover:text-primary transition-colors">Core Router Degradation in Frankfurt Node</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2">We are currently investigating intermittent packet loss originating from the core routing cluster in the FRA-1 datacenter. Engineering teams have been dispatched.</p>
                </div>
                <div class="hidden sm:block w-32 h-24 flex-shrink-0 rounded-lg overflow-hidden border border-outline-variant bg-slate-100"><img alt="Infrastructure" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDzWNK2szylhhktDqcSNxzUKUnv5iWfqLS0tkwKA21mxbhtSicZzNCKu4YAen6hgQZDkIOvLo8w-dBCMBYD07cr6xIl2cp698t-XehPuK4rOoLjkkdYdHU8i2tufAmTrTA4N2HYXwud7bxznGs5JqvYWlXOKSwocsHwmCdTdKix35lwND19GRyci-K48yrZROMFKr2SIPYPy3zfnCFm4ED5KNFXzaMdDyNGhgIFDDBKyjvWpqECmMxZewtfpePagxowcJAj6U3TCMU"/></div><div class="flex-shrink-0">
                    <a href="{{ url('/articles/1') }}" class="px-4 py-2 border border-outline-variant text-on-surface rounded-md font-label-md text-label-md hover:bg-surface-container transition-colors flex items-center gap-2">
                        View Details
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Item 2: Maintenance -->
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-5 hover:border-primary transition-colors group relative overflow-hidden">
            <div class="absolute left-0 top-0 bottom-0 w-1 bg-yellow-500"></div>
            <div class="flex flex-col md:flex-row gap-4 items-start md:items-center">
                <div class="flex-grow">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-yellow-50 text-yellow-800 font-label-sm text-label-sm border border-yellow-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-600"></span>
                            MAINTENANCE
                        </span>
                        <span class="font-code text-code text-on-surface-variant">ID-MAINT-102</span>
                        <span class="text-on-surface-variant text-sm flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">schedule</span>
                            Oct 28, 01:00 UTC
                        </span>
                    </div>
                    <h3 class="font-h3 text-h3 text-on-surface mb-1 group-hover:text-primary transition-colors">Scheduled Fiber Splice - NY Metro Area</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2">Planned maintenance for dark fiber integration. Expected downtime is minimal, but routes may shift. This affects regional transit partners connecting through NYC-3.</p>
                </div>
                <div class="hidden sm:block w-32 h-24 flex-shrink-0 rounded-lg overflow-hidden border border-outline-variant bg-slate-100"><img alt="Fiber Splice" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAV02PUv1wZMiMBpSyOI_i5riOkImKoKsZwRqJLrL1leDu7bNInOBWR9dc4mRQqlKnqR8enTXnUwiFDP4L2VUn7-h9dFlnMbvJXULQYu5Urscin7dUhisR8arCz24oiVBHsc1uW-v7FD7-M3J98iJ-xecb3b4mMWYCtkbuIoGULoqZNypI_0xVbi-ar9MqcBi79uRBnuM5Hg-BvfETiPChLBuuBGYW2RNahu2PUKZCxo9HQj2DA0uze1fqW7ZAqnNEzg7tndu75cFc"/></div><div class="flex-shrink-0">
                    <a href="{{ url('/articles/2') }}" class="px-4 py-2 border border-outline-variant text-on-surface rounded-md font-label-md text-label-md hover:bg-surface-container transition-colors flex items-center gap-2">
                        View Details
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Pagination -->
        <div class="flex justify-center mt-6">
            <div class="inline-flex items-center bg-surface-container-lowest border border-outline-variant rounded-md overflow-hidden">
                <button class="px-3 py-2 text-on-surface-variant hover:bg-surface-container border-r border-outline-variant">
                    <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                </button>
                <button class="px-4 py-2 bg-primary-container text-on-primary font-label-md text-label-md">1</button>
                <button class="px-4 py-2 text-on-surface-variant hover:bg-surface-container font-label-md text-label-md">2</button>
                <span class="px-3 py-2 text-on-surface-variant">...</span>
                <button class="px-3 py-2 text-on-surface-variant hover:bg-surface-container border-l border-outline-variant">
                    <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                </button>
            </div>
        </div>
    </div>
</main>
@endsection
