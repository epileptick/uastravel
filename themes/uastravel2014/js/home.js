
  document.write('<style>.noscript { display: none; }</style>');
      (function($){
          $.fn.GalleryRefresh = function(){
            // We only want these styles applied when javascript is enabled
            $('div.content').css('display', 'block');
            // Initially set opacity on thumbs and add
            // additional styling for hover effect on thumbs
            var onMouseOutOpacity = 1;
            // Initialize Advanced Galleriffic Gallery
            var gallery = $('#thumbs').galleriffic({
              delay:                     6000,
              numThumbs:                 15,
              preloadAhead:              40,
              enableTopPager:            false,
              enableBottomPager:         false,
              maxPagesToShow:            7,
              imageContainerSel:         '#slideshow',
              controlsContainerSel:      '#controls',
              captionContainerSel:       '#caption',
              loadingContainerSel:       '#loading',
              renderSSControls:          false,
              renderNavControls:         true,
              playLinkText:              'Play Slideshow',
              pauseLinkText:             'Pause Slideshow',
              prevLinkText:              'รูปก่อนหน้า',
              nextLinkText:              'รูปถัดไป',
              nextPageLinkText:          'Next &rsaquo;',
              prevPageLinkText:          '&lsaquo; Prev',
              enableHistory:             false,
              autoStart:                 true,
              syncTransitions:           true,
              defaultTransitionDuration: 3000,
              onSlideChange:             function(prevIndex, nextIndex) {
                // 'this' refers to the gallery, which is an extension of $('#thumbs')
                this.find('ul.thumbs').children()
                  .eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
                  .eq(nextIndex).fadeTo('fast', 0.67);
              },
              onPageTransitionOut:       function(callback) {
                this.fadeTo('fast', 0.0, callback);
              },
              onPageTransitionIn:        function() {
                this.fadeTo('fast', 1.0);
              }
            });
            var myPhotoSwipe = $("#gallery_mobile a").photoSwipe({ enableMouseWheel: false , enableKeyboard: false });
            $('.thumbs > li a').hoverdir();
          };
      })(jQuery);

      function initialize(latitude, longitude) {
        var latLng = new google.maps.LatLng(latitude,longitude);
        var map = new google.maps.Map(document.getElementById('mapCanvas'), {
          scrollwheel: false,
          zoom: 13,
          center: latLng,
          disableDefaultUI:false,
          streetViewControl:true,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        marker = new google.maps.Marker({
          position: latLng,
          title: '',
          map: map,
          draggable: false
        });
      }

      jQuery(document).ready(function($) {
        if($("#gallery_row section").length > 0){
          $().GalleryRefresh();
        }
      });
      $(document).ajaxComplete(function(){
          try{
              FB.XFBML.parse();
              if($("#gallery_row section").length > 0){
                $().GalleryRefresh();
              }
              addthis.update('share', 'url', window.location.href); // new url
              addthis.update('share', 'title', window.document.title); // new title.
              addthis.toolbox('.addthis_toolbox');
          }catch(ex){}
      });
      function processAjaxData(title, respond, left, urlPath){
         document.title = title;
         window.history.pushState({"respond":respond,"left":left,"pageTitle":title},"", urlPath);
      }
      window.onpopstate = function(e){
                                      if(e.state){
                                        document.title = e.state.pageTitle;
                                        $(".right_columns").hide().html(e.state.respond.bodyRedered).fadeIn(300);
                                        $(".left_columns").hide().html(e.state.left).fadeIn(300);
                                        $("#gallery_row").hide().html(e.state.respond.imagesRedered).fadeIn(300).css("height","");
                                        $("a#title").html(e.state.pageTitle);
                                        if(e.state.respond.data.location != undefined){
                                          initialize(e.state.respond.data.location.latitude, e.state.respond.data.location.longitude);
                                        }
                                        FB.XFBML.parse();
                                        if($("#gallery_row section").length > 0){
                                          $().GalleryRefresh();
                                        }
                                        $('ul.sub-menu').each(function (item) {
                                          if($(this).attr("active") == "false"){
                                            $(this).toggle(200);
                                          }else{
                                            $(this).parent().find('img:first').addClass("rotate");
                                          }
                                        });
                                        addthis.update('share', 'url', window.location.href); // new url
                                        addthis.update('share', 'title', window.document.title); // new title.
                                        addthis.button('.addthis_toolbox');
                                      }
                                    };