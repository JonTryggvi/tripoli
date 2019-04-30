<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<button type="button" name="button" id="initSlides" data-tooltip aria-haspopup="true" class="has-tip right" data-disable-hover="false" tabindex="1" title="Slideshow" data-position="bottom" data-alignment="center"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/slideshow.svg'; ?>" alt=""> </button>
<div id="single-post" class="row single-post" role="main">
<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
		<?php $gallery = get_field('project_gallery'); ?>
	<article class="main-content single-project" id="post-<?php the_ID(); ?>">

		<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
		<div class="entry-content">

			<?php if(!empty($gallery)): ?>



			<section>

				<div class="projectImg-head" data-num="0">
					<div class="innerRatio-head" data-interchange="[<?php echo $gallery[0]['sizes']['fp-small'] ?>, small], [<?php echo $gallery[0]['sizes']['fp-medium'] ?>, medium],  [<?php echo $gallery[0]['sizes']['fp-large'] ?>, large], [<?php echo $gallery[0]['sizes']['fp-large'] ?>, xlarge], [<?php echo $gallery[0]['sizes']['fp-retina'] ?>, xxlarge]">
					</div>
				</div>
			</section>

			<section class="lower">
				<div class="left-col">
					<?php $i=1; foreach ($gallery as $key => $value):  $i++;


					if($i % 2 === 0 && $key !== 0):
						if($value['width'] > $value['height']) {
							$imgIsPort = '';
						}else {
							$imgIsPort = 'setHeight';
						}
					?>
					<div class="projectImg-left <?php echo $imgIsPort; ?>" data-num="<?php echo $key; ?>">
						<div class="innerRatio-left" data-interchange="[<?php echo $value['sizes']['fp-small'] ?>, small], [<?php echo $value['sizes']['fp-medium'] ?>, medium], [<?php echo $value['sizes']['fp-large'] ?>, large], [<?php echo $value['sizes']['fp-large'] ?>, xlarge], [<?php echo $value['sizes']['fp-retina'] ?>, xxlarge]" >
						</div>
					</div>
				<?php endif; endforeach;  ?>
				</div>
				<div class="right-col">
					<?php $j = 2; foreach ($gallery as $key => $value): $j++;

						if($j % 2=== 0 && $key !== 0 ):
							if($value['width'] > $value['height']) {
								$imgIsPort = '';
							}else {
								$imgIsPort = 'setHeight';
							}
							?>
					<div class="projectImg-right <?php echo $imgIsPort; ?>" data-num="<?php echo $key; ?>">
						<div class="innerRatio-right" data-interchange="[<?php echo $value['sizes']['fp-small'] ?>, small],[<?php echo $value['sizes']['fp-medium'] ?>, medium],  [<?php echo $value['sizes']['fp-large'] ?>, large], [<?php echo $value['sizes']['fp-large'] ?>, xlarge], [<?php echo $value['sizes']['fp-retina'] ?>, xxlarge]">
						</div>
					</div>
				<?php endif; endforeach; ?>
				</div>
			</section>
			<?php endif; ?>

			<button type="button" name="button" id="initSlidesMobile" >slideshow  <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/slideshow.svg'; ?>" alt=""> </button>
		</div>

		<footer class="project-footer">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<section class="sub_title">
					<h2><?php the_field('sub_title'); ?></h2>
				</section>
			</header>

			<?php
			$description = get_field('project_description');
			$thanks = get_field('special_thanks');
			$signature = get_field('signature');
			$location = get_field('location');
			$client = get_field('client');
			$program = get_field('program');
			$programSize = get_field('size');
			$status = get_field('status');
			if (!empty($description)): ?>
			<div class="description">
				<p class="first">description</p>
				<p class="second"><?php echo $description; ?></p>
			</div>

			<?php endif; if (!empty($signature)): ?>
				<div class="singnature">
					<p class="first">Team</p>
					<p class="second"><?php echo $signature; ?></p>
				</div>
			<?php endif; ?>
			<?php if(!empty($thanks)): ?>
				<div class="singnature">
					<p class="first">Collaborators</p>
					<p class="second"><?php echo $thanks; ?></p>
				</div>
			<?php endif; ?>
			<?php if(!empty($location)): ?>
				<div class="singnature">
					<p class="first">Location</p>
					<p class="second"><?php echo $location; ?></p>
				</div>
			<?php endif; ?>
			<?php if(!empty($client)): ?>
				<div class="singnature">
					<p class="first">Client</p>
					<p class="second"><?php echo $client; ?></p>
				</div>
			<?php endif; ?>
			<?php if(!empty($program)): ?>
				<div class="singnature">
					<p class="first">Program</p>
					<p class="second"><?php echo $program; ?></p>
				</div>
			<?php endif; ?>
			<?php if(!empty($programSize)): ?>
				<div class="singnature">
					<p class="first">Size</p>
					<p class="second"><?php echo $programSize; ?></p>
				</div>
			<?php endif; ?>
			<?php if(!empty($status)): ?>
				<div class="thanks">
					<p class="first">Status</p>
					<p class="second"><?php echo $status; ?></p>
				</div>
			<?php endif; ?>
		  <?php $pdfDownLoad = get_field('project_pdf'); if(!empty($pdfDownLoad)):  ?>
				<a class="pdf-link" href="<?php echo $pdfDownLoad['url']; ?>" target="_blank">DOWNLOAD PRESENTATION <img src="<?php echo get_stylesheet_directory_uri().'/assets/images/icons/prevArrow.svg'?>" alt=""/></a>
		  <?php endif; ?>
		</footer>
	</article>
	<?php if(!empty($gallery)): ?>
	<div class="modalContainer">
		<div class="modalContainer__escLink">
			<span></span>
			<span></span>
		</div>
		<div id="prModal" class="modal">
				<?php foreach ($gallery as $key2 => $value2):
					if($value2['width'] > $value2['height']) {
						$imgIsPortmodal = '';
						$setSize = '';
						$isPort = false;
					}else {
						$imgIsPortmodal = 'setHeightModal';
						$setSize = 'setSize';
						$isPort = true;
					}
					?>
				<div>
					<div class="modal__placeholder <?php echo $imgIsPortmodal; ?>">
						<?php if(!$isPort) :?>
						<img class="modal-img <?php echo $setSize; ?>" data-interchange="[<?php echo $value2['sizes']['fp-small']; ?>, small], [<?php echo $value2['sizes']['fp-medium']; ?>, medium], [<?php echo $value2['sizes']['fp-large']; ?>, large], [<?php echo $value2['sizes']['fp-large']; ?>, xlarge], [<?php echo $value2['sizes']['fp-retina']; ?>, xxlarge]" />
					<?php else : ?>
						<div class="modal-img <?php echo $setSize; ?>" data-interchange="[<?php echo $value2['sizes']['fp-small']; ?>, small], [<?php echo $value2['sizes']['fp-medium']; ?>, medium], [<?php echo $value2['sizes']['fp-large']; ?>, large], [<?php echo $value2['sizes']['fp-large']; ?>, xlarge], [<?php echo $value2['sizes']['fp-retina']; ?>, xxlarge]" ></div>
					<?php endif; ?>
					</div>
					<section class="modal__info">
				<p class="modal__info__text"><?php the_title(); ?></p> <?php if($value2['description'] !== ''): ?> <p class="modal__info__descripton"><?php echo $value2['description']; ?></p> <?php endif; ?>
						<p class="modal__info__count"><?php echo $key2 + 1; ?> / <?php echo count($gallery); ?></p>
					</section>
				</div>
				<?php endforeach; ?>
		</div>
	</div>

<?php endif; endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>
</div>
<?php get_footer();
