<?php

namespace App;

use App\Encuesta;
use App\Alternativa;
use Illuminate\Database\Eloquent\Model;

/**
 * Corersponde al modelo Pregunta que hace referencia a la tabla pregunta
 */
class Pregunta extends Model
{
    /** @var string El nombre de la tabla  */
    protected $table = "pregunta";

    /** @var array  Los atributos que pueden ser mass assignable*/
    protected $fillable = ['pregunta'];

    // Relaciones
    /**
     * Relación uno a muchos con modelo Encuesta
     */
    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class);
    }

    /**
     * Relación uno a muchos con modelo Alternativas
     */
    public function alternativas()
    {
        return $this->hasMany(Alternativa::class);
    }
}
