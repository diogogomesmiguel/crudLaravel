<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRUD Softwar</title>

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

            table.simples {
                border-collapse: collapse;
            }
            
            table.simples td, th{
                border: 1px solid rgba(0, 0, 0, 0.2);
                padding: 0px 10px;
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

            <div class="content">
                <a href="{{ url('usuarios/new') }}"><h1>Novo usuário</h1></a>
                <div>
                <table class="simples">
                        <tr class="tr">
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Cidade</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>
                    @foreach( $usuarios as $u)
                        <tr>
                            <th>{{ $u->id }}</th>
                            <td>{{ $u->nome }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->cidade }}</td>
                            <td>
                                <a href="usuarios/{{ $u->id }}/edit" class="btn_edit">Editar</a>
                            </td>
                            <td>
                                <form action="usuarios/delete/{{ $u->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn_del">Deletar</button>
                                </form>
                            </td>
                        </tr>              
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </body>
</html>
