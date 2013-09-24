<!-- Tour Information -->
            <div class="row">
              <div class="twlve columns">
                <div class="article_tour">
                  <!-- Title -->
                  <div class="row">
                    <div class="eight columns">
                      <h3 class="title_tour" id="detail">(<?php echo $hotel[0]["code"];?>) <?php echo $hotel[0]["name"];?>
                      <?php
                        $user_data = $this->session->userdata("user_data");
                        if($this->session->userdata("logged_in")){
                          if($user_data["group"] == 1){
                            echo "[ <a href=\"".base_url("admin/hotel/create/".$hotel[0]["hotel_id"])."\" target=\"_blank\">Edit</a> ]";
                          }
                        }
                      ?></h3>
                    </div>
                    <div class="four columns">
                      <div class="social_network">
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style ">
                        <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>

                        <!--<a class="addthis_counter addthis_pill_style"></a>-->
                        </div>
                        <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-508ccf0302149b28"></script>
                        <!-- AddThis Button END -->
                      </div>
                    </div>
                  </div>
                  <!-- End Title -->
                  <div class="border"></div>
                  <p><?php echo $hotel[0]["description"];?></p>
                  <h3 style="padding:4px 4px 8px 4px; border:2px solid; border-color:#FAA20A; background-color:#FAA20A; color:#FFF; text-shadow: none !important;">
                    <?php echo $this->lang->line("tour_lang_program_and_itinerary");?>
                  </h3>
                  <p>
                    <?php echo $hotel[0]["detail"];?>
                  </p>

                  <?php
                    if(!empty($hotel[0]["included"]) && !empty($hotel[0]["remark"])){
                  ?>
                    <div class="row">
                      <div class="five columns">
                        <h3 style="color:#0000;"><?php echo $this->lang->line("tour_lang_tour_includes");?></h3>
                        <p>
                          <div style="padding:4px; border-left:2px solid; border-color:#FFC000;">
                            <?php echo (!empty($hotel[0]["included"])?$hotel[0]["included"]:"");?>
                          </div>
                        </p>
                      </div>

                      <div class="seven columns">
                        <h3 style="color:#0000;"><?php echo $this->lang->line("tour_lang_tour_remark");?></h3>
                        <p>
                          <div style="padding:4px; border-left:2px solid; border-color:#FFC000;">
                            <?php echo $hotel[0]["remark"];?>
                          </div>
                        </p>

                      </div>
                    </div>
                  <?php
                  }else if(!empty($hotel[0]["included"])){
                  ?>
                    <div class="row">
                      <div class="five columns">
                        <h3><?php echo $this->lang->line("tour_lang_tour_includes");?></h3>
                        <p>
                          <div style="padding:4px; border-left:2px solid; border-color:#FFC000;">
                            <?php echo (!empty($hotel[0]["included"])?$hotel[0]["included"]:"");?>
                          </div>
                        </p>
                      </div>
                    </div>
                  <?php
                  }else if(!empty($hotel[0]["remark"])){
                  ?>
                    <div class="row">
                      <div class="five columns">
                        <h3><?php echo $this->lang->line("tour_lang_tour_remark");?></h3>
                        <p>
                          <div style="padding:4px; border-left:2px solid; border-color:#FFC000;">
                            <?php echo (!empty($hotel[0]["included"])?$hotel[0]["remark"]:"");?>
                          </div>
                        </p>
                      </div>
                    </div>
                  <?php
                  }
                  ?>


              <form name="input"
                    action="<?php echo base_url('hotel/inquiry');?>"
                    method="post"
              >
                <!-- price -->
                <?php
                  if(!empty($price)){
                ?>
                <div class="row">

                  <h3>ราคาทัวร์</h3>
                  <table class="twelve">
                    <thead>
                      <tr>
                        <th style="font-size:18px !important;">รายการ</th>
                        <th style="font-size:18px !important;">ราคาห้องพัก(บาท)</th>
                        <th style="font-size:18px !important;">จำนวน(ห้อง)</th>
                        <th style="font-size:18px !important;">จำนวน(วัน)</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $countPrice =0;
                    foreach ($price as $key => $value) {
                    ?>

                      <tr>
                        <td style="font-size:18px !important;">
                          <?php
                            if($countPrice == 0){
                          ?>
                            <label for="checkbox_<?php echo $value["id"];?>">
                              <input name="price_id[]"
                                      type="checkbox"
                                      id="radio_<?php echo $value["id"];?>"
                                      value="<?php echo $value["id"];?>"
                                      CHECKED
                              >
                              <?php echo (!empty($value["name"])?$value["name"]:"");?>
                            </label>
                          <?php
                            }else{
                          ?>
                            <label for="checkbox_<?php echo $value["id"];?>">
                              <input name="price_id[]"
                                      type="checkbox"
                                      id="radio_<?php echo $value["id"];?>"
                                      value="<?php echo $value["id"];?>"
                              >
                              <?php echo (!empty($value["name"])?$value["name"]:"");?>
                            </label>
                          <?php
                            }
                          ?>
                        </td>

                        <td style="font-size:18px !important;">
                            <?php
                            if($value["discount_room_price"]>0){
                            ?>
                                 <center><label><strike><?php echo number_format($value["sale_room_price"], 0);?></strike>
                                <?php echo number_format($value["discount_room_price"], 0);?></label></center>

                              <?php
                            }else{
                              ?>
                                <center><label><?php echo number_format($value["sale_room_price"], 0);?></label></center>
                            <?php
                                }
                             ?>
                        </td>

                        <td style="font-size:18px !important;">
                          <input name="room_amount_booking[<?php echo $value["id"];?>]"
                                  type="text"
                                  id="amount_room_<?php echo $value["id"];?>"
                                  style="height: 20px !important; width: 30px !important;"

                        >
                        </td>


                        <td style="font-size:18px !important;">
                          <input name="date_amount_booking[<?php echo $value["id"];?>]"
                                  type="text"
                                  id="amount_date_<?php echo $value["id"];?>"
                                  style="height: 20px !important; width: 30px !important;"
                          >
                        </td>
                      </tr>
                    <?php
                      $countPrice++;
                    }
                    ?>
                      <tr>
                        <td class="price_booking" colspan="5">
                            <input type="hidden" name="id" value="<?php echo $hotel[0]["hotel_id"];?>"></input>
                            <input class="button small  booking" type="submit" value="จองโรงแรมนี้">
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
              </div>
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
                                if($hotel[0]["latitude"] && $hotel[0]["longitude"]){
                              ?>
                                  var lat = <?php echo $hotel[0]["latitude"];?>;
                                  var lon = <?php echo $hotel[0]["longitude"];?>;
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
                                  title: '<?php echo $hotel[0]["name"];?>',
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
                          <a href="<?php echo $value["hotel"]->hott_url."-".$value["hotel"]->hot_id; ?>">
                            <img src="<?php echo $value["hotel"]->hot_banner_image; ?>">
                          </a>
                        </div>
                        <div class="twelve columns">
                          <div class="row">
                            <div class="nine columns">
                              <div class="title_tour">
                                <h4>
                                  <a href="<?php echo $value["hotel"]->hott_url."-".$value["hotel"]->hot_id; ?>">
                                    <?php echo $value["hotel"]->hott_name; ?>
                                  </a>
                                </h4>
                              </div>
                            </div>
                            <div class="three columns">
                              <div class="rating one_star" style="display:none"></div>
                              <div class="rating two_star" style="display:none"></div>
                              <div class="rating three_star"></div>
                              <div class="rating four_star" style="display:none"></div>
                              <div class="rating five_star"style="display:none"></div>
                              <div class="clearfix"></div>
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
                  <div class="fb-comments" data-href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$hotel[0]["url"].'-'.$hotel[0]["hotel_id"]);?>" data-num-posts="20" data-width=""></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Tour Information -->