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
        Schema::create('grados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // 1A, 5B, 9A
            $table->foreignId('nivel_id')->constrained('niveles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grados');
    }
};
