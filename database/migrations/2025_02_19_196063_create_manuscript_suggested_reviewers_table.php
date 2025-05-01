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
        Schema::create('manuscript_suggested_reviewers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manuscript_id');
            $table->string('suggested_reviewer_1_firstname', 255);
            $table->string('suggested_reviewer_1_lastname', 255);
            $table->string('suggested_reviewer_1_email', 255);
            $table->string('suggested_reviewer_1_affiliation', 255)->nullable();
            $table->string('suggested_reviewer_2_firstname', 255);
            $table->string('suggested_reviewer_2_lastname', 255);
            $table->string('suggested_reviewer_2_email', 255);
            $table->string('suggested_reviewer_2_affiliation', 255)->nullable();
            $table->string('suggested_reviewer_3_firstname', 255);
            $table->string('suggested_reviewer_3_lastname', 255);
            $table->string('suggested_reviewer_3_email', 255);
            $table->string('suggested_reviewer_3_affiliation', 255)->nullable();
            $table->timestamps();
            $table->foreign('manuscript_id')->references('id')->on('manuscripts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manuscript_suggested_reviewers');
    }
};
