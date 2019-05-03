@extends('master')

@section('content')

<form class="ui form" action="{{ url('/login/auth') }}" method="post">
  @csrf

  <div class="field">
    <label>아이디</label>
    <input type="text" name="name" placeholder="아이디">
  </div>

  <div class="field">
    <label>이메일</label>
    <input type="email" name="email" placeholder="이메일">
  </div>

  <div class="field">
    <label>패스워드</label>
    <input type="text" name="password" placeholder="패스워드">
  </div>

  <button class="ui button" type="submit">회원가입</button>

</form>

@endsection
