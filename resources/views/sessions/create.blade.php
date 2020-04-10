@extends('layouts.app')

@section('content')
<form action="{{ route('sessions.store') }}" method="POST" role="form" class="form__auth">
	{!! csrf_field() !!}

	<div class="form-group">
		<div class="checkbox">
			<label>
				<input type="checkbox" name="remember" value="{{ old('remember', 1) }}" checked>
				로그인 기억
			</label>
		</div>
	</div>

	<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
		<input type="email" name="email" class="form-control" placeholder="{{ trans('auth.form.email') }}"	value="{{ old('email') }}" />
		{!! $errors->first('email', '<span class="form-error">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
		<input type="password" name="password" class="form-control" placeholder="{{ trans('auth.form.password') }}" />
		{!! $errors->first('password', '<span class="form-error">:message</span>') !!}
	</div>

	<div>
		<p class="text-center">
			회원이 아니라면?
			<a href="{{ route('users.create') }}">가입하자</a>
		</p>
		<p class="text-center">
			<a href="{{ route('remind.create') }}">비밀번호 잊었어?</a>
		</p>
	</div>

	<div class="form-group">
		<button class="btn btn-primary btn-lg btn-block" style="submit">
			로긴
		</button>
	</div>

</form>
@stop