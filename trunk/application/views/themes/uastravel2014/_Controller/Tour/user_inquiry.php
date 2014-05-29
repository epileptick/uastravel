

  




<?php PageUtil::addVar("stylesheet",'<link rel="stylesheet" media="all" type="text/css"  href="'.base_url('themes/uastravel2014/css/user_inquiry.css').'">'); ?>
  
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script type="text/javascript">
    $(document).ready(function() {
      $( "#tranfer_date" ).datepicker({
          numberOfMonths: 1,
          minDate: 1,
          dateFormat: 'dd/mm/yy',
          changeMonth: true,
          changeYear: true,
          dayNames: ['อาทิตย์', 'จันทร์','อังคาร','พุธ','พฤหัส','ศุกร์','เสาร์'],
          dayNamesMin: ['อา','จ','อ','พ','พฤ','ศ','ส'],
          monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม']
      });
    });
  </script>

  <form class="custom" id="booking_validate" name="input" action="<?php echo base_url($this->lang->line("url_lang_tour")."/booking");?>" method="post">
      <input type="hidden" name="type" value="<?php echo $tourType;?>">
      <input type="hidden" name="tour_id" value="<?php echo $tour[0]["id"];?>">
      <input type="hidden" name="tour_code" value="<?php echo $tour[0]["code"];?>">
      <input type="hidden" name="tour_name" value="<?php echo $tour[0]["name"];?>">
      <input type="hidden" name="tour_url" value="<?php echo $tour[0]["url"];?>">

      <!-- Start Content -->
      <div class="row">
      <?php
      $input_session = $this->session->all_userdata();
      ?>
        <!-- Tour Information -->
        <div class="col-md-12 columns">
            <div class="row">
              <div class="col-md-12 columns">
                <h3 style="color:#FE5214;">
                  <?php echo $tour[0]["name"];?> <span style="color:#4E4E4E;">(<?php echo $tour[0]["code"];?>)</span>
                </h3>
              </div>
            </div><!-- Title -->
            <div class="border"></div>
          <!-- price -->
          <?php
            if(!empty($price)){
          ?>
          <div class="row">
            <div class="col-md-12">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="four"><?php echo $this->lang->line("tour_lang_tour_list"); ?></th>
                    <th class="two"><p class="text-center"><?php echo $this->lang->line("tour_lang_tour_adult_price"); ?></p></th>
                    <th class="one"><p class="text-center"><?php echo $this->lang->line("tour_lang_tour_amount"); ?></p></th>
                    <th class="two"><p class="text-center"><?php echo $this->lang->line("tour_lang_tour_child_price"); ?></p></th>
                    <th class="one"><p class="text-center"><?php echo $this->lang->line("tour_lang_tour_amount"); ?></p></th>
                  </tr>
                </thead>
              <?php
              $count = 0;
              $grand_total_price = 0;
              $total_adult = 0;
              $total_child = 0;
              foreach ($price as $key => $value) {
              ?>
                  <?php $count++;?>
                  <tr>
                    <td>
                      <p>
                        <?php echo $value["name"];?>
                      </p>
                    </td>
                    <td>
                      <p class="text-center">
                        <?php
                          //Adult price
                          $adult_price = 0;
                          if($value["discount_adult_price"] > 0){
                            echo number_format($value["discount_adult_price"], 0);
                            $adult_price = $value["discount_adult_price"];
                          }else{
                            echo number_format($value["sale_adult_price"], 0);
                            $adult_price = $value["sale_adult_price"];
                          }
                          $adult_amount = ($value["adult_amount_booking"]>0) ? $value["adult_amount_booking"] : "0";
                        ?>
                      </p>
                    </td>
                    <td>
                      <p class="text-center"><?php echo $adult_amount; ?></p>
                      <input type="hidden" name="price[<?php echo $value["id"]; ?>][adult_amount]" value="<?php echo $adult_amount;?>">
                    </td>

                    <td>
                      <p class="text-center">
                        <?php
                            //Child price
                            $child_price = 0;
                            if($value["discount_child_price"] > 0){
                              echo number_format($value["discount_child_price"], 0);
                              $child_price = $value["discount_child_price"];
                            }else{
                              echo number_format($value["sale_child_price"], 0);
                              $child_price = $value["sale_child_price"];
                            }
                            $child_amount = ($value["child_amount_booking"]>0)?$value["child_amount_booking"]:"0";
                        ?>
                      </p>
                    </td>
                    <td>
                      <p class="text-center"><?php echo $child_amount; ?></p>
                      <input type="hidden" name="price[<?php echo $value["id"]; ?>][child_amount]" value="<?php echo $child_amount;?>">
                    </td>
                    <?php
                      $total_price = (($adult_price * $adult_amount) + ($child_price * $child_amount));
                      $total_adult_price = $adult_price*$adult_amount;
                      $total_child_price = $child_price * $child_amount;
                      $grand_total_price += $total_price;
                      $total_adult += $adult_amount;
                      $total_child += $child_amount;
                    ?>
                  </tr>
              <?php
              }//End foreach
              ?>
              </table>
            </div>
          </div>
          <?php
            }
          ?>
          <div class="row">
            <div class="col-md-3 col-md-offset-9">
              <input type="hidden" name="grand_total_price" value="<?php echo $grand_total_price ;?>">
              <div class="grand_total_price"><?php echo $this->lang->line("global_lang_grand_total_price");?> <span class="total_number"><?php echo number_format($grand_total_price, 0);?></span> <?php echo $this->lang->line("global_lang_money_sign");?></div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <h2><?php echo $this->lang->line("global_lang_your_detail");?></h2>
                <div class="col-md-6">
                  <!--<form role="form">-->
                    <div class="form-group">
                      <label for="firstname"><?php echo $this->lang->line("global_lang_firstname");?> - <?php echo $this->lang->line("global_lang_lastname");?> *</label>
                      <input type="text" class="form-control" placeholder="<?php echo $this->lang->line("global_lang_firstname");?>" id="firstname" name="firstname" value="<?php echo set_value('tob_firstname');?>"/>
                    </div>
                    <div>
                      <input type="text" class="form-control" placeholder="<?php echo $this->lang->line("global_lang_lastname");?>" id="lastname" name="lastname"/>
                    </div><br />
                     <div class="form-group">
                      <label for="telephone"><?php echo $this->lang->line("global_lang_phonenumber");?> *</label>
                      <input type="text" class="form-control" placeholder="<?php echo $this->lang->line("global_lang_phonenumber");?>" id="telephone" name="telephone">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1"><?php echo $this->lang->line("global_lang_email");?> *</label>
                      <input type="email" class="form-control" placeholder="<?php echo $this->lang->line("global_lang_email");?>" id="email" name="email">
                    </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                      <label for="address"><?php echo $this->lang->line("global_lang_adress");?></label>
                      <input type="text" class="form-control" placeholder="<?php echo $this->lang->line("global_lang_adress");?>" id="address" name="address">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="<?php echo $this->lang->line("global_lang_city");?>"  id="tob_city" name="city">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="<?php echo $this->lang->line("global_lang_province");?>"  id="province" name="province">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="<?php echo $this->lang->line("global_lang_country");?>"  id="country" name="country">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="<?php echo $this->lang->line("global_lang_zipcode");?>" id="zipcode" name="zipcode">
                    </div>
                  <!--</form>-->
                </div>
                <div class="col-md-12">
                  <div class="border"></div>
                </div>

              <div class="col-md-12"><h2><?php echo $this->lang->line("global_lang_accommodation");?></h2></div>
              <div class="col-md-6">
                <div class="form-group">
                  <label><?php echo $this->lang->line("global_lang_hotel_name");?></label>
                  <input type="text" class="form-control" placeholder="<?php echo $this->lang->line("global_lang_hotel_name");?>" id="hotel_name" name="hotel_name"/>
                </div>
                <div class="form-group">
                  <label><?php echo $this->lang->line("global_lang_hotel_room_number");?></label>
                  <input type="text" class="form-control" placeholder="<?php echo $this->lang->line("global_lang_hotel_room_number");?>" id="room_number" name="room_number"/>
                </div>
              </div>
              <div class="col-md-6">
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputEmail1">วันเดิทาง* ยังแก้ไม่เสร็จ</label>
                  <input type="text" class="form-control" id="tranfer_date" placeholder="รหัสไปรษณีย์" name="tranfer_date">
                </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputEmail1">จำนวนทารก(ต่ำกว่า4ปี)</label>
                  <select name="infant_amount_passenger" class="form-control">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">สิ่งที่ต้องการเพิ่มเติม</label>
                    <textarea class="form-control" rows="5" id="message" name="request"></textarea>
                  </div>
                </div>
              </div>

               <div class="col-md-12">
                  <div class="border"></div>
                </div>
                <div class="col-md-6"><input type="hidden" name="grand_total_price" value="<?php echo $grand_total_price ;?>">
                    <div class="grand_total_price"><?php echo $this->lang->line("global_lang_grand_total_price");?> <span class="total_number"><?php echo number_format($grand_total_price, 0);?></span> <?php echo $this->lang->line("global_lang_money_sign");?></div>
                </div>
                <div class="col-md-6">
                  <input class="btn btn-primary pull-right" type="submit" value="จองทัวร์นี้">
                </div>

            </div>
          </div>
        </form>

          <!-- Start Booking Form -->
          <!--
          <div class="border"></div>


          <div class="row">
            <div class="col-md-12">
                <h2><?php echo $this->lang->line("global_lang_your_detail");?></h2>
                <div class="six columns">
                  <div class="row">
                    <div class="col-md-10">
                      <div class="col-md-10">
                        <label for="firstname"><?php echo $this->lang->line("global_lang_firstname");?> - <?php echo $this->lang->line("global_lang_lastname");?> *</label>
                        <input type="text" placeholder="<?php echo $this->lang->line("global_lang_firstname");?>" id="firstname" name="firstname" value="<?php echo set_value('tob_firstname');?>"/>
                        <input type="text" placeholder="<?php echo $this->lang->line("global_lang_lastname");?>" id="lastname" name="lastname"/>
                        -->


                        <!-- ของเก่า
                        <div class="six">
                          <label><?php echo $this->lang->line("global_lang_nationality");?></label>
                          <input type="text" placeholder="<?php echo $this->lang->line("global_lang_nationality");?>" id="nationality" name="nationality"/>
                        </div>
                        -->

                        <!--
                        <div class="col-md-8">
                          <label for="telephone"><?php echo $this->lang->line("global_lang_phonenumber");?> *</label>
                          <input type="text" placeholder="<?php echo $this->lang->line("global_lang_phonenumber");?>" id="telephone" name="telephone"/>
                        </div>
                        <label for="email"><?php echo $this->lang->line("global_lang_email");?> *</label>
                        <input type="text" placeholder="<?php echo $this->lang->line("global_lang_email");?>" id="email" name="email"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                      <label for="address"><?php echo $this->lang->line("global_lang_adress");?></label>
                      <input type="text" placeholder="<?php echo $this->lang->line("global_lang_adress");?>" id="address" name="address"/>
                      <div class="six">
                        <input type="text" placeholder="<?php echo $this->lang->line("global_lang_city");?>"  id="tob_city" name="city"/>
                        <input type="text" placeholder="<?php echo $this->lang->line("global_lang_province");?>"  id="province" name="province"/>
                        <input type="text" placeholder="<?php echo $this->lang->line("global_lang_country");?>"  id="country" name="country"/>
                        <input type="text" placeholder="<?php echo $this->lang->line("global_lang_zipcode");?>" id="zipcode" name="zipcode"/>
                      </div>
                </div>
            </div>
            -->


            <!-- End Columns ของเก่า-->

            <!--
            <div class="col-md-12">
              <div class="border"></div>
            </div>

            <div class="col-md-6">
                  <h2><?php echo $this->lang->line("global_lang_accommodation");?></h2>
                  <div class="col-md-10">
                  <label><?php echo $this->lang->line("global_lang_hotel_name");?></label>
                    <input type="text" placeholder="<?php echo $this->lang->line("global_lang_hotel_name");?>" id="hotel_name" name="hotel_name"/>
                  </div>
                  <div class="four">
                    <label><?php echo $this->lang->line("global_lang_hotel_room_number");?></label>
                    <input type="text" placeholder="<?php echo $this->lang->line("global_lang_hotel_room_number");?>" id="room_number" name="room_number"/>
                  </div>
            </div>

            <div class="col-md-6">
              <h2>ข้อมูลทัวร์เพิ่มเติม</h2>
              <div class="row">
                <div class="col-md-6">
                  <label>วันเดินทาง *</label>
                  <input type="text" placeholder="Travel Date" id="tranfer_date" name="tranfer_date"/>
                </div>
                <div class="col-md-6">
                  <label>จำนวนทารก (ตำกว่า 4 ปี)</label>
                  <select name="infant_amount_passenger" >
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
                </div>
              </div>
              <label>สิ่งที่ต้องการเพิ่มเติม</label>
              <textarea placeholder="Message" rows="5" id="message" name="request"></textarea>
            </div>

            <div class="col-md-6">
                <div class="alert alert-info booking-notice booking-hotel-notice">
                  <strong>คำแนะนำ!</strong>
                    <p>หากท่านยังไม่มีโรงแรมที่พัก ทางเราสามารถจัดหาให้ท่านได้ และสามารถเว้นว่างข้อมูลส่วนนี้ได้ค่ะ หรือท่านสามารถสอบถามข้อมูลที่พักได้ที่ <strong>082-8121146</strong></p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="alert alert-info booking-notice booking-hotel-notice">
                  <strong>คำแนะนำ!</strong>
                  <ul>
                    <li>กรุณากรอกข้อมูลในช่องที่มีเครื่องหมาย (*) ทุกช่อง</li>
                    <li>โปรดตรวจสอบข้อมูลของท่านให้ถูกต้องก่อนกดปุ่มจองทัวร์นี้</li>
                    <li>หลังจากท่านจองทัวร์เรียบร้อยแล้ว จะมีเจ้าหน้าที่โทรกลับไปหาท่านเพื่อคอนเฟิร์มการจองทัวร์และถามข้อมูลอื่นๆ เพิ่มเติม</li>
                  </ul>
                </div>
            </div>

            <div class="col-md-12 ">
              <div class="border"></div>
                <div class="row">
                  <div class="col-md-12 ">
                    <input type="hidden" name="grand_total_price" value="<?php echo $grand_total_price ;?>">
                    <div class="grand_total_price"><?php echo $this->lang->line("global_lang_grand_total_price");?> <span class="total_number"><?php echo number_format($grand_total_price, 0);?></span> <?php echo $this->lang->line("global_lang_money_sign");?></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 ">
                  -->


                    <!--Captcha ของเก่า-->
                    <!--
                      <div class="twelve columns box-recaptcha">
                        <script type="text/javascript">
                         var RecaptchaOptions = {
                            theme : 'clean'
                         };
                        </script>
                        <?php echo $recaptcha_html;?>
                        <div class="clearfix"></div>
                        <h3>พิมพ์ตัวอักษรที่เห็นในรูปด้านบน</h3>
                      </div>
                      -->
                    <!--End Captcha-->



                    <!--
                    <div class="col-md-12 ">
                      <input class="btn btn-success btn-large six" type="submit" value="จองทัวร์นี้">
                    </div>
                  </div>
                </div>
                -->

              <!-- Start contact ของเก่า -->
              <!-- End contact **-->

            <!--
            </div>
            -->

          <!--</div> -->     


          <!-- End Rows** -->
        <!-- End Booking Form **-->

      </div><!-- End Rows -->
    </div>
    <!-- End Tour Information -->
  </form>


 
  <!-- End Content -->

