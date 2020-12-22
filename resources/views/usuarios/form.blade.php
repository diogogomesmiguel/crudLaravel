<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Novo usuário</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            
            @if( Request::is('*/edit' ))
            <form class="register-form" method="post" action="{{ url('usuarios/update/') }}/{{ $usuario->id }}">
                @csrf
                <input type="text" name="nome" placeholder="Nome" value="{{ $usuario->nome }}"/>
                <input type="text" name="email" placeholder="Email" value="{{ $usuario->email }}"/>
                <input type="text" name="cidade" placeholder="Cidade" value="{{ $usuario->cidade }}"/>
                <button>Alterar</button>
            </form>
            @else

            <div class="form">
                <form class="register-form" method="post" action="{{ url('usuarios/add') }}">
                @csrf
                <input type="text" name="nome" placeholder="Nome"/>
                <input type="text" name="email" placeholder="Email"/>
                <input type="text" name="cidade" placeholder="Cidade"/>
                <button>Cadastrar</button>
                </form>
            </div>
        </div>
        @endif
    </body>
</html>
