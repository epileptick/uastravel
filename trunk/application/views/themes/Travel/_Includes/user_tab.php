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
        $('a.close').live('click', function() {
              $('#mask , .logout-popup').fadeOut(300 , function() {
                $('#mask').remove();
            });
            return false;
        });
    });
</script>");
?>

<div class="row-fluid">
  <div class="tab_user">
    <?php
    $user_data = $this->session->userdata("user_data");
    if(($this->session->userdata("logged_in") == TRUE)):
    ?>
    <div class="user_message">
      Welcome back, <?php echo $user_data["name"];?>. (<?php echo $this->session->userdata("ip_address");?>)<span class="user_logout"><a href="#logout-box" class="user_logout">Logout</a></span>
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

