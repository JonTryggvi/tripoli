<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

		</section>
		<div id="footer-container">
			<footer id="footer" class="row">
				<?php
					$classes = get_body_class();
					if (!in_array('home',$classes)):
				 ?>

				<div class="tripoli-footer">
					<!-- <p>Trípólí: Copyright <?php # echo date("Y"); ?></p> -->

					<?php if(in_array('page-template-page-office', $classes)): ?>
					<!-- <div class="office-address">
						<p><?php echo get_field('address', 'option')?></p> <span>|</span>
						<a href="mailto:<?php echo get_field('office_email', 'option'); ?>"><?php echo get_field('office_email', 'option');?></a> <span>|</span>
						<a href="tel:<?php echo get_field('land_line', 'option'); ?>">tel: <?php echo get_field('land_line', 'option'); ?></a>
					</div> -->
					<div class="social">
						<a class="facebook" href="<?php the_field('facebook', 'option'); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri().'/assets/images/icons/facebook.svg'; ?>" alt=""></a>
						<a class="instagram" href="<?php the_field('instagram', 'option'); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri().'/assets/images/icons/instagram.svg'; ?>" alt=""></a>
					</div>
				<?php endif; ?>
				</div>
			<?php endif; ?>
			</footer>
		</div>

		<?php do_action( 'foundationpress_layout_end' ); ?>




<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>

</body>
</html>
