    <footer>
      <div class="row">
        <div class="shadow"></div>
        <div class="seven columns">
          <nav>
            <ul class="menu_footer">
              <li><a href="<?php echo base_url();?>">หน้าแรก</a></li>
              <li><a href="<?php echo base_url($this->lang->line("tour_lang_location"));?>"><?php echo $this->lang->line("global_lang_location"); ?></a></li>
              <li><a href="<?php echo base_url($this->lang->line("url_lang_tour"));?>"><?php echo $this->lang->line("global_lang_tour_packages");?></a></li>
              <li><a href="<?php echo base_url($this->lang->line("url_lang_hotel"));?>"><?php echo $this->lang->line("global_lang_hotel"); ?></a></li>
              <li><a href="<?php echo base_url($this->lang->line("url_lang_location").'/'.Util::url_title($this->lang->line("global_lang_contact_us")).'-119');?>">ติดต่อเรา</a></li>
            </ul>
          </nav>
          <div class="clearfix"></div>
          <p>Copyright © 2012-2014 U As Travel Part., Ltd.</p>
        </div>
        <div class="five columns">
          <div class="address">
            <p>U As Travel Part., Ltd.</p>
            <p>Email: info@uastravel.com</p>
            <p>Tel. 093-741-8887, 082-812-1146, 076-331-280</p>
            <p>Fax: 076-331-273</p>
            <p>80/86 หมู่บ้านศุภาลัยฮิล ซ.5 อ.เมือง จ.ภูเก็ต 83000</p>
          </div>
        </div>
      </div>
    </footer>