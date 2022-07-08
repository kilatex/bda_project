<?php

namespace App\Models\Sirecob;

use App\Models\Sirecob\Libro;
use App\Models\Sirecob\Docente;
use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prestamo_libros  extends Model
{
    use HasFactory;
    protected $fillable = [
        'libro_id',
        'prestamista_est_id',
        'prestamista_doc_id',
        'fecha_prestamo',
        'fecha_entrega',
        'estado',

    ];
    public function Datos_libros()
    {
        return $this->belongsTo(Libro::class, 'libro_id');
    }
    public function Datos_estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'prestamista_est_id');
    }
    public function Datos_docente()
    {
        return $this->belongsTo(Docente::class, 'prestamista_doc_id');
    }

}
