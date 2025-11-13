<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolPermisoSeeder extends Seeder
{
    public function run(): void
    {
        // Roles base
        DB::table('rol')->insert([
            ['nombre_rol' => 'Administrador', 'descripcion' => 'Acceso completo al sistema', 'created_at' => now(), 'updated_at' => now()],
            ['nombre_rol' => 'Responsable', 'descripcion' => 'Gestiona órdenes y reportes', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Permisos base
        DB::table('permiso')->insert([
            ['nombre_permiso' => 'Ver órdenes', 'descripcion' => 'Permite visualizar órdenes de trabajo', 'created_at' => now(), 'updated_at' => now()],
            ['nombre_permiso' => 'Crear órdenes', 'descripcion' => 'Permite registrar nuevas órdenes', 'created_at' => now(), 'updated_at' => now()],
            ['nombre_permiso' => 'Editar órdenes', 'descripcion' => 'Permite modificar órdenes existentes', 'created_at' => now(), 'updated_at' => now()],
            ['nombre_permiso' => 'Eliminar órdenes', 'descripcion' => 'Permite eliminar órdenes', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Relación rol-permiso (Administrador con todos)
        for ($permiso = 1; $permiso <= 4; $permiso++) {
            DB::table('rol_permiso')->insert([
                'id_rol' => 1,
                'id_permiso' => $permiso,
            ]);
        }
    }
}
