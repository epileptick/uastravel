
    <!-- Tour Information -->
    <div class="row">
      <div class="twlve columns">
          <!-- Title -->
          <div class="row">
            <div class="twelve columns">
              <h2 class="head_title" id="detail">(<?php echo $tour[0]["code"];?>) <?php echo $tour[0]["name"];?>
              <?php
                $user_data = $this->session->userdata("user_data");
                if($this->session->userdata("logged_in")){
                  if($user_data["group"] == 1){
                    echo "[ <a href=\"".base_url("admin/tour/create/".$tour[0]["tour_id"])."\" target=\"_blank\">Edit</a> ]";
                  }
                }
              ?></h2>
            </div>
            <div id="gallery_row">
            </div>
            <div class="twelve columns">
              <div class="social_network">
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style ">
                  <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                  <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                <!--<a class="addthis_counter addthis_pill_style"></a>-->
                </div>
                <!-- AddThis Button END -->
              </div>
            </div>
          </div>
          <!-- End Title -->
          <p><?php echo $tour[0]["description"];?></p>
          <h3 style="padding:4px 4px 8px 4px; border:2px solid; border-color:#FAA20A; background-color:#FAA20A; color:#FFF; text-shadow: none !important;">
            <?php echo $this->lang->line("tour_lang_program_and_itinerary");?>
          </h3>
          <!--
          <p><span class="color_blue">ช่วงเช้า: </span> รถรับท่านจากโรงแรมที่พักในจังหวัดภูเก็ต หรือ เขาหลัก มุ่งหน้าสู่ท่าเรือคุระบุรี จังหวัดพังงา ออกเดินทางจากท่าเรือ สู่อุทยานฯ หมู่เกาะสุรินทร์ ด้วยเรือสปีดโบ๊ทขนาดใหญ่ เดินทามาถึงอุทยานแห่งชาติ หมู่เกาะสุรินทร์  ดำน้ำดูปะการังบริเวณ อ่าวแม่ยาย และ อ่าวเต่า สนุกสนานกับการเล่นน้ำ ดำน้ำชมปะการัง หรือพักผ่อนตามอัธยาศัย</p>
          <p><span class="color_blue">เที่ยง:</span> รับประทานอาหารกลางวัน ณ ที่ทำการอุทยานแห่งชาติหมู่เกาะสุรินทร์</p>
          <p><span class="color_blue">ช่วงบ่าย:</span> ออกเดินทางต่อไปดำน้ำดูปะการังบริเวณ อ่าวผักกาด และ เกาะตอรินลา</p>
          <p>ได้เวลาพอสมควร ออกเดินทางกลับจากอุทยานแห่งชาติหมู่เกาะสุรินทร์ สู่ท่าเรือ คุระบุรี จังหวัดพังงา เดินทางกลับสู่ที่พัก ประมาณ 1 ทุ่ม  ส่งท่านถึงที่โรงแรมที่พักในจังหวัดภูเก็ต</p>
          -->
          <p> <?php echo $tour[0]["detail"];?> </p>

          <?php
            if(!empty($tour[0]["included"]) && !empty($tour[0]["remark"])){
          ?>
            <div class="row">
              <div class="five columns">
                <h3 style="color:#0000;"><?php echo $this->lang->line("tour_lang_tour_includes");?></h3>

                <p>
                  <div style="padding:4px; border-left:2px solid; border-color:#FFC000;">
                    <?php echo (!empty($tour[0]["included"])?$tour[0]["included"]:"");?>
                  </div>
                </p>
              </div>

              <div class="seven columns">
                <h3 style="color:#0000;"><?php echo $this->lang->line("tour_lang_tour_remark");?></h3>
                <p>
                  <div style="padding:4px; border-left:2px solid; border-color:#FFC000;">
                    <?php echo $tour[0]["remark"];?>
                  </div>
                </p>

              </div>
            </div>
          <?php
          }else if(!empty($tour[0]["included"])){
          ?>
            <div class="row">
              <div class="five columns">
                <h3><?php echo $this->lang->line("tour_lang_tour_includes");?></h3>
                <p>
                  <div style="padding:4px; border-left:2px solid; border-color:#FFC000;">
                    <?php echo (!empty($tour[0]["included"])?$tour[0]["included"]:"");?>
                  </div>
                </p>
              </div>
            </div>
          <?php
          }else if(!empty($tour[0]["remark"])){
          ?>
            <div class="row">
              <div class="five columns">
                <h3><?php echo $this->lang->line("tour_lang_tour_remark");?></h3>
                <p>
                  <div style="padding:4px; border-left:2px solid; border-color:#FFC000;">
                    <?php echo (!empty($tour[0]["included"])?$tour[0]["remark"]:"");?>
                  </div>
                </p>
              </div>
            </div>
          <?php
          }
          ?>

              <form name="form" action="<?php echo base_url($this->lang->line("url_lang_tour").'/inquiry');?>" method="post">
                <?php
                  if(!empty($price)){
                ?>
                <div class="row">
                  <h3><?php echo $this->lang->line("tour_lang_tour_price"); ?></h3>
                  <table class="twelve">
                    <thead>
                      <tr>
                        <th class="five"><?php echo $this->lang->line("tour_lang_tour_list"); ?></th>
                        <th class="two"><?php echo $this->lang->line("tour_lang_tour_adult_price"); ?></th>
                        <th class="one"><?php echo $this->lang->line("tour_lang_tour_amount"); ?></th>
                        <th class="two"><?php echo $this->lang->line("tour_lang_tour_child_price"); ?></th>
                        <th class="one"><?php echo $this->lang->line("tour_lang_tour_amount"); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $countPrice =0;
                    foreach ($price as $key => $value) {
                    ?>
                      <tr>
                        <td >
                          <?php
                            if($value["show_firstpage"] == 1 && $firstpage_price == 1){
                          ?>
                              <label for="checkbox_<?php echo $value["price_id"];?>">
                                <input name="price_id[]"
                                        type="checkbox"
                                        id="checkbox_<?php echo $value["price_id"];?>"
                                        value="<?php echo $value["price_id"];?>"
                                        CHECKED
                                >
                                <?php echo (!empty($value["name"])? $value["name"] :"");?>
                              </label>
                          <?php
                            }else if($countPrice == 0 && $firstpage_price == 0){
                          ?>
                              <label for="checkbox_<?php echo $value["price_id"];?>">
                                <input name="price_id[]"
                                        type="checkbox"
                                        id="checkbox_<?php echo $value["price_id"];?>"
                                        value="<?php echo $value["price_id"];?>"
                                        CHECKED
                                >
                                <?php echo (!empty($value["name"])?$value["name"]:"");?>
                              </label>
                          <?php

                            }else{
                          ?>
                            <label for="checkbox_<?php echo $value["price_id"];?>">
                              <input name="price_id[]"
                                      type="checkbox"
                                      id="checkbox_<?php echo $value["price_id"];?>"
                                      value="<?php echo $value["price_id"];?>"
                              >
                              <?php echo (!empty($value["name"])?$value["name"]:"");?>
                            </label>
                          <?php
                            } //End
                          ?>
                        </td>


                        <td >

                            <?php

                                if($value["discount_adult_price"]>0){
                            ?>

                                 <center><label><strike><?php echo number_format($value["sale_adult_price"], 0);?></strike>
                                <?php echo number_format($value["discount_adult_price"], 0);?></label></center>

                              <?php
                            }else{
                              ?>
                                <center><label><?php echo number_format($value["sale_adult_price"], 0);?></label></center>

                            <?php
                                }
                             ?>
                        </td>

                        <td >
                          <?php
                            if($value["show_firstpage"] == 1 && $firstpage_price == 1){
                          ?>
                              <input name="adult_amount_booking[<?php echo $value["price_id"];?>]"
                                      type="text"
                                      id="amount_adult_<?php echo $value["price_id"];?>"
                                      class="twelve text-center"
                                      value="1">
                          <?php
                            }else if($countPrice == 0 && $firstpage_price == 0){
                          ?>
                              <input name="adult_amount_booking[<?php echo $value["price_id"];?>]"
                                      type="text"
                                      id="amount_adult_<?php echo $value["price_id"];?>"
                                      class="twelve text-center"
                                      value="1">
                          <?php
                            }else{
                          ?>
                              <input name="adult_amount_booking[<?php echo $value["price_id"];?>]"
                                      type="text"
                                      id="amount_adult_<?php echo $value["price_id"];?>"
                                      class="twelve text-center"
                                      value="0">
                          <?php
                              }
                           ?>
                        </td>
                        <td >
                            <?php
                                if($value["discount_child_price"]>0){
                            ?>
                                 <center><label><strike><?php echo number_format($value["sale_child_price"], 0);?></strike>
                                <?php echo number_format($value["discount_child_price"], 0);?></label></center>
                              <?php
                            }else{
                              ?>
                                <center><label><?php echo number_format($value["sale_child_price"], 0);?></label></center>
                            <?php
                                }
                             ?>
                        </td>

                        <td >
                          <input name="child_amount_booking[<?php echo $value["price_id"];?>]"
                                  type="text"
                                  id="amount_child_<?php echo $value["price_id"];?>"
                                  class="twelve text-center"
                                  value="0"
                          >
                        </td>
                      </tr>
                    <?php
                      $countPrice++;
                    }
                    ?>
                      <tr>
                        <td class="price_booking" colspan="5">
                            <input type="hidden" name="id" value="<?php echo $tour[0]["tour_id"];?>"></input>
                            <input class="btn btn-primary float-right"  type="submit" value="<?php echo $this->lang->line("tour_lang_tour_booking");?>">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?php
                  }
                ?>
                <!-- End price -->
              </form>
        <!-- Start contact -->
        <div class="row">
         <div class="twelve columns">
              <span style="font-size:30px; color:#FE5214; margin:-10px 0 10px 0; display:inline-block;" ><?php echo $this->lang->line("global_lang_contact_us");?> : </span>
              <span style="font-size:18px;"><b><?php echo $this->lang->line("global_lang_telephone");?>.</b> 082-8121146, 076-331280&nbsp;&nbsp;<b><?php echo $this->lang->line("global_lang_fax");?>.</b> 076-331273&nbsp;&nbsp;<b><?php echo $this->lang->line("global_lang_e_mail");?></b> info@uastravel.com</span>
          </div>
        </div>
        <!-- End contact -->

        <!-- Start tag -->
        <div class="border"></div>
        <div class="row">
          <div class="twelve columns">
            <ul class="tags">
              <li><a class="tags_name" href="#">Tags</a></li>
              <?php
                if(!empty($tag)){

                  foreach ($tag as $key => $value) {
                    if(!empty($value["tagt_url"]) &&  $value["tag_id"] != 1){
              ?>
                    <li><a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$value["tagt_url"]);?>"><?php echo $value["tagt_name"]; ?></a></li>
              <?php
                    }
                  }
                }
              ?>
            </ul>
          </div>
        </div>
        <!-- End tag -->

      <!-- End box_white_in_columns-->
      <!-- End Tour Information -->

        <!-- Map -->
          <div class="row">
            <div class="eight columns">
              <h3><?php echo $this->lang->line("global_lang_map");?></h3>
              <div class="map">
                <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
                <script type="text/javascript">
                      <?php
                        if($tour[0]["latitude"] && $tour[0]["longitude"]){
                      ?>
                          var lat = <?php echo $tour[0]["latitude"];?>;
                          var lon = <?php echo $tour[0]["longitude"];?>;
                      <?php
                        }else{
                      ?>
                          var lat = 7.893989;
                          var lon = 98.407288;
                      <?php
                        }
                      ?>
                      var map;
                      var latLng = new google.maps.LatLng(lat, lon);
                      function initialize() {
                        var myOptions = {
                          zoom: 13,
                          center: latLng,
                          mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
                        map = new google.maps.Map(document.getElementById('map_canvas'),
                            myOptions);

                        marker = new google.maps.Marker({
                          position: latLng,
                          title: '<?php echo $tour[0]["name"];?>',
                          map: map,
                          draggable: false
                        });
                      }

                      google.maps.event.addDomListener(window, 'load', initialize);
                </script>
                <div id="map_canvas" style="width:100%;height:650px;"></div>
              </div>

            </div>

        <!-- Right bar -->
        <div class="four columns">
          <!-- Packet -->
          <h3><?php echo $this->lang->line("tour_lang_packages_tour_suggest");?></h3>

          <?php
          if(!empty($related )):
            foreach ($related as $key => $value):
          ?>
            <div class="list_packet">
              <div class="row">
                <div class="twelve columns">
                  <a href="<?php echo $value["tour"]->tout_url."-".$value["tour"]->tou_id; ?>">
                    <img src="<?php echo $value["tour"]->tou_banner_image; ?>">
                  </a>
                </div>
                <div class="twelve columns">
                  <div class="row">
                    <div class="twelve columns">
                      <div class="title_tour">
                        <h4>
                          <a href="<?php echo $value["tour"]->tout_url."-".$value["tour"]->tou_id; ?>">
                            <?php echo $value["tour"]->tout_name; ?>
                          </a>
                        </h4>
                      </div>
                    </div>
                  </div>
                  <div class="border"></div>
                </div>
                <div class="twelve columns">
                  <div class="icon view tooltip_se" title="จำนวนคนดู">1358</div>
                  <div class="icon comment tooltip_se" title="จำนวนคอมเม้น">25</div>
                  <div class="price">
                    <span>

                    <?php
                        if(!empty($value["price"]->pri_sale_adult_price)){

                          if($value["price"]->pri_discount_adult_price>0){

                            $priceAdultDiscount = number_format($value["price"]->pri_discount_adult_price, 0);
                            $priceAdult = number_format($value["price"]->pri_sale_adult_price, 0);

                            echo "<f style='text-decoration: line-through;'>".$priceAdult."</f>&nbsp;".$priceAdultDiscount;
                            echo " ".$this->lang->line("global_lang_baht");

                          }else{
                            echo number_format($value["price"]->pri_sale_adult_price, 0);
                            echo " ".$this->lang->line("global_lang_baht");
                          }

                          //text-decoration: line-through; color: #โค้ดสีเส้น;

                        }else{
                          echo "Call";
                          echo " ".$this->lang->line("global_lang_baht");
                        }
                      ?>



                    </span>
                  </div>
                </div>
              </div>
            </div>

          <?php
            endforeach;
          endif;
          ?>

          <!-- End Packet -->
        </div>
        <!-- End Right bar -->
          </div>
      </div>
      <!-- End Map -->

    </div>

    <div class="row">
      <div class="facebook_comment">
        <div class="twelve columns">
          <h3><?php echo $this->lang->line("global_lang_comment");?></h3>
          <div id="fb-root"></div>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/<?php echo strtolower($this->lang->lang()); ?>_<?php echo strtoupper($this->lang->lang()); ?>/all.js#xfbml=1&appId=357467797616103";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
          <div class="fb-comments" data-href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$tour[0]["url"].'-'.$tour[0]["tour_id"]);?>" data-num-posts="20" data-width=""></div>
        </div>
      </div>
    </div>