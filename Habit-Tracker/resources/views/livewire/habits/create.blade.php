<x-layouts.app :title="'Create Habit'">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-xl font-bold mb-4">Create Habit</h1>

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label class="block font-medium">Habit Name</label>
                <input type="text" wire:model="name" class="w-full border rounded p-2">
                @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block font-medium">Description</label>
                <textarea wire:model="description" class="w-full border rounded p-2"></textarea>
            </div>

            <div>
                <label class="block font-medium">Frequency</label>
                <select wire:model="frequency" class="w-full border rounded p-2">
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="custom">Custom</option>
                </select>
            </div>

            <div>
                <label class="block font-medium">Days of Week (for weekly/custom)</label>
                <div class="flex gap-2 flex-wrap">
                    @foreach(['Mon','Tue','Wed','Thu','Fri','Sat','Sun'] as $day)
                        <label class="flex items-center gap-1">
                            <input type="checkbox" wire:model="days_of_week" value="{{ $day }}">
                            {{ $day }}
                        </label>
                    @endforeach
                </div>
            </div>

            <div>
                <label class="block font-medium">Reminder Time</label>
                <input type="time" wire:model="reminder_time" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-medium">Color</label>
                <input type="color" wire:model="color" class="w-16 h-10 border rounded">
            </div>

            <button class="px-4 py-2 bg-blue-600 text-white rounded">Save Habit</button>
        </form>
    </div>
</x-layouts.app>
