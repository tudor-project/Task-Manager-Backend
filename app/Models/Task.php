<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'priority',
        'status',
        'user_id',
        'project_id',
        'deadline'
    ];

    public function project()
    {
       return $this->belongsTo(Project::class);
    }
}
