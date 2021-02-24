<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $table = 'respuestas';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
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
}
