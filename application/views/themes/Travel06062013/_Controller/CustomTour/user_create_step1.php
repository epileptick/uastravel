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
  <link rel="stylesheet" href="<?php echo $stylepath.'/customtour.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/app.css';?>">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
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
            <h1>จัดทัวร์ในแบบของคุณ!</h1>
          </div>
          <div class="alert alert-info">
            <h2>จัดโปรแกรมท่องเที่ยวได้วยด้วยตัวท่าเอง ง่ายๆ แค่ 3 ขั้นตอน</h2>
            <p>ยินดีต้อนรับเข้าสู้ระบบการจัดทัวร์ออนไลน์แห่งแรกของประเทศไทย ที่จะทำให้คุณจัดทัวร์และม่องเที่ยวไปในสถานที่ที่คุณชื่นชอบได้แบบไม่มีขีดจำกัด นี่คือก้าวแรกของการออกเที่ยวอย่างไม่มีขีดจำกัด เพียงแค่ท่านเลือกทัวร์ที่ต้องการ จัดการทัวร์ได้อย่างอิสระ เพียงเท่านี้ก็สนุกไปกับการท่องเที่ยวได้แล้ว!</p>
            <ol class="list_step_customtour">
              <li>กรอกข้อมูลการเดินทาง</li>
              <li>จัดการเลือกทัวร์/กรอกข้อมูลโรงแรมและห้องพัก</li>
              <li>เห็นงบประมาณและสามารถจองได้ทันที</li>
            </ol>
          </div>
          <div class="border"></div>
          <a href="<?php echo base_url("customtour/create/step2"); ?>" class="btn btn-success pull-right btn-large btn-next">ถัดไป <img src="<?php echo $imagepath."/next.png";?>"/></a>
        </div>
      </section>
    </div>

    {_include footer}
    <!-- End Gallery -->
  </div>

</body>
</html>