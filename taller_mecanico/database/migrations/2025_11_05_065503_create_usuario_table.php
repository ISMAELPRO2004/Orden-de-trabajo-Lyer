<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('usuario', 100);
            $table->string('contrasena', 255); // encriptada
            $table->boolean('activo')->default(true);
            $table->string('nombres_usuario', 100);
            $table->string('apellidos_usuarios', 100);

            // Relación con rol
            $table->unsignedBigInteger('id_rol');
            $table->foreign('id_rol')
                  ->references('id_rol')
                  ->on('rol')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
