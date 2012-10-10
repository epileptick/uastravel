<br>
<div class="container_12">
<h2>&nbsp;&nbsp;&nbsp;Add Tour Information</h2>
</div>
<div class="container_12">

	<!-- Filter -->
	<section class="grid_8">

		<?php echo form_open("tour/create");?>
			<div class="half">
				<label>Tour Name :</label>
				<input type="text" name="name">
			</div>
			<div class="clearfix"></div>

			<label>Tour Description : </label>	
			<div class="textarea">
				<textarea cols="30" rows="10" name="description"></textarea>
			</div>
			<div class="clearfix"></div>

			<label>Tour Detail : </label>	
			<div class="textarea">
				<textarea cols="30" rows="10" name="detail"></textarea>
			</div>
			<div class="clearfix"></div>

			<label>Tour included : </label>	
			<div class="textarea">
				<textarea cols="30" rows="10" name="included"></textarea>
			</div>
			<div class="clearfix"></div>

			<label>Tour Remark : </label>	
			<div class="textarea">
				<textarea cols="30" rows="10" name="description"></textarea>
			</div>
			<div class="clearfix"></div>

			<div class="third">
				<label>Tour discount :</label>
				<input type="text" name="discount">
			</div>
			<div class="clearfix"></div>

			<div class="half">
				<label>Net Price Adult(th) :</label>
				<input type="text" name="thai_net_adult_price">
			</div>			

			<div class="half last">
				<label>Net Price Children(th) :</label>
				<input type="text" name="thai_net_child_price">
			</div>			
			<div class="clearfix"></div>

			<div class="half">
				<label>Sale Price Adult(th) :</label>
				<input type="text" name="thai_sale_adult_price">
			</div>			

			<div class="half last">
				<label>Sale Price Child(th) :</label>
				<input type="text" name="thai_sale_child_price">
			</div>			
			<div class="clearfix"></div>

			<div class="half">
				<label>Net Price Adult(foreigner) :</label>
				<input type="text" name="foreigner_net_adult_price">
			</div>			

			<div class="half last">
				<label>Net Price Child(foreigner) :</label>
				<input type="text" name="foreigner_net_child_price">
			</div>			
			<div class="clearfix"></div>

			<div class="half">
				<label>Sale Price Adult(foreigner) :</label>
				<input type="text" name="foreigner_sale_adult_price">
			</div>			

			<div class="half last">
				<label>Sale Price Child(foreigner) :</label>
				<input type="text" name="foreigner_sale_child_price">
			</div>			
			<div class="clearfix"></div>

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

<?php echo form_open("tour/create");?>

<p>
	<label for="title">Tour Name :</label>
	<input type="text" name="title" id="title" />
</p>	

<p>
	<label for="description">Tour Description :</label>
	<textarea name="description"></textarea>
</p>	

<?php echo form_close();?>


  `tou_description` text,
  `tou_detail` text,
  `tou_included` text,
  `tou_remark` text,
  `tou_discount` int(11) DEFAULT NULL,
  `tou_thai_net_adult_price` int(50) DEFAULT NULL,
  `tou_thai_net_child_price` int(50) DEFAULT NULL,
  `tou_thai_sale_adult_price` int(50) DEFAULT NULL,
  `tou_thai_sale_child_price` int(50) DEFAULT NULL,
  `tou_foreigner_net_adult_price` int(50) DEFAULT NULL,
  `tou_foreigner_net_child_price` int(50) DEFAULT NULL,
  `tou_foreigner_sale_adult_price` int(50) DEFAULT NULL,
  `tou_foreigner_sale_child_price` int(50) DEFAULT NULL,
  `tou_amount_time` float DEFAULT NULL,
  `tou_start_time` time DEFAULT NULL,
  `tou_end_time` time DEFAULT NULL,