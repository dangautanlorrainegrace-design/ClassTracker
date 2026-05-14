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
        Schema::create('laboratories', function (Blueprint $table) {
            $table->id();
            $table->string('lab_number'); // For the room number (e.g., "Lab 101")
            $table->string('lab_name');   // For the specific name (e.g., "Hardware Lab")
            $table->integer('capacity');  // For the number of students the lab holds
            $table->string('status');     // For the availability (e.g., "Available", "Full")
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratories');
    }
};
