<?php
function ajax_handler(){
// var_dump($_POST['page']);
	// prepare our arguments for the query
  $query =  $_POST['query'];
  $queryPhp = json_decode( stripslashes( ( $query ) ), true );
  // var_dump($queryPhp);
	$args = $queryPhp;

	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
  $args['offset'] = $args['offset']+4;
	// it is always better to use WP_Query but not here
	query_posts( $args );

	if( have_posts() ) :

		// run the loop
		while( have_posts() ): the_post();

			// look into your theme code how the posts are inserted, but you can use your own HTML of course
			// do you remember? - my example is adapted for Twenty Seventeen theme
			get_template_part( 'template-parts/news-item', get_post_format() );

			// for the test purposes comment the line above and uncomment the below one

		endwhile;

	endif;
  // wp_reset_query();
	die; // here we exit the script and even no wp_reset_query() required!
}



add_action('wp_ajax_loadmore', 'ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'ajax_handler'); // wp_ajax_nopriv_{action}
 ?>
