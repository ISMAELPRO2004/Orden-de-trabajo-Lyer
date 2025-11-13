<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoOrdenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('estado_orden')->insert([
            ['estado' => 'En reparación', 'created_at' => now(), 'updated_at' => now()],
            ['estado' => 'Cambio de aceite', 'created_at' => now(), 'updated_at' => now()],
            ['estado' => 'Esperando repuesto', 'created_at' => now(), 'updated_at' => now()],
            ['estado' => 'Terminado', 'created_at' => now(), 'updated_at' => now()],
            ['estado' => 'Cancelado', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
