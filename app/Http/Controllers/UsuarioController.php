<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;


/**
 * Controlador que maneja las acciones relacionadas con los usuarios del sistema
 */
class UsuarioController extends Controller
{
    /**
     * Muestra la página donde se ven todos los usuarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();

        return view('usuarios.verUsuarios', compact('usuarios'));
    }

    /**
     * Muestra la página que permite crear al usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser()
    {
        return view('usuarios.crearUsuario');
    }

    /**
     * Muestra la página que permite modificar al usuario.
     * 
     * @param int id corresponde al id del usuario
     * @return \Illuminate\Http\Response
     */
    public function seeEdit($id)
    {
        $user = User::findOrFail($id);

        return view('usuarios.verUsuario', compact('user'));
    }

    /**
     * Se realiza la edición del usuario, ejecutando las validaciones correspondientes.
     *
     * @param id int corresponde al id del usuario
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function editUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'apepat' => 'required',
            'apemat' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'confirmed'
        ]);

        if (trim($request->password) == '') {

            $input = $request->except('password');

        } else {

            $input = $request->except('repeatPassword');
            $input['password'] = bcrypt($request->password);

        }

        $user->update($input);

        Session::flash('message-success', 'El usuario ha sido correctamente modificado');

        return redirect(route('seeUsers'));
    }

    /**
     * Se crea el usuario y se guarda en la base de datos. Se realizan validaciones correspondintes.
     *
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'apepat' => 'required',
            'apemat' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $input = $request->all();
        $input['password'] = bcrypt($request->password);

        User::create($input);

        Session::flash('message-success', 'El usuario ha sido correctamente ingresado');

        return redirect(route('seeUsers'));
    }

    /**
     * Se realiza la eliminación del usuario, ejecutando las validaciones correspondientes.
     *
     * @param id int corresponde al id del usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        Session::flash('message-success', 'El usuario ha sido correctamente eliminado');

        return redirect(route('seeUsers'));
    }


}
