<?php

namespace App\Models\Recopasec;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor_Comunitario extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'nombres',
        'apellidos',
        'cedula',
        'email',
        'telefono',
        'direccion_id',
        'cargo_id',

    ];
    public function direccion(){
        return $this->belongsTo('App\Models\Recopasec\Direccione','direccion_id');
    }
    public function cargo(){
        return $this->belongsTo('App\Models\Recopasec\Cargo','cargo_id');
    }
}
