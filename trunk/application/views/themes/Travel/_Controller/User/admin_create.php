<?php
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/style/user.css">');
?>
<div class="container_12">
	<!-- Filter -->
	<section class="grid_12">
		<h2 class="section_heading">Account Information [ <a href="<?php echo base_url("admin/user");?>">List</a> ]</h2>
		<br>
		<?php echo form_open(base_url("admin/user/create"));?>
			<!--  Start Tour information -->
			<div class="grid_6">
				<label for="id">ID</label> 
				<input type="text" name="id" value="<?php if(!empty($user["id"])) echo $user["id"];?>" id="id" readonly>
			</div>
			<div class="grid_6">
				<label for="username">Username</label> 
				<input type="text" name="username" value="<?php if(!empty($user["username"])) echo $user["username"];?>" id="username" readonly>
			</div>
			<div class="grid_6">
				<label for="password">Password</label> 
				<input type="password" name="password" value="" id="password">
			</div>
			<div class="grid_6">
				<label for="password_retry">Retry-Password</label> 
				<input type="password" name="password_retry" value="" id="password_retry">
			</div>
			<div class="grid_6">
				<label for="email">E-Mail</label> 
				<input type="text" name="email" value="<?php if(!empty($user["email"])) echo $user["email"];?>" id="email" readonly>
			</div>

			<div class="clearfix"></div>
		<h2 class="section_heading">Personal Information</h2>
			<!--  Start Tour information -->
			<div class="grid_6">
				<label for="first_name">First name</label> 
				<input type="text" name="first_name" value="<?php if(!empty($user["first_name"])) echo $user["first_name"];?>" id="first_name">
			</div>
			<div class="grid_6">
				<label for="last_name">Last name</label> 
				<input type="text" name="last_name" value="<?php if(!empty($user["last_name"])) echo $user["last_name"];?>" id="last_name">
			</div>
			<div class="clearfix"></div>
		<h2 class="section_heading">Group Information</h2>
			<div class="grid_6">
				<label for="group">Group</label> 
				<select id="group" name="group">
					<option value="0">-- Select --</option>
					<?php
						if(!empty($group)){
							foreach ($group as $key => $value) {
								if($value['id'] == $user['group']){
									echo "<option value=\"$value[id]\" selected>$value[name]</option>";
								}else{
									echo "<option value=\"$value[id]\">$value[name]</option>";
								}
							}
						}
					?>
				</select>
			</div>
			<div class="clearfix"></div>
			<input type="submit" value="Submit" class="auto_width">
		<?php echo form_close();?>
	</section>
</div>
