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
            <!-- Sidebar -->
            <div class="w-64 bg-white shadow-sm border-r border-gray-200">
                <!-- Logo -->
                <div class="p-6 border-b border-gray-200">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <nav class="mt-6">
                    {{-- Dashboard Link --}}
                    <a href="{{ route('dashboard') }}" class="block py-3 px-6 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-500' : '' }}">
                        Dashboard
                    </a>

                    {{-- Labs Inventory (Raffy's Part) --}}
                    <a href="{{ route('labs.index') }}" class="block py-3 px-6 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('labs.index') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-500' : '' }}">
                        Labs
                    </a>

                    {{-- Schedules (Gina's Part) --}}
                    <a href="{{ route('labs.schedule') }}" class="block py-3 px-6 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('labs.schedule') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-500' : '' }}">
                        Schedules
                    </a>

                    {{-- Reports (Arlene's Part) --}}
                    <a href="{{ route('labs.report') }}" class="block py-3 px-6 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('labs.report') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-500' : '' }}">
                        Reports
                    </a>
                </nav>

                <!-- User Info -->
                <div class="absolute bottom-0 w-64 p-6 border-t border-gray-200">
                    <div class="flex items-center">
                        <div class="text-sm font-medium text-gray-800">
                            {{ Auth::user()->name }}
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="mt-2">
                        @csrf
                        <button type="submit" class="text-sm text-red-600 hover:text-red-800 font-semibold">
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
                    @yield('content')  {{-- Change {{ $slot }} to this --}}
                    </main>
            </div>
        </div>
    </body>
</html>