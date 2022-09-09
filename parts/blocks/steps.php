<?php
/**
 * Block template file: parts/blocks/steps.php
 *
 * Steps Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'steps-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-steps';
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

       
<?php if ( have_rows( 'steps' ) ) : ?>
    <section class="flex bg-brand-main relative">
        <div class="absolute inset-0 w-full h-full"></div>
        <!-- <div class="w-full h-auto my-12 lg:my-20 container mx-auto flex flex-row items-start justify-evenly relative"> -->
        <div class="w-full h-auto my-12 lg:my-20 px-6 container mx-auto grid grid-flow-row-dense sm:grid-cols-2 sm:grid-rows-2 xl:grid-cols-4 xl:grid-rows-1 gap-y-12 xl:gap-0 relative">
            <?php while ( have_rows( 'steps' ) ) : the_row(); ?>
                <div class="flex flex-col items-center w-auto">
                    <?php $step_icon_image = get_sub_field( 'step_icon_image' ); ?>
                    <?php if ( $step_icon_image ) : ?>
                        <img class="w-24 h-24 md:w-32 md:h-32 xl:w-40 xl:h-40 object-cover mb-2 lg:mb-4" src="<?php echo esc_url( $step_icon_image['url'] ); ?>" alt="<?php echo esc_attr( $step_icon_image['alt'] ); ?>" />
                    <?php endif; ?>

                    <h4 class="mt-6 mb-6 xl:mb-8 font-title text-xl lg:text-3xl 2xl:text-4xl"><?php the_sub_field( 'title' ); ?></h4>
                    <p class="text-sm md:text-base w-5/6 md:w-3/4"><?php the_sub_field( 'content' ); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>

