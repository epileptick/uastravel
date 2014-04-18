<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="<?php echo $themepath.'/bootstrap/css/bootstrap.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/foundation.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/userstyle.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/customtour.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/app.css';?>">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
</head>
<body style="background: #ededed url(<?php echo $imagepath.'/bg5.jpg';?>) no-repeat top center;"><!-- ใส่รูปพื้นหลังตรงนี้ แทน bg1.jpg-->
  <div class="overly-bg"></div>
  <div id="wrapper">
    <!-- Menu -->
    {_widget menu}
    <!-- End Menu -->
    <br/><br/><br/><br/><br/>

    <div class="row customtour_step1">
      <section class="twelve columns">
        <div class="customtour">
          <div class="page-header">
            <h1><?php echo $this->lang->line("checkout_lang_success_head");?></h1>
          </div>
          <div class="alert alert-info">
            <p class="text-center"><img src="<?php echo $imagepath."/logo_booking.png"; ?>"/></p>
            <h2 class="text-center"><?php echo $this->lang->line("checkout_lang_success_head");?></h2>
            <p><?php echo $this->lang->line("checkout_lang_success_text");?></p>
            <div class="border"></div>
            <p class="text-center"><?php echo $this->lang->line("checkout_lang_success_text_redirect");?></p>
            <p class="text-center">
              <a href="<?php echo base_url(); ?>" class="btn btn-success btn-large"><?php echo $this->lang->line("checkout_lang_success_text_redirect_btn");?></a>
            </p>
          </div>
          
          </div>
      </section>
    </div>

    {_include footer}
    <!-- End Gallery -->
  </div>

</body>
</html>