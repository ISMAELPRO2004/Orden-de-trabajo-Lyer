<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('registro_auditoria', function (Blueprint $table) {
            $table->id('id_registro');
            $table->dateTime('fecha_hora');
            $table->string('tipo_accion', 100);
            $table->string('tabla_afectada', 100);
            $table->integer('id_registro_afectado');
            $table->text('detalle_cambio')->nullable();
            $table->unsignedBigInteger('id_usuario');
            $table->timestamps();

            $table->foreign('id_usuario')->references('id_usuario')->on('usuario')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registro_auditoria');
    }
};
