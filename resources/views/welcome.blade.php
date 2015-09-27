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
            <div id="nav">
                <a href="/"><img src="assets/images/logo1.png"></a>

                @if (Auth::check())
                    <div class="login"><a href="menu">Menu</a><a href="logout">Logout <div class="profile-pic" style="background-image: url({{ Auth::user()->photo }})"></div></a></div>
                @else
                    <div class="login"><a href="login/fb">Login with Facebook</a>&nbsp;<font color="white">/</font>&nbsp;<a href="login/gmail">Gmail</a></div>
                @endif
            </div>
            <div id="search-panel">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="spanel">
                    <div class="row center">
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            @include ('country-list')
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            @include ('types-list')
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            @include ('breeds-list')
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <select id="s-gender" class="ui dropdown">
                              <option value="">Pet gender</option>
                              <option value="0">Male</option>
                              <option value="1">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div id="front-text">
                <p>we are connecting pets...</p>
            </div>
            <div class="search-results">
                <table id="results-table" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Country</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Breed</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
             
                    <tfoot>
                        <tr>
                            <th>Country</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Breed</th>
                            <th>Gender</th>
                        </tr>
                    </tfoot>
             
                    <tbody>
                    </tbody>
                </table>
            </div>

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
