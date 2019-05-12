<?php   

        
       //시리얼 시작번호와 마지막번호를 받는다. 
       $serial_start_no= '19A0001';
       $serial_end_no= '19A0005';

       //시리얼번호 숫자만 남긴다 19A0001 => 0001
       $serial_start_no_int=substr($serial_start_no,3,4);
       $serial_end_no_int=substr($serial_end_no,3,4);

       //초기값
       $y=0;
       $i=0;

       //시리얼번호 영문만 담는 변수 19A0001 => 19A 
       $serial_english_name=substr($serial_start_no,0,3);

       // 반복문 
       for($i=$serial_start_no_int;$i<=$serial_end_no_int;$i++){
       #$i="0001";
       $y+=1;
       $i=(int)$i;
       $serial_name=$serial_english_name.sprintf("%04d",$i);

       //대문자변환
       $serial_name=strtoupper($serial_name);
       #$serial_name="19A0001";
      
       $serial_name;
       }

<?