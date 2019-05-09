@extends('master')

@section('content')

<div class="ui relaxed divided list">
	@foreach($posts as $post)

  <div class="item">
    <i class="play middle aligned icon">&nbsp;{{ $post->id }}</i>
    <div class="content"> <div class="right floated content">
      <div class="ui button"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">더하다</font></font></div>
    </div>
      <a class="header"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
      	<a href="/posts/{{$post->id}}">
      	{{ $post->title }}
      	</a>
      </font></font>
      <div class="description"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $post->description }}</font></font>
      </div>

    </div>
  </div>

@endforeach
</div>


	<form method="get" action="/posts/create">
		<button class="ui teal button" type="submit">
			글 작성하기
		</button>
	</form>

@if($posts->count())
<div class="ui borderless menu">
	{!! $posts->render() !!}
</div>
@endif


@endsection