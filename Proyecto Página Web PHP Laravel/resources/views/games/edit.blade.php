@extends('layout')
@section('content')
    <div class="card text-center offset-md-3 col-md-6">
        <div class="card-body" style="align-self: center">
            <form action="" method="post" enctype="multipart/form-data">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <label for="imagen"><b>Editar imagen del estadio del equipo local (opcional):</b></label>
                <input type="file" class="form-control-file" name="imagen"><br>
                <label for="local"><b>Equipo local:</b></label>
                <select class="custom-select" name="local" id="local" required>
                    @foreach($equipos as $e)
                        <option @if($p->equipoLocal->nombre == $e->nombre) selected @endif>{{$e->nombre}}</option>
                    @endforeach
                </select><br><br>
                <label for="visitante"><b>Equipo visitante:</b></label>
                <select class="custom-select" name="visitante" id="visitante" required>
                    @foreach($equipos as $e)
                        <option @if($p->equipoVisitante->nombre == $e->nombre) selected @endif>{{$e->nombre}}</option>
                    @endforeach
                </select><br><br>
                <label for="fecha"><b>Fecha:</b></label>
                <input type="date" class="form-control-file" name="fecha" id="fecha" value="{{$p->fecha}}"required>
                <hr>
                <label for="hora"><b>Hora:</b></label>
                <input type="time" class="form-control-file" name="hora" id="hora" value="{{$p->hora}}" required>
                <hr>
                <label for="precio"><b>Precio:</b></label>
                <input type="number" class="form-control" id="precio" name="precio" value="{{$p->precio}}" required>
                <button type="submit" class="btn text-white btn-primary" style="padding:8px 100px;margin-top:25px;">
                    Editar partido
                </button>
            </form>
        </div>
    </div>
@endsection
