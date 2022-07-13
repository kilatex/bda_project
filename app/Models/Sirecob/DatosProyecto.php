<?php

namespace App\Models\Sirecob;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosProyecto extends Model
{
    use HasFactory;
    const CREATED_AT = null;
const UPDATED_AT = null;
    public $timestamps = false;
    protected $fillable = [
        'tutor_institucional_id',
        'tutor_academico_id',
        'jurado_examinador1_id',
        'jurado_examinador2_id',
        'jurado_examinador3_id',
        'jurado_examinador4_id',
        'jurado_examinador5_id',
    ];
    
}
