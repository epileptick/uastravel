//tooltip plugin
$("[rel=tooltip]").tooltip();

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

$(window).load(function() { 
    $('.sidebar').fadeIn(100);
 });

//Isotope 
$(function() {
    $('.sidebar').fadeIn(1000);
    $('body .container-fluid').append('<div class="loader"></div>');
    var $container = $('#attractions');
    updateSize();
    $container.imagesLoaded( function(){
      $('#attractions').fadeIn(1000);
      $container.animate({'opacity': '1'});
      $('.loader').fadeOut("fast");
      $container.isotope({
          // options
          itemSelector : '.list_attractions',
          layoutMode : 'masonry',
          transformsEnabled: true,
          columnWidth: function( containerWidth ) {
              containerWidth = $browserWidth;
              return Math.floor(containerWidth / $cols);
            }
      });
    });

    // update columnWidth on window resize
    $(window).smartresize(function(){  
        updateSize();
        $container.isotope( 'reLayout' );
    });

    $(window).scroll(function(){
      updateSize(); 
      $container.isotope( 'reLayout' );
    });


    function updateSize() {
        $browserWidth = $container.width();
  
        $cols = 0;

        if ($browserWidth >= 1600) {
            $cols = 5;
        }
        else if ($browserWidth >= 1128) {
            $cols = 4;
        }
        else if ($browserWidth >= 800) {
            $cols = 3;
        }
        else if ($browserWidth >= 401) {
            $cols = 2;
        }
        else{
            $cols = 1;
        }


        $gutterTotal = $cols * 20;
        $browserWidth = $browserWidth - $gutterTotal;
        $itemWidth = $browserWidth / $cols;
        $itemWidth = Math.floor($itemWidth);

        jQuery(".list_attractions").each(function(index){
            jQuery(this).css({"width":$itemWidth+"px"});             
        });
    }

    $container.infinitescroll({
      navSelector  : '#page_nav',    // selector for the paged navigation 
      nextSelector : '#page_nav a',  // selector for the NEXT link (to page 2)
      itemSelector : '.list_attractions',     // selector for all items you'll retrieve
      loading: {
          finishedMsg: '<p>ไม่มีข้อมูลแล้ว</p>',
          img: 'http://www.uastravel.com/themes/Travel/tour/images/loader2.gif'
        }
      },

      // call Isotope as a callback
      function( newElements ) {
        updateSize();
        $container.isotope( 'reLayout' );
        $container.isotope( 'appended', $( newElements ) ); 
        $("[rel=tooltip]").tooltip();

      }
    );



    // filter items when filter link is clicked
    $('#filters a').click(function(){
      $('#filters a').removeClass('selected');
      $(this).addClass('selected');
      var selector = $(this).attr('data-option-value');
      //alert("selector : "+ selector);      
      $container.isotope({ filter: selector });
      return false;
    });
  
});

// Accordion

$(document).ready(function() {

  // Store variables
  
  var accordion_head = $('.accordion > li > a'),
    accordion_body = $('.accordion li > .sub-menu');

  // Open the first tab on load

  //accordion_head.first().addClass('active').next().slideDown('normal');

  // Click function

  accordion_head.on('click', function(event) {

    // Disable header links
    
    //event.preventDefault();

    // Show and hide the tabs on click

    if ($(this).attr('class') != 'active'){
      accordion_body.slideUp('normal');
      $(this).next().stop(true,true).slideToggle('normal');
      accordion_head.removeClass('active');
      $(this).addClass('active');
    }

  });

});
