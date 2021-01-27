<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Foro extends JsonResource
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
            'nombre' => $this->nombre,
            'preguntas' => Pregunta::collection($this->whenLoaded('preguntas')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
