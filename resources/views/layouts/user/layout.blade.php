<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ClassTracker') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Header -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
                    <!-- Logo and Brand -->
                    <div class="flex items-center gap-8">
                        <a href="{{ route('dashboard') }}" class="flex items-center">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>

                        <!-- Navigation Links -->
                        <nav class="hidden md:flex items-center gap-6">
                            <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-gray-900 {{ request()->routeIs('dashboard') ? 'font-semibold text-green-600' : '' }}">
                                Dashboard
                            </a>
                            <a href="#" class="text-gray-700 hover:text-gray-900">
                                🏛️ Available Rooms
                            </a>
                            <a href="#" class="text-gray-700 hover:text-gray-900">
                                📅 My Schedule
                            </a>
                        </nav>
                    </div>

                    <!-- Account Dropdown -->
                    <div class="flex items-center gap-4">
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center gap-2 px-3 py-2 rounded-md border border-transparent text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                                <div class="py-1">
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Profile
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Log Out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
