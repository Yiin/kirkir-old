<!DOCTYPE html>
<html>
    <head>
        <title>KirKir</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
        <script type="text/javascript" src="assets/vendor/semantic/semantic.min.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/vendor/semantic/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="assets/vendor/semantic/components/dropdown.min.css">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
        
        <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    </head>
    <body>
        <div class="container">
            @include('nav.main')
            
            @yield('content')

       <!--  <div class="container">
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
       </div> -->
        </div>
        <footer class="footer">
            <div class="container">
                <div id="copy">
                    <p>&#169; 2015 kirkir. All rights reserved.</p>
                </div>
                <div id="bottom-meniu">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">About kirkir</a></li>
                        <li><a href="/team">Team</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </footer>
        <script type="text/javascript" src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="assets/js/script.js"></script>
    </body>
</html>