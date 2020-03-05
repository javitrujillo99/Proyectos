@extends('layout')
@section('content')
    <div class="row">
        <table class="table table-hover text-center">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Rol</th>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $u)
                <tr>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->rol}}</td>
                    <td></td>
                    <td>
                        <a href="/PhpstormProjects/NBATickets/public/usuarios/edit/{{$u->id}}" class="btn text-white" style="background-color: deeppink">Editar usuario</a>&nbsp;
                        <form class="d-inline" action="{{action('UsuariosController@deleteUsuario',$u->id)}}" method="post">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button class="btn text-white" style="background-color: #C80F2E">Eliminar usuario</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
