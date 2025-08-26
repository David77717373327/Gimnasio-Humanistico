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
    Schema::create('horarios', function (Blueprint $table) {
        $table->id();

        // Llaves foráneas
        $table->foreignId('grado_id')->constrained()->onDelete('cascade');
        $table->foreignId('asignatura_id')->constrained()->onDelete('cascade');
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Profesor

        // Datos del horario
        $table->string('dia'); 
        $table->time('hora_inicio');
        $table->time('hora_fin');

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
