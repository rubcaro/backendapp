<?php

namespace App;

use App\Pregunta;
use Illuminate\Database\Eloquent\Model;

/**
 * Corresponde al modelo Alternativa que hace referencia a la tabla alternativa
 */
class Alternativa extends Model
{
    /** @var string El nombre de la tabla  */
    protected $table = "alternativa";

    /** @var array  Los atributos que pueden ser mass assignable*/
    protected $fillable = ['alternativa'];

    // Relaciones
    /**
     * Relación uno a muchos con modelo Pregunta
     */
    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }
}
