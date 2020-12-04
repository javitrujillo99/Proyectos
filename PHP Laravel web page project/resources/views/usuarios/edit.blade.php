@extends('layout')
@section('content')
    <div class="card text-center offset-md-3 col-md-6">
        <div class="card-body" style="align-self: center">
            <form action="" method="post">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <label for="nombre"><b>Nombre</b></label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{$u->name}}" required><br>
                <label for="correo"><b>Correo</b></label>
                <input type="text" name="correo" id="correo" class="form-control" value="{{$u->email}}" required><br>
                <label for="rol"><b>Rol</b></label>
                <select class="custom-select" name="rol" id="rol">
                    <option @if($u->rol == 'administrador') selected @endif>administrador</option>
                    <option @if($u->rol == 'usuario') selected @endif>usuario</option>
                </select>
                <button type="submit" class="btn text-white btn-primary" style="padding:8px 100px;margin-top:25px;">
                    Editar usuario
                </button>
                @if($errors->has('nombre'))
                    <strong>{{$errors->first('nombre')}}</strong>
                @endif
            </form>
        </div>
    </div>
@endsection
