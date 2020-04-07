<!DOCTYPE html>
<html>
<head>
    <!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	    <!-- Styles -->
	<link href="{{ elixir('css/app.css') }}" rel="stylesheet">

	@yield('style')
</head>
<body id="app-layout">

	@include('layouts.partial.navigation')

	<div class="container">
		@include('flash::message')
		@yield('content')
	</div>

	@include('layouts.partial.footer')

    <!-- Scripts -->
	<script src="{{ elixir('js/app.js') }}"></script>

	@yield('script')

</body>
</html>
