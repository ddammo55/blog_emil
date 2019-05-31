@extends('master')

@section('content')

<div class="ui segment">
  <div class="ui two column very relaxed grid">
    <div class="five wide column">
        <h1>보드명 작성</h1>
    	<form class="ui form" method="POST" action="/boardnames">
    		@csrf
    		<div class="field">
    			<input class="input {{ $errors->has('project_name') ? 'is-danger' : '' }}" type="text" name="boardname" value="{{ old('project_name') }}" placeholder="보드 명" required>
    		</div>	

    		<div class="field">
    			<input class="input {{ $errors->has('top_num') ? 'is-danger' : '' }}" type="number" name="top_num" value="{{ old('top_num') }}" placeholder="TOP 부품수량" required>
    		</div>	

    		<div class="field">
    			<input class="input {{ $errors->has('bot_num') ? 'is-danger' : '' }}" type="number" name="bot_num" value="{{ old('bot_num') }}" placeholder="BOT 부품수량" required>
    		</div>

    		<div class="field">
    			<input class="input {{ $errors->has('method') ? 'is-danger' : '' }}" type="text" name="method" value="{{ old('method') }}" placeholder="방법" required>
    		</div>

    		<div class="field">
    			<input class="input {{ $errors->has('note') ? 'is-danger' : '' }}" type="text" name="note" value="{{ old('note') }}" placeholder="메모">
    		</div>



    		<div class="field">
    			<button class="ui button" type="submit">보드명 작성</button>
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
    <div class="eleven wide column">
    	<table class="ui celled table">

    		<thead>
    			<tr>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">보드명</font></font></th>
    				<th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TOP 부품수량</font></font></th>
    				<th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">BOT 부품수량</font></font></th>
    				<th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">방법</font></font></th>
    				<th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">메모</font></font></th>
    			</tr>
            </thead>
    			<tbody>
    					@foreach ($boardnames as $boardname)
    				<tr>
    					<td>{!! $boardname->id!!}</td>
    					<td><a href="/projects/{{ $boardname->id }}/edit">{{$boardname->boardname}}</a></td>
    					<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{!! $boardname->top_num!!}</font></font></td>
    					<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{!! $boardname->bot_num!!}</font></font></td>
    					<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{!! $boardname->method!!}</font></font></td>
    					<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{!! $boardname->note!!}</font></font></td>
    				</tr>
    						@endforeach
    	
    	
    
    	 </tbody>
    </table>

    {{-- 페이지네이션 --}}
@if($boardnames->count())
	{{ $boardnames->links() }}
@endif
    </div>
  </div>

</div>




@endsection