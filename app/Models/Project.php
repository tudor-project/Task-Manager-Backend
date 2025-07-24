<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'priority',
        'status',
        'user_id',
        'deadline'
    ];

    public function task()
    {
        return $this->hasMany(Task::class);
    }
}
