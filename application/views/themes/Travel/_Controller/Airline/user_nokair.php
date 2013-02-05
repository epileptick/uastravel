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
  <title><?php echo "จองตั๋วเครื่องบิน U As Travel - Nok Air" ;?></title>
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
              <option value="<?php echo base_url('airline/list/thaiairways');?>">Thai Airways</option>
              <option value="<?php echo base_url('airline/list/nokair');?>" selected>Nok Air</option>
              <option value="<?php echo base_url('airline/list/airasia');?>">Air Asia</option>
              <option value="<?php echo base_url('airline/list/orientthai');?>">Orient Thai</option>
              <option value="<?php echo base_url('airline/list/bangkokairways');?>">Bangkok Airways</option>
            </select>
          </div>
          <div class="one columns">           
          </div>
          <div class="four columns">
            <img src="<?php echo base_url('themes/Travel/images/nokair.png');?>" />
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

    <!--DMK-CNX-->         
              <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Chiang Mai (CNX) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8300</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Sep - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8306</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8312</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8318</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8324</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8336</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Bangkok-Don-Mueang-DMK/Chiang-Mai-CNX');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a> | 
                      <a href="<?php echo base_url('airline/list/orientthai');?>" title="Orient Thai/One-Two-Go Flight Schedule" target="_blank">OX</a> | 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

      <!--DMK-CEI-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Chiang Rai (CEI)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8714</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 31 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8714</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Sep - 14 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8714</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15 Oct - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8722</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 31 Jul</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8722</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Aug - 31 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8722</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Sep - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Bangkok-Don-Mueang-DMK/Chiang-Rai-CEI');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                     </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a>&nbsp;| 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>
                

      <!--DMK-PHS-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Phitsanulok (PHS)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8400</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 31 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8400</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 ep - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">M,W,F,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8404</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">T,Th,S</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8408</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8420</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 31 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8420</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Sep - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Bangkok-Don-Mueang-DMK/Phitsanulok-PHS');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>
                

      <!--DMK-NNT-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Nan (NNT)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8818</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8830</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8832</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Bangkok-Don-Mueang-DMK/Nan-NNT');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: </span></td>
                  </tr>
                </table>
            

      <!--DMK-PRH-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Phrae (PRH)</b></strong></div>
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
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">T,Th,S</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8004</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Bangkok-Don-Mueang-DMK/Phrae-PRH');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp;</span></td>
                    </tr>
                </table>
                

      <!--DMK-MAQ-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Mae Sot (MAQ)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8116</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">M,W,F,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8118</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 31 Aug</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Bangkok-Don-Mueang-DMK/Mae-Sot-MAQ');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp;</span></td>
                  </tr>
                </table>
                

      <!--DMK-UTH-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Udon Thani (UTH) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9200</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9202</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 14 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9210</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9216</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9218</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 14 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9218</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15 Oct - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Bangkok-Don-Mueang-DMK/Udon-Thani-UTH');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a>&nbsp;| 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>
               

      <!--DMK-UBP-->
               <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - UbonRatchathani(UBP)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9310</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9314</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9318</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Bangkok-Don-Mueang-DMK/UbonRatchathani-UBP');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a>&nbsp;| 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

      <!--BKK-KOP-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Nakhon Phanom (KOP)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9514</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9520</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Bangkok-Don-Mueang-DMK/Nakhon-Phanom-KOP');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>              

      <!--BKK-SNO-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Sakonnakhon (SNO) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9402</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 31 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9402</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Sep - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9406</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Bangkok-Don-Mueang-DMK/Sakonnakhon-SNO');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp;</span></td>
                  </tr>
                </table>

              
      <!--BKK-ROI-->
              <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Roi Et (ROI)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9114</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">M,W,F,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9128</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Bangkok-Don-Mueang-DMK/Roi-Et-ROI');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: </span></td>
                  </tr>
                </table>                

      <!--DMK-LOE-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Loei (LOE)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9704</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Bangkok-Don-Mueang-DMK/Loei-LOE');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp;</span></td>
                  </tr>
                </table>

      <!--DMK-HDY-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Hat Yai (HDY) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7102</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Sep - 14 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7104</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7110</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7112</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7114</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7116</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Bangkok-Don-Mueang-DMK/Hat-Yai-HDY');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a>&nbsp;| 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>                                

      <!--DMK-NST-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Nakon Si Tham. (NST) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7804</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7808</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 ul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7810</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7814</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Bangkok-Don-Mueang-DMK/Nakon-Si-Tham-NST');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

      <!--DMK-HKT-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Phuket (HKT) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7502</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7506</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Bangkok-Don-Mueang-DMK/Phuket-HKT');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a> | 
                      <a href="<?php echo base_url('airline/list/orientthai');?>" title="Orient Thai/One-Two-Go Flight Schedule" target="_blank">OX</a> | 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>


      <!--DMK-URT-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Surat Thani (URT)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7208</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7212</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Sep - 14 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7212</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15 Oct - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7220</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Bangkok-Don-Mueang-DMK/Surat-Thani-URT');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

      <!--DMK-TST-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Trang (TST) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7400</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7410</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Bangkok-Don-Mueang-DMK/Trang-TST');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>              

      <!--CNX-HGN-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Chiang Mai (CNX) - Mae Hong Son (HGN)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8202</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8208</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Chiang-Mai-CNX/Mae-Hong-Son-HGN');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: </span></td>
                  </tr>
                </table>

      <!--CNX-UTH-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Chiang Mai (CNX) - Udon Thani (UTH)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8610</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">M,F,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD955</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8624</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Chiang-Mai-CNX/Udon-Thani-UTH');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: </span></td>
                    </tr>
                </table>

      <!--CNX-MAQ-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Chiang Mai (CNX) - Mae Sot (MAQ)</b></strong></div>
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
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">M,W,F,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8247</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 31 Aug</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Chiang-Mai-CNX/Mae-Sot-MAQ');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>
               
            </div>
            <!--End Column 1-->

            <!--Column 2-->
            <div class="six columns">

      <!--CNX-DMK-->
              <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Chiang Mai (CNX) - Bangkok Don Mueang (DMK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8301</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Sep - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8307</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8313</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8319</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8325</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8327</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Chiang-Mai-CNX/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a> | 
                      <a href="<?php echo base_url('airline/list/orientthai');?>" title="Orient Thai/One-Two-Go Flight Schedule" target="_blank">OX</a> | 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>


      <!--CEI-DMK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Chiang Rai (CEI) - Bangkok Don Mueang (DMK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8715</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 31 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8715</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Sep - 14 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8715</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15 Oct - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8723</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 31 Jul</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8723</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Aug - 31 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8723</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Sep - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Chiang-Rai-CEI/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a>&nbsp;| 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>
                

      <!--PHS-DMK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;"> Phitsanulok (PHS) - Bangkok Don Mueang (DMK) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8401</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 31 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8401</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Sep - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">M,W,F,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8405</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">T,Th,S</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8409</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8421</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 31 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8421</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Sep - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Phitsanulok-PHS/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>
                

      <!--NNT-DMK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Nan (NNT) - Bangkok Don Mueang (DMK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8819</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8831</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8833</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Nan-NNT/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp; </span></td>
                  </tr>
                </table>
                

      <!--PRH-DMK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Phrae (PRH) - Bangkok Don Mueang (DMK)</b></strong></div>
                    </td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;">T,Th,S</div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8005</div></td>
                    <td width="22%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:35</div></td>
                    <td width="21%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:00</div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Phrae-PRH/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp;</span></td>
                  </tr>
                </table>
           

      <!--MAQ-DMK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Mae Sot (MAQ) - Bangkok Don Mueang (DMK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8117</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">M,W,F,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8119</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 31 Aug</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Mae-Sot-MAQ/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp; </span></td>
                  </tr>
                </table>

      <!--UTH-DMK-->
               <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;"> Udon Thani (UTH) - Bangkok Don Mueang (DMK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9201</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9203</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 14 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9211</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9217</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9219</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 14 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9219</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15 Oct - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Udon-Thani-UTH/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> |&nbsp;
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

      <!--UBP-DMK-->            
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">UbonRatchathani (UBP) - Bangkok Don Mueang (DMK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9311</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9315</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9319</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/UbonRatchathani-UBP/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a>&nbsp;| 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

      <!--KOP-BKK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;"> Nakhon Phanom (KOP) - Bangkok Don Mueang (BKK) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9515</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9521</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Nakhon-Phanom-KOP/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

      <!--SNO-BKK-->               
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;"> Sakonnakhon (SNO) - Bangkok Don Mueang (BKK) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9403</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 31 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9403</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Sep - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9407</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Sakonnakhon-SNO/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp;</span></td>
                  </tr>
                </table>
              
      <!--ROI-BKK-->
              <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Roi Et (ROI) - Bangkok Don Mueang (BKK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9115</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">M,W,F,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9129</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Roi-Et-ROI/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: </span></td>
                  </tr>
                </table>

      <!--LOE-DMK-->               
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Loei (LOE) - Bangkok Don Mueang (DMK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD9705</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Loei-LOE/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp;</span></td>
                  </tr>
                </table>

      <!--HDY-DMK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;"> Hat Yai (HDY) - Bangkok Don Mueang (DMK) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7103</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Sep - 14 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7105</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7111</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7113</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7115</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7117</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Hat-Yai-HDY/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a>&nbsp;| 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

      <!--NST-DMK-->               
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Nakon Si Tham. (NST) - Bangkok Don Mueang (DMK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7805</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7809</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7811</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7815</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Nakon-Si-Tham-NST/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp;
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

      <!--HKT-DMK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;"> Phuket (HKT) - Bangkok Don Mueang (DMK) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7503</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7507</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Phuket-HKT/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a> | 
                      <a href="<?php echo base_url('airline/list/orientthai');?>" title="Orient Thai/One-Two-Go Flight Schedule" target="_blank">OX</a> | 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

      <!--URT-DMK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Surat Thani (URT) - Bangkok Don Mueang (DMK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;"> DD7209 </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;"> 07:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;"> 09:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;"> DD7213 </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Sep - 14 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;"> DD7213 </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15 Oct - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;"> DD7221 </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;"> 21:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;"> 22:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Surat-Thani-URT/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

      <!--TST-DMK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Trang (TST) - Bangkok Don Mueang (DMK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7401</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD7411</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Trang-TST/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>

      <!--HGN-CNX-->               
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Mae Hong Son (HGN) - Chiang Mai (CNX)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8203</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8209</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Mae-Hong-Son-HGN/Chiang-Mai-CNX');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:</span> </td>
                  </tr>
                </table>


      <!--UTH-CNX-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Udon Thani (UTH) - Chiang Mai (CNX)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8611</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">M,F,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD956</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8625</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Udon-Thani-UTH/Chiang-Mai-CNX');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: </span></td>
                    </tr>
                </table>

      <!--MAQ-CNX-->               
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Mae Sot (MAQ) - Chiang Mai (CNX)</b></strong></div>
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
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">M,W,F,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">DD8246</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Jul - 31 Aug</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Nok-Air/Mae-Sot-MAQ/Chiang-Mai-CNX');?>" target="blank" title="Book Nok Air Ticket">
                        <center><img border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                        width="50" height="20" alt="Book Nok Air Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" nowrap class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:</span></td>
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