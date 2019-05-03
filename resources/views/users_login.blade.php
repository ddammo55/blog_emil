@extends('master')

@section('content')

<div class="ui two column centered grid">
	<div class="ui middle aligned center aligned grid">
		<div class="column">
			<h2 class="ui teal image header">
				<img src="/images/logo.png" class="image">
				<div class="content">
					당신의 계정에 로그인 하십시오.
				</div>
			</h2>
			<form class="ui large form" action="{{route('login')}}" method="POST">
				 @csrf
				<div class="ui stacked segment">
					<div class="field">
						<div class="ui left icon input">
							<i class="user icon"></i>
							<input type="text" name="email" placeholder="E-mail 주소">
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="lock icon"></i>
							<input type="password" name="password" placeholder="패스워드">
						</div>
					</div>
					<div>
						<button class="ui fluid large teal submit button" type="submit">
							로그인 하기
						</button>
					</div>
				</div>

				<div class="ui error message"></div>

			</form>

			<div class="ui message">
				처음이신가요? &nbsp;<a href="{{ route('register') }}">회원가입</a>
			</div>
		</div>
	</div>
</div>


@stop