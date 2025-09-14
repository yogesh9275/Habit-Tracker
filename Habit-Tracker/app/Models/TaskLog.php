<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class TaskLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id', 'completed_at', 'status', 'note',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
