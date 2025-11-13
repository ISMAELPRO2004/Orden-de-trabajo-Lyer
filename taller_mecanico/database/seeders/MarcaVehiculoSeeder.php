<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MarcaVehiculo;

class MarcaVehiculoSeeder extends Seeder
{
    public function run(): void
    {
        $marcas = [
            ['marca' => 'Toyota'],
            ['marca' => 'Nissan'],
            ['marca' => 'Hyundai'],
            ['marca' => 'Kia'],
            ['marca' => 'Chevrolet'],
            ['marca' => 'Ford'],
            ['marca' => 'Volkswagen'],
            ['marca' => 'Mazda'],
            ['marca' => 'Suzuki'],
            ['marca' => 'Honda']
        ];

        foreach ($marcas as $marca) {
            MarcaVehiculo::create($marca);
        }
    }
}
