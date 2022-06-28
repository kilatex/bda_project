<?php

namespace App\Models\Recopasec;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor_Institucional extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'nombres',
        'apellidos',
        'cedula',
        'email',
        'telefono',
        'empresa_id',
        'especialidad_id',

    ];
    public function especialidad(){
        return $this->belongsTo('App\Models\Recopasec\Especialidade','especialidad_id');
    }
}
