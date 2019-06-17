@extends('master')

@section('content')

<h1>글 작성</h1>
<form class="ui form" method="POST" action="/pbas">
	@csrf
	<div class="field">
		<input class="input {{ $errors->has('title') ? 'is-danger' : '' }}" type="text" name="title" value="{{ old('title') }}" placeholder="제목">
	</div>

	<div class="field">
		    <!-- The toolbar will be rendered in this container. -->
 
		  <!-- The toolbar will be rendered in this container. -->
    
    		<textarea  id="editor" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="content" value="{{ old('description') }}" placeholder="내용"></textarea>	
	</div>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

	<div class="field">
		<button class="ui button" type="submit">글 작성</button>
	</div>
</form>

@if($errors->any())
<div class="ui pink inverted segment">

	<ul>	
		@foreach ($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>	
@endif	

@endsection