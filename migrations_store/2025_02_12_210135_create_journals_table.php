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
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique();
            $table->string('email', 255)->unique();
            $table->string('issn', 50)->unique();
            $table->unsignedBigInteger('editor_in_chief_id')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('editor_in_chief_id')->references('id')->on('authors')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journals');
    }
};
