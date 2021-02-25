<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }

    //no se usa, se usa interacciones
    // public function users()
    // {
    //     return $this->belongsToMany(User::class,'interacciones')->using(Interaccion::class)->withPivot('like')->withTimestamps();
    // }

    public function interacciones()
    {
        return $this->hasMany(Interaccion::class);
    }

    public function cantidadLikes()
    {
        $cantidadLikes = Interaccion::where('user_id', $this->id)
            ->where('like', 1)
            ->count();

        if ($cantidadLikes > 0) {
            return $cantidadLikes;
        } else {
            return 0;
        }
    }

    public function cantidadDislikes()
    {
        $cantidadDislikes = Interaccion::where('user_id', $this->id)
        ->where('like', 0)
        ->count();

        if ($cantidadDislikes > 0) {
            return $cantidadDislikes;
        } else {
            return 0;
        }
    }

    public function reputacion()
    {
        $reputacion = $this->cantidadLikes() - $this->cantidadDislikes();
        return $reputacion;
    }

    public function cantidadPreguntas()
    {
        $cantidadPreguntas = Pregunta::where('user_id', $this->id)
        ->count();

        if ($cantidadPreguntas > 0) {
            return $cantidadPreguntas;
        } else {
            return 0;
        }
    }

    public function cantidadRespuestas()
    {
        $cantidadRespuestas = Respuesta::where('user_id', $this->id)
        ->count();

        if ($cantidadRespuestas > 0) {
            return $cantidadRespuestas;
        } else {
            return 0;
        }
    }
}
