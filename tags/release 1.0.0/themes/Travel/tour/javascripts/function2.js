//Gallery
document.write('<style>.noscript { display: none; }</style>');  
jQuery(document).ready(function($) {
  // We only want these styles applied when javascript is enabled
  $('div.content').css('display', 'block');

  // Initially set opacity on thumbs and add
  // additional styling for hover effect on thumbs
  var onMouseOutOpacity = 1;
  $('#thumbs ul.thumbs li').opacityrollover({
    mouseOutOpacity:   onMouseOutOpacity,
    mouseOverOpacity:  0.67,
    fadeSpeed:         'fast',
    exemptionSelector: '.selected'
  });
  
  // Initialize Advanced Galleriffic Gallery
  var gallery = $('#thumbs').galleriffic({
    delay:                     2500,
    numThumbs:                 15,
    preloadAhead:              10,
    enableTopPager:            true,
    enableBottomPager:         true,
    maxPagesToShow:            7,
    imageContainerSel:         '#slideshow',
    controlsContainerSel:      '#controls',
    captionContainerSel:       '#caption',
    loadingContainerSel:       '#loading',
    renderSSControls:          true,
    renderNavControls:         true,
    playLinkText:              'Play Slideshow',
    pauseLinkText:             'Pause Slideshow',
    prevLinkText:              'รูปก่อนหน้า',
    nextLinkText:              'รูปถัดไป',
    nextPageLinkText:          'Next &rsaquo;',
    prevPageLinkText:          '&lsaquo; Prev',
    enableHistory:             false,
    autoStart:                 false,
    syncTransitions:           true,
    defaultTransitionDuration: 900,
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
});

//Gallery Mobile
(function(window, PhotoSwipe){

  document.addEventListener('DOMContentLoaded', function(){
  
    var
      options = {},
      instance = PhotoSwipe.attach( window.document.querySelectorAll('#gallery_mobile a'), options );
  
  }, false);
  
  
}(window, window.Code.PhotoSwipe));

//To top scrollbar
$(document).ready(function() {
  var defaults = {
      containerID: 'moccaUItoTop', // fading element id
    containerHoverClass: 'moccaUIhover', // fading element hover class
    scrollSpeed: 1200,
    easingType: 'linear' 
  };
  
  $().UItoTop({ easingType: 'easeOutQuart' });
  
});

//Tolltip
$(function() {
  // placement examples
  $('.tooltip_n').powerTip({placement: 'n'});
  $('.east').powerTip({placement: 'e'});
  $('.south').powerTip({placement: 's'});
  $('.west').powerTip({placement: 'w'});
  $('.tooltip_nw').powerTip({placement: 'nw'});
  $('.tooltip_ne').powerTip({placement: 'ne'});
  $('.south-west').powerTip({placement: 'sw'});
  $('.tooltip_se').powerTip({placement: 'se'});

  // mouse follow examples
  $('#mousefollow-examples div').powerTip({followMouse: true});

  // mouse-on examples
  $('#mouseon-examples div').data('powertipjq', $([
    '<p><b>Here is some content</b></p>',
    '<p><a href="http://stevenbenner.com/">Maybe a link</a></p>',
    '<p><code>{ placement: \'e\', mouseOnToPopup: true }</code></p>'
  ].join('\n')));
  $('#mouseon-examples div').powerTip({
    placement: 'e',
    mouseOnToPopup: true
  });

  // api examples
  $('#api-open').on('click', function() {
    $.powerTip.showTip($('#mouseon-examples div'));
  });
  $('#api-close').on('click', function() {
    $.powerTip.closeTip();
  });
});

  /*$( function() {
    $.vegas( 'slideshow', {
      delay: 5000,
      backgrounds: [
        { src: 'images/bg1.jpg', fade: 2000 },
        { src: 'images/bg2.jpg', fade: 2000 },
        { src: 'images/bg3.jpg', fade: 2000 },
        { src: 'images/bg4.jpg', fade: 2000 },
        { src: 'images/bg.jpg', fade: 2000 },
      ]
    } )
  } );*/