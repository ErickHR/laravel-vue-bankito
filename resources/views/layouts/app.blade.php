<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BankPerú</title>
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- font awasome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    {{-- gsap --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js"></script>

    {{-- font awasome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <?php
        $items = [];
    if( isset($rol) ){
if( $rol == "administrador" ){
        $items = [
            [ 
                "icon"=>"fas fa-money-check", 
                "route"=>"request-debit-card", 
                "tittle"=>"Solicitar tarjeta de débito"
            ],
            [ 
                "icon"=>"fas fa-users", 
                "route"=>"request-debit-card-show", 
                "tittle"=>"Mostrar solicitudes de tarjeta de débito"
            ],
            [ 
                "icon"=>"fas fa-money-check-alt", 
                "route"=>"request-credit-card", 
                "tittle"=>"Solicitar tarjeta de crédito"
            ],
            [ 
                "icon"=>"fas fa-users", 
                "route"=>"request-credit-card-show", 
                "tittle"=>"Mostrar solicitudes de tarjeta de crédito"
            ],
            [ 
                "icon"=>"fas fa-users", 
                "route"=>"list-worker", 
                "tittle"=>"Empleados"
            ]
        ];
    } else if( $rol == "trabajador" ){
        $items = [
            [ 
                "icon"=>"fas fa-money-check", 
                "route"=>"request-debit-card", 
                "tittle"=>"Solicitar tarjeta de débito"
            ],
            [ 
                "icon"=>"fas fa-users", 
                "route"=>"request-debit-card-show", 
                "tittle"=>"Mostrar solicitudes de tarjeta de débito"
            ],
            [ 
                "icon"=>"fas fa-money-check-alt", 
                "route"=>"request-credit-card", 
                "tittle"=>"Solicitar tarjeta de crédito"
            ]
        ];
    }  else if( $rol == "cliente" ){
        $items = [
            [ 
                "icon"=>"fas fa-users", 
                "route"=>"registerUsers", 
                "tittle"=>"Registrar Usuario"
            ],
            [ 
                "icon"=>"fas fa-money-check-alt", 
                "route"=>"transfer-credit", 
                "tittle"=>"Transferencia Credito"
            ]
        ];
    }
     $items[] = [
         "icon"=>"fas fa-user-edit", 
        "route"=>"personal-data", 
        "tittle"=>"Datos Personales"
     ]; 
    }
    

        
            
    ?>
    <div id="app">
        @guest
        @else
        <app-menu :items='{!!json_encode($items)!!}'></app-menu>
        @endguest
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm position-fixed vw-100" style="z-index:1">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                {{-- {{ config('app.name', 'Laravel') }} --}}
                   <span>BankPerú</span> 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        {{-- <main class="py-4" --}}
        <main style="padding-top: 100px;">
            @yield('content')
        </main>
    </div>
</body>
</html>
