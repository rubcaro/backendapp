<?php

namespace App;

use App\User;
use App\Notificacion;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $table = 'notificacion';
    protected $fillable = [
        'titulo',
        'mensaje',
        'tipo_sangre_id',
        'user_id',
        'message_id'
    ];

    //Relaciones
    public function tipoSangre()
    {
        return $this->belongsTo(Notificacion::class);
    }
    
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
