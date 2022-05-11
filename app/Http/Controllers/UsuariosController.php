<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function showUsuarios()
    {
        $usuarios = User::all();
        return view('admin_usuarios')->with('usuarios', $usuarios);
    }
    public function showAdmins()
    {
        $usuarios = User::all();
        return view('admin_administradores')->with('usuarios', $usuarios);
    }

    public function usuariosValidation($id)
    {
        $user = User::find($id);
        return view('welcome')->with('user', $user);
    }
}
