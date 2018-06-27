<?php

namespace App;

use App\User;
use App\Pregunta;
use App\Respuesta;
use Illuminate\Database\Eloquent\Model;

/**
 * Corresponde al modelo Encuesta que hace referencia a la tabla encuesta
 */
class Encuesta extends Model
{
    /** @var string El nombre de la tabla  */
    protected $table = "encuesta";

    /** @var array  Los atributos que pueden ser mass assignable*/
    protected $fillable = ["encuesta"];

    //Relaciones
    /**
     * Relación uno a muchos con modelo User
     */
    public function usuario() 
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación uno a muchos con modelo Pregunta
     */
    public function preguntas() 
    {
        return $this->hasMany(Pregunta::class);
    }

    /**
     * Relación uno a muchos con el modelo Respuesta
     */
    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }
}
