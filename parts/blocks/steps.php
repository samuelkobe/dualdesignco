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


<?php if ( have_rows( 'background_settings' ) ) : ?>
    <?php while ( have_rows( 'background_settings' ) ) : the_row();
        $bg_colour = 'shadow-custom';
        $texture_styles = '';
        $bg_style = '';
    ?>

        <?php if ( get_sub_field( 'background_texture_toggle' ) == 1 ) : ?>

            <?php $background_texture = get_sub_field( 'background_texture' ); ?>
            <?php if ( $background_texture ) : ?>
                <?php $texture_styles = "background-image: url(" . $background_texture['url'] . ");"; ?>
            <?php endif; ?>

            <?php if ( get_sub_field( 'repeated_texture_or_cover' ) == 1 ) : ?>
                <?php $bg_style = 'bg-repeat'; ?>
            <?php else : ?>
                <?php $bg_style = 'bg-cover' ?>
            <?php endif; ?>

        <?php else : ?>
            <?php 
                $bg_colour = get_sub_field( 'background_color' );
                if ($bg_colour == 'bg-transparent') {
                    $bg_colour = $bg_colour;
                } else {
                    $bg_colour = $bg_colour . ' ' . 'shadow-lg';
                }
            ?>
        <?php endif; ?>
            
    <?php endwhile; ?>
<?php endif; ?>

       
<?php if ( have_rows( 'steps' ) ) : ?>
    <section class="flex bg-brand-main relative opacity-90">
        <div class="absolute inset-0 w-full h-full"></div>
        <!-- <div class="w-full h-auto my-12 lg:my-20 container mx-auto flex flex-row items-start justify-evenly relative"> -->
        <div class="w-full h-auto my-12 lg:my-20 px-6 container mx-auto grid sm:grid-cols-2 sm:grid-rows-2 2xl:grid-cols-4 2xl:grid-rows-1 gap-y-8 2xl:gap-y-2 gap-x-8 2xl:gap-x-5 relative">
            <?php while ( have_rows( 'steps' ) ) : the_row(); ?>
                <div class="flex flex-col items-center w-auto px-4 py-12 lg:p-12 <?php echo $bg_colour . ' ' . $bg_style; ?>" style="<?php echo $texture_styles; ?>">
                    <?php $step_icon_image = get_sub_field( 'step_icon_image' ); ?>
                    <?php if ( $step_icon_image ) : ?>
                        <img class="w-32 h-32 xl:w-48 xl:h-48 object-cover mb-2 lg:mb-6 rounded-full aspect-square shadow-xl opacity-95" src="<?php echo esc_url( $step_icon_image['url'] ); ?>" alt="<?php echo esc_attr( $step_icon_image['alt'] ); ?>" />
                    <?php endif; ?>

                    <h4 class="w-5/6 text-center my-6 font-handwriting text-2xl lg:text-3xl 2xl:text-[28px] pb-8 border-b-2 border-dotted border-black whitespace-nowrap"><?php the_sub_field( 'title' ); ?></h4>
                    <p class="text-base w-5/6 md:w-3/4 pb-4 lg:text-center"><?php the_sub_field( 'content' ); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>

