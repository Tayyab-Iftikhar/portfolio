<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignedTask extends Model
{
    protected $table = 'assigned_tasks';

    protected $fillable = [
        'task_id',
        'assigned_to_uid',
        'assigned_by_uid',
        'time_taken',
    ];

    public function task()
    {
        return $this->belongsTo(Tasks::class, 'task_id');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to_uid');
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by_uid');
    }
}

