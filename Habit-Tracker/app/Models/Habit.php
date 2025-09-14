<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Habit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'description', 'frequency',
        'days_of_week', 'reminder_time', 'color', 'is_active',
    ];

    protected $casts = [
        'days_of_week' => 'array',
        'is_active' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
