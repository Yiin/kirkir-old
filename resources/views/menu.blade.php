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

        <link rel="stylesheet" type="text/css" href="assets/css/menu-style.css">
    </head>
    <body style="background: none">
        <div class="container">
            <div id="nav">
                <a href="/"><img src="assets/images/logo2.png"></a>
                <div class="login"><a href="menu">Menu</a><a href="logout">Logout <div class="profile-pic" style="background-image: url({{ Auth::user()->photo }})"></div></a></div>
            </div>
            <div class="container">
                <br>
                @if (!empty($data))
                Hello, {{{ $data['name'] }}} <br/>
                <img src="{{ $data['photo']}}">
                <br>
                Your email is {{ $data['email']}}
                <br>
                @endif
            </div>
            
            <div class="container add-pet-col">
                <button class="btn btn-default add-pet">
                  Add Pet
                </button>
                <div class="add-pet-form">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="ui form segment">
                    <div class="two fields">
                      <div class="field">
                        <label>Pet Name</label>
                        <input id="add-pet-name" placeholder="Pet Name" type="text">
                      </div>
                      <div class="field">
                        <label>Pet Type</label>
                        @include ('types-list')
                      </div>
                    </div>
                    <div class="field">
                      <label>Breed</label>
                      @include ('breeds-list')
                    </div>
                    <div class="field">
                      <label>Gender</label>
                      <div class="ui dropdown selection">
                        <input type="hidden" name="gender" id="add-pet-gender">
                        <div class="default text">Select Gender</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                          <div class="item" data-value="0">Male</div>
                          <div class="item" data-value="1">Female</div>
                        </div>
                      </div>
                    </div>
                    <div class="field">
                      <label>Country</label>
                      @include ('country-list')
                    </div>
                  </div>

                  <div class="ui buttons">
                    <button class="ui button" id="add-pet-cancel">Cancel</button>
                    <div class="or"></div>
                    <button class="ui positive button active" id="add-pet-save">Save</button>
                  </div>
                </div>
            </div>

            @include ('menu.my-pets')
        </div>
        <footer class="footer">
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
        </footer>
        <script type="text/javascript" src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="assets/js/script.js"></script>
    </body>
</html>