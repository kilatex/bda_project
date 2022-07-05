<?php

namespace App\Models\Sirecob;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos_libros extends Model
{
    use HasFactory;
    protected $fillable = [
        'categoria',
'cantidad',
'editorial',
'year',
'seccion',
'pais',
'edicion',
'autor'

    ];
    
}
