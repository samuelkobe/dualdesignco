<?php
/**
 * Block template file: parts/blocks/paired-slider.php
 *
 * Paired Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'paired-slider-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-paired-slider';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
	<?php echo '#' . $id; ?> {
		/* Add styles that use ACF values here */
	}
</style>

<?php $rounding = get_field( 'image_rounding' );?>

<section class="w-full mb-<?php echo get_field( 'bottom_spacing' ); ?>">
    <div class="container mx-auto flex flex-col px-6 lg:px-16 pt-8 lg:pt-16 relative">
		
		<div class="w-full swiperPairedImages swiper-wrapper-div overflow-x-hidden">

			<?php if ( have_rows( 'slider_content' ) ): ?>
				<div class="w-full container mx-auto swiper-wrapper">
					<?php while ( have_rows( 'slider_content' ) ) : the_row(); ?>

					<div class="swiper-slide w-full flex flex-col bg-white">

						<?php if ( get_row_layout() == 'paired_content' ) : ?>

							<div class="flex flex-col items-start lg:items-center gap-y-2 lg:gap-y-6 mb-2 lg:mb-6">
								<h2 class="font-title text-4xl lg:text-5xl 2xl:text-6xl"><?php the_sub_field( 'title' ); ?></h2>

								<?php if ( get_sub_field( 'content_toggle' ) == 1 ) : ?>
									<p class="mb-2 font-sans text-left lg:text-center md:w-3/4 text-sm lg:text-base 2xl:text-lg"><?php the_sub_field( 'content' ); ?></p>
								<?php endif; ?>
							</div>


							<div class="h-full flex flex-col md:flex-row space-x-0 space-y-4 md:space-x-8 md:space-y-0 items-center justify-center">

								<?php $image_left = get_sub_field( 'image_left' ); ?>
								<div class="flex flex-col w-full md:w-1/2 relative">
									<?php if ( get_sub_field( 'left_image_tag_toggle' ) == 1 ) : ?>
										<h4 class="absolute bottom-4 left-4 md:left-auto md:right-4 w-20 text-center uppercase font-button text-lg leading-none <?php echo get_sub_field( 'left_tag_background_colour' ); ?> text-white pt-3 pb-2 rounded"><?php the_sub_field( 'left_tag' ); ?></h4>
									<?php endif; ?>

									<div class="">
										<?php if ( $image_left ) : ?>
											<img class="w-full aspect-video shadow-xl object-cover max-w-full <?php echo $rounding ?>" src="<?php echo esc_url( $image_left['url'] ); ?>" alt="<?php echo esc_attr( $image_left['alt'] ); ?>" />
										<?php endif; ?>
									</div>
								</div>

								<?php $image_right = get_sub_field( 'image_right' ); ?>
								<div class="flex flex-col w-full md:w-1/2 relative">
									<?php if ( get_sub_field( 'right_image_tag_toggle' ) == 1 ) : ?>
										<h4 class="absolute bottom-4 left-4 w-20 text-center uppercase font-button text-lg leading-none <?php echo get_sub_field( 'right_tag_background_colour' ); ?> text-white pt-3 pb-2 rounded"><?php the_sub_field( 'right_tag' ); ?></h4>    
									<?php endif; ?>

									<div class="">
										<?php if ( $image_right ) : ?>
											<img class="w-full aspect-video shadow-xl object-cover max-w-full <?php echo $rounding ?>" src="<?php echo esc_url( $image_right['url'] ); ?>" alt="<?php echo esc_attr( $image_right['alt'] ); ?>" />
										<?php endif; ?>
									</div>
								</div>

							</div>

						<?php endif; ?>

					</div>

					<?php endwhile; ?>

				</div>
			<?php endif; ?>
				
			<div class="absolute bottom-2 z-50 swiper-navigation w-full h-16 flex justify-between">
				<div class="swiper-button-prev invisible md:visible pointer-events-auto"></div>
				<div class="swiper-button-next invisible md:visible pointer-events-auto"></div>
			</div>
		</div>		
	</div>
</section>