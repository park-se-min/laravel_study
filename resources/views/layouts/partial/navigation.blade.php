<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">

      <!-- Collapsed Hamburger -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>

	<div class="collapse navbar-collapse" id="app-navbar-collapse">
		<!-- Left Side Of Navbar -->
		<ul class="nav navbar-nav">
			&nbsp;
		</ul>

		<!-- Right Side Of Navbar -->
		<ul class="nav navbar-nav navbar-right">
			<!-- Authentication Links -->
			<li><a href="{{ url('/') }}">HOME</a></li>
			<li><a href="{{ route('articles.create') }}">Articles/create</a></li>
			<li><a href="{{ route('articles.index') }}">Articles</a></li>
			<li><a href="{{ url('/docs') }}">Docs</a></li>
			@if (Auth::guest())
				<li><a href="{{ url('/social/github') }}">github Login</a></li>
				<li><a href="{{ url('/auth/login') }}">Login</a></li>
				<li><a href="{{ url('/auth/register') }}">Register</a></li>
			@else
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						{{ Auth::user()->name }} <span class="caret"></span>
					</a>

					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="{{ url('/auth/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								Logout
							</a>

							<form id="logout-form" action="{{ url('/auth/logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</li>
			@endif
		</ul>
	</div>

  </div>
</nav>