










<?php
/**
 * Block template file: parts/blocks/fifty-fifty.php
 *
 * 50 50 Services Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = '50-50-services-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-50-50-services';
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

    <div class="container mx-auto flex flex-col px-6 lg:px-0 py-8 lg:py-16">
   
        <div class="w-full flex flex-col items-center">
            <?php if ( get_field( 'title_toggle' ) == 1 ) : ?>
                <h3 class="mb-8 lg:mb-16 font-handwriting text-2xl 2xl:text-4xl w-full lg:w-auto text-center"><?php the_field( 'title' ); ?></h3>
            <?php endif; ?>
        </div>

        <div class="w-full lg:px-1/12 mb-6">
            <div class="h-full flex flex-col lg:flex-row items-center lg:items-end justify-center gap-y-16 gap-x-0 lg:gap-y-0 lg:gap-x-8 2xl:gap-x-16">

                <div class="flex flex-col w-full lg:w-1/2 relative">

                    <?php if ( have_rows( 'left_content' ) ) : ?>
                        <?php while ( have_rows( 'left_content' ) ) : the_row(); ?>

                            <div class="flex">
                                <h2 class="mb-4 lg:mb-6 pb-3 lg:pb-5 font-title text-4xl 2xl:text-5xl border-b-2 border-dotted border-black"><?php the_sub_field( 'name' ); ?></h2>
                            </div>
                            <?php if ( get_sub_field( 'content_toggle' ) == 1 ) : ?>
                                <p class="mb-4 lg:mb-8 font-sans text-base lg:text-lg 2xl:text-xl leading-relaxed lg:leading-relaxed 2xl:leading-relaxed lg:min-h-[160px] xl:min-h-[120px]"><?php the_sub_field( 'content' ); ?></p>
                            <?php endif; ?>

                            <?php $image = get_sub_field( 'image' ); ?>
                            <div>
                                <?php if ( $image ) : ?>
                                    <img class="w-full h-72 sm:h-80 md:h-64 lg:h-80 xl:h-96 shadow-xl object-cover max-w-full <?php echo $rounding ?>" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                <?php endif; ?>
                            </div>

                            <?php if ( get_sub_field( 'button_toggle' ) == 1 ) : ?>
                                <?php $button_link = get_sub_field( 'button_link' ); ?>            
                                <?php if ( $button_link ) : ?>
                                    <div class="flex flex-row relative mt-2">
                                        <a class="theme-button main" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>

                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>

                <div class="flex flex-col w-full lg:w-1/2 relative">

                    <?php if ( have_rows( 'right_content' ) ) : ?>
                        <?php while ( have_rows( 'right_content' ) ) : the_row(); ?>

                            <div class="flex">
                                <h2 class="mb-4 lg:mb-6 pb-3 lg:pb-5 font-title text-4xl 2xl:text-5xl border-b-2 border-dotted border-black"><?php the_sub_field( 'name' ); ?></h2>
                            </div>
                            <?php if ( get_sub_field( 'content_toggle' ) == 1 ) : ?>
                                <p class="mb-4 lg:mb-8 font-sans text-base lg:text-lg 2xl:text-xl leading-relaxed lg:leading-relaxed 2xl:leading-relaxed lg:min-h-[160px] xl:min-h-[120px]"><?php the_sub_field( 'content' ); ?></p>
                            <?php endif; ?>

                            <?php $image = get_sub_field( 'image' ); ?>
                            <div>
                                <?php if ( $image ) : ?>
                                    <img class="w-full h-72 sm:h-80 md:h-64 lg:h-80 xl:h-96 shadow-xl object-cover max-w-full <?php echo $rounding ?>" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                <?php endif; ?>
                            </div>

                            <?php if ( get_sub_field( 'button_toggle' ) == 1 ) : ?>
                                <?php $button_link = get_sub_field( 'button_link' ); ?>            
                                <?php if ( $button_link ) : ?>
                                    <div class="flex flex-row relative mt-2">
                                        <a class="theme-button main" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>

                        <?php endwhile; ?>
                    <?php endif; ?>
                    
                </div>

            </div>
        </div>

    </div>

</section>