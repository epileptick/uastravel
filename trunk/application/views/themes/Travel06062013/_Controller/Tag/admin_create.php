<?php
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/style/type.css">');
?>
<div class="container_12">
	<!-- Filter -->
	<section class="grid_12">
		<h2 class="section_heading">Add Tag Information [ <a href="<?php echo base_url("admin/tag/list");?>">List</a> ]</h2>
		<br>
		<?php echo form_open(base_url("admin/tag/create"));?>
			<!--  Start Tour information -->
			<div class="half">
				<label>Tag Name :</label> <?php echo form_error('name', '<font color="red">', '</font>'); ?>
				<input type="text" name="name" value="<?php echo set_value('name');?>">
			</div>
			<div class="clearfix"></div>
			<div class="clearfix"></div>
			<input type="submit" value="Submit" class="auto_width">
		<?php echo form_close();?>
	</section>
</div>
