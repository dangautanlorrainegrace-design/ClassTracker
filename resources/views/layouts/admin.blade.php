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
        <div class="flex min-h-screen bg-gray-100">
            <!-- Admin Sidebar -->
            <div class="w-64 bg-white shadow-sm">
                <!-- Logo -->
                <div class="p-6 border-b border-gray-200">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Admin Navigation Links -->
                <nav class="mt-6">
                    <div class="px-6 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wide">
                        Admin
                    </div>
                    <a href="{{ route('dashboard') }}" class="block py-3 px-6 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard') ? 'bg-gray-200 border-r-4 border-blue-500' : '' }}">
                        Dashboard
                    </a>
                    <a href="#" class="block py-3 px-6 text-gray-700 hover:bg-gray-100">
                        🏛️ Manage Rooms
                    </a>
                    <a href="#" class="block py-3 px-6 text-gray-700 hover:bg-gray-100">
                        📅 Schedule
                    </a>
                    <a href="#" class="block py-3 px-6 text-gray-700 hover:bg-gray-100">
                        📊 Reports
                    </a>
                </nav>

                <!-- User Info -->
                <div class="absolute bottom-0 w-64 p-6 border-t border-gray-200">
                    <div class="flex items-center">
                        <div class="text-sm text-gray-600">
                            {{ Auth::user()->name }}
                            <span class="block text-xs text-blue-600 font-semibold">Admin</span>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="mt-2">
                        @csrf
                        <button type="submit" class="text-sm text-gray-600 hover:text-gray-800">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col">
                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white shadow-sm">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="flex-1">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
