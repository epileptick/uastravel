<?php
PageUtil::addVar("title",$this->lang->line("location_lang_add_post"));
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/style/form.css">');
PageUtil::addVar("stylesheet",'<style type="text/css">@import url('.Util::ThemePath().'/js/plupload/jquery.plupload.queue/css/jquery.plupload.queue.css);</style>');
PageUtil::addVar("javascript",'<script type="text/javascript" src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>');
PageUtil::addVar("javascript",'<script type="text/javascript" src="'.Util::ThemePath().'/js/plupload/plupload.full.js"></script>');
PageUtil::addVar("javascript",'<script type="text/javascript" src="'.Util::ThemePath().'/js/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>');
//Autosuggest && Autocomplete
PageUtil::addVar("javascript", '<script type="text/javascript" src="'.$themepath.'/js/autocomplete/autocomplete.js"></script>');
PageUtil::addVar("javascript",'<script type="text/javascript">
// Convert divs to queue widgets when the DOM is ready
$(document).ready(function() {
  function autoSave(){
    setTimeout(
    function()
      {
        //do something special
      },
      5000
    );
    $("#save").prop("disabled", true);
    //console.log(tinyMCE.get("txtBody").getContent());
    //console.log(tinyMCE.get("txtSuggestion").getContent());
    //console.log(tinyMCE.get("txtRoute").getContent());
    if($("#id").val()!=0){
      $.post(\''.base_url('admin/location/create/').'\',{id: $("#id").val(),title: $("#title").val(), short_title: $("#short_title").val(), body:tinyMCE.get("txtBody").getContent(),suggestion:tinyMCE.get("txtSuggestion").getContent(),route:tinyMCE.get("txtRoute").getContent(), longitude: $("#longitude").val(), latitude: $("#latitude").val(), ajax: 1, force: 1, lang: $("#lang").val() },successHandler);
    }else if($("#id").val()==0){
      $.post(\''.base_url('admin/location/create/').'\',{title: $("#title").val(), short_title: $("#short_title").val(), body:tinyMCE.get("txtBody").getContent(),suggestion:tinyMCE.get("txtSuggestion").getContent(),route:tinyMCE.get("txtRoute").getContent(), longitude: $("#longitude").val(), latitude: $("#latitude").val(), ajax: 1, force: 1, lang: $("#lang").val() },successHandler);
    }
  }
  updateImages();
  function updateImages(){
            $.post("'.base_url("/images/ajax_list").'", { parent_id: $("#id").val(),table_id:1 },
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
                //console.log($(this).prop("href"));
                $.post($(this).prop("href"), {},
                  function(data) {
                    //console.log(data);
                    var data = jQuery.parseJSON(data);
                    //console.log(data);
                    if(data.success == "1"){
                      updateImages();
                    }
                  }
                );
                return false;
              });
      }
    );
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

  $("#title").blur(function() {
    if($("#title").val() == "" ){
      return 0;
    }

    autoSave();
  });


    tinyMCE.init({
        mode : "specific_textareas",
        editor_selector : "mceEditor",
        width: "100%",
        theme : "modern",
        plugins: [
          "advlist autolink lists link image charmap print preview anchor",
          "searchreplace visualblocks code fullscreen",
          "insertdatetime media table contextmenu paste textcolor autoresize hr"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor | hr",
        autosave_ask_before_unload: true,
        autoresize_min_height: 300,
        autoresize_not_availible_height: 10,
        autoresize_on_init: true,
        autoresize_hide_scrollbars: false
    });

    tinyMCE.init({
        mode : "specific_textareas",
        editor_selector : "mceEditor2",
        width: "100%",
        theme : "modern",
        plugins: [
          "advlist autolink lists link image charmap print preview anchor",
          "searchreplace visualblocks code fullscreen",
          "insertdatetime media table contextmenu paste textcolor autoresize hr"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | fontselect | fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor  | hr",
        autosave_ask_before_unload: true,
        autoresize_min_height: 300,
        autoresize_not_availible_height: 10,
        autoresize_on_init: true,
        autoresize_hide_scrollbars: false
    });


  function successHandler(data){
    console.log(data);
    var json = jQuery.parseJSON(data);
    $("#id").val(json.id);
    $("#status").html(json.status).show("slow");
    $("#span_status").show("slow").delay(3000).hide("slow");
    var $uploader = $("#uploader").pluploadQueue();
    $uploader.settings.multipart_params = {parent_id: $(\'#id\').val(), table_id:1};
    $("#save").prop("disabled", false);
  }
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
        autoSave();
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
        //console.log(info);
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

PageUtil::addVar("javascript",'
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
            updateMarkerAddress(\'Cannot determine address at this location.\');
          }
        });
      }

      function updateMarkerStatus(str) {
        document.getElementById(\'markerStatus\').innerHTML = str;
      }

      function updateMarkerPosition(latLng) {

        document.getElementById("latitude").value = latLng.lat();
        document.getElementById("longitude").value = latLng.lng();


      }

      function updateMarkerAddress(str) {
        document.getElementById(\'address\').value = str;
      }

      function initialize() {

        var latLng = new google.maps.LatLng('.$post[0]['latitude'].','.$post[0]['longitude'].');

        var map = new google.maps.Map(document.getElementById(\'mapCanvas\'), {
          scrollwheel: false,
          zoom: 11,
          center: latLng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });


        marker = new google.maps.Marker({
          position: latLng,
          title: \'\',
          map: map,
          draggable: false
        });


        markersArray.push(marker);
        google.maps.event.addListener(map, \'click\', function(e) {
          placeMarker(e.latLng, map);
        });

        // Update current position info.
        updateMarkerPosition(latLng);
        geocodePosition(latLng);

        /*
        // Add dragging event listeners.
        google.maps.event.addListener(marker, \'dragstart\', function() {
          updateMarkerAddress(\'Dragging...\');
        });

        google.maps.event.addListener(marker, \'drag\', function() {
          updateMarkerStatus(\'Dragging...\');
          updateMarkerPosition(marker.getPosition());
        });

        google.maps.event.addListener(marker, \'dragend\', function() {
          updateMarkerStatus(\'Drag ended\');
          geocodePosition(marker.getPosition());
        });
        */
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

        updateMarkerAddress(\'Clicking...\');

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
      google.maps.event.addDomListener(window, \'load\', initialize);

      </script>
');
?>



  <!-- Blogpost -->
  <section class="blogpost grid_12">

  <h2 class="section_heading text_big"><?=$this->lang->line("location_lang_add_post")?></h2>
  <div id="add_form">
  <div id="status"></div>

  <?php echo form_open(base_url('admin/location/create'),'enctype="multipart/form-data"'); ?>
      <script type="text/javascript">
      $(function(){
        $("#lang").change(function(){
          if($(this).val() == "en"){
            window.location='http://packagethailandtour.com/admin/location/create/'+$("#id").val();
          }else if($(this).val() == "th"){
            window.location='http://ทัวร์เที่ยวไทย.com/admin/location/create/'+$("#id").val();
          }
        });
      });
      </script>
      <div class="row" id="lang_select">
        <label>ภาษา :</label>
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
      <div class="clearfix"></div>
  <input type="hidden" value="<?=$post[0]['id']?>" id="id" name="id" />
  <span id="fedfe"></span>
  <div class="topHolder">
    <span class="GM1BAGKBGJB blogg-title">โพสต์</span>
    <span class="GM1BAGKBJJB blogg-title">·</span>
    <?php
      echo form_input('title', $post[0]['title'], 'id="title" class="GM1BAGKBHEC titleField textField GM1BAGKBGEC" dir="ltr" title="ชื่อ" size="60"');
    ?>
    <span class="GM1BAGKBNIB">
      <?php echo form_submit('submit', $this->lang->line("location_lang_submit"), 'class="blogg-button blogg-primary" id="save"'); ?>
      <button class="blogg-button" tabindex="0" onClick="history.go(-1)">ปิด</button>
    </span>
  </div>

  <div class="topHolder">
    <span class="GM1BAGKBGJB blogg-title">Short title</span>
    <span class="GM1BAGKBJJB blogg-title">·</span>
    <input type="text" name="short_title" value="<?php echo !empty($post[0]['short_title']) ? $post[0]['short_title']:'';?>" id="short_title" class="GM1BAGKBHEC titleField textField GM1BAGKBGEC" dir="ltr" title="ชื่อ" size="60">
  </div>
    <div id="wrapper-editor">
      <div id="editor">
        <textarea name="body" class="mceEditor" style="width:100%" id="txtBody" >
        <?=$post[0]['body']?>
        </textarea>
      </div>
      <div class="clear"></div>
    </div>
    <hr class="dashed" />
    <div class="grid_8">
    <h3 class="text_big"><?=$this->lang->line("location_lang_suggestion")?></h3>
      <textarea name="suggestion" class="mceEditor2" style="width:100%" id="txtSuggestion" >
          <?=$post[0]['suggestion']?>
      </textarea>
      <hr class="dashed" />
    </div>
    <div class="grid_8">
    <h3 class="text_big"><?=$this->lang->line("location_lang_route")?></h3>
      <textarea name="route" class="mceEditor2" style="width:100%" id="txtRoute" >
        <?=$post[0]['route']?>
      </textarea>
      <hr class="dashed" />
    </div>
  </div>

  <div id="add_form_right">
    <h2 class="text_big">{_ location_lang_configuration}</h2>
      <div class="side_bar_block">
        <h3 class="image">{_ location_lang_image_manager}</h3>
        <div id="side_bar_block_image">
        </div>
        <div id="uploader">
          <p>You browser doesn't have Flash, Silverlight, Gears, BrowserPlus or HTML5 support.</p>
        </div>
        <span id="btnHide"  class="upload-button" onClick="return(false);"></span>
        <span id="btnShow"  class="upload-button" onClick="return(false);">Show</span>
      </div>

      <div class="side_bar_block">
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
      </div>


      <div class="side_bar_block">
        <h3 class="tag">{_ location_lang_tag} <span style="cursor:pointer;"  id="show_all">show all</span></h3>
          <textarea id="textarea" name="jquerytag" class="example" rows="1" style="width: 250px;"></textarea>
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
            if(is_array($tag)){
              $count = 1;
              foreach ($tag as $key => $value) {
                # code...
                if($count == count($tag)){
                ?>
                  <font color='6182E6'>
                    <span   style="cursor:pointer;"
                        onClick="this.style.color='red'"
                          id='addtag<?php echo $count; ?>'
                      ><?php echo $value["name"]; ?></span>
                    </font>
                <?php
                }else{
                ?>
                  <font color='6182E6'><span  style="cursor:pointer; "
                        onClick="this.style.color='red'"
                          id='addtag<?php echo $count; ?>'
                      ><?php echo $value["name"]; ?></span>
                    </font>,
                <?php
                }
                $count++;
              }
            }
            ?>
          </span>

   <script type="text/javascript">

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
                        if(!empty($value["name"])){
                          echo "'".$value["name"]."',";
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
        }).bind('tagClick', function(e, tag, value, callback){
          var newValue = window.prompt('New value', value);

          if(newValue)
              callback(newValue);
        });
        //End update tag


      function tagSearch(str) {

        var url ="<?php echo base_url('/tag/jsonsearch');?>"+"/"+$.trim(str);
        var response = $.ajax({ type: "GET",
                                url: url,
                                async: false
                              }).responseText;

        var list = jQuery.parseJSON(response);
        return list;
      }


      //Function display tag
      $("#show_all_result").hide();
      $("#show_all").click(function () {
        $("#show_all_result").toggle("slow");
      });
    </script>
          <?php

            //echo $tag;
            if(!empty($tag)){
              if(is_array($tag)){
                $count = 1;
                foreach ($tag as $key => $value) {
                  # code...
                ?>
                  <script type="text/javascript">
                    $('#addtag<?php echo $count; ?>').bind('click', function(e){
                      //alert($('#addtag<?php echo $count; ?>').text());
                          $('#textarea').textext()[0].tags().addTags([ $('#addtag<?php echo $count; ?>').text() ]);
                      });
                  </script>
                <?php
                  $count++;
                }
              }
            }
          ?>
      </div>
      <div class="side_bar_block">
        <h3 class="location">{_ location_lang_location}</h3>
        <div id="mapCanvas"></div>
        Longitude : <input value="<?php echo $post[0]['longitude'];?>" id="longitude" name="longitude">
        <br />
        Latitude : <input value="<?php echo $post[0]['latitude'];?>" id="latitude" name="latitude">
        <br />
        Address : <input value="" id="address" name="address">
      </div>
    </div>
    <div class="clear"></div>
  </section>
  <?php echo form_close(); ?>
  <div class="clearfix"></div>

  <hr class="dashed grid_12" />
