<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Partido;
use App\Venta;
use Illuminate\Http\Request;

class APIGamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Partido::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fecha_actual = strtotime(date("d-m-Y"));
        $fecha_entrada = strtotime(date($request->input('fecha')));
        if ($request->input('local') != $request->input('visitante')
            && $fecha_entrada >= $fecha_actual) {
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
            foreach ($usuarios as $u) {
                $v = new Venta();
                $v->id_partido = $p->id;
                $v->id_usuario = $u->id;
                $v->save();
            }
            return response()->json(['error' => false, 'msg' => 'El partido se ha creado correctamente']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        return response()->json($p);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fecha_actual = strtotime(date("d-m-Y"));
        $fecha_entrada = strtotime(date($request->input('fecha')));
        if ($request->input('local') != $request->input('visitante')
            && $fecha_entrada >= $fecha_actual) {
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
                $request->file('imagen')->move('images', time() . $request->file('imagen')->getClientOriginalName());
                $equipo = Equipo::findOrFail($id_local);
                $equipo->imagen = time() . $request->file('imagen')->getClientOriginalName();
                $equipo->save();
            }
            $p->fecha = $request->input('fecha');
            $p->hora = $request->input('hora');
            $p->id_equipo_local = $id_local;
            $p->id_equipo_visitante = $id_visitante;
            $p->precio = $request->input('precio');
            $p->save();
            return response()->json(['error' => false, 'msg' => 'El partido se ha modificado correctamente']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
        return response()->json(['error' => false, 'msg' => 'El partido se ha eliminado correctamente']);
    }

    public function putBuy($id)
    {
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
        return response()->json(['error' => false, 'msg' => 'Se ha comprado una entrada para este partido']);
    }

    public function putReturn($id)
    {
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
        return response()->json(['error' => false, 'msg' => 'Se ha cancelado la compra de la entrada del partido']);
    }
}
