@extends('layout')
@section('content')
    <div class="card text-center offset-md-3 col-md-6">
        <div class="card-body" style="align-self: center">
            <form action="" method="POST">
                {{csrf_field()}}
                <label for="local"><b>Equipo local:</b></label>
                <select class="custom-select" name="local" id="local" required>
                    @foreach($equipos as $e)
                        <option>{{$e->nombre}}</option>
                    @endforeach
                </select><br><br>
                <label for="visitante"><b>Equipo visitante:</b></label>
                <select class="custom-select" name="visitante" id="visitante" required>
                    @foreach($equipos as $e)
                        <option>{{$e->nombre}}</option>
                    @endforeach
                </select><br><br>
                <label for="fecha"><b>Fecha:</b></label>
                <input type="date" class="form-control-file" name="fecha" id="fecha" required>
                <hr>
                <label for="hora"><b>Hora:</b></label>
                <input type="time" class="form-control-file" name="hora" id="hora" required>
                <hr>
                <label for="precio"><b>Precio:</b></label>
                <input type="number" class="form-control" id="precio" name="precio" required>
                <button type="submit" class="btn text-white btn-primary" style="padding:8px 100px;margin-top:25px;">
                    Crear partido
                </button>
            </form>
        </div>
    </div>
@endsection
