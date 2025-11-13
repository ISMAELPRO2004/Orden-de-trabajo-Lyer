<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('detalle_trabajo_tercero', function (Blueprint $table) {
            $table->id('id_detalle');
            $table->float('costo_aplicado');
            $table->unsignedBigInteger('id_orden');
            $table->unsignedBigInteger('id_trabajo_tercero');
            $table->timestamps();

            $table->foreign('id_orden')->references('id_orden')->on('orden_trabajo')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_trabajo_tercero')->references('id_trabajo_tercero')->on('trabajos_terceros')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_trabajo_tercero');
    }
};
