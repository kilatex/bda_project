<?php

namespace App\Models\Recopasec;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consejo_comunale extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'nombre',
        'comunidad_id',

    ];
    public function comunidad(){
        return $this->belongsTo('App\Models\Recopasec\Comunidade','comunidad_id');
    }
}
