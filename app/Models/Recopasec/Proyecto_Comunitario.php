<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto_Comunitario extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        
        'codigo',
        'titulo',
        'fecha_inicio',
        'fecha_final',
        'tutor_comunitario_id',
        'tutor_academico_id',

    ];
    public function tutor_comunitario(){
        return $this->belongsTo('App\Models\Recopasec\Tutor_Comunitario','tutor_comunitario_id');
    }
    public function tutor_academico(){
        return $this->belongsTo('App\Models\Recopasec\Tutor_Academico','tutor_academico_id');
    }
}
