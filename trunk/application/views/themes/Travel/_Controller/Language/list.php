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

<section class="similar_hotels grid_12">
		
		<h2 class="section_heading">Language List</h2>
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