<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'model_type', 'model_id', 'action', 'user_id', 'details',
    ];

    protected $casts = [
        'details' => 'array',
    ];
}
