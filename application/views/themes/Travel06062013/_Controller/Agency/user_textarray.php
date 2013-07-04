<?php
    if(count($agency)>0){
      echo $agency[0]->id.",".$agency[0]->name;
    }else{
      echo "0";
    }	
?>