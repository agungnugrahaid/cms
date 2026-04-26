@extends('layouts.app')

@section('title', ($page->title ?? 'Contact') . ' - GMEDIA NOC')

@section('content')
<main class="flex-grow w-full max-w-[1440px] mx-auto px-6 lg:px-12 py-12">
    <!-- Page Header -->
    <div class="mb-10">
        <h1 class="font-h1 text-h1 text-on-background mb-2">{{ $page->title ?? 'NOC Contact & Support' }}</h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
            {{ $page->content ?? 'Global Network Operations Center. For immediate critical incidents, please use the direct hotline numbers provided below. Standard inquiries will be addressed within standard SLAs.' }}
        </p>
    </div>
    
    <!-- Two Column Layout Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Left Column: Contact Form -->
        <div class="lg:col-span-7">
            <div class="bg-surface-container-lowest border border-outline-variant rounded-[12px] shadow-technical overflow-hidden">
                <div class="border-b border-outline-variant px-6 py-4 bg-surface-container-low flex items-center justify-between">
                    <h2 class="font-h3 text-h3 text-on-background">Submit Support Ticket</h2>
                    <div class="flex items-center gap-2 bg-green-100/50 px-3 py-1 rounded-full border border-green-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-600 block"></span>
                        <span class="font-label-sm text-label-sm text-green-800 uppercase">System Online</span>
                    </div>
                </div>
                <div class="p-6">
                    <form class="space-y-6" action="#" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="font-label-md text-label-md text-on-surface-variant block" for="name">Full Name</label>
                                <input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-3 py-2.5 font-body-md text-body-md text-on-background focus:outline-none focus:border-primary-container focus:ring-2 focus:ring-primary-fixed transition-colors" id="name" name="name" placeholder="e.g. Jane Doe" type="text" required/>
                            </div>
                            <div class="space-y-2">
                                <label class="font-label-md text-label-md text-on-surface-variant block" for="email">Corporate Email</label>
                                <input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-3 py-2.5 font-body-md text-body-md text-on-background focus:outline-none focus:border-primary-container focus:ring-2 focus:ring-primary-fixed transition-colors" id="email" name="email" placeholder="jane.doe@company.com" type="email" required/>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="font-label-md text-label-md text-on-surface-variant block" for="subject">Incident Subject</label>
                            <input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-3 py-2.5 font-body-md text-body-md text-on-background focus:outline-none focus:border-primary-container focus:ring-2 focus:ring-primary-fixed transition-colors" id="subject" name="subject" placeholder="Brief description of the issue" type="text" required/>
                        </div>
                        <div class="space-y-2">
                            <label class="font-label-md text-label-md text-on-surface-variant block" for="message">Detailed Message / Trace Route</label>
                            <textarea class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-3 py-2.5 font-code text-code text-on-background focus:outline-none focus:border-primary-container focus:ring-2 focus:ring-primary-fixed transition-colors" id="message" name="message" placeholder="Provide technical details, IPs, or error logs..." rows="5" required></textarea>
                        </div>
                        <div class="pt-2 flex items-center justify-between">
                            <span class="font-label-sm text-label-sm text-outline uppercase flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px]">lock</span> Secure Transmission
                            </span>
                            <button class="bg-primary-container text-on-primary px-6 py-2.5 rounded-md font-label-md text-label-md hover:bg-primary transition-colors flex items-center gap-2" type="submit">
                                <span class="material-symbols-outlined text-[18px]">send</span> Submit Ticket
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Right Column: Info & Hotlines -->
        <div class="lg:col-span-5 space-y-6">
            <!-- Direct Hotlines Card -->
            <div class="bg-surface-container-lowest border border-outline-variant rounded-[12px] shadow-technical overflow-hidden">
                <div class="border-b border-outline-variant px-6 py-4 bg-surface-container-low">
                    <h2 class="font-h3 text-h3 text-on-background flex items-center gap-2">
                        <span class="material-symbols-outlined text-error" style="font-variation-settings: 'FILL' 1;">emergency</span> Direct Hotlines
                    </h2>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-start gap-4 p-3 rounded-lg hover:bg-surface-container-low transition-colors border border-transparent hover:border-outline-variant">
                        <div class="bg-error-container text-on-error-container p-2 rounded-md flex items-center justify-center">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">call</span>
                        </div>
                        <div>
                            <h3 class="font-label-md text-label-md text-on-background uppercase mb-1">Severity 1 (Outage)</h3>
                            <p class="font-h2 text-h2 text-primary-container">+1 (800) 555-0199</p>
                            <p class="font-label-sm text-label-sm text-outline mt-1">24/7/365 - Requires active circuit ID</p>
                        </div>
                    </div>
                    <div class="h-px bg-outline-variant w-full"></div>
                    <div class="flex items-start gap-4 p-3 rounded-lg hover:bg-surface-container-low transition-colors border border-transparent hover:border-outline-variant">
                        <div class="bg-secondary-container text-on-secondary-container p-2 rounded-md flex items-center justify-center">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">support_agent</span>
                        </div>
                        <div>
                            <h3 class="font-label-md text-label-md text-on-background uppercase mb-1">Standard Support</h3>
                            <p class="font-h3 text-h3 text-on-surface-variant">+1 (800) 555-0100</p>
                            <p class="font-label-sm text-label-sm text-outline mt-1">Mon-Fri, 08:00 - 18:00 UTC</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Physical Address Card -->
            <div class="bg-surface-container-lowest border border-outline-variant rounded-[12px] shadow-technical overflow-hidden">
                <div class="h-32 w-full bg-surface-variant relative overflow-hidden">
                    <img alt="Clean white abstract map with blue network nodes" class="w-full h-full object-cover opacity-50 mix-blend-multiply" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAUUqFfGYfNnX0FewzsylXKNTsP9ApS229MWH-huQQAOShosSCPaBitxTKGM0Afcxv5Ul5MRPvrPl6XyGrnpUdCNXQWTQHPz6vhqx93BZa8RQ2bi__z_4YCO1ENlKZJYK5M-X-jaURmRRCy4XrRn5OSMfy-74UOfbCv4CHDXMgP5e4VvF7NaHKAR009cIpU-Xz7wJoxHT5mvF6dqhJNTxOtUmttuAtgQPWzCMco5euoia5FYIL5qG48uUsJdxIG7WoXd3LlE59UoQ4"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest to-transparent"></div>
                </div>
                <div class="p-6 relative z-10 -mt-8">
                    <div class="bg-surface-container-lowest border border-outline-variant inline-block p-2 rounded-lg shadow-sm mb-4">
                        <span class="material-symbols-outlined text-primary-container text-[24px] block" style="font-variation-settings: 'FILL' 1;">business</span>
                    </div>
                    <h2 class="font-h3 text-h3 text-on-background mb-2">Global NOC Center</h2>
                    <address class="font-body-md text-body-md text-on-surface-variant not-italic space-y-1">
                        100 Data Drive, Suite 500<br/>
                        Tech District<br/>
                        San Jose, CA 95113<br/>
                        United States
                    </address>
                    <div class="mt-4 pt-4 border-t border-outline-variant flex items-center gap-2">
                        <span class="material-symbols-outlined text-outline text-[18px]">mail</span>
                        <a class="font-label-md text-label-md text-primary-container hover:underline" href="mailto:noc@gmedia.net">noc@gmedia.net</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
