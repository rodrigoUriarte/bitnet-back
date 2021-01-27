<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Respuesta extends JsonResource
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
            'descripcion' => $this->descripcion,
            'user' => new User($this->whenLoaded('user')),
            'users' => User::collection($this->whenLoaded('users')),
            'pregunta' => new Pregunta($this->whenLoaded('pregunta')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
