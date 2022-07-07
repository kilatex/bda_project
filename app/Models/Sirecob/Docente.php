<?php

namespace App\Models\Sirecob;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'user_id',
        'especialidad',
        'telefono_residencial'
    ];

public function user(){
    return $this->belongsTo('App\Models\User','user_id');
}
}