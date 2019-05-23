@extends('master')

@section('content')

<h1 class="ui header"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">출하 내역 관리</font></font></h1>

<div class="ui segment">
  <div class="ui three column very relaxed grid">

    <div class="four wide column">
 
        <form method="post" action="/shipment" name="combo_box">
          @csrf      
         
            <p>시리얼번호</p>

                  <select multiple size="10" name="list1" style="width:100%; height:500px" onDblClick="move(document.combo_box.list1,document.combo_box.list2)">
                    <?php foreach($products as $product ){ ?>
                    <option><?=$product->serial_name ?></option>
                    <?php }?>
                  </select>

        </div>

        <div class="middle aligned column eight wide column"> 
          
         <div class="ui form">
          <div class="field">
            <label>프로젝트</label>
            <input type="text" name="t1">
          </div>
        </div>

        <br>

        <div class="ui form">
          <div class="field">
            <label>출하일</label>
            <input type="date" name="t2">
          </div>
        </div>

        <br> 

        <div class="ui form">
          <div class="field">
            <label>인수자</label>
            <input type="text" name="t3">
          </div>
        </div>

        <br> 

        <div class="ui form">
          <div class="field">
            <label>노트</label>
            <input type="text" name="t4">
          </div>
        </div>


          <div class="ui section divider"></div>
         
          

           <input class="ui button" type="button" onClick="move(this.form.list2,this.form.list1)" value="<<" id=button1 name=button1>
           <input class="ui button" type="button" onClick="move(this.form.list1,this.form.list2)" value=">>" id=button2 name=button2>
           <input class="ui button" type="submit" name="submit_button" value="입력" onClick="selectAll(document.combo_box.list2);">
           <input class="ui button" type="reset" value="초기화">
  
       </div>

       <div class="four wide column">
       
        <p>출하 시리얼번호</p>

                  <select multiple size="10" id="list2" name="skills[]" style="width:100%; height:500px" onDblClick="move(document.combo_box.list2,document.combo_box.list1)">
                  </select>

          </form>

      </div>

    </div>

  </div>



 <div class="ui form">
  <div class="field">
    <label>User Input</label>
    <input type="text">
  </div>
</div>






<script type="text/javascript">

  function move(fbox, tbox) {
   var arrFbox = new Array();
   var arrTbox = new Array();
   var arrLookup = new Array();
   var i;
   for(i=0; i<tbox.options.length; i++) {
    arrLookup[tbox.options[i].text] = tbox.options[i].value;
    arrTbox[i] = tbox.options[i].text;
  }
  var fLength = 0;
  var tLength = arrTbox.length
  for(i=0; i<fbox.options.length; i++) {
    arrLookup[fbox.options[i].text] = fbox.options[i].value;
    if(fbox.options[i].selected && fbox.options[i].value != "") {
     arrTbox[tLength] = fbox.options[i].text;
     tLength++;
   } else {
     arrFbox[fLength] = fbox.options[i].text;
     fLength++;
   }
 }
 arrFbox.sort();
 arrTbox.sort();
 fbox.length = 0;
 tbox.length = 0;
 var c;
 for(c=0; c<arrFbox.length; c++) {
  var no = new Option();
  no.value = arrLookup[arrFbox[c]];
  no.text = arrFbox[c];
  fbox[c] = no;
}
for(c=0; c<arrTbox.length; c++) {
  var no = new Option();
  no.value = arrLookup[arrTbox[c]];
  no.text = arrTbox[c];
  tbox[c] = no;
}
}

function selectAll(box) {
 for(var i=0; i<box.length; i++) {
  box[i].selected = true;
}
}


</script>

@endsection