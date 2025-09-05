<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
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
