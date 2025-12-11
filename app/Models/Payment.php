<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'therapy_session_id','amount','currency','provider',
        'provider_payment_id','provider_order_id','status','paid_at'
    ];

    protected $casts = [
        'paid_at' => 'datetime',
    ];

    public function session() {
        return $this->belongsTo(TherapySession::class, 'therapy_session_id');
    }
}
