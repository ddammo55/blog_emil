@extends('master')

@section('content')

<div class="ui segment">
	<div class="ui column very relaxed grid">
		<div class="wide column">
			<h1>{{ $product->serial_name }} 출하내역 수정</h1>

			<form class="ui form" id="frm" method="POST" action="/product/{{ $product->id }}">
				@csrf
				@method('PATCH')

        <div class="field">
        	<label>프로젝트</label>
          <div class="ui selection dropdown">
            <input type="hidden" name="project" class="input {{ $errors->has('project') ? 'is-danger' : '' }}" value="{{ $product->shipment_daily }}" required>
            <i class="dropdown icon"></i>
            <div class="default text" style="color: black">프로젝트 명</div>
            <div class="menu">
              @foreach ($projects_names as $projects_name)
              <div class="item">{{$projects_name->project_name }}</div>
              @endforeach
            </div>
          </div>
        </div>

				<div class="field">
				<label>출하일</label>
					<input class="input {{ $errors->has('project_name') ? 'is-danger' : '' }}" type="date" name="project_name" value="{{ $product->shipment }}" required>
				</div>

				<div class="field">
				<label>편성</label>
					<input class="input {{ $errors->has('project_name') ? 'is-danger' : '' }}" type="text" name="project_name" value="{{ $product->set_set }}">
				</div>

				<div class="field">
				<label>불량</label>
					<input class="input {{ $errors->has('project_name') ? 'is-danger' : '' }}" type="text" name="project_name" value="{{ $product->faulty }}" required>
				</div>		



			</form>

			<br>
			<button class="ui secondary button" onclick="document.getElementById('frm').submit();"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
				프로젝트명 수정
			</font></font></button>

			<button class="ui pink button"  onclick="button_event();">프로젝트 삭제</button>  

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
	<i class="close icon"></i>
	<div class="header">
			<i class="large red exclamation triangle icon"></i>
			프로젝트명 삭제
	</div>
	<div class="image content">
		<div class="image">
			<h3>정말로 삭제하시겠습니까?</h3>
		</div>
		<div class="description">
			<h3>삭제하면 다시 복구할 수 없습니다.</h3>
		</div>
	</div>
	<div class="actions">
		<div style="border: 1px; float:right">
			<table>
				<tr>
					<td class="right floated content" >
						<div class="ui black deny button" >
							<font style="vertical-align: inherit;">취소</font>
						</div>
					</td>

					<td>
						<form method="POST" id="frm2" action="">
							@method('DELETE')
							@csrf
							<button class="ui pink deny button" type="submit" name="DELETE" value="DELETE">삭제</button>
						</form>
					</td>
				</tr>
			</table>
		</div>
		<p style="clear: both;">
	</div>
</div>


<script type="text/javascript">
 function button_event(){
$('.ui.modal')
  .modal('show')
;
}
</script>

@endsection