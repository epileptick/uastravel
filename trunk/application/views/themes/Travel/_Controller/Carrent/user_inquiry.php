<?php
  if(!empty($error)){
    print_r($error);
  }

?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <title><?php echo "จองรถเช่า U As Travel";?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="<?php echo (!empty($tour[0]->short_description))?$tour[0]->short_description:"";?>" />
  <meta name="keywords" content="" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="<?php echo base_url('themes/Travel/tour/stylesheets/foundation.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('themes/Travel/tour/stylesheets/style.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('themes/Travel/tour/stylesheets/app.css');?>">
  <script src="<?php echo base_url('themes/Travel/tour/javascripts/modernizr.foundation.js');?>"></script>
  <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->


<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

<script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    // validate signup form on keyup and submit
    var validator = $("#booking_validate").validate({
      rules: {
        cab_firstname: "required",
        cab_lastname: "required",
        cab_address: "required",
        cab_city: "required",
        cab_province: "required",
        cab_zipcode: "required",
        cab_nationality: "required",
        cab_telephone: "required",
        cab_email: "required",
        cab_pickup_location: "required",
        cab_pickup_date: "required",        
        cab_dropoff_location: "required",
        cab_dropoff_date: "required",   
        cab_credit: "required",
      },
      messages: {
      },
      // the errorPlacement has to take the table layout into account
      errorPlacement: function(error, element) {
        if ( element.is(":radio") )
          error.appendTo( element.parent().next().next() );
        else if ( element.is(":checkbox") )
          error.appendTo ( element.next() );
        else
          error.appendTo( element.parent().next() );
      },
      // set this class to error-labels to indicate valid fields
      success: function(label) {
        // set &nbsp; as text for IE
        label.html("&nbsp;").addClass("checked");
      }
    });

  });
</script>

<script>
  $(function() {
    $( "#cab_pickup_date" ).datepicker({
        numberOfMonths: 1,  
        minDate: 1,
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,     
        dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัส','ศุกร์','เสาร์'],       
        dayNamesMin: ['อา','จ','อ','พ','พฤ','ศ','ส'],     
        monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม']       
    });
  });
</script>  
<script>
  $(function() {
    $( "#cab_dropoff_date" ).datepicker({
        numberOfMonths: 1,  
        minDate: 1,
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,     
        dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัส','ศุกร์','เสาร์'],       
        dayNamesMin: ['อา','จ','อ','พ','พฤ','ศ','ส'],     
        monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม']       
    });
  });
  </script>

</head>


  <div class="overly-bg"></div>
  <div id="wrapper">
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
              <li><a href="<?php echo base_url('location');?>">สถานที่ท่องเที่ยว</a></li>
              <li class="has-dropdown">
                <a class="active" href="<?php echo base_url('tour');?>">แพ๊คเกจทัวร์</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('tour/ทัวร์ครึ่งวัน');?>">ทัวร์ครึ่งวัน</a></li>
                  <li><a href="<?php echo base_url('tour/ทัวร์-1-วัน');?>">ทัวร์ 1 วัน</a></li>
                  <li><a href="<?php echo base_url('tour/ทัวร์-2-วัน-1-คืน');?>">ทัวร์ 2 วัน 1 คืน</a></li>
                  <li><a href="<?php echo base_url('tour/ทัวร์-3-วัน-2-คืน');?>">ทัวร์ 3 วัน 2 คืน</a></li>
                </ul>                
              </li>
              <li class="has-dropdown">
                <a href="<?php echo base_url('tour');?>">แพ๊คเกจทัวร์อื่นๆ</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('tour/โชว์กลางคืน');?>">โชว์กลางคืน</a></li>
                  <li><a href="<?php echo base_url('tour/สปาแพ็คเกจ');?>">สปาแพ็คเกจ</a></li>
                  <li><a href="<?php echo base_url('tour/กอล์ฟแพ็คเกจ');?>">กอล์ฟแพ็คเกจ</a></li>
                </ul>                
              </li> 
              <li class="has-dropdown">
                <a href="<?php echo base_url('tour/การเดินทาง');?>">การเดินทาง</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('tour/เช่าเรือเหมาลำ');?>">เช่าเรือเหมาลำ</a></li>
                  <li><a href="<?php echo base_url('tour/จองตั๋วเรือโดยสาร');?>">จองตั๋วเรือโดยสาร</a></li>
                  <li><a href="<?php echo base_url('carrent/inquiry');?>">จองรถเช่า</a></li>
                  <li><a href="<?php echo base_url('airline/inquiry');?>">จองตั๋วเครื่องบิน</a></li>
                </ul>                
              </li> 
              <li class="has-dropdown">
                <a href="<?php echo base_url('tour/ที่พัก');?>">ที่พัก</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('tour/จองโรงแรม');?>">จองโรงแรม</a></li>
                  <li><a href="<?php echo base_url('tour/จองห้องเช่า');?>">จองห้องเช่า</a></li>
                </ul>                
              </li>
              <li><a href="<?php echo base_url('tour/โปรโมชั่น');?>">โปรโมชั่น</a></li>
              <li><a href="<?php echo base_url('location/ติดต่อเรา-119');?>">ติดต่อเรา</a></li>                
            </ul>
          </section>
        </nav>
      </div>
    </div>
    <!-- End Menu -->
   <br>

