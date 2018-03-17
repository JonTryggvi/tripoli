<?php
/*
Template Name: news
*/
get_header(); ?>

<div class="accordion row news" data-accordion id="page-full-width" role="main"	>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php global $wp_query; ?>


<?php
      $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
      $args = array('post_type' => 'news', 'posts_per_page' => -1, 'offset'=>0, 'paged' => $paged);
      $loop = new WP_Query($args);
      ?>


      <?php
      function imgRender($fieldVar, $size){
        $getImg = $fieldVar;
        $setImg = $getImg;
        $img = $setImg['sizes'][$size];
        return $img;
      }
      $c = 0;
      $class = 'is-active';
      if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();

        // get_template_part( 'template-parts/news-item', get_post_format() );
        include( locate_template( 'template-parts/news-item.php', false, false ) );
      endwhile; endif;?>
    <script>
      // {ID} is any unique name, example: b1, q9, qq, misha etc, it should be uniq
      var postsFpTrip = '<?php echo json_encode($loop->query_vars); ?>',
          current_pagetFpTrip = <?php echo $loop->query_vars['paged']; ?>,
          max_pageFpTrip = <?php echo $loop->max_num_pages; ?>;
          // console.log(current_pagetFpTrip);
    </script>
    <?php $newsInfo = wp_count_posts( 'news' ); $newsCount = $newsInfo->publish;
          if($loop->query_vars['posts_per_page'] < $newsCount):
    ?>
      <!-- <button id="btnShowMore" type="button" class="show-more" name="button">Load more</button> -->
    <?php endif; ?>
<?php do_action( 'foundationpress_after_content' ); ?>

</div>




<?php get_footer();
