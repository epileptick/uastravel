<?php
PageUtil::addVar("title",$this->lang->line("location_lang_add_post"));

PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/style/form.css">');
PageUtil::addVar("stylesheet",'<style type="text/css">@import url('.Util::ThemePath().'/js/plupload/jquery.plupload.queue/css/jquery.plupload.queue.css);</style>');
PageUtil::addVar("javascript",'<script type="text/javascript" src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>');
PageUtil::addVar("javascript",'<script type="text/javascript" src="'.Util::ThemePath().'/js/plupload/plupload.full.js"></script>');
PageUtil::addVar("javascript",'<script type="text/javascript" src="'.Util::ThemePath().'/js/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>');
//Autosuggest && Autocomplete
PageUtil::addVar("javascript", '<script type="text/javascript" src="'.base_url("themes/Travel/js/autocomplete/autocomplete.js").'"></script>');

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
    if($("#id").val()!=0){
      $.post(\''.base_url('admin/article/create/').'\',{id: $("#id").val(),title: $("#title").val(), body:tinyMCE.get("txtBody").getContent(),tag_id:$("#tag_id").val(), ajax: 1, force: 1, lang: $("#lang").val() },successHandler);
    }else if($("#id").val()==0){
      $.post(\''.base_url('admin/article/create/').'\',{title: $("#title").val(), body:tinyMCE.get("txtBody").getContent(),tag_id:$("#tag_id").val(), ajax: 1, force: 1, lang: $("#lang").val() },successHandler);
    }
  }
  updateImages();
  function updateImages(){
            $.post("'.base_url("/images/ajax_list").'", { parent_id: $("#id").val(),table_id:4 },
            function(data) {

              $("#side_bar_block_image").hide().html(data).fadeIn(300);
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
          toolbar: "insertfile undo redo | styleselect | bold italic | fontselect | fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor | hr",
          autosave_ask_before_unload: true,
          autoresize_min_height: 500,
          autoresize_not_availible_height: 10,
          autoresize_on_init: true,
          autoresize_hide_scrollbars: false
      });


  function successHandler(data){
    //console.log(data);
    var json = jQuery.parseJSON(data);
    $("#id").val(json.id);
    $("#status").html(json.status).show("slow");
    $("#span_status").show("slow").delay(3000).hide("slow");
    var $uploader = $("#uploader").pluploadQueue();
    $uploader.settings.multipart_params = {parent_id: $(\'#id\').val(), table_id:4};
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
?>
  <!-- Blogpost -->
  <section class="blogpost grid_12">

  <h2 class="section_heading text_big"><?=$this->lang->line("location_lang_add_post")?></h2>
  <div id="add_form">
  <div id="status"></div>
<?php
$base_url = explode(".", base_url());
$base_url = str_replace("http://", "", $base_url);
if(count($base_url) > 2){
  $base_url = $base_url[1].".".$base_url[2];
}else{
  $base_url = $base_url[0].".".$base_url[1];
}
?>
  <?php echo form_open(base_url('admin/article/create'),'enctype="multipart/form-data"'); ?>
      <script type="text/javascript">
      $(function(){
        $("#lang").change(function(){

          var id = $("#id").val();
          window.location='http://'+this.value+'.<?php echo $base_url;?>admin/article/create/'+id;
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
      <div class="clearfix"></div>
  <input type="hidden" value="<?php if(!empty($post[0]['id'])){echo $post[0]['id'];}?>" id="id" name="id" />
  <span id="fedfe"></span>
  <div class="topHolder">
    <span class="GM1BAGKBGJB blogg-title">โพสต์</span>
    <span class="GM1BAGKBJJB blogg-title">·</span>
    <?php
      if(!empty($post[0]['title'])){
        echo form_input('title', $post[0]['title'], 'id="title" class="GM1BAGKBHEC titleField textField GM1BAGKBGEC" dir="ltr" title="ชื่อ" size="60"');
      }else{
        echo form_input('title', "", 'id="title" class="GM1BAGKBHEC titleField textField GM1BAGKBGEC" dir="ltr" title="ชื่อ" size="60"');
      }
    ?>
    <span class="GM1BAGKBNIB">
      <?php echo form_submit('submit', $this->lang->line("location_lang_submit"), 'class="blogg-button blogg-primary" id="save"'); ?>
      <a href="<?php echo base_url("admin/article");?>" class="blogg-button">ปิด</a>
    </span>
  </div>
    <div id="wrapper-editor">
      <div id="editor">
        <textarea name="body" class="mceEditor" style="width:100%" id="txtBody" >
        <?php if(!empty($post[0]['body'])){echo $post[0]['body'];}?>
        </textarea>
      </div>
      <div class="clear"></div>
    </div>
    <hr class="dashed" />
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
        <h3 class="location">{_ global_lang_article_type}</h3>
        <select name="type">

            <option value="0" <?php if(empty($post[0]['type']))echo "selected";?>>สำหรับหน้าแรก</option>
            <option value="1" <?php if(!empty($post[0]['type']) AND $post[0]['type'] == 1)echo "selected";?>>สำหรับสถานที่ท่องเที่ยว</option>
            <option value="2" <?php if(!empty($post[0]['type']) AND $post[0]['type'] == 2)echo "selected";?>>สำหรับทัวร์</option>
            <option value="3" <?php if(!empty($post[0]['type']) AND $post[0]['type'] == 3)echo "selected";?>>สำหรับโรงแรม</option>
            <option value="4" <?php if(!empty($post[0]['type']) AND $post[0]['type'] == 4)echo "selected";?>>สำหรับ Customtour</option>

      </select>
      </div>

      <div class="side_bar_block">
        <h3 class="location">{_ location_lang_tag}</h3>
        <select name="tag_id">
            <option value="0" selected>หน้าแรก</option>
<?php
        foreach ($tag as $key => $value) {
          if($post[0]['tag_id'] == $value["tag_id"]){
?>
            <option value="<?php echo $value["tag_id"]; ?>" selected><?php echo $value["name"]; ?></option>
<?php
          }else{
?>
            <option value="<?php echo $value["tag_id"]; ?>"><?php echo $value["name"]; ?></option>
<?php
          }
        }
?>
      </select>
      </div>
      <div class="side_bar_block">
        <h3 class="location">{_ global_lang_province}</h3>
        <select name="province_id">
            <option value="0" selected>ไม่ระบุ</option>
<?php
        foreach ($tagProvince as $key => $value) {
          if($post[0]['province_id'] == $value["tag_id"]){
?>
            <option value="<?php echo $value["tag_id"]; ?>" selected><?php echo $value["name"]; ?></option>
<?php
          }else{
?>
            <option value="<?php echo $value["tag_id"]; ?>"><?php echo $value["name"]; ?></option>
<?php
          }
        }
?>
      </select>
      </div>
    </div>
    <div class="clear"></div>
  </section>
  <?php echo form_close(); ?>
  <div class="clearfix"></div>

  <hr class="dashed grid_12" />
