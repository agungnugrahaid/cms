@extends('layouts.app')

@section('title', 'GMEDIA NOC - Article Detail')

@section('content')
<main class="flex-grow w-full max-w-3xl mx-auto px-6 py-12 lg:py-16">
    <!-- Back Navigation -->
    <a class="inline-flex items-center gap-2 text-primary font-label-md text-label-md mb-8 hover:text-primary-container transition-colors" href="{{ url('/articles') }}">
        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
        Back to Updates
    </a>
    
    <!-- Article Header -->
    <header class="mb-10">
        <div class="flex items-center gap-4 mb-4">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-error-container/20 border border-error-container text-error font-label-sm text-label-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-error"></span>
                CRITICAL INCIDENT
            </span>
            <span class="text-outline font-body-md text-body-md flex items-center gap-1">
                <span class="material-symbols-outlined text-[16px]">calendar_today</span>
                Oct 24, 2024
            </span>
            <span class="text-outline font-body-md text-body-md flex items-center gap-1">
                <span class="material-symbols-outlined text-[16px]">schedule</span>
                14:30 UTC
            </span>
        </div>
        
        <h1 class="font-h1 text-h1 text-on-surface mb-6 leading-tight">
            Core Router Degradation in Frankfurt Datacenter FRA-02
        </h1>
        
        <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
            A detailed post-mortem and ongoing mitigation strategy regarding the packet loss experienced across European transit routes originating from the FRA-02 facility.
        </p>
    </header>

    <div class="mb-10 rounded-xl overflow-hidden shadow-sm border border-outline-variant/30">
        <img alt="Datacenter infrastructure" class="w-full h-[400px] object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCqyGoCx6jfnURMccgv7Akj58ntDChzLb0auQT8AADyKSBbVJ-xl7X0O47lCHRbPKShkzvooKc8DBcHwUIkHizAlOu2VtcOmUTfil2u6mKG3gV6t7ZNO_lKy_A7SCCKdJAdHiUsqNw_vOwJ4ZyKr6bN9g-RaQ1AkqExfmwcHsONQ9IWNoiRjwX-8kNIeVd8JzGCQTE0Fiq2733sjEk51IXHRV_M_m2bGLVgP5H2x1V4SIcFB5b0hYnivsZ42siuYzq0uC6gwgC0HLw"/>
    </div>
    
    <!-- Divider -->
    <hr class="border-outline-variant/30 mb-10"/>
    
    <!-- Article Body -->
    <article class="prose prose-slate max-w-none prose-headings:font-h2 prose-headings:text-h2 prose-headings:text-on-surface prose-p:font-body-lg prose-p:text-body-lg prose-p:text-on-surface-variant prose-p:leading-relaxed prose-a:text-primary prose-a:font-medium prose-strong:text-on-surface prose-strong:font-bold prose-ul:font-body-md prose-ul:text-body-md prose-ul:text-on-surface-variant">
        <h2 class="font-h2 text-h2 text-on-surface mb-4 mt-8">Incident Overview</h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-6">
            At approximately 14:15 UTC, automated monitoring systems detected a sudden spike in packet loss (up to 12%) across multiple 100G transit links connected to core router <code>cr01.fra02.gmedia.net</code>. The degradation primarily affected traffic destined for Eastern European peering exchanges.
        </p>
        
        <h2 class="font-h2 text-h2 text-on-surface mb-4 mt-8">Impact</h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-4">
            Customers routing traffic through the Frankfurt exchange may have experienced:
        </p>
        <ul class="list-disc pl-6 mb-6 space-y-2 font-body-md text-body-md text-on-surface-variant">
            <li>Increased latency (averaging +45ms) on affected routes.</li>
            <li>Intermittent BGP session resets with specific downstream peers.</li>
            <li>Suboptimal routing paths as traffic was automatically shifted to secondary transit providers.</li>
        </ul>
        
        <!-- Highlight/Alert Box inside content -->
        <div class="bg-surface-container-low border border-outline-variant rounded-lg p-6 my-8 flex gap-4 items-start">
            <span class="material-symbols-outlined text-secondary mt-1">warning</span>
            <div>
                <h3 class="font-h3 text-h3 text-on-surface mb-2">Current Status: Mitigated</h3>
                <p class="font-body-md text-body-md text-on-surface-variant m-0">
                    Traffic has been successfully re-routed away from the failing line card. Packet loss has returned to baseline levels (0.01%). Hardware replacement is scheduled for the next maintenance window.
                </p>
            </div>
        </div>
        
        <h2 class="font-h2 text-h2 text-on-surface mb-4 mt-8">Root Cause Analysis</h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-6">
            Initial diagnostics point to a hardware failure on line card slot 4 (LC-04) within the chassis. The card began silently dropping packets without triggering internal hardware alarms immediately. Vendor TAC has been engaged to analyze the memory dumps pulled prior to taking the card offline.
        </p>
        
        <h2 class="font-h2 text-h2 text-on-surface mb-4 mt-8">Next Steps</h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-6">
            We are actively working with the hardware vendor to determine why the internal diagnostics failed to isolate the dropping card faster. A full detailed Incident Report (RFO) will be published within 48 hours to the customer portal.
        </p>
    </article>
    
    <!-- Bottom Action -->
    <div class="mt-16 pt-8 border-t border-outline-variant/30 flex justify-center">
        <a class="inline-flex items-center justify-center h-10 px-6 bg-surface-container border border-outline-variant text-on-surface font-label-md text-label-md rounded-lg hover:bg-surface-container-high hover:border-primary transition-all duration-200" href="{{ url('/articles') }}">
            Back to Updates
        </a>
    </div>
</main>
@endsection
