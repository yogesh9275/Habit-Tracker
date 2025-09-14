<div class="max-w-full mx-auto space-y-6">

    <!-- Breadcrumbs -->
    <div class="flex items-center space-x-2">
        <x-flux.breadcrumbs.item :href="route('dashboard')" icon="home">Dashboard</x-flux.breadcrumbs.item>
        <x-flux.breadcrumbs.item :href="route('habits.index')" icon="check-circle">Habits</x-flux.breadcrumbs.item>
    </div>

    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">Your Habits</h1>
        <x-flux.spacer/>
        <x-flux.button :href="route('habits.create')" variant="primary">+ New Habit</x-flux.button>
    </div>

    <!-- Flash Message -->
    @if(session('success'))
    <x-flux.alert color="green" dismissible>{{ session('success') }}</x-flux.alert>
    @endif

    <!-- Habit List -->
    <div class="space-y-4">
        @forelse ($habits as $habit)
        <x-flux.card title="{{ $habit->name }}" subtitle="Frequency: {{ ucfirst($habit->frequency) }}">
            <p class="text-sm text-zinc-600 dark:text-zinc-300">{{ $habit->description }}</p>

            <x-slot name="footer">
                <div class="flex gap-2">
                    <x-flux.button :href="route('habits.edit', $habit)" variant="secondary" size="sm">Edit
                    </x-flux.button>
                    <x-flux.button color="red" size="sm" wire:click="deleteHabit({{ $habit->id }})">Delete
                    </x-flux.button>
                </div>
            </x-slot>
        </x-flux.card>
        @empty
        <x-flux.alert color="gray">No habits yet. Start by creating one!</x-flux.alert>
        @endforelse
    </div>
</div>