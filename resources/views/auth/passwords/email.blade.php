@extends('master')

@section('content')

<div class="ui two column centered grid">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui teal image header">
                <img src="/images/logo.png" class="image">
                <div class="content">
                    패스워드 재설정 이메일 보내기
                </div>
            </h2>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form class="ui large form" action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="ui stacked segment">

                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input id="email" type="email" name="email" placeholder="E-mail 주소" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div>
                        <button class="ui fluid large teal submit button" type="submit">
                            재설정 이메일 보내기
                        </button>
                    </div>
                </div>



            </form>

        </div>
    </div>
</div>


@endsection
