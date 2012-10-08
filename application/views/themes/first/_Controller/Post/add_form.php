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

<BR />
<?php
echo form_label('URL', 'url');
echo form_input('url', '', '');

echo form_submit('submit', 'Submit Post!');
?>


</div>
<div id="add_form_right">
  asds
</div>
<div class="clear"></div>

<?php echo form_close(); ?>