@extends('layouts.app')

@section('content')

<div class="container">
	<ul>
		@forelse ($articles as $article)
			<li>
				{{ $article->title }}
				\\\
				<small>
					br {{ $article->user->name }}
				</small>
			</li>
		@empty
			글없음
		@endforelse
	</ul>
</div>

@stop
