<?=form_open(base_url('user/login'));?>
{_login_lang_username}<input type="text" name="username" value="" /><BR />
{_login_lang_password}<input type="password" name="password" value="" /> 
<BR />
<?=form_submit('submit', 'Submit Post!');?>
<?=form_close(); ?>


