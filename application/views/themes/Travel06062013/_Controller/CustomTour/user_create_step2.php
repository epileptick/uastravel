<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="<?php echo $themepath.'/bootstrap/css/bootstrap.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/foundation.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/userstyle.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/app.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/customtour.css';?>">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <link rel="stylesheet" href="<?php echo $stylepath.'/jquery-time-picker.css';?>">
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script src="<?php echo $jspath;?>/jquery.validate.js"></script>
  <script src="<?php echo $jspath;?>/additional-methods.js"></script>
  <script src="<?php echo $jspath;?>/localization/messages_th.js"></script>
  <script src="<?php echo $jspath.'/jquery-ui-timepicker-addon.js';?>"></script>
  <script type="text/javascript">
  $(function(){
    var dateDiff = function ( start_actual_time, end_actual_time ) {

      start_actual_time = new Date(start_actual_time);
      end_actual_time = new Date(end_actual_time);
      var diff = end_actual_time - start_actual_time;
      var diffSeconds = diff/1000;
      var HH = (Math.floor(diffSeconds/3600)%24);
      var MM = Math.floor(diffSeconds%3600)/60;
      var DD = Math.floor((diffSeconds/3600)/24);
      
      if(HH > 1){
        DD++;
        HH = 0;
      }
      return DD;
    }
    $("#datepicker1").datepicker({minDate: "dateToday",dateFormat:"dd/mm/yy",
      onClose: function( selectedDate ) {
        var date = new Date($(this).datepicker('getDate'));
        date.setDate(date.getDate() + 1);
        $("#datepicker2").datepicker( "option", "minDate", date );
      }
    });
    $("#datepicker2" ).datepicker({minDate: "dateToday",dateFormat:"dd/mm/yy"});
    $('#timepicker1').timepicker();
    $('#timepicker2').timepicker();
    $("#datepicker1, #datepicker2, #timepicker1, #timepicker2").on("change", function(event){
      var departDate = $("#datepicker1").val();
      var returnDate = $("#datepicker2").val();
      if(departDate != "" && returnDate != ""){
        departDate = departDate.split("/");
        returnDate = returnDate.split("/");
        var totalday = dateDiff(departDate[1]+"/"+departDate[0]+"/"+departDate[2]+" "+$("#timepicker1").val(),returnDate[1]+"/"+returnDate[0]+"/"+returnDate[2]+" "+$("#timepicker2").val());
      }
      $(".total_number").html(totalday);
      $("#totalday").val(totalday);
    });

    $.validator.addMethod(
      "regex",
      function(value, element, regexp) {
          var check = false;
          var re = new RegExp(regexp);
          return this.optional(element) || re.test(value);
      },
      "No special Characters allowed here."
    );
    // validate signup form on keyup and submit
    $("#form").validate({
      rules: {
        firstname: 'required',
        telephone: 'required',
        email: 'required',
        adult: 'required'
      },
      messages: {
        firstname: 'กรุณากรอกชื่อจริง',
        telephone: 'กรุณากรอกเบอร์โทรศัพท์',
        email: 'กรุณากรอกอีเมล์',
        adult: 'กรุณากรอกอีเมล์'
      }
    });

    $(".btn-success").on("click",function(){
      $("#form").submit();
      event.preventDefault();
    });
  });
  </script>

