<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'task_name',
        'task_description',
        'task_type_id',
        'created_by',
        'project_id',
        'task_deadline',
    ];


    public function taskType()
    {
        return $this->belongsTo(TaskType::class, 'task_type_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function project()
    {
        return $this->belongsTo(Projects::class);
    }

}

