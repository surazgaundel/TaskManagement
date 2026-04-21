@props(['task'])

@php
    $statusClass = match ($task->status) {
        'completed' => 'bg-emerald-100 text-emerald-700',
        'in_progress' => 'bg-amber-100 text-amber-700',
        default => 'bg-slate-100 text-slate-700',
    };
    $statusLabel = match ($task->status) {
        'completed' => 'Completed',
        'in_progress' => 'In progress',
        default => 'Pending',
    };
@endphp

<div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
        <div class="flex space-x-3">
            <div class="size-10 overflow-hidden rounded-full">
                <img src="https://avatars.laravel.cloud/{{ urlencode($task->user->email) }}?vibe=ocean"
                    alt="{{ $task->user->name }}'s avatar" class="h-full w-full rounded-full object-cover" />
            </div>

            <div class="flex-1 min-w-0">
                <div class="flex items-start justify-between gap-2 flex-wrap">
                    <div>
                        <div class="flex items-center gap-2 flex-wrap">
                            <h2 class="text-lg font-semibold leading-tight">{{ $task->title }}</h2>
                            <span class="rounded-full px-2.5 py-1 text-xs font-medium {{ $statusClass }}">{{ $statusLabel }}</span>
                        </div>
                        <p class="text-sm text-slate-500 mt-1">
                            {{ $task->created_at->diffForHumans() }}
                            @if ($task->updated_at->gt($task->created_at->copy()->addSeconds(2)))
                                <span class="text-slate-400">·</span>
                                <span class="italic">updated {{ $task->updated_at->diffForHumans() }}</span>
                            @endif
                        </p>
                    </div>

                    @if (auth()->check() && auth()->id() === $task->user_id)
                        <div class="shrink-0 space-x-2">
                            <a href="/tasks/{{ $task->id }}/edit" class="inline-flex rounded-md border border-slate-300 px-2.5 py-1 text-xs font-medium text-slate-700 hover:bg-slate-100">
                                Edit
                            </a>
                            <form method="POST" action="/tasks/{{ $task->id }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Delete this task?')"
                                    class="inline-flex rounded-md border border-red-200 px-2.5 py-1 text-xs font-medium text-red-600 hover:bg-red-50">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

                @if ($task->description)
                    <p class="mt-2 whitespace-pre-wrap text-slate-700">{{ $task->description }}</p>
                @endif

                @if ($task->due_date)
                    <p class="mt-2 text-sm text-slate-500">
                        Due {{ $task->due_date->format('M j, Y') }}
                    </p>
                @endif
            </div>
        </div>
</div>
