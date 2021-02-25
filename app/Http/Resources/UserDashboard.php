<?php

namespace App\Http\Resources;

use App\Models\Pregunta as ModelsPregunta;
use App\Models\Respuesta;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Builder;

class UserDashboard extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'name' => $this->name,

            'email' => $this->email,

            'reputacion' => $this->reputacion(),

            'likes' => $this->cantidadLikes(),

            'dislikes' => $this->cantidadDislikes(),

            'cant_preguntas' => $this->cantidadPreguntas(),

            'cant_respuestas' => $this->cantidadRespuestas(),

            'preguntas' => Pregunta::collection($this->whenLoaded('preguntas')),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
