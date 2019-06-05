@extends('master')

@section('content')



<div class="ui segment">
	<div class="ui column very relaxed grid">
		<div class="wide column">
			<h1>{{ $product->serial_name }} 출하내역 수정</h1>

			<form class="ui form" id="frm" method="POST" action="/product/{{ $product->id }}">
				@csrf
				@method('PATCH')



 

<div class="ui segment">
  <div class="ui two column very relaxed grid">
    <div class="column">

    	{{--프로젝트--}}
        <div class="field">
          <div class="ui selection dropdown">
            <input type="hidden" name="shipment_daily" class="input {{ $errors->has('shipment_daily') ? 'is-danger' : '' }}" value="{{ $product->shipment_daily }}" required>
            <i class="dropdown icon"></i>
            <div class="default text" style="color: black">프로젝트 명</div>
            <div class="menu">
              @foreach ($projects_names as $projects_name)
              <div class="item">{{$projects_name->project_name }}</div>
              @endforeach
            </div>
          </div>
        </div>
        {{--프로젝트--}}

        {{--출하일--}}
        <div class="field">
        	<label>출하일</label>
        	<input class="input {{ $errors->has('project_name') ? 'is-danger' : '' }}" type="date" name="shipment" value="{{ $product->shipment }}" required>
        </div>
        {{--출하일--}}

         {{--편성--}}
        <div class="field">
        	<label>편성</label>
        	<input class="input {{ $errors->has('project_name') ? 'is-danger' : '' }}" type="text" name="set_set" value="{{ $product->set_set }}">
        </div>
         {{--편성--}}

         {{--불량--}}
         <div class="field">
         	<label>불량</label>
         	<input class="input {{ $errors->has('project_name') ? 'is-danger' : '' }}" type="number" name="faulty" value="{{ $product->faulty }}" required>
         </div>
         {{--불량--}}

         {{--타입--}}
         <div class="field">
         	<label>타입</label>
         	<input  type="text" name="type" value="{{ $product->type }}" required>
         </div>
         {{--타입--}}

         {{--인수팀--}}
         <div class="field">
         	<label>인수팀</label>
         	<input  type="text" name="receiver_team" value="{{ $product->receiver_team }}" required>
         </div>
         {{--인수팀--}}

         {{--인수자--}}
         <div class="field">
         	<label>인수자</label>
         	<input  type="text" name="receiver" value="{{ $product->receiver }}" required>
         </div>
         {{--인수자--}}

    </div>
    <div class="column">

    	{{--TOP부품수량--}}
    	<div class="field">
    		<label>TOP_부품수량</label>
    		<div class="ui disabled input">
    			<input  type="number" name="aoi_top_part_num" value="{{ $product->aoi_top_part_num }}" required>
    		</div>
    	</div>
    	{{--TOP부품수량--}}

    	{{--BOT부품수량--}}
    	<div class="field">
    		<label>BOT_부품수량</label>
    		<div class="ui disabled input">
    			<input  type="number" name="aoi_bot_part_num" value="{{ $product->aoi_bot_part_num }}" required>
    		</div>
    	</div>
    	{{--BOT부품수량--}}

    	{{--코팅두께--}}
    	<div class="field">
    		<label>코팅두께</label>
    		<input  type="number" name="coting_t" value="{{ $product->coting_t }}" required>
    	</div>
    	{{--코팅두께--}}	

    	{{--코팅육안검사--}}	
    	<div class="field">
    		<label>코팅육안검사</label>
    		<input  type="text" name="coting_inp" value="{{ $product->coting_inp }}" required>
    	</div>
    	{{--코팅육안검사--}}	

    	{{--인계자--}}	
    	<div class="field">
    		<label>인계자</label>
    		<input  type="text" name="ship_user" value="{{ $product->ship_user }}" required>
    	</div>
    	{{--인계자--}}

    	{{--생성한 날짜--}}
    	<div class="field">
    		<label>생성한 날짜</label>
    		<div class="ui disabled input">
    			<input  type="text" name="created_at" value="{{ $product->created_at }}" required>
    		</div>
    	</div>
    	{{--생성한 날짜--}}

    	{{--수정한 날짜--}}
    	<div class="field">
    		<label>수정한 날짜</label>
    		<div class="ui disabled input">
    			<input  type="text" name="updated_at" value="{{ $product->updated_at }}" required>
    		</div>
    	</div>
    	{{--수정한 날짜--}}

    </div>
  </div>
  <div class="ui vertical divider"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
    과
  </font></font></div>
</div>

<label>메모</label>
<div class="ui segment">
	<input  type="text" name="note" value="{{ $product->note }}" required>
</div>

  





	
				


	

			



			</form>

			<br>
			<button class="ui secondary button" onclick="document.getElementById('frm').submit();"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
				출하내역 수정
			</font></font></button>

			<!-- <button class="ui pink button"  onclick="button_event();">출하내역 삭제</button>   -->

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