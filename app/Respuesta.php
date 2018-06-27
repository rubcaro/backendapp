<?php

namespace App;

use App\Encuesta;
use app\Detalle;
use Illuminate\Database\Eloquent\Model;

/**
 * Corresponde al modelo de la tabla respuesta
 */
class Respuesta extends Model
{
    /** @var string $table nombre de la tabla en la BD */
    protected $table = "respuesta";

    // Relacions

    /**
     * Relación uno a muchos con el modelo Encuesta
     **/
    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class);
    }

    /**
     * Relación uno a muchos con el modelo Respuesta Detalle
     */
    public function detalle()
    {
        return $this->hasMany(Detalle::class);
    }
}
