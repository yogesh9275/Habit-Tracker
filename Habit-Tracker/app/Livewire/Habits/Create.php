<?php

namespace App\Livewire\Habits;

use Livewire\Component;
use App\Models\Habit;

class Create extends Component
{
    public $name, $description, $frequency = 'daily', $days_of_week = [], $reminder_time, $color = '#3b82f6';

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'frequency' => 'required|in:daily,weekly,custom',
        'days_of_week' => 'nullable|array',
        'reminder_time' => 'nullable',
        'color' => 'nullable|string',
    ];

    public function save()
    {
        $data = $this->validate();
        $data['user_id'] = auth()->id();
        Habit::create($data);

        session()->flash('success', 'Habit created successfully!');
        return redirect()->route('habits.index');
    }

    public function render()
    {
        return view('livewire.habits.create');
    }
}
