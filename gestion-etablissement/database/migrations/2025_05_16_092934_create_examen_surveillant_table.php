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
        Schema::create('examen_surveillant', function (Blueprint $table) {
    $table->id();
    $table->foreignId('examen_id')->constrained()->onDelete('cascade');
    $table->foreignId('surveillant_id')->constrained()->onDelete('cascade');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examen_surveillant');
    }
};
