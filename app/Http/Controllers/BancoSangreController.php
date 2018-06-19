<?php

namespace App\Http\Controllers;

use App\Notificacion;
use App\TipoSangre;
use Illuminate\Http\Request;

class BancoSangreController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function seeAddNotification()
    {
        $tiposSangre = TipoSangre::all();

        return view('bancoSangre.createNotification', compact('tiposSangre'));
    }

    public function seeNotifications()
    {
        $notificaciones = Notificacion::all();

        return view('bancoSangre.seeNotifications', compact('notificaciones'));
    }

    public function storeNotification(Request $request) 
    {
        $notificacion = Notificacion::create($request->all());

        return response()->json($notificacion, 200);
    }
}
