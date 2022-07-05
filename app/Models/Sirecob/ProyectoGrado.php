<?php

namespace App\Models\Sirecob;

use App\Models\DatosProyecto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoGrado extends Model
{
    use HasFactory;
    const CREATED_AT = null;
const UPDATED_AT = null;
    public $timestamps = false;
    protected $fillable = [
        
        'Titulo',
        'id_autor',         
        'fecha_presentacion',
        'id_datos_proyecto',
        'Tipo_proyecto',
        
    ];
    public function proeyecto_Datos(){
        return $this->belongsTo(DatosProyecto::class,'id_datos_proyecto');
    }
}
