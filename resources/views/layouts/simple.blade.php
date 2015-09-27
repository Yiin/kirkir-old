<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') | kirkir</title>
        <link rel="stylesheet" style="text/css" href="/assets/about/style.css">
    </head>
    <body>
        <div id="topMeniu">
            <div class="logo">
                <a href="/"><img src="/assets/about/logo.png"></a>
            </div>
        </div>
        <div id="block">
            <h1>@yield('title')</h1>
        </div>
        
        @yield('content')

        <div id="footer">
            <div id="copy">
                <p>&#169; 2015 kirkir. All rights reserved.</p>
            </div>
            <div id="bottom-meniu">
                <ul>
                    <li><a href="{{ url() }}/">Home</a></li>
                    <li><a href="{{ url() }}/about">About kirkir</a></li>
                    <li><a href="{{ url() }}/team">Team</a></li>
                    <li><a href="{{ url() }}/contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>