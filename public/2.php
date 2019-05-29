<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <link rel="stylesheet" type="text/css" href="/semantic/semantic.css">
  <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <script src="/semantic/semantic.js"></script>
</head>
<body>

<button onclick="button_event()">클릭</button>


<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Modal Title
  </div>
  <div class="image content">
    <div class="image">
      An image can appear on left or an icon
    </div>
    <div class="description">
      A description can appear on the right
    </div>
  </div>
  <div class="actions">
    <div class="ui button">Cancel</div>
    <div class="ui button">OK</div>
  </div>
</div>

<script type="text/javascript">
	function button_event(){
$('.ui.modal')
  .modal('show')
;
}
</script>

</body>
</html>