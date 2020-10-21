<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackLikesTable extends Migration
{
    public function up(): void
    {
        Schema::create('feedback_likes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('feedback_id');

            $table->unique(['user_id', 'feedback_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback_likes');
    }
}
