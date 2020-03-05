<?php

namespace App\Http\Controllers;

use App\Partido;
use App\Equipo;
use App\User;
use App\Venta;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GamesController extends Controller
{
    public function getIndex() {
        try {
            $p = Partido::all();
            return view('games.index')->with('partidos', $p);
        } catch (QueryException $e) {
            echo $e->getMessage();
        }
    }

    public function getShow($id) {
        try {
            $p = Partido::findOrFail($id);
            $fecha_actual = strtotime(date("d-m-Y"));
            $h = date('h:m', time());
            $f = date('Y-m-d', $fecha_actual);
            $id_venta = DB::table('ventas')
                ->select('id')
                ->where('id_partido', $id)
                ->where('id_usuario', Auth::user()->id)
                ->first()
                ->id;
            $venta = Venta::findOrFail($id_venta);
            return view('games.show')
                ->with('p', $p)
                ->with('fechaActual', $f)
                ->with('horaActual', $h)
                ->with('venta', $venta);
        } catch (QueryException $e) {
            echo $e->getMessage();
        }
    }

    public function getEdit($id) {
        try {
            $e = Equipo::all();
            $p = Partido::findOrFail($id);
            return view('games.edit')
                ->with('p', $p)
                ->with('equipos', $e);
        } catch (QueryException $e) {
            echo $e->getMessage();
        }

    }

    public function getCreate() {
        try {
            $e = Equipo::all();
            return view('games.create')->with('equipos', $e);
        } catch (QueryException $e) {
            echo $e->getMessage();
        }
    }

    public function postCreate(Request $request) {
        try {
            $fecha_actual = strtotime(date("d-m-Y"));
            $fecha_entrada = strtotime(date($request->input('fecha')));
            if($request->input('local') != $request->input('visitante')
            && $fecha_entrada >= $fecha_actual && $request->input('precio') >=  0) {
                $local = $request->input('local');
                $id_local = DB::table('equipos')
                    ->select('id')
                    ->where('nombre', $local)
                    ->first()
                    ->id;
                $visitante = $request->input('visitante');
                $id_visitante = DB::table('equipos')
                    ->select('id')
                    ->where('nombre', $visitante)
                    ->first()
                    ->id;
                $p = new Partido();
                $p->fecha = $request->input('fecha');
                $p->hora = $request->input('hora');
                $p->id_equipo_local = $id_local;
                $p->id_equipo_visitante = $id_visitante;
                $p->precio = $request->input('precio');
                $p->save();
                $usuarios = User::all();
                foreach($usuarios as $u) {
                    $v = new Venta();
                    $v->id_partido = $p->id;
                    $v->id_usuario = $u->id;
                    $v->save();
                }
                return redirect('/games');
            } else {
                if ($fecha_entrada <= $fecha_actual) {
                    flash('LA FECHA DEL PARTIDO NO PUEDE PERTENECER AL PASADO')->error();
                }
                if ($request->input('precio') < 0) {
                    flash('NO SE PUEDEN PONER PRECIOS EN NEGATIVO')->error();
                }
                else {
                    flash('NO SE PUEDEN PONER LOS MISMOS EQUIPOS')->error();
                }
                return redirect('/games/create');
            }

        } catch(QueryException $e) {
            echo $e->getMessage();
        }
    }

    public function putEdit(Request $request, $id) {
        try {
            $fecha_actual = strtotime(date("d-m-Y"));
            $fecha_entrada = strtotime(date($request->input('fecha')));
            if($request->input('local') != $request->input('visitante')
                && $fecha_entrada >= $fecha_actual && $request->input('precio') >=  0) {
                $local = $request->input('local');
                $id_local = DB::table('equipos')
                    ->select('id')
                    ->where('nombre', $local)
                    ->first()
                    ->id;
                $visitante = $request->input('visitante');
                $id_visitante = DB::table('equipos')
                    ->select('id')
                    ->where('nombre', $visitante)
                    ->first()
                    ->id;
                $p = Partido::findOrFail($id);
                if (!empty($request->file('imagen'))) {
                    $request->file('imagen')->move('images', time().$request->file('imagen')->getClientOriginalName());
                    $equipo = Equipo::findOrFail($id_local);
                    //Inserto equipo en BBDD
                    $equipo->imagen = time().$request->file('imagen')->getClientOriginalName();
                    $equipo->save();
                }
                $p->fecha = $request->input('fecha');
                $p->hora = $request->input('hora');
                $p->id_equipo_local = $id_local;
                $p->id_equipo_visitante = $id_visitante;
                $p->precio = $request->input('precio');
                $p->save();
                return redirect('/games');
            } else {
                if ($fecha_entrada <= $fecha_actual) {
                    flash('LA FECHA DEL PARTIDO NO PUEDE PERTENECER AL PASADO')->error();
                }
                if ($request->input('precio') < 0) {
                    flash('NO SE PUEDEN PONER PRECIOS EN NEGATIVO')->error();
                }
                else {
                    flash('NO SE PUEDEN PONER LOS MISMOS EQUIPOS')->error();
                }
                return redirect('/games/edit/'.$id);
            }

        } catch(QueryException $e) {
            echo $e->getMessage();
        }
    }

    public function putBuy($id) {
        try {
            //Poner new venta si no existe venta, si no buscarla con FindOrFail
            $id_venta = DB::table('ventas')
                ->select('id')
                ->where('id_partido', $id)
                ->where('id_usuario', Auth::user()->id)
                ->first()
                ->id;
            $v = Venta::findOrFail($id_venta);
            $p = Partido::findOrFail($id);
            $u = Auth::user();
            $v->id_partido = $p->id;
            $v->id_usuario = $u->id;
            $v->comprado = 1;
            $v->save();
            flash('Entrada comprada con exito')->success();
            return redirect('/games');
        } catch (QueryException $e) {
            echo $e->getMessage();
        }
    }

    public function putReturn($id) {
        try {
            $id_venta = DB::table('ventas')
                ->select('id')
                ->where('id_partido', $id)
                ->where('id_usuario', Auth::user()->id)
                ->first()
                ->id;
            $v = Venta::findOrFail($id_venta);
            $p = Partido::findOrFail($id);
            $u = Auth::user();
            $v->id_partido = $p->id;
            $v->id_usuario = $u->id;
            $v->comprado = 0;
            $v->save();
            flash('Entrada devuelta con exito')->success();
            return redirect('/games');
        } catch (QueryException $e) {
            echo $e->getMessage();
        }
    }

    public function deletePartido($id) {
        try {
            $usuarios = User::all();
            $p = Partido::findOrFail($id);
            $p->delete();
            foreach ($usuarios as $u) {
                $id_venta = DB::table('ventas')
                    ->select('id')
                    ->where('id_partido', $id)
                    ->where('id_usuario', $u->id)
                    ->first()
                    ->id;
                $v = Venta::findOrFail($id_venta);
                $v->delete();
            }
            return redirect('/games');
        } catch (QueryException $e) {
            echo $e->getMessage();
        }
    }

}
