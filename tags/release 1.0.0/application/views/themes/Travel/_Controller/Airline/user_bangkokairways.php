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
  <title><?php echo "จองตั๋วเครื่องบิน U As Travel - Bangkok Airways" ;?></title>
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

<script type="text/javascript">
//<![CDATA[
function redirect(url) {
window.location.href = url;
}
//]]>
</script>

</head>

<body style="background: #ededed url(<?php echo base_url('themes/Travel/tour/images/bg_airline01.jpg');?>) no-repeat top center;">
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
                <a href="<?php echo base_url('tour/ที่พัก');?>">ที่พัก</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('hotel/list');?>">จองโรงแรม</a></li>
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
          action="<?php echo base_url('airline/inquiry');?>" 
          method="post"
    >

      <!-- Header -->
      <div class="row">
        <div class="twelve columns">
          <div class="four columns" style="margin-top:13px;">
          <h1 style="color:#FE5214;">
           จองตั๋วเครื่องบิน 
          </h1> 
          </div>
          <div class="three columns">
          <select name="link" id="link" onchange="redirect(this.value);" style="margin-top:50px;">
              <option value="<?php echo base_url('airline/list/thaiairways');?>" >Thai Airways</option>
              <option value="<?php echo base_url('airline/list/nokair');?>">Nok Air</option>
              <option value="<?php echo base_url('airline/list/airasia');?>">Air Asia</option>
              <option value="<?php echo base_url('airline/list/orientthai');?>">Orient Thai</option>
              <option value="<?php echo base_url('airline/list/bangkokairways');?>" selected>Bangkok Airways</option>
          </select>
          </div>
          <div class="one columns">           
          </div>
          <div class="four columns">
            <img src="<?php echo base_url('themes/Travel/images/bangkok_airways.png');?>" />
          </div>
        </div>
      </div>
      <div class="border"></div>
      <!-- Header End -->

