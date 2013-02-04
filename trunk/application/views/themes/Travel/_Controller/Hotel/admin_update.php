
<?php
/////////////////////
//Start Datepicker
////////////////////

//Datepicker CSS
PageUtil::addVar("stylesheet",'<link rel="stylesheet" media="all" type="text/css"  href="http://code.jquery.com/ui/1.8.23/themes/smoothness/jquery-ui.css">');

PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.base_url("themes/Travel/js/datepicker/jquery-ui-timepicker-addon.css").'">');

//Datepicker JQuery
PageUtil::addVar("javascript", '<script type="text/javascript" src="http://code.jquery.com/ui/1.8.24/jquery-ui.min.js"></script>');
PageUtil::addVar("javascript", '<script type="text/javascript" src="'.base_url("themes/Travel/js/datepicker/jquery-ui-timepicker-addon.js").'"></script>');
PageUtil::addVar("javascript", '<script type="text/javascript" src="'.base_url("themes/Travel/js/datepicker/jquery-ui-sliderAccess.js").'"></script>');

/////////////////////
//End Datepicker
////////////////////
  



//Autosuggest && Autocomplete
PageUtil::addVar("javascript", '<script type="text/javascript" src="'.base_url("themes/Travel/js/autocomplete/autocomplete.js").'"></script>');




PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/style/tour.css">');
PageUtil::addVar("stylesheet",'<style type="text/css">@import url('.Util::ThemePath().'/js/plupload/jquery.plupload.queue/css/jquery.plupload.queue.css);</style>');
//PageUtil::addVar("javascript",'<script type="text/javascript" src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>');
PageUtil::addVar("javascript",'<script type="text/javascript" src="'.Util::ThemePath().'/js/plupload/plupload.full.js"></script>');
PageUtil::addVar("javascript",'<script type="text/javascript" src="'.Util::ThemePath().'/js/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>');
PageUtil::addVar("javascript",'<script type="text/javascript">
//Convert divs to queue widgets when the DOM is ready
$(document).ready(function() {
  
  updateImages();
  function updateImages(){
            $.post("'.base_url("/images/ajax_list").'", { parent_id: $("#id").val(),table_id:3 },
            function(data) {
              $("#side_bar_block_image").html(data).hide("slow").delay(200).show("slow");
              $(".image_list").mouseover(function() {
                $(this).find("a").css("display","block");
              }).mouseout(function(){
                $(this).find("a").css("display","none");
              });
              $("#side_bar_block_image img").click(function() {
                $(this).addImg();
              });
              
              $("#side_bar_block_image a").click(function() {
                //$(this).delImg();
                console.log($(this).prop("href"));
                $.post($(this).prop("href"), {},
                  function(data) { 
                    console.log(data);
                    var data = jQuery.parseJSON(data);
                    console.log(data);
                    if(data.success == "1"){
                      updateImages();
                    }
                  }
                );
                return false;
                
              });
              
            });
  }
  
  (function($){
      $.fn.addImg = function(){
          tinyMCE.execCommand(\'mceInsertContent\',false,\'<img src="\'+this.attr(\'src\')+\'"/>\');
      };
  })(jQuery);
  
  //Uploader Control
  $("#btnShow").css("display", "block");
  $("#btnHide").css("display", "none");
  $("#uploader").hide();
  $("#btnHide").click(function() {
    $("#uploader").hide("slow");
    $("#btnShow").css("display", "block");
    $("#btnHide").css("display", "none");
  });
  
  $("#btnShow").click(function() {
    $("#uploader").show("slow");
    $("#btnShow").css("display", "none");
    $("#btnHide").css("display", "block");
    $("#btnHide").addClass("hide-button");
  });
  
  
  $("#uploader").pluploadQueue({
    // General settings
    runtimes : \'html5\',
    url : \''.base_url("/images/ajax_upload").'\',
    max_file_size : \'10mb\',
    chunk_size : \'1mb\',
    unique_names : true,
    
    
    // Resize images on clientside if we can
    //resize : {width : 320, height : 240, quality : 90},

    // Specify what files to browse for
    filters : [
      {title : "Image files", extensions : "jpg,gif,png"},
      {title : "Zip files", extensions : "zip"}
    ],

    // Flash settings
    flash_swf_url : \'/plupload/js/plupload.flash.swf\',

    // Silverlight settings
    silverlight_xap_url : \'/plupload/js/plupload.silverlight.xap\',
    
    init : {
      FilesAdded: function(up, files) {
        //autoSave();
        var $uploader = $("#uploader").pluploadQueue();
        $uploader.settings.multipart_params = {parent_id: $("#id").val(), table_id:3};
      },
      StateChanged: function(up) {
        // Called when the state of the queue is changed
        //log(\'[StateChanged]\', up.state == plupload.STARTED ? "STARTED" : "STOPPED");
        var uploader = $(\'#uploader\').pluploadQueue();
        
        if(up.state == plupload.STOPPED){
          setTimeout(function() {
                $( "#uploader" ).hide(\'slow\').delay(500).show(\'slow\');
                uploader.splice();
                $(".plupload_buttons").css("display", "inline");
                $(".plupload_upload_status").css("display", "inline");
                $(".plupload_start").addClass("plupload_disabled");
                $(".plupload_upload_status").css("display", "none");
                uploader.refresh();
          }, 100 );
          
        }
      },
      
      FileUploaded: function(up, file, info) {
        // Called when a file has finished uploading
        //log(\'[FileUploaded] File:\', file, "Info:", info);
        console.log(info);
        plupload.each(info, function(value, key) {
       
          if(key == "response"){
            var value = jQuery.parseJSON(value);
            if(value.result == "TRUE"){
              updateImages();
            }
          }
        });
        
       
        //$( "#side_bar_block_image" ).delay(100).fadeIn(1000);
        
      }
    }
  });
    
    
});

  
</script>');

?>

<script>
  $(document).ready(function(){
    $('#start_time1').timepicker({
      hourGrid: 4,
      minuteGrid: 10
    });

    $('#end_time1').timepicker({
      hourGrid: 4,
      minuteGrid: 10
    });

    $('#start_time2').timepicker({
      hourGrid: 4,
      minuteGrid: 10
    });

    $('#end_time2').timepicker({
      hourGrid: 4,
      minuteGrid: 10
    });

    $('#start_time3').timepicker({
      hourGrid: 4,
      minuteGrid: 10
    });

    $('#end_time3').timepicker({
      hourGrid: 4,
      minuteGrid: 10
    }); 

    /*
    $('#start_date').datepicker({
      dateFormat: "yy-mm-dd"
    });

    $('#end_date').datepicker({
      dateFormat: "yy-mm-dd"
    }); 
    */


      tinyMCE.init({
          mode : "specific_textareas",
          editor_selector : "mceEditor",
          width: "100%",
          theme : "advanced",
          plugins : "youtube, inlinepopups,autoresize,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
          //theme_advanced_buttons1 : "justifyleft,justifycenter,justifyright,justifyfull",
          //theme_advanced_buttons2: ",tablecontrols,|,images,youtube,|,bold,italic,underline,strikethrough,|,undo,redo,|,cut,copy,paste,|,code",
          theme_advanced_buttons1 : "fullscreen,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
          theme_advanced_buttons2 : "search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
          theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr",
          theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreakcut,|,copy,paste,pastetext,pasteword,|,image,youtube,|",
          theme_advanced_toolbar_align : "left",
          theme_advanced_statusbar_location : "bottom",
          theme_advanced_resizing : false,
          theme_advanced_source_editor_width: 630,
          autoresize_min_height: 200,
          autoresize_not_availible_height: 10,
          autoresize_on_init: true,
          autoresize_hide_scrollbars: false
      });     
  });
</script>


<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
      var geocoder = new google.maps.Geocoder();    
      var markersArray = [];
      var marker;    
      
      function geocodePosition(pos) {
        geocoder.geocode({
          latLng: pos
        }, function(responses) {
          if (responses && responses.length > 0) {
            updateMarkerAddress(responses[0].formatted_address);
          } else {
            updateMarkerAddress('Cannot determine address at this location.');
          }
        });
      }

      function updateMarkerStatus(str) {
        document.getElementById('markerStatus').innerHTML = str;
      }

      function updateMarkerPosition(latLng) {

        document.getElementById("latitude").value = latLng.lat();
        document.getElementById("longitude").value = latLng.lng();


      }

      function updateMarkerAddress(str) {
        document.getElementById('address').value = str;
      }

      function initialize() {

        var initLatitude = '7.887868';
        var initLongitude = '98.376846';
        <?php
          if(!empty($hotel[0]->latitude)  && !empty($hotel[0]->longitude)){
       ?>
          initLatitude = <?php echo $hotel[0]->latitude;?>;
          initLongitude = <?php echo $hotel[0]->longitude;?>;
      <?php
          }
        ?>
        var latLng = new google.maps.LatLng(initLatitude, initLongitude);

        var map = new google.maps.Map(document.getElementById('mapCanvas'), {
          scrollwheel: false,
          zoom: 11,
          center: latLng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        
        
        marker = new google.maps.Marker({
          position: latLng,
          title: '',
          map: map,
          draggable: false
        });
        
        
        markersArray.push(marker); 
        google.maps.event.addListener(map, 'click', function(e) {
          placeMarker(e.latLng, map);
        });
        
        // Update current position info.
        updateMarkerPosition(latLng);
        geocodePosition(latLng);
        
 
      }
      
      function placeMarker(position, map) {
      
        //alert(position);
        //Clean marker point
        clearOverlays();
        
        //Make new marker object
        marker = new google.maps.Marker({
          position: position,
          map: map
        });
        
        //Add marker to array
        markersArray.push(marker); 
        
        //Write marker to map       
        map.panTo(position);
        
        updateMarkerAddress('Clicking...'); 
        
        updateMarkerPosition(marker.getPosition()); 
        
        geocodePosition(marker.getPosition());
      }
      
      function clearOverlays() {
        if (markersArray) {
          for (i in markersArray) {
            markersArray[i].setMap(null);
          }
        }
      }         

      // Onload handler to fire off the app.
      google.maps.event.addDomListener(window, 'load', initialize);
      
</script>


<div class="container_12">

  <!-- Form -->
  <?php echo form_open(base_url("admin/hotel/update"),'enctype="multipart/form-data"');?>
  <section class="grid_8">
    <h2 class="section_heading">
      <span style="margin: 5px 0px 0px 0px; font: 20px Arial, sans-serif;">
        Add Hotel Information 
        [ <a href="<?php echo base_url("admin/hotel");?>">list</a> ]  
        [ <a target="_blank" href="<?php echo !empty($hotel[0]->url)?base_url("hotel/".$hotel[0]->url."-".$hotel[0]->id):'';?>">View</a> ]
      </span>
    </h2>
  <br>    
    <input type="hidden" name="id" id="id" value="<?php echo $hotel[0]->id;?>">
    <!--  Start Hotel information -->  

      <script type="text/javascript">
      $(function(){
        $("#lang").change(function(){

          var id = $("#id").val();
          window.location='http://'+this.value+'.localhostuastravel.com/admin/hotel/create/'+id;
        });
      });
      </script>      
      <div class="half" id="lang_select">
        <label>language :</label> 
        <select id="lang"  name="lang">

        <?php
          if($this->lang->lang() == "en"){
        ?>
          <option value="th">thai</option>
          <option value="en" selected>english</option>
        <?php
          }else{
        ?>
          <option value="th" selected>thai</option>
          <option value="en">english</option>
        <?php
          }
        ?>
        </select>
      </div>
    <div class="half">
      <label>Hotel Name :</label> <?php echo form_error('name', '<font color="red">', '</font>'); ?>
      <input type="text" name="name" value="<?php echo !empty($hotel[0]->name)?$hotel[0]->name:'';?>">
    </div>    
    <div class="last half">
      <label>Star :</label> <?php echo form_error('star', '<font color="red">', '</font>'); ?>
      <input type="text" name="star" value="<?php echo !empty($hotel[0]->star)?$hotel[0]->star:'';?>">
    </div>
    <div class="clearfix"></div>

    <label>Hotel Description : </label> <?php echo form_error('description', '<font color="red">', '</font>'); ?>
      <textarea cols="30"  class="mceEditor"  rows="150" name="description"><?php echo !empty($hotel[0]->description)?$hotel[0]->description:'';?></textarea>
    <div class="clearfix"></div><br>

    <label>Short Description : </label> <?php echo form_error('short_description', '<font color="red">', '</font>'); ?>
      <input type="text" name="short_description" value="<?php echo !empty($hotel[0]->short_description)?$hotel[0]->short_description:'';?>">
    <div class="clearfix"></div><br>

    <label>Program & Itinerary : </label> <?php echo form_error('detail', '<font color="red">', '</font>'); ?>
      <textarea cols="30"  class="mceEditor" rows="10" name="detail"><?php echo !empty($hotel[0]->detail)?$hotel[0]->detail:'';?></textarea>
    <div class="clearfix"></div>

    <label>Hotel included : </label> <?php echo form_error('included', '<font color="red">', '</font>'); ?>
      <textarea cols="30"  class="mceEditor" rows="10" name="included"><?php echo !empty($hotel[0]->included)?$hotel[0]->included:'';?></textarea>
    <div class="clearfix"></div>

    <label>Hotel Remark : </label> 
      <textarea cols="30"  class="mceEditor" rows="10" name="remark"><?php echo !empty($hotel[0]->remark)?$hotel[0]->remark:'';?></textarea>
    <div class="clearfix"></div>
    <br>


    <!-- Agency -->
    <script>
      var price = new Array();
      var agencies = new Array();
    </script>
      <h2 class="section_heading" >
        <span style="margin: 5px 0px 0px 0px; font: 20px Arial, sans-serif;">
          Price Information 
          <!-- input type="search" id="query_agencyname" style="width:30%;" disabled/ -->
          <select id="query_agencyname">
          <?php 
            foreach ($agency as $key => $value) {
              # code...
          ?>
            <option value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
          <?php
            }
          ?>  
          </select>
          <img src="<?php echo base_url("themes/Travel/images/add.png"); ?>" valign="middle"  id="add_agency"/>       
          <input type="hidden" id="hidden_agency_id" />
        </span>
      </h2>

      <span id="add_loading"></span>
      <span  id="add_agency_area"></span>
      <?php


      //print_r($price); exit;
      $countExtendPriceJS = 0;
      if(!empty($price)){
        //$countPrice= count($price);
        $count =  0;
        foreach ($price as $key => $valueAgency) {  


      ?>
        <script>
          agencies[<?php echo $valueAgency['agency_id'];?>] = "<?php echo $valueAgency['agency_name'];?>";
        </script>   
        <div id='agency_price_<?php echo $valueAgency["agency_id"];?>'>
          <div style="width:100% !important;">            
            <span style='float:left; margin-left:10px; font: 20px Arial, sans-serif; width:auto'>
            <?php echo $valueAgency['agency_name'];?>
            <input type='hidden' name='agency_hotel[<?php echo $count;?>][agency_id]' value='<?php echo $valueAgency["agency_id"];?>'>
            </span>
            <span style='float:left; margin-left:10px; font: 20px Arial, sans-serif;'>

            <img src="<?php echo base_url("themes/Travel/images/remove.png"); ?>" 
            valign="middle"  
            id="delete_agency" 
            onClick='deleteRow("delete", <?php echo $valueAgency["agency_id"];?>)'
            />   

            <span style='margin: 20px 0px 0px 0px; font: 20px Arial, sans-serif;'>
              [เพิ่มราคา <img src='<?php echo base_url('themes/Travel/images/add.png'); ?>'
                              valign='middle'  
                              id='add_price'  
                              onClick='addPrice("add", "<?php echo $valueAgency['agency_id'];?>");'
              />]             
          </div>
          <div class='clearfix'></div>

          <?php

          //print_r(count($valueAgency["price_data"])); exit;
          foreach ($valueAgency["price_data"] as $key => $value) {
          ?><br>
            <div id='price_<?php echo $value->agency_id;?>_<?php echo $countExtendPriceJS;?>'>
              <div class='half'> 
                <label>Price Name :</label>
                <img 
                  src="http://localhost/uastravel/themes/Travel/images/remove.png" 
                  valign="top" 
                  id="delete_price" 
                  onclick="deletePriceRow('delete','<?php echo $value->agency_id;?>_<?php echo $countExtendPriceJS;?>');"
                >
                <br>
                <input type="text" 
                        name='price[<?php echo $value->agency_id;?>][<?php echo $value->id;?>][<?php echo $countExtendPriceJS;?>][name]' 
                        value='<?php echo !empty($value->name)?$value->name:'';?>'
                >

              </div>
              <div class='clear'></div>

              <div class='third'>   
                <label>Adult Sale :</label><br>
                <input type='text' 
                        name='price[<?php echo $value->agency_id;?>][<?php echo $value->id;?>][<?php echo $countExtendPriceJS;?>][sale_adult_price]' 
                        value='<?php echo $value->sale_adult_price;?>'
                >
              </div>
              <div class='third'>   
                <label>Adult Net :</label><br>
                <input type='text' 
                        name='price[<?php echo $value->agency_id;?>][<?php echo $value->id;?>][<?php echo $countExtendPriceJS;?>][net_adult_price]' 
                        value='<?php echo $value->net_adult_price;?>'
                >
              </div>
              <div class='third last'>   
                <label>Adult discount :</label><br>
                <input type='text' 
                        name='price[<?php echo $value->agency_id;?>][<?php echo $value->id;?>][<?php echo $countExtendPriceJS;?>][discount_adult_price]' 
                        value='<?php echo $value->discount_adult_price;?>'
                >
              </div>
              <div class='clear'></div>
               
              <div class='third'>   
                <label>Child Sale :</label><br>
                <input type='text' name='price[<?php echo $value->agency_id;?>][<?php echo $value->id;?>][<?php echo $countExtendPriceJS;?>][sale_child_price]' value='<?php echo $value->sale_child_price;?>'>
              </div>
              <div class='third'>   
                <label>Child Net :</label><br>
                <input type='text' name='price[<?php echo $value->agency_id;?>][<?php echo $value->id;?>][<?php echo $countExtendPriceJS;?>][net_child_price]' value='<?php echo $value->net_child_price;?>'>
              </div>
              <div class='third last'>   
                <label>Child discount :</label><br>
                <input type='text' name='price[<?php echo $value->agency_id;?>][<?php echo $value->id;?>][<?php echo $countExtendPriceJS;?>][discount_child_price]' value='<?php echo $value->discount_child_price;?>'>
              </div>
              <div class='clear'></div>
              </div>
        <?
            $countExtendPriceJS++;
          }          
        ?>

          <span id='add_price_loading_<?php echo $value->agency_id;?>'></span>
          <span  id='add_price_area_<?php echo $value->agency_id;?>'></span>      
               
          <div style='border-bottom: 1px dotted #ccc;'></div><br>
        </div>  
      <?php
          $count++;
        }
      }
      ?>
    <br>

    <script type="text/javascript">

      //Add agency by jquery
      var countExtendPriceJS = <?php echo $countExtendPriceJS; ?>;
      var element = <?php echo empty($count)?0:$count; ?>;
      var count = 0;
      var num = 1;
      //var agencies = new Array();

      $("#add_agency").click(function () {



        var agency_id = $("#query_agencyname :selected").val();
        var agency_name = $("#query_agencyname :selected").html();

        //alert(agency_id);
        var found = agencies.indexOf(agency_name);

        if(agency_name.length > 0){

          //Check duplicate data
          if(found == -1){


            //Loading...
            var path = '<?php echo base_url("themes/Travel/images/loading_agency.gif"); ?>';
            var loading = "<img src='"+path+"'>";
            $("#add_loading").html(loading);

            agencies[agency_id] = agency_name;
            count++;
            countExtendPriceJS++;
            element++;
            var html = agencyPriceForm(num, agency_id, agency_name);
            num++;
            $("#add_agency_area").append(html);
          
            $("#add_agency_area").append(function(){
              deleteRow();
            });           
            $("#query_agencyname").val("");
            $("#query_agencyname").focus();
            $("#add_loading").html("");
          
          }else{
            alert("Agency นี้ได้เพิ่มข้อมูลแล้ว");
            $("#query_agencyname").val("");
            $("#query_agencyname").focus();
          }
        }else{
          alert("กรุณากรอกชื่อ Agency และเลือก");
          $("#query_agencyname").focus();
        }


      }); 

      function deleteRow(event, agency_id){

        if(event == "delete"){
          alert("delete : "+agency_id);

          $("#agency_price_"+agency_id).remove();
          delete agencies[agency_id]; 
        }else{
          //alert("add");
        }
        return false;
      }

      function deletePriceRow(event, price_element){

        if(event == "delete"){
          alert("delete : "+price_element);

          $("#price_"+price_element).remove();
          delete price[price_element]; 
        }else{
          //alert("add");
        }
        return false;
      }

      function addPrice(event, agency_id){
        if(event == "add"){
          alert("add :"+agency_id+"-"+countExtendPriceJS);
          var html = priceForm(agency_id, countExtendPriceJS);
          $("#add_price_area_"+agency_id).append(html);

          countExtendPriceJS++;
        }
        return false;
      }

    
  function agencyPriceForm(num, agency_id, agency_name){

    var agency_form = "<br>";
    agency_form += "<div id='agency_price_"+agency_id+"'>";
    agency_form += "    <div>";
    agency_form += "      <span style='float:left; margin-left:10px; font: 20px Arial, sans-serif; width:auto'>";
    agency_form += "        [New] "+agency_name;
    agency_form += "        <input type='hidden' name='agency_hotel["+element+"][agency_id]' value='"+agency_id+"'>";
    agency_form += "      </span>";
    agency_form += "      <span style='float:left; margin-left:10px; font: 20px Arial, sans-serif; width:10%'>";
    agency_form += "         <img src='<?php echo base_url('themes/Travel/images/remove.png'); ?>'";
    agency_form += "            valign='middle'  "; 
    agency_form += "            id='delete_agency'  ";
    agency_form += "            onClick='deleteRow(\"delete\", "+agency_id+");'  ";
    agency_form += "      />"; 
    agency_form += "      </span>";
    agency_form += "      <span style='margin: 5px 0px 0px 0px; font: 20px Arial, sans-serif;'>";
    agency_form += "        [เพิ่มราคา <img src='<?php echo base_url('themes/Travel/images/add.png'); ?>'";
    agency_form += "            valign='middle'  "; 
    agency_form += "            id='add_price'  ";
    agency_form += "            onClick='addPrice(\"add\", "+agency_id+");'  ";
    agency_form += "      />]"; 
    agency_form += "      </span>";    
    agency_form += "    </div>";
    agency_form += "    <div class='clearfix'></div>"; 

    agency_form += "<br>";
    agency_form += "  <div id='price_"+agency_id+"_"+element+"'>";
    agency_form += "    <div class='half'>";
    agency_form += "      <label>Price name :</label>";
    agency_form += "      <img src='<?php echo base_url('themes/Travel/images/remove.png'); ?>'";
    agency_form += "      valign='top'  "; 
    agency_form += "      id='delete_price'  ";
    agency_form += "      onClick='deletePriceRow(\"delete\", \""+agency_id+"_"+element+"\");'  ";
    agency_form += "      />  "; 
    agency_form += "      <br>";
    agency_form += "      <input type='text' name='price["+agency_id+"][0]["+countExtendPriceJS+"][name]' value=''>";
    agency_form += "    </div>";
    agency_form += "    <div class='clearfix'></div>";    

    agency_form += "    <div>";
    agency_form += "      <div class='third'>";   
    agency_form += "        <label>Adult Sale :</label><br>";
    agency_form += "        <input type='text' name='price["+agency_id+"][0]["+countExtendPriceJS+"][sale_adult_price]' value=''>";
    agency_form += "      </div>";
    agency_form += "      <div class='third'>";   
    agency_form += "        <label>Adult Net :</label><br>";
    agency_form += "        <input type='text' name='price["+agency_id+"][0]["+countExtendPriceJS+"][net_adult_price]' value=''>";
    agency_form += "      </div>";
    agency_form += "      <div class='third last'>";   
    agency_form += "        <label>Adult discount :</label><br>";
    agency_form += "        <input type='text' name='price["+agency_id+"][0]["+countExtendPriceJS+"][discount_adult_price]' value=''>";
    agency_form += "      </div>";
    agency_form += "    <div class='clearfix'></div>";
 
    agency_form += "    <div>";
    agency_form += "      <span class='third'>";   
    agency_form += "        <label>Child Sale :</label><br>";
    agency_form += "        <input type='text' name='price["+agency_id+"][0]["+countExtendPriceJS+"][sale_child_price]' value=''>";
    agency_form += "      </span>";
    agency_form += "      <span class='third'>";   
    agency_form += "        <label>Child Net :</label><br>";
    agency_form += "        <input type='text' name='price["+agency_id+"][0]["+countExtendPriceJS+"][net_child_price]' value=''>";
    agency_form += "      </span>";
    agency_form += "      <span class='third last'>";   
    agency_form += "        <label>Child discount :</label><br>";
    agency_form += "        <input type='text' name='price["+agency_id+"][0]["+countExtendPriceJS+"][discount_child_price]' value=''>";
    agency_form += "      </span>";
    agency_form += "    </div>";
    agency_form += "    <div class='clear'></div>";

    agency_form += "  </div>";

    agency_form += "  <br>"; 
    agency_form += "</div>";
    agency_form += " <span id='add_price_loading_"+agency_id+"'></span>";
    agency_form += " <span  id='add_price_area_"+agency_id+"'></span>"; 
    agency_form += " <div style='border-bottom: 1px dotted #ccc;'></div>";   

    countExtendPriceJS++;

    return agency_form;
  }



      function priceForm(agency_id, countExtendPriceJS){
        //alert(countExtendPriceJS);
        var priceForm = "<br>";
        priceForm += "<div id='price_"+agency_id+"_"+countExtendPriceJS+"'>";
        priceForm += "    <div class='half'>";
        priceForm += "      <label>Price name :</label>";
        priceForm += "      <img src='<?php echo base_url('themes/Travel/images/remove.png'); ?>'";
        priceForm += "      valign='top'  "; 
        priceForm += "      id='delete_price'  ";
        priceForm += "      onClick='deletePriceRow(\"delete\", \""+agency_id+"_"+countExtendPriceJS+"\");'  ";
        priceForm += "      />  "; 
        priceForm += "      <br>";
        priceForm += "      <input type='text' name='price["+agency_id+"][0]["+countExtendPriceJS+"][name]' value=''>";
        priceForm += "    </div>";
        priceForm += "    <div class='clearfix'></div>";  

        priceForm += "    <div>";
        priceForm += "      <div class='third'>";   
        priceForm += "        <label>Adult Sale :</label><br>";
        priceForm += "        <input type='text' name='price["+agency_id+"][0]["+countExtendPriceJS+"][sale_adult_price]' value=''>";
        priceForm += "      </div>";
        priceForm += "      <div class='third'>";   
        priceForm += "        <label>Adult Net :</label><br>";
        priceForm += "        <input type='text' name='price["+agency_id+"][0]["+countExtendPriceJS+"][net_adult_price]' value=''>";
        priceForm += "      </div>";
        priceForm += "      <div class='third last'>";   
        priceForm += "        <label>Adult discount :</label><br>";
        priceForm += "        <input type='text' name='price["+agency_id+"][0]["+countExtendPriceJS+"][discount_adult_price]' value=''>";
        priceForm += "      </div>";
        priceForm += "    <div class='clearfix'></div>";

        priceForm += "    <div>";
        priceForm += "      <span class='third'>";   
        priceForm += "        <label>Child Sale :</label><br>";
        priceForm += "        <input type='text' name='price["+agency_id+"][0]["+countExtendPriceJS+"][sale_child_price]' value=''>";
        priceForm += "      </span>";
        priceForm += "      <span class='third'>";   
        priceForm += "        <label>Child Net :</label><br>";
        priceForm += "        <input type='text' name='price["+agency_id+"][0]["+countExtendPriceJS+"][net_child_price]' value=''>";
        priceForm += "      </span>";
        priceForm += "      <span class='third last'>";   
        priceForm += "        <label>Child discount :</label><br>";
        priceForm += "        <input type='text' name='price["+agency_id+"][0]["+countExtendPriceJS+"][discount_child_price]' value=''>";
        priceForm += "      </span>";
        priceForm += "    </div>";
        priceForm += "    <div class='clear'></div>";

        priceForm += " </div>";
        priceForm += "  <br>";

        return priceForm;       
      }

    </script>     
    <!-- Agency End -->

  </section>



  <!-- Sidebar -->
  <section class="simple_sidebar grid_4">
    
    <label>Tag</label><label style="position:absolute;right:240px;"><span style="cursor:pointer;"  id="show_all">show all</span></label>
    <textarea id="textarea" class="example" rows="1" style="width: 250px;"></textarea>
      <script>
        //Rewrite tag value
        $(document).ready(function(){
          $("#save").live('click', function() {
            $("#tags").val($("#jquerytag").val());          
          });
        });
      </script>          
      <input type="hidden"id="tags" name="tags" value="">  

    <br>
    <span id="show_all_result">
      <?php
        //print_r($tag); 

        $count = 1;
        foreach ($tag as $key => $value) {
          # code...
          if($count == count($tag)){
          ?>  
            <font color='6182E6'>
              <span   style="cursor:pointer;" 
                  onClick="this.style.color='red'"
                    id='addtag<?php echo $count; ?>'
                ><?php echo $value->name; ?></span>
              </font>
          <?php           
          }else{          
          ?>  
            <font color='6182E6'><span  style="cursor:pointer; " 
                  onClick="this.style.color='red'"
                    id='addtag<?php echo $count; ?>'
                ><?php echo $value->name; ?></span>
              </font>,          
          <?php 
          }

          $count++;
        }
      ?>
    </span>



    <?php
      //print_r($tag_query); exit;
    ?>
    <script type="text/javascript">
      var validate = "";
      //Start update tag 
      $('#textarea')
        .textext({
          plugins : 'tags autocomplete'
          <?php
            //Check has tag data
            if(!empty($tag_query)){
          ?>

            ,tagsItems : [  <?php  
                      foreach ($tag_query as $key => $value) {
                        # code...
                        if(!empty($value->name)){
                          echo "'".$value->name."',";
                        }
                      }
                    ?>
                  ]
          <?php
            }
          ?>
        })
        .bind('getSuggestions', function(e, data)
        {
          //Get tag data
          if(data.query.length == 2){
            var list = tagSearch(data.query);

            var textext = $(e.target).textext()[0];
            var query = (data ? data.query : '') || '';

            validate = textext.itemManager().filter(list, query)
          
            //Show suggestion list 
            $(this).trigger(
              'setSuggestions',
              { result : validate }
            );
          }else if( validate.length > 0){
            var list = tagSearch(data.query);

            var textext = $(e.target).textext()[0];
            var query = (data ? data.query : '') || '';

            validate = textext.itemManager().filter(list, query)
          
            //Show suggestion list 
            $(this).trigger(
              'setSuggestions',
              { result : validate }
            );

          }         
        })
        .bind('tagClick', function(e, tag, value, callback)
            {
                var newValue = window.prompt('New value', value);

                if(newValue)
                    callback(newValue);
            });
        //End update tag


      function tagSearch(str) {

        var url ="<?php echo base_url('/tag/jssearch');?>"+"/"+str;
        var response = $.ajax({ type: "GET",   
                                url: url,   
                                async: false
                              }).responseText;

        var list = response.split(/,/);

        return list;
      }

    </script>

    <script type="text/javascript">
      //Function display tag 
      $("#show_all_result").hide();
      $("#show_all").click(function () {
        $("#show_all_result").toggle("slow");
      }); 
    </script> 

    <?php
      if(is_array($tag)){
        $count = 1;
        foreach ($tag as $key => $value) {
          # code...
        ?>
          <script type="text/javascript">
            $('#addtag<?php echo $count; ?>').bind('click', function(e){
                  $('#textarea').textext()[0].tags().addTags([ $('#addtag<?php echo $count; ?>').text() ]);
              });
          </script> 
        <?php     
          $count++;
        }
      }
    ?>
  </section>
  
  
  <!-- Start Images -->
  <section class="simple_sidebar grid_4">
    <label>{_ location_lang_image_manager}</label>
        <div id="side_bar_block_image">
        </div>
        <div id="uploader">
          <p>You browser doesn't have Flash, Silverlight, Gears, BrowserPlus or HTML5 support.</p>
        </div>
        <span id="btnHide"  class="upload-button" onClick="return(false);"></span>
        <span id="btnShow"  class="upload-button" onClick="return(false);">Show</span>
      <div class="clearfix"></div>
  </section>
  
  <section class="simple_sidebar grid_4">
    <label>{_ location_lang_image_manager}</label>
      
      <p>First Image (Minimum width: 300px)</p>
      <?php
        echo form_upload('first_image', '', 'class="form_input"');
      ?>
      <p>Background Image (1920px * 800px)</p>
      <?php
        echo form_upload('background_image', '', 'class="form_input"');
      ?>
      <p>Banner Image (770px * 180px)</p>
      <?php
        echo form_upload('banner_image', '', 'class="form_input"');
      ?>
      <div class="clearfix"></div>
  </section>
  <!-- End Images -->
  

  <!-- Start map -->
  <section class="simple_sidebar grid_4">
        <h3 class="">{_ location_lang_location}</h3>
        <div id="mapCanvas" style="height:300px;"></div>
        Longitude : <input value="<?php echo set_value('longitude');?>" id="longitude" name="longitude" value="<?php echo $hotel[0]->longitude;?>">
        <br />
        Latitude : <input value="<?php echo set_value('latitude');?>" id="latitude" name="latitude" value="<?php echo $hotel[0]->latitude;?>">
        <br />
        Address : <input value="" id="address" name="address">
  </section>  
  <!-- End map -->


  <section class="grid_12">
    <input type="submit" value="Submit" class="auto_width" id="save">
  </section>  

  <?php echo form_close();?>  
</div>

