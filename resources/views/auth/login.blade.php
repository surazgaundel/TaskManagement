<x-layout>
    <x-slot:title>
        Sign In
    </x-slot:title>

    <div class="flex min-h-[calc(100vh-16rem)] items-center justify-center">
        <div class="w-full max-w-md rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <h1 class="mb-6 mt-1 text-center text-xl font-bold">Welcome Back</h1>

                    <form method="POST" action="/login" class="space-y-4">
                        @csrf

                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-700">Email</label>
                            <input type="email"
                                name="email"
                                placeholder="ram@example.com"
                                value="{{ old('email') }}"
                                class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 @error('email') border-red-500 @enderror"
                                required
                                autofocus>
                        </div>
                        @error('email')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror

                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-700">Password</label>
                            <input type="password"
                                name="password"
                                placeholder="••••••••"
                                class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 @error('password') border-red-500 @enderror"
                                required>
                        </div>
                        @error('password')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror

                        <label class="flex items-center gap-2 text-sm text-slate-700">
                                <input type="checkbox"
                                    name="remember"
                                    class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                                Remember me
                        </label>

                        <button type="submit" class="w-full rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                            Sign In
                        </button>
                    </form>

                    <div class="my-6 h-px bg-slate-200"></div>
                    <p class="text-center text-sm text-slate-600">
                        Don't have an account?
                        <a href="/register" class="font-medium text-blue-600 hover:underline">Register</a>
                    </p>
        </div>
    </div>
</x-layout>
