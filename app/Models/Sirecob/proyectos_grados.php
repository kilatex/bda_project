<?php

namespace App\Models\Sirecob;

use App\Models\DatosProyecto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estudiante;
class proyectos_grados extends Model
{
    use HasFactory;
    const CREATED_AT = null;
    const UPDATED_AT = null;
    public $timestamps = false;
    protected $fillable = [

        'titulo',
        'autor_id',
        'fecha_presentacion',
        'datos_proyectos_id',
        'Tipo_proyecto',

    ];
    public function d_proyecto()
    {
        return $this->belongsTo(DatosProyecto::class, 'id_datos_proyecto');
    }
    public function autor()
    {
        return $this->belongsTo(Estudiante::class, 'autor_id');
    }
}
