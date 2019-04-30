$(window).load(function() {
  $('.pre-loader').fadeOut(1500, function() {
    $(this).remove();
  });
  // console.log('load is done');
});
// console.log(isLandScape);

window.addEventListener("orientationchange", function () {
  setTimeout(() => {
    isLandScape = window.innerHeight < window.innerWidth ? true : false;
    // console.log(isLandScape);
    onMobileOrientChange(isLandScape);

  }, 200);
  
});