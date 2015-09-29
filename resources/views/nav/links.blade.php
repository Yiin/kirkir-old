@if (Auth::check())
    <div class="nav-links">
    	<a href="menu">Menu</a>
    	<div class="divider">/</div>
    	<a href="logout">Logout</a>
    	<div class="profile-pic" 
    		 style="background-image: url({{ Auth::user()->photo }})"
    	>
    	</div>
    </div>
@else
    <div class="nav-links">
    	<a href="login/fb">Login with Facebook</a>
    	<div class="divider">/</div>
    	<a href="login/gmail">Gmail</a>
    </div>
@endif