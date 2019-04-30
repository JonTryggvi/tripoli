var isLandScape = window.innerHeight < window.innerWidth ? true : false;
var isDeviseMobileOrHandheld = /Mobi/.test(navigator.userAgent);
function onMobileOrientChange(isLandScape) {
  // console.log(isLandScape);
  $('.slick-arrow').css('height', '100vh');
  
  if (isLandScape && $('.modalContainer')[0].classList.contains('toggleScale') && isDeviseMobileOrHandheld ) {
    // console.log(isDeviseMobileOrHandheld);
    // console.log('wh: ' + window.innerHeight, 'ww: ' + window.innerWidth);
    $('#masthead').addClass('hideNav');
    $('.modalContainer').addClass('modalTop');
    $('.modal__placeholder').addClass('modalPlaceholderLandscape');
    // $('.slick-slide').css('transform', 'translateY(0)');
    // checkIfImgPort(0, false);
    var slideIndex = $('.modal').slick('slickCurrentSlide');
    checkIfImgPort(slideIndex, true, 'this');
    
  }
  else {
    $('#masthead').removeClass('hideNav');
    $('.modalContainer').removeClass('modalTop');
    $('.modal__placeholder').removeClass('modalPlaceholderLandscape');
    var slideIndex = $('.modal').slick('slickCurrentSlide');
    checkIfImgPort(slideIndex, true, 'this');
    // $('.slick-slide').css('transform', 'translateY(-40px)');
  }
  // console.log("the orientation of the device is now " + screen.orientation.angle);
}


function checkIfImgPort(b_f, hasCurrent, direction) {
  if (isDeviseMobileOrHandheld) {
    var modalImg = document.querySelectorAll('.modal-img');
    var slideIndex;
    var iNew;
    if (!hasCurrent) {
      slideIndex = $('.modal').slick("slickCurrentSlide");
      iNew = slideIndex + b_f;

    } else {

      switch (direction) {
        case 'this':
          iNew = b_f + 1;
          break;
        case 'next':
          iNew = b_f + 1;
          break;
        case 'prev':
          iNew = b_f + 1;
          break
        default:
          break;
      }
    }
   
    if (iNew === -1) {
      iNew = modalImg.length -2;
    } 
    // console.log(iNew, modalImg[iNew].classList.contains('setSize'));
    if (
      modalImg[iNew].classList.contains('setSize')
    ) {
      
      $('.modal').addClass('modalMinHeight');
      $('.slick-slide').css('transform', 'translateY(0)');
      $('.modalContainer').css('overflow', 'scroll');
    }

    else {
      // console.log(isLandScape);
      $('.modal').removeClass('modalMinHeight');
      $('.modalContainer').css('overflow', 'hidden');
      if (!isLandScape) { 
        $('.slick-slide').addClass('translateY');
        $('.slick-slide').css('transform', 'translateY(-40px)');
        // $('.setSize').css('transform', 'translateY(0px)')
      } else {
        $('.slick-slide').css('transform', 'translateY(0px)');
      }
    }
  }
}

$('.modal').on('swipe', function (event, slick, direction) {
  // console.log(direction);
  switch (direction) {
    case 'left':
      checkIfImgPort($(this).slick("slickCurrentSlide"), true, 'next');
      break;
    case 'right':
      checkIfImgPort($(this).slick("slickCurrentSlide"),true, 'prev');
      break;
    default:
      break;
  }
});