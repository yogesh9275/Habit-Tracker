<?php

namespace App\Livewire\Habits;

use Livewire\Component;
use App\Models\Habit;
class Edit extends Component
{
    public $habit;
    public $name, $description, $frequency, $days_of_week, $reminder_time, $color, $is_active;

    public function mount(Habit $habit)
    {
        $this->habit = $habit;
        $this->name = $habit->name;
        $this->description = $habit->description;
        $this->frequency = $habit->frequency;
        $this->days_of_week = $habit->days_of_week ?? [];
        $this->reminder_time = $habit->reminder_time;
        $this->color = $habit->color;
        $this->is_active = $habit->is_active;
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'frequency' => 'required|in:daily,weekly,custom',
        'days_of_week' => 'nullable|array',
        'reminder_time' => 'nullable',
        'color' => 'nullable|string',
        'is_active' => 'boolean',
    ];

    public function update()
    {
        $data = $this->validate();
        $this->habit->update($data);

        session()->flash('success', 'Habit updated!');
        return redirect()->route('habits.index');
    }
    
    public function render()
    {
        return view('livewire.habits.edit');
    }
}
