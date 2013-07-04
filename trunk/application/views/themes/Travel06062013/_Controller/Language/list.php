<br />
<style type="text/css">
li.alert_messagea{
  text-align:center;
  vertical-align:middle;
  background-color:#61C419;
  color:#FFFFFF;
  font-size:12px;
  font-weight:bold;
  display:block;
  width:125px;
  height:10px;
  float:left;
  -webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;
}
</style>

<div class="container_12">

<?php 
  if(isset($message)){
?>    
    <ul >
      <li class="alert_message">
        <font color="green"><?php echo $message;?> [X] </font>
      </li>    
    </ul>  

<?php     
  }
?>  

<section class="similar_hotels grid_12">		
		<h2 class="section_heading">Language List  [ <a href='<?php echo base_url("language/create");?>'>Create</a> ]</h2>	
		<ul>
			<?php 			
      if($language){
        foreach ($language as $key => $value) {
          # code...
      ?>              
        <li>
          <span style="font: 32px Arial, sans-serif; float:left;"><?php echo $value->id;?></span>
          <span style="float:left; margin-left:10px;">  
          <h3><a href="#"><?php echo $value->name;?></a></h3>
          
            [ <a href='<?php echo base_url("index.php/language/create/$value->id");?>'>Edit</a> ]
            [ <a href='<?php echo base_url("index.php/language/delete/$value->id");?>'>Delete</a> ]
          </span><br>
          <span style="margin-left:10px;"><?php echo $value->acronym;?></span>
        </li>      
      <?php          
        }
      }else{
      ?>
        <li>
          <span>Data not found</span>
        </li>
      <?php
      }
      ?>
    </ul>
    
  </section>


</div>