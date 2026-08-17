<?php
/**
 * Block template file: parts/blocks/package.php
 *
 * Package Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'package-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-package';
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

<section class="w-full mb-<?php echo get_field( 'bottom_spacing' ); ?> bg-brand-main px-6 lg:px-12">

	<?php if ( get_field( 'image_orientation_side_by_side' ) == 1 ) :
		$content_order = 'lg:order-3';
		$content_padding = 'lg:pl-1/24';
	else :
		$content_order = 'lg:order-1';
		$content_padding = 'lg:pr-1/24';
    endif; ?>


    <div class="container mx-auto flex flex-col pb-8 pt-16 lg:py-24">

		<div class="flex flex-col items-center">
			<p class="mb-4 lg:mb-6 font-handwriting text-lg lg:text-2xl"><?php the_field( 'block_subtitle' ); ?></p>
			<h1 class="font-title text-4xl lg:text-5xl 2xl:text-6xl text-center"><?php the_field( 'block_title' ); ?></h1>
		</div>

		<div class="w-full flex flex-col gap-y-8 lg:gap-y-10">
<!-- 
			<div class="hidden md:grid grid-cols-6 gap-x-4 font-sans font-semibold text-xl lg:text-2xl">
				<p class="col-span-2">E-Design Packages</p>
				<p class="col-span-2">Dimensions</p>
				<p class="">Cost</p>
				<div class="relative w-32 lg:w-48"><?//php the_sub_field( 'package_shortcode' ); ?></div>
			</div> -->
			
			<?php if ( have_rows( 'packages' ) ) : ?>
				<?php while ( have_rows( 'packages' ) ) : the_row(); ?>

				<div class="grid grid-cols-1 md:grid-cols-6 gap-y-2 md:gap-y-0 grid-flow-row gap-x-4 items-center relative">
					<p class="font-title text-3xl lg:text-4xl xl:text-5xl col-span-1 md:col-span-2 order-1"><?php the_sub_field( 'package_name' ); ?></p>
					<p class="font-sans texl-lg xl:text-xl col-span-2 order-3 md:order-2"><?php the_sub_field( 'package_description' ); ?></p>
					<p class="font-sans font-semibold text-2xl xl:text-3xl order-2 md:order-3 col-span-1 md:"><?php the_sub_field( 'package_price' ); ?></p>
					<div class="flex md:absolute md:right-0 md:justify-end w-32 md:w-48 order-4"><?php the_sub_field( 'package_shortcode' ); ?></div>
				</div>

				<?php endwhile; ?>
			<?php endif; ?>

		</div>

	</div>

	<div class="container mx-auto flex flex-col lg:flex-row py-8 lg:py-16 border-t-2 border-dotted border-black">

        <div class="w-full lg:w-5/12 mb-6 lg:mb-0">
            <?php if ( have_rows( 'image_settings' ) ) : ?>
                <?php while ( have_rows( 'image_settings' ) ) : the_row(); ?>

                    <?php 
                        $images_images = get_sub_field( 'images' );
                        $rounding = get_sub_field( 'image_rounding' );
                    ?>

                    <div class="h-full flex items-center">
                        <div class="w-full swiperPackages swiper-wrapper-div overflow-x-hidden">
                            <?php if ( $images_images ) :  ?>
                                <div class="w-full container mx-auto swiper-wrapper">
                                    <?php foreach ( $images_images as $images_image ): ?>
                                        <div class="swiper-slide w-full flex flex-col bg-white">
                                            <img class="max-w-full shadow-xl object-cover aspect-[edesign] <?php echo $rounding ?>" src="<?php echo esc_url( $images_image['url'] ); ?>" alt="<?php echo esc_attr( $images_image['alt'] ); ?>" />
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <div class="w-full lg:w-7/12 flex flex-col justify-center <?php echo $content_order . ' ' . $content_padding ;?>">
            <?php if ( have_rows( 'content' ) ) : ?>
                <?php while ( have_rows( 'content' ) ) : the_row(); ?>
                    <h3 class="mt-4 font-title text-2xl lg:text-3xl 2xl:text-5xl 2xl:leading-tight"><?php the_sub_field( 'header' ); ?></h3>
                    <p class="font-normal text-base lg:text-lg 2xl:text-xl w-full mt-4 lg:mt-8 2xl:leading-relaxed"><?php the_sub_field( 'content' ); ?></p>
                    <?php if ( get_sub_field( 'button_toggle' ) == 1 ) : ?>
                        <?php $button_link = get_sub_field( 'button_link' ); ?>            
                        <?php if ( $button_link ) : ?>
                            <div class="flex flex-row relative mt-2 lg:mt-4">
                                <a class="theme-button main" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>    
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

</section>