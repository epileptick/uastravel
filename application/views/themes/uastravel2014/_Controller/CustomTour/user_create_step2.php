<?php PageUtil::addVar("stylesheet",'<link rel="stylesheet" media="all" type="text/css"  href="'.base_url('themes/uastravel2014/css/user_view.css').'">'); ?>
<?php PageUtil::addVar("stylesheet",'<link rel="stylesheet" media="all" type="text/css"  href="'.base_url('themes/uastravel2014/css/tour_userview.css').'">'); ?>
<?php PageUtil::addVar("javascript_body","<script src=\"".$jspath."/jquery-ui-timepicker-addon.js\"></script>"); ?>
<?php PageUtil::addVar("javascript_body","<script src=\"".$jspath."/jquery.validate.js\"></script>"); ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="<?php echo $stylepath.'/jquery-time-picker.css';?>">


<?php PageUtil::addVar("javascript_body","<script type=\"text/javascript\">
  $(function(){
    jQuery('.adult, .child, .infant').keyup(function () {     
      this.value = this.value.replace(/[^0-9\.]/g,'');
    });
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
    $(\"#datepicker1\").datepicker({minDate: \"dateToday\",dateFormat:\"dd/mm/yy\",
      onClose: function( selectedDate ) {
        var date = new Date($(this).datepicker('getDate'));
        date.setDate(date.getDate() + 1);
        $(\"#datepicker2\").datepicker( \"option\", \"minDate\", date );
      }
    });
    $(\"#datepicker2\" ).datepicker({minDate: \"dateToday\",dateFormat:\"dd/mm/yy\"});
    $('#timepicker1').timepicker();
    $('#timepicker2').timepicker();
    $(\"#datepicker1, #datepicker2, #timepicker1, #timepicker2\").on(\"change\", function(event){
      var departDate = $(\"#datepicker1\").val();
      var returnDate = $(\"#datepicker2\").val();
      if(departDate != \"\" && returnDate != \"\"){
        departDate = departDate.split(\"/\");
        returnDate = returnDate.split(\"/\");
        var totalday = dateDiff(departDate[1]+\"/\"+departDate[0]+\"/\"+departDate[2],returnDate[1]+\"/\"+returnDate[0]+\"/\"+returnDate[2]);
        totalday = totalday+1;
      }
      $(\".total_number\").html(totalday);
      $(\"#totalday\").val(totalday);
    });

    // validate signup form on keyup and submit
    $(\"#form\").validate({
      rules: {
        firstname: 'required',
        telephone: 'required',
        email: {
          required: 'required',
          email: true
        },
        adult: 'required'
      },
      messages: {
        firstname: 'กรุณากรอกชื่อจริง',
        telephone: 'กรุณากรอกเบอร์โทรศัพท์',
        email: 'กรุณากรอกอีเมล์',
        adult: 'กรุณากรอกอีเมล์'
      }
    });

    $(\".btn-success\").on(\"click\",function(e){
      $(\"#form\").submit();
      e.preventDefault();
    });
  });

  </script>"); ?>



	    <div class="row">
	    	<div class="col-md-12">
	    		<h1 class="head_title">Step 1 กรอกข้อมูลการเดินทางเบื้องต้น!</h1>
	    		<div class="row">
	    			<form class="" id="form" action="<?php echo base_url("customtour/create");?>" method="post">
                          <input type="hidden" id="totalday" name="totalday"/>
		    			<div class="col-md-6">
		    				<h2>ข้อมูลของคุณ</h2>
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
		    			<div class="col-md-6">
		    				<h2>ข้อมูลการเดินทาง</h2>
  		    				<div class="form-group">
  							    <label for="exampleInputEmail1">จำนวนผู้เดินทาง *</label>
                    <div class="row">
                      <div class="col-md-4">
    							     <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ผู้ใหญ่"  name="adult">
    							     </div>
                       <div class="col-md-4">
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="เด็ก" name="child">
                       </div>
                       <div class="col-md-4">
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ทารก" name="infant">
                       </div>
                    </div>
                </div>

                  <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                          <div class="col-md-12 pull-left">
                            <label for="address">ระยะเวลา *</label>
                          </div>
                        </div>
                        <div class="form-group">
                        <div class="row daycalculate">
                          <div class="col-md-6 pull-left">
                            <div class="eight input-prepend" >
                              <span class="add-on">เดินทางวันที่</span>
                              <input class="span12 departure_date form-control" name="departuredate" id="datepicker1" type="text" >
                            </div>
                          </div>
                          <div class="col-md-6 pull-left">
                            <div class="eight input-prepend">
                              <span class="add-on">เวลาถึง</span>
                              <input class="span12 departure_time form-control" name="departuretime" id="timepicker1" type="text" value="00:00" >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6 pull-left">
                            <div class="seven input-prepend">
                              <span class="add-on">วันที่เดินทางกลับ </span>
                              <input class="span12 returndate form-control" name="returndate" id="datepicker2" type="text" >
                            </div>
                          </div>
                          <div class="col-md-6 pull-left">
                            <div class="seven input-prepend">
                              <span class="add-on">&nbsp;เวลากลับ&nbsp;</span>
                              <input class="span12 returntime form-control" name="returntime" id="timepicker2" type="text" value="00:00" >
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
							  </div>
			                <div class="form-group">
			                  <label><?php echo $this->lang->line("global_lang_hotel_name");?></label>
			                  <input type="text" class="form-control" placeholder="<?php echo $this->lang->line("global_lang_hotel_name");?>" id="hotel_name" name="hotel_name"/>
			                </div>
			                <div class="form-group">
			                  <label><?php echo $this->lang->line("global_lang_hotel_room_number");?></label>
			                  <input type="text" class="form-control" placeholder="<?php echo $this->lang->line("global_lang_hotel_room_number");?>" id="room_number" name="room_number"/>
			                </div>
                      <div class="form-group">
                    <label for="exampleInputEmail1">สิ่งที่ต้องการเพิ่มเติม</label>
                    <textarea class="form-control" rows="5" id="message" name="request"></textarea>
                  </div>
                                          <div class="row">
                          <div class="col-md-12">
                            <div class="grand_total_price">รวม <span class="total_number">0</span> วัน</div>
                          </div>
                        </div>
	    				

		    			</div>
	    			</form>
                      <div class="border"></div>
          <a href="<?php echo base_url("customtour/create/step2"); ?>" class="btn btn-success pull-right btn-large btn-next">ถัดไป <img src="<?php echo $imagepath."/next.png";?>" target="_blank"/>ถัดไป</a>
          <a href="<?php echo base_url("customtour/create/step1"); ?>" class="btn pull-left btn-large btn-next"><img src="<?php echo $imagepath."/previous.png";?>"/> ย้อนกลับ</a>
        </div>
            
	    		</div>
        </div>

	    	</div>


