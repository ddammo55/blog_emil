@extends('master')

@section('content')

<h1>PBA 제조영상 작성</h1>
<form class="ui form" method="POST" action="/pbas" enctype="multipart/form-data">
	@csrf
  <div class="field">
    <div class="ui selection dropdown">
      <input type="hidden" name="board_name">
      <i class="dropdown icon"></i>
      <div class="default text" style="color: black">보드명</div>
      <div class="menu">
        @foreach ($pcb_lists as $pcb_list)
        <div class="item">{{$pcb_list->boardname }}</div>
        @endforeach
      </div>
    </div>
  </div>

	<div class="field">
		<input class="input {{ $errors->has('title') ? 'is-danger' : '' }}" type="text" name="title" value="{{ old('title') }}" placeholder="제목">
	</div>


	<textarea name="content" class="my-editor">여기에 작성해 주세요.</textarea>


<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>


    {{-- 파일 --}}
    <div class="field">
    	<label for="file">파일</label>
    	<input type="file" name="files[]" id="files" class="form-control" multiple="multiple"/>{!! $errors->first('files.0', '<span class="form-error">:message</span>') !!}
    {{-- 파일 --}} 	

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