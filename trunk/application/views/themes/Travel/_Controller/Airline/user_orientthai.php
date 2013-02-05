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
  <title><?php echo "จองตั๋วเครื่องบิน U As Travel - Orient Thai" ;?></title>
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
              <option value="<?php echo base_url('airline/list/nokair');?>">Nok Air</option>
              <option value="<?php echo base_url('airline/list/airasia');?>">Air Asia</option>
              <option value="<?php echo base_url('airline/list/orientthai');?>" selected>Orient Thai</option>
              <option value="<?php echo base_url('airline/list/bangkokairways');?>">Bangkok Airways</option>
          </select>
          </div>
          <div class="one columns">           
          </div>
          <div class="four columns">
            <img src="<?php echo base_url('themes/Travel/images/orientthai.png');?>" />
          </div>
        </div>
      </div>
      <br/>
      <div class="border"></div>
      <!-- Header End -->


  <!--Row 1-->
      <div class="row">
        <div class="twelve columns">
          <!--Column 1-->
        
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
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">OX8120</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">08:15</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:25</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">-</div></td>
                    </tr>
                    <tr>
                      <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">OX8124</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:35</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">16:35</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">-</div></td>
                    </tr>
                    <tr>
                      <td align="center" nowrap class="frame_header_3">
                        <a href="<?php echo base_url('airline/inquiry/Orient-Thai/Bangkok-Don-Mueang-DMK/Chiang-Mai-CNX');?>" target="blank" title="Book Orient Thai(One-Two-Go) Ticket">
                          <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Orient Thai (One-Two-Go) Ticket"></center>
                        </a>
                      </td>
                      <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                        <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                        <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a> | 
                        <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a> | 
                        <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                      </td>
                    </tr>
                  </table> 

          <!--DMK-HKT-->
                  <table class="twelve">
                    <tr bgcolor="#EFF7FF">
                      <td colspan="5">
                        <div align="left"><strong><b style="font-size:130%;">Bangkok Don Mueang (DMK) - Phuket (HKT)</b></strong></div>
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
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">OX8221</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:50</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:05</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">-</div></td>
                      </tr>
                    <tr>
                      <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">OX8223</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">19:00</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:20</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">-</div></td>
                      </tr>
                    <tr>
                      <td align="center" nowrap class="frame_header_3">
                        <a href="<?php echo base_url('airline/inquiry/Orient-Thai/Bangkok-Don-Mueang-DMK/Phuket-HKT');?>" target="blank" title="Book Orient Thai(One-Two-Go) Ticket">
                          <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Orient Thai (One-Two-Go) Ticket"></center>                        
                      </a>
                      </td>
                      <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                        <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                        <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a> | 
                        <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a> | 
                        <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                      </td>
                    </tr>
                  </table>
            
        </div>
        <!--End Column 1-->

        <!--Column 2-->
        <div class="six columns">

                  <table class="twelve">
                    <tr bgcolor="#EFF7FF">
                      <td  colspan="5">
                        <div align="left"><strong><b style="font-size:130%;"> Chiang Mai (CNX) - Bangkok Don Mueang (DMK)</b></strong></div>
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
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">OX8121</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">09:55</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">11:05</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">-</div></td>
                      </tr>
                    <tr>
                      <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">OX8125</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">17:10</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">18:25</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">-</div></td>
                      </tr>
                    <tr>
                      <td align="center" nowrap class="frame_header_3">
                        <a href="<?php echo base_url('airline/inquiry/Orient-Thai/Chiang-Mai-CNX/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Orient Thai(One-Two-Go) Ticket">
                          <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Orient Thai (One-Two-Go) Ticket"></center>                        
                      </a>
                      </td>
                      <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                        <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                        <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a> | 
                        <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a> | 
                        <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span>
                      </td>
                      </tr>
                  </table>

      <!--HKT-DMK-->
                  <table class="twelve">
                    <tr bgcolor="#EFF7FF">
                      <td colspan="5">
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
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">OX8220</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">13:40</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">15:00</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">-</div></td>
                      </tr>
                    <tr>
                      <td nowrap class="frame_header_3"><div align="center" style="font-size:120%;">Daily</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">OX8222</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">20:50</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">21:10</div></td>
                      <td nowrap class="frame_header_4"><div align="center" style="font-size:120%;">-</div></td>
                      </tr>
                    <tr>
                      <td align="center" nowrap class="frame_header_3">
                        <a href="<?php echo base_url('airline/inquiry/Orient-Thai/Phuket-HKT/Bangkok-Don-Mueang-DMK');?>" target="blank" title="Book Orient Thai(One-Two-Go) Ticket">
                          <center><img  border="no" src="<?php echo base_url('themes/Travel/tour/images/button_book.jpg');?>" 
                          width="50" height="20" alt="Book Orient Thai (One-Two-Go) Ticket"></center>                        
                      </a>
                      </td>
                      <td colspan="4" class="frame_header_3"><span class="style11" style="font-size:120%;">Alternative Airlines: 
                        <a href="<?php echo base_url('airline/list/thaiairways');?>" title="Thai Airways Flight Schedule" target="_blank">TG</a> | 
                        <a href="<?php echo base_url('airline/list/bangkokairways');?>" title="Bangkok Airways Flight Schedule" target="_blank">PG</a> | 
                        <a href="<?php echo base_url('airline/list/nokair');?>" title="Nok Air Flight Schedule" target="_blank">DD</a> | 
                        <a href="<?php echo base_url('airline/list/airasia');?>" title="Air Asia Flight Schedule" target="_blank">FD</a></span></td>
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
  <!-- Form End -->c

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