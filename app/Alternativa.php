<?php

namespace App;

use App\Pregunta;
use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model
{
    protected $table = "alternativa";
    protected $fillable = ['alternativa'];

    // Relaciones
    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }
}
