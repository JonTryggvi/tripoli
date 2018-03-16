$('#btnShowMore').click(function() {
  // postsFpTrip = JSON.stringify(postsFpTrip);
  // postsFpTrip = JSON.parse(postsFpTrip);
  // console.log(postsFpTrip);

  // var n = postsFpTrip.slice(5);
  var button = $(this),
    data = {
      'action': 'loadmore',
      'query': postsFpTrip, // that's how we get params from wp_localize_script() function
      'page': current_pagetFpTrip
    };
  // console.log(postsFpTrip);
  $.ajax({
    url: themeUrl.ajaxurl, // AJAX handler
    data: data,
    type: 'POST',
    beforeSend: function(xhr) {
      // console.log(xhr);
      button.text('Retrieving...'); // change the button text, you can also add a preloader image
    },
    success: function(data) {
      if (data) {
        button.text('Load More').prev().before(data); // insert new posts
        current_pagetFpTrip++;
        // $(document).foundation();
        console.log(current_pagetFpTrip + ' : ' + max_pageFpTrip);
        if (current_pagetFpTrip == max_pageFpTrip)
          button.remove(); // if last page, remove the button
      } else {
        button.remove(); // if no data, remove the button as well
      }
    }
  });
});

// document.addEventListener('click', function(e) {
//   console.log(e.target.parentNode.parentNode.parentNode.classList.contains('accordion-item'));
//   if (e.target.parentNode.parentNode.parentNode.classList.contains('accordion-item')) {
//     e.target.parentNode.parentNode.click();
//   }
// });