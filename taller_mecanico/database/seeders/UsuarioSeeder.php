<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('usuario')->insert([
            [
                'usuario' => 'admin',
                'contrasena' => Hash::make('admin123'),
                'activo' => true,
                'nombres_usuario' => 'Administrador',
                'apellidos_usuarios' => 'General',
                'id_rol' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario' => 'mecanico',
                'contrasena' => Hash::make('mecanico123'),
                'activo' => true,
                'nombres_usuario' => 'Juan',
                'apellidos_usuarios' => 'Pérez',
                'id_rol' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
