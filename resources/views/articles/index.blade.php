@extends('layouts.app')

@section('content')
	<div class="container">
		<hr/>
		<ul>
			@forelse ($articles as $article)
				<li style="margin:15px 0;">
					{{ $article->title }}
					<span style="border: solid 1px #ffcc00; padding: 5px;">
						br {{ $article->user->name }}
					</span>
				</li>
			@empty
				글없음
			@endforelse
		</ul>
	</div>
{{-- 
	@if ($articles->count())
		<div class="text-center">
			{!! $articles->render() !!}
		</div>
	@endif 
 --}}
@stop
