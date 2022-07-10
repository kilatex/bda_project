<?php

namespace App\Models\Recopasec;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccione extends Model
{
    use HasFactory;
    protected $fillable = [
        'parroquia_id',
        'consejo_comunale_id',
        'estudiante_id',
    ];
    public function parroquia(){
        return $this->belongsTo('App\Models\Recopasec\Parroquia','parroquia_id');
    }public function consejo_comunal(){
        return $this->belongsTo('App\Models\Recopasec\Consejo_comunale','consejo_comunale_id');
    }public function estudiante(){
        return $this->belongsTo('App\Models\Estudiante','estudiante_id');
    }
}
