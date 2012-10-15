
<br>
<div class="container_12">
<h2>&nbsp;&nbsp;&nbsp;Add Category Information</h2>
</div>
<div class="container_12">

	<!-- Filter -->
	<section class="grid_12">

		<?php echo form_open(base_url("index.php/language/create"));?>
	
			<div class="half">
				<label>Language Acronym :</label> <?php echo form_error('acronym', '<font color="red">', '</font>'); ?>
				<input type="text" name="acronym" value="<?php echo set_value('acronym');?>">
			</div>
			<div class="clearfix"></div>

			<div class="half">
				<label>Language Name :</label> <?php echo form_error('name', '<font color="red">', '</font>'); ?>
				<input type="text" name="name" value="<?php echo set_value('name');?>">
			</div>
			<div class="clearfix"></div>

			
			<input type="submit" value="Submit" class="auto_width">

		<?php echo form_close();?>

	</section>
</div>
