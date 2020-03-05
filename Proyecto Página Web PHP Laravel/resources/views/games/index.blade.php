@extends('layout')
@section('content')
    <div class="row">
        <table class="table table-hover text-center">
            <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Partido</th>
                <th scope="col">Estadio</th>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach($partidos as $p)
                <tr>
                    <td>{{$p->fecha}}</td>
                    <td>{{$p->hora}}</td>
                    <th>{{$p->equipoLocal->nombre}} vs {{$p->equipoVisitante->nombre}}</th>
                    <td>{{$p->equipoLocal->estadio}}</td>
                    <td>
                        <a href="/PhpstormProjects/NBATickets/public/games/show/{{$p->id}}"
                           class="btn text-white" style="background-color: #1D418B;">
                            Detalles del partido
                        </a>&nbsp;
                        @if(Auth::check() && Auth::user()->rol == 'administrador')
                            <a href="/PhpstormProjects/NBATickets/public/games/edit/{{$p->id}}"
                               class="btn btn-warning">
                                Editar partido
                            </a> &nbsp;
                            <form action="{{action('GamesController@deletePartido',$p->id)}}"
                                  method="POST" style="display:inline">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-danger" style="display:inline"><i class="fas fa-trash-alt"></i>
                                    Eliminar partido
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <!--p style="color:red;"><b>TODO: Preguntar que es lo de personalizar un par de errores HTTP</b></p>
    <p style="color:red;"><b>TODO: Recuperar clave de usuario y verificacion por email</b></p>
@endsection
