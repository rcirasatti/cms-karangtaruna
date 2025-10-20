<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Admin CMS Karang Taruna</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-color_bg font-poppins" x-data="{ sidebarOpen: true }">
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
