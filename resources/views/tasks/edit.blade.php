<x-layout>
    <x-slot:title>
        Edit task
    </x-slot:title>

    <div class="mx-auto max-w-2xl">
        <h1 class="text-3xl font-bold mt-8">Edit task</h1>

        <div class="mt-8 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <form method="POST" action="/tasks/{{ $task->id }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700" for="title">Title</label>
                        <input id="title" type="text" name="title"
                            value="{{ old('title', $task->title) }}"
                            class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 @error('title') border-red-500 @enderror" required
                            maxlength="255" />
                        @error('title')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700" for="description">Description</label>
                        <textarea id="description" name="description" rows="4"
                            class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm resize-none focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 @error('description') border-red-500 @enderror"
                            maxlength="5000">{{ old('description', $task->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-700" for="status">Status</label>
                            <select id="status" name="status"
                                class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 @error('status') border-red-500 @enderror">
                                <option value="pending" @selected(old('status', $task->status) === 'pending')>Pending</option>
                                <option value="in_progress" @selected(old('status', $task->status) === 'in_progress')>In progress</option>
                                <option value="completed" @selected(old('status', $task->status) === 'completed')>Completed</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-700" for="due_date">Due date</label>
                            <input id="due_date" type="date" name="due_date"
                                value="{{ old('due_date', optional($task->due_date)->format('Y-m-d')) }}"
                                class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 @error('due_date') border-red-500 @enderror" />
                            @error('due_date')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-between">
                        <a href="/" class="rounded-md border border-slate-300 px-3 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-100">
                            Cancel
                        </a>
                        <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                            Save changes
                        </button>
                    </div>
                </form>
        </div>
    </div>
</x-layout>
