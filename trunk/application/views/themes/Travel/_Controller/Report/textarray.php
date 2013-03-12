<?php
    if(count($report)>0){
      echo $report[0]->id.",".$report[0]->name;
    }else{
      echo "0";
    }	
?>