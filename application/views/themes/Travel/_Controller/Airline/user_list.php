<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <title><?php echo "จองตั๋วเครื่องบิน U As Travel - Thai Airways" ;?></title>
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
              <option value="<?php echo base_url('airline/list/thaiairways');?>" selected>Thai Airways</option>
              <option value="<?php echo base_url('airline/list/nokair');?>">Nok Air</option>
              <option value="<?php echo base_url('airline/list/airasia');?>">Air Asia</option>
              <option value="<?php echo base_url('airline/list/orientthai');?>">Orient Thai</option>
              <option value="<?php echo base_url('airline/list/bangkokairways');?>">Bangkok Airways</option>
          </select>
          </div>
          <div class="one columns">           
          </div>
          <div class="four columns">
            <img src="<?php echo base_url('themes/Travel/images/ThaiAirways.png');?>" />
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

     <!--BKK-KKC-->         
              <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Suvarnabhumi (BKK) - KhonKaen (KKC) </b></strong></div>
                      <div align="center"></div>
                      <div align="center"></div>
                      <div align="center"></div>
                      <div align="center"></div>
                    </td>
                  </tr>
                  <tr>
                    <td width="22%" nowrap class="frame_header_3"><div align="center"><strong style="font-size:120%;">Day</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center"><strong style="font-size:120%;">Flight </strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center"><strong style="font-size:120%;">Dep.</strong></div></td>
                    <td width="18%" nowrap class="frame_header_4"><div align="center"><strong style="font-size:120%;">Arr.</strong></div></td>
                    <td width="24%" nowrap class="frame_header_4"><div align="center"><strong style="font-size:120%;">Between</strong></div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG040</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG044</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Th,F,S</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG042</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG046</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Bangkok-Suvarnabhumi-BKK/KhonKaen-KKC');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:</span>
                    </td>
                  </tr>
                </table>

       <!--BKK-UBP-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Suvarnabhumi (BKK) - UbonRatchathani (UBP)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG030</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Bangkok-Suvarnabhumi-BKK/UbonRatchathani-UBP');?>"  target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp;
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a>&nbsp;| 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

      <!--BKK-UTH-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Suvarnabhumi (BKK) - Udon Thani (UTH)</strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG002</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG010</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG014</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Bangkok-Suvarnabhumi-BKK/Udon-Thani-UTH');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp;
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a>&nbsp;| 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

      <!--BKK-CNX-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Suvarnabhumi (BKK) - Chiang Mai (CNX)</b></strong></div></td>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG102</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG106</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG110</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG114</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG116</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG120</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG122</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Th,F</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG121</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Bangkok-Suvarnabhumi-BKK/Chiang-Mai-CNX');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a> | 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

        <!--BKK-CEI-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Suvarnabhumi (BKK) - Chiang Rai (CEI)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG130</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">xT,W</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG134</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG140</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Bangkok-Suvarnabhumi-BKK/Chiang-Rai-CEI');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                     
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp;
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a> | 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

      <!--BKK-HDY-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Suvarnabhumi (BKK) - Hat Yai (HDY) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG231</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">06:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">7:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">XSU</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG233</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG035</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG237</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Bangkok-Suvarnabhumi-BKK/Hat-Yai-HDY');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a> |  
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

        <!--BKK-KBV-->
               <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;"> Bangkok Suvarnabhumi (BKK) - Krabi (KBV)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG241</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09 Aug - 16 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">T,Th,F,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG245</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09 Aug - 16 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG249</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09 Aug - 15 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Th</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG249</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16 Aug</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Bangkok-Suvarnabhumi-BKK/Krabi-KBV');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a>&nbsp;| 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

        <!--BKK-URT-->
               <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Suvarnabhumi (BKK) - Surat Thani (URT) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG253</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09 Aug - 15 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG257</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09 Aug - 15 Aug</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Bangkok-Suvarnabhumi-BKK/Surat-Thani-URT');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp;
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a>&nbsp;| 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

        <!--BKK-HKT-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
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
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG201</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG203</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:55 </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG205</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">M,T,Th,S</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG211</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG215</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG217</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG221</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG223</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Th,F</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG485</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">23:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG225</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">23:59</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Bangkok-Suvarnabhumi-BKK/Phuket-HKT');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a> |  
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

        <!--BKK-USM-->
                <table class="twelve" style="margin-top:56px;">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Bangkok Suvarnabhumi (BKK) - Koh Samui (USM) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG281</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG287</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Bangkok-Suvarnabhumi-BKK/Koh-Samui-USM');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a></span>
                    </td>
                  </tr>
                </table>
              
        <!--CNX-HKT-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;"> Chiang Mai (CNX)- Phuket (HKT) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG129</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Chiang-Mai-CNX/Phuket-HKT');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp;
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

        
               

              </div>
            <!--End Column 1-->

            <!--Column 2-->
              <div class="six columns">

      <!--KKC-BKK--> 
               <table class="twelve">
                 <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Khon Kaen (KKC) - Bangkok Suvarnabhumi (BKK) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG041</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG045</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Th,F,S</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG043</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG047</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Khon-Kaen-KKC/Bangkok-Suvarnabhumi-BKK');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:</span>
                    </td>
                  </tr>
                </table>

        <!--UBP-BKK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">UbonRatchathani (UBP) - Bangkok Suvarnabhumi (BKK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG031</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:45 </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/UbonRatchathani-UBP/Bangkok-Suvarnabhumi-BKK');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp;
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a>&nbsp;| 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

      <!--UTH-BKK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Udon Thani (UTH) - Bangkok Suvarnabhumi (BKK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG003</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:00 </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:00 </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG011</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG015</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Udon-Thani-UTH/Bangkok-Suvarnabhumi-BKK');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp;
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a>&nbsp;| 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

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
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG123</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:10 </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG103</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">M,Th</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG111</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG115</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG117</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Th,F</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG121</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Chiang-Mai-CNX/Bangkok-Suvarnabhumi-BKK');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a> | 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Orient Thai/One-Two-Go Flight Schedule" target="_blank">OX</a> | 
                      <a href="<?php echo base_url('airline/list/orientthai');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

        <!--CEI-BKK-->
                <table class="twelve" style="margin-top:94px;">
                  <tr bgcolor="#EFF7FF">
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Chiang Rai (CEI) - Bangkok Suvarnabhumi (BKK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG131</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">xT,W</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG135</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG141</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:45</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Chiang-Rai-CEI/Bangkok-Suvarnabhumi-BKK');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp;
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a> | 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

        <!--HDY-BKK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Hat Yai (HDY) - Bangkok Suvarnabhumi (BKK) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG232</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">xSU</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG234</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG236</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG238</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:15</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Hat-Yai-HDY/Bangkok-Suvarnabhumi-BKK');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a> | 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

        <!--KBV-BKK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:130%;">Krabi (KBV) - Bangkok Suvarnabhumi (BKK)</b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG242</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09 Aug - 16 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">T,Th,F,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG246</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09 Aug - 16 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG250</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09 Aug - 15 Aug</div></td>
                    </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Th</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG250</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:20</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16 Aug</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Krabi-KBV/Bangkok-Suvarnabhumi-BKK');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a>&nbsp;| 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table> 

        <!--URT-BKK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF" >
                    <td colspan="5">
                      <div align="left"><strong><b style="font-size:120%;">Surat Thani (URT) - Bangkok Suvarnabhumi (BKK) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG254</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09 Aug - 15 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG258</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:55 </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:05 </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09 Aug - 15 Aug</div></td>
                    </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Surat-Thani-URT/Bangkok-Suvarnabhumi-BKK');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines:&nbsp;
                      <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a>&nbsp;| 
                      <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                    </td>
                  </tr>
                </table>

        <!--HKT-BKK-->
                <table class="twelve">
                  <tr bgcolor="#EFF7FF">
                    <td  colspan="5">
                      <div align="left"><strong><b style="font-size:120%;"> Phuket (HKT) - Bangkok Suvarnabhumi (BKK) </b></strong></div>
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
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG226</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">07:25 </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:50 </div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG202</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG204</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG206</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">12:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG208</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">14:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG214</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">F,S</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG486</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG216</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:50</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG218</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:00</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:25</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG222</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:40</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">M,W,F,Su</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG224</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">22:55</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Phuket-HKT/Bangkok-Suvarnabhumi-BKK');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a> | 
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
                      <div align="left"><strong><b style="font-size:130%;">Koh Samui (USM) - Bangkok Suvarnabhumi (BKK) </b></strong></div>
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
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;" class="font_small font_small style3">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG282</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:30</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">10:35</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">TG288</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:05</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:10</div></td>
                    <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">Start 09 Aug</div></td>
                  </tr>
                  <tr>
                    <td align="center" nowrap class="frame_header_3">
                      <a href="<?php echo base_url('airline/inquiry/Thai-Airways/Koh-Samui-USM/Bangkok-Suvarnabhumi-BKK');?>" target="blank" title="Book Thai Airways Ticket">
                        <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Thai Airways Ticket" rel="nofollow"></center>                      
                      </a>
                    </td>
                    <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                      <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a></span>
                    </td>
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