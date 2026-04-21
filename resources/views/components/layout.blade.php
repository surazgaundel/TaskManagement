<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' — Task Management' : 'Task Management' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <meta property="og:image" content={{ asset('images/og.jpeg') }} />
    <meta property="og:title" content="Task Management" />
    <meta property="og:description"
        content="A Laravel demo app for task lists with authentication and authorization." />
    <meta property="og:url" content="{{ url('/') }}" />

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon-96x96.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col bg-slate-100 text-slate-900 font-sans">
    <nav class="border-b border-slate-200 bg-white">
        <div class="mx-auto flex h-16 w-full max-w-6xl items-center justify-between px-4">
            <a href="/" class="text-lg font-semibold tracking-tight text-slate-900 hover:opacity-80 transition-opacity">
                Task Management
            </a>
            <div class="flex items-center gap-3">
                @auth
                    <span class="text-sm text-slate-700">{{ auth()->user()->name }}</span>
                    <form method="POST" action="/logout" class="inline">
                        @csrf
                        <button type="submit" class="rounded-md border border-slate-300 px-3 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-100">Logout</button>
                    </form>
                @else
                    <a href="/login" class="rounded-md border border-slate-300 px-3 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-100">Sign In</a>
                    <a href="/register" class="rounded-md bg-blue-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-700">Sign Up</a>
                @endauth
            </div>
        </div>
    </nav>

    @if (session('success'))
        <div class="pointer-events-none fixed inset-x-0 top-4 z-50 flex justify-center px-4">
            <div class="pointer-events-auto animate-fade-out rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800 shadow-sm">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <main class="flex-1 container mx-auto px-4 py-8">
        {{ $slot }}
    </main>
</body>

</html>
