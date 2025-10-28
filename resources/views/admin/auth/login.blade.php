<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin CMS Karang Taruna</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-secondary/60 backdrop-blur-lg min-h-screen flex items-center justify-center font-poppins w-full px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg xl:max-w-md">
        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100 z-50">
            <!-- Header -->
            <div class="bg-gradient-to-r from-primary-600 to-primary-700 text-white p-4 sm:p-6 lg:p-8 text-center">
                <div class="mb-3 sm:mb-4">
                    <div class="bg-white/10 backdrop-blur-sm p-3 sm:p-4 rounded-2xl inline-block">
                        <svg class="w-12 h-12 sm:w-14 sm:h-14 lg:w-16 lg:h-16 mx-auto text-accent" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                </div>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold font-montserrat">Admin CMS</h1>
                <p class="text-primary-100 text-xs sm:text-sm mt-1">Karang Taruna</p>
            </div>

            <!-- Form -->
            <div class="p-4 sm:p-6 lg:p-8">
                @if (session('success'))
                    <div class="mb-4 p-3 sm:p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 p-3 sm:p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg text-sm">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.post') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3 sm:mb-4 text-primary-800">
                        <label for="email" class="block text-sm sm:text-base font-semibold mb-1.5 sm:mb-2">
                            Email
                        </label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border-b border-primary-800 rounded-lg sm:rounded-xl focus:outline-none focus:border-b focus:border-primary-500 text-sm sm:text-base transition-colors duration-200"
                            placeholder="admin@example.com" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3 sm:mb-4 text-primary-800">
                        <label for="password" class="block text-sm sm:text-base font-semibold mb-1.5 sm:mb-2">
                            Password
                        </label>
                        <input type="password" name="password" id="password"
                            class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border-b border-primary-800 rounded-lg sm:rounded-xl focus:outline-none focus:border-b focus:border-primary-500 text-sm sm:text-base transition-colors duration-200"
                            placeholder="••••••••" required>
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-4 sm:mb-6 flex items-center">
                        <input type="checkbox" name="remember" id="remember"
                            class="w-4 h-4 sm:w-5 sm:h-5 text-primary-600 border-primary-700 rounded focus:ring-primary-500 focus:ring-2">
                        <label for="remember"
                            class="ml-2 text-xs sm:text-sm text-primary-800 cursor-pointer select-none">
                            Ingat Saya
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold py-2.5 sm:py-3 px-3 sm:px-4 rounded-lg sm:rounded-xl transition duration-200 transform hover:scale-105 shadow-lg shadow-primary-800 text-sm sm:text-base">
                        Login
                    </button>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-3 sm:mt-4 text-primary-800 text-xs sm:text-sm">
            <p>&copy; {{ date('Y') }} Karang Taruna. All rights reserved.</p>
        </div>
    </div>
</body>

</html>