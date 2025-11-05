<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orden_trabajo', function (Blueprint $table) {
            $table->id('id_orden');
            $table->date('fecha_creacion');
            $table->integer('numero_orden');
            $table->float('subtotal_repuestos')->default(0);
            $table->float('subtotal_servicios')->default(0);
            $table->float('subtotal_terceros')->default(0);
            $table->float('precio_total')->default(0);
            $table->float('kilometraje_entrada')->nullable();
            $table->float('horometraje_entrada')->nullable();

            // Relaciones
            $table->unsignedBigInteger('id_estado_orden');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_vehiculo');
            $table->unsignedBigInteger('id_usuario_creador');
            $table->unsignedBigInteger('id_usuario_responsable');

            $table->foreign('id_estado_orden')->references('id_estado_orden')->on('estado_orden');
            $table->foreign('id_cliente')->references('id_cliente')->on('cliente');
            $table->foreign('id_vehiculo')->references('id_vehiculo')->on('vehiculo');
            $table->foreign('id_usuario_creador')->references('id_usuario')->on('usuario');
            $table->foreign('id_usuario_responsable')->references('id_usuario')->on('usuario');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orden_trabajo');
    }
};
