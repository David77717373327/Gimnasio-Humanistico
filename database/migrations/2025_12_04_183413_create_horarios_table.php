<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('grado_id')->constrained('grados')->onDelete('cascade');
            $table->foreignId('asignatura_id')->constrained('asignaturas')->onDelete('cascade');
            $table->foreignId('profesor_id')->constrained('users')->onDelete('cascade');

            $table->enum('dia', ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes']);
            $table->time('hora_inicio');
            $table->time('hora_fin');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('horarios');
    }
};
