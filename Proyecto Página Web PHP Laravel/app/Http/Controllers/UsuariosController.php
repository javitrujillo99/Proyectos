<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function getUsuarios() {
        try {
            $usuarios = User::all();
            return view('usuarios.index')->with('usuarios', $usuarios);
        } catch (QueryException $e) {
            $e->getMessage();
        }
    }

    public function getEdit($id) {
        try {
            $usuario = User::findOrFail($id);
            return view('usuarios.edit')->with('u', $usuario);
        } catch (QueryException $e) {
            $e->getMessage();
        }
    }

    public function putEdit(Request $request, $id) {
        try {
            if (filter_var($request->input('correo'), FILTER_VALIDATE_EMAIL) && trim($request->input('nombre') != "")) {
                $u = User::findOrFail($id);
                $u->name = $request->input('nombre');
                $u->email = $request->input('correo');
                $u->rol = $request->input('rol');
                $u->save();
                return redirect('/usuarios');
            } elseif (!filter_var($request->input('correo'), FILTER_VALIDATE_EMAIL)) {
                flash("El correo electrónico no es válido")->error();
                return redirect('/usuarios/edit/'.$id);
            } else {
                flash("El nombre no puede estar en blanco")->error();
                return redirect('/usuarios/edit/'.$id);
            }
        } catch (QueryException $e) {
            $e->getMessage();
        }
    }

    public function deleteUsuario($id) {
        try {
            $u = User::findOrFail($id);
            $u->delete();
            return redirect('/usuarios');
        } catch (QueryException $e) {
            $e->getMessage();
        }
    }

}
