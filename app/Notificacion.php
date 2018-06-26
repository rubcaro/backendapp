<?php

namespace App;

use App\User;
use App\Notificacion;
use Illuminate\Database\Eloquent\Model;

/**
 * Corresponde al modelo Notificacion que hace referencia a la tabla notificacion
 */
class Notificacion extends Model
{
    /** @var string El nombre de la tabla  */
    protected $table = 'notificacion';

    /** @var array  Los atributos que pueden ser mass assignable*/
    protected $fillable = [
        'titulo',
        'mensaje',
        'tipo_sangre_id',
        'user_id',
        'message_id'
    ];

    //Relaciones
    /**
     * Relación uno a muchos con modelo Notificacion
     */
    public function tipoSangre()
    {
        return $this->belongsTo(Notificacion::class);
    }
    
    /**
     * Relación uno a muchos con modelo User
     */
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
