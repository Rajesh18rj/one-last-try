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
        Schema::create('therapy_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('therapist_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('assessment_id')->nullable()->constrained('assessments')->nullOnDelete()->nullable();
            $table->dateTime('scheduled_at')->nullable();
            $table->integer('duration_minutes')->default(60)->nullable();
            $table->decimal('fee', 10, 2)->nullable();
            $table->enum('status', ['booked','pending','completed','cancelled','rescheduled','no_show'])->default('pending');
            $table->string('meeting_link')->nullable();
            $table->text('customer_notes')->nullable();
            $table->text('therapist_notes')->nullable();
            $table->text('feedback')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('therapy_sessions');
    }
};
