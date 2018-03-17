<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script src="https://use.typekit.net/nlq8dfe.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico?type=1.0">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class();
							$classes = get_body_class();

	?>>
	<?php do_action( 'foundationpress_after_body' ); ?>


	<?php do_action( 'foundationpress_layout_start' ); ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="row">
			<div class="title-bar" <?php foundationpress_title_bar_responsive_toggle() ?>>
				<div class="title-bar-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</div>
				<button class="hambo" type="button">
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>
			<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
				<div class="top-bar-left">
					<ul class="menu">
						<li class="home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></li>
					</ul>
				</div>
				<div class="top-bar-right">
					<?php foundationpress_top_bar_r(); ?>
					<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
						<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
					<?php endif; ?>
				</div>
			</nav>
		</div>


	</header>
	<div class="pre-loader">
		<!-- <h1>T</h1> -->
	</div>

	<section class="container <?php if (in_array('home',$classes)) {
	echo 'is-relative';
} ?>">
		<?php do_action( 'foundationpress_after_header' );
