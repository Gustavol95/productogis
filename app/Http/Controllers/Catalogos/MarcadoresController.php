<?php

namespace App\Http\Controllers\Catalogos;

use App\Models\Marcador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;

class MarcadoresController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo =  Marcador::inRandomOrder()->limit(100)->get();
        return response()->json($todo,200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->only([
            'titulo',
            'snippet',
            'latitud',
            'longitud',
            'draggable',
            'flat',
            'rotation',
            'z_index',
            'icon',
            'type'
        ]);

        $marcador=Marcador::create($data);
        $marcador->update();
        return response()->json($marcador,200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marcador=Marcador::findOrFail($id);
        return response()->json($marcador,200);
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

        $marcador=Marcador::findOrFail($id);

        $data= $request->only([
            'titulo',
            'snippet',
            'latitud',
            'longitud',
            'draggable',
            'flat',
            'rotation',
            'z_index',
            'icon',
            'type'
        ]);


        $marcador->titulo = $data['titulo'];
        $marcador->snippet = $data['snippet'];
        $marcador->latitud  = $data['latitud'];
        $marcador->longitud = $data['longitud'];
        $marcador->draggable = $data['draggable'];
        $marcador->flat = $data['flat'];
        $marcador->rotation = $data['rotation'];
        $marcador->z_index = $data['z_index'];
        $marcador->icon = $data['icon'];
        $marcador->type = $data['type'];
        $marcador->update();

        return response()->json($marcador,200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marcador = Marcador::findOrFail($id);
        $marcador = delete();
        return response()->json(['result'=> true],200);
    }
}
