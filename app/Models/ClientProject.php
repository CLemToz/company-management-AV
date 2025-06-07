<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'project_id',
        'status',
        'payment_progress'
    ];

    /**
     * Get the client that owns the project.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}