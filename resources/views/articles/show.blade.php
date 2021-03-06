@extends('layouts.app')

@section('content')

<div class="container">
	<div class="page-header">
		<h4>포럼<small>/ {{ $article->title }}</small></h4>
	</div>

	<hr>

	<article data-id="{{ $article->id }}" id="item__article">
		@include('articles.partial.article', compact('article'))
	</article>

	<div class="text-center action__article">
		@can('update', $article)
			<a href="{{ route('articles.edit', $article->id) }}" class="btn btn-info">
				<i class="fa fa-pencil"></i>글 수정
			</a>
		@endcan

		@can('delete', $article)
			<a href="{{ route('articles.delete2', $article->id) }}" class="btn btn-info">
				<i class="fa fa-pencil"></i>글 삭제
			</a>

			<button class="btn btn-danger button__delete">
				<i class="fa fa-trash-o"></i>글 삭제
			</button>
		@endcan

		<a href="{{ route('articles.index') }}" class="btn btn-default">
			<i class="fa fa-list"></i>글 목록
		</a>
	</div>

</div>

@stop

@section('script')
	<script>
		$.ajaxSetup({
			headers:{
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('.button__delete').on('click', function (e) {
			var articleId = $('article').data('id');

			if (confirm('글을 삭제')) {
				$.ajax({
					type: 'DELETE',
					url: '/articles/' + articleId
				}).then(function () {
					window.location.href = '/articles';
				});
			}
		});
		</script>
@stop