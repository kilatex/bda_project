<?php

namespace App\Models\Sirecob;

use App\Models\Sirecob\Datos_libros;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'titulo',
        'datos_libros_id',
        
        

    ];

    public function DLibros(){
        return $this->hasOne('App\Models\Datos_libros');
    }
    public function Datos(){
        return $this->belongsTo(Datos_libros::class,'datos_libros_id');
    }
}
