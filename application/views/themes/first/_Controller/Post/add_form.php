<?php
PageUtil::addVar("title",$this->lang->line("post_lang_add_post"));
PageUtil::addVar("javascript",'
<script type="text/javascript">
  $(document).ready(function(){
    tinyMCE.init({
        mode : "specific_textareas",
        editor_selector : "mceEditor",
        width: "100%",
        theme : "advanced",
        plugins : "images, youtube, inlinepopups,autoresize,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
        theme_advanced_buttons1: "justifyleft,justifycenter,justifyright,justifyfull,|,tablecontrols,|,images,youtube,|,bold,italic,underline,strikethrough,|,undo,redo,|,cut,copy,paste,|,code",
        //theme_advanced_buttons1 : "fullscreen,save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        //theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        //theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        //theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
        theme_advanced_toolbar_location : "external",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : false,
        theme_advanced_source_editor_width: 740,
        autoresize_min_height: 500,
        autoresize_not_availible_height: 10,
        autoresize_on_init: true,
        autoresize_hide_scrollbars: true
    });
  });
</script>');
?>

<div id="add_form">
<?php echo form_open(base_url('post/add')); ?>

<div class="topHolder">
<span class="GM1BAGKBGJB blogg-title">โพสต์</span>
<span class="GM1BAGKBJJB blogg-title">·</span>
<?php
echo form_input('title', '', 'class="GM1BAGKBHEC titleField textField GM1BAGKBGEC" dir="ltr" title="ชื่อ" size="60"');
?>
<span class="GM1BAGKBNIB">
  <?php echo form_submit('submit', $this->lang->line("post_lang_submit"), 'class="blogg-button blogg-primary"'); ?>
  <button class="blogg-button GM1BAGKBHJB" tabindex="0">บันทึก</button>
  <button class="blogg-button" tabindex="0">แสดงตัวอย่าง</button>
  <button class="blogg-button" tabindex="0">ปิด</button>
</span>
</div>
<div id="editorPanel">
</div>
<div id="wrapper-editor">
  <div id="editor">
    <textarea name="body" class="mceEditor" style="width:100%"></textarea>
  </div>
  <div class="clear"></div>
</div>
</div>
<div id="add_form_right">
<?php
  echo form_label('URL', 'url' );
  echo form_input('url', '', '');
?>
</div>
<div class="clear"></div>
