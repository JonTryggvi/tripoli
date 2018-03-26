(function($) {
  var buttonPrevHeight = document.getElementsByClassName('modal-slick-prev');
  var buttonNextHeight = document.getElementsByClassName('modal-slick-nest');
  var modalImgSlider = document.getElementsByClassName('modal__placeholder');
  var modal = $('.modalContainer');
  $(document).on('keydown', function(e) {
    switch (e.key) {
      case 'ArrowLeft':
        $('.modal').slick('slickPrev');
        break;
      case 'ArrowRight':
        $('.modal').slick('slickNext');
        break;
      case 'Escape':
        $('.modalContainer').removeClass('toggleScale');
        $('.main-content').removeClass('toggleDisplay');
        $('.modal').slick('unslick');
        break;
      default:
    }
  });

 $('#initSlides').on('click', function(){
   $('.modalContainer').toggleClass('toggleScale');
    $('.modal').slick({
      prevArrow: '<button style="height:'+modalImgSlider[0].clientHeight+'px;" type="button" class="modal-slick-prev" ontouchend="this.onclick=fix"></button>',
      nextArrow: '<button style="height:'+modalImgSlider[0].clientHeight+'px;" type="button" class="modal-slick-next" ontouchend="this.onclick=fix"></button>',
      speed: 500,
      initialSlide: 0,
      mobileFirst: true
    });
    $('.main-content').toggleClass('toggleDisplay');
    $(window).scrollTop(0);
 });

 $('#initSlidesMobile').on('click', function(){
   $('.modalContainer').toggleClass('toggleScale');
    $('.modal').slick({
      prevArrow: '<button style="height:'+modalImgSlider[0].clientHeight+'px;" type="button" class="modal-slick-prev" ontouchend="this.onclick=fix"></button>',
      nextArrow: '<button style="height:'+modalImgSlider[0].clientHeight+'px;" type="button" class="modal-slick-next" ontouchend="this.onclick=fix"></button>',
      speed: 500,
      initialSlide: 0,
      mobileFirst: true
    });
    $('.main-content').toggleClass('toggleDisplay');
    $(window).scrollTop(0);
 });


$('.projectImg-left').on('click',function(){

  var idLeft =  $(this).data('num');
  // console.log(idLeft);
  $('.modalContainer').toggleClass('toggleScale');
   $('.modal').slick({
     prevArrow: '<button style="height:'+modalImgSlider[0].clientHeight+'px;" type="button" class="modal-slick-prev" ontouchend="this.onclick=fix"></button>',
     nextArrow: '<button style="height:'+modalImgSlider[0].clientHeight+'px;" type="button" class="modal-slick-next" ontouchend="this.onclick=fix"></button>',
     speed: 500,
     initialSlide: idLeft,
     mobileFirst: true
   });
   $('.main-content').toggleClass('toggleDisplay');
   $(window).scrollTop(0);
});

$('.projectImg-right').on('click',function(){

  var idRight =  $(this).data('num');
  $('.modalContainer').toggleClass('toggleScale');
   $('.modal').slick({
     prevArrow: '<button style="height:'+modalImgSlider[0].clientHeight+'px;" type="button" class="modal-slick-prev" ontouchend="this.onclick=fix"></button>',
     nextArrow: '<button style="height:'+modalImgSlider[0].clientHeight+'px;" type="button" class="modal-slick-next" ontouchend="this.onclick=fix"></button>',
     speed: 500,
     initialSlide: idRight,
     mobileFirst: true
   });
    $('.main-content').toggleClass('toggleDisplay');
    $(window).scrollTop(0);
});
$('.projectImg-head').on('click',function(){
  var idHead =  $(this).data('num');
  // console.log(idHead);
  $('.modalContainer').toggleClass('toggleScale');

   $('.modal').slick({
     prevArrow: '<button style="height:'+modalImgSlider[0].clientHeight+'px;" type="button" class="modal-slick-prev" ontouchend="this.onclick=fix"></button>',
     nextArrow: '<button style="height:'+modalImgSlider[0].clientHeight+'px;" type="button" class="modal-slick-next" ontouchend="this.onclick=fix"></button>',
     speed: 500,
     initialSlide: idHead,
     mobileFirst: true
   });
    $('.main-content').toggleClass('toggleDisplay');
    $(window).scrollTop(0);
});

$('.modalContainer__escLink').on('click', function(){
  $('.modalContainer').removeClass('toggleScale');
   $('.main-content').removeClass('toggleDisplay');
   $('.modal').slick('unslick');
});






  })(jQuery);