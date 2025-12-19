<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('assessments', function (Blueprint $table) {

            // Store topic-wise results
            $table->json('topic_scores')->nullable()
                ->after('answers');

            // Overall qualitative level
            $table->string('overall_level')->nullable()
                ->after('overall_score');

        });
    }

    public function down(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn(['topic_scores', 'overall_level']);
        });
    }
};
