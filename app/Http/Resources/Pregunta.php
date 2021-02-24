<?php

namespace App\Http\Resources;

use App\Models\Pregunta as ModelsPregunta;
use App\Models\Respuesta as ModelsRespuesta;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Builder;

class Pregunta extends JsonResource
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
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'foro' =>  new Foro($this->whenLoaded('foro')),
            'user' =>   new User($this->whenLoaded('user')),
            'respuestas' =>  Respuesta::collection($this->whenLoaded('respuestas')),
            'cant_respuestas' => ModelsPregunta::withCount(['respuestas' => function (Builder $query) {
                $query->where('pregunta_id', $this->id);
            }])->findOrFail($this->id)->respuestas_count,
            'fecha_ult_resp' => $this->when(ModelsPregunta::withCount(['respuestas' => function (Builder $query) {
                $query->where('pregunta_id', $this->id);
            }])->findOrFail($this->id)->respuestas_count > 0 , function () {
                return Carbon::parse(ModelsRespuesta::where('pregunta_id',$this->id)->latest()->firstOrFail()->created_at)->toDateTimeString();
            }),
            'created_at' => Carbon::parse($this->created_at)->toDateTimeString(),
            'updated_at' => Carbon::parse($this->updated_at)->toDateTimeString(),
        ];
    }
}
