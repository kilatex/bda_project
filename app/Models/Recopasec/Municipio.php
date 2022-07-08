<?php

namespace App\Models\Recopasec;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'nombre',
        'estado_id',

    ];
    public function estado(){
        return $this->belongsTo('App\Models\Recopasec\Estado','estado_id');
    }
}
