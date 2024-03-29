<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<title>UASTravel.com</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Load CSS -->
	<link rel="stylesheet" href="<?=$stylepath?>/style.css">
	<link rel="stylesheet" href="<?=$themepath?>/fancybox/jquery.fancybox-1.3.4.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  
	<!-- Page icon -->
	<link rel="shortcut icon" href="<?=$themepath?>/favicon.png">

	<!-- Load Modernizr -->
	<script src="<?=$jspath?>/libs/modernizr-2.0.min.js"></script>

	<!-- Load JavaScript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?=$jspath?>/libs/jquery-1.6.2.min.js"><\/script>')</script>
	<script src="<?=$jspath?>/script.js"></script>
	<script src="<?=$themepath?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?=$jspath?>/tinymce/tinymce.min.js"></script>
</head>
<body>
<?php 
if($this->uri->segment(0)=="post"){
?>
 <!-- Post Header -->
<header style="background-image:url(<?=$imagepath?>/placeholders/1280x1024/13.jpg);">
<?php
}else{
?>
 <!--Home Header -->
<header style="background-image:url(<?=$imagepath?>/placeholders/1280x1024/12.jpg);">
<?php
}
?>
	<div class="container_12">
    
	</div>

	<!-- Heading -->
	<h2>Travel blog</h2>

</header>

<!-- Main content -->
<div class="container_12">



  <?=$maincontent?>

	
</div> 

 	<!-- Footer -->
	<footer><div class="container_12">
		
		<nav class="grid_8">
			<a href="#">Home</a>
			<a href="#">Catalogue</a>
			<a href="#">Blog</a>
			<a href="#">Contact</a>
			<a href="#">FAQ</a>
		</nav>

		<p class="address grid_4">
			<strong>Travel Agency Inc.</strong><br />
			<span>123 Wall Street , New York</span><br />
			<span><a href="mailto:contact@travelagency.com">contact@travelagency.com</a></span>
		</p>

		<p class="copyright grid_8">
			© 2011 Travel Agency
		</p>

	</div></footer>


</body>
</html>
