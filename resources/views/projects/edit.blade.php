@extends('master')

@section('content')

<div class="ui segment">
	<div class="ui column very relaxed grid">
		<div class="wide column">
			<h1>프로젝트명 수정</h1>
			<form class="ui form" method="POST" action="/projects/{{ $project->id }}">
				@csrf
				@method('PATCH')
				<div class="field">
					<input class="input {{ $errors->has('project_name') ? 'is-danger' : '' }}" type="text" name="project_name" value="{{$project->project_name}}" placeholder="프로젝트 명" required>
				</div>	

				<div class="field">
					<input class="input {{ $errors->has('project_code') ? 'is-danger' : '' }}" type="text" name="project_code" value="{{$project->project_code}}" placeholder="프로젝트 코드" required>
				</div>	

				<div class="field">
					<input class="input {{ $errors->has('car') ? 'is-danger' : '' }}" type="number" name="car" value="{{$project->car}}" placeholder="량" required>
				</div>

				<div class="field">
					<input class="input {{ $errors->has('kinds') ? 'is-danger' : '' }}" type="text" name="kinds" value="{{$project->kinds}}" placeholder="종류" required>
				</div>

				<div class="field">
					<input class="input {{ $errors->has('note') ? 'is-danger' : '' }}" type="text" name="note" value="{{$project->note}}" placeholder="메모">
				</div>



				<div class="field">
					<button class="ui button" type="submit">프로젝트명 수정</button>
				</div>
			</form>

			<form method="POST" action="/projects/{{ $project->id }}">
				@method('DELETE')
				@csrf
				<div class="field">
				<button class="ui button" type="submit" onclick="button_event();">글 삭제</button>   
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
		</div>

	</div>
</div>

<div class="ui modal">
  <div class="header">Header</div>
  <div class="content">
    <p></p>
  </div>
  <div class="actions">
    <div class="ui approve button">Approve</div>
    <div class="ui button">Neutral</div>
    <div class="ui cancel button">Cancel</div>
  </div>
</div>



<script type="text/javascript">
<!--
function button_event(){
if (confirm("정말 삭제하시겠습니까??") == true){    //확인
    document.form.submit();
}else{   //취소
    return;
}
}
//-->
</script>

@endsection