<!-- Form -->
  <form class="custom" 
        id="booking_validate" 
        name="input" 
        action="<?php echo base_url('carrent/booking');?>" 
        method="post"
  >
      <!-- Header-->
      <div class="row">
        <div class="twelve columns">
            <h3 style="color:#FE5214;">
              CARRENT BOOKING
            </h3>
        </div>
      </div>
      <div class="border">
      </div>
      <!--End Header-->

      <!--Name-->
      <div class="row">
        <div class="six columns">
          <label>ชื่อ</label>
            <input type="text" placeholder="Firstname" id="cab_firstname" name="cab_firstname" value="<?php echo set_value('cab_firstname');?>">
        </div>

        <div class="six columns">
          <label>นามสกุล</label>
            <input type="text" placeholder="Lastname" id="cab_lastname" name="cab_lastname">
         </div>
       </div>
      <!--End Name-->

      <!--Address-->
      <div class="row">
       <div class="twelve columns">
          <label>ที่อยู่</label>
          <input type="text" placeholder="Address" id="cab_address" name="cab_address">
        </div>
      </div>
      <div class="row">
        <div class="six columns">
          <input type="text" placeholder="City" id="cab_city" name="cab_city">
        </div>
        <div class="three columns">
          <input type="text" placeholder="Province/State" id="cab_province" name="cab_province">
        </div>
        <div class="three columns">
          <input type="text" placeholder="ZIP" id="cab_zipcode" name="cab_zipcode">
        </div>
      </div>
      <!--End Address-->

      <!--Nationality-->
      <div class="row">
        <div class="six columns">
          <label>สัญชาติ</label>
          <input type="text" placeholder="Nationality" id="cab_nationality" name="cab_nationality">
        </div>
      </div> 
      <!--End Nationality-->

      <!--Telephone and email-->
      <div class="row">
        <div class="six columns">
          <label>เบอร์โทร</label>
          <input type="text" placeholder="Telephone" id="cab_telephone" name="cab_telephone">
        </div>
        <div class="six columns">
          <label>อีเมล์</label>
          <input type="text" placeholder="Email" id="cab_email" name="cab_email">
        </div>
      </div>
      <!--End Telephone and email-->

      <!--Pick Up Location-->
      <div class="row">
        <div class="twelve columns">
          <h2>รายละเอียดการเดินทาง</h2>
            <label>สถานที่รับรถ</label>
            <input type="text" placeholder="Pick Up Location" id="cab_pickup_location" name="cab_pickup_location">
        </div>
      </div>

      <div class="row">
        <div class="six columns">
          <label>วันที่จองรถ</label>
          <input type="text" placeholder="Travel Date" id="cab_pickup_date" name="cab_pickup_date">
        </div>    

        <div class="six columns">
            <label>เวลาที่รับรถ</label>         
            <select name="cab_pickup_time">
              <option value="ANY">Any Time</option>          
              <option value="01:00">01:00</option>
              <option value="02:00">02:00</option>
              <option value="03:00">03:00</option>
              <option value="04:00">04:00</option>
              <option value="05:00">05:00</option>
              <option value="06:00">06:00</option>
              <option value="07:00">07:00</option>
              <option value="08:00">08:00</option>
              <option value="09:00">09:00</option>
              <option value="10:00">10:00</option>
              <option value="11:00">11:00</option>
              <option value="12:00">12:00</option>
              <option value="13:00">13:00</option>
              <option value="14:00">14:00</option>
              <option value="15:00">15:00</option>
              <option value="16:00">16:00</option>
              <option value="17:00">17:00</option>
              <option value="18:00">18:00</option>
              <option value="19:00">19:00</option>
              <option value="20:00">20:00</option>
              <option value="21:00">21:00</option>
              <option value="22:00">22:00</option>
              <option value="23:oo">23:00</option>
              <option value="24:00">24:00</option>
            </select>
          </div>         
      </div>
      <!--End Pick Up Location-->

      <!--Drop Off Location-->
       <div class="row">
        <div class="twelve columns">
            <label>สถานที่คืนรถ</label>
            <input type="text" placeholder="Drop Off Location" id="cab_dropoff_location" name="cab_dropoff_location">
        </div>
      </div>
      
      <div class="row">
        <div class="six columns">
          <label>วันที่คืนรถ</label>
          <input type="text" placeholder="Travel Date" id="cab_dropoff_date" name="cab_dropoff_date">
      </div>    
      <div class="six columns">
            <label>เวลาที่คืนรถ</label>         
            <select name="cab_dropoff_time">
              <option value="ANY">Any Time</option>          
              <option value="01:00">01:00</option>
              <option value="02:00">02:00</option>
              <option value="03:00">03:00</option>
              <option value="04:00">04:00</option>
              <option value="05:00">05:00</option>
              <option value="06:00">06:00</option>
              <option value="07:00">07:00</option>
              <option value="08:00">08:00</option>
              <option value="09:00">09:00</option>
              <option value="10:00">10:00</option>
              <option value="11:00">11:00</option>
              <option value="12:00">12:00</option>
              <option value="13:00">13:00</option>
              <option value="14:00">14:00</option>
              <option value="15:00">15:00</option>
              <option value="16:00">16:00</option>
              <option value="17:00">17:00</option>
              <option value="18:00">18:00</option>
              <option value="19:00">19:00</option>
              <option value="20:00">20:00</option>
              <option value="21:00">21:00</option>
              <option value="22:00">22:00</option>
              <option value="23:oo">23:00</option>
              <option value="24:00">24:00</option>
            </select>
          </div>        
      </div>

       <!--Passenger Amount-->
        <div class="row">
          <div class="six columns">
            <label>จำนวนผู้เดินทาง</label>
            <select name="cab_passenger_amount">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div> 
          <div class="six columns">
            <label>บัตรเครดิต</label>
            <select name="cab_credit">
                <option value="มี">มี</option>
                <option value="ไม่มี">ไม่มี</option>    
            </select>
          </div> 
        </div>
        <!--End Passenger Amount-->

      <div class="row">
        <div class="twelve columns">
        <h2>สิ่งที่ต้องการเพิ่มเติม</h2>
        <textarea placeholder="Message" rows="5" id="cab_message" name="cab_message"></textarea>
      </div></div>
      <!--End Drop Off Location-->

      <!--contact-->
        <div class="row">
          <div class="twelve columns">
            <ul class="tags">
              <li style="font-size:30px; color:#FE5214;">ติดต่อเรา :</li>
              <li><b>โทร.</b> 082-8121146, 076-331280&nbsp;&nbsp;<b>แฟกซ์.</b> 076-331273&nbsp;&nbsp;<b>อีเมล์</b> info@uastravel.com</li>
            </ul>
          </div> 
        </div>
      <!--End Contact-->

      <!--button booking-->
      <div class="row">
          <div class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;"> 
            <div class="eight columns">
            </div>
            <div class="four columns">
              <input class="button small  booking" style="width:150px;" type="submit" value="จองรถเช่า">
            </div>
          </div>
          <div class="clearfix">
        </div>
      </div>
      <!--End button booking-->
    </form>
  </div>

  <!-- End Form -->
  <footer>
    <div class="row">
      <div class="shadow"></div>
      <div class="seven columns">
        <nav>
          <ul class="menu_footer">
            <li><a href="">หน้าแรก</a></li>
            <li><a href="">แพ็คเกจทัวร์</a></li>
            <li><a href="">เกี่ยวกับเรา</a></li>
            <li><a href="">ติดต่อเรา</a></li>
            <li><a href="">โปรโมชั่น</a></li>                           
          </ul>
        </nav>
        <div class="clearfix"></div>
        <p>Copyright © Uastravel.com</p>          
      </div>
      <div class="five columns">
        <div class="address">
          <p>Uastravel</p>
          <p>uastravel@hotmail.com</p>
          <p>80/86 หมู่บ้านศุภาลัยฮิล ซ.5 อ.เมือง จ.ภูเก็ต 83000</p>
        </div>
      </div>
    </div>
  </footer>


<?php include_once("themes/Travel/tour/analyticstracking.php") ;?>
</body>
</html>
