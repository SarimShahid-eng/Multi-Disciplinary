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
        Schema::create('manuscript_statements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manuscript_id');
            $table->enum('conflict_interest', [0, 1]);
            $table->text('conflict_interest_reason')->comment('if conflict interest true');
            $table->enum('manuscript_version', [0, 1]);
            $table->text('manuscript_version_reason')->comment('if manuscript version true');
            $table->enum('funding', [0, 1]);
            $table->text('funding_reason')->comment('if manuscript version true');
            $table->enum('genAi', [0, 1]);
            $table->text('genAi_reason')->comment('if gen ai true');
            $table->foreign('manuscript_id')->references('id')->on('manuscripts')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manuscript_statements');
    }
};
