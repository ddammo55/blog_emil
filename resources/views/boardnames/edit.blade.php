@extends('master')

@section('content')
{{-- @foreach($boardName as $board)
{{ $board->id }}
@endforeach --}}
    <form method="POST" action="/boardnames/{{ $board_name->id }}">
        @csrf
        @method('PATCH')
        <div>
            <input type="text" name=""  value="{{ $board_name->boardnames }}">
        </div>
 
        <div>
            <textarea name="description"></textarea>    
        </div>
 
        <div>
            <button type="submit">글 수정</button>
        </div>
    </form>

@endsection