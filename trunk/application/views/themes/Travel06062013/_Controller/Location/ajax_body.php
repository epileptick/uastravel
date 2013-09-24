    <div class="row">
      <section class="article">
        <div class="row">
          <div class="twelve columns">
            <h3 id="detail"><?php echo $location['title'];?>
              <?php
                if($this->session->userdata("logged_in")){
                  echo "[ <a href=\"".base_url("admin/location/create/".$location['id'])."\" target=\"_blank\">Edit</a> ]";
                }
              ?></h3>
          </div>
          <div class="five columns">
          </div>
        </div>
        <div class="border"></div>
        <div class="row">
          <div class="four columns">
            <?php
            if(! empty($location['body'][0])){
              echo $location['body'][0];
            }
            ?>
          </div>
          <div class="four columns">
            <?php
            if(! empty($location['body'][1])){
              echo $location['body'][1];
            }
            ?>
          </div>
          <div class="four columns">
            <?php
            if(! empty($location['body'][2])){
              echo $location['body'][2];
            }
            ?>
          </div>
        </div>

        <!-- Tag -->
        <div class="row">
          <div class="twelve columns">
          <div class="border"></div>
            <ul class="tags">
              <li><a class="tags_name" href="#">Tags</a></li>
              <?php
                //print_r($tag);
                if(!empty($tag)){

                  foreach ($tag as $key => $value) {
                    if(!empty($value["url"]) &&  $value["tag_id"] != 1){
              ?>
                      <li><a href="<?php echo base_url($this->lang->line("url_lang_location").'/'.$value["url"]);?>"><?php echo $value["name"]; ?></a></li>
              <?php
                    }
                  }
                }
              ?>
            </ul>
          </div>
        </div>
        <!-- End Tag -->

      </section>
    </div>
    
    <div class="row">
      <div class="eight columns">
        <div class="row">
          <div class="twelve columns">
            <h3>แผนที่</h3>
            <div class="map">
              <?php
                if(empty($location['suggestion']) AND empty($location['route'])):
              ?>
              <div id="mapCanvas" style="height:650px;"></div>
              <?php
                else:
              ?>
              <div id="mapCanvas" style="height:277px;"></div>
              <div class="border"></div>
              <?php
                endif;
              ?>
            </div>

          </div>
        </div>
        <div class="row">
          <?php
            if(! empty($location['suggestion'])):
          ?>
          <div class="six columns">
            <h3>{_ location_lang_suggestion}</h3>
            <?php echo $location['suggestion'];?>
          </div>
          <?php
            endif;
            if(! empty($location['route'])):
          ?>
          <div class="six columns">
            <h3>{_ location_lang_route}</h3>
            <?php echo $location['route'];?>
          </div>
          <?php
            endif;
          ?>
        </div>
      </div>
      <div class="four columns">
        <h3>แพ็กเก็จทัวร์แนะนำ</h3>

        <?php
          if(!empty($related)){


            foreach ($related as $key => $value) {
          # code...
        ?>
              <div class="list_packet">
                <div class="row">
                  <div class="twelve columns">
                    <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$value["tour"]->tout_url."-".$value["tour"]->tou_id);?>">
                      <img src="<?php echo $value["tour"]->tou_banner_image; ?>">
                    </a>
                  </div>
                  <div class="twelve columns">
                    <div class="row">
                      <div class="nine columns">
                        <div class="title_tour">
                          <h4>
                            <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$value["tour"]->tout_url."-".$value["tour"]->tou_id);?>">
                              <?php echo $value["tour"]->tout_name; ?>
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

                                $priceAdultDiscount = number_format($value["price"]->pri_sale_adult_price, 0);
                                $priceAdult = number_format($value["price"]->pri_sale_adult_price, 0);

                                echo "<f style='text-decoration: line-through;'>".$priceAdult."</f>&nbsp;".$priceAdultDiscount;
                                echo " บาท";

                              }else{
                                echo number_format($value["price"]->pri_sale_adult_price, 0);
                                echo " บาท";
                              }

                              //text-decoration: line-through; color: #โค้ดสีเส้น;

                            }else{
                              echo "Call";
                              echo " บาท";
                            }
                          ?>

                      </span>

                    </div>
                  </div>
                </div>
              </div>

        <?php
            }
          }else{
            echo "ไม่มีรายการใกล้เคียง";
          }
        ?>
      </div>
    </div>
    <!-- End Relate -->

      <div class="row">
        <div class="facebook_comment">
          <div class="twelve columns">
            <h3>แสดงความคิดเห็น</h3>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1&appId=357467797616103";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-comments" data-href="<?php echo base_url($this->lang->line("url_lang_location").'/'.$location['url']."-".$location['id']);?>" data-num-posts="2" data-width=""></div>
          </div>
        </div>
      </div>