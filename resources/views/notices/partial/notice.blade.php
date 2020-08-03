<div class="medie">
	<div class="media-body">
		<h4 class="media-heading"><a href="">{{ $notice->title }}</a></h4>

		<p class="text-muted">
			<i class="fa fa-user"></i>
			<i class="fa fa-click-o"></i> {{ $notice->created_at->diffForHumans() }}
		</p>
	</div>
</div>