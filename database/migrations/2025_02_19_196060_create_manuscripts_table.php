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
        Schema::create('manuscripts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('journal_id');
            $table->string('manuscriptId', 255)->nullable()->unique();
            $table->string('title', 255);
            $table->text('abstract');
            $table->string('file_path', 255);
            $table->json('keywords')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->timestamp('submission_date')->default(now());
            $table->unsignedBigInteger('article_type_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('article_type_id')->references('id')->on('article_types')->onDelete('cascade');
            $table->foreign('journal_id')->references('id')->on('journals')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manuscripts');
    }
};
