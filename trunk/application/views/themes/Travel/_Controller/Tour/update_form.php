
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
	});
</script>

<div class="container_12">

	<!-- Form -->
	<?php echo form_open(base_url("tour/update"));?>	
	<section class="grid_8">
		<h2 class="section_heading">Add Tour Information [ <a href="<?php echo base_url("tour");?>">list</a> ]</h2>
		<br>		
			<input type="hidden" name="id" value="<?php echo $tour[0]->id;?>">
			<!--  Start Tour information -->		
			<div class="half">
				<label>Tour Name :</label> <?php echo form_error('name', '<font color="red">', '</font>'); ?>
				<input type="text" name="name" value="<?php echo $tour[0]->name;?>">
			</div>
			<div class="clearfix"></div>

			<label>Tour Description : </label> <?php echo form_error('description', '<font color="red">', '</font>'); ?>
			<div class="textarea">
				<textarea cols="30" rows="10" name="description"><?php echo $tour[0]->description;?></textarea>
			</div>
			<div class="clearfix"></div>

			<label>Tour Detail : </label> <?php echo form_error('detail', '<font color="red">', '</font>'); ?>
			<div class="textarea">
				<textarea cols="30" rows="10" name="detail"><?php echo $tour[0]->description;?></textarea>
			</div>
			<div class="clearfix"></div>

			<label>Tour included : </label>	<?php echo form_error('included', '<font color="red">', '</font>'); ?>
			<div class="textarea"> 
				<textarea cols="30" rows="10" name="included"><?php echo $tour[0]->included;?></textarea>
			</div>
			<div class="clearfix"></div>

			<label>Tour Remark : </label>	
			<div class="textarea">
				<textarea cols="30" rows="10" name="remark"><?php echo $tour[0]->remark;?></textarea>
			</div>
			<div class="clearfix"></div>
			<!--  End Tour information -->


			<!--  Start Time information -->
			<hr class="dashed grid_7">			
			<div class="half">
				<label>Start time :</label><br>
				<?php echo form_error('start_time', '<font color="red">', '</font>'); ?>
				<input type="text" name="start_time" id="start_time" value="<?php echo $tour[0]->start_time;?>">
			</div>	
			<div class="half last">
				<label>End time :</label><br>
				<?php echo form_error('end_time', '<font color="red">', '</font>'); ?>
				<input type="text" name="end_time" id="end_time" value="<?php echo $tour[0]->end_time;?>">
			</div>					
			<div class="clearfix"></div>			
			<!--  End Time information -->
	</section>



	<!-- Sidebar -->
	<section class="simple_sidebar grid_4">
		
		<label>Tag</label><label style="position:absolute;right:240px;"><span style="cursor:pointer;"  id="show_all">show all</span></label>
		<textarea id="textarea" class="example" rows="1" style="width: 250px;"></textarea>
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
			//Function tag 
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
					        $('#textarea').textext()[0].tags().addTags([ $('#addtag<?php echo $count; ?>').text() ]);
					    });
					</script>	
				<?php			
					$count++;
				}
			}
		?>
	</section>





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
				<input type="search" id="query_agencyname" style="width:50%" />
				<input type="hidden" id="hidden_agency_id" />
				
				[<span style="cursor:pointer;" id="add_agency"> + <span>]
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
				agencies[<?php echo $count;?>] = "<?php echo $value->agency_name;?>";
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
				<input type="submit" value="Submit" class="auto_width">	<br>			
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

		var element = <?php echo $countAgencyTour;?>;
		var count = 0;
		var num = 1;


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
						agencies[count] = agency_name;
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



	<?php echo form_close();?>	
</div>


<?php
	print_r($agencyTour);
?>
