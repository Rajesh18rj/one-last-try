<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        'customer_id','answers','overall_score', 'topic_scores', 'overall_level',
        'severity_level','status','taken_at'
    ];

    protected $casts = [
        'answers' => 'array',
        'topic_scores' => 'array',
        'taken_at' => 'datetime',
    ];

    public function customer() {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function therapist() {
        return $this->belongsTo(User::class, 'therapist_id');
    }
}
