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
        'id_Tutor_Academico',
        'id_Tutor_Institucional',
        'id_Jurado_examinador',
    ];
    
}
