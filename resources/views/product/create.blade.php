@extends('master')

@section('content')

<h1>시리얼번호 작성</h1>
<form class="ui form" method="POST" action="/product">
	@csrf
	<div class="field">
		<input class="input {{ $errors->has('serial_start_no') ? 'is-danger' : '' }}" type="text" name="serial_start_no" value="{{ old('title') }}" placeholder="시작번호">
	</div>

	<div class="field">
		<input class="input {{ $errors->has('serial_end_no') ? 'is-danger' : '' }}" type="text" name="serial_end_no" value="{{ old('title') }}" placeholder="끝번호">
	</div>

	<div class="field">
		<button class="ui button" type="submit">시리얼번호 작성</button>
	</div>
</form>

@if($errors->any())
<div class="ui red inverted segment">

	<ul>	
		@foreach ($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>	
@endif	
@endsection