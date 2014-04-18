<!-- Menu -->
<div class="row">
  <div class="twelve columns">
    <nav class="top-bar">
      <ul>
        <li class="name">
          <a href="<?php echo base_url();?>">
            <img src="<?php echo $themepath.'/images/logo.png';?>" alt="<?php echo $this->lang->line("global_lang_home_desc");?>">
          </a>
        </li>
        <li class="toggle-topbar"><a href="#"></a></li>
      </ul>
      
      <section>
        <ul class="right">
          <li><a href="<?php echo base_url($this->lang->line("tour_lang_location"));?>"><?php echo $this->lang->line("global_lang_location"); ?></a></li>
          <li><a href="<?php echo base_url($this->lang->line("url_lang_tour"));?>"><?php echo $this->lang->line("global_lang_tour_packages");?></a></li>
          <li><a href="<?php echo base_url($this->lang->line("url_lang_hotel"));?>"><?php echo $this->lang->line("global_lang_hotel"); ?></a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="<?php echo base_url($this->lang->line("url_lang_location").'/'.Util::url_title($this->lang->line("global_lang_contact_us")).'-119');?>"><?php echo $this->lang->line("global_lang_contact_us");?></a></li>
        </ul>
      </section>
    </nav>
  </div>
</div>
<!-- End Menu -->