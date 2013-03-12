<br>
<style type="text/css">

.round
{
    -moz-border-radius: 15px;
    border-radius: 15px;
    padding: 5px;
    border: 1px solid #000;
}


.numberCircle {
    -webkit-border-radius: 999px;
    -moz-border-radius: 999px;
    border-radius: 999px;
    behavior: url(PIE.htc);

    width: 36px;
    height: 36px;
    padding: 8px;

    background: #fff;
    border: 2px solid #666;
    color: #666;
    text-align: center;

    font: 32px Arial, sans-serif
}
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
		
		<h2 class="section_heading">Hotel Booking List</h2>
		<ul>

			<?php 

			if($report){
				foreach ($report as $key => $value) {
					# code...
			?>							
				<li>
					<span style="font: 32px Arial, sans-serif; float:left;"><?php echo $value->id;?></span>
					<span style="float:left; margin-left:10px;">	
					<h3><a href="#"><?php echo $value->code;?></a></h3>
					
						[ <a href='<?php echo base_url("admin/report/hotel/custom/$value->hashcode");?>'>Custom/Hotel Operator</a> ]
						[ <a href='<?php echo base_url("admin/report/hotel/admin/$value->hashcode");?>'>Admin</a> ]

					</span><br>
					<div>
					<span style="margin-left:10px;">คุณ <?php echo $value->firstname;?>   <?php echo $value->lastname;?></span>
					<span style="margin-left:10px;"><?php echo $value->email;?></span>
					<span ><?php echo $value->telephone;?></span>
					
					</div>
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