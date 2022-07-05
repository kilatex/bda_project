<?php

namespace App\Models\Sirecob;
use App\Models\Libro;
use App\Models\estudante;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pestamolibros extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_Libro',
        'id_Prestamista_est',
        'fecha_prestamo',
'fecha_entrega',
'estado_prestamo',
        
    ];
    public function Datos_libros(){
        return $this->belongsTo(Libro::class,'id_Libro');
    }
    public function Datos_estudiante(){
        return $this->belongsTo(estudante::class,'id_Prestamista_est');
    }
}
