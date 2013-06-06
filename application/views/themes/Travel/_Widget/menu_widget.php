<!-- Menu -->
    <div class="row">
      <div class="twelve columns">
        <nav class="top-bar">
          <ul>
            <li class="name">
              <a href="<?php echo base_url();?>">
                <img src="<?php echo base_url('themes/Travel/tour/images/logo.png');?>">
              </a>
            </li>
            <li class="toggle-topbar"><a href="#"></a></li>
          </ul>


          <section>
            <ul class="right">
              <li><a href="<?php echo base_url($this->lang->line("tour_lang_location"));?>"><?php echo $this->lang->line("global_lang_location"); ?></a></li>
              <?php
                if(!empty($main_menu)){
                  foreach ($main_menu as $main_menuKey => $main_menuValue) {
                    $mainURL = base_url($this->lang->line("url_lang_tour").'/'.$main_menuValue["url"]);
                    if(!empty($main_menuValue["child"])){
                      echo "<li class=\"has-dropdown\">";
                    }else{
                      echo "<li>";
                    }
                    echo "<a href=\"$mainURL\">$main_menuValue[name]</a>";
                    if(!empty($main_menuValue["child"])){
                      echo "<ul class=\"dropdown\">";
                      foreach ($main_menuValue["child"] as $childKey => $childValue) {
                        echo "<li>";
                        $childURL = base_url($this->lang->line("url_lang_tour").'/'.$childValue["url"]);
                        echo "<a href=\"$childURL\">$childValue[name]</a>";
                        echo "</li>";
                      }
                      echo "</ul>";
                    }
                    echo "</li>";
                  }
                }
              ?>
              <li><a href="<?php echo base_url($this->lang->line("url_lang_location").'/'.Util::url_title($this->lang->line("global_lang_contact_us")).'-119');?>"><?php echo $this->lang->line("global_lang_contact_us");?></a></li>
            </ul>
          </section>
        </nav>
      </div>
    </div>
    <!-- End Menu -->