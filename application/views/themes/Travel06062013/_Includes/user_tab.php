<?php
PageUtil::addVar("javascript","<script type=\"text/javascript\">
    $(document).ready(function() {
        $('a.user_logout').click(function() {

            //Getting the variable's value from a link
            var loginBox = $(this).attr('href');

            //Fade in the Popup
            $(loginBox).fadeIn(300);

            //Set the center alignment padding + border see css style
            var popMargTop = ($(loginBox).height() + 24) / 2;
            var popMargLeft = ($(loginBox).width() + 24) / 2;

            $(loginBox).css({
                'margin-top' : -popMargTop,
                'margin-left' : -popMargLeft
            });

            // Add the mask to body
            $('body').append('<div id=\"mask\"></div>');
            $('#mask').fadeIn(300);

            console.log('Log: submit');
            $.post('".base_url("user/logout_ajax")."','', function(data) {
                console.log('Data Loaded: ' + data);
                //var obj = jQuery.parseJSON(data);
                var obj = data;
                console.log('Data Result: ' + obj.result);
                if(obj.result == '0'){
                    $('#logout-box').html(obj.error);
                    $('#logout-box').fadeIn('300');
                    $('#logout-box').css('display', 'block').delay(5000);
                    $('#logout-box').fadeOut('300');
                }else{
                    $('#logout-box').html('Successful!');
                    $('#logout-box').fadeIn('300');
                    $('#logout-box').css('display', 'block').delay(500);
                    $('#logout-box').fadeOut('300');
                    setTimeout(function(){
                         location.reload();
                    }, 1000);
                }
            });

            return false;
        });

        // When clicking on the button close or the mask layer the popup closed
        $('a.close').click(function() {
              $('#mask , .logout-popup').fadeOut(300 , function() {
                $('#mask').remove();
            });
            return false;
        });
    });
</script>");

PageUtil::addVar("javascript","<script type=\"text/javascript\">$(document).ready(function() {
$('a.login-window').click(function() {

    //Getting the variable's value from a link
    var loginBox = $(this).attr('href');
    //console.log(this);
    //console.log(loginBox);

    //Fade in the Popup
    $(loginBox).fadeIn(300);

    //Set the center alignment padding + border see css style
    var popMargTop = ($(loginBox).height() + 24) / 2;
    var popMargLeft = ($(loginBox).width() + 24) / 2;

    $(loginBox).css({
        'margin-top' : -popMargTop,
        'margin-left' : -popMargLeft
    });

    // Add the mask to body
    $('body').append('<div id=\"mask\"></div>');
    $('#mask').fadeIn(300);

    return false;
});

// When clicking on the button close or the mask layer the popup closed
$('a.close, #mask').click(function() {
      $('#mask , .login-popup, #redirect-box').fadeOut(300 , function() {
        $('#mask').remove();
    });
    return false;
});

$('form').submit(function() {
    //console.log('Log: submit');
    $('#alert').html('<img src=\"".Util::ThemePath()."/images/ajax-loader.gif\" border=\"0\">');
    $('#alert').show('300');
    $('#alert').css('display', 'block').delay(5000);
    $('#alert').css('text-align', 'center');
    $.post('".base_url("user/login_ajax")."', $('#login_form').serialize(),function(data) {
        //console.log('Data Loaded: ' + data);
        //var obj = jQuery.parseJSON(data);
        var obj = data;
        if(obj.result == '0'){
            $('#alert').html(obj.error);
            $('#alert').hide('300');
        }else{
            $('#alert').html('Successful!');
            $('#alert').hide('300');
            location.reload();
        }
    });
  return false;
});


});</script>");
?>
<div id="redirect-box" class="redirect-popup" style="text-align:center;">
    <img src="<?php echo Util::ThemePath();?>/images/ajax-loader.gif" border="0">
