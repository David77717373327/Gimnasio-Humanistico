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
        Schema::create('asistencia_detalle', function (Blueprint $table) {
            $table->id();

            $table->foreignId('asistencia_id')->constrained('asistencias')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->enum('estado', ['presente', 'ausente', 'tarde', 'justificado']);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('asistencia_detalle');
    }
};
