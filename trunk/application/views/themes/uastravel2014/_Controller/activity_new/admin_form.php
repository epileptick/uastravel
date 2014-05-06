<div class="container">
	<div class="col-md-9">
		<form role="form" action="<?php echo base_url('admin/form'); ?>" enctype ="multipart/form-data" method="post">
			<input type="hidden" name="id" value="" />
		  <div class="form-group">
		    <label for="exampleInputEmail1">Title</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" name="title">
		  </div>
		    <div class="form-group">
		    <label for="exampleInputPassword1">Detail</label>
		    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter detail" name="detail">
			</div>
			<div class="form-group">
		    <label for="exampleInputFile">File input</label>
		    <input type="file" id="exampleInputFile">
		    <p class="help-block">Example block-level help text here.</p>
		  </div>

		  <label for="exampleInputFile">ชนิด</label>
			<select class="form-control" name="type">
			  <option value="1">ข่าวสารทางเว็ป</option>
			  <option value="2">กิจกรรมลูกค้า</option>

			</select>
			<br />

			<input type="submit" name="submit" value="submit" />



	</div>
</div>
