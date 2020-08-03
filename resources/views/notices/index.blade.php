@extends('layouts.app')

@section('content')
	<div class="page-header">
		<h4>포럼<small>/ 글 목록</small></h4>
	</div>
	<div class="text-right">
		<a href="{{ route('notices.create') }}" class="btn btn-primary">
			<i class="fa fa-plus-circle"></i>새글 쓰기
		</a>
	</div>
	<article>
		@forelse ($notices as $notice)
			<div class="medie">
				<div class="media-body">
					<h4 class="media-heading"><a href="">{{ $notice->notice_id }} - {{ $notice->title }}</a></h4>

					<p class="text-muted">
						<i class="fa fa-user"></i>
						<i class="fa fa-click-o"></i> {{ $notice->created_at }}
					</p>
				</div>
			</div>

		@empty
			글없음
		@endforelse
	</article>


	@if ($notices->count())
		<div class="text-center">
			{!! $notices->appends(Request::except('page'))->render() !!}
		</div>
	@endif

@stop
