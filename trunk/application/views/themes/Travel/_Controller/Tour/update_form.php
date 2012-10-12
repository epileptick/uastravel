
<?php
/////////////////////
//Start Datepicker
////////////////////

//Datepicker CSS
PageUtil::addVar("stylesheet",'<link rel="stylesheet" media="all" type="text/css"  href="http://code.jquery.com/ui/1.8.23/themes/smoothness/jquery-ui.css">');

PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="http://localhost/uastravel/themes/Travel/js/datepicker/jquery-ui-timepicker-addon.css">');

//Datepicker JQuery
PageUtil::addVar("javascript", '<script type="text/javascript" src="http://code.jquery.com/ui/1.8.24/jquery-ui.min.js"></script>');
PageUtil::addVar("javascript", '<script type="text/javascript" src="http://localhost/uastravel/themes/Travel/js/datepicker/jquery-ui-timepicker-addon.js"></script>');
PageUtil::addVar("javascript", '<script type="text/javascript" src="http://localhost/uastravel/themes/Travel/js/datepicker/jquery-ui-sliderAccess.js"></script>');

/////////////////////
//End Datepicker
////////////////////

?>

<script>
	$(document).ready(function(){
		$('#start_time').timepicker({
			hourGrid: 4,
			minuteGrid: 10
		});

		$('#end_time').timepicker({
			hourGrid: 4,
			minuteGrid: 10
		});
	});
</script>
<br>
<div class="container_12">
<h2>&nbsp;&nbsp;&nbsp;Add Tour Information</h2>
</div>
<div class="container_12">

	<!-- Filter -->
	<section class="grid_8">

		<?php echo form_open(base_url("index.php/tour/update"));?>.

			<input type="hidden" name="id" value="<?php echo $tour[0]->id;?>">
			<!--  Start Tour information -->		
			<div class="half">
				<label>Tour Name :</label> <?php echo form_error('name', '<font color="red">', '</font>'); ?>
				<input type="text" name="name" value="<?php echo $tour[0]->name;?>">
			</div>
			<div class="clearfix"></div>

			<label>Tour Description : </label> <?php echo form_error('description', '<font color="red">', '</font>'); ?>
			<div class="textarea">
				<textarea cols="30" rows="10" name="description"><?php echo $tour[0]->description;?></textarea>
			</div>
			<div class="clearfix"></div>

			<label>Tour Detail : </label> <?php echo form_error('detail', '<font color="red">', '</font>'); ?>
			<div class="textarea">
				<textarea cols="30" rows="10" name="detail"><?php echo $tour[0]->description;?></textarea>
			</div>
			<div class="clearfix"></div>

			<label>Tour included : </label>	<?php echo form_error('included', '<font color="red">', '</font>'); ?>
			<div class="textarea"> 
				<textarea cols="30" rows="10" name="included"><?php echo $tour[0]->included;?></textarea>
			</div>
			<div class="clearfix"></div>

			<label>Tour Remark : </label>	
			<div class="textarea">
				<textarea cols="30" rows="10" name="remark"><?php echo $tour[0]->remark;?></textarea>
			</div>
			<div class="clearfix"></div>
			<!--  End Tour information -->


			<!--  Start Price information -->
			<hr class="dashed grid_7">
			<div class="half">
				<label>Net Price Adult(th) :</label><br>
				<?php echo form_error('net_adult_price', '<font color="red">', '</font>'); ?>
				<input type="text" name="net_adult_price" value="<?php echo $tour[0]->net_adult_price;?>">
			</div>	

			<div class="half last">
				<label>Net Price Children(th) :</label><br>
				<?php echo form_error('net_child_price', '<font color="red">', '</font>'); ?>
				<input type="text" name="net_child_price" value="<?php echo $tour[0]->net_child_price;?>">
			</div>			
			<div class="clearfix"></div>

			<div class="half">
				<label>Sale Price Adult(th) :</label><br>
				<?php echo form_error('sale_adult_price', '<font color="red">', '</font>'); ?>
				<input type="text" name="sale_adult_price" value="<?php echo $tour[0]->sale_adult_price;?>">
			</div>			

			<div class="half last">
				<label>Sale Price Child(th) :</label><br>
				<?php echo form_error('sale_child_price', '<font color="red">', '</font>'); ?>
				<input type="text" name="sale_child_price" value="<?php echo $tour[0]->sale_child_price;?>">
			</div>			
			<div class="clearfix"></div>


			<div class="half">
				<label>Tour discount :</label>
				<input type="text" name="discount" value="<?php echo $tour[0]->discount;?>">
			</div>
			<div class="clearfix"></div>			
			<!--  End Price information -->


			<!--  Start Time information -->
			<hr class="dashed grid_7">			
			<div class="half">
				<label>Start time :</label><br>
				<?php echo form_error('start_time', '<font color="red">', '</font>'); ?>
				<input type="text" name="start_time" id="start_time" value="<?php echo $tour[0]->start_time;?>">
			</div>	
			<div class="half last">
				<label>End time :</label><br>
				<?php echo form_error('end_time', '<font color="red">', '</font>'); ?>
				<input type="text" name="end_time" id="end_time" value="<?php echo $tour[0]->end_time;?>">
			</div>					
			<div class="clearfix"></div>			
			<!--  End Time information -->



			<input type="submit" value="Submit" class="auto_width">

		<?php echo form_close();?>

	</section>

	<!-- Sidebar -->
	<section class="simple_sidebar grid_4">

		<form action="#" class="grey">
			
			<label>Field</label>
			<input type="text">

			<label>Textarea</label>
			<div class="textarea">
				<textarea cols="30" rows="10"></textarea>
			</div>

			<input type="submit" value="Submit">

		</form>
	
	</section>

	<!-- Sidebar -->
	<section class="simple simple_sidebar grid_4">

		<form action="#">
			
			<label>Field</label>
			<input type="text">

			<div class="half">
				<label>1/2 field</label>
				<input type="text">
			</div>

			<div class="half last">
				<label>1/2 field</label>
				<input type="text">
			</div>

			<label>Textarea</label>
			<div class="textarea">
				<textarea cols="30" rows="10"></textarea>
			</div>

			<input type="submit" value="Submit">
		</form>
	
	</section>
	
</div>
