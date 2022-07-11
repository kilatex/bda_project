<?php

namespace App\Models\Recopasec;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccione extends Model
{
    use HasFactory;
    protected $fillable = [
        'estado_id',
        'municipio_id',
        'parroquia_id',
        'comunidad_id',
        'consejo_comunale_id',
    ];
    
    public function estado_id(){
        return $this->belongsTo('App\Models\Recopasec\Estado','estado_id');
    }
    public function municipio_id(){
        return $this->belongsTo('App\Models\Recopasec\Municipio','municipio_id');
    }
    public function parroquia_id(){
        return $this->belongsTo('App\Models\Recopasec\Parroquia','parroquia_id');
    }
    public function comunidad_id(){
        return $this->belongsTo('App\Models\Recopasec\Comunidade','comunidad_id');
    }
    public function consejo_comunal(){
        return $this->belongsTo('App\Models\Recopasec\Consejo_comunale','consejo_comunale_id');
    }
}
