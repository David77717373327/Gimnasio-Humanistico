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

            // Llaves foráneas explícitas
            $table->unsignedBigInteger('grado_id');
            $table->unsignedBigInteger('asignatura_id');
            $table->unsignedBigInteger('user_id'); // Profesor

            // Datos del horario
            $table->string('dia'); 
            $table->time('hora_inicio');
            $table->time('hora_fin');

            $table->timestamps();

            // Definición de claves foráneas
            $table->foreign('grado_id')->references('id')->on('grados')->onDelete('cascade');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
