<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncuestasController extends Controller
{
    public function seeEncuestas()
    {
        return view('encuestas.seeEncuestas');
    }
}
