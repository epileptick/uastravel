								<li><a href="<?php echo base_url();?>"> <img style="vertical-align: top;margin-top: 8px;" src="<?php echo $themepath."/images/home-icon.png";?>"> <?php echo $this->lang->line("global_lang_home");?></a></li>
                <?php 
                  if($this->uri->segment(1) == $this->lang->line("url_lang_location") AND $this->uri->total_segments() == 1){
                    echo "<li active=\"true\"><label><a class=\"active\" href=".base_url($this->lang->line("url_lang_location")).">".$this->lang->line("global_lang_location")."</a></label></li>";
                  }else{
                    echo "<li><label><a href=".base_url($this->lang->line("url_lang_location")).">".$this->lang->line("global_lang_location")."</a></label></li>";
                  }

                  if($this->uri->segment(1) == $this->lang->line("url_lang_location")){
	                  foreach ($allProvince as $key => $value) {
	                    $isActive = "";
	                    if($this->uri->total_segments() <= 2 AND ($this->uri->segment(1) == $this->lang->line("url_lang_location"))){
	                      foreach ($this->uri->segment_array() as $key => $segment) {
	                        if($value["url"] == $segment){
	                          $isActive = "active";
	                        }
	                      }
	                    }
	                    echo "<li><a class=\"$isActive\" href=".base_url($this->lang->line("url_lang_location")."/".$value["url"])."> <img style=\"vertical-align: top;margin-top: 8px;\" src=\"$themepath/images/list_hover2.png\"> ".$value["name"]."</a>";
                      if(!empty($isActive)){
                        echo "<ul class=\"sub-menu\">";
                        if(!empty($location)){
                          foreach ($location as $key => $value) {
                            ?>
                            <li>

                              <a class="ajax-click" href="<?php echo base_url($this->lang->line("url_lang_location").'/'.$value['location']["loct_url"].'-'.$value['location']["location_id"]);?>" title="<?php echo $value['location']["title"];?>">
                              <?php
                                if($value['location']["first_image"]){
                              ?>
                                <img style="width:30px;height:30px;margin-top:-4px;" src="<?php echo $value['location']["first_image"];?>" alt="<?php echo $value['location']["title"];?>">
                              <?php
                                }else{
                              ?>
                                <img style="width:30px;height:30px;margin-top:-4px;" src="<?php echo $imagepath;?>/camera_icon.jpg">
                              <?php
                                }
                              ?>
                                <?php echo (!empty($value['location']["short_title"]) ? $value['location']["short_title"] : $value['location']["title"]); ?>
                              </a></li>
                            <?php
                          }
                        }else{
                          echo "<li><a href='#' style='font-size: 16px;color:#4e4e4e;'> <img style=\"vertical-align: top;margin-top: 12px;margin-left: 8px;\" src=\"$themepath/images/list.png\"> ".$this->lang->line("global_lang_data_not_found")."</a></li>";
                        }
                        echo "</ul>";
                      }
                      echo "</li>";
	                  }
                  }
                ?>

                <li><label><a href="<?php echo base_url($this->lang->line("url_lang_tour"));?>"><?php echo $this->lang->line("global_lang_tour_packages");?></a></label></li>
                <?php
                    if(!empty($main_menu) AND ($this->uri->segment(1) == $this->lang->line("url_lang_tour") OR $this->uri->total_segments() == 0)){
                      foreach ($main_menu as $main_menuKey => $main_menuValue) {
                        echo "<li>";
                        $span = "";
                        $mainURL = base_url($this->lang->line("url_lang_tour").'/'.$main_menuValue["url"]);
                        $isActive = "";
                        if($this->uri->total_segments() <= 2 AND ($this->uri->segment(1) == $this->lang->line("url_lang_tour"))){
                          foreach ($this->uri->segment_array() as $key => $segment) {
                            if($main_menuValue["url"] == $segment){
                              $isActive = "active";
                            }
                          }
                        }
                        $toggle = "false";
                        if($this->uri->total_segments() == 3 AND $this->uri->segment(3) == $main_menuValue["url"]){
                          $toggle = "true";
                        }

                        echo "<a class=\"$isActive ajax-click\" toggle=\"$toggle\" href=\"$mainURL\"> <img style=\"vertical-align: top;margin-top: 8px;\" src=\"$themepath/images/list_hover2.png\"> $main_menuValue[name]</a>";
                        if(!empty($main_menuValue["child"])){

                          $isActive = "active=\"false\"";
                          $isThis = false;

                          if($this->uri->segment(1) == $this->lang->line("url_lang_tour")){
                            foreach ($this->uri->segment_array() as $key => $segment) {
                              if($this->uri->total_segments() == 3 AND $this->uri->segment(3) == $main_menuValue["url"]){
                                $isThis = true;
                              }
                              if($main_menuValue["url"] == $segment){
                                $isActive = "active=\"true\"";
                              }
                            }
                          }
                          echo "<ul class=\"sub-menu\" $isActive >";
                          foreach ($main_menuValue["child"] as $childKey => $childValue) {
                            $isActive = "";
                            if($this->uri->total_segments() == 3 AND $this->uri->segment(3) == $main_menuValue["url"]){
                              if($this->uri->segment(1) == $this->lang->line("url_lang_tour")){
                                foreach ($this->uri->segment_array() as $key => $segment) {
                                  if($childValue["url"] == $segment){
                                    $isActive = "active";
                                    $addStyle = "style=\"display:block;\"";
                                  }
                                }
                              }
                            }
                            echo "<li>";
                            $childURL = base_url($this->lang->line("url_lang_tour").'/'.$childValue["url"].'/'.$main_menuValue["url"]);
                            echo "<a class=\"$isActive ajax-click\"  href=\"$childURL\"> <img style=\"vertical-align: top;margin-top: 12px;\" src=\"$themepath/images/list.png\"> $childValue[name]</a>";

                            if(!empty($isActive) AND $isThis){
                              if(!empty($tour) ){
                                echo "<ul class=\"sub-menu tour-list\" $addStyle>";
                                foreach ($tour as $key => $value) {
                                  if(!empty($value["tour"])){
                                ?>
                                  <li>

                                    <a class="ajax-click"  href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$value["tour"]["tout_url"].'-'.$value["tour"]["tour_id"]);?>">
                                    <?php
                                      if($value["tour"]["first_image"]){
                                    ?>
                                      <img style="width:30px;height:30px;margin-top:-4px;" src="<?php echo $value["tour"]["first_image"];?>">
                                    <?php
                                      }else{
                                    ?>
                                      <img style="width:30px;height:30px;margin-top:-4px;" src="<?php echo $imagepath;?>/camera_icon.jpg">
                                    <?php
                                      }
                                    ?>
                                      <?php echo (!empty($value['tour']["tout_short_name"]) ? $value['tour']["tout_short_name"] : $value['tour']["tout_name"]); ?>
                                    </a></li>
                                <?php
                                  }
                                }
                                echo "</ul>";
                              }else{
                                echo "<li><a href='#' style='font-size: 16px;color:#4e4e4e;'> <img style=\"vertical-align: top;margin-top: 12px;margin-left: 8px;\" src=\"$themepath/images/list.png\"> ".$this->lang->line("global_lang_data_not_found")."</a></li>";
                              }
                              echo "</li>";
                            }
                          }
                          echo "</ul>";
                        }
                        echo "</li>";
                      }
                    }
                  ?>
                <?php 
                  if($this->uri->segment(1) == $this->lang->line("url_lang_hotel") AND $this->uri->total_segments() == 1){
                    echo "<li active=\"true\"><label><a class=\"active\" href=".base_url($this->lang->line("url_lang_hotel")).">".$this->lang->line("global_lang_hotel")."</a></label></li>";
                  }else{
                    echo "<li><label><a href=".base_url($this->lang->line("url_lang_hotel")).">".$this->lang->line("global_lang_hotel")."</a></label></li>";
                  }

                  if($this->uri->segment(1) == $this->lang->line("url_lang_hotel")){
                    foreach ($allProvince as $key => $value) {
                      $isActive = "";
                      if($this->uri->total_segments() <= 2 AND ($this->uri->segment(1) == $this->lang->line("url_lang_hotel"))){
                        foreach ($this->uri->segment_array() as $key => $segment) {
                          if($value["url"] == $segment){
                            $isActive = "active";
                          }
                        }
                      }
                      echo "<li><a class=\"$isActive\" href=".base_url($this->lang->line("url_lang_hotel")."/".$value["url"])."> <img style=\"vertical-align: top;margin-top: 8px;\" src=\"$themepath/images/list_hover2.png\"> ".$value["name"]."</a>";
                      if(!empty($isActive)){
                        echo "<ul class=\"sub-menu\">";
                        if(!empty($hotels)){
                          foreach ($hotels as $key => $value) {
                            ?>
                            <li>
                              <a class="ajax-click" href="<?php echo base_url($this->lang->line("url_lang_hotel").'/'.$value["hott_url"].'-'.$value["hotel_id"]);?>" title="<?php echo $value["hott_name"];?>">
                              <?php
                                if($value["first_image"]){
                              ?>
                                <img style="width:30px;height:30px;margin-top:-4px;" src="<?php echo $value["first_image"];?>" alt="<?php echo $value["hott_name"];?>">
                              <?php
                                }else{
                              ?>
                                <img style="width:30px;height:30px;margin-top:-4px;" src="<?php echo $imagepath;?>/camera_icon.jpg">
                              <?php
                                }
                              ?>
                                <?php echo $value["hott_name"]; ?>
                              </a></li>
                            <?php
                          }
                        }else{
                          echo "<li><a href='#' style='font-size: 16px;color:#4e4e4e;'> <img style=\"vertical-align: top;margin-top: 12px;margin-left: 8px;\" src=\"$themepath/images/list.png\"> ".$this->lang->line("global_lang_data_not_found")."</a></li>";
                        }
                        echo "</ul>";
                      }
                      echo "</li>";
                    }
                  }
                ?>
                <li><label><a href="<?php echo base_url($this->lang->line("url_lang_location").'/'.Util::url_title($this->lang->line("global_lang_contact_us")).'-119');?>"><?php echo $this->lang->line("global_lang_contact_us");?></a></label></li>

                <script type="text/javascript">
                    var loading = false;
                    var lastURL = "";
                    $("ul.side_bar").on("click","a.ajax-click",function(e){
                      if($(this).parent().children("ul.tour-list").css("display") == "block"){
                        $(this).parent().children('ul').toggle(200);
                        $(this).children('img').toggleClass("rotate");
                        return false;
                      }
                      var count = $(this).parent().children('ul').length;
                      if(count > 0){
                        $(this).parent().children('ul').toggle(200);
                      }
                      if(!loading){
                        $(this).children('img').toggleClass("rotate");
                        link = $(this).attr("href")+"?ajax=true";
                        if(link == lastURL){
                          return false;
                        }
                        $(".side_bar a").removeClass("active");
                        $(this).addClass("active");
                        var parent = this;
                        $(".right_columns").hide().html("<img style=\"width:48px; height:48px; margin:auto; margin-top: 50%; display: block;\" src=\"<?php echo Util::ThemePath();?>/images/loader.gif\" border=\"0\">").fadeIn(300);
                        lastURL = link;
                        linkRedirect = $(this).attr("href");
                        jqxhr = $.get(link);
                        loading = true;
                        jqxhr.success(function(data) {
                                        loading = false;
                                        var json = jQuery.parseJSON(data);
                                        $(".right_columns").hide().html(json.bodyRedered).fadeIn(300);
                                        $("#gallery_row").hide().html(json.imagesRedered).fadeIn(300).css("height","");
                                        if($(parent).parent().children("ul.tour-list").length == 0){
                                          if(json.tourList != undefined){
                                            if($(parent).parent().children("ul.sub-menu").length == 0){
                                              $(parent).parent().append(json.tourList).fadeIn(300);
                                            }else{
                                              $(parent).parent().children("ul.sub-menu").remove();
                                              $(parent).parent().append(json.tourList).fadeIn(300);
                                            }
                                          }
                                        }
                                        $("a#title").html(json.data.name);
                                        if(json.data.short_description != undefined){
                                          $("span.subtitle").html(json.data.short_description);
                                        }
                                        if(json.data.background_image != undefined){
                                          $("body").css('background-image',"url('"+json.data.background_image+"')");
                                        }
                                        if(json.data.latitude != undefined){
                                          initialize(json.data.latitude, json.data.longitude);
                                        }
                                        processAjaxData(json.data.name, json, $(".left_columns").html(), linkRedirect);
                                      });
                      }else{
                        $(".right_columns").hide().html("<p style=\"width:100px; height:18px; margin:auto; margin-top: 50%; display: block;\">We're loading...</p><br /><img style=\"width:48px; height:48px; margin:auto; display: block;\" src=\"<?php echo Util::ThemePath();?>/images/loader.gif\" border=\"0\">").fadeIn(300);
                      }
                      return false;
                    });

                    $('ul.sub-menu').each(function (item) {
                      if($(this).attr("active") == "false"){
                        $(this).toggle(200);
                      }else{
                        $(this).parent().find('img:first').addClass("rotate");
                      }
                    });
                </script>