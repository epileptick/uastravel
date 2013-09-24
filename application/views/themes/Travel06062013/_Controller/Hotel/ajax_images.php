    <!-- Gallery -->
    <?php
    if(!empty($images)):
    ?>
      <section class="gallery_pc">
        <div class="eight columns">
          <div id="gallery" class="content">
            <div id="controls" class="controls"></div>
            <div class="slideshow-container">
              <div id="loading" class="loader"></div>
              <div id="slideshow" class="slideshow"></div>
            </div>
            <div id="caption" class="caption-container"></div>
          </div>
        </div>
        <div class="four columns">
          <div id="thumbs" class="navigation">
            <ul class="thumbs noscript">
              <?php
                //print_r($images); exit;
              if(!empty($images)){
                foreach ($images as $key => $value) {
              ?>
              <li>
                <a class="thumb"  href="<?php echo $value['url'];?>" >
                  <img src="<?php echo $value['url'];?>" alt="<?php echo $hotel[0]["name"];?>" />
                  <div><span></span></div>
                </a>
                <div class="captions">
                  <div class="image-title"><?php echo $hotel[0]["name"];?></div>
                  <div class="image-desc"><?php echo $hotel[0]["short_description"];?></div>
                </div>
              </li>
              <?php
                }
              }
              ?>
            </ul>
          </div>
        </div>
      </section>
      <section class="gallery_mobile">
        <ul id="gallery_mobile">
          <?php
          if(!empty($images)){
            foreach ($images as $key => $value) {
          ?>
            <li>
              <a href="<?php echo $value['url'];?>">
                <img src="<?php echo $value['url'];?>" alt="<?php echo $hotel[0]["name"];?>" />
              </a>
            </li>
          <?php
            }
          }
          ?>
        </ul>
      </section>
    <?php
      endif;
    ?>
    <!-- End Gallery -->