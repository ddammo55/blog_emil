@extends('master')

@section('content')

<div class="ui equal width grid">
  <div class="column">
    <!-- -->
</div>
<div class="eight wide column">
    <div class="ui segment">
      <h2 class="ui teal image header">
        <img src="/images/logo.png" class="image">
        <div class="content">
          비밀번호를 재설정 하십시오.
      </div>
  </h2>
  <form action="{{ route('password.update') }}" method="POST" role="form" class="ui form">
     @csrf

     <input type="hidden" name="token" value="{{ $token }}">

     {{-- 이메일 --}}
     <div class="field {{ $errors->has('email') ? 'has-error' : '' }}">
        <input id="email" type="email" name="email" class="form-control" placeholder="이메일" @error('email') is-invalid @enderror name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {{-- 패스워드 --}}
    <div class="field {{ $errors->has('password') ? 'has-error' : '' }}">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="비밀번호 6자리 이상"/>

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

    </div>


    {{-- 패스워드 확인 --}}
    <div class="field {{ $errors->has('password') ? 'has-error' : '' }}">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="비밀번호 확인 6자리 이상" />

    </div>

    {{-- 재설정 버튼 --}}
    <div class="field">
        <button class="ui button" type="submit">
          재설정 하기
      </button>
  </div>
</form>
</div>
</div>
<div class="column">
   <!-- -->
</div>
</div>


@endsection
"