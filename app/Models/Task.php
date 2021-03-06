<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'checklist_id',
        'name',
        'description',
        'position',
        'user_id',
        'task_id',
        'completed_at',
//        'added_to_my_day_at',
//        'is_important',
//        'due_date',
//        'note',
//        'reminder_at',
    ];
}
