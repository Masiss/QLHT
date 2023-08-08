<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('points', function (Blueprint $table) {
            $table->foreignId('child_id')->constrained('children');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->string('daily')->nullable();
            $table->string('weekly')->nullable();
            $table->string('midSem')->nullable();
            $table->string('endSem')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points');
    }
};
