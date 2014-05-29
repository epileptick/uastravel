    <!-- new google map  AND tour small -->
    <div class="row">
      <div class="col-md-12">
        <br / >
        <h3><?php echo $this->lang->line("tour_lang_packages_tour_suggest");?></h3>

                  <?php
                  if(!empty($related)):
                    foreach ($related as $key => $value):
                  ?>
                    <div class="list_packet">
                      <div class="row">
                        <div class="col-md-12 columns">
                          <a href="<?php echo $value["tour"]->tout_url."-".$value["tour"]->tou_id; ?>">
                            <img src="<?php echo $value["tour"]->tou_banner_image; ?>" alt="<?php echo $value["tour"]->tout_name; ?>" style="width:100%;">
                          </a>
                        </div>

                        <div class="col-md-7 columns">
                          <div class="row">
                            <div class="col-md-12 columns">
                              <div class="title_tour">
                                <h4>
                                  <a href="<?php echo $value["tour"]->tout_url."-".$value["tour"]->tou_id; ?>">
                                    <?php echo $value["tour"]->tout_name; ?>
                                  </a>
                                </h4>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-5 columns packetprice">

                          <div class="price priceprice">
                            
                            <span class="pull-right">
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

                            <span class="glyphicon glyphicon-tags pull-right"></span>
                          </div>
                        </div>
                      </div>
                    </div>

                  <?php
                    endforeach;
                  endif;
                  ?>
    <!-- END google map -->

      </div>
    </div>