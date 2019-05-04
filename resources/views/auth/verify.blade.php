@extends('master')

@section('content')

<div class="ui equal width grid">
  <div class="column">
    <!-- -->
</div>
<div class="eight wide column">

    <div class="ui icon message">
      <i class="envelope open outline icon"></i>
      <div class="content">
        <div class="header"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
          {{ __('당신의 이메일 주소를 확인해 주세요.') }}

          @if (session('resent'))
          <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        @endif
    </font></font></div>
    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        {{ __('계속하기 전에 이메일에 확인 링크가 있는지 확인하십시오.') }}
        {{ __('이메일을받지 못했다면') }}, <a href="{{ route('verification.resend') }}">{{ __('다른 것을 요청하려면 여기를 클릭하십시오.') }}</a>.
    </font></font></p>
</div>
</div>

</div>
<div class="column">
   <!-- -->
</div>
</div>

@endsection
