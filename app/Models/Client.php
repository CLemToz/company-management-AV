<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'phone', 'website', 'industry',
        'tags', 'address', 'created_by'
    ];

    // Relationships

    public function notes()
    {
        return $this->hasMany(ClientNote::class);
    }

    public function documents()
    {
        return $this->hasMany(ClientDocument::class);
    }

    public function projects()
    {
        return $this->hasMany(ClientProject::class);
    }

    public function assignments()
    {
        return $this->hasMany(ClientAssignment::class);
    }

    // Optional: Get assigned employees directly
    public function employees()
    {
        return $this->belongsToMany(User::class, 'client_assignments', 'client_id', 'employee_id')
                    ->withPivot('role');
    }
}
