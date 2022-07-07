<?php

namespace App\Models\Recopasec;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto_pasantia extends Model
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
        return $this->belongsTo('App\Models\Recopasec\Tutor_institucional','tutor_institucional_id');
    }
    public function tutor_academico(){
        return $this->belongsTo('App\Models\Recopasec\Tutor_academico','tutor_academico_id');
    }
}
