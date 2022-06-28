<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'nombre',
        'email',
        'telefono',
        'departamento',
        'direccion_id'

    ];
    public function direccion(){
        return $this->belongsTo('App\Models\Recopasec\Direccione','direccion_id');
    }
}
