(function($) {
  var naver = $('.site-header');
  //
  $(window).on('scroll', function() {
      var scrollPos = $(document).scrollTop();
      if (scrollPos > 60){
        naver.addClass('addShaddow');
      }else {
        naver.removeClass('addShaddow');
      }

   });

  $('.hambo').on('click', function(){
    $(this).toggleClass('theX');
    $('#masthead').toggleClass('setGrey');
    $('.top-bar').toggleClass('slideIn');
    $('#mobile-menu').toggleClass('slideIn');
  });
})(jQuery);
