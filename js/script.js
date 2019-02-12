if (typeof $(".article__preshow__description" != 'undefined')) {
var overview = $(".article__preshow__description");
for (var i = 0; i < $(".article__preshow__description").length; i++) {

  var str = overview[i].innerHTML;
var text = str.substr(0, 400);
      overview[i].innerHTML = text + "..." ;
    }
}

if (typeof $(".article__preshow__description__aside" != 'undefined')) {
var overview = $(".article__preshow__description__aside");
for (var i = 0; i < $(".article__preshow__description__aside").length; i++) {

  var str = overview[i].innerHTML;
var text = str.substr(0, 60);
      overview[i].innerHTML = text + "..." ;
}
}



if ($(".sport__main").length != 0) {
var overview = $(".article__preshow__description");
for (var i = 0; i < $(".article__preshow__description").length; i++) {

  var str = overview[i].innerHTML;
var text = str.substr(0, 350);
      overview[i].innerHTML = text + "..." ;
}
}

$(window).scroll(function(){
  if ($(window).scrollTop()+200 > $(window).height()) {
    $('.wrapper2').fadeIn(1500);
  }
})
