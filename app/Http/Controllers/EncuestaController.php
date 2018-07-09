<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\Pregunta;
use App\Alternativa;
use App\Respuesta;
use App\Detalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Jobs\Prueba;
use PhpParser\Node\Scalar\Encapsed;

/**
 * Conntrolador que maneja las acciones relacionadas con las encuestas
 */
class EncuestaController extends Controller
{

    /**
     * Guarda una nueva encuesta, junto con sus preguntas y alternativas
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response en formato json
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
     * @return \Illuminate\Http\Response en formato json
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
     * @return \Illuminate\Http\Response en formato json
     */
    public function show($id)
    {
        // $encuesta = Cache::remember('encuesta-' . $id, 60, function() use ($id) {
        //     return Encuesta::where('id', $id)
        //                 ->with('preguntas')
        //                 ->with('preguntas.alternativas')
        //                 ->get();
        // });
        $encuesta = Encuesta::where('id', $id)->with('preguntas')->with('preguntas.alternativas')->get();

        return response()->json($encuesta, 200);
    }

    /**
     * Calcula los resultados de la encuesta, mostrando la cantidad total de votos para cada alternativa
     *
     * @param id int corresponde al id de la encuesta
     * @return \Illuminate\Http\Response en formato json
     */
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

    /**
     * Se muestra la página en la cual se ven los resultados
     *
     * @param int $id corresponde al id de la encuesta
     * @return \Illuminate\Http\Response
     */
    public function seeResults($id) 
    {
        return view('encuestas.seeResults' ,compact('id'));
    }

    /**
     * Se muestra la página en la cual se ven las encuestas
     *
     * @return \Illuminate\Http\Response
     */
    public function seeEncuestas()
    {
        $encuestas = Encuesta::all();

        return view('encuestas.seeEncuestas', compact('encuestas'));
    }

    /**
     * Se muestra la página en la cual se crea la encuesta
     *
     * @return \Illuminate\Http\Response
     */
    public function seeCreateEncuesta()
    {
        return view('encuestas.createEncuesta');
    }

    /**
     * Se muestra la página en la cual se ve un resumen de la encuesta
     *
     * @param id int corresponde al id de la encuesta
     * @return \Illuminate\Http\Response
     */
    public function seeEncuesta($id)
    {
        $encuesta = Encuesta::findOrFail($id);

        return view('encuestas.seeEncuesta', compact('encuesta'));
    }

    /**
     * Se muestra la página en la cual se ven los resultados
     *
     * @param id int corresponde al id de la encuesta
     * @return \Illuminate\Http\Response en formato json
     */
    public function showEncuestas()
    {
        // $encuestas = Cache::remember('encuestas', 30, function() {
        //     return Encuesta::where('estado', 1)->get();
        // });
        $encuestas = Encuesta::where('estado', 1)->get();

        return response()->json($encuestas, 200);
    }

    public function changeStatus($id)
    {
        $encuesta = Encuesta::findOrFail($id);

        $encuesta->estado == Encuesta::ACTIVA ? 
            $encuesta->estado = Encuesta::INACTIVA :
            $encuesta->estado = Encuesta::ACTIVA;

        $encuesta->save();

        return back();
    }
}
