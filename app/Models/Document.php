<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'user_id', 
        'status', 
        'planillas_datos_personales',
        'copia_cedula',
        'constancia_culminacion_servicio_comunitario',
        'acta_evaluacion_pasantias',
        'certificado_pasantias',
        'acta_defensa_trabajo_especial_grado',
        'constancia_practicas_educativas',
        'acta_pasantia_hospitalaria_comunitaria',
        'comunicacion_adicional_casos_concretos',
        'reconocimientos_amonestaciones',
        'titulo_bachiller_fondonegro',
        'copia_titulo_bachiller',
        'copia_notas_certificadas_educacion_media',
        'fotocopia_partida_nacimiento',
        'planilla_rusni',
        'planilla_din',
        'created_at',
        'uptated_at',
    ];

 
    
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    use HasFactory;
}
