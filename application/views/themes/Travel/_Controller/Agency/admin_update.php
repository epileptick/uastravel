<div class="container_12">

	<!-- Filter -->
	<section class="grid_12">
		<h2 class="section_heading">Add Agent Information [ <a href="<?php echo base_url("admin/report");?>">list</a> ]</h2>
		<br>
		<?php echo form_open(base_url("admin/report/update"));?>
		

			<input type="hidden" name="id" value="<?php echo $agency[0]->id;?>">		
			<!--  Start Agent information -->		
			<div class="half">
				<label>Agent Name/Company Name :</label> <?php echo form_error('name', '<font color="red">', '</font>'); ?>
				<input type="text" name="name" value="<?php echo $agency[0]->name;?>">
			</div>
			<div class="clearfix"></div>

			<div class="half">
				<label>Firstname :</label><br>
				<?php echo form_error('firstname', '<font color="red">', '</font>'); ?>
				<input type="text" name="firstname" value="<?php echo $agency[0]->firstname;?>">
			</div>	

			<div class="half last">
				<label>Lastname :</label><br>
				<?php echo form_error('lastname', '<font color="red">', '</font>'); ?>
				<input type="text" name="lastname" value="<?php echo $agency[0]->lastname;?>">
			</div>			
			<div class="clearfix"></div>


			<div class="half">
				<label>Email :</label> <?php echo form_error('email', '<font color="red">', '</font>'); ?>
				<input type="text" name="email" value="<?php echo $agency[0]->email;?>">
			</div>
			<div class="clearfix"></div>

			<div class="half">
				<label>Telephone :</label> <?php echo form_error('telephone', '<font color="red">', '</font>'); ?>
				<input type="text" name="telephone" value="<?php echo $agency[0]->telephone;?>">
			</div>
			<div class="clearfix"></div>

			<div class="half">
				<label>Fax :</label> <?php echo form_error('fax', '<font color="red">', '</font>'); ?>
				<input type="text" name="fax" value="<?php echo $agency[0]->fax;?>">
			</div>
			<div class="clearfix"></div>

			<div class="half">
				<label>Website :</label> <?php echo form_error('website', '<font color="red">', '</font>'); ?>
				<input type="text" name="website" value="<?php echo $agency[0]->website;?>">
			</div>
			<div class="clearfix"></div>	

			<label>Agent Address : </label> <?php echo form_error('address', '<font color="red">', '</font>'); ?>
			<div class="textarea">
				<textarea cols="30" rows="10" name="address"><?php echo $agency[0]->address;?></textarea>
			</div>
			<div class="clearfix"></div>

			<label>Book Bank Information : </label> <?php echo form_error('bookbank', '<font color="red">', '</font>'); ?>
			<div class="textarea">
				<textarea cols="30" rows="10" name="bookbank"><?php echo $agency[0]->bookbank;?></textarea>
			</div>
			<div class="clearfix"></div>



			<div class="half">
				<label>Credit day :</label> <?php echo form_error('credittime', '<font color="red">', '</font>'); ?>
				<input type="text" name="credittime" value="<?php echo $agency[0]->credittime;?>">
			</div>
			<div class="clearfix"></div>

			<label>Agent Condition : </label> <?php echo form_error('condition', '<font color="red">', '</font>'); ?>
			<div class="textarea">
				<textarea cols="30" rows="10" name="condition"><?php echo $agency[0]->condition;?></textarea>
			</div>
			<div class="clearfix"></div>


			<label>Agent Remark : </label>	
			<div class="textarea">
				<textarea cols="30" rows="10" name="remark"><?php echo $agency[0]->remark;?></textarea>
			</div>
			<div class="clearfix"></div>
			<!--  End Agent information -->
			<input type="submit" value="Submit" class="auto_width">

		<?php echo form_close();?>

	</section>
</div>




