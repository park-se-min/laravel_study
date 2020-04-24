@extends('layouts.app')

@section('content')

<div class="container">
	<h1>새 포럼 글 수정/{{ $article->title }}</small></h4>

	<hr>

	<form action="{{ route('articles.store') }}" method="POST">
		{!! csrf_field() !!}

		<div class="form-group {{ $errors->has('title') ?'asdf' : '' }}">
			<input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
			{!! $errors->first('content', '<span class="form-error">:message</span>') !!}
		</div>

		<textarea name="content" id="content" rows=10 class="form-control">{{ old('content') }}</textarea>

		<button type="submit" class="btn btn-primary">저장하기</button>

	</form>

</div>

@stop