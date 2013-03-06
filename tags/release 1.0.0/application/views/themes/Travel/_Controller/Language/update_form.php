
<div class="container_12">
	<!-- Filter -->
	<section class="grid_12">
		<h2 class="section_heading">Add Language Information [ <a href="<?php echo base_url("language");?>">list</a> ]</h2>
		<br>
		<?php echo form_open(base_url("language/update"));?>

			<input type="hidden" name="id" value="<?php echo $language[0]->id;?>">

			<div class="half">
				<label>Language Acronym :</label> <?php echo form_error('acronym', '<font color="red">', '</font>'); ?>
				<input type="text" name="acronym" value="<?php echo $language[0]->acronym;?>">
			</div>
			<div class="clearfix"></div>

			<div class="half">
				<label>Language Name :</label> <?php echo form_error('name', '<font color="red">', '</font>'); ?>
				<input type="text" name="name" value="<?php echo $language[0]->name;?>">
			</div>
			<div class="clearfix"></div>


			<input type="submit" value="Submit" class="auto_width">

		<?php echo form_close();?>

</div>


