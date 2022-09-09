<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		
		<meta property="og:title" content="<?php the_field( 'open_graph_title', 'option' ); ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:image" content="<?php if ( get_field( 'open_graph_image', 'option' ) ) { the_field( 'open_graph_image', 'option' ); } ?>" />
		<meta property="og:url" content="<?php the_field( 'open_graph_url', 'option' ); ?>" />
		<meta property="og:description" content="<?php bloginfo('description'); ?>" />

		<?php wp_head(); ?>
		<script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

		<script src="https://unpkg.com/vue@3"></script>
		<!-- <script src="https://unpkg.com/vue@3.2.33/dist/vue.global.prod.js"></script> -->

	</head>
	<body <?php body_class(); ?>>
		<?php if ( ! function_exists( 'wp_body_open' ) ) {
			function wp_body_open() {
				do_action( 'wp_body_open' );
			}
		} ?>


	<?php if ( get_field( 'splash_page_toggle', 'option' ) == 0 ) : ?>
		<div id="app">
						
			<header id="header" class="w-full flex flex-wrap transition-height duration-200 h-20 fixed top-0 z-50 shadow-xl" role="banner">
				<nav id="nav" class="flex flex-wrap items-start lg:items-center justify-between bg-brand-black w-full h-full relative">
					<?php get_template_part('parts/nav') ?>
				</nav>
			</header>
					
	<?php else: ?>
		<div id="app">
	<?php endif; ?>