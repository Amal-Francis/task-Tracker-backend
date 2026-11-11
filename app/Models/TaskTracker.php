<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskTracker extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'completed'
    ];

    protected $casts = ['completed' => 'boolean'];
}
