<?php
/**
 * Block template file: parts/blocks/side-by-side.php
 *
 * Side By Side Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'side-by-side-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-side-by-side';
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

<section class="w-full mb-<?php echo get_field( 'bottom_spacing' ); ?>">

	<?php if ( get_field( 'image_orientation_side_by_side' ) == 1 ) :
		$content_order = 'lg:order-3';
        $content_padding = 'lg:pr-1/12';
	else :
		$content_order = 'lg:order-1';
        $content_padding = 'lg:pl-1/12';
    endif; ?>

    <div class="container mx-auto flex flex-col lg:flex-row px-6 lg:px-0 py-8 lg:py-16">

        <div class="w-full lg:w-5/12 lg:order-2 lg:px-1/24 mb-6 lg:mb-0">
            <?php if ( have_rows( 'image_settings' ) ) : ?>
                <?php while ( have_rows( 'image_settings' ) ) : the_row(); ?>

                    <?php 
                        $image = get_sub_field( 'image' );
                        $rounding = get_sub_field( 'image_rounding' );
                    ?>

                    <div class="h-full flex items-center">
                        <?php if ( $image ) : ?>
                            <img class="max-w-full <?php echo $rounding ?>" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                        <?php endif; ?>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <div class="w-full lg:w-7/12 flex flex-col justify-center <?php echo $content_order . ' ' . $content_padding ;?>">
            <?php if ( have_rows( 'content' ) ) : ?>
                <?php while ( have_rows( 'content' ) ) : the_row(); ?>
                    <h2 class="my-4 font-title text-3xl lg:text-4xl 2xl:text-6xl"><?php the_sub_field( 'header' ); ?></h2>
                    <p class="font-normal text-base lg:text-lg 2xl:text-xl w-full"><?php the_sub_field( 'content' ); ?></p>
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