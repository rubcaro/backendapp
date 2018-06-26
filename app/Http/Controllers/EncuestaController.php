<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\Pregunta;
use App\Alternativa;
use App\Resultado;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $encuesta = new Encuesta();
        $encuesta->nombre = $request->nombre;
        $encuesta->user_id = 1;
        $encuesta->save();

        foreach ($request->preguntas as $pregunta) 
        {
            $nuevaPregunta = new Pregunta();
            $nuevaPregunta->pregunta = $pregunta["pregunta"];
            $nuevaPregunta->encuesta_id = $encuesta->id;
            $nuevaPregunta->save();
            
            foreach ($pregunta["alternativas"] as $alternativa) {
                $nuevaAlternativa = new Alternativa();
                $nuevaAlternativa->alternativa = $alternativa;
                $nuevaAlternativa->pregunta_id = $nuevaPregunta->id;
                $nuevaAlternativa->save();
            }
        }

        return response()->json($encuesta, 200);
    }

    public function storeResult(Request $request) {
        foreach ($request->respuestas as $respuesta) {
            $resultado = new Resultado();
            // dd($respuesta);
            $resultado->pregunta_id = $respuesta["pregunta_id"];
            $resultado->alternativa_id = $respuesta["alternativa"];
            $resultado->encuesta_id = $request->encuesta_id;
            $resultado->save();
        }

        return response()->json(['it works'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $encuesta = Encuesta::where('id', $id)->with('preguntas')->with('preguntas.alternativas')->get();

        return response()->json($encuesta, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
