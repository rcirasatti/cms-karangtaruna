<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Admin CMS Karang Taruna</title>
    @php
        $adminFaviconPath = $profile->logo_path ? (preg_match('/^https?:\/\//i', $profile->logo_path) ? $profile->logo_path : asset('storage/' . $profile->logo_path)) : asset('favicon.ico');
    @endphp
    <link rel="icon" type="image/png" href="{{ htmlspecialchars($adminFaviconPath, ENT_QUOTES, 'UTF-8') }}" />
    <link rel="alternate icon" href="{{ asset('favicon.ico') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Prevent sidebar flash before Alpine.js loads */
        [x-cloak] { display: none !important; }
        
        /* Initial sidebar state for tablet landscape and mobile */
        @media (max-width: 1023px) {
            aside {
                transform: translateX(-100%);
            }
        }
    </style>
    @stack('styles')
</head>

<body class="bg-color_bg font-poppins" x-data="{
    sidebarOpen: false,
    init() {
        // Set initial state based on screen size
        this.updateSidebarState();
        
        // Listen for window resize
        window.addEventListener('resize', () => {
            this.updateSidebarState();
        });
    },
    updateSidebarState() {
        // Sidebar only opens automatically on desktop (≥1024px)
        // Tablet landscape (768-1023px) and mobile (<768px): sidebar closed by default
        if (window.innerWidth >= 1024) {
            this.sidebarOpen = true;
        } else {
            this.sidebarOpen = false;
        }
    }
}" x-init="updateSidebarState()">
    <!-- Global Alert Component -->
    @include('admin.layouts.alert')

    <div class="flex flex-col h-screen overflow-hidden">
        <!-- Top Navigation (Full Width) -->
        @include('admin.layouts.navbar')

        <div class="flex flex-1 overflow-hidden">
            <!-- Sidebar (Toggleable) -->
            @include('admin.layouts.sidebar')

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto bg-color_bg p-6">
                @if (session('success'))
                    <script>
                        document.addEventListener('alpine:init', () => {
                            setTimeout(() => {
                                window.dispatchEvent(new CustomEvent('alert', {
                                    detail: { type: 'success', message: '{{ session('success') }}', duration: 5000 }
                                }));
                            }, 100);
                        });
                    </script>
                @endif

                @if (session('error'))
                    <script>
                        document.addEventListener('alpine:init', () => {
                            setTimeout(() => {
                                window.dispatchEvent(new CustomEvent('alert', {
                                    detail: { type: 'error', message: '{{ session('error') }}', duration: 5000 }
                                }));
                            }, 100);
                        });
                    </script>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
    @vite(['resources/js/form-validation.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>