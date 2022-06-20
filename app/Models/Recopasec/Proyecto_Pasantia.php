<?php

namespace App\Models\Recopasec;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto_Pasantia extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'codigo',
        'titulo',
        'fecha_inicio',
        'fecha_final',
        'tutor_institucional_id',
        'tutor_academico_id',

    ];
    public function tutor_institucional(){
        return $this->belongsTo('App\Models\Recopasec\Tutor_Institucional','tutor_institucional_id');
    }
    public function tutor_academico(){
        return $this->belongsTo('App\Models\Recopasec\Tutor_Academico','tutor_academico_id');
    }
}
