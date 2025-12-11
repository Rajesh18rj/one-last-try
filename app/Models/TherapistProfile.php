<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TherapistProfile extends Model
{
    protected $fillable = [
        'user_id','gender','professional_title','qualifications','qualification_documents',
        'experience_years','bio','specializations','languages','session_mode','session_fee',
        'available_days','available_time_slots','city','state','country','address','pin_code',
        'profile_image','plan_type','approval_status','approval_notes',
    ];

    protected $casts = [
        'qualification_documents' => 'array',
        'specializations' => 'array',
        'languages' => 'array',
        'available_days' => 'array',
        'available_time_slots' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // This for Slug

}
