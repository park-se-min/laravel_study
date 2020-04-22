@extends('layouts.app')

@section('content')
	<div class="page-header">
		<h4>포럼<small>/ 글 목록</small></h4>
	</div>
	<div class="text-right">
		<a href="{{ route('articles.create') }}" class="btn btn-primary">
			<i class="fa fa-plus-circle"></i>새글 쓰기
		</a>
	</div>

	<div class="container">
		<hr/>
		<ul>
			@forelse ($articles as $article)
				<li style="margin:15px 0;">
					1{{ $article->title }}
					<span style="border: solid 1px #ffcc00; padding: 5px;">
						br {{ $article->user->name }}
					</span>
				</li>
			@empty
				글없음
			@endforelse
		</ul>
	</div>

	@if ($articles->count())
		<div class="text-center">
			{!! $articles->render() !!}
		</div>
	@endif

@stop
