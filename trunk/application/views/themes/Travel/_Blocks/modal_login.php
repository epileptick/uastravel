<?php
PageUtil::addVar("javascript","<script type=\"text/javascript\">$(document).ready(function() {
$('a.login-window').click(function() {

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

    return false;
});

// When clicking on the button close or the mask layer the popup closed
$('a.close, #mask').live('click', function() {
      $('#mask , .login-popup').fadeOut(300 , function() {
        $('#mask').remove();
    });
    return false;
});

$('form').submit(function() {
    console.log('Log: submit');
    $.post('".base_url("user/login_ajax")."', $('#login_form').serialize(),function(data) {
        console.log('Data Loaded: ' + data);
        var obj = jQuery.parseJSON(data);
        if(obj.result == '0'){
            $('#alert').html(obj.error);
            $('#alert').show('300');
            $('#alert').css('display', 'block').delay(5000);
            $('#alert').hide('300');
        }else{
            $('#alert').html('Successful!');
            $('#alert').show('300');
            $('#alert').css('display', 'block').delay(5000);
            $('#alert').hide('300');
            location.reload();
        }
    });
  return false;
});


});</script>");
?>

<div id="login-box" class="login-popup">
<a href="#" class="close"><img src="<?php echo Util::ThemePath();?>/images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
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
</div>
