<?php

namespace App\Models\Recopasec;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = [
        'rif',
        'nombre',
        'email',
        'telefono',
        'departamento',
        'direccion_id'
    ];
    public function parroquia(){
        return $this->belongsTo('App\Models\Recopasec\Direccione','direccion_id');
    }
}
