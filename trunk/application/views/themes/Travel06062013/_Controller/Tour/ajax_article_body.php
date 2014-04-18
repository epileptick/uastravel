
            <?php
              if(!empty($article)){
            ?>
              <h2 class="head_title">
              <?php
                  if(! empty($article['title'])){
                    echo $article['title'];
                  }
                  ?>
              </h2>

              <div class="row" id="gallery_row">
              </div>
              <div class="twelve">
                <div class="social_network">
                  <!-- AddThis Button BEGIN -->
                  <div class="addthis_toolbox addthis_default_style" >
                  <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                  <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>

                  <!--<a class="addthis_counter addthis_pill_style"></a>-->
                  </div>
                  <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-508ccf0302149b28"></script>
                  <!-- AddThis Button END -->
                </div>
              </div>
              <div class="row">
                <div class="four columns">
                  <?php
                  if(! empty($article['body_column'][0])){
                    echo $article['body_column'][0];
                  }
                  ?>
                </div>
                <div class="four columns">
                  <?php
                  if(! empty($article['body_column'][1])){
                    echo $article['body_column'][1];
                  }
                  ?>
                </div>
                <div class="four columns">
                  <?php
                  if(! empty($article['body_column'][2])){
                    echo $article['body_column'][2];
                  }
                  ?>
                </div>
              </div>
            <?php
            }
            ?>