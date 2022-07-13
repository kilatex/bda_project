<?php

namespace App\Models\Recopasec;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor_comunitario extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'nombres',
        'apellidos',
        'cedula',
        'email',
        'telefono',
        'direccion_id',
        'cargo',

    ];
    public function direccion(){
        return $this->belongsTo('App\Models\Recopasec\Direccione','direccion_id');
    }
}
