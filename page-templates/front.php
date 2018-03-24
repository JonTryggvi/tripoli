<?php
/*
Template Name: Front
*/
get_header(); ?>

<div id="front-hero" role="banner">
	<div class="fp-slider">
		<?php do_action( 'foundationpress_before_content' ); ?>
		<?php $args = array('post_type' => 'projects');
				  $loop = new WP_Query($args);
					$i = 0;
				  if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
					$isChosen = get_field('frontpage_slider');
					$getImg = get_field('slider_img');
					$setImg = $getImg;
					$img = $setImg['sizes']['fp-retina'];
					$alt = '';
					$i++;
					if($isChosen):
					?>

			<div <?php post_class('fp-slider__fp-intro ') ?> id="project-<?php the_ID(); ?>"  data-interchange="[<?php echo $setImg['sizes']['fp-small'] ?>, small], [<?php echo $setImg['sizes']['fp-medium'] ?>, medium], [<?php echo $setImg['sizes']['fp-large'] ?>, large], [<?php echo $setImg['sizes']['fp-large'] ?>, xlarge], [<?php echo $setImg['sizes']['fp-retina'] ?>, xxlarge]">

					<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
					<div class="row erow" data-work="<?php the_permalink(); ?>">
						<div class="break-text">
							<h1 class="fp-slider__fp-intro__h1 "><a class="frontpage-link typewrite tw-<?php echo $i; ?>" href="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" ></a></h1>
						</div>
						<div class="click-left">

						</div>
						<div class="click-right">

						</div>
					</div>

			</div>


	<?php endif; endwhile; endif;?>
		<?php do_action( 'foundationpress_after_content' ); ?>


	</div>

</div>






<?php get_footer();
