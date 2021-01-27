<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $table = 'preguntas';
    protected $guarded = ['id'];

    public function foro()
    {
        return $this->belongsTo(Foro::class);
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
