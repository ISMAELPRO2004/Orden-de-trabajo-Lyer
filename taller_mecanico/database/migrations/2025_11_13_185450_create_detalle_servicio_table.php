<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('detalle_servicio', function (Blueprint $table) {
            $table->id('id_detalle');
            $table->float('precio_servicio_aplicado');
            $table->unsignedBigInteger('id_orden');
            $table->unsignedBigInteger('id_servicio');
            $table->timestamps();

            $table->foreign('id_orden')->references('id_orden')->on('orden_trabajo')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_servicio')->references('id_servicio')->on('servicio')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_servicio');
    }
};
