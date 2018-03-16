<?php
/*
Template Name: Work
*/
get_header(); ?>

<div class="row work" id="page-full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php $args = array('post_type' => 'projects', 'posts_per_page' => -1);
      $loop = new WP_Query($args);
      $i = 0;
      if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); $i++;
      $specialImg = get_field('cropped_card_img');
      if($specialImg):
        $getImg = get_field('cropped_card_img');
        $setImg = $getImg;
        $img = $setImg['sizes']['fp-small'];
        $alt = '';
        ?>
        <div class="work__container">
          <div class="work__container__img" style="background-image:url('<?php echo $img; ?>')"></div>
          <div class="work__container__item" >
              <h2><a class="work_font" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          </div>
        </div>

      <?php else:

      $getImg = get_field('slider_img');
      $setImg = $getImg;
      $img = $setImg['sizes']['fp-small'];
      $alt = '';
      ?>
      <div class="work__container">
        <div class="work__container__img" data-interchange="[<?php echo $setImg['sizes']['fp-small'] ?>, small], [<?php echo $setImg['sizes']['fp-medium'] ?>, medium], [<?php echo $setImg['sizes']['fp-large'] ?>, large], [<?php echo $setImg['sizes']['fp-large'] ?>, xlarge], [<?php echo $setImg['sizes']['fp-retina'] ?>, xxlarge]"></div>
        <div class="work__container__item" >
            <h2><a class="work_font" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div>

      </div>


<?php endif; endwhile; endif;?>

<?php do_action( 'foundationpress_after_content' ); ?>
<?php if($i % 1) {$perc = 25; $pix = 10;} elseif($i % 2) {$perc = 60; $pix = 7;}  else {$perc = 75; $pis = 10;} ?>

<div class="hidden noHeight" aria-hidden="true" ></div>
<div class="hidden noHeight" aria-hidden="true" ></div>
<div class="hidden noHeight" aria-hidden="true" ></div>
<div class="hidden noHeight" aria-hidden="true" ></div>
<div class="hidden noHeight" aria-hidden="true" ></div>
<div class="hidden noHeight" aria-hidden="true" ></div>
</div>
<!-- width: calc(<?php# echo $perc; ?>% - 10px); -->
<?php get_footer();
