<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peticiones extends Model
{
    use HasFactory;
    protected $fillable = [
        'Solicitante',
        'Direccion',
        'Numero',
        'Fecha',
        'Estatus',
        'usuario_id',
        'servicio_id'	
    ];

    
}
