<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = true;

    protected $fillable = [
        'usuario',
        'contrasena',
        'activo',
        'nombres_usuario',
        'apellidos_usuarios',
        'id_rol'
    ];

    protected $hidden = [
        'contrasena',
        'remember_token',
    ];

    // Importante: especificar qué campo se usa para la autenticación
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    // Relación con roles
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }
}
