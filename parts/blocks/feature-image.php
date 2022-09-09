<?php
/**
 * Block template file: parts/blocks/feature-image.php
 *
 * Feature Image Block Template.
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

    <div class="container mx-auto flex flex-col px-6 lg:px-0 py-8 lg:py-16">

        <div class="w-full flex flex-col items-center">
            <?php if ( have_rows( 'content' ) ) : ?>
                <?php while ( have_rows( 'content' ) ) : the_row(); ?>

                    <?php if ( get_sub_field( 'subtitle_toggle' ) == 1 ) : ?>
                        <h3 class="mb-4 lg:mb-8 font-handwriting text-sm lg:text-lg 2xl:text-xl"><?php the_sub_field( 'subtitle' ); ?></h3>
                    <?php endif; ?>
                
                    <h2 class="mb-2 lg:mb-6 font-title text-4xl lg:text-5xl 2xl:text-6xl"><?php the_sub_field( 'title' ); ?></h2>
                    
                    <?php if ( get_sub_field( 'content_toggle' ) == 1 ) : ?>
                        <p class="mb-2 font-sans text-left sm:text-center lg:w-3/4 text-sm lg:text-base 2xl:text-lg"><?php the_sub_field( 'content' ); ?></p>
                    <?php endif; ?>
                    
                    <?php if ( get_sub_field( 'button_toggle' ) == 1 ) : ?>
                        <?php $button_link = get_sub_field( 'button_link' ); ?>            
                        <?php if ( $button_link ) : ?>
                            <div class="flex flex-row relative mt-2">
                                <a class="theme-button main" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="w-full invisible h-1 mb-6 lg:mb-10"></div>
                    
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <div class="w-full md:px-1/12 lg:px-1/6 mb-6">
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

    </div>

</section>