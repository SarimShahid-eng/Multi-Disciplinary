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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('abstract');
            $table->string('file_path', 255);
            $table->text('keywords')->nullable();
            $table->enum('status', ['submitted', 'under review', 'accepted', 'rejected', 'revision requested'])->default('submitted');
            $table->timestamp('submission_date')->default(now());
            $table->timestamp('revised_date')->nullable();
            $table->timestamp('accepted_date')->nullable();
            $table->unsignedBigInteger('journal_id');
            $table->unsignedBigInteger('corresponding_author_id');
            $table->timestamps();
            $table->foreign('journal_id')->references('id')->on('journals')->onDelete('cascade');
            $table->foreign('corresponding_author_id')->references('id')->on('authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
