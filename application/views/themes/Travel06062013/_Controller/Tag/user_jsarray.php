<?php
	$i = 1;
	foreach ($tag as $key => $value) {
		# code...
		if($i==count($tag)){
			echo $value["name"];
		}else{
			echo $value["name"].",";
		}
		$i++;
	}
?>