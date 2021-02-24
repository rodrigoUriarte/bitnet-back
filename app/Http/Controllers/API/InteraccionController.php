<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Interaccion as ResourcesInteraccion;
use App\Http\Resources\InteraccionCollection;
use App\Models\Interaccion;
use App\Models\Respuesta;
use Illuminate\Http\Request;

class InteraccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new InteraccionCollection(Interaccion::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Interaccion::updateOrInsert(
            ["respuesta_id" => $request->respuesta_id, "user_id" => $request->user_id],
            ["like" => $request->like]
        );
        $interaccion = Interaccion::where('respuesta_id', $request->respuesta_id)
            ->where('user_id', $request->respuesta_id)
            ->first();

        return (new ResourcesInteraccion($interaccion))
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
        return new ResourcesInteraccion(Interaccion::findOrFail($id));
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

        Interaccion::updateOrInsert(
            ["respuesta_id" => $request->respuesta_id, "user_id" => $request->user_id],
            ["like" => $request->like]
        );
        $interaccion = Interaccion::where('respuesta_id', $request->respuesta_id)
            ->where('user_id', $request->respuesta_id)
            ->first();

        return (new ResourcesInteraccion($interaccion))
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
        $interaccion = Interaccion::findOrFail($id);
        $interaccion->delete();

        return response()->json(null, 204);
    }
}
