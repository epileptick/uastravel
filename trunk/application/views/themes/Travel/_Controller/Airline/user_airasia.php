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
  <title><?php echo "จองตั๋วเครื่องบิน U As Travel - Air Asia" ;?></title>
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
              <option value="<?php echo base_url('airline/list/nokair');?>">Nok Air</option>
              <option value="<?php echo base_url('airline/list/airasia');?>" selected>Air Asia</option>
              <option value="<?php echo base_url('airline/list/orientthai');?>">Orient Thai</option>
              <option value="<?php echo base_url('airline/list/bangkokairways');?>">Bangkok Airways</option>
          </select>
          </div>
          <div class="one columns">           
          </div>
          <div class="four columns">
            <img src="<?php echo base_url('themes/Travel/images/Air_Asia.png');?>" />
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
                      <div align="left"><strong><b style="font-size:130%;">Bangkok DonMueang (DMK) - Chiang Mai (CNX)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3230</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3232</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Oct - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3234</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3236</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Oct - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3238</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3240</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">T,Th,S,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3428</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Bangkok-Don-Mueang-DMK/Chiang-Mai-CNX');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a> | 
                      <a href="<?php echo base_url('airline/list/orientthai');?>" title="Orient Thai/One-Two-Go Flight Schedule" target="_blank">OX</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a></span>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3250</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3254</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3256</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Bangkok-Don-Mueang-DMK/Chiang-Rai-CEI');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/orientthai');?>" title="Orient Thai/One-Two-Go Flight Schedule" target="_blank">OX</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a></span>
                    </td>
                  </tr>
                </table>

     <!--DMK-HDY--> 
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Hat Yai (HDY)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3131</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3133</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3135</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3139</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3141</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3143</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Oct - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Bangkok-Don-Mueang-DMK/Hat-Yai-HDY');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/orientthai');?>" title="Orient Thai/One-Two-Go Flight Schedule" target="_blank">OX</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a></span>
                    </td>
                  </tr>
                </table>
               

     <!--DMK-HKT-->
                <table class="twelve" style="margin-top:56px;">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Phuket (HKT)</b></strong></div>
                    </td>
                  </tr>
                  <tr bgcolor="#EFF7FF" >
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;"><strong>Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;"><strong>Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3023</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3021</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3025</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Oct - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3027</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3029</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3031</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3037</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3033</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Oct - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3035</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Bangkok-Don-Mueang-DMK/Phuket-HKT');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/orientthai');?>" title="Orient Thai/One-Two-Go Flight Schedule" target="_blank">OX</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a></span>
                    </td>
                  </tr>
                </table>

     <!--DMK-UBP-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - UbonRatchathani (UBP)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3320</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3322</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Bangkok-Don-Mueang-DMK/UbonRatchathani-UBP');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a></span>
                    </td>
                  </tr>
                </table>



     <!--DMK-URT-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Surat Thani (URT) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3183</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3181</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Bangkok-Don-Mueang-DMK/Surat-Thani-URT');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a></span>
                    </td>
                  </tr>
                </table>



     <!--DMK-UTH-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Udon Thani (UTH)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3360</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3366</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3364</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Bangkok-Don-Mueang-DMK/Udon-Thani-UTH');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a></span>
                    </td>
                  </tr>
                </table>


     <!--DMK-KBV-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Krabi (KBV)</b></strong></div></td>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3169</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Oct - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3163</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3165</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3167</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Bangkok-Don-Mueang-DMK/Krabi-KBV');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a></span>
                    </td>
                  </tr>
                </table>
               

     <!--DMK-KOP-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Nakhon Phanom (KOP)</b></strong></div>
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
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3270</div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:05</div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:25</div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3396</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Oct- 30 Mar</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Bangkok-Don-Mueang-DMK/Nakhon-Phanom-KOP');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a></span>
                    </td>
                  </tr>
                </table>



     <!--DMK-NAW-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Narathiwat (NAW)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3151</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Bangkok-Don-Mueang-DMK/Narathiwat-NAW');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>

                

     <!--DMK-NST-->
               <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Nakon Si Thanm. (NST)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3200</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3204</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Bangkok-Don-Mueang-DMK/Nakon-Si-Thanm-NST');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a></span>
                    </td>
                  </tr>
                </table>



     <!--HKT-CNX-->
               <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Phuket (HKT) - Chiang Mai (CNX)</b></strong></div></td>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3974</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3976</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Phuket-HKT/Chiang-Mai-CNX');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a></span>
                    </td>
                  </tr>
                </table>



     <!--HKT-UBP-->  
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Phuket (HKT) - Ubon Ratchathani (UBP)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3960</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Phuket-HKT/Ubon-Ratchathani-UBP');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>



     <!--HKT-UTH-->
               <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Phuket (HKT) - Udon Thani (UTH)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3984</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Phuket-HKT/Udon-Thani-UTH');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>

                

     <!--HDY-CNX-->    
               <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Hat Yai (HDY) - Chiang Mai (CNX)</b></strong></div></td>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3416</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Hat-Yai-HDY/Chiang-Mai-CNX');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:</span></td>
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
                      <div align="left"><strong><b style="font-size:130%;"> Chiang Mai (CNX) -Bangkok Don Mueang (DMK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3231</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3233</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3235</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3237</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3239</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3241</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">23:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">T,Th,S,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3247</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Chiang-Mai-CNX/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a> | 
                      <a href="<?php echo base_url('airline/list/orientthai');?>" title="Orient Thai/One-Two-Go Flight Schedule" target="_blank">OX</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a></span>
                    </td>
                  </tr>
                </table>

    <!--CEI-DMK-->
               <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;"> Chiang Rai (CEI) - Bangkok Don Mueang (DMK) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3251</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3255</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3257</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Chiang-Rai-CEI/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/orientthai');?>" title="Orient Thai/One-Two-Go Flight Schedule" target="_blank">OX</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a></span>
                    </td>
                  </tr>
                </table>

    <!--HDY-DMK--> 
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;"> Hat Yai (HDY) - Bangkok Don Mueang (DMK) </b></strong></div></td>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3132</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3134</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3136</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3144</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Oct - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3144</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 7 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3140</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3142</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">23:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Hat-Yai-HDY/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/orientthai');?>" title="Orient Thai/One-Two-Go Flight Schedule" target="_blank">OX</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a></span>
                    </td>
                  </tr>
                </table>

    <!--HKT-DMK-->
             <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;"> Phuket (HKT) - Bangkok Don Mueang (DMK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3022</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3024</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3026</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Oct - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3028</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3030</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3032</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3038</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Oct - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3034</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">23:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3036</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">23:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">00:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Phuket-HKT/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="s<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/orientthai');?>" title="Orient Thai/One-Two-Go Flight Schedule" target="_blank">OX</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a></span>
                    </td>
                  </tr>
                </table>

    <!--UBP-DMK-->
               <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;"> UbonRatchathani(UBP) - Bangkok Don Mueang (DMK) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3321</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3323</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/UbonRatchathani-UBP/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a></span>
                    </td>
                  </tr>
                </table>

    <!--URT-DMK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;"> Surat Thani (URT) - Bangkok Don Mueang (DMK) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3184</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3182</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Surat-Thani-URT/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a></span>
                    </td>
                  </tr>
              </table>

    <!--UTH-DMK-->
               <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Udon Thani (UTH) - Bangkok Don Mueang (DMK) </b></strong></div></td>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3361</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3367</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:00 </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3365</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:40 </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Udon-Thani-UTH/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a></span>
                    </td>
                  </tr>
                </table>

    <!--KBV-DMK-->
               <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Krabi (KBV) - Bangkok Don Mueang (DMK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3170</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3164</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3166</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3168</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Krabi-KBV/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                      <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a></span>
                    </td>
                  </tr>
                </table>

    <!--KOP-DMK-->
               <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Nakhon Phanom (KOP) - Bangkok Don Mueang (DMK)</b></strong></div>
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
                    <td width="22%" nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3271</div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:25</div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:45</div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3397</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">28 Oct - 30 Mar</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Nakhon-Phanom-KOP/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a></span>
                    </td>
                  </tr>
                </table>

    <!--NAW-DMK-->
               <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Narathiwat (NAW) - Bangkok Don Mueang (DMK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3152</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Narathiwat-NAW/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:</span></td>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3201</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3205</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Nakon-Si-Tham-NST/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a></span>
                    </td>
                  </tr>
                </table>

    <!--CNX-HKT-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Chiang Mai (CNX) - Phuket (HKT)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3975</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3977</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">00:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Chiang-Mai-CNX/Phuket-HKT');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a></span>
                    </td>
                  </tr>
                </table>

    <!--UBP-HKT-->  
               <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Ubon Ratchathani (UBP) - Phuket (HKT)</b></strong></div></td>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3961</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Ubon-Ratchathani-UBP/Phuket-HKT');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:</span></td>
                  </tr>
                </table>

    <!--UTH-HKT-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Udon Thani (UTH) - Phuket (HKT)</b></strong></div></td>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3895</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Udon-Thani-UTH/Phuket-HKT');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:</span></td>
                    </tr>
                </table>

    <!--CNX-HDY--> 
               <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Chiang Mai (CNX) - Hat Yai (HDY)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">FD3415</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">01 Octr - 27 Oct</div></td>
                  </tr>
                  <tr>
                    <td class="price_booking" style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;">
                      <a href="<?php echo base_url('airline/inquiry/Air-Asia/Chiang-Mai-CNX/Hat-Yai-HDY');?>" target="blank" title="Book Air Asia Ticket"
                       class="button small booking" style="width:135px; font-size:150%; margin-top:5px; margin-left:5px;" type="submit" value="จองตั๋วเครื่องบิน">จองตั๋วเครื่องบิน
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:</span></td>
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