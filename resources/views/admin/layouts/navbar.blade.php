<header class="bg-gradient-to-r from-primary-700 to-primary-800 shadow-lg z-50">
    <div class="flex items-center justify-between px-6 py-4">
        <!-- Left Section: Hamburger Menu + Logo -->
        <div class="flex items-center space-x-4">
            <!-- Hamburger Menu Button -->
            <button @click="toggleSidebar()"
                class="text-white hover:text-accent focus:outline-none transition duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x-show="!sidebarOpen"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x-show="sidebarOpen"
                        d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Logo & Title -->
            <div class="flex items-center space-x-3">
                <div class="bg-white/10 backdrop-blur-sm p-2 rounded-lg">
                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                </div>
                <div class="hidden md:block">
                    <h1 class="text-lg font-bold font-montserrat text-white">CMS Admin Karang Taruna</h1>
                    <p class="text-xs text-primary-200 font-poppins">@yield('page-title', 'Dashboard')</p>
                </div>
            </div>
        </div>

        <!-- Right Section: User Menu -->
        <div class="flex items-center space-x-4">
            <!-- View Website -->
            <a href="{{ route('home') }}" target="_blank"
                class="hidden md:flex items-center space-x-2 text-white hover:text-accent transition duration-200 bg-white/10 backdrop-blur-sm px-3 py-2 rounded-lg"
                title="Lihat Website">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
                <span class="text-sm font-medium">Lihat Website</span>
            </a>

            <!-- User Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center space-x-3 text-white hover:bg-white/10 focus:outline-none transition duration-200 rounded-lg px-3 py-2">
                    <div
                        class="w-9 h-9 bg-gradient-to-r from-accent to-secondary rounded-full flex items-center justify-center text-primary-800 font-bold shadow-lg">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="hidden md:block text-left">
                        <p class="text-sm font-semibold font-poppins">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-primary-200">Administrator</p>
                    </div>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-2xl py-2 z-50 border border-gray-100"
                    style="display: none;">
                    <div class="px-4 py-3 border-b border-gray-100">
                        <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                    <a href="{{ route('admin.user.profile.show') }}"
                        class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-primary-50 transition">
                        <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Profile
                    </a>
                    <hr class="my-2">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex items-center w-full text-left px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>