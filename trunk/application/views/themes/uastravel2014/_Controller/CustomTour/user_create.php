    <link rel="stylesheet" href="<?php echo $stylepath.'/user_create/customtour.css';?>">
	  <link rel="stylesheet" href="<?php echo $stylepath.'/user_create/userstyle.css';?>">

	 <div class="row">
    <div class="col-md-12">
      <section class="article darg_packet">
        <div class="page-header">
          <h1>เริ่มต้นการจัดทัวร์ด้วยตัวท่านเอง!</h1>
        </div>
        <div class="row">
          <div class="col-md-8 mobile-three columns">
            <form name="package_customize"
                  id="form_package_customize"
                  action="<?php echo base_url('customtour/add');?>"
                  method="post"
            >
            <?php
            foreach ($session as $key => $value) {
              ?>
              <input type="hidden" name="customtour[<?php echo $key;?>]" value="<?php echo $value;?>">
              <?php
            }
            ?>
            <div class="packet">
              <div class="control-group info">
                <label class="control-label" for="inputWarning"></label>
                  <div class="controls">
                    <input type="text" class="form-control" placeholder="กรุณาใส่ชื่อทัวร์ของคุณก่อนนะคะ" name="packageName">
                  </div>
                  <br />
              </div>
              <?php
              if(!empty($session["totalday"])){
                for($i=1;$i<=$session["totalday"];$i++) {
                  ?>
                    <div class="packet_item" number="<?php echo $i;?>">
                      <div class="sticker_date">วันที่ <?php echo $i;?></div>
                      <ul class="connected list no1">
                      </ul>
                      <!--
                      <a class="close tooltip_ne" title="ลบ"></a>
                      -->
                    </div>
                  <?php
                }
              }
              
              ?>

            </div>
            <div class="abstract">
              <div class="row">
                <div class="six columns">
                  <h4>สรุปข้อมูลทัวร์</h4>
                  <ul class="summary_section">
                    <li>
                      จำนวนวัน <span id="summary_day">1</span> วัน /
                      <span id="summary_night">0</span> คืน
                    </li>
                  </ul>
                </div>
                <div class="six columns">
                  <h4>สรุปราคา</h4>
                  <ul class="summary_section">
                    <li>
                      <?php
                      if(!empty($session["adult"])){
                        ?>
                          ราคาสำหรับผู้ใหญ่ <span id="summary_adult_price_person">0</span> บาท/ท่าน
                        <?php
                      }
                      ?>
                      <br>
                      <?php
                      if(!empty($session["child"])){
                        ?>
                          ราคาสำหรับเด็ก <span id="summary_child_price_person">0</span> บาท/ท่าน
                        <?php
                      }
                      ?>
                    </li>

                    <?php
                    if(!empty($session["adult"])){
                      ?>
                      <li>
                        ราคาสำหรับผู้ใหญ่ <?php echo $session["adult"];?> ท่าน <br/>รวมทั้งสิ้น <span id="summary_adult_price">0</span> บาท
                      </li>
                      <?php
                    }
                    ?>
                    <?php
                    if(!empty($session["child"])){
                      ?>
                      <li>
                        ราคาสำหรับเด็ก <?php echo $session["child"];?> ท่าน <br/>รวมทั้งสิ้น <span id="summary_child_price">0</span> บาท
                      </li>
                      <?php
                    }
                    ?>
                    
                  </ul>
                  <h4>ราคารวมทั้งสิ้น <span id="summary_price">0</span> บาท</h4>
                </div>
              </div>
            </div>
            <p class="action_button">
                <a class="btn btn-danger" href="<?php echo base_url("customtour/create/step2") ;?>">ย้อนกลับ</a>
                <a class="btn clear_date">เคลียทั้งหมด</a>
                <a class="btn add_date">เพิ่มวัน</a>

                <!-- Booking data -->
                <input type="hidden" name="id" value=""></input>
                <input class="btn btn-success"  type="submit" value="จัดทัวร์">
              
            </p>
            </form>
          </div>

          <div class="col-md-4 mobile-one columns sticky_content">
          <div class="tabs">
            <div class='tabs-container'>
              <!-- Tour -->
              <div id="tabs1">
                <h4 id="breadcrumb_menu"><?php echo $this->lang->line("global_lang_tour");?></h4>
                <div class="tag" id="menuList">
                  <select name='province_tag_id' id='province_tag_id' class="form-control">
                    <option value="0" selected data-tag-id="0">ทุกจังหวัด</option>
                    <?php
                      foreach ($menuList as $key => $value) {
                    ?>
                        <option value="<?php echo $value["tag_id"];?>" data-full-url="<?php echo $value["full_url"];?>" data-tag-id="<?php echo $value["tag_id"];?>" data-parent-id="<?php echo $value["parent_id"];?>">
                          <?php echo $value["name"];?>
                        </option>
                    <?php
                      }
                    ?>
                 </select>
                </div>
                <br />
                <div class="tag" id="groupList">
                  <select name='group_tag_id' id='group_tag_id' class="form-control">
                        <option value="0" selected data-tag-id="0">ประเภททัวร์</option>
                  </select>
                </div>

                <h4 class="search_package">รายการทัวร์</h4>
                <div class="scrollbar">
                  <div class="nano">
                    <div class="content">
                      <ul class="connected list no2" id="data">
                        <h4 class="alert alert-info text-center">โปรดเลือกจังหวัดและประเภททัวร์</h4>
                      <div class="clearfix"></div>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- END scrollbar -->
              </div>
              <!-- END tabs1 -->
              <!-- End Tour-->
            </div>
          </div>
          </div>
        </div>

      </section>
    </div>
    </div>
    <!--
    <?php
      if(!empty($tours["tour"]))
      foreach ($tours["tour"] as $key => $value) {
    ?>
      <div id="myTourModal_<?php echo $value['tour']["tour_id"]; ?>" class="reveal-modal [expand, xlarge, large, medium, small]">
        <?php echo $value['tour']["detail"]; ?>
        <a class="close-reveal-modal">&#215;</a>
      </div>

    <?php
      }
    ?>
    -->
