<?php

namespace App\Http\Controllers;

use App\Notificacion;
use App\TipoSangre;
use Illuminate\Http\Request;

/**
 * Controlador que maneja las acciones relacionadas con el Banco de Sangre
 */
class BancoSangreController extends Controller
{
    /**
     * Muestra la página createNotification.
     *
     * @return \Illuminate\Http\Response
     */
    public function seeAddNotification()
    {
        $tiposSangre = TipoSangre::all();

        return view('bancoSangre.createNotification', compact('tiposSangre'));
    }

    /**
     * Muestra un listado de todas las notificaciones en la página seeNotifications.
     * 
     * @return \Illuminate\Http\Response
     */
    
    public function seeNotifications()
    {
        $notificaciones = Notificacion::all();

        return view('bancoSangre.seeNotifications', compact('notificaciones'));
    }

    /**
     * Guarda una notificación en la BD, es usada como api.
     *
     * @param Illuminate\Http\Request
     * @return Illuminate\Http\Response
     **/
    public function storeNotification(Request $request) 
    {
        $notificacion = Notificacion::create($request->all());

        return response()->json($notificacion, 200);
    }
}
