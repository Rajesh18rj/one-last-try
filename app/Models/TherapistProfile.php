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
        'profile_image','plan_type','approval_status','approval_notes','slug'
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
//    protected static function boot()
//    {
//        parent::boot();
//
//        static::creating(function ($therapist) {
//
//            // Load user relation
//            $therapist->loadMissing('user');
//
//            // Base slug from name
//            $baseSlug = Str::slug($therapist->user->name);
//
//            $slug = $baseSlug;
//            $counter = 1;
//
//            // Check if slug already exists
//            while (static::where('slug', $slug)->exists()) {
//                $slug = $baseSlug . '-' . $counter;
//                $counter++;
//            }
//
//            $therapist->slug = $slug;
//        });
//    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($therapist) {

            // Fetch user safely
            $user = \App\Models\User::find($therapist->user_id);

            if (!$user) {
                throw new \Exception("User not found. Cannot create slug.");
            }

            // Base slug from user name
            $baseSlug = Str::slug($user->name);

            $slug = $baseSlug;
            $counter = 1;

            // Ensure unique slug
            while (static::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $therapist->slug = $slug;
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }



}
