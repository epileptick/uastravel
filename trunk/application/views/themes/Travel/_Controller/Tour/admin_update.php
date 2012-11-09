
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
PageUtil::addVar("javascript",'<script type="text/javascript" src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>');
PageUtil::addVar("javascript",'<script type="text/javascript" src="'.Util::ThemePath().'/js/plupload/plupload.full.js"></script>');
PageUtil::addVar("javascript",'<script type="text/javascript" src="'.Util::ThemePath().'/js/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>');
PageUtil::addVar("javascript",'<script type="text/javascript">
//Convert divs to queue widgets when the DOM is ready
$(document).ready(function() {
  
  updateImages();
  function updateImages(){
            $.post("'.base_url("/images/ajax_list").'", { parent_id: $("#id").val(),table_id:2 },
            function(data) {
              $("#side_bar_block_image").html(data).hide("slow").delay(200).show("slow");
              $("#side_bar_block_image img").click(function() {
                $(this).addImg();
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
        $uploader.settings.multipart_params = {parent_id: $("#id").val(), table_id:2};
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
	      	if(!empty($tour[0]->latitude)  && !empty($tour[0]->longitude)){
	     ?>
	     		initLatitude = <?php echo $tour[0]->latitude;?>;
	     		initLongitude = <?php echo $tour[0]->longitude;?>;
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
	<?php echo form_open(base_url("admin/tour/update"));?>	
	<section class="grid_8">
		<h2 class="section_heading">Add Tour Information [ <a href="<?php echo base_url("admin/tour");?>">list</a> ]  [ <a target="_blank" href="<?php echo base_url("tour/".$tour[0]->name."-".$tour[0]->id);?>">View</a> ]</h2>
		<br>		
			<input type="hidden" name="id" id="id" value="<?php echo $tour[0]->id;?>">
			<!--  Start Tour information -->		
			<div class="half">
				<label>Tour Name :</label> <?php echo form_error('name', '<font color="red">', '</font>'); ?>
				<input type="text" name="name" value="<?php echo $tour[0]->name;?>">
			</div>
			<div class="clearfix"></div>

			<label>Tour Description : </label> <?php echo form_error('description', '<font color="red">', '</font>'); ?>
				<textarea cols="30"  class="mceEditor"  rows="150" name="description"><?php echo $tour[0]->description;?></textarea>
			<div class="clearfix"></div><br>

			<label>Short Description : </label> <?php echo form_error('short_description', '<font color="red">', '</font>'); ?>
				<input type="text" name="short_description" value="<?php echo $tour[0]->short_description;?>">
			<div class="clearfix"></div><br>

			<label>Program & Itinerary : </label> <?php echo form_error('detail', '<font color="red">', '</font>'); ?>
				<textarea cols="30"  class="mceEditor" rows="10" name="detail"><?php echo $tour[0]->detail;?></textarea>
			<div class="clearfix"></div>

			<label>Tour included : </label>	<?php echo form_error('included', '<font color="red">', '</font>'); ?>
				<textarea cols="30"  class="mceEditor" rows="10" name="included"><?php echo $tour[0]->included;?></textarea>
			<div class="clearfix"></div>

			<label>Tour Remark : </label>	
				<textarea cols="30"  class="mceEditor" rows="10" name="remark"><?php echo $tour[0]->remark;?></textarea>
			<div class="clearfix"></div>




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
							<span 	style="cursor:pointer;" 
									onClick="this.style.color='red'"
	   								id='addtag<?php echo $count; ?>'
	   						><?php echo $value->name; ?></span>
	   					</font>
					<?php						
					}else{					
					?>	
						<font color='6182E6'><span 	style="cursor:pointer; " 
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



		
		<script type="text/javascript">
			var validate = "";
			//Start update tag 
			$('#textarea')
				.textext({
					plugins : 'tags autocomplete'
					<?php
						//Check has tag data
						if(isset($tag_query)){
					?>

						,tagsItems : [ 	<?php  
											foreach ($tag_query as $key => $value) {
												# code...
												echo "'".$value->name."',";
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
					if(data.query.length == 1){
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

				var url ="<?php echo base_url('/tag/jssearch/');?>"+str;
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
	<!-- End Images -->
  
  
	<!-- Sidebar start period-->
	<section class="simple_sidebar grid_4">
		<label>Period</label><br>
	<div class="half" style="width:120px;">
			<label>Start Month :</label><br>
			<?php
				$options = array(
				                  '1'  => 'มกราคม',
				                  '2'  => 'กุมภาพันธ์',
				                  '3'  => 'มีนาคม',
				                  '4'  => 'เมษายน',
				                  '5'  => 'พฤษภาคม',
				                  '6'  => 'มิถุยายน',
				                  '7'  => 'กรกฎาคม',
				                  '8'  => 'สิงหาคม',
				                  '9'  => 'กันยายน',
				                  '10' => 'ตุลาคม',
				                  '11' => 'พฤศจิกายน',
				                  '12' => 'ธันวาคม',
				                );
				echo form_dropdown('start_month', $options, $tour[0]->start_month);
			?>
		</div>	

		<div class="half last" style="width:120px;">
			<label>End Month :</label><br>
			<?php
				$options = array(
				                  '1'  => 'มกราคม',
				                  '2'  => 'กุมภาพันธ์',
				                  '3'  => 'มีนาคม',
				                  '4'  => 'เมษายน',
				                  '5'  => 'พฤษภาคม',
				                  '6'  => 'มิถุยายน',
				                  '7'  => 'กรกฎาคม',
				                  '8'  => 'สิงหาคม',
				                  '9'  => 'กันยายน',
				                  '10' => 'ตุลาคม',
				                  '11' => 'พฤศจิกายน',
				                  '12' => 'ธันวาคม',
				                );
				echo form_dropdown('end_month', $options, $tour[0]->end_month);
			?>
		</div>					
		<div class="clearfix"></div>
	</section>
	<!-- Sidebar end period-->



	<!-- Sidebar start time period-->
	<section class="simple_sidebar grid_4">
		<label>Time Period</label><br>
		<div class="half" style="width:120px;">
			<label>Start time[1] :</label><br>
			<?php echo form_error('start_time1', '<font color="red">', '</font>'); ?>
			<input type="text" name="start_time1" id="start_time1" value="<?php echo $tour[0]->start_time1;?>">
		</div>	
		<div class="half last" style="width:120px;">
			<label>End time[1] :</label><br>
			<?php echo form_error('end_time1', '<font color="red">', '</font>'); ?>
			<input type="text" name="end_time1" id="end_time1" value="<?php echo $tour[0]->end_time1;?>">
		</div>					
		<div class="clearfix"></div>	

		<div class="half" style="width:120px;">
			<label>Start time[2] :</label><br>
			<?php echo form_error('start_time2', '<font color="red">', '</font>'); ?>
			<input type="text" name="start_time2" id="start_time2" value="<?php echo $tour[0]->start_time2;?>">
		</div>	
		<div class="half last" style="width:120px;">
			<label>End time[2] :</label><br>
			<?php echo form_error('end_time2', '<font color="red">', '</font>'); ?>
			<input type="text" name="end_time2" id="end_time2" value="<?php echo $tour[0]->end_time2;?>">
		</div>					
		<div class="clearfix"></div>
		
		<div class="half" style="width:120px;">
			<label>Start time[3] :</label><br>
			<?php echo form_error('start_time3', '<font color="red">', '</font>'); ?>
			<input type="text" name="start_time3" id="start_time3" value="<?php echo $tour[0]->start_time3;?>">
		</div>	
		<div class="half last" style="width:120px;">
			<label>End time[3] :</label><br>
			<?php echo form_error('end_time3', '<font color="red">', '</font>'); ?>
			<input type="text" name="end_time3" id="end_time3" value="<?php echo $tour[0]->end_time3;?>">
		</div>					
		<div class="clearfix"></div>				
	</section>
	<!-- Sidebar end time period-->


	<!-- Start map -->
	<section class="simple_sidebar grid_4">
        <h3 class="">{_ location_lang_location}</h3>
        <div id="mapCanvas" style="height:300px;"></div>
        Longitude : <input value="<?php echo set_value('longitude');?>" id="longitude" name="longitude" value="<?php echo $tour[0]->longitude;?>">
        <br />
        Latitude : <input value="<?php echo set_value('latitude');?>" id="latitude" name="latitude" value="<?php echo $tour[0]->latitude;?>">
        <br />
        Address : <input value="" id="address" name="address">
	</section>	
	<!-- End map -->



<script>
		var agencies = new Array();
</script>
	<!-- Agency Information -->
	<style type="text/css">
	.similar_hotels div{
		height: auto;
	}
	</style>

	<section class="similar_hotels grid_8">
		<h2 class="section_heading" >
			<span style="margin: 5px 0px 0px 0px; font: 20px Arial, sans-serif;">
				Agency Information 
				<!-- input type="search" id="query_agencyname" style="width:30%;" disabled/ -->
				<select id="query_agencyname">
				<?php 
					foreach ($agency as $key => $value) {
						# code...
				?>
				  <option value="<?php echo $value->name;?>"><?php echo $value->name;?></option>
				<?php
					}
				?>	
				</select>				
				<input type="hidden" id="hidden_agency_id" />
				
				<!-- span style="cursor:pointer; font: 15px Arial, sans-serif;" id="add_new_agency">[ Add New ]<span -->

				<span style="cursor:pointer; font: 15px Arial, sans-serif;" id="add_agency">[ Add to tour ]<span>
			</span>
		</h2>
		<br>

		<ul>
			<span id="add_loading"></span>
			<span  id="add_agency_area">
			</span>
		<?php


		if(is_array($agencyTour)){
			$countAgencyTour = count($agencyTour);
			$count =  0;
			foreach ($agencyTour as $key => $value) {			
		?>
			<script>
				agencies[<?php echo $value->agency_id;?>] = "<?php echo $value->agency_name;?>";
			</script>		
			<li id='agency_price_<?php echo $value->agency_id;?>'>
			     <div>			     	
			     	<span style='float:left; margin-left:10px; font: 20px Arial, sans-serif; width:auto'>
			     	<?php echo $value->agency_name;?>
			     	<input type='hidden' name='agency_tour[<?php echo $count;?>][agency_id]' value='<?php echo $value->agency_id;?>'>
			         </span>
			     	<span style='float:left; margin-left:10px; font: 20px Arial, sans-serif; width:10%'>
			     	<span style='cursor:pointer;' id='delete_agency' onClick='deleteRow("delete", <?php echo $value->agency_id;?>)'>[ - ]<span>
			        </span>
			     </div>
			     <div class='clearfix'></div>
			     		
			     <div>
			     	<span class='price' style='margin-left:10px; border-left:0px;'>		
			     		<label>Adult Sale :</label><br>
			     		<input type='text' name='agency_tour[<?php echo $count;?>][sale_adult_price]' value='<?php echo $value->sale_adult_price;?>'>
			     	</span>
			     	<span class='price' style='margin-left:10px; border-left:0px;'>		
			     		<label>Adult Net :</label><br>
			     		<input type='text' name='agency_tour[<?php echo $count;?>][net_adult_price]' value='<?php echo $value->net_adult_price;?>'>
			     	</span>
			     	<span class='price' style='margin-left:10px; border-left:0px;'>		
			     		<label>Adult discount :</label><br>
			     		<input type='text' name='agency_tour[<?php echo $count;?>][discount_adult_price]' value='<?php echo $value->discount_adult_price;?>'>
			     	</span>
			     </div>
			     		
			     <div>
			     	<span class='price' style='margin-left:10px; border-left:0px;'>		
			     		<label>Child Sale :</label><br>
			     		<input type='text' name='agency_tour[<?php echo $count;?>][sale_child_price]' value='<?php echo $value->sale_child_price;?>'>
			     	</span>
			     	<span class='price' style='margin-left:10px; border-left:0px;'>		
			     		<label>Child Net :</label><br>
			     		<input type='text' name='agency_tour[<?php echo $count;?>][net_child_price]' value='<?php echo $value->net_child_price;?>'>
			     	</span>
			     	<span class='price' style='margin-left:10px; border-left:0px;'>		
			     		<label>Child discount :</label><br>
			     		<input type='text' name='agency_tour[<?php echo $count;?>][discount_child_price]' value='<?php echo $value->discount_child_price;?>'>
			     	</span>
			     </div>
			     <div class='clear'></div>
			   	<br>
			   </li>		

		<?php
				$count++;
			}
		}
		?>
		</ul>
		<ul>
			<li>
				<input type="submit" value="Submit" class="auto_width" id="save">	<br>			
			</li>
		</ul>		
	</section>



	<script type="text/javascript">
		function agencyValidateByName(str){

			var url ="<?php echo base_url('/agency/hasdata/');?>"+str;
			var response = $.ajax({ type: "GET",   
			                        url: url,   
			                        async: false
			                      }).responseText;

			return response;
		}

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

		function agencyPriceForm(num, agency_id, agency_name){

			var agency_form = " ";
			agency_form += "<li id='agency_price_"+agency_id+"'>";
			//agency_form += "   	<span style='font: 32px Arial, sans-serif; float:left;'>";
			//agency_form += "      "+num;
			//agency_form += "    </span>";
			agency_form += "    <div>";
			agency_form += "    	<span style='float:left; margin-left:10px; font: 20px Arial, sans-serif; width:auto'>";
			agency_form += "    	[New] "+agency_name;
			agency_form += "    	<input type='hidden' name='agency_tour["+element+"][agency_id]' value='"+agency_id+"'>";
			agency_form += "        </span>";
			agency_form += "    	<span style='float:left; margin-left:10px; font: 20px Arial, sans-serif; width:10%'>";
			agency_form += "    	<span style='cursor:pointer; id='delete_agency' onClick='deleteRow(\"delete\", "+agency_id+");'>[ - ]<span>";
			agency_form += "        </span>";
			agency_form += "    </div>";
			agency_form += "    <div class='clearfix'></div>";
			agency_form += "    ";		
			agency_form += "    <div>";
			agency_form += "    	<span class='price' style='margin-left:10px; border-left:0px;'>";		
			agency_form += "    		<label>Adult Sale :</label><br>";
			agency_form += "    		<input type='text' name='agency_tour["+element+"][sale_adult_price]'>";
			agency_form += "    	</span>";
			agency_form += "    	<span class='price' style='margin-left:10px; border-left:0px;'>";		
			agency_form += "    		<label>Adult Net :</label><br>";
			agency_form += "    		<input type='text' name='agency_tour["+element+"][net_adult_price]'>";
			agency_form += "    	</span>";
			agency_form += "    	<span class='price' style='margin-left:10px; border-left:0px;'>";		
			agency_form += "    		<label>Adult discount :</label><br>";
			agency_form += "    		<input type='text' name='agency_tour["+element+"][discount_adult_price]'>";
			agency_form += "    	</span>";
			agency_form += "    </div>";
			agency_form += "    ";		
			agency_form += "    <div>";
			agency_form += "    	<span class='price' style='margin-left:10px; border-left:0px;'>";		
			agency_form += "    		<label>Child Sale :</label><br>";
			agency_form += "    		<input type='text' name='agency_tour["+element+"][sale_child_price]'>";
			agency_form += "    	</span>";
			agency_form += "    	<span class='price' style='margin-left:10px; border-left:0px;'>";		
			agency_form += "    		<label>Child Net :</label><br>";
			agency_form += "    		<input type='text' name='agency_tour["+element+"][net_child_price]'>";
			agency_form += "    	</span>";
			agency_form += "    	<span class='price' style='margin-left:10px; border-left:0px;'>";		
			agency_form += "    		<label>Child discount :</label><br>";
			agency_form += "    		<input type='text' name='agency_tour["+element+"][discount_child_price]'>";
			agency_form += "    	</span>";
			agency_form += "    </div>";
			agency_form += "    <div class='clear'></div>";
			agency_form += "  <br>";
			agency_form += "  </li>";


			element++;

			return agency_form;
		}

		var element = <?php echo isset($countAgencyTour)?$countAgencyTour:0;?>;
		var count = 0;
		var num = 1;

		$("#add_new_agency").click(function () {
			$("#query_agencyname").prop('disabled', false);
			$("#query_agencyname").focus();
		});

		$("#add_agency").click(function () {

			var agency_name = $("#query_agencyname").val();

			var found = agencies.indexOf(agency_name);

			if(agency_name.length > 0){

				//Check duplicate data
				if(found == -1){


					//Loading...
					var path = '<?php echo base_url("themes/Travel/images/loading_agency.gif"); ?>';
					var loading = "<img src='"+path+"'>";
					$("#add_loading").html(loading);

					//Call recheck data input
					var response = agencyValidateByName(agency_name);
					//alert(response);
					if(response.length>0 && response != 0){

						var responseData = response.split(",");
						agencies[responseData[0]] = responseData[1];
						count++;

						var res = response.split(",");
						var html = agencyPriceForm(num, res[0], res[1]);
						num++;
						$("#add_agency_area").append(html);
					
						$("#add_agency_area").append(function(){
							deleteRow();
						});						
						$("#query_agencyname").val("");
						$("#query_agencyname").focus();
						$("#add_loading").html("");

					}else if(response == 0){
						alert("ไม่มีชื่อ Agency นี้อยู่");
						$("#query_agencyname").val("");
						$("#query_agencyname").focus();
					}

				
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

	</script>	


	<?php
	//Autosuggest && Autocomplete
	PageUtil::addVar("javascript", '<script type="text/javascript" src="'.base_url("themes/Travel/js/autocomplete/jquery.autocomplete.js").'"></script>');
	PageUtil::addVar("stylesheet",'<link rel="stylesheet" media="all" type="text/css"  href="'.base_url("themes/Travel/js/autocomplete/jquery.autocomplete.css").'">');

	?>

	<script type="text/javascript">
	$(document).ready(function() {

		//"http://localhost/jquery/jquery-autocomplete/demo/search.php"
		
		var url ="<?php echo base_url('/agency/phpsearch/');?>";	
		$("#query_agencyname").autocomplete(url, {
			width: 260,
			selectFirst: false,
			urlType: "short",
			shortUrl: url,
			hiddenId : "hidden_agency_id"
		});

	});
	</script>



	<?php echo form_close();?>	
</div>


<?php
	//print_r($tour);
?>
