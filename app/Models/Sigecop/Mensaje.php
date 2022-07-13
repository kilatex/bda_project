<?php

namespace App\Models\Sigecop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;
    
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'documento_id',
        'usuario_id',
        'message'
     ];

     public function documento(){
        return $this->belongsTo('App\Models\Sigecop\Documento','documento_id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','usuario_id');
    }
}
