<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente'; // nombre real en tu BD

    protected $primaryKey = 'id_cliente';

    protected $fillable = [
        'nombres',
        'apellidos',
        'celular'
    ];
}
