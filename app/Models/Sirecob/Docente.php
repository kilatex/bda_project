<?php

namespace App\Models\Sirecob;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'ci',
        'telefono',
        'correo',
        'especialidad',
        'telefono_residencial'
    ];
}
