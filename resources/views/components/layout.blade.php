<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hire Hub</title>

    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/js/app.js')
</head>

<body class="min-h-screen w-screen overflow-x-hidden bg-gray-50">

    {{-- Alerts --}}
    @if(session('success'))
        <div role="alert" class="fixed top-20 left-1/2 transform -translate-x-1/2 mb-4 rounded-md border-l-4 border-green-400 bg-green-100 p-4 text-green-800 shadow-md z-50">
            <p class="font-bold">Success!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif
    @if (session('error'))
        <div role="alert" class="fixed top-20 left-1/2 transform -translate-x-1/2 mb-4 rounded-md border-l-4 border-red-400 bg-red-100 p-4 text-red-800 shadow-md z-50">
            <p class="font-bold">Error!</p>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    {{-- Navbar --}}
    <nav class="w-full flex justify-between items-center px-6 py-4 bg-white/80 backdrop-blur-md shadow-md fixed top-0 left-0 z-40">
        <ul class="flex space-x-6 text-lg font-medium text-slate-700">
            <li>
                <a href="{{ route('jobs.index') }}" class="text-indigo-700 text-3xl">HireHub</a>
            </li>
        </ul>

        <ul class="flex space-x-6 text-lg font-medium text-slate-700">
            @auth
                <li>
                    <a href="{{ route('my-job-applications.index') }}" class="hover:text-indigo-600 transition-colors">
                        {{ auth()->user()->name ?? 'Anonymous' }} : Applications
                    </a>
                </li>
                <li>
                    <a href="{{ route('my-jobs.index') }}" class="hover:text-indigo-600 transition-colors">My Jobs</a>
                </li>
                <li>
                    <form action="{{ route('auth.destroy') }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:text-red-800 transition-colors">Logout</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('auth.create') }}" class="hover:text-indigo-600 transition-colors">Sign in</a>
                </li>
            @endauth
        </ul>
    </nav>

    {{-- Main content --}}
    <main class="pt-28 px-4 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-white border-t mt-12 py-6 text-center text-slate-600 shadow-inner">
        &copy; 2025 HireHub. All rights reserved.
    </footer>

</body>
</html>

