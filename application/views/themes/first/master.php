<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{_ theme_lang_title}</title>

<meta name="description" content="{_ theme_lang_description}" />
<meta name="keywords" content="{_ theme_lang_keyword}" />
<meta http-equiv="X-UA-Compatible" content="chrome=1" />
<link href="<?=$stylepath?>/themestyle.css" rel="stylesheet" type="text/css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?=$jspath?>/slides.jquery.js"></script>
<script type="text/javascript" src="<?=$jspath?>/slides.min.jquery.js"></script>

<script type="text/javascript" src="<?=$jspath?>/tiny_mce/tiny_mce.js"></script>

<script>
  $(document).ready(function(){
    $('#slides').slides({
      preload: true,
      preloadImage: '<?=$imagepath?>/slide/loading.gif',
      play: 5000,
      pause: 2500,
      hoverPause: true,
      effect: 'slide, fade'
    });
    
    
    $("#loginblock_username").focus(function () {
      $("#label_username").fadeOut(400);
    });
    
    $("#loginblock_username").blur(function () {
      if ($('#loginblock_username').val() == "") {
        $("#label_username").fadeIn(400);
      }
      
    });
    
    $("#loginblock_password").focus(function () {
      $("#label_password").fadeOut(400);
    });
    
    $("#loginblock_password").blur(function () {
      if ($('#loginblock_password').val() == "") {
        $("#label_password").fadeIn(400);
      }
    });


  });



</script>

</head>

<body>
<div id="body">
  <div id="header">
  
  </div>
  
  <div id="wrapper">
    <div id="div_top_nav">
      <ul id="top_nav">
        <li><a href="<?php echo(base_url())?>">{_ theme_lang_home}</a></li>
        <li><a href="<?php echo(base_url("/contactus"))?>">{_ theme_lang_contact_us}</a></li>
      </ul>
      <!--
      <a id="newtopic" href="">{_ theme_lang_}</a>
      -->
    </div>
    <div id="banner_zone">
     <div id="slide">
          <div id="slides">
            <div class="slides_container">
              <a href="#" target="_blank">
                <img src="<?=$imagepath?>/slide//slide-1.jpg" width="730" height="200" alt="Slide 1">
              </a>
              <a href="#" target="_blank">
                <img src="<?=$imagepath?>/slide//slide-1.jpg" width="730" height="200" alt="Slide 1">
              </a>
            </div>
          <a href="#" class="prev"><img src="<?=$imagepath?>/slide/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
          <a href="#" class="next"><img src="<?=$imagepath?>/slide/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
          </div>
      </div>
      
      <div id="login_block">
        <span id="login_title">{_ user_lang_member_login}</span>
        
        <?=form_open(base_url('user/login'));?>
            <div class="loginBlock">
      			  <label for="loginblock_username" id="label_username">{_ user_lang_username}</label>
      			  <input id="loginblock_username" type="text" name="username" size="14" maxlength="25" value="" >
            </div>
            <div class="loginBlock">
      			  <label for="loginblock_password" id="label_password">{_ user_lang_password}</label>
      			  <input id="loginblock_password" type="password" name="password" size="14" maxlength="40" value="" >
            </div>
            <div class="loginBlock">
              <?=form_submit('submit', $this->lang->line('user_lang_submit'),'id=loginblock_submit');?>
            </div>
        <?=form_close(); ?>
      </div>
    </div>

    <div id="maincontainer">
      <div id="left">
        <?=$maincontent?>
      </div>
      <div id="right">
        
      </div>
    </div>
  </div>
</div>

</body>
</html>