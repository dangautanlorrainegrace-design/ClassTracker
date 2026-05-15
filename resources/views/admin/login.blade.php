<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Login - ClassTracker</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="w-full max-w-md bg-white rounded-xl shadow p-6">
        <h1 class="text-xl font-bold text-slate-900 mb-6">Admin Login</h1>

        @if (session('status'))
            <div class="mb-4 text-sm text-green-700">{{ session('status') }}</div>
        @endif
        @if ($errors->any())
            <div class="mb-4 text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                <input id="email" type="email" name="email" required autofocus
                       class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" />
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700" for="password">Password</label>
                <input id="password" type="password" name="password" required
                       class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" />
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700">
                Sign in
            </button>
        </form>

        <p class="mt-4 text-xs text-gray-500">
            Demo admin: <b>classtracker@gmail.co</b> / <b>admin123</b>
        </p>
    </div>
</body>
</html>

