@extends('master')

@section('content')

<div class="column">
	<div class="ui message">
		<h1 class="ui header">TGIS 개량</h1>
		<p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
		<a class="ui blue button">자세히 보기</a>
	</div>
</div>

<div class="ui divider"></div>

<form method="get" action="/pbas/create" style="margin-bottom: 10px;">
	<button class="ui teal button" type="submit">
		글 작성하기
	</button>
</form>

@stop