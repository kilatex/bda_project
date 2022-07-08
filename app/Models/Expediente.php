<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $fillable = [
        'usuario_id', 
        'estado', 
        'created_at',
        'uptated_at',
        'deleted_at',
    ];

    public function estudiante(){
        return $this->belongsTo('App\Models\Estudiante','estudiante_id');
    }

    use HasFactory;
}
