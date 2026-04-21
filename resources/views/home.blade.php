<x-layout>
    <x-slot:title>
        My tasks
    </x-slot:title>

    <div class="mx-auto max-w-2xl">
        <h1 class="text-3xl font-bold mt-8">My tasks</h1>

        @auth
            <!-- New task -->
            <div class="mt-8 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-base font-semibold">New task</h2>
                <form method="POST" action="/tasks" class="mt-4 space-y-4">
                        @csrf
                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-700" for="title">Title</label>
                            <input id="title" type="text" name="title" value="{{ old('title') }}"
                                class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 @error('title') border-red-500 @enderror" required
                                maxlength="255" />
                            @error('title')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-700" for="description">Description</label>
                            <textarea id="description" name="description" rows="3"
                                class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm resize-none focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 @error('description') border-red-500 @enderror"
                                maxlength="5000">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-700" for="status">Status</label>
                                <select id="status" name="status"
                                    class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 @error('status') border-red-500 @enderror">
                                    <option value="pending" @selected(old('status', 'pending') === 'pending')>Pending</option>
                                    <option value="in_progress" @selected(old('status') === 'in_progress')>In progress</option>
                                    <option value="completed" @selected(old('status') === 'completed')>Completed</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-700" for="due_date">Due date</label>
                                <input id="due_date" type="date" name="due_date" value="{{ old('due_date') }}"
                                    class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 @error('due_date') border-red-500 @enderror" />
                                @error('due_date')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                                Add task
                            </button>
                        </div>
                    </form>
            </div>
        @else
            <div class="mt-8 rounded-md border border-blue-200 bg-blue-50 px-4 py-3 text-sm text-blue-800">
                Sign in to create and manage your tasks.
            </div>
        @endauth

        <div class="space-y-4 mt-8">
            @forelse ($tasks as $task)
                <x-task :task="$task" />
            @empty
                <div class="rounded-xl border border-slate-200 bg-white py-12 text-center shadow-sm">
                    <svg class="mx-auto h-12 w-12 opacity-30" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                    <p class="mt-4 text-slate-500">
                        @auth
                            No tasks yet. Add one above.
                        @else
                            No tasks to show. Sign in to get started.
                        @endauth
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
