<?php

namespace App\Models\Recopasec;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor_Academico extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'nombres',
        'apellidos',
        'cedula',
        'email',
        'telefono',
        'condicion',
        'especialidad_id',
        'password',

    ];
    public function especialidad(){
        return $this->belongsTo('App\Models\Recopasec\Especialidade','especialidad_id');
    }
}
