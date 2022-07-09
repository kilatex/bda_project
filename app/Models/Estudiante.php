<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'usuario_id',
        'carrera_id',
        'acceso'
     ];

     public function user(){
        return $this->belongsTo('App\Models\User','usuario_id');
    }

    public function carrera(){
        return $this->belongsTo('App\Models\Carrera','carrera_id');
    }

}