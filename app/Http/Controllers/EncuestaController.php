<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\Pregunta;
use App\Alternativa;
use App\Resultado;
use Illuminate\Http\Request;

/**
 * Conntrolador que maneja las acciones relacionadas con las encuestas
 */
class EncuestaController extends Controller
{

    /**
     * Guarda una nueva encuesta, junto con sus preguntas y alternativas
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
     * Devuelve la encuesta según el id dado, junto con sus preguntas y alternativas
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $encuesta = Encuesta::where('id', $id)->with('preguntas')->with('preguntas.alternativas')->get();

        return response()->json($encuesta, 200);
    }
}
