var isLandScape = window.innerHeight < window.innerWidth ? true : false;
function onMobileOrientChange(isLandScape) {
  // console.log(isLandScape);
  $('.slick-arrow').css('height', '100vh');
  var isDeviseMobileOrHandheld = /Mobi/.test(navigator.userAgent);
  if (isLandScape && $('.modalContainer')[0].classList.contains('toggleScale') && isDeviseMobileOrHandheld ) {
    // console.log(isDeviseMobileOrHandheld);
    // console.log('wh: ' + window.innerHeight, 'ww: ' + window.innerWidth);
  
    $('#masthead').addClass('hideNav');
    $('.modalContainer').addClass('modalTop');
    $('.modal__placeholder').addClass('modalPlaceholderLandscape');
   
    // .modalPlaceholderLandscape
  }
  else {
    $('#masthead').removeClass('hideNav');
    $('.modalContainer').removeClass('modalTop');
    $('.modal__placeholder').removeClass('modalPlaceholderLandscape');
  }
  // console.log("the orientation of the device is now " + screen.orientation.angle);
}


function checkIfImgPort(b_f) {
  var modalImg = document.querySelectorAll('.modal-img');
  var slideIndex = $('.modal').slick("slickCurrentSlide");
  var preNextI = b_f + slideIndex;

  if (slideIndex === modalImg.length - 2) {
    slideIndex = 0;
  }
  if (preNextI === -1) {
    preNextI = 0;
  }

  if (modalImg[preNextI].classList.contains('setSize')) {
    $('.modal').addClass('modalMinHeight');
    $('.slick-active').css('transform', 'translateY(0)');
  } else {   
    $('.modal').removeClass('modalMinHeight');
    $('.slick-active').css('transform','translateY(-40px)');
  }
}

$('.modal').on('swipe', function (event, slick, direction) {
  console.log(direction);
  switch (direction) {
    case 'left':
      checkIfImgPort(1);
      break;
    case 'right':
      checkIfImgPort(-1);
      break;
    default:
      break;
  }
});