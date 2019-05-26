@extends('master')

@section('content')

<div class="ui segment">
  <div class="ui two column very relaxed grid">
    <div class="five wide column">
        <h1>보드명 작성</h1>
    	<form class="ui form" method="POST" action="/projects">
    		@csrf
    		<div class="field">
    			<input class="input {{ $errors->has('board_name') ? 'is-danger' : '' }}" type="text" name="board_name" value="{{ old('board_name') }}" placeholder="보드명" required>
    		</div>	

    		<div class="field">
    			<input class="input {{ $errors->has('top_num') ? 'is-danger' : '' }}" type="number" name="top_num" value="{{ old('top_num') }}" placeholder="Top부품수량" required>
    		</div>	

    		<div class="field">
    			<input class="input {{ $errors->has('bot_num') ? 'is-danger' : '' }}" type="number" name="bot_num" value="{{ old('bot_num') }}" placeholder="Bot부품수량" required>
    		</div>

    		<div class="field">
    			<input class="input {{ $errors->has('unit') ? 'is-danger' : '' }}" type="text" name="unit" value="{{ old('unit') }}" placeholder="차종" required>
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
    			<tr><th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">보드명</font></font></th>
    				<th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TOP부품수량</font></font></th>
    				<th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">BOT부품수량</font></font></th>
    				<th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">차종</font></font></th>
    				<th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">메모</font></font></th>
    			</tr></thead>
    			<tbody>
    					@foreach ($boardnames as $boardname)
    				<tr>
    					
    					<td><a href="/projects/{{ $boardname->id }}/edit">{{$boardname->board_name}}</a></td>
    					<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{!! $boardname->top_num!!}</font></font></td>
    					<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{!! $boardname->bot_num!!}</font></font></td>
    					<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{!! $boardname->unit!!}</font></font></td>
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