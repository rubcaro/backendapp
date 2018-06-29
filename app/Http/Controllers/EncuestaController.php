<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\Pregunta;
use App\Alternativa;
use App\Respuesta;
use App\Detalle;
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


    /**
     * Alamacena una respuesta de la encuesta
     * 
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function storeResult(Request $request) {
        $respuesta = new Respuesta();
        $respuesta->encuesta_id = $request->encuesta_id;
        $respuesta->save();
        foreach ($request->respuestas as $res) {
            $detalle = new Detalle();
            $detalle->pregunta_id = $res["pregunta_id"];
            $detalle->alternativa_id = $res["alternativa"];
            $detalle->respuesta_id = $respuesta->id;
            $detalle->save();
        }

        return response()->json($respuesta, 200);
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

    public function showResults($id) {
        $encuesta = Encuesta::findOrFail($id);
        $resultados = [];
        $resultados["resultados_totales"] = $encuesta->respuestas()->count();
        foreach ($encuesta->preguntas as $key => $pregunta) {
            $resultados["preguntas"][] = [
                "id" => $pregunta->id,
                "pregunta" => $pregunta->pregunta,
            ];
            foreach ($pregunta->alternativas as $alternativa) {
                $cantidad = $alternativa->detalles->count();
                // dump($key);
                $resultados["preguntas"][$key]["alternativas"][] = [
                    "id" => $alternativa->id,
                    "alternativa" => $alternativa->alternativa, 
                    "cantidad" => $cantidad,
                ];
            }
        }
        // dd($resultados);
        return response()->json($resultados, 200);
    }

    public function seeResults($id) {
        return view('encuestas.seeResults');
    }
}
