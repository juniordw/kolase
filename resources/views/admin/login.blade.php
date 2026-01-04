<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | KOLASE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen relative overflow-y-auto">

    {{-- Animated Background --}}
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500">
        {{-- Animated circles --}}
        <div class="absolute top-0 left-0 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute top-1/2 right-0 w-80 h-80 bg-white/10 rounded-full blur-3xl animate-float" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-0 left-1/3 w-72 h-72 bg-white/10 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>

        {{-- Grid pattern overlay --}}
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;0.05&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>

    {{-- Main Content --}}
    <div class="relative z-10 min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">

            {{-- Logo & Brand --}}
            <div class="text-center mb-8 animate-slide-in-down">
                <a href="{{ route('home') }}" class="inline-flex flex-col items-center group">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mb-3 shadow-xl transform group-hover:scale-110 transition-transform duration-300">
                        <span class="text-4xl">🤱</span>
                    </div>
                    <div class="font-display text-4xl font-bold text-white mb-1 drop-shadow-lg">KOLASE</div>
                    <div class="font-script text-lg text-white drop-shadow-md">Konselor Menyusui Sepanjang</div>
                </a>
            </div>

            {{-- Login Card --}}
            <div class="bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl p-8 md:p-10 border border-white/20 animate-slide-in-up">

                {{-- Header --}}
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <h1 class="font-display text-3xl font-bold text-gray-900 mb-2">Admin Panel</h1>
                    <p class="text-gray-600">Masuk untuk mengelola sistem KOLASE</p>
                </div>

                {{-- Error/Success Messages --}}
                @if(session('error'))
                <div class="mb-6 bg-gradient-to-r from-red-50 to-red-100 border-l-4 border-red-500 p-4 rounded-xl animate-shake">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-10 h-10 bg-red-500 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <span class="text-red-700 font-medium">{{ session('error') }}</span>
                    </div>
                </div>
                @endif

                @if(session('success'))
                <div class="mb-6 bg-gradient-to-r from-green-50 to-emerald-100 border-l-4 border-green-500 p-4 rounded-xl">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <span class="text-green-700 font-medium">{{ session('success') }}</span>
                    </div>
                </div>
                @endif

                {{-- Login Form --}}
                <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-6">
                    @csrf

                    {{-- Email --}}
                    <div class="group">
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-2">
                            Email Address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-purple-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autofocus
                                   class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:bg-white focus:ring-4 focus:ring-purple-100 transition-all duration-200 @error('email') border-red-500 @enderror"
                                   placeholder="admin@kolase.com">
                        </div>
                        @error('email')
                        <p class="mt-2 text-xs text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="group">
                        <label for="password" class="block text-sm font-bold text-gray-700 mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-purple-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input type="password"
                                   id="password"
                                   name="password"
                                   required
                                   class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:bg-white focus:ring-4 focus:ring-purple-100 transition-all duration-200 @error('password') border-red-500 @enderror"
                                   placeholder="••••••••">
                        </div>
                        @error('password')
                        <p class="mt-2 text-xs text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Remember Me --}}
                    <div class="flex items-center justify-between">
                        <label class="flex items-center cursor-pointer group">
                            <input type="checkbox"
                                   id="remember"
                                   name="remember"
                                   class="w-5 h-5 rounded border-2 border-gray-300 text-purple-600 focus:ring-purple-500 focus:ring-offset-0 cursor-pointer">
                            <span class="ml-3 text-sm font-medium text-gray-700 group-hover:text-purple-600 transition">
                                Ingat saya
                            </span>
                        </label>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit"
                            class="w-full py-4 bg-rose-600 hover:bg-rose-700 text-white font-bold text-lg rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        Masuk ke Dashboard
                    </button>
                </form>

                {{-- Divider --}}
                <div class="mt-8 pt-6 border-t-2 border-gray-100">
                    <a href="{{ route('home') }}" class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 transition group">
                        <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Website
                    </a>
                </div>
            </div>

            {{-- Footer Info --}}
            <div class="text-center mt-6 text-white/80 text-sm">
                <p class="drop-shadow">&copy; {{ date('Y') }} KOLASE. All rights reserved.</p>
                <p class="mt-1 text-xs text-white/60">Powered by Laravel {{ app()->version() }}</p>
            </div>
        </div>
    </div>

    {{-- Additional Styles --}}
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes slide-in-down {
            0% {
                opacity: 0;
                transform: translateY(-30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slide-in-up {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-slide-in-down {
            animation: slide-in-down 0.6s ease-out;
        }

        .animate-slide-in-up {
            animation: slide-in-up 0.6s ease-out 0.2s both;
        }

        .animate-shake {
            animation: shake 0.5s ease-in-out;
        }
    </style>

</body>
</html>
