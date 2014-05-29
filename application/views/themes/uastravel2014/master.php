<html>
<head>
<title>ทัวเทียวไทย</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script>window.jQuery || document.write('<script src="<?=$jspath?>/libs/jquery-1.6.2.min.js"><\/script>')</script>
<!-- -->
<link rel="stylesheet" href="<?php echo base_url('themes/uastravel2014/bootstrap/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('themes/uastravel2014/css/tour.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('themes/uastravel2014/font/font.css'); ?> ">

<!-- new -->

<link href="<?php echo base_url('themes/uastravel2014/dropdownlist/dropdown/dropdown.css'); ?>" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('themes/uastravel2014/dropdownlist/dropdown/themes/mtv.com/default.ultimate.css'); ?>" media="screen" rel="stylesheet" type="text/css" />
    <!-- new end-->




</head>
<body>
           <?php //var_dump($main_menu );  ?>
	<div class="container header" >
  <div class="row">
    <div class="col-md-12 headerbar">
      <div class="row">
        <div class="col-md-4 menubutton " >
          <a href="https://www.facebook.com/UasTravelThailand?fref=ts">
          <img src="<?php echo base_url('themes/uastravel2014/iconsocial/facebook500.png'); ?>"/>
          </a>
          <img src="<?php echo base_url('themes/uastravel2014/iconsocial/linkedin.png'); ?>" />
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
        <img src="<?php echo $imagepath.'/logo.png' ?>" class="logouas">
        <nav class="navbar-header pull-right">
        <a class="navbar-brand fontmenubar hover1" href="<?php echo base_url(); ?>"  >{_ global_lang_home}</a>
       <!-- <a class="navbar-brand fontmenubar">Package <span class="caret"></a> -->
         <!--new -->

<ul id="nav" class="dropdown dropdown-horizontal">
  <li id="n-movies"><span class=" navbar-brand fontmenubar hover2" >{_ global_lang_tour} &nbsp;<span class="caret pull-right" style="margin-top:8px;"></span></span >
    <ul>

<?php foreach ($main_menu as $key => $menu) {

?>
<li><a href="<?php echo base_url($this->lang->line("url_lang_tour")."/".$menu['url']); ?>" class="dir"><?php echo $menu['name']; ?></a>
 <ul>
<?php foreach ($menu['child'] as $key1 => $menuc) {   ?>    
<li class="first"><a href="<?php echo base_url($this->lang->line("url_lang_tour")."/".$menuc['url'])."/".$menu['url']; ?>"><?php echo $menuc['name'] ?></a></li>


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

  <?php  }  ?>
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

    </ul>
  </li>
  </ul>
        <!-- end-->
     <a class="navbar-brand fontmenubar hover3" href="<?php echo base_url($this->lang->line("tour_lang_location"));?>"><?php echo $this->lang->line("global_lang_location"); ?></a>
       <!-- <a class="navbar-brand fontmenubar" href="<?php echo base_url('localtion/user_view'); ?>"><?php echo $this->lang->line("global_lang_location"); ?></a>-->
        <a class="navbar-brand fontmenubar hover4" href="#" data-toggle="modal" data-target="#myModal">เข้าสู่ระบบ</a>
        <a class="navbar-brand fontmenubar hover5 " href="#">{_ global_lang_contact_us}</a>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Login</h4>
              </div>
              <div class="modal-body">
                <form role="form">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

                
        <form method="get" action="<?php echo base_url("search");?>" id="search" class="pull-left">
          <input name="keyword" type="text" size="" placeholder="Search..."  >
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
              <p>{_global_lang_telephone} : 093-741-8887, 082-812-1146, 076-331-280 {_global_lang_fax}: 076-331-273</p>
              <p>{_global_lang_e_mail}: info@uastravel.com   <a>www.ทัวร์เที่ยวไทย.com</a></p>
             
            </div>
          </div>
         </div>
        </div>
        <div class="col-md-6">
          <div class="pull-right stylefootter">
             <p>{_global_lang_company} &nbsp;&nbsp;&nbsp; </p>
            <p>{_global_lang_address}</p>
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
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo base_url('themes/uastravel2014/bootstrap/js/bootstrap.min.js'); ?>">
</script>

</body>
</html>