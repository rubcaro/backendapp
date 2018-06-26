<?php

namespace App;

use App\TipoSangre;
use Illuminate\Database\Eloquent\Model;

/**
 * Corresponde al modelo TipoSangre que hace referencia a la tabla tipo_sangre
 */
class TipoSangre extends Model
{
    /** @var string El nombre de la tabla  */
    protected $table = "tipo_sangre";
    
    /** @var array  Los atributos que pueden ser mass assignable*/
    protected $fillable = ['nombre'];

    // Relaciones
    /**
     * Relación de uno a muchos con el modelo TipoSangre
     *  
     */
    public function notificaciones()
    {
        return $this->belongsTo(TipoSangre::class);
    }
}
