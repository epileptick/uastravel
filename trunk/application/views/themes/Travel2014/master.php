<html>
<head>
<title>ทัวเทียวไทย</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
<!-- -->
<link rel="stylesheet" href="<?php echo base_url('themes/uastravel2014/bootstrap/css/bootstrap.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('themes/uastravel2014/css/tour.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('themes/uastravel2014/font/font.css'); ?> ">


<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo base_url('themes/uastravel2014/bootstrap/js/bootstrap.js'); ?>">
</script>
<!-- new -->

<link href="<?php echo base_url('themes/uastravel2014/dropdownlist/dropdown/dropdown.css'); ?>" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('themes/uastravel2014/dropdownlist/dropdown/themes/mtv.com/default.ultimate.css'); ?>" media="screen" rel="stylesheet" type="text/css" />
    <!-- new end-->

</head>
<body class="loading">
	<div class="container header" >
  <div class="row">
    <div class="col-md-12 headerbar ">
      <div class="row">
        <div class="col-md-4 menubutton">
          <img src="<?php echo base_url('themes/uastravel2014/iconsocial/facebook500.png'); ?>"/>
          <img src="<?php echo base_url('themes/uastravel2014/iconsocial/linkedin.png'); ?>"/>
          <img src="<?php echo base_url('themes/uastravel2014/iconsocial/twitter.png'); ?>"/>
          <img src="<?php echo base_url('themes/uastravel2014/iconsocial/blogger.png'); ?>"/>
          <img src="<?php echo base_url('themes/uastravel2014/iconsocial/googleplus.png'); ?>"/>
        </div>
        <div class="col-md-4 col-md-offset-4 menubutton text-right">
          <img src="<?php echo base_url('themes/uastravel2014/iconsocial/email.png'); ?>"/> uastravel@gmail.com
          <img src="<?php echo base_url('themes/uastravel2014/iconsocial/phone.png'); ?>" style="margin-left:5px;"/> 087-388-2112
        </div>
      </div>
    </div>
  </div>
	<div class="row" >
		<div class="col-md-12 headerbar">
      <div class="navbar navbar-inverse editmargin_header" role="navigation">
        <img src="<?php echo base_url('themes/uastravel2014/image/logo.png'); ?>" class="logouas">
        <nav class="navbar-header pull-right">
        <a class="navbar-brand fontmenubar" href="#"  >Home</a>
       <!-- <a class="navbar-brand fontmenubar">Package <span class="caret"></a> -->
         <!--new -->
<ul id="nav" class="dropdown dropdown-horizontal">
  <li id="n-movies"><span class=" navbar-brand fontmenubar " >Packket Tour&nbsp;<span class="caret pull-right" style="margin-top:8px;"></span></span >
    <ul>

<?php foreach ($main_menu as $key => $menu) {

?>
<li><a href="<?php echo $menu['name']; ?>" class="dir"><?php echo $menu['name']; ?></a>
 <ul>
<?php foreach ($menu['child'] as $key1 => $menuc) {    ?>    
<li class="first"><a href="./"><?php echo $menuc['name'] ?></a></li>


<!--<li class="first"><?php echo $menuc['name'] ?></li>
            <ul>
              <li class="first"><a href="./">Rock Band</a></li>
              <li><a href="./">The Dime</a></li>
              <li><a href="./">Hot Trailers</a></li>
              <li><a href="./">The G-Hole</a></li>
              <li><a href="./">Trailers and Game Videos</a></li>
              <li><a href="./">Podcast</a></li>
            </ul>
          </li>-->

  <?php } ?>
<!--
          <li class="first"><span class="dir">Features</span>
            <ul>
              <li class="first"><a href="./">Rock Band</a></li>
              <li><a href="./">The Dime</a></li>
              <li><a href="./">Hot Trailers</a></li>
              <li><a href="./">The G-Hole</a></li>
              <li><a href="./">Trailers and Game Videos</a></li>
              <li><a href="./">Podcast</a></li>
            </ul>
          </li>
-->
        </ul>
      </li>

  

<?php
}
?>


<!--
      <li><a href="./" class="dir">aaaaa</a>
        <ul>
          <li class="first"><span class="dir">Features</span>
            <ul>
              <li class="first"><a href="./">Rock Band</a></li>
              <li><a href="./">The Dime</a></li>
              <li><a href="./">Hot Trailers</a></li>
              <li><a href="./">The G-Hole</a></li>
              <li><a href="./">Trailers and Game Videos</a></li>
              <li><a href="./">Podcast</a></li>
            </ul>
          </li>
          <li><a href="./" class="dir">News</a>
            <ul>
              <li class="first"><a href="./">Multiplayer Blog</a></li>
              <li><a href="./">Multiplayer Video</a></li>
              <li><a href="./">Games News</a></li>
            </ul>
          </li>
        </ul>
      </li>
-->
      <li><a href="./" class="dir">Mobile</a>
        <ul>
          <li class="first"><span class="dir">MTV Shows</span>
            <ul>
              <li class="first"><a href="./">A.D.D. Bio</a></li>
              <li><a href="./">Beavis and Butthead</a></li>
              <li><a href="./">The Hills</a></li>
              <li><a href="./">Kaya</a></li>
              <li><a href="./">MTV2</a></li>
              <li><a href="./">mtvU</a></li>
              <li><a href="./">Run's House</a></li>
              <li><a href="./">Sucker Free on MTV</a></li>
              <li><a href="./">TRL</a></li>
              <li><a href="./">Yo Momma</a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </li>
  </ul>
        <!-- end-->
        <a class="navbar-brand fontmenubar" href="#">Location</a>
        <a class="navbar-brand fontmenubar" href="#">Contact</a>
        <a class="navbar-brand fontmenubar" href="#" style="">Email</a>
        <form method="get" action="/search" id="search" class="pull-left">
          <input name="q" type="text" size="" placeholder="Search..." />
        </form>
        <!--
           <div class="input-group" style="width:170; padding-top:8px;">
      <input type="text" class="form-control" >
      <span class="input-group-btn">
        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" style="font-size:20px;"></span></button>
      </span>
    </div>
      -->
    <!-- /input-group -->
      </nav>
      </div>
    </div>
  </div>
 <?php echo $maincontent;?>

  <div class="row backfooter">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6">
         <div class="row">
          <div class="col-md-12">
            <div class="stylefootter">
              <p>โทร : 093-741-8887, 082-812-1146, 076-331-280 แฟกซ์: 076-331-273</p>
              <p>อีเมล์: info@uastravel.com   <a>www.ทัวร์เที่ยวไทย.com</a></p>
             
            </div>
          </div>
         </div>
        </div>
        <div class="col-md-6">
          <div class="pull-right stylefootter">
             <p>หจก.ยู แอส ทราเวล &nbsp;&nbsp;&nbsp; </p>
            <p>80/86 หมู่บ้านศุภาลัยฮิล ซ.5 อ.เมือง จ.ภูเก็ต 83000</p>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <span>Copyright © 2012-2014 U As Travel Part., Ltd.</span>
      </div>
    </div>
  </div>

  <script src="http://code.jquery.com/jquery.js"></script>

    <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
</body>
</html>