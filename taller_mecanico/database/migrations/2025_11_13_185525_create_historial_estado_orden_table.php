<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('historial_estado_orden', function (Blueprint $table) {
            $table->id('id_historial');
            $table->dateTime('fecha_cambio');
            $table->unsignedBigInteger('id_estado_anterior');
            $table->unsignedBigInteger('id_estado_nuevo');
            $table->unsignedBigInteger('id_orden');
            $table->unsignedBigInteger('id_usuario');
            $table->timestamps();

            $table->foreign('id_estado_anterior')->references('id_estado_orden')->on('estado_orden')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_estado_nuevo')->references('id_estado_orden')->on('estado_orden')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_orden')->references('id_orden')->on('orden_trabajo')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_usuario')->references('id_usuario')->on('usuario')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historial_estado_orden');
    }
};
