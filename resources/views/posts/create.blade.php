<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>글 작성</h1>
	<form method="POST" action="/posts">
		@csrf
		<div>
			<input type="text" name="title" placeholder="제목">
		</div>

		<div>
			<textarea name="description" placeholder="내용"></textarea>	
		</div>

		<div>
			<button type="submit">글 작성</button>
		</div>
	</form>
</body>
</html>