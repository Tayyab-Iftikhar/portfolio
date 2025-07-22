<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'project_name',
        'project_description',
    ];

    public function tasks()
    {
        return $this->hasMany(Tasks::class);
    }
}
