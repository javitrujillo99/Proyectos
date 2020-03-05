@extends('layout')
@section('content')
    <div class="card mb-3 border-0">
        <img class="card-img-top" src="{{asset('images/'.$p->equipoLocal->imagen)}}"
             alt="Card image cap" style="width: 500px; height: 200px; align-self: center">
        <div class="card-body" style="align-self: center">

            <h1>{{$p->equipoLocal->estadio}}</h1>
            <h3>Capacidad: {{$p->equipoLocal->capacidad}} espectadores</h3>
            <h3>Precio: {{$p->precio}}€</h3>
            <br>
            @if($venta->comprado == 0)
                @if($fechaActual < $p->fecha)
                    <form action="{{action('GamesController@putBuy', $p->id)}}"
                          method="POST" style="display:inline">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn text-white btn-primary btn-lg" style="margin-left: 100px; background-color: #1D418B">
                            Comprar entrada
                        </button>
                    </form>
                @elseif($fechaActual == $p->fecha)
                    @if($horaActual < $p->hora)
                        <form action="{{action('GamesController@putBuy', $p->id)}}"
                              method="POST" style="display:inline">
                            {{method_field('PUT')}}
                            {{csrf_field()}}
                            <button type="submit" class="btn text-white btn-primary btn-lg" style="margin-left: 100px; background-color: #1D418B">
                                Comprar entrada
                            </button>
                        </form>
                    @else
                        <span style="color: #1D418B;"><b>Este partido ya se ha jugado</b></span>
                    @endif
                @else
                    <span style="color: #1D418B;"><b>Este partido ya se ha jugado</b></span>
                @endif
            @endif
            @if($venta->comprado == 1)
                @if($fechaActual < $p->fecha)
                    <form action="{{action('GamesController@putReturn', $p->id)}}"
                          method="POST" style="display:inline">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn text-white btn-danger btn-lg" style="margin-left: 100px; background-color: #C80F2E">
                            Cancelar compra
                        </button>
                    </form>
                    @elseif($fechaActual == $p->fecha)
                        @if($horaActual < $p->hora)
                            <form action="{{action('GamesController@putReturn', $p->id)}}"
                                  method="POST" style="display:inline">
                                {{method_field('PUT')}}
                                {{csrf_field()}}
                                <button type="submit" class="btn text-white btn-danger btn-lg" style="margin-left: 100px; background-color: #C80F2E">
                                    Cancelar compra
                                </button>
                            </form>
                        @else
                            <span style="color: #1D418B;"><b>Este partido ya se ha jugado</b></span>
                        @endif
                    @else
                        <span style="color: #1D418B;"><b>Este partido ya se ha jugado</b></span>
                @endif
            @endif
            <!--
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            -->
        </div>
    </div>
    <!--<div class="row">
        <div class="col-sm-6">
            <img src="{{asset('images/descarga.jfif')}}">
        </div>
        <div class="col-sm-6">
            <h1>Estadio: Staples Center</h1>
            <h2>Capacidad: 20000 espectadores</h2>

        </div>
    </div>
    -->
@endsection
