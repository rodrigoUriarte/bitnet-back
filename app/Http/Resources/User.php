<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'roles' => Rol::collection($this->whenLoaded('roles')),
            'permissions' => Permiso::collection($this->whenLoaded('permissions')),
            'preguntas' => Pregunta::collection($this->whenLoaded('preguntas')),
            'respuestas' => Respuesta::collection($this->whenLoaded('respuestas')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
