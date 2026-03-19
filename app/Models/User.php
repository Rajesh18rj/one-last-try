<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function therapistProfile()
    {
        return $this->hasOne(TherapistProfile::class);
    }

    // Customer sessions
    public function therapySessions()
    {
        return $this->hasMany(TherapySession::class, 'customer_id');
    }

    // Therapist sessions
    public function assignedSessions()
    {
        return $this->hasMany(TherapySession::class, 'therapist_id');
    }

    public function canTakeAssessment()
    {
        return !in_array($this->role, ['admin','therapist']);
    }

    public function isAdminOrTherapist()
    {
        return in_array($this->role,['admin','therapist']);
    }
}
