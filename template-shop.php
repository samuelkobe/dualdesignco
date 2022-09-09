<?php /* Template Name: Shop Template */ get_header(); ?>

	<main role="main">

	<?php if ( get_field( 'splash_page_toggle', 'option' ) == 0 ) : ?>
		
		<div class="my-28 px-6 lg:container mx-auto lg:my-48 w-full">

			<?php the_content(); ?>

		</div>
		
	<?php else: ?>
				
		<section class="w-full h-[100vh]" style="background-color: <?php echo the_field( 'background_color', 'option' ); ?>;">
			<div class="flex flex-col w-full h-full items-center justify-center" style="color: <?php echo the_field( 'text_color', 'option' ); ?>;">

				<div class="flex flex-row w-full px-4 lg:px-0 items-center justify-center">
					<?php $branding_logo = get_field( 'branding_logo', 'option' ); ?>
					<?php if ( $branding_logo ) : ?>
						<img class="rounded w-72 lg:w-96 2xl:w-1/4" src="<?php echo esc_url( $branding_logo['url'] ); ?>" alt="<?php echo esc_attr( $branding_logo['alt'] ); ?>" />
					<?php endif; ?>
				</div>

				<div class="flex flex-col w-full items-center justify-center px-4 lg:px-0 lg:w-1/2 lg:mx-auto mt-4 lg:mt-12">
					<h1 class="text-3xl lg:text-5xl my-1 lg:my-4 text-center"><?php the_field( 'large_text', 'option' ); ?></h1>
					<p class="text-base lg:text-2xl text-center" ><?php the_field( 'small_text', 'option' ); ?></p>
				</div>

				<?php // Newsletter section ?>
				<?php if ( get_field( 'newsletter_media_toggle', 'option' ) == 1 ) : ?>
					<div class="flex flex-col w-full px-4 lg:px-0 items-center justify-center mt-8 lg:mt-12">
						<h2 class="text-sm lg:text-lg font-bold text-center">Join our Newsletter and be alerted when our new website goes live.</h2>
						<div class="w-full sm:w-5/6 lg:w-1/2 2xl:w-1/4 lg:mx-auto mt-2">
							<?php the_field( 'newsletter_form_embed', 'option' ); ?>
						</div>
					</div>
				<?php else : ?>
					<?php // Newsletter turned off ?>
				<?php endif; ?>

			</div>
		</section>

	<?php endif; ?>

	</main>

<?php get_footer(); ?>