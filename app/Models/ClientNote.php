<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'note',
        'interaction_date',
        'added_by'
    ];

    protected $dates = [
        'interaction_date'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}