@extends('master')

@section('content')



<div class="ui segment">
  <div class="ui two column very relaxed grid">
    <div class="column">
    	<h1>시리얼번호 작성</h1>
    	<form class="ui form" method="POST" action="/product">
    		@csrf
    		<div class="field">
    			<input class="input {{ $errors->has('serial_start_no') ? 'is-danger' : '' }}" type="text" name="serial_start_no" value="{{ old('serial_start_no') }} {{ $serial_start_no_int}}" placeholder="시작번호">
    		</div>

    		<div class="field">
    			<input class="input {{ $errors->has('serial_end_no') ? 'is-danger' : '' }}" type="text" name="serial_end_no" value="{{ old('serial_end_no') }}" placeholder="끝번호">
    		</div>

    		<input type="hidden" name="board_name" value="test_name">

    		<div class="field">
    			<button class="ui button" type="submit">시리얼번호 작성</button>
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

    	<div class="ui unstackable steps">
    		@for ($i = 1; $i < 13; $i++)
         <!-- 현재월이 과 같다면 색깔들어오게 -->
    			 @if (date('m') == $i)
    		<div class="active step" style="padding: 15px; background-color: tomato">
    			 @else
        <div class="step" style="padding: 15px;">
            @endif
          <div class="content" >
    				<div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $i }}월 </font></font><br>
                @if ($i == 1)
    						A
    						@elseif ($i == 2)
    						B
    						@elseif ($i == 3)
    						C
                @elseif ($i == 4)
                D
                @elseif ($i == 5)
                E
                @elseif ($i == 6)
                F
                @elseif ($i == 7)
                G
                @elseif ($i == 8)
                H
                @elseif ($i == 9)
                I
                @elseif ($i == 10)
                J
                @elseif ($i == 11)
                K
                @elseif ($i == 12)
                L
    					@endif
    				</div>
    			</div>
    		</div>
    		@endfor
    	</div>

    </div>



    <div class="column">
      <h1>최근 시리얼번호</h1>

      <table class="ui celled padded table">
  <thead>
    <tr><th class="ui center aligned">ID</th>
    <th class="ui center aligned">시리얼번호</th>
    <th class="ui center aligned">보드명</th>
    <th class="ui center aligned">생산일</th>
    <th class="ui center aligned">내용</th>
  </tr></thead>
  @foreach ($products as $product)
  <tbody>
    <tr>
      <td>
        <p class="ui center aligned">
        	{{ $product->id }}
      </td>
      <td class="ui center aligned" style="padding: 3px;"> 	
        {{ $product->serial_name }}
      </td>
      <td class="ui center aligned">
       {{ $product->board_name }}
      </td>
      <td class="ui center aligned">
        {{ $product->product_date }}
      </td>
      <td class="ui center aligned">내용</td>
    </tr>
  </tbody>
  @endforeach
  <tfoot>
    <tr><th colspan="5">
      <div class="ui right floated pagination menu">
      	{{-- 페이지네이션 --}}
      	@if($products->count())
      	{{ $products->links() }}
      	@endif
      </div>
    </th>
  </tr></tfoot>
</table>




    </div>
  </div>
  <div class="ui vertical divider"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
    
  </font></font></div>
</div>


@endsection