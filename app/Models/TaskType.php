<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskType extends Model
{
    protected $table = 'task_type';

    protected $fillable = [
        'type_name',
    ];

    public function tasks()
    {
        return $this->hasMany(Tasks::class, 'task_type_id');
    }
}
