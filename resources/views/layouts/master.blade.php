<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>입문</title>
</head>

<body>
	<div class="title m-b-md">
		{{ $asdf or 'hello' }}
	</div>

	@yield('script')

	@yield('content')
	
	2<br>222<br>2
	<br><br><br>
</body>

</html>