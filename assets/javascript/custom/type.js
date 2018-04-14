var rootUrl = window.location.origin;
var devUrl = rootUrl + "/tripoli";
var root;
var extension;

if (rootUrl === 'http://localhost:3000' || rootUrl === 'http://localhost:8888') {
  root = devUrl;
  extension = "/tripoli/";
} else {
  root = rootUrl;
  extension = "/";
}

function fix() {
  var el = this;
  var par = el.parentNode;
  var next = el.nextSibling;
  par.removeChild(el);
  setTimeout(function() {
    par.insertBefore(el, next);
  }, 300);
}

// $('.erow').click(function() {
//   var link = $(this).attr('data-work');
//   // window.location.href = link;
// });

$(document).click(function (e) {
  // console.log(e.target.className);
  if (e.target.className.includes('erow') ) {
    var link = $(e.target).attr('data-work');
    window.location.href = link;
  } else if (e.target.className.includes('modal-slick-next')) {
    checkIfImgPort(1);
  
  } else if (e.target.className.includes('modal-slick-prev')) {
    checkIfImgPort(-1);
  }
});

// if(window.location.pathname === '/tripoli/') {
$('.click-left').on('mouseenter mouseleave', function(e) {
  $('.slick-prev').toggleClass('prev-hover');
});
$('.click-right').on('mouseenter mouseleave', function(e) {
  $('.slick-next').toggleClass('next-hover');
});

$('.click-left').on('click', function(e) {
  $('.slick-prev').click();
});
$('.click-right').on('click', function(e) {
  $('.slick-next').click();
});

var myIndex = 0;
var slide = $('.fp-slider');
var text = $('.typewrite').data('text');
var typewriter = $('typewriter');



function setText() {
  $('.fp-slider__fp-intro__h1 ').css('opacity', '0');
  var currSlide = slide.slick("slickCurrentSlide");
  // console.log(currSlide);
  
  var text = $('.typewrite').next().prevObject[currSlide].attributes[2].textContent;
  var text2 = text.split(" ");
  if ($(window).width() < 800) {
    //  console.log('lilli');
    for (var i = 1; i < text2.length; i = i + 2) {
      if (text2.length > 1) {
        text2[i] = text2[i] + "<br />";
      }
    }
    // console.log(text2);
  } else {
    //  console.log('stóri');
    for (var d = 2; d < text2.length; d = d + 3) {
      if (text2.length > 2) {
        text2[d] = text2[d] + "<br />";
      }
    }
  }

  text2 = text2.join(" ");
  setTimeout(function() {
    // clearTimeout(typeWriter(text, 0));
    $('.fp-slider__fp-intro__h1 ').css('opacity', '1');
    //  typeWriter(text, 0);
    $('.typewrite').typeIt({
      strings: [text2],
      cursor: false,
      speed: 50,
      lifeLike: true
    });
  }, 500);
}

$('.slick-next').click(function() {
  setText();
  // $(this).prop("disabled", true);
  // setTimeout(function() {
  //   $('.slick-next').prop("disabled", false);
  // }, 2000);
});

// var indexArrRev = indexArray.reverse();

$('.slick-prev').click(function() {
  setText();
  // $(this).prop("disabled", true);
  // setTimeout(function() {
  //   $('.slick-prev').prop("disabled", false);
  // }, 2000);

});

$('.fp-slider__fp-intro__h1 ').css('opacity', '0').css('transition', 'all 300ms ease-out');
// console.log(window.location.origin+" : "+root);
if (window.location.pathname == extension) {

  setTimeout(function() {

    $('.fp-slider__fp-intro__h1 ').css('opacity', '1');
    var text = $('.typewrite').data('text');
    var text2 = text.split(" ");
    if ($(window).width() < 800) {
      // console.log('lilli');
      for (var j = 0; j < text2.length; j = j + 2) {
        if (text2.length > 2) {
          text2[j] = text2[j] + "<br />";
        }
      }

    } else {
      // console.log('stóri');
      for (var t = 2; t < text2.length; t = t + 3) {
        if (text2.length > 2) {
          text2[t] = text2[t] + "<br />";
        }
      }
    }


    text2 = text2.join(" ");
    // typeWriter(text, 0);
    $('.typewrite').typeIt({
      strings: [text2],
      cursor: false,
      speed: 50,
      lifeLike: true
    });


  }, 2500);

}
// }


// if(window.location.pathname === '/tripoli/') {
$('.fp-slider').on('beforeChange', function(event, slick) {
  $('.fp-slider__fp-intro__h1 ').css('opacity', '0');
});

$('.fp-slider').on('afterChange', function(event, slick) {
  setText();

});



$.fn.randomize = function(selector) {
  var $elems = selector ? $(this).find(selector) : $(this).children(),
    $parents = $elems.parent();

  $parents.each(function() {
    $(this).children(selector).sort(function(childA, childB) {
      // * Prevent last slide from being reordered
      if ($(childB).index() !== $(this).children(selector).length - 1) {
        return Math.round(Math.random()) - 0.5;
      }
    }.bind(this)).detach().appendTo(this);
  });

  return this;
};

$('.fp-slider').randomize().slick({
  prevArrow: '<button type="button" ontouchend="this.onclick=fix" class="slick-prev"></button>',
  nextArrow: '<button type="button" ontouchend="this.onclick=fix" class="slick-next"></button>',
  fade: true,
  speed: 2000,
  autoplay: true,
  autoplaySpeed: 6000,
  pauseOnHover: false,
  pauseOnFocus: false
});



// $(document).on('keydown', function(e) {
//   if (e.keyCode == 37) {
//     $('.fp-slider').slick('slickPrev');
//   }
//   if (e.keyCode == 39) {
//     $('.fp-slider').slick('slickNext');
//   }
// });

$(document).on('keydown', function(e) {
  switch (e.key) {
    case 'ArrowLeft':
      $('.fp-slider').slick('slickPrev');
      break;
    case 'ArrowRight':
      $('.fp-slider').slick('slickNext');
      break;

    default:
  }
});

$(".accordion-title").on("click", function(event) {
  setTimeout(function() {
    $('html,body').animate({
      scrollTop: $('.is-active').offset().top - $('#masthead').height()
    }, 'slow');
  }, 250); //Adjust to match slideSpeed
});