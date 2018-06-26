<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Corersponde al modelo User que hace referencia a la tabla user
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'apepat', 'apemat', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Retorna el nombre completo del usuario
     *
     * Junta el nombre y los dos apellidos en un solo string
     *
     * @return string $fullname
     **/
    public function getFullNameAttribute() {
        $fullname = ucfirst($this->name) . " " . ucfirst($this->apepat) . " " . ucfirst($this->apemat);
        return $fullname;
    }
}
