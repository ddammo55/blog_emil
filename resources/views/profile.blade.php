@extends('master')


@section('content')


<div class="ui centered card">
  <div class="image">
    <img src="/images/elyse.png">
  </div>
  <div class="content">
    <a class="header"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{Auth()->user()->name}}</font></font></a>
  </div>
  <div class="extra content">
    <a>
      <i class="users icon"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        {{Auth()->user()->email}}
      </font></font></a>
    </div>
  </div>  

  @endsection
