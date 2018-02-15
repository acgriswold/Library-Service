$header = $('.header__fake');

$(window).scroll(function() {

    var scroll = $(window).scrollTop();

    if (scroll > 20) {
        $header.addClass('animated').removeClass('fix');
    } else {
        $header.removeClass('animated').addClass('fix');
    }
  
});