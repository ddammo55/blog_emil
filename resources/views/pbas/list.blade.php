@extends('master')

@section('content')

<div class="column">
	<div class="ui message">
		<div class="ui very relaxed items">
			<div class="item">
				<div class="image">
					<img src="https://postfiles.pstatic.net/20140723_246/moisophiaj_14061212839089rj4r_JPEG/%BF%B9%BB%DB_%B0%FA%C0%CF_%C0%CC%B9%CC%C1%F6_%288%29.jpg?type=w1" width="100px" height="100px">
				</div>
				<div class="content">
					<a class="ui header" href="#link">Board_Name_Type01</a>
					<div class="ui divider"></div>
					<p>작성일 : 2019.10.10</p>
					<p>작성자 : 홍길동</p>
					<div class="description">
						<p>Ut imperdiet dignissim feugiat. Phasellus tristique odio eu justo dapibus, nec rutrum ipsum luctus. Ut posuere nec tortor eu ullamcorper. <a href="#link">Etiam pellentesque</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="ui divider"></div>

<form method="get" action="/pbas/create" style="margin-bottom: 10px;">
	<button class="ui teal button" type="submit">
		글 작성하기
	</button>
</form>

@stop