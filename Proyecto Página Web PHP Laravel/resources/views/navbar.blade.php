<nav class="navbar navbar-expand-lg" style="background-color: #1D418B">
    <a class="navbar-brand" href="/PhpstormProjects/NBATickets/public/games">
        <img src="{{asset('images/NBATickets.png')}}">
    </a>
    @if (Auth::check())
        <div class="collapse navbar-collapse" id="navbarText">
            @if(Auth::user()->rol == 'administrador')
                <a href="/PhpstormProjects/NBATickets/public/games/create" class="btn-lg btn btn-primary">Añadir partido</a>&nbsp;&nbsp;
                <a href="/PhpstormProjects/NBATickets/public/usuarios" class="btn-lg btn btn-primary">Gestionar usuarios</a>
            @endif
        </div>
    <ul class="navbar-nav">
        <li class="nav-item active">
            <span class="navbar-brand mb-0 h1 text-white">{{Auth::user()->name}}</span>
        </li>
    </ul>
        <form action="{{ url('/logout') }}" method="POST" style="display:inline">
            {{ csrf_field() }}
            <button class="btn text-white btn-lg" style="background-color: #C80F2E" type="submit">Cerrar sesión</button>
        </form>
    @else
        <div class="navbar-nav ml-auto">
            <a href="/PhpstormProjects/NBATickets/public/login" class="btn btn-primary btn-lg">Iniciar sesión</a>
        </div>
        @endif
</nav>