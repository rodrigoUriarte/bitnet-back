<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Pregunta as ResourcesPregunta;
use App\Http\Resources\Respuesta as ResourcesRespuesta;
use App\Http\Resources\RespuestaCollection;
use App\Models\Interaccion;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RespuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return new ResourcesPregunta(Pregunta::with(['respuestas.user','respuestas.interacciones'])->findOrFail($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$validated = $request->validated();

        $newRespuesta = Respuesta::create($request->all());

        $respuesta = Respuesta::with('user')->findOrFail($newRespuesta->id);
        return (new ResourcesRespuesta($respuesta))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ResourcesRespuesta(Respuesta::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$validated = $request->validated();

        $respuesta = Respuesta::findOrFail($id);
        $respuesta->update($request->all());

        return (new ResourcesRespuesta($respuesta))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $respuesta = Respuesta::findOrFail($id);
        $respuesta->delete();

        return response()->json(null, 204);
    }
}
