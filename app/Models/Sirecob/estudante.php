<?php

namespace App\Models\Sirecob;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudante extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'telefono',
        'ci',
        'correo',
        'corte',
        

    ];
}
