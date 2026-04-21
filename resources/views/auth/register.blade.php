<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>

    <div class="flex min-h-[calc(100vh-16rem)] items-center justify-center">
        <div class="w-full max-w-md rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <h1 class="mb-6 mt-1 text-center text-xl font-bold">Create Account</h1>

                    <form method="POST" action="/register" class="space-y-4">
                        @csrf

                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-700">Name</label>
                            <input type="text"
                                name="name"
                                placeholder="Ram"
                                value="{{ old('name') }}"
                                class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 @error('name') border-red-500 @enderror"
                                required>
                        </div>
                        @error('name')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror

                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-700">Email</label>
                            <input type="email"
                                name="email"
                                placeholder="ram@example.com"
                                value="{{ old('email') }}"
                                class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 @error('email') border-red-500 @enderror"
                                required>
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

                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-700">Confirm Password</label>
                            <input type="password"
                                name="password_confirmation"
                                placeholder="••••••••"
                                class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                                required>
                        </div>

                        <button type="submit" class="w-full rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                            Register
                        </button>
                    </form>

                    <div class="my-6 h-px bg-slate-200"></div>
                    <p class="text-center text-sm text-slate-600">
                        Already have an account?
                        <a href="/login" class="font-medium text-blue-600 hover:underline">Sign in</a>
                    </p>
        </div>
    </div>
</x-layout>
