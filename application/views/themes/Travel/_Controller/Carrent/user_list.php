<?php

  if(!empty($error)){
    print_r($error);

  }

  if(!empty($hello)){
    echo($hello);

  }

?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <title><?php echo "จองรถเช่า U As Travel" ;?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="<?php echo (!empty($booking[0]->name))?$booking[0]->code:"";?>" />
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
        flt_firstname: "required",
        flt_lastname: "required",
        flt_address: "required",
        flt_city: "required",
        flt_province: "required",
        flt_zipcode: "required",
        flt_nationality: "required",
        flt_telephone: "required",
        flt_email: "required",
        flt_from_location: "required",
        flt_go_to_location: "required",
        flt_depart_date: "required",
        flt_adult_amount: "required",
        flt_child_amount: "required",
        flt_infant_amount: "required",
        flt_type: "required",
        flt_class: "required",
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
      $( "#flt_depart_date" ).datepicker({
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
                  <li><a href="<?php echo base_url('carrent/list');?>">จองรถเช่า</a></li>
                  <li><a href="<?php echo base_url('airline/list');?>">จองตั๋วเครื่องบิน</a></li>
                </ul>                
              </li> 
              <li class="has-dropdown">
                <a href="<?php echo base_url('hotel');?>">ที่พัก</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('hotel');?>">จองโรงแรม</a></li>
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
    <br>

    <!-- End Menu -->


  <!-- Form -->
    <form class="custom" 
          id="booking_validate" 
          name="input" 
          action="<?php echo base_url('carrent/inquiry');?>" 
          method="post"
    >

      <!-- Header -->
      <div class="row">
        <div class="twelve columns">
          <h1 style="color:#FE5214;">
           จองรถเช่า 
          </h1>
        </div>
      </div>
      <div class="border"></div>
      <!-- Header End -->

<!--Detail Cars-->
  <!--Vigo Cab-->
    <div class="row">
       <div class="twelve columns">
            <table class="twelve">
              <thead>
                <tr>
                  <th class="three">
                    <img src="<?php echo base_url('themes/Travel/images/CPMR.jpg');?>"/>
                  </th>
                  <th class="four" style="background:#FFFFFF; ">         
                    <h3>Toyota Vigo Cab 2.5 J-PS</h3>
                    <h4>Or Similar (CPMR) </h4> 
                      <img src="<?php echo base_url('themes/Travel/images/sbag1.jpg');?>"/>
                     <img src="<?php echo base_url('themes/Travel/images/bag1.jpg');?>"/>
                     <img src="<?php echo base_url('themes/Travel/images/org2.jpg');?>"/>          
                  </th>
                  <th class="two" style="background:#DFE6EF;"><b style="font-size:150%;">Include</b>
                    <br/>
                      - Manual<br/>
                      - 2.5 liter<br/>
                      - 4 cylinder<br/>
                      - Diesel<br/>
                      - Power steering<br/>         
                  </th>
                  <th class="three" style="background:#BCD0ED;">      
                    <center><h2>1,200 THB</h2><center>
                        <div class="twelve columns">
                          <a class="button" href="<?php echo base_url('carrent/inquiry/Toyota-Vigo-Cab-2.5J-PS/1200');?>">จองรถเช่า</a>
                        </div>
                  </th>
                </tr>
              </thead>
            </table>
          </div>
      </div>

  <!--Honda Brio-->

    <div class="row">
        <div class="twelve columns">
         <table class="twelve">
          <thead>
              <tr>
              <th class="three">
                  <img src="<?php echo base_url('themes/Travel/images/MCAR.jpg');?>"/>
              </th>
              <th class="four" style="background:#FFFFFF;">  
                    <h3>Honda Brio 1.2 V-AT</h3>
                    <h4>Or Similar (MCAR) </h4>        
                    <img src="<?php echo base_url('themes/Travel/images/bag2.jpg');?>"/>
                    <img src="<?php echo base_url('themes/Travel/images/org4.jpg');?>"/>           
              </th>
              <th class="two" style="background:#DFE6EF;"><b style="font-size:150%;">Include</b>
                  <br/>
                    - Automatic<br/>
                    - 1.2 liter<br/>
                    - 4 cylinder<br/>
                    - 5 door sedan<br/>
                    - Power steering<br/>
                    - ABS brakes<br/>     
                    - Dual airbags<br/>      
              </th>
              <th class="three" style="background:#BCD0ED;">                  
                  <center><h2>1,200 THB</h2><center>
                      <div class="twelve columns">
                        <a class="button" href="<?php echo base_url('carrent/inquiry/Honda-Brio-1.2V-AT/1200');?>">จองรถเช่า</a>
                      </div>
              </th>
            </tr>
          </thead>
        </table>
      </div>
    </div>

<!--Honda City-->

  <div class="row">
    <div class="twelve columns">
      <table class="twelve">
        <thead>
         <tr>
            <th class="three">
              <img src="<?php echo base_url('themes/Travel/images/ECAR.jpg');?>"/>
            </th>
            <th class="four" style="background:#FFFFFF;">         
                <h3>Honda City 1.5 V</h3>
                <h4>Or Similar (ECAR) </h4>  
                <img src="<?php echo base_url('themes/Travel/images/bag2.jpg');?>"/>
                <img src="<?php echo base_url('themes/Travel/images/org4.jpg');?>"/>
            </th>
            <th class="two" style="background:#DFE6EF;"><b style="font-size:150%;">Include</b>             
                <br/>
                - Automatic<br/>
                - 1.5 liter<br/>
                - 4 cylinder<br/>
                - 4 door sedan<br/>
                - Power steering<br/>
                - ABS brakes<br/>     
                - Dual airbags<br/>        
            </th>
            <th class="three" style="background:#BCD0ED;">             
                <center><h2>1,000 THB</h2><center>
                <div class="twelve columns">
                    <a class="button" href="<?php echo base_url('carrent/inquiry/Honda-City-1.5V/1000');?>">จองรถเช่า</a>
                </div>
            </th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

<!--NEW Altis-->

  <div class="row">
    <div class="twelve columns">
      <table class="twelve">
        <thead>
         <tr>
            <th class="three">
              <img src="<?php echo base_url('themes/Travel/images/CCAR.jpg');?>"/>
            </th>
            <th class="four" style="background:#FFFFFF;">         
                <h3>New Altis 1.6 G</h3>
                <h4>Or Similar (CCAR) </h4>  
                <img src="<?php echo base_url('themes/Travel/images/bag2.jpg');?>"/>
                <img src="<?php echo base_url('themes/Travel/images/org4.jpg');?>"/>
            </th>
            <th class="two" style="background:#DFE6EF;"><b style="font-size:150%;">Include</b>             
                <br/>
                - Automatic<br/>
                - 1.6 liter<br/>
                - 4 cylinder<br/>
                - 4 door sedan<br/>
                - Power steering<br/>
                - ABS brakes<br/>     
                - Dual airbags<br/>        
            </th>
            <th class="three" style="background:#BCD0ED;">             
                <center><h2>1,500 THB</h2><center>
                <div class="twelve columns">
                    <a class="button" href="<?php echo base_url('carrent/inquiry/New-Altis-1.6G/1500');?>">จองรถเช่า</a>
                </div>
            </th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

<!--Honda Civic-->

  <div class="row">
    <div class="twelve columns">
      <table class="twelve">
        <thead>
         <tr>
            <th class="three">
              <img src="<?php echo base_url('themes/Travel/images/ICAR.jpg');?>"/>
            </th>
            <th class="four" style="background:#FFFFFF;">         
                <h3>Honda Civic 1.8 S</h3>
                <h4>Or Similar (ICAR) </h4>  
                <img src="<?php echo base_url('themes/Travel/images/bbag2.jpg');?>"/>
                <img src="<?php echo base_url('themes/Travel/images/org5.jpg');?>"/>
            </th>
            <th class="two" style="background:#DFE6EF;"><b style="font-size:150%;">Include</b>             
                <br/>
                - Automatic<br/>
                - 1.8 liter<br/>
                - 4 cylinder<br/>
                - 4 door sedan<br/>
                - Power steering<br/>
                - ABS brakes<br/>     
                - Dual airbags<br/>        
            </th>
            <th class="three" style="background:#BCD0ED;">             
                <center><h2>1,500 THB</h2><center>
                <div class="twelve columns">
                    <a class="button" href="<?php echo base_url('carrent/inquiry/Honda-Civic-1.8S/1500');?>">จองรถเช่า</a>
                </div>
            </th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

<!--Honda Freed-->

  <div class="row">
    <div class="twelve columns">
      <table class="twelve">
        <thead>
         <tr>
            <th class="three">
              <img src="<?php echo base_url('themes/Travel/images/CVAR.jpg');?>"/>
            </th>
            <th class="four" style="background:#FFFFFF;">         
                <h3>Honda Freed 1.5 E</h3>
                <h4>Or Similar (CVAR) </h4>  
                <img src="<?php echo base_url('themes/Travel/images/bag2.jpg');?>"/>
                <img src="<?php echo base_url('themes/Travel/images/bbag2.jpg');?>"/>
                <img src="<?php echo base_url('themes/Travel/images/org6.jpg');?>"/>
            </th>
            <th class="two" style="background:#DFE6EF;"><b style="font-size:150%;">Include</b>             
                <br/>
                - Automatic<br/>
                - 1.5 liter<br/>
                - 4 cylinder<br/>
                - 5 door MPV<br/>
                - Automatic slide door<br/>
                - Power steering<br/>
                - ABS brakes<br/>     
                - Dual airbags<br/>        
            </th>
            <th class="three" style="background:#BCD0ED;">             
                <center><h2>1,800 THB</h2><center>
                <div class="twelve columns">
                    <a class="button" href="<?php echo base_url('carrent/inquiry/Honda-Freed-1.5E/1800');?>">จองรถเช่า</a>
                </div>
            </th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

<!--Toyota Innova-->

  <div class="row">
    <div class="twelve columns">
      <table class="twelve">
        <thead>
         <tr>
            <th class="three">
              <img src="<?php echo base_url('themes/Travel/images/IVAR.jpg');?>"/>
            </th>
            <th class="four" style="background:#FFFFFF;">         
                <h3>Toyota Innova 2.0 V</h3>
                <h4>Or Similar (IVAR) </h4>  
                <img src="<?php echo base_url('themes/Travel/images/bag1.jpg');?>"/>
                <img src="<?php echo base_url('themes/Travel/images/bbag1.jpg');?>"/>
                <img src="<?php echo base_url('themes/Travel/images/org6.jpg');?>"/>
            </th>
            <th class="two" style="background:#DFE6EF;"><b style="font-size:150%;">Include</b>             
                <br/>
                - Automatic<br/>
                - 2.0 liter<br/>
                - 4 cylinder<br/>
                - 5 door MPV<br/>
                - Power steering<br/>
                - ABS brakes<br/>     
                - Dual airbags<br/>        
            </th>
            <th class="three" style="background:#BCD0ED;">             
                <center><h2>1,200 THB</h2><center>
                <div class="twelve columns">
                    <a class="button" href="<?php echo base_url('carrent/inquiry/Toyota-Innova-2.0V/1200');?>">จองรถเช่า</a>
                </div>
            </th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

<!--Honda CR-V-->

  <div class="row">
    <div class="twelve columns">
      <table class="twelve">
        <thead>
         <tr>
            <th class="three">
              <img src="<?php echo base_url('themes/Travel/images/PFAR_4WD.jpg');?>"/>
            </th>
            <th class="four" style="background:#FFFFFF;">         
                <h3>Honda CR-V 2.0 E 4WD</h3>
                <h4>Or Similar (PFAR 4WD) </h4>  
                <img src="<?php echo base_url('themes/Travel/images/bag1.jpg');?>"/>
                <img src="<?php echo base_url('themes/Travel/images/bbag3.jpg');?>"/>
                <img src="<?php echo base_url('themes/Travel/images/org5.jpg');?>"/>
            </th>
            <th class="two" style="background:#DFE6EF;"><b style="font-size:150%;">Include</b>             
                <br/>
                - Automatic<br/>
                - 2.0 liter<br/>
                - 4 cylinder<br/>
                - 5 door MPV<br/>
                - Power steering<br/>
                - ABS brakes<br/>     
                - Dual airbags<br/>        
            </th>
            <th class="three" style="background:#BCD0ED;">             
                <center><h2>2,000 THB</h2><center>
                <div class="twelve columns">
                    <a class="button" href="<?php echo base_url('carrent/inquiry/Honda-CRV-2.0E-4WD/2000');?>">จองรถเช่า</a>
                </div>
            </th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

<!--Toyota Camry-->

  <div class="row">
    <div class="twelve columns">
      <table class="twelve">
        <thead>
         <tr>
            <th class="three">
              <img src="<?php echo base_url('themes/Travel/images/PCAR.jpg');?>"/>
            </th>
            <th class="four" style="background:#FFFFFF;">         
                <h3>Toyota Camry 2.0 G</h3>
                <h4>Or Similar (PCAR) </h4>  
                <img src="<?php echo base_url('themes/Travel/images/bag2.jpg');?>"/>
                <img src="<?php echo base_url('themes/Travel/images/bbag2.jpg');?>"/>
                <img src="<?php echo base_url('themes/Travel/images/org5.jpg');?>"/>
            </th>
            <th class="two" style="background:#DFE6EF;"><b style="font-size:150%;">Include</b>             
                <br/>
                - Automatic<br/>
                - 2.0 liter<br/>
                - 4 cylinder<br/>
                - 4 door MPV<br/>
                - Power steering<br/>
                - ABS brakes<br/>     
                - Dual airbags<br/>        
            </th>
            <th class="three" style="background:#BCD0ED;">             
                <center><h2>2,200 THB</h2><center>
                <div class="twelve columns">
                    <a class="button" href="<?php echo base_url('carrent/inquiry/Toyota-Camry-2.0G/2200');?>">จองรถเช่า</a>
                </div>
            </th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

<!--Hilux vigo double cab-->

  <div class="row">
    <div class="twelve columns">
      <table class="twelve">
        <thead>
         <tr>
            <th class="three">
              <img src="<?php echo base_url('themes/Travel/images/FFAR_4WD.jpg');?>"/>
            </th>
            <th class="four" style="background:#FFFFFF;">         
                <h3>Toyota Hilux Vigo Double Cab 3.0 G 4WD</h3>
                <h4>Or Similar (FFAR 4WD) </h4>  
                <img src="<?php echo base_url('themes/Travel/images/bag2.jpg');?>"/>
                <img src="<?php echo base_url('themes/Travel/images/bbag3.jpg');?>"/>
                <img src="<?php echo base_url('themes/Travel/images/org4.jpg');?>"/>
            </th>
            <th class="two" style="background:#DFE6EF;"><b style="font-size:150%;">Include</b>             
                <br/>
                - Automatic<br/>
                - 3.0 liter<br/>
                - 4 cylinder<br/>
                - 4 door MPV<br/>
                - Power steering<br/>
                - ABS brakes<br/>     
                - Dual airbags<br/>        
            </th>
            <th class="three" style="background:#BCD0ED;">             
                <center><h2>1,500 THB</h2><center>
                <div class="twelve columns">
                    <a class="button" href="<?php echo base_url('carrent/inquiry/Toyota-Hilux-Vigo-DoubleCab-3.0G-4WD/1500');?>">จองรถเช่า</a>
                </div>
            </th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

<!--Toyota Commuter-->

  <div class="row">
    <div class="twelve columns">
      <table class="twelve">
        <thead>
         <tr>
            <th class="three">
              <img src="<?php echo base_url('themes/Travel/images/MVMR.jpg');?>"/>
            </th>
            <th class="four" style="background:#FFFFFF;">         
                <h3>Toyota Commuter</h3>
                <h4>Or Similar (MVMR) </h4>  
                <img src="<?php echo base_url('themes/Travel/images/bag3.jpg');?>"/>
                <img src="<?php echo base_url('themes/Travel/images/org12.jpg');?>"/>
            </th>
            <th class="two" style="background:#DFE6EF;"><b style="font-size:150%;">Include</b>             
                <br/>
                - Manual<br/>
                - 2.5 liter<br/>
                - 4 cylinder<br/>
                - Diesel<br/>
                - Power steering<br/>
                - Minibus<br/>           
            </th>
            <th class="three" style="background:#BCD0ED;">             
                <center><h2>2,000 THB</h2><center>
                <div class="twelve columns">
                    <a class="button" href="<?php echo base_url('carrent/inquiry/Toyota-Commuter/2000');?>">จองรถเช่า</a>
                </div>
            </th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

<!--End Detail Cars-->

<br/><br/>
      <!-- Contact Us -->
      <div class="row">
        <div class="twelve columns">
          <ul class="tags">
            <li style="font-size:30px; color:#FE5214;">ติดต่อเรา :</li>
            <li><b>โทร.</b> 082-8121146, 076-331280&nbsp;&nbsp;<b>แฟกซ์.</b> 076-331273&nbsp;&nbsp;<b>อีเมล์</b> info@uastravel.com</li>
          </ul>
        </div> 
      </div>
      <!-- Contact Us End-->



    </form>
  </div>
  <!-- Form End -->

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
          <p>info@uastravel.com</p>
          <p>80/86 หมู่บ้านศุภาลัยฮิล ซ.5 อ.เมือง จ.ภูเก็ต 83000</p>
        </div>
      </div>
    </div>
  </footer>


<?php include_once("themes/Travel/tour/analyticstracking.php"); ?>
</body>
</html>