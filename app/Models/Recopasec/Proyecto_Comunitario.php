<?php

namespace App\Models\Recopasec;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto_comunitario extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'codigo',
        'titulo',
        'periodo',
        'tutor_comunitario_id',
        'tutor_academico_id',

    ];
    public function tutor_comunitario(){
        return $this->belongsTo('App\Models\Recopasec\Tutor_comunitario','tutor_comunitario_id');
    }
    public function tutor_academico(){
        return $this->belongsTo('App\Models\Recopasec\Tutor_academico','tutor_academico_id');
    }
}
