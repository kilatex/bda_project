<?php

namespace App\Models\Sirecob;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;
    protected $fillable = [
    'nombre',
'apellido',
'telefono',
'ci',
'correo',
'cargo',
'institucion',];
}
