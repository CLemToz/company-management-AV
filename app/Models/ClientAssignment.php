<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'employee_id',
        'role'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}