<link rel="stylesheet" type="text/css" href="<?php echo $jspath;?>/powertip/jquery.powertip.css" />

<?php PageUtil::addVar("javascript_body",'<script type="text/javascript" src="'.$jspath.'/powertip/jquery.powertip.js"></script>

<script src="'.$jspath.'/jquery.validate.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var defaults = {
      containerID: \'moccaUItoTop\', // fading element id
      containerHoverClass: \'moccaUIhover\', // fading element hover class
      scrollSpeed: 1200,
      easingType: \'linear\'
    };

    // placement examples
    $(\'.tooltip_n\').powerTip({placement: \'n\'});
    $(\'.east\').powerTip({placement: \'e\'});
    $(\'.south\').powerTip({placement: \'s\'});
    $(\'.west\').powerTip({placement: \'w\'});
    $(\'.tooltip_nw\').powerTip({placement: \'nw\'});
    $(\'.tooltip_ne\').powerTip({placement: \'ne\'});
    $(\'.south-west\').powerTip({placement: \'sw\'});
    -
    $(\'.tooltip_se\').powerTip({placement: \'se\'});

    var offset = $(".sticky_content").offset();
    var topPadding = 0;
    $(window).scroll(function () {
      if ($(window).scrollTop() > offset.top) {
        $(".sticky_content").stop().animate({
          marginTop: $(window).scrollTop() - offset.top + topPadding
        });
      } else {
        $(".sticky_content").stop().animate({
          marginTop: 0
        });
      }

    });
    $(window).resize(function(){
        var newheight = $(window).height();      
        $(".nano .content").height(newheight-200);
        $(".scrollbar").height(newheight-200);
    });
    $("#buttonForModal").click(function() {
      $("#myModal").reveal();
    });

    $("#menuList, #groupList").on("change","select",function(e){
      e.preventDefault();
      var selected = $(this).find(\'option:selected\');
      var group_selected_id = $("#group_tag_id").find(\'option:selected\').data("tag-id");
      //Response
      var responseData = getMenuList($("#province_tag_id").find(\'option:selected\').data("tag-id"),$("#group_tag_id").find(\'option:selected\').data("tag-id"));
      $(\'#data\').html("<div style=\"text-align:center;\"><img src=\"/themes/uastravel2014/images/ajax-loader.gif\\" /></div>");
      responseData.done(function(data) {
        var obj = jQuery.parseJSON(data);
        if(obj.menuList){
          if(Object.keys(obj.menuList).length > 0){
            var groupListHTML = "<option value=\"0\" data-tag-id=\"0\">ทั้งหมด</option>";
            var selected_or_not = "";
            $.each(obj.menuList,function(index, item){
              if(group_selected_id == item.tag_id){
                selected_or_not = "selected";
              }else{
                selected_or_not = "";
              }
              groupListHTML += "<option value=\""+item.tag_id+"\" data-full-url=\""+item.full_url+"\" data-tag-id=\""+item.tag_id+"\" data-parent-id=\""+item.parent_id+"\" "+selected_or_not+">"+item.name+"</option>";
            });
            $(\'#group_tag_id\').html(groupListHTML);
          }
        }
        $(\'#data\').hide().html(obj.packageTourList).fadeIn("slow");
        $("#data").append(function(){
          setDragAndDropDataForExternalFile();
          setDateDataForExternalFile();
        });
      });
      return false;
    });
    setDragAndDropDataForExternalFile();
  });

  function setDateDataForExternalFile(){
    $(".add").click(function() {
      alertify.set({ delay: 2000 });
      alertify.prompt("เลือกวันที", function (e, str) {
          if (e) {
            alertify.success("สำเร็จ " + str);
          } else {
            alertify.error("ยกเลิก");
          }
        });
        return false;
    });
  }

  function tag_filter(model, firsttag_id, secondtag_id, thirdtag_id){
      var data =  {
                    model : model,
                    firsttag_id: firsttag_id,
                    secondtag_id: secondtag_id ,
                    thirdtag_id: thirdtag_id
                  };
      var url = "ajax/tourfilter/tag";

      return  $.post(url, data);
  }

  function data_filter(model, firsttag_id, secondtag_id, thirdtag_id){
      var data =  {
                    model : model,
                    firsttag_id: firsttag_id,
                    secondtag_id: secondtag_id ,
                    thirdtag_id: thirdtag_id
                  };
      var url = "ajax/tourfilter/data";

      return  $.post(url, data);
  }

  function getMenuList(tag_id,type_id){
      var data =  {
                    tag_id : tag_id,
                    type_id : type_id
                  };
      var url = "'.base_url("customtour/ajax/get_menu_list").'";

      return  $.post(url, data);
  }

  function setDragAndDropDataForExternalFile(){
    $(function() {
      $(\'.connected\').sortable({
        connectWith: \'.connected\',
        items: ".sortable_item",
        forcePlaceholderSize: true,
        distance: 30,
        revert: true,
        start: function(event, ui){
          $(ui.item).find("input").attr("dragging","true");
          $(ui).children(".package_price_list").fadeOut("slow");
          $(".packet_item").each(function(list_index, list_item) {
            if($(list_item).find("li input").attr("value") == $(ui.item).find("input").attr("value") && $(list_item).find("li input").attr("dragging") == "false"){
              $(list_item).find("li").fadeOut("slow",function(){
                $(this).remove();
              });
            }
          });
        },
        stop: function(event, ui){
          $(ui.item).find("input").attr("dragging","false");
          $(ui).children(".package_price_list").fadeIn("slow");
          $(".packet_item").each(function(index, item) {
            if($(this).find("li").length > 1){
              var count_day = 0;
              $(this).find("li .item_property").each(function(index, item) {
                count_day = count_day+parseFloat($(item).attr("totalday"));
              });
              if(count_day > 1){
                alertify.error("ไม่สามารถเพิ่มทัวร์ได้เนื่องจากเกินเวลาที่กำหนดค่ะ")
                $(ui.item).fadeOut("slow",function(){
                  $(this).prependTo("#tabs1 .connected.no2");
                  $(this).fadeIn("slow");

                });
              }
            }
          });
          setCustomTourData(ui.item);
        }
      }).disableSelection();
      $(".sortable_item").disableSelection();
    });
  }

  function setCustomTourData(thisObj){
    //Drag&drop item
    var itemHtml = thisObj.html();
    var Looped = false;
    var packageDay = $(thisObj).find("input").attr("totalday");
    if(packageDay > 1){
      var objID = $(thisObj).find(".item_property").attr("value");
      $(".packet_item").each(function(list_index, list_item) {
        if($(list_item).find("li .item_property").attr("value") == objID){
          $(list_item).find(".price_list").each(function(index, item){
            var current_status = $(item).prop(\'checked\');
            var price_id = $(item).data("price-id");
            $(thisObj).find(".price_list[data-price-id=\'" + price_id + "\']").each(function(index, item){
              $(item).prop(\'checked\', current_status);
            });
          });
        }
        if($(list_item).find("li input").attr("value") == objID && !Looped){
          Looped = true;
          for(var i = 1; i<packageDay;i++){
            if($(".packet_item:eq("+parseInt((parseInt(list_index)+parseInt(i)))+")").find("li input").attr("value") != objID){
              if($(".packet_item:eq("+parseInt((parseInt(list_index)+parseInt(i)))+")").length == 0 || $(".packet_item:eq("+parseInt((parseInt(list_index)+parseInt(i)))+")").find("li").length > 0){
                var html = \'<div class="packet_item" style="display:none"></a>\';
                    html += \'<div class="sticker_date"></div>\';
                    html += \'<ul class="connected list no1">\';
                    html += \'<li draggable="true" class="sortable_item" style="display: list-item;">\';
                    html += itemHtml;
                    html += \'</li>\';
                    html += \'</ul>\';
                    html += \'<a class="close tooltip_ne" title="ลบ"></a></div>\';
                    $(list_item).after(html).append(function(){
                      setDragAndDropDataForExternalFile();
                      setDateDataForExternalFile();
                    });
              }else{
                var html = \'<li draggable="true" class="sortable_item" style="display: list-item;">\';
                    html += itemHtml;
                    html += \'</li>\';
                $(".packet_item:eq("+parseInt((parseInt(list_index)+parseInt(i)))+") ul").append(html).fadeIn("slow");
              }
            }
          }
          $(".packet_item").fadeIn("slow");
        }
      });
    }
    updateAllPackage();
  }

  $(".add_date").click(function() {
    addDate();
  });
  $(".clear_date").click(function() {
    clearDate();
    updateTab();
    window.setTimeout(updateAllPackage, 1000);
  });

  function clearDate(item){
    $(".packet_item").each(function(list_index, list_item) {
      $(list_item).find("li").fadeOut("slow", function(){
        $(this).remove();
        alertify.success("เคลียร์สำเร็จ!");
      });
    });
  }

  function addDate(item){
    if(item){
      //Init with data
      var html = \'<div class="packet_item" style="display:none"></a>\';
      html += \'<div class="sticker_date">วันที่ \'+countDayDisplay+\'</div>\';
      html += \'<ul class="connected list no1">\';
      html += \'<li draggable="true" class="" style="display: list-item;">\';
      html += item;
      html += \'</li>\';
      html += \'</ul>\';
      html += \'<a class="close tooltip_ne" title="ลบ"></a></div>\';
      $(\'.packet\').append(html);
      $(\'.tooltip_ne\').powerTip({placement: \'ne\'});
      $(".packet_item").fadeIn("slow");
      $(\'.connected\').sortable({
        connectWith: \'.connected\'
      });
    }else{
      //Init without data
      var html = \'<div class="packet_item" style="display:none"></a>\';
      html += \'<div class="sticker_date"></div>\';
      html += \'<ul class="connected list no1"></ul>\';
      html += \'<a class="close tooltip_ne" title="ลบ"></a></div>\';
      $(\'.packet\').append(html);
      $(\'.tooltip_ne\').powerTip({placement: \'ne\'});
      $(".packet_item").fadeIn("slow");
      $(\'.connected\').sortable({
        connectWith: \'.connected\'
      });
    }
    alertify.success("เพิ่มวันสำเร็จ!");
    window.setTimeout(updateAllPackage, 800);
  }

  $(document).ready(function() {
    $(".packet").on("click", ".packet_item a.close", function (e) {
      alert("Bang!!");
      e.preventDefault();

      var isInList = false;
      $(this).closest(".packet_item").fadeOut(function () {
        $(this).find(".no1 li").fadeOut(function () {
          isInList = false;
          $(this).find("input:first").each(function(index, item) {
            packageid = $(item).attr(\'packageid\');
          });
          $("#tabs1 .connected.no2").find("li").each(function(index, no2Item) {
            $(no2Item).find("input:first").each(function(index, inputItem) {
              if($(inputItem).attr(\'packageid\') == packageid){
                isInList = true;
              }
            });
          });
          if(!isInList){
            $(this).prependTo("#tabs1 .connected.no2");
            $(this).fadeIn("slow");
          }else{
            $(this).remove();
          }
          $(".packet_item").find("li").each(function(index, inputItem) {
            if($(inputItem).find(\'input:first\').attr(\'packageid\') == packageid){
              $(inputItem).fadeOut("slow", function() {
                $(this).remove();
              });
            }
          });
        });
        $(this).remove();
      });
      deleteDate();
    });

    $(document).on("click", ".connected li a.delete", function (e) {
      e.preventDefault();
      var isInList = false;
      $(this).closest(".connected li").fadeOut(function () {
        isInList = false;
        $(this).find("input:first").each(function(index, item) {
          packageid = $(item).attr(\'packageid\');
        });
        $("#tabs1 .connected.no2").find("li").each(function(index, no2Item) {
          $(no2Item).find("input:first").each(function(index, inputItem) {
            if($(inputItem).attr(\'packageid\') == packageid){
              isInList = true;
            }
          });
        });
        if(!isInList){
          $(this).prependTo("#tabs1 .connected.no2");
          $(this).fadeIn("slow");
        }else{
          $(this).remove();
        }
        $(".packet_item").find("li").each(function(index, inputItem) {
          if($(inputItem).find(\'input:first\').attr(\'packageid\') == packageid){
            $(inputItem).fadeOut("slow", function() {
              $(this).remove();
            });
          }
        });
      });
      var packageid = $(this).attr(\'packageid\');
      deletePackageItem();
    });
  });

  function deletePakckageFromDisplay(thisObj){
    thisObj.closest(".connected li").fadeOut(function () {
      thisObj.prependTo(".connected.no2");
      thisObj.fadeIn("slow");
    });
  }

  function deletePackageItem(){
    window.setTimeout(updateAllPackage, 1000);
  }


  function deleteDate(){
    window.setTimeout(updateAllPackage, 1000);
  }

  function updateAllPackage(){
    updatePackgaeDate();
    updateDayOptions();
    updatePackageInput();
    summaryDisplay();
  }


  function updatePackageInput(){
    $(".packet_item").each(function(index, item) {
      $(item).find(".item_property").each(function(liIndex,liItem){
        $(liItem).attr("name","packagedata["+index+"][]");
      });
    });
  }

  function updateDayOptions(){
    var package_count = $(".packet_item").length;
    $("#day_tour").val(package_count);
    $("span.custom-text:eq(0)").html(package_count);
  }

  function summaryDisplay(){
    var summaryAdultPrice = 0;
    var summaryChildPrice = 0;
    var packagePrice = new Array();

    var total_adult = '.(($session["adult"]=="")? 0 : $session["adult"]).';
    var total_child = '.(($session["child"]=="")? 0 : $session["child"]).';

    $(".packet_item").find("li").each(function(index, item){
      var adult_total_price = 0;
      var child_total_price = 0;

      var currency_text = "'.$this->lang->line("global_lang_money_sign").'";
      $(item).find(".price_list").each(function(){
        var current_status = this.checked;
        if(current_status){
          if($(this).data("is-charter") == 1) {
            adult_total_price += $(this).data("adult-price");
            if(total_child > 0){
              child_total_price += $(this).data("child-price");
            }
          }else{
            adult_total_price += ($(this).data("adult-price")*total_adult);
            if(total_child > 0){
              child_total_price += ($(this).data("child-price")*total_child);
            }
          }
        }
      });
      $(item).find(".item_property").each(function(input_index,input_item){
        $(input_item).data("total-adult-price",(adult_total_price));
        $(input_item).data("total-child-price",(child_total_price));
      });
    });
    $(".packet_item").find(".item_property").each(function(index, item) {
      var isInArray = false;
      $.each(packagePrice, function(index, value) {
        if(value["id"] == $(item).attr(\'packageid\')){
          isInArray = true;
        }
      });
      if(isInArray != true){
        packagePrice.push(priceObject($(item).attr(\'packageid\'),$(item).data(\'total-adult-price\'),$(item).data(\'total-child-price\')));
      }
    });

    $.each(packagePrice, function(index, value) {
      summaryAdultPrice += parseFloat(value.adultprice);
      summaryChildPrice += parseFloat(value.childprice);
    });

    $("#summary_day").text($(".packet_item").length);
    $("#summary_night").text(($(".packet_item").length-1));

    $("#summary_adult_price").text(addCommas(summaryAdultPrice));
    $("#summary_child_price").text(addCommas(summaryChildPrice));

    if(total_adult > 0){
      $("#summary_adult_price_person").text(addCommas((summaryAdultPrice/total_adult)));
    }
    if(total_child > 0){
      $("#summary_child_price_person").text(addCommas((summaryChildPrice/total_child)));
    }
    
    $("#summary_price").html(addCommas(summaryAdultPrice+summaryChildPrice));
  }

  function priceObject(id,adultprice,childprice){
    return {
      id:id,
      adultprice:adultprice,
      childprice:childprice
    }
  }

  function updatePackgaeDate(){
    $(".packet_item").each(function(packet_item_index, packet_item) {
      $(packet_item).append(function(){
        setDragAndDropDataForExternalFile();
        setDateDataForExternalFile();
      });
      $(packet_item).children("div.sticker_date").html("วันที่ "+(packet_item_index+1));
    });
  }

  function updateTab(){
    //Request
    var model = "tour";
    var firsttag_id = $("#firsttag_tour").val();
    var secondtag_id = $("#secondtag_tour").val();
    var thirdtag_id = 0;
    $(\'#thirdtag_tour :checkbox:checked\').each(function() {
      thirdtag_id += $(this).val()+",";
    });

    //Response
    var responseTag = tag_filter(model, firsttag_id, secondtag_id, thirdtag_id);
    responseTag.done(function(data) {
      $(\'#thirdtag_tour\').hide().html(data).fadeIn("slow");
    });

    var responseData = data_filter(model, firsttag_id, secondtag_id, thirdtag_id);

    $(\'#data\').html("<div style=\"text-align:center;\"><img src='.Util::ThemePath().'\'/images/ajax-loader.gif\' /></div>");
    responseData.done(function(data) {
      $(\'#data\').hide().html(data).fadeIn("slow");
      $("#data").append(function(){
          setDragAndDropDataForExternalFile();
          setDateDataForExternalFile();
      });
    });
  }

  function addCommas(nStr){
    nStr += \'\';
    x = nStr.split(\'.\');
    x1 = x[0];
    x2 = x.length > 1 ? \'.\' + x[1] : \'\';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
      x1 = x1.replace(rgx, \'$1\' + \',\' + \'$2\');
    }
    return x1 + x2;
  }

  $(document).ready(function() {
    // validate signup form on keyup and submit
    $("#form_package_customize").validate({
      rules: {
        packageName: \'required\'
      },
      messages: {
        packageName: \'กรุณาใส่ชื่อทัวร์ของคุณก่อนนะคะ\'
      }
    });

    $(document).on("click",".package_price_list tr",function(evt){
      var cell = $(evt.target).closest(\'input\');
      if(cell.index()<0) {
        $(this).find(\'input[type="checkbox"]\').each(function(){
          $(this).prop(\'checked\', !$(this).prop(\'checked\'));
          var current_status = this.checked;
          var current_id = $(this).data("price-id");
          $(".packet_item").each(function(index, item) {
            $(this).find(".price_list[data-price-id=\'" + current_id + "\']").each(function(index, item){
              if(current_status){
                //$(this).parent().parent().find("td").css("font-weight","bold");
                $(this).parent().parent("tr").css("background","#FFF7A0");
              }else{
                //$(this).parent().parent().find("td").css("font-weight","normal");
                $(this).parent().parent("tr").css("background","none");
              }
              $(item).prop(\'checked\', current_status);
              summaryDisplay();
            });
          });
        });
      }
    });

    $(document).on("click",".package_price_list .price_switch",function() {
      if($(this).html() == "แสดงราคา"){
        $(this).html("ซ่อนราคา");
        $(this).parent().find(".price_table").fadeIn( "slow" );
      }else{
        $(this).html("แสดงราคา");
        $(this).parent().find(".price_table").fadeOut( "slow" );
      }
      return false;        
    });

    $(document).on("change",".price_list",function(){
      var current_status = this.checked;
      var current_id = $(this).data("price-id");
      $(".packet_item").each(function(index, item) {
        $(this).find(".price_list[data-price-id=\'" + current_id + "\']").each(function(index, item){
          if(current_status){
            //$(this).parent().parent().find("td").css("font-weight","bold");
            $(this).parent().parent("tr").css("background","#FFF7A0");
          }else{
            //$(this).parent().parent().find("td").css("font-weight","normal");
            $(this).parent().parent("tr").css("background","none");
          }
          $(item).prop(\'checked\', current_status);
          summaryDisplay()
        });
      });
    });



    $(".add").click(function() {
      alertify.set({ delay: 2000 });
      alertify.prompt("เลือกวันที", function (e, str) {
        if (e) {
          alertify.success("สำเร็จ " + str);
        } else {
          alertify.error("ยกเลิก");
        }
      });
      return false;
    });

    $("#day_tour").change(function() {
      var day_tour = $("#day_tour option:selected").val();
      var packet_item = $(".packet_item").length;
      var deleted = 0;
      if(packet_item < day_tour){
        for (var i = 0; i < (day_tour - packet_item); i++) {
          addDate();
        };
      }else if(packet_item > day_tour){
        $(".packet_item").each(function(index, item) {
          if(($(".packet_item").length-deleted) > day_tour){
            if($(this).find("li").length == 0){
              $(this).fadeOut("slow",function(){
                $(this).remove();
              });
              deleted = deleted+1;
            }
          }
        });
      }
      window.setTimeout(updateAllPackage, 1000);
    });

    $(".packet").bind("DOMSubtreeModified", function() {
      updateAllPackage();
    });
    updateAllPackage();
  });
</script>'); ?>