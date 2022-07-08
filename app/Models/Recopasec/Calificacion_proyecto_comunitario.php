<?php

namespace App\Models\Recopasec;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion_proyecto_comunitario extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'estudiante_id',
        'proyecto_comunitario_id',
        'calificacion_tutor_comunitario_id',
        'calificacion_tutor_academico_id',

    ];
    public function testudiante(){
        return $this->belongsTo('App\Models\User','estudiante_id');
    }
    public function proyecto_comunitario(){
        return $this->belongsTo('App\Models\Recopasec\Proyecto_comunitario','proyecto_comunitario_id');
    }
    
}
