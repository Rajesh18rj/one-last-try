<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('therapist_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('professional_title')->nullable();
            $table->text('qualifications')->nullable();
            $table->json('qualification_documents')->nullable();
            $table->integer('experience_years')->nullable();
            $table->text('bio')->nullable();
            $table->json('specializations')->nullable();
            $table->json('languages')->nullable();
            $table->enum('session_mode', ['online', 'in_person', 'both'])->nullable();
            $table->decimal('session_fee', 10, 2)->nullable();
            $table->json('available_days')->nullable();
            $table->json('available_time_slots')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->default('India');
            $table->text('address')->nullable();
            $table->string('pin_code', 10)->nullable();
            $table->string('profile_image')->nullable();
            $table->enum('plan_type', ['trial', 'paid'])->default('trial');
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('approval_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('therapist_profiles');
    }
};
