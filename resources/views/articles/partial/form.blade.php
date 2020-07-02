<div class="form-group {{ $errors->has('title') ?'asdf' : '' }}">
	<input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" class="form-control">
	{!! $errors->first('title', '<span class="form-error">:message</span>') !!}
</div>

<textarea name="content" id="content" rows=10 class="form-control">{{ old('content', $article->content) }}</textarea>
{!! $errors->first('content', '<span class="form-error">:message</span>') !!}