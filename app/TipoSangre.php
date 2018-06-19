<?php

namespace App;

use App\TipoSangre;
use Illuminate\Database\Eloquent\Model;

class TipoSangre extends Model
{
    protected $table = "tipo_sangre";
    protected $fillable = ['nombre'];

    // Relaciones
    public function notificaciones()
    {
        return $this->belongsTo(TipoSangre::class);
    }
}
