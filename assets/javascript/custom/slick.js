(function($) {
  var buttonPrevHeight = document.getElementsByClassName('modal-slick-prev');
  var buttonNextHeight = document.getElementsByClassName('modal-slick-nest');
  var modalImgSlider = document.getElementsByClassName('modal__placeholder');
  var slideIndex;

  function setModalSlick(initSlisde) {
    $('.modal').slick({
      prevArrow: '<button type="button" class="modal-slick-prev" ontouchend="this.onclick=fix"></button>',
      nextArrow: '<button type="button" class="modal-slick-next" ontouchend="this.onclick=fix"></button>',
      speed: 500,
      initialSlide: initSlisde,
      mobileFirst: true
    });
  }
   
  var modal = $('.modalContainer');
  $(document).on('keydown', function(e) {
    switch (e.key) {
      case 'ArrowLeft':
        slideIndex = $('.modal').slick('slickCurrentSlide');
        // checkIfImgPort(slideIndex, true);
        $('.modal').slick('slickPrev');
        
        break;
      case 'ArrowRight':
        slideIndex = $('.modal').slick('slickCurrentSlide');
        // checkIfImgPort(slideIndex, true );  
        $('.modal').slick('slickNext');
        break;
      case 'Escape':
        $('.modalContainer').removeClass('toggleScale');
        $('.main-content').removeClass('toggleDisplay');
        $('#masthead').removeClass('hideNav');
        $('.modalContainer').removeClass('modalTop');
        $('.modal__placeholder').removeClass('modalPlaceholderLandscape');
        $('.modal').slick('unslick');
        break;
      default:
    }
  });

 $('#initSlides').on('click', function(){
  $('.modalContainer').toggleClass('toggleScale');
   
   setModalSlick(0);
 
  $('.main-content').toggleClass('toggleDisplay');
  $(window).scrollTop(0);
  slideIndex = $('.modal').slick('slickCurrentSlide');
  checkIfImgPort(1, false, 'this');
 });

  $('#initSlidesMobile').on('click', function(){
   $('.modalContainer').toggleClass('toggleScale');
    setModalSlick();
    $('.main-content').toggleClass('toggleDisplay');
    $(window).scrollTop(0);
  });


  $('.projectImg-left').on('click',function(){

    var idLeft = $(this).data('num');
    // console.log(idLeft);
    $('.modalContainer').toggleClass('toggleScale');
    setModalSlick(idLeft);
    $('.main-content').toggleClass('toggleDisplay');
    $(window).scrollTop(0);
    setTimeout(function () {
      isLandScape = window.innerHeight < window.innerWidth ? true : false;
      onMobileOrientChange(isLandScape);
    }, 200);
    slideIndex = $('.modal').slick('slickCurrentSlide');
    checkIfImgPort(slideIndex, true, 'this');
  });

  $('.projectImg-right').on('click',function(){
    var idRight =  $(this).data('num');
    $('.modalContainer').toggleClass('toggleScale');
    setModalSlick(idRight);
      $('.main-content').toggleClass('toggleDisplay');
    $(window).scrollTop(0);
    setTimeout(function () {
      isLandScape = window.innerHeight < window.innerWidth ? true : false;
      onMobileOrientChange(isLandScape);
    }, 200);
    slideIndex = $('.modal').slick('slickCurrentSlide');
    checkIfImgPort(slideIndex, true, 'this');
  });
  $('.projectImg-head').on('click',function(){
    var idHead =  $(this).data('num');
    // console.log(idHead);
    $('.modalContainer').toggleClass('toggleScale');
    setModalSlick(idHead);
    $('.main-content').toggleClass('toggleDisplay');
    $(window).scrollTop(0);
    setTimeout(function(){
      isLandScape = window.innerHeight < window.innerWidth ? true : false;
      // console.log(isLandScape);
      onMobileOrientChange(isLandScape);
    }, 200);
    
    slideIndex = $('.modal').slick('slickCurrentSlide');
    checkIfImgPort(slideIndex, true, 'this');
  });

  $('.modalContainer__escLink').on('click', function(){
    $('.modalContainer').removeClass('toggleScale');
    $('.main-content').removeClass('toggleDisplay');
    $('#masthead').removeClass('hideNav');
    $('.modalContainer').removeClass('modalTop');
    $('.modal__placeholder').removeClass('modalPlaceholderLandscape');
    $('.modal').slick('unslick');
  });

})(jQuery);
