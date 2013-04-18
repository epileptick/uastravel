<div class="row-fluid">
  <div class="tab_user">
    <?php
    if(($this->session->userdata("logged_in") == TRUE)):
    ?>
    <div class="user_message">
      Welcome back, UnzO. (<?php echo $this->session->userdata("ip_address");?>)<span class="user_logout"><a href="#" >Logout</a></span>
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