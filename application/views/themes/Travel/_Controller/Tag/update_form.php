<div class="container_12">

	<!-- Filter -->
	<section class="grid_12">
		<h2 class="section_heading">Add Tag Information [ <a href="<?php echo base_url("tag");?>">list</a> ]</h2>
		<br>
		<?php echo form_open(base_url("tag/update"));?>

			<input type="hidden" name="id" value="<?php echo $tag[0]->id;?>">
			<!--  Start Catgeory information -->		
			<div class="half">
				<label>Category Name :</label> <?php echo form_error('name', '<font color="red">', '</font>'); ?>
				<input type="text" name="name" value="<?php echo $tag[0]->name;?>">
			</div>
			<div class="clearfix"></div>

			<input type="submit" value="Submit" class="auto_width">

		<?php echo form_close();?>

</div>