</head>
<body style="background: #ededed url(<?php echo $imagepath.'/bg5.jpg';?>) no-repeat top center;"><!-- ใส่รูปพื้นหลังตรงนี้ แทน bg1.jpg-->
  <div class="overly-bg"></div>
  <div id="wrapper">
    <!-- Menu -->
    {_widget menu}
    <!-- End Menu -->
    <br/><br/><br/><br/><br/>

    <div class="row customtour_step1">
      <section class="twelve columns">
        <div class="customtour">
          <div class="page-header">
            <h1>Step 1 กรอกข้อมูลการเดินทางเบื้องต้น!</h1>
          </div>
          <form class="form-horizontal" id="form" action="<?php echo base_url("customtour/create");?>" method="post">
            <input type="hidden" id="totalday" name="totalday"/>
            <div class="row">
              <div class="twelve columns">
                  <div class="six columns">
                    <div class="row">
                      <div class="ten">
                        <div class="ten">
                          <h3>ข้อมูลผู้จัดทัวร์</h3>
                          <label for="firstname"><?php echo $this->lang->line("global_lang_firstname");?> - <?php echo $this->lang->line("global_lang_lastname");?> *</label>
                          <input type="text" placeholder="<?php echo $this->lang->line("global_lang_firstname");?>" id="firstname" name="firstname" value="<?php echo set_value('tob_firstname');?>"/>
                          <input type="text" placeholder="<?php echo $this->lang->line("global_lang_lastname");?>" id="lastname" name="lastname"/>
                          <div class="eight">
                            <label for="telephone"><?php echo $this->lang->line("global_lang_phonenumber");?> *</label>
                            <input type="text" placeholder="<?php echo $this->lang->line("global_lang_phonenumber");?>" id="telephone" name="telephone"/>
                          </div>
                          <label for="email"><?php echo $this->lang->line("global_lang_email");?> *</label>
                          <input type="text" placeholder="<?php echo $this->lang->line("global_lang_email");?>" id="email" name="email"/>
                          <div class="border"></div>
                          <label for="address"><?php echo $this->lang->line("global_lang_adress");?></label>
                          <input type="text" placeholder="<?php echo $this->lang->line("global_lang_adress");?>" id="address" name="address"/>
                          <div class="ten">
                            <input type="text" placeholder="<?php echo $this->lang->line("global_lang_city");?>"  id="tob_city" name="city"/>
                            <input type="text" placeholder="<?php echo $this->lang->line("global_lang_province");?>"  id="province" name="province"/>
                            <input type="text" placeholder="<?php echo $this->lang->line("global_lang_country");?>"  id="country" name="country"/>
                            <input type="text" placeholder="<?php echo $this->lang->line("global_lang_zipcode");?>" id="zipcode" name="zipcode"/>
                          </div>
                        </div>
                      </div>

                    </div>

                  </div>
                  <div class="six columns">
                        <div class="row">
                          <h3>ข้อมูลการเดินทาง</h3>
                          <label for="address">จำนวนผู้เดินทาง *</label>
                          <div class="three pull-left">
                            <div class="four input-prepend input-append">
                              <span class="add-on">ผู้ใหญ่</span>
                              <input class="span12" id="appendedPrependedInput" type="text" id="adult" name="adult">
                              <span class="add-on">คน</span>
                            </div>
                          </div>
                          <div class="three pull-left">
                            <div class="four input-prepend input-append">
                              <span class="add-on">เด็ก</span>
                              <input class="span12" id="appendedPrependedInput" type="text" id="child" name="child">
                              <span class="add-on">คน</span>
                            </div>
                          </div>
                          <div class="three pull-left">
                            <div class="four input-prepend input-append">
                              <span class="add-on">ทารก</span>
                              <input class="span12" id="appendedPrependedInput" type="text" id="child" name="infant">
                              <span class="add-on">คน</span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="twelve pull-left">
                            <label for="address">ระยะเวลา *</label>
                          </div>
                        </div>
                        <div class="row daycalculate">
                          <div class="six pull-left">
                            <div class="eight input-prepend" >
                              <span class="add-on">เดินทางวันที่</span>
                              <input class="span12 departure_date" name="departuredate" id="datepicker1" type="text" readonly required>
                            </div>
                          </div>
                          <div class="six pull-left">
                            <div class="eight input-prepend">
                              <span class="add-on">เวลาถึง</span>
                              <input class="span12 departure_time" name="departuretime" id="timepicker1" type="text" value="00:00" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="six pull-left">
                            <div class="seven input-prepend">
                              <span class="add-on">วันที่เดินทางกลับ </span>
                              <input class="span12 returndate" name="returndate" id="datepicker2" type="text" readonly required>
                            </div>
                          </div>
                          <div class="six pull-left">
                            <div class="seven input-prepend">
                              <span class="add-on">&nbsp;เวลากลับ&nbsp;</span>
                              <input class="span12 returntime" name="returntime" id="timepicker2" type="text" value="00:00" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="twelve pull-left">
                            <h3><?php echo $this->lang->line("global_lang_accommodation");?></h3>
                            <div class="ten">
                            <label><?php echo $this->lang->line("global_lang_hotel_name");?></label>
                              <input type="text" placeholder="<?php echo $this->lang->line("global_lang_hotel_name");?>" id="hotel_name" name="hotel_name"/>
                            </div>
                            <div class="four">
                              <label><?php echo $this->lang->line("global_lang_hotel_room_number");?></label>
                              <input type="text" placeholder="<?php echo $this->lang->line("global_lang_hotel_room_number");?>" id="room_number" name="room_number"/>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="twelve pull-left">
                            <label>สิ่งที่ต้องการเพิ่มเติม</label>
                            <textarea placeholder="Message" rows="5" id="request" name="request"></textarea>
                          </div>
                        </div>
                        <div class="row">
                          <div class="twelve columns">
                            <div class="grand_total_price">รวม <span class="total_number">0</span> วัน</div>
                          </div>
                        </div>
                  </div>
              </div>
            </div>
          </form>
          <div class="border"></div>
          <div class="alert alert-info">
            <h2>ข้อมูลเบื้องต้นในการเดินทาง</h2>
            <p>ข้อมูลในส่วนนี้จะเป็นข้อมูลที่จะนำไปใช้ในการจัดทัวร์ของท่าน ซึ่งจำนวนวันและจำนวนคนจะมีผลโดยตรงกับราคาโดยประมาณของแต่ละแพ็คเกจ หากข้อมูลในส่วนนี้ยังไม่แน่นอน ท่านสารมารถที่จะใช้ข้อมูลที่เป็นกลางๆ ไว้ก่อนได้ค่ะ หากมีข้อสงสัย ท่านสามารถติดต่อสอบถามเข้ามาได้ที่ </p>
          </div>

          <div class="border"></div>
          <a href="<?php echo base_url("customtour/create/step2"); ?>" class="btn btn-success pull-right btn-large btn-next">ถัดไป <img src="<?php echo $imagepath."/next.png";?>"/></a>
          <a href="<?php echo base_url("customtour/create/step1"); ?>" class="btn pull-left btn-large btn-next"><img src="<?php echo $imagepath."/previous.png";?>"/> ย้อนกลับ</a>
        </div>
      </section>
    </div>

    {_include footer}
    <!-- End Gallery -->
  </div>

</body>
</html>