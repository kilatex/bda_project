<?php

namespace App\Models\Sigecop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = [
        'expediente_id', 
        'archivo',
        'estado', 
        'created_at',
        'uptated_at',
    ];

    public function expediente(){
        return $this->belongsTo('App\Models\Sigecop\Expediente','expediente_id');
    }

    use HasFactory;
}
