<?php

namespace App;

use App\User;
use App\Pregunta;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = "encuesta";
    protected $fillable = ["encuesta"];

    //Relaciones
    public function usuario() 
    {
        return $this->belongsTo(User::class);
    }

    public function preguntas() 
    {
        return $this->hasMany(Pregunta::class);
    }
}
