<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Foro as ResourcesForo;
use App\Http\Resources\Pregunta as ResourcesPregunta;
use App\Http\Resources\PreguntaCollection;
use App\Models\Foro;
use App\Models\Pregunta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return new ResourcesForo(Foro::with('preguntas.user')->findOrFail($id));
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

        $newPregunta = Pregunta::create($request->all());

        $pregunta = Pregunta::with('user')->findOrFail($newPregunta->id);

        return (new ResourcesPregunta($pregunta))
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
        return new ResourcesPregunta(Pregunta::findOrFail($id));
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

        $pregunta = Pregunta::findOrFail($id);
        $pregunta->update($request->all());

        return (new ResourcesPregunta($pregunta))
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
        $pregunta = Pregunta::findOrFail($id);
        $pregunta->delete();

        return response()->json(null, 204);
    }
}
