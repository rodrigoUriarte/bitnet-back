<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foro extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'foros';
    protected $guarded = ['id'];

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }

}
