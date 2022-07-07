<?php

namespace App\Models\Recopasec;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion_proyecto_pasantia extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'estudiante_id',
        'proyecto_pasantia_id',
        'calificacion_tutor_academico',
        'calificacion_tutor_institucional',
        'calificacion_comite_evaluador'

    ];
    public function testudiante(){
        return $this->belongsTo('App\Models\User','estudiante_id');
    }
    public function proyecto_pasantias(){
        return $this->belongsTo('App\Models\Recopasec\Proyecto_pasantia','proyecto_pasantia_id');
    }
}
