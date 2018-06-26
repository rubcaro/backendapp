<?php

namespace App;

use App\Encuesta;
use App\Alternativa;
use App\Pregunta;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $table = "resultado";

    // Relaciones
    public function encuesta() 
    {
        return $this->belongsTo(Encuesta::class);
    }   

    public function alternativa()
    {
        return $this->belongsTo(Alternativa::class);
    }

    public function pregunta()
    {
        return $this->pregunta(Pregunta::class);
    }
}
