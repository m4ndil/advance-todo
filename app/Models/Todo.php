<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_title',
        'task_description',
        'task_start_date',
        'task_end_date',
        'priority',
        'is_task_near',
        'is_task_overdue',
    ];
}
