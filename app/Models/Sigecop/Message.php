<?php

namespace App\Models\Sigecop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'document_id',
        'message'
     ];

     public function promocion(){
        return $this->belongsTo('App\Models\Sigecop\Documento','document_id');
    }

}
