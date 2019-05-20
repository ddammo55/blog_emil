<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PCB팀 생산 공정 관리 시스템</title>

  <link rel="stylesheet" type="text/css" href="/semantic/semantic.css">
  <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <script src="/semantic/semantic.js"></script>
</head>
<style media="screen">
  body{
    padding: 1rem;
  }
  .pusher{
   margin-left: 15rem;
 }
 .text{
   margin-left: 1rem;
   margin-top: 2px;;
   color:white;
   font-size: 15px;
 }
</style>
<body>
  <div class="ui sidebar visible inverted vertical menu">
    <div class="item">
      <a class="ui logo icon image" href="/">
        <img src="/images/logo.png" width="30px" hight="30px">
      </a>
      <a href="/"><b>PCB 공정 관리2</b></a>
    </div>

    {{-- 게스트면 --}}
    @guest
    <a class="item" href="{{ url('/user/login') }}">
      <b>로그인</b>
    </a>

    {{-- 회원이면 --}}
    @else
    
    {{-- 회원이면 이름 출력 --}}
    <div class="item">
      <a  href="{{ url('/profile') }}">
       {{auth()->user()->name}} 
     </a>
   </div>

   {{-- 회원이면 로그아웃처리 --}}
   <a class="item" href="{{ route('logout') }}"
   onclick="event.preventDefault();
   document.getElementById('logout-form').submit();">
   로그아웃
 </a>

 <form id="logout-form" action="{{ route('logout') }}" method="POST">
  @csrf
</form>
@endguest






<a class="item" href="/introduction/getting-started.html">
  <b>통계 보기</b>
</a>
<a class="item" href="/product">
  <b>추적 성 관리</b>
</a>

<div class="menu">
    <a class="item" href="/product/create">
      시리얼번호 입력
    </a>

    <a class="item" href="/shipment">
      출하내역 입력
    </a>
</div>

<a class="item" href="/posts">
  <b>게시판</b>
</a>
<div class="item">
  <div class="header">제조 영상</div>
  <div class="menu">

    <a class="item" href="/introduction/integrations.html">
      PBA
    </a>

    <a class="item" href="/introduction/build-tools.html">
      ASS'Y
    </a>

  </div>
</div>
<div class="item">
  <div class="header">참고 자료</div>
  <div class="menu">

    <a class="item" href="/usage/theming.html">
      Theming
    </a>

    <a class="item" href="/usage/layout.html">
      Layouts
    </a>

  </div>
</div>
<div class="item">
  <div class=" header">참고 자료</div>
  <div class="menu">

    <a class="item" href="/globals/reset.html">
      Reset

    </a>

    <a class="item" href="/globals/site.html">
      Site

    </a>

  </div>
</div>
</div>

<div class="pusher">
  @if (session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
  @endif
  @include('flash::message')
  @yield('content')
</div>


<script>
  $('.ui.dropdown')
  .dropdown()
  ;

</script>
</body>
</html>
