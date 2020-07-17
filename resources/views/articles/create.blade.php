@extends('layouts.app')

@section('content')

<div class="container">
	<h1>새 포럼 글 쓰기</h1>

	<hr>

	<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
		{!! csrf_field() !!}

		<div class="form-group {{ $errors->has('title') ?'asdf' : '' }}">
			<input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
			{!! $errors->first('content', '<span class="form-error">:message</span>') !!}
		</div>

		<textarea name="content" id="content" rows=10 class="form-control">{{ old('content') }}</textarea>

		<div class="form-group {{ $errors->has('file') ?'has-error' : '' }}">
			<label for="files">파일</label>
			<input type="file" name="files[]" id="files" class="form-control" multiple="multiple">
			{!! $errors->first('files.0', '<span class="form-error">:message</span>') !!}
		</div>

		<button type="submit" class="btn btn-primary">저장하기</button>

	</form>

</div>

@stop