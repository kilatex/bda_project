<?php

namespace App\Models\Recopasec;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunidade extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'nombre',
        'parroquia_id',
    ];
    public function parroquia(){
        return $this->belongsTo('App\Models\Recopasec\Parroquia','parroquia_id');
    }
}
