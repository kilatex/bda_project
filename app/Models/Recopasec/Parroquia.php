<?php

namespace App\Models\Recopasec;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'municipio_id',
    ];
    public function municipio(){
        return $this->belongsTo('App\Models\Recopasec\Municipio','municipio_id');
    }
}
