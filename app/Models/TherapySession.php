<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TherapySession extends Model
{
    protected $fillable = [
        'customer_id','therapist_id','assessment_id','scheduled_at','duration_minutes',
        'fee','status','meeting_link','customer_notes','therapist_notes','feedback'
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function customer() {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function therapist() {
        return $this->belongsTo(User::class, 'therapist_id');
    }

    public function assessment() {
        return $this->belongsTo(Assessment::class);
    }
}
