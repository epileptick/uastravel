  var loading = false;
  var lastURL = "";
  $("ul.side_bar").on("click","a.ajax-click",function(e){
    if($(this).parent().children("ul.tour-list").css("display") == "block"){
      $(this).parent().children('ul').toggle(200);
      $(this).children('img').toggleClass("rotate");
      return false;
    }
    var count = $(this).parent().children('ul').length;
    if(count > 0){
      $(this).parent().children('ul').toggle(200);
    }
    if(!loading){
      $(this).children('img').toggleClass("rotate");
      link = $(this).attr("href")+"?ajax=true";
      if(link == lastURL){
        return false;
      }
      $(".side_bar a").removeClass("active");
      $(this).addClass("active");
      var parent = this;
      $("#detail").hide().html("<img style=\"width:48px; height:48px; margin:auto; margin-top: 50%; display: block;\" src=\"../../themes/Travel06062013/images/loader.gif\" border=\"0\">").fadeIn(300);
      lastURL = link;
      linkRedirect = $(this).attr("href");
      jqxhr = $.get(link);
      loading = true;
      jqxhr.success(function(data) {
                      loading = false;
                      var json = jQuery.parseJSON(data);
                      $("#detail").hide().html(json.bodyRedered).fadeIn(300);
                      $("#gallery_row").hide().html(json.imagesRedered).fadeIn(300).css("height","");
                      if($(parent).parent().children("ul.tour-list").length == 0){
                        if(json.tourList != undefined){
                          if($(parent).parent().children("ul.sub-menu").length == 0){
                            $(parent).parent().append(json.tourList).fadeIn(300);
                          }else{
                            $(parent).parent().children("ul.sub-menu").remove();
                            $(parent).parent().append(json.tourList).fadeIn(300);
                          }
                        }
                      }
                      $("a#title").html(json.data.name);
                      if(json.data.short_description != undefined){
                        $("span.subtitle").html(json.data.short_description);
                      }
                      if(json.data.background_image != undefined){
                        $("body").css('background-image',"url('"+json.data.background_image+"')");
                      }
                      if(json.data.latitude != undefined){
                        initialize(json.data.latitude, json.data.longitude);
                      }
                      processAjaxData(json.data.name, json, $(".left_columns").html(), linkRedirect);
                    });
    }else{
      $("#detail").hide().html("<p style=\"width:100px; height:18px; margin:auto; margin-top: 50%; display: block;\">We're loading...</p><br /><img style=\"width:48px; height:48px; margin:auto; display: block;\" src=\"../../themes/Travel06062013/images/loader.gif\" border=\"0\">").fadeIn(300);
    }
    return false;
  });

  $('ul.sub-menu').each(function (item) {
    if($(this).attr("active") == "false"){
      $(this).toggle(200);
    }else{
      $(this).parent().find('img:first').addClass("rotate");
    }
  });