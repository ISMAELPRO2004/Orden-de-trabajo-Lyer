<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    use HasFactory;

    protected $table = 'orden_trabajo';
    protected $primaryKey = 'id_orden';

    protected $fillable = [
        'fecha_creacion',
        'numero_orden',
        'subtotal_repuestos',
        'subtotal_servicios',
        'subtotal_terceros',
        'precio_total',
        'kilometraje_entrada',
        'horometraje_entrada',
        'id_estado_orden',
        'id_cliente',
        'id_vehiculo',
        'id_usuario_creador',
        'id_usuario_responsable'
    ];

    // Relaciones
    public function estado()
    {
        return $this->belongsTo(EstadoOrden::class, 'id_estado_orden');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'id_vehiculo');
    }
}
