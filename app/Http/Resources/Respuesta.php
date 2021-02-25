<?php

namespace App\Http\Resources;

use App\Models\Respuesta as ModelsRespuesta;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Builder;

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
            'interacciones' => Interaccion::collection($this->whenLoaded('interacciones')),
            'pregunta' => new Pregunta($this->whenLoaded('pregunta')),
            'cant_likes' => ModelsRespuesta::withCount(['interacciones' => function (Builder $query) {
                $query->where('respuesta_id', $this->id)
                ->where('like',1);
            }])->findOrFail($this->id)->interacciones_count,
            'cant_dislikes' => ModelsRespuesta::withCount(['interacciones' => function (Builder $query) {
                $query->where('respuesta_id', $this->id)
                ->where('like',2);
            }])->findOrFail($this->id)->interacciones_count,
            'created_at' => Carbon::parse($this->created_at)->toDateTimeString(),
            'updated_at' => Carbon::parse($this->updated_at)->toDateTimeString(),
        ];
    }
}
