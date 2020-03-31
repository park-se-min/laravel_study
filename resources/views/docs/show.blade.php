@extends('layouts.app')

@section('content')
	<div class="container">
		<header>
			<h2>마크다운 뷰어</h2>
		</header>

		<div class="row">
			<div class="col-md-3 docs__sidebar">
				<aside>{!! $index !!}</aside>
			</div>

			<div class="col-md-9 docs__content">
				<aside>{!! $content !!}</aside>
			</div>
		</div>
	</div>
@stop