<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccione extends Model
{
    use HasFactory;
     protected $fillable =[
        'estado',
        'municipio',
        'parroquia', 
        "comunidad", 
        'consejo_comunal' 
     ];
}