<!--Row 1-->
      <div class="row">
        <div class="twelve columns" >
          <!--Column 1-->
          <!--test-->
            
          <!--test-->
            <div class="six columns">

    <!--BKK-CNX-->  
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Suvarnabhumi (BKK) - Chiang Mai (CNX)</b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG215</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG223</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG217</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG225</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG219</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily&nbsp;</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG221</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:54</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Bangkok-Suvarnabhumi-BKK/Chiang-Mai-CNX');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a> | 
                      <a href="<?php echo base_url('airline/list/orientthai');?>" title="Orient Thai/One-Two-Go Flight Schedule" target="_blank">OX</a> | 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

    <!--BKK-HKT-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Suvarnabhumi (BKK) - Phuket (HKT)</b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG271</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG275</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG924</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG273</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG277</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG279</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG220</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">23:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Bangkok-Suvarnabhumi-BKK/Phuket-HKT');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a> | 
                      <a href="<?php echo base_url('airline/list/orientthai');?>" title="Orient Thai/One-Two-Go Flight Schedule" target="_blank">OX</a> | 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

    <!--BKK-USM-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Suvarnabhumi (BKK) - Koh Samui (USM)</b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td class="frame_header_4"><div align="center" style="font-size:120%;">PG103</div></td>
                    <td class="frame_header_4"><div align="center" style="font-size:120%;">06:00</div></td>
                    <td class="frame_header_4"><div align="center" style="font-size:120%;">07:05</div></td>
                    <td class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td class="frame_header_4"><div align="center" style="font-size:120%;">PG121</div></td>
                    <td class="frame_header_4"><div align="center" style="font-size:120%;">07:30</div></td>
                    <td class="frame_header_4"><div align="center" style="font-size:120%;">08:35</div></td>
                    <td class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 04 Jul</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG123</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">M,Th,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG127</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">05 Jul - 09 Sep</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG129</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG805</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">M,T,Th,F</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG131</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG265</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG133</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG141</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14 Jul - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">T,F,S</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG135</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;" style="font-size:120%;">13:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG216</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG961</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">T,F,S</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG873</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG906</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29O ct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG951</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG171</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">05 Jul - 09 Sep</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG179</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG175</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG189</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Aug - 09 Sep</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG191</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14 Jul - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG187</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">T,F,S</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG199</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06 Jun - 13 Jul</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG199</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 05 Jul</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG199</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17 Jul - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG199</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08 Jul - 16 Jul</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Bangkok-Suvarnabhumi-BKK/Koh-Samui-USM');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a></span>
                    </td>
                  </tr>
                </table>

    <!--LPT-BKK-->
                <table class="twelve"  style="margin-top:210px;">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                    <div align="left"><strong><b style="font-size:130%;">Lampang (LPT) - Bangkok Suvarnabhumi (BKK) </b></strong></div>
                  </td>
                </tr>
                <tr>
                  <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                  <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                  <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                  <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                  <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                </tr>
                <tr>
                  <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                  <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG203</div></td>
                  <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:20</div></td>
                  <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:50</div></td>
                  <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                </tr>
                <tr>
                  <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                  <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG205</div></td>
                  <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:00</div></td>
                  <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:30</div></td>
                  <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                </tr>
                <tr>
                  <td align="center" nowrap class="frame_header_3">
                    <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Lampang-LPT/Bangkok-Suvarnabhumi-BKK');?>" target="blank" title="Book Bangkok Airways Ticket">
                      <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                      width="50" height="29" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                    </a>
                  </td>
                  <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:</span></td>
                </tr>
              </table>             

    <!--BKK-THS-->
              <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Suvarnabhumi (BKK) - Sukhothai (THS)</b></strong></div>
                    </td>
                    </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG211</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG213</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Bangkok-Suvarnabhumi-BKK/Sukhothai-THS');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>


    <!--BKK-TDX-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Suvarnabhumi (BKK) - Trat (TDX)</b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG302</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG308</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Bangkok-Suvarnabhumi-BKK/Trat-TDX');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>

    <!--BKK-KBV-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Suvarnabhumi (BKK) - Krabi (KBV)</b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG265</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Bangkok-Suvarnabhumi-BKK/Krabi-KBV');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a>&nbsp;| 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

    <!--HKT-USM-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Phuket (HKT) - Koh Samui (USM)</b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG252</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG260</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG256</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG258 </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Phuket-HKT/Koh-Samui-USM');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>

    <!--HKT-UTP-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Phuket (HKT) - Utapao (UTP) </b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG252</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG282</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Phuket-HKT/Utapao-UTP');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>

    <!--UTP-USM-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Utapao (UTP) - Koh Samui (USM)</b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG294</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:0</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Utapao-UTP/Koh-Samui-USM');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>

    <!--CNX-USM-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Chiang Mai (CNX) - Koh Samui (USM)</b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG216</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG242</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Chiang-Mai-CNX/Koh-Samui-USM');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>

    <!--KBV-USM-->       
              <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Krabi (KBV) - Koh Samui (USM)</b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG266</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Krabi-KBV/Koh-Samui-USM');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>
                   

              </div>
            <!--End Column 1-->

            <!--Column 2-->
              <div class="six columns">

    <!--CNX-BKK-->  
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Chiang Mai (CNX) - Bangkok Suvarnabhumi (BKK)</b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG222</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG216</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG218</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG220</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Chiang-Mai-CNX/Bangkok-Suvarnabhumi-BKK');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a> | 
                      <a href="<?php echo base_url('airline/list/orientthai');?>" title="Orient Thai/One-Two-Go Flight Schedule" target="_blank">OX</a> | 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

    <!--HKT-BKK-->
                <table class="twelve" style="margin-top:95px;">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;"> Phuket (HKT) - Bangkok Suvarnabhumi (BKK)</b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG270</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG272</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG276</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG907</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG274</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG278</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG280</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">23:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Phuket-HKT/Bangkok-Suvarnabhumi-BKK');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a> | 
                      <a href="<?php echo base_url('airline/list/orientthai');?>" title="Orient Thai/One-Two-Go Flight Schedule" target="_blank">OX</a> | 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

    <!--USM-BKK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Koh Samui (USM) - Bangkok Suvarnabhumi (BKK)</b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG100</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG100</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18 Jul - 28 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">M,T,Th,F,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG100</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09 Jul - 17 Jul</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">T,S,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG100</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07 Jul - 14 Jul</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG104</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG122</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 04 Jul</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG122</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14 Jul - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG952</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;" style="font-size:120%;">PG217</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG128</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">05 Jul - 09 Sep</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">M,T,Th,F</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG132</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">W,S,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG874</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG134</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 04 Jul</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG134</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14 Jul - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG142</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14 Jul - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">T,F,S</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG136</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG138</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG140</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">05 Jul - 09 Sep</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG144</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG266</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG168</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG180</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 04 Jul</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG180</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14 Jul - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG172</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">05 Jul - 09 Sep</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG178</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG806</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;"20:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG188</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG176</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;"PG190</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">23:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Aug - 09 Sep</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG192</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14 Jul - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG962</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">23:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Koh-Samui-USM/Bangkok-Suvarnabhumi-BKK');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a></span>
                    </td>
                  </tr>
                </table>

    <!--BKK-LPT-->
              <table class="twelve">
                <tr bgcolor="#EFF7FF" >
                  <td colspan="5">
                    <div align="left"><strong><b style="font-size:130%;">Bangkok Suvarnabhumi (BKK) - Lampang (LPT)</b></strong></div>
                  </td>
                </tr>
                <tr>
                  <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                  <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                  <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                  <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                  <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                </tr>
                <tr>
                  <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                  <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG204</div></td>
                  <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:20</div></td>
                  <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:50</div></td>
                  <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                </tr>
                <tr>
                  <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">T,W,Tu,F,Su</div></td>
                  <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG206</div></td>
                  <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:00</div></td>
                  <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:30</div></td>
                  <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                </tr>
                <tr>
                  <td align="center" nowrap class="frame_header_3">
                    <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Bangkok-Suvarnabhumi-BKK/Lampang-LPT');?>" target="blank" title="Book Bangkok Airways Ticket">
                      <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                      width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                    </a>
                  </td>
                  <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines:</span></td>
                </tr>
              </table>

    <!--THS-BKK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Sukhothai (THS) - Bangkok Suvarnabhumi (BKK) </b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG212</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 ct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG214</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Sukhothai-THS/Bangkok-Suvarnabhumi-BKK');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>

    <!--TDX-BKK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Trat (TDX) - Bangkok Suvarnabhumi (BKK) </b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG302</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG308</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Trat-TDX/Bangkok-Suvarnabhumi-BKK');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>

    <!--KBV-BKK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Krabi (KBV) - Bangkok Suvarnabhumi (BKK)</b></strong></div></td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG266</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="T<?php echo base_url('airline/inquiry/Bangkok-Airways/Krabi-KBV/Bangkok-Suvarnabhumi-BKK');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a>&nbsp;| 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

    <!--USM-HKT-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Koh Samui (USM) - Phuket (HKT) </b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG251</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May -2 9 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG259</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG255</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG257</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Koh-Samui-USM/Phuket-HKT');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>"
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>

    <!--UTP-HKT-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Utapao (UTP) - Phuket (HKT)</b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG281</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;"04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Utapao-UTP/Phuket-HKT');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>

    <!--USM-UTP-->
                <table class="twelve" style="margin-top:57px;">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;"> Koh Samui (USM) - Utapao (UTP)</b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG252</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Koh-Samui-USM/Utapao-UTP');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>

    <!--USM-CNX-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;"> Koh Samui (USM) - Chiang Mai (CNX)</b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG217</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Koh-Samui-USM/Chiang-Mai-CNX');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>

    <!--USM-KBV-->  
                <table class="twelve" style="margin-top:56px;">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;"> Koh Samui (USM) - Krabi (KBV)</b></strong></div>
                    </td>
                    </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">PG265</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">04 May - 29 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Bangkok-Airways/Koh-Samui-USM/Krabi-KBV');?>" target="blank" title="Book Bangkok Airways Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Bangkok Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style1" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>
            </div>
            <!--End Column 2-->
        </div>

        
      </div>
<!--End Row 1-->

      <div class="row">
        <div class="twelve columns">
          <h5>
          <b>Remark :</b> M = Monday, T = Tuesday, W = Wednesday, Th = Thursday, F = Friday, S = Saturday, Su = Sunday
                x = Everyday except..
          </h5>
        </div>
      </div>

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