<?php

namespace App\Livewire\Habits;

use Livewire\Component;
use App\Models\Habit;

class Index extends Component
{
    public $habits;

    public function mount()
    {
        $this->habits = Habit::where('user_id', auth()->id())->latest()->get();
    }

    public function deleteHabit($id)
    {
        $habit = Habit::findOrFail($id);

        if ($habit->user_id === auth()->id()) {
            $habit->delete();
            $this->habits = $this->habits->where('id', '!=', $id);
            session()->flash('success', 'Habit deleted!');
        }
    }

    public function render()
    {
        return view('livewire.habits.index');
    }
}
