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
        Schema::create('editorial_board_invitations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('affiliation', 255);
            $table->string('country', 100);
            $table->string('email', 255)->unique();
            $table->string('orcid_id', 50)->unique()->nullable();
            $table->text('research_interests')->nullable();
            $table->string('linkedin_profile', 255)->nullable();
            $table->enum('preferred_role', ['editor-in-chief', 'assistant editor', 'reviewer only']);
            $table->text('motivation_statement')->nullable();
            $table->string('cv_file_path', 500)->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->timestamp('invitation_date')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editorial_board_invitations');
    }
};
