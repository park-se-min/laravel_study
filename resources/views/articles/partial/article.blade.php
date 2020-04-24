<div class="medie">
	<div class="media-body">
		@include('users.partial.avatar', ['user'=>$article->user])
		<h4 class="media-heading"><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></h4>

		<p class="text-muted">
			<i class="fa fa-user"></i> {{ $article->user->name }}
			<i class="fa fa-click-o"></i> {{ $article->created_at->diffForHumans() }}
		</p>
	</div>
</div>