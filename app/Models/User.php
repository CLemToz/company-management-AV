<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'dob',
        'address',
        'emp_id',
        'role',
        'department',
        'team',
        'manager_id',
        'joining_date',
        'designation',
        'employment_type',
        'status',
        'profile_image',
        'leave_balance',
        'salary',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password',
        'remember_token',
        'salary', // Optional: Hide from regular users
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'joining_date' => 'date',
        'dob' => 'date',
        'leave_balance' => 'integer',
        'salary' => 'decimal:2',
    ];

    /**
     * Relationships
     */

    // Manager of this employee
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    // Employees reporting to this user
    public function teamMembers()
    {
        return $this->hasMany(User::class, 'manager_id');
    }

    // Example: This user’s attendance logs
    public function attendanceLogs()
    {
        // return $this->hasMany(AttendanceController::class); // Replace with your actual Attendance model
    }

    // This user’s task logs
    public function taskLogs()
    {
        // return ; // Replace with your actual TaskLog model
    }
}
