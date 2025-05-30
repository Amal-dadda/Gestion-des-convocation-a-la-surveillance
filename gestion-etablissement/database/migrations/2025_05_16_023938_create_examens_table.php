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
       Schema::create('examens', function (Blueprint $table) {
    $table->id();
    $table->string('module');
    $table->date('date');
    $table->time('heure');
    $table->integer('duree'); // en minutes par exemple
    $table->string('salle');
    $table->foreignId('filiere_id')->constrained()->onDelete('cascade');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examens');
    }
};
