<HTML>
<HEAD>
  <TITLE>BLUE-B</TITLE>
  <script>
    <!--
      function move_item(from, to) {
       var f;
       var SI;
       if(from.options.length>0)   {
         for(i=0;i<from.length;i++)     {
           if(from.options[i].selected)       {
             SI=from.selectedIndex;
             f=from.options[SI].index;
             to.options[to.length]=new Option(from.options[SI].text,from.options[SI].value);
             from.options[f]=null;
             i--;
           }
         }
       }
     }
//-->
</script>
</head>
<body>
  ​


  <form class="ui form" method="POST" action="/shipment">
    @csrf
    <table border=0 class=wrap align=center cellpadding=3 cellspacing=0>
      <tr>
        <td>
          <select name="items_left" multiple style="width:100">
            @foreach($products as $product )
            <option value=1>{{$product}}</option>
            @endforeach
          </select>
        </td>
        <td>
          <input type="button" style="width:80" value = "   Add   >  " onClick="move_item(items_left, items_right)"><br>
          <input type="button" style="width:80" value = "< Remove " onClick="move_item(items_right,items_left)"><br>
          <input type="submit" value="전송">
        </td>
        <td>
          <select name="items_right"  multiple style="width:100">
          </select>
        </td>
      </tr>
    </table>
    ​
  </form>
  ​
</body>
</html>​