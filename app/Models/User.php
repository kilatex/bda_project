<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role',
        'surname',
        'img',
        'dni',
        'periodo_id',
        'postgrado_id',
        'pregrado_id',
        'periodoGrado_id',
        'promocion_id',
        'email',
        'password',

    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function periodo(){
        return $this->belongsTo('App\Models\Periodo','periodo_id');
    }

    public function periodo_grado(){
        return $this->belongsTo('App\Models\PeriodoGrado','periodoGrado_id');
    }
    public function postgrado(){
        return $this->belongsTo('App\Models\Postgrado','postgrado_id');
    }

    public function pregrado(){
        return $this->belongsTo('App\Models\Pregrado','pregrado_id');
    }

    public function promocion(){
        return $this->belongsTo('App\Models\Promocion','promocion_id');
    }

}
