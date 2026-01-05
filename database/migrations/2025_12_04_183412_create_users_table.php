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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('document')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->enum('role', ['admin', 'professor', 'student'])->default('student');
            $table->foreignId('grado_id')->nullable()->constrained('grados')->onDelete('set null');
            $table->boolean('is_approved')->default(0);

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes(); // ← AGREGAR ESTO
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
