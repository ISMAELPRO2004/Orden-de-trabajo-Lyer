<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoOrden extends Model
{
    use HasFactory;

    protected $table = 'estado_orden';
    protected $primaryKey = 'id_estado_orden';

    protected $fillable = [
        'estado'
    ];

    public function ordenes()
    {
        return $this->hasMany(OrdenTrabajo::class, 'id_estado_orden');
    }
}
