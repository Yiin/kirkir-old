<!DOCTYPE html>
<html>
    <head>
        <title>KirKir</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                font-weight: 600;
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .header {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-weight: 100;
                font-size: 96px;
            }

            .under-title {
                text-transform: uppercase;
                font-family: sans-serif;
                font-size: 14px;
                color: #545454;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="nav">
                <div class="auth">
                @if (Auth::check())
                    <div class="logout"><a href="logout">Atsijungti</a></div>
                @else
                    <div class="login"><a href="login/fb">Prisijungti per Facebook</a></div>
                @endif
                </div>
            </div>
            <div class="header">
                <div class="title">KirKir</div>
                <div class="under-title">Mating site for pets.</div>
            </div>

            @if(Session::has('message'))
                {{ Session::get('message')}}
            @endif
            <br>
            @if (!empty($data))
                Hello, {{{ $data['name'] }}} <br/>
                <img src="{{ $data['photo']}}">
                <br>
                Your email is {{ $data['email']}}
                <br>
            @endif
        </div>
    </body>
</html>
