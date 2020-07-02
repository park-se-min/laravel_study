@extends('layouts.app')

@section('content')

<div class="container">
	<h1>새 포럼 글 수정/{{ $article->title }}</small></h4>

	<hr>

	<form action="{{ route('articles.update', $article->id) }}" method="POST">
		{!! csrf_field() !!}
		{!! method_field('PUT') !!}

		@include('articles.partial.form')

		<button type="submit" class="btn btn-primary">수정하기</button>

	</form>

</div>

@stop