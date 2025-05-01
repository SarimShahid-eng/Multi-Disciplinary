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
        Schema::create('manuscript_trackers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manuscript_id');
            $table->boolean('step1')->default(false);
            $table->boolean('step2')->default(false);
            $table->boolean('step3')->default(false);
            $table->boolean('step4')->default(false);
            $table->foreign('manuscript_id')->references('id')->on('manuscripts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manuscript_trackers');
    }
};