</div>
<div id="login-box" class="login-popup">
<a href="#" class="close"></a>
  <form method="post" class="signin" id="login_form" action="<?php echo base_url("user/login"); ?>">
        <fieldset class="textbox">
        <span id="alert" class="alert"></span>
        <label class="username">
        <span>Username or email</span>
        <input id="username" name="username" value="" type="text" autocomplete="on" placeholder="Username">
        </label>
        <label class="password">
        <span>Password</span>
        <input id="password" name="password" value="" type="password" placeholder="Password">
        </label>
        <input class="submit button" name="submit" type="submit">
        <p>
        <a class="forgot" href="#">Forgot your password?</a>
        </p>
        </fieldset>
  </form>
  <hr />
<img src="<?php echo Util::ThemePath(); ?>/images/login_with_facebook.png" border="0" id="facebook" style="cursor:pointer;display:block;margin-left:auto;margin-right:auto;">
<div id="fb-root"></div>
   <script type="text/javascript">
  window.fbAsyncInit = function() {
     FB.init({ 
       appId:'<?php echo $this->config->item('appId'); ?>', cookie:true,
       status:true, xfbml:true,oauth : true
     });
   };
   (function(d){
           var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement('script'); js.id = id; js.async = true;
           js.src = "//connect.facebook.net/en_US/all.js";
           ref.parentNode.insertBefore(js, ref);
         }(document));
 $('#facebook').click(function(e) {
    $('#login-box').fadeOut(300);
    $('#redirect-box').fadeIn(300);
    FB.login(function(response) {
      $('#alert').css('display', 'block').delay(5000);
      $('#alert').css('text-align', 'center');
      console.log(response);
      if(response.authResponse) {
          $('#redirect-box').html('Successful!').fadeIn(300);
          $('#redirect-box').html('<img src="<?php echo Util::ThemePath();?>/images/ajax-loader.gif" border="0"><br />Please wait for redirection...').fadeIn(300);
          $('#redirect-box').css('text-align', 'center');
          parent.location ='<?php echo base_url("user/fblogin"); ?>';
      }else{
        $('#redirect-box').fadeOut(300);
        $('#login-box').fadeIn(300);
        $('#alert').html("An error occurred, Please try again later").show(300);
        $('#alert').hide(1000);
      }
    //Set the center alignment padding + border see css style
    var popMargTop = ($('#redirect-box').height() + 44) / 2;
    var popMargLeft = ($('#redirect-box').width() + 44) / 2;

    $('#redirect-box').css({
      'margin-top' : -popMargTop,
      'margin-left' : -popMargLeft
    });
 },{scope: 'email,read_stream,publish_stream,user_birthday,user_location,user_work_history,user_hometown,user_photos,photo_upload,user_photo_video_tags'});
});
   </script>
</div>

<div class="row-fluid tab_user_margin">
  <div class="tab_user">
    <?php
    $user_data = $this->session->userdata("user_data");
    if(($this->session->userdata("logged_in") == TRUE)):
    ?>
    <div class="user_message">
      <img src="http://graph.facebook.com/<?php echo $user_data["username"];?>/picture" class="img-circle img-border" width="24" height="24"> Welcome back, <?php echo $user_data["name"];?>. (<?php echo $this->session->userdata("ip_address");?>)<span class="language_bar"><a href="<?php echo $this->lang->switch_uri("en");?>"><img src="<?php echo base_url('themes/Travel/images/flags/us.png');?>" border="0" /></a><a href="<?php echo $this->lang->switch_uri("th");?>"><img src="<?php echo base_url('themes/Travel/images/flags/th.png');?>" border="0" /></a></span><span class="user_logout"><a href="#logout-box" class="user_logout">Logout</a></span>
    </div>
    <?php
    else:
    ?>
    <a href="#login-box" class="login-window user_login">Login / Sign In</a>
    <?php
    endif;
    ?>
  </div>
</div>

<div id="logout-box" class="logout-popup">
    <img src="<?php echo Util::ThemePath();?>/images/ajax-loader.gif" border="0">
</div>

