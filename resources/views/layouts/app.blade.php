<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'GMEDIA NOC')</title>
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🌐</text></svg>">
    <!-- Google Fonts & Material Symbols -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Tailwind Theme Configuration -->
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "secondary-fixed-dim": "#ffb95a",
                    "inverse-on-surface": "#f3f0f0",
                    "on-error": "#ffffff",
                    "on-secondary-fixed-variant": "#643f00",
                    "on-primary-fixed": "#001b3c",
                    "on-tertiary-fixed-variant": "#004882",
                    "tertiary-fixed-dim": "#a3c9ff",
                    "surface": "#fbf9f8",
                    "tertiary-container": "#005597",
                    "secondary": "#845400",
                    "tertiary-fixed": "#d3e4ff",
                    "on-primary-container": "#a9c9ff",
                    "inverse-primary": "#a7c8ff",
                    "on-secondary-container": "#6a4300",
                    "primary-container": "#02539e",
                    "surface-variant": "#e4e2e1",
                    "on-background": "#1b1c1c",
                    "surface-dim": "#dcd9d9",
                    "secondary-container": "#feaa22",
                    "inverse-surface": "#303030",
                    "surface-tint": "#1c5faa",
                    "primary-fixed-dim": "#a7c8ff",
                    "on-tertiary": "#ffffff",
                    "on-secondary": "#ffffff",
                    "surface-container-lowest": "#ffffff",
                    "on-tertiary-fixed": "#001c38",
                    "on-primary": "#ffffff",
                    "primary": "#003c75",
                    "background": "#fbf9f8",
                    "error-container": "#ffdad6",
                    "outline-variant": "#c2c6d3",
                    "surface-container-high": "#eae7e7",
                    "primary-fixed": "#d5e3ff",
                    "error": "#ba1a1a",
                    "outline": "#727782",
                    "on-secondary-fixed": "#2a1800",
                    "surface-container": "#f0eded",
                    "on-tertiary-container": "#a5caff",
                    "surface-bright": "#fbf9f8",
                    "tertiary": "#003e70",
                    "on-primary-fixed-variant": "#004788",
                    "surface-container-low": "#f6f3f2",
                    "on-surface-variant": "#424751",
                    "on-error-container": "#93000a",
                    "on-surface": "#1b1c1c",
                    "surface-container-highest": "#e4e2e1",
                    "secondary-fixed": "#ffddb6"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "md": "1rem",
                    "xs": "0.25rem",
                    "xl": "2rem",
                    "margin": "1.5rem",
                    "sm": "0.5rem",
                    "lg": "1.5rem",
                    "gutter": "1rem"
            },
            "fontFamily": {
                    "label-md": ["Inter"],
                    "h1": ["Inter"],
                    "label-sm": ["Inter"],
                    "body-md": ["Inter"],
                    "code": ["monospace"],
                    "body-lg": ["Inter"],
                    "h3": ["Inter"],
                    "h2": ["Inter"]
            },
            "fontSize": {
                    "label-md": ["13px", {"lineHeight": "1", "letterSpacing": "0.02em", "fontWeight": "600"}],
                    "h1": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "label-sm": ["11px", {"lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "700"}],
                    "body-md": ["14px", {"lineHeight": "1.5", "letterSpacing": "0", "fontWeight": "400"}],
                    "code": ["13px", {"lineHeight": "1.4", "fontWeight": "400"}],
                    "body-lg": ["16px", {"lineHeight": "1.6", "letterSpacing": "0", "fontWeight": "400"}],
                    "h3": ["20px", {"lineHeight": "1.4", "letterSpacing": "0", "fontWeight": "600"}],
                    "h2": ["24px", {"lineHeight": "1.3", "letterSpacing": "-0.01em", "fontWeight": "600"}]
            }
          }
        }
      }
    </script>
    <script>
        // Init dark mode based on local storage or system preference
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
          document.documentElement.classList.add('dark');
        } else {
          document.documentElement.classList.remove('dark');
        }

        function toggleDarkMode() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }

        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
        }
        .shadow-technical {
            box-shadow: 0px 4px 6px -1px rgba(0, 0, 0, 0.1), 0px 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-background dark:bg-slate-950 text-on-background dark:text-slate-100 min-h-screen flex flex-col font-['Inter'] antialiased">
    
    <!-- TopNavBar (Shared Component) -->
    <header class="bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 shadow-sm sticky top-0 z-50 w-full">
        <div class="flex justify-between items-center h-16 w-full px-6 lg:px-12 max-w-[1440px] mx-auto">
            <!-- Brand -->
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary-container" style="font-variation-settings: 'FILL' 1;">router</span>
                <span class="text-xl font-black tracking-tighter text-blue-900 dark:text-white">GMEDIA</span>
            </div>
            
            <!-- Navigation Links -->
            <nav class="hidden md:flex items-center gap-8 h-full">
                <a class="h-full flex items-center font-['Inter'] antialiased text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-blue-800 dark:hover:text-blue-300 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-200 px-2 {{ request()->is('/') ? 'text-blue-700 dark:text-blue-400 border-b-2 border-blue-700 dark:border-blue-400' : '' }}" href="{{ url('/') }}">Home</a>
                <a class="h-full flex items-center font-['Inter'] antialiased text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-blue-800 dark:hover:text-blue-300 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-200 px-2 {{ request()->is('about') ? 'text-blue-700 dark:text-blue-400 border-b-2 border-blue-700 dark:border-blue-400' : '' }}" href="{{ url('/about') }}">About</a>
                <a class="h-full flex items-center font-['Inter'] antialiased text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-blue-800 dark:hover:text-blue-300 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-200 px-2 {{ request()->is('articles*') ? 'text-blue-700 dark:text-blue-400 border-b-2 border-blue-700 dark:border-blue-400' : '' }}" href="{{ url('/articles') }}">Updates</a>
                <a class="h-full flex items-center font-['Inter'] antialiased text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-blue-800 dark:hover:text-blue-300 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-200 px-2 {{ request()->is('contact') ? 'text-blue-700 dark:text-blue-400 border-b-2 border-blue-700 dark:border-blue-400' : '' }}" href="{{ url('/contact') }}">Contact</a>
            </nav>
            
            <!-- Trailing Action -->
            <div class="flex items-center gap-2 md:gap-4">
                <button onclick="toggleDarkMode()" class="text-slate-600 dark:text-slate-400 hover:text-blue-800 dark:hover:text-blue-300 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-200 p-2 rounded-full flex items-center justify-center">
                    <span class="material-symbols-outlined dark:hidden" style="font-size: 20px;">dark_mode</span>
                    <span class="material-symbols-outlined hidden dark:inline" style="font-size: 20px;">light_mode</span>
                </button>
                <span class="hidden lg:flex font-['Inter'] antialiased text-sm font-medium text-blue-800 dark:text-blue-400 items-center gap-1.5 px-3 py-1.5 rounded-full bg-surface-container-low border border-outline-variant">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Network Status</span>
                </span>
                
                <!-- Hamburger Button -->
                <button onclick="toggleMobileMenu()" class="md:hidden text-slate-600 dark:text-slate-400 hover:text-blue-800 dark:hover:text-blue-300 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-200 p-2 rounded-md flex items-center justify-center">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
        
        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 shadow-lg w-full absolute top-16 left-0 z-40">
            <nav class="flex flex-col p-4 gap-2">
                <a class="flex items-center p-3 font-medium text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-md {{ request()->is('/') ? 'bg-blue-50 dark:bg-slate-800 text-blue-700 dark:text-blue-400' : '' }}" href="{{ url('/') }}">Home</a>
                <a class="flex items-center p-3 font-medium text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-md {{ request()->is('about') ? 'bg-blue-50 dark:bg-slate-800 text-blue-700 dark:text-blue-400' : '' }}" href="{{ url('/about') }}">About</a>
                <a class="flex items-center p-3 font-medium text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-md {{ request()->is('articles*') ? 'bg-blue-50 dark:bg-slate-800 text-blue-700 dark:text-blue-400' : '' }}" href="{{ url('/articles') }}">Updates</a>
                <a class="flex items-center p-3 font-medium text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-md {{ request()->is('contact') ? 'bg-blue-50 dark:bg-slate-800 text-blue-700 dark:text-blue-400' : '' }}" href="{{ url('/contact') }}">Contact</a>
                
                <div class="pt-4 mt-2 border-t border-slate-200 dark:border-slate-800 flex justify-center">
                    <span class="font-['Inter'] antialiased text-sm font-medium text-blue-800 dark:text-blue-400 flex items-center justify-center gap-1.5 px-3 py-2 rounded-md bg-surface-container-low border border-outline-variant w-full">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>Network Status</span>
                    </span>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

    <!-- Footer (Shared Component) -->
    <footer class="bg-slate-50 dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 w-full mt-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 w-full py-12 px-6 lg:px-12 max-w-[1440px] mx-auto">
            <!-- Brand & Copyright -->
            <div class="flex flex-col gap-4">
                <span class="text-lg font-bold text-slate-900 dark:text-slate-100 flex items-center gap-2">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">router</span>
                    GMEDIA
                </span>
                <span class="font-['Inter'] text-xs uppercase tracking-wider text-slate-500 dark:text-slate-500">
                    © {{ date('Y') }} GMEDIA ISP. All rights reserved.
                </span>
            </div>
            
            <!-- Links -->
            <div class="flex flex-col gap-3 md:col-span-2 md:items-end">
                <nav class="flex flex-wrap gap-x-6 gap-y-3 md:justify-end">
                    <a class="font-['Inter'] text-xs uppercase tracking-wider text-slate-500 dark:text-slate-500 hover:text-slate-800 dark:hover:text-slate-200 hover:underline transition-all" href="#">Privacy Policy</a>
                    <a class="font-['Inter'] text-xs uppercase tracking-wider text-slate-500 dark:text-slate-500 hover:text-slate-800 dark:hover:text-slate-200 hover:underline transition-all" href="#">Terms of Service</a>
                    <a class="font-['Inter'] text-xs uppercase tracking-wider text-slate-500 dark:text-slate-500 hover:text-slate-800 dark:hover:text-slate-200 hover:underline transition-all" href="#">NOC Documentation</a>
                    <a class="font-['Inter'] text-xs uppercase tracking-wider text-slate-500 dark:text-slate-500 hover:text-slate-800 dark:hover:text-slate-200 hover:underline transition-all" href="#">24/7 Support</a>
                </nav>
            </div>
        </div>
    </footer>
</body>
</html>
