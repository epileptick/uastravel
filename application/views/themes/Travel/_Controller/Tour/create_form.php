
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


//Autosuggest && Autocomplete
PageUtil::addVar("javascript", '<script type="text/javascript" src="'.base_url("themes/Travel/js/autocomplete/autocomplete.js").'"></script>');

/////////////////////
//End Datepicker
////////////////////
?>

<script>
	$(document).ready(function(){
		$('#start_time').timepicker({
			hourGrid: 4,
			minuteGrid: 10
		});

		$('#end_time').timepicker({
			hourGrid: 4,
			minuteGrid: 10
		});

		$('#start_date').datepicker({
			dateFormat: "yy-mm-dd"
		});

		$('#end_date').datepicker({
			dateFormat: "yy-mm-dd"
		});		
	});
</script>


	
<?php echo form_open(base_url("tour/create"));?>	
<div class="container_12">

	<!-- Filter -->
	<section class="grid_8">
		<h2 class="section_heading">
			<span style="margin: 5px 0px 0px 0px; font: 20px Arial, sans-serif;">Add Tour Information [ <a href="<?php echo base_url("tour");?>">list</a> ]</span>
			<?php
				if(is_array($language)){
					foreach ($language as $key => $value) {
						# code...
						echo $value->acronym;
						echo "|";
					}	
				}
			?>
		</h2>
		<br>	
			<!--  Start Tour information -->		
			<div class="half">
				<label>Tour Name :</label> <?php echo form_error('name', '<font color="red">', '</font>'); ?>
				<input type="text" name="name" value="<?php echo set_value('name');?>">
			</div>
			<div class="clearfix"></div>

			<label>Tour Description : </label> <?php echo form_error('description', '<font color="red">', '</font>'); ?>
			<div class="textarea">
				<textarea cols="30" rows="10" name="description"><?php echo set_value('description');?></textarea>
			</div>
			<div class="clearfix"></div>

			<label>Tour Detail : </label> <?php echo form_error('detail', '<font color="red">', '</font>'); ?>
			<div class="textarea">
				<textarea cols="30" rows="10" name="detail"><?php echo set_value('detail');?></textarea>
			</div>
			<div class="clearfix"></div>

			<label>Tour included : </label>	<?php echo form_error('included', '<font color="red">', '</font>'); ?>
			<div class="textarea"> 
				<textarea cols="30" rows="10" name="included"><?php echo set_value('included');?></textarea>
			</div>
			<div class="clearfix"></div>

			<label>Tour Remark : </label>	
			<div class="textarea">
				<textarea cols="30" rows="10" name="remark"><?php echo set_value('remark');?></textarea>
			</div>
			<div class="clearfix"></div>
			<!--  End Tour information -->

			<!--  Start Time information -->
			<hr class="dashed grid_7">	
	
			<div class="half">
				<label>Start Date :</label><br>
				<?php echo form_error('start_date', '<font color="red">', '</font>'); ?>
				<input type="text" name="start_date" id="start_date" value="<?php echo set_value('start_date');?>">
			</div>	
			<div class="half last">
				<label>End Date :</label><br>
				<?php echo form_error('end_date', '<font color="red">', '</font>'); ?>
				<input type="text" name="end_date" id="end_date" value="<?php echo set_value('end_date');?>">
			</div>					
			<div class="clearfix"></div>

			<div class="half">
				<label>Start time :</label><br>
				<?php echo form_error('start_time', '<font color="red">', '</font>'); ?>
				<input type="text" name="start_time" id="start_time" value="<?php echo set_value('start_time');?>">
			</div>	
			<div class="half last">
				<label>End time :</label><br>
				<?php echo form_error('end_time', '<font color="red">', '</font>'); ?>
				<input type="text" name="end_time" id="end_time" value="<?php echo set_value('end_time');?>">
			</div>					
			<div class="clearfix"></div>			
			<!--  End Time information -->

	</section>


	<!-- Sidebar Tag-->
	<section class="simple_sidebar grid_4">
		
		<label>Tag</label><label style="position:absolute;right:240px;"><span style="cursor:pointer;"  id="show_all">show all</span></label>
		<textarea id="textarea" class="example" rows="1" style="width: 250px;"></textarea>
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
			}
			?>
		</span>
		<script type="text/javascript">
			var validate = "";
			//Function tag 
			$('#textarea')
				.textext({
					plugins : 'tags autocomplete'
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
				});

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
							//alert($('#addtag<?php echo $count; ?>').text());
					        $('#textarea').textext()[0].tags().addTags([ $('#addtag<?php echo $count; ?>').text() ]);
					    });
					</script>	
				<?php			
					$count++;
				}

			}
		?>
	</section>	

	<!-- End Sidebar Tag -->








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
				<input type="search" id="query_agencyname" style="width:50%" />
				<input type="hidden" id="hidden_agency_id" />
				
				[<span style="cursor:pointer;" id="add_agency"> + <span>]
			</span>
		</h2>
		<br>

		<ul id="add_agency_area">
		</ul>

		<ul>
			<li>
				<input type="submit" value="Submit" class="auto_width">	<br>			
			</li>
		</ul>		
	</section>
</div>

<?php echo form_close();?>	


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
		}else{
			//alert("add");
		}
		return false;
	}

		
	function agencyPriceForm(num, agency_id, agency_name){

		var agency_form = "<li id='agency_price_"+agency_id+"'>";
		agency_form += "   	<span style='font: 32px Arial, sans-serif; float:left;'>";
		agency_form += "      "+num;
		agency_form += "    </span>";
		agency_form += "    <div>";
		agency_form += "    	<span style='float:left; margin-left:10px; font: 20px Arial, sans-serif; width:auto'>";
		agency_form += "    	"+agency_name;
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

	var element = 0;
	var count = 0;
	var num = 1;
	var agencies = new Array();

	$("#add_agency").click(function () {

		var tour_name = $("#query_agencyname").val();

		var found = agencies.indexOf(tour_name);

		if(tour_name.length > 0){

			//Check duplicate data
			if(found == -1){
				//Call recheck data input
				var response = agencyValidateByName(tour_name);
				//alert(response);
				if(response.length>0 && response != 0){
					agencies[count] = tour_name;
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
	var url ="http://localhost/uastravel/tag/jssearch/";	
	$("#query_agencyname").autocomplete(url, {
		width: 260,
		selectFirst: false,
		urlType: "short",
		shortUrl: "http://localhost/uastravel/agency/phpsearch/",
		hiddenId : "hidden_agency_id"
	});

});
</script>



		
