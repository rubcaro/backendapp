<?php

namespace App;

use App\Encuesta;
use App\Alternativa;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = "pregunta";
    protected $fillable = ['pregunta'];

    // Relaciones
    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class);
    }

    public function alternativas()
    {
        return $this->hasMany(Alternativa::class);
    }
}
