@extends('layouts.app')

@section('title', 'GMEDIA NOC - About')

@section('content')
<main class="flex-grow w-full max-w-[1440px] mx-auto px-6 lg:px-12 py-12">
    <!-- Page Header -->
    <div class="mb-12 border-b border-outline-variant dark:border-slate-800 pb-6">
        <h1 class="font-h1 text-h1 text-on-background dark:text-slate-100">{{ $page->title ?? 'NOC Overview & Capabilities' }}</h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant dark:text-slate-300 mt-2 max-w-3xl">
            {{ $page->content ?? "The core of our infrastructure resilience. Discover how GMEDIA's Network Operation Center maintains absolute uptime through rigorous monitoring, rapid incident response, and strict SLA compliance." }}
        </p>
    </div>
    
    <!-- Two Column Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-gutter lg:gap-12">
        <!-- Left Column: Services Description -->
        <div class="flex flex-col gap-6">
            <!-- Service Card 1 -->
            <div class="bg-surface-container-lowest dark:bg-slate-900 border border-outline-variant dark:border-slate-800 rounded-xl p-6 flex flex-col gap-4">
                <div class="flex items-center gap-3 border-b border-surface-variant dark:border-slate-800 pb-3">
                    <span class="material-symbols-outlined text-primary-container dark:text-blue-400" style="font-variation-settings: 'FILL' 1;">monitoring</span>
                    <h3 class="font-h3 text-h3 text-on-background dark:text-slate-100">24/7 Monitoring</h3>
                </div>
                <p class="font-body-md text-body-md text-on-surface-variant dark:text-slate-300">
                    Continuous surveillance of all critical network nodes, edge devices, and core routing infrastructure. Our automated systems detect latency anomalies and packet loss before they impact end-user experience, providing real-time telemetry to our engineering teams.
                </p>
            </div>
            
            <!-- Service Card 2 -->
            <div class="bg-surface-container-lowest dark:bg-slate-900 border border-outline-variant dark:border-slate-800 rounded-xl p-6 flex flex-col gap-4">
                <div class="flex items-center gap-3 border-b border-surface-variant dark:border-slate-800 pb-3">
                    <span class="material-symbols-outlined text-primary-container dark:text-blue-400" style="font-variation-settings: 'FILL' 1;">warning</span>
                    <h3 class="font-h3 text-h3 text-on-background dark:text-slate-100">Incident Handling</h3>
                </div>
                <p class="font-body-md text-body-md text-on-surface-variant dark:text-slate-300">
                    Structured, protocol-driven response to network events. Our Tier 1 through Tier 3 NOC analysts utilize advanced diagnostics to isolate faults, route traffic through redundant pathways, and coordinate with field technicians for rapid physical layer restoration.
                </p>
            </div>
            
            <!-- Service Card 3 -->
            <div class="bg-surface-container-lowest dark:bg-slate-900 border border-outline-variant dark:border-slate-800 rounded-xl p-6 flex flex-col gap-4">
                <div class="flex items-center gap-3 border-b border-surface-variant dark:border-slate-800 pb-3">
                    <span class="material-symbols-outlined text-primary-container dark:text-blue-400" style="font-variation-settings: 'FILL' 1;">assignment</span>
                    <h3 class="font-h3 text-h3 text-on-background dark:text-slate-100">SLA Management</h3>
                </div>
                <p class="font-body-md text-body-md text-on-surface-variant dark:text-slate-300">
                    Rigorous enforcement of Service Level Agreements. We maintain detailed historical logs of network performance metrics, providing transparent reporting on uptime guarantees, mean time to repair (MTTR), and jitter/latency thresholds for enterprise clients.
                </p>
            </div>
        </div>
        
        <!-- Right Column: Visual / Technical Map Placeholder -->
        <div class="flex flex-col gap-6">
            <!-- Large Image Card -->
            <div class="bg-surface-container-lowest dark:bg-slate-900 border border-outline-variant dark:border-slate-800 rounded-xl overflow-hidden relative h-[400px] lg:h-[500px]">
                <img alt="Network Operation Center Dashboard" class="absolute inset-0 w-full h-full object-cover opacity-90" src="https://lh3.googleusercontent.com/aida-public/AB6AXuArWfQ6CqvkBU-n4b6AKjXHrS5vQBy8O__aB_9EVFkVVD-xuUFjB7X0a3TPlQUhbqHYJMuC8OdJ20WOoj1LXM0SLIQWsWIYK17X_MLaPi-Q16fS_lGYpagpl-ZKI2rT6FL8tpqXq3u3NaeWiZsxwuIdwiAqyLDGn5iXCWuLZmLLHAsgYeyx-V9w-MFuzMYRSbVAQMCdYlQtU9FmVp0L47ODf1iB790Ma2b--u_HKzIeM35_Qz0Disd19KUM8uPe3QRf6HLjJCOdyUM"/>
                
                <!-- Overlay for Technical Feel -->
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/20 to-transparent flex flex-col justify-end p-6">
                    <div class="bg-surface-container-lowest/95 dark:bg-slate-900/95 backdrop-blur border border-outline-variant dark:border-slate-700 rounded-lg p-4 max-w-sm">
                        <div class="flex justify-between items-center mb-2">
                            <span class="font-label-md text-label-md text-on-surface dark:text-slate-100">Global Node Status</span>
                            <div class="flex items-center gap-1 bg-green-500/10 dark:bg-green-500/20 px-2 py-1 rounded-full">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-600 dark:bg-green-400"></span>
                                <span class="font-label-sm text-label-sm text-green-700 dark:text-green-300">OPTIMAL</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div>
                                <div class="font-label-sm text-label-sm text-outline dark:text-slate-400 uppercase mb-1">Active Routes</div>
                                <div class="font-code text-code text-primary dark:text-blue-400 font-medium">84,291</div>
                            </div>
                            <div>
                                <div class="font-label-sm text-label-sm text-outline dark:text-slate-400 uppercase mb-1">Current Load</div>
                                <div class="font-code text-code text-primary dark:text-blue-400 font-medium">32.4 Tbps</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Small Stats Row -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-surface-container-lowest dark:bg-slate-900 border border-outline-variant dark:border-slate-800 rounded-xl p-4 flex items-center justify-between">
                    <span class="font-label-md text-label-md text-on-surface-variant dark:text-slate-300">Core Uptime (YTD)</span>
                    <span class="font-h3 text-h3 text-primary-container dark:text-blue-400">99.999%</span>
                </div>
                <div class="bg-surface-container-lowest dark:bg-slate-900 border border-outline-variant dark:border-slate-800 rounded-xl p-4 flex items-center justify-between">
                    <span class="font-label-md text-label-md text-on-surface-variant dark:text-slate-300">Avg MTTR</span>
                    <span class="font-h3 text-h3 text-primary-container dark:text-blue-400">&lt; 15m</span>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection