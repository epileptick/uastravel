
<div class="container_12">
<h2>Add Tour Information</h2>
</div>
<div class="container_12">

	<!-- Filter -->
	<section class="grid_8">

		<form action="#" class="grey">

			<div class="half">
				<label>Tour Name : </label>
				<input type="text">
			</div>

			<div class="half last">
				<label>1/2 field</label>
				<input type="text">
			</div>

			<div class="third">
				<label>1/3 field</label>
				<input type="text">
			</div>

			<div class="third">
				<label>1/3 field</label>
				<input type="text">
			</div>

			<div class="third last">
				<label>1/3 field</label>
				<input type="text">
			</div>

			<div class="quarter">
				<label>1/4 field</label>
				<input type="text">
			</div>

			<div class="quarter">
				<label>1/4 field</label>
				<input type="text">
			</div>

			<div class="quarter">
				<label>1/4 field</label>
				<input type="text">
			</div>

			<div class="quarter last">
				<label>1/4 field</label>
				<input type="text">
			</div>

			<label>Textarea</label>
			<div class="textarea">
				<textarea cols="30" rows="10"></textarea>
			</div>

			<div class="half">
				<label>1/2 textarea</label>
				<div class="textarea">
					<textarea cols="30" rows="10"></textarea>
				</div>
			</div>

			<div class="half last">
				<label>1/2 textarea</label>
				<div class="textarea">
					<textarea cols="30" rows="10"></textarea>
				</div>
			</div>

			<div class="clearfix"></div>

			<input type="submit" value="Submit" class="auto_width">

		</form>

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