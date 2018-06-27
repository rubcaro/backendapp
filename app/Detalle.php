<?php

namespace App;

use App\Respuesta;
use App\Alternativa;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo que hace referencia a la tabla detalle
 */
class Detalle extends Model
{
    /** @var string $table corresponde al nombre de la tabla en la BD */
    protected $table = "respuesta_detalle";

    // Relaciones

    /**
     * Crea relación uno a muchos con el modelo Pregunta
     */
    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }

    /**
     * Crea relación uno a muchos con el modelo Alternativa
     */
    public function alternativa()
    {
        return $this->belongsTo(Alternativa::clas);
    }

    /**
     * Crea una relación uno a muchos con el modelo Respuesta
     */
    public function respuesta()
    {
        return $this->belongsTo(Respuesta::class);
    }
}
