<!DOCTYPE html> 
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Circulos de Eficiencia</title>
    <link rel="shortcut icon" href="{!! asset('jpg/favicon.ico') !!}" type="image/x-icon">
    <!-- Styles -->
    <script src="{!! asset('js/jquery-3.3.1.js') !!}" ></script>
    <script src="{!! asset('js/bootstrap.bundle.min.js') !!}" ></script>
    <link href="{!! asset('css/bootstrap.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/jquery.bootgrid.css') !!}" rel="stylesheet">
    <script src="{!! asset('js/jquery.bootgrid.js') !!}" ></script>
    <link href="{!! asset('font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/w3.css') !!}" rel="stylesheet"> 
    <link href="{!! asset('css/app.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/main.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet"> 
    <!-- jquery-ui -->
    <link href="{!! asset('jqueryui/jquery-ui.css') !!}" rel="stylesheet">
    <script src="{!! asset('jqueryui/jquery-ui.js') !!}" ></script>

    <style>
      .navbar-custom {
          position: relative;
          background-color: #154398;
          background-image: url("overlay.svg"),linear-gradient(45deg, #154398 0%, #006fe6 100%);
          background-size: cover;
          z-index: 1000;
}
      

      .navbar-custom .navbar-brand,
      .navbar-custom .navbar-text {
          color: #ffffff;
      }

      .navbar-custom .navbar-nav .nav-link {
          color: #ffffff;
      }

      .navbar-custom .nav-item.active .nav-link,
      .navbar-custom .nav-item:hover .nav-link {
          color: #ffffff;
      }

      .navbar-custom .dropdown-menu {}

      .navbar-custom .dropdown-item {
          color: #ffffff;
      }

      .navbar-custom .dropdown-item:hover,
      .navbar-custom .dropdown-item:focus {
      }
  </style>
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-sm navbar-custom static-top">
            <div class="container-fluid">
                <a class="navbar-brand"><img src="{!! asset('jpg/logo_CE.png') !!}" alt="Logo CE"></a>
                <div class="collapse navbar-collapse ml-5" id="navbarSupportedContent">
                    @guest
                    @else
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('Inicio', 'Inicio') }}
                        </a>
                    @endguest
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <div class="btn-group">
                        <div class="dropdown p-1">
                            @can('proyects.index')
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Proyectos
                            </a>
                            <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                @can('proyects.index')
                                    <a class="dropdown-item" href="{{ route('proyects.index') }}">Activos</a>
                                @endcan
                                @can('proyects.finished')
                                    <a class="dropdown-item" href="{{ route('proyects.finished') }}">Terminados</a>
                                @endcan
                                @can('procesos.index')
                                    <a class="dropdown-item" href="{{ route('procesos.index') }}">Proceso de Pago</a>
                                @endcan
                                @can('cancelados.edit')
                                    <a class="dropdown-item" href="{{ route('cancelados.edit') }}">Maestro</a>
                                @endcan
                                @can('cancelados.index')
                                <a class="dropdown-item" href="{{ route('cancelados.index') }}">Cancelados</a>
                                @endcan
                             </div>
                            @endcan
                        </div>
                        <div class="dropdown p-1">
                            @can('mr.index')
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Mejoras Rápidas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @can('mr.index')
                                    <a class="dropdown-item" href="{{ route('mr.index') }}">En Proceso</a>
                                @endcan
                                @can('mr.finished')
                                    <a class="dropdown-item" href="{{ route('mr.finished') }}">Terminadas</a>
                                @endcan
                                @can('mrprocesos.create')
                                    <a class="dropdown-item" href="{{ route('mrprocesos.create') }}">Proceso de pago</a>
                                @endcan
                                @can('mr.index')
                                    <a class="dropdown-item" href="{{ route('mrprocesos.index') }}">Pagadas</a>
                                @endcan
                                @can('mr.destroy')
                                    <a class="dropdown-item" href="{{ route('mr.destroy') }}">Canceladas</a>
                                @endcan
                             </div>
                            @endcan
                        </div> 
                        <div class="dropdown p-1">
                            @can('proyects.index')
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Propuestas
                            </a>
                            <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('propuesta') }}">Registro</a>
                                @if (auth()->user()->can('propuestas.edit'))
                                    <a class="dropdown-item" href="{{ route('propuesta1.index') }}">Propuestas</a>
                                @else
                                    <a class="dropdown-item" href="{{ route('propuesta3.index') }}">Propuestas</a>        
                                @endif
                             </div>
                            @endcan
                        </div>
                    </div>
                        @can('users.index')
                        <li class="nav-item p-1">
                            <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
                        </li>
                        @endcan
                        @can('roles.index')
                        <li class="nav-item p-1">
                            <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                        </li>
                        @endcan
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto mr-5">
                        <!-- Authentication Links -->
                        @guest
                            {{-- <li class="nav-item p-1">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item p-1">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li> --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                <a class="navbar-brand navbar-right"><img src="{!! asset('jpg/logo_RH.png') !!}" alt="logo RH"></a>
            </div>
        </nav>
            
        @if(session('info'))
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="alert alert-success">
                        {{ session('info') }}
                    </div>
                </div>
            </div>
        </div>
        @endif
        <main class="py-1">
           
                    @yield('content')
            
        </main>
    </div>
</body>
<script src="{!! asset('js/app.js') !!}"></script>
<script src="{!! asset('js/app2.js') !!}"></script>
</html>
