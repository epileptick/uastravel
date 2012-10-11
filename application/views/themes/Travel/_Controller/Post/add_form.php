<?php
PageUtil::addVar("title",$this->lang->line("post_lang_add_post"));
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/style/form.css">');
PageUtil::addVar("javascript",'
<script type="text/javascript">

  $(document).ready(function(){
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
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreakcut,|,copy,paste,pastetext,pasteword,|,image,youtube,|",
        theme_advanced_toolbar_location : "external",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : false,
        theme_advanced_source_editor_width: 630,
        file_browser_callback : "ajaxfilemanager",
        autoresize_min_height: 500,
        autoresize_not_availible_height: 10,
        autoresize_on_init: true,
        autoresize_hide_scrollbars: true
    });
    function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = "'.Util::ThemePath().'/js/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php";
			var view = "detail";
			switch (type) {
				case "image":
				view = "thumbnail";
					break;
				case "media":
					break;
				case "flash": 
					break;
				case "file":
					break;
				default:
					return false;
			}
      tinyMCE.activeEditor.windowManager.open({
          url: "'.Util::ThemePath().'/js/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php?view=" + view,
          width: 782,
          height: 440,
          inline : "yes",
          close_previous : "no"
      },{
          window : win,
          input : field_name
      });
      
      }
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
        document.getElementById(\'address\').innerHTML = str;
      }

      function initialize() {
         var latLng = new google.maps.LatLng(7.968967853297759,98.32956784667977);

        var map = new google.maps.Map(document.getElementById(\'mapCanvas\'), {
            scrollwheel: false,
          zoom: 11,
          center: latLng,
          mapTypeId: google.maps.MapTypeId.HYBRID
        });
        
        
        marker = new google.maps.Marker({
          position: latLng,
          title: \'<!--[$form.name]-->\',
          map: map,
          draggable: true
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

 <!-- Header -->
<header style="background-image:url(<?=$imagepath?>/placeholders/1280x1024/13.jpg);">

	<div class="container_12">
    {_include menu}
	</div>

	<!-- Heading -->
	<h2>Travel blog</h2>

</header>

<!-- Main content -->
<div class="container_12">

	<!-- Blogpost -->
	<section class="blogpost grid_12">
		
  <div id="add_form">
  <?php echo form_open(base_url('post/create')); ?>
  
  <div class="topHolder">
    <span class="GM1BAGKBGJB blogg-title">โพสต์</span>
    <span class="GM1BAGKBJJB blogg-title">·</span>
    <?php
    echo form_input('title', '', 'class="GM1BAGKBHEC titleField textField GM1BAGKBGEC" dir="ltr" title="ชื่อ" size="60"');
    ?>
    <span class="GM1BAGKBNIB">
      <?php echo form_submit('submit', $this->lang->line("post_lang_submit"), 'class="blogg-button blogg-primary"'); ?>
      <button class="blogg-button" tabindex="0" onClick="history.go(-1)">ปิด</button>
    </span>
  </div>
  <div id="editorPanel"></div>
    <div id="wrapper-editor">
      <div id="editor">
        <textarea name="body" class="mceEditor" style="width:100%"></textarea>
      </div>
      <div class="clear"></div>
    </div>
  </div>
    <div id="add_form_right">
    <h2>{_ post_lang_configuration}</h2>
      <div class="side_bar_block">
        <h3 class="image">{_ post_lang_image_manager}</h3>
        <img src="<?=$imagepath?>/placeholders/66x66/8.jpg" border="0" />
        <img src="<?=$imagepath?>/placeholders/66x66/1.jpg" border="0" />
        <img src="<?=$imagepath?>/placeholders/66x66/2.jpg" border="0" />
        <img src="<?=$imagepath?>/placeholders/66x66/3.jpg" border="0" />
        <img src="<?=$imagepath?>/placeholders/66x66/4.jpg" border="0" />
        <img src="<?=$imagepath?>/placeholders/66x66/5.jpg" border="0" />
        <img src="<?=$imagepath?>/placeholders/66x66/6.jpg" border="0" />
        <img src="<?=$imagepath?>/placeholders/66x66/7.jpg" border="0" />
      </div>
      
      <div class="side_bar_block">
        <h3 class="tag">{_ post_lang_tag}</h3>
      </div>
      
      <div class="side_bar_block">
        <h3 class="location">{_ post_lang_location}</h3>
        <div id="mapCanvas" style="margin-bottom:20px;"></div>
      </div>
    </div>
    <div class="clear"></div>
	</section>

	<div class="clearfix"></div>
	<hr class="dashed grid_12">
	
</div> 
