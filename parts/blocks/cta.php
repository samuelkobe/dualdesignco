<?php
/**
 * Block template file: parts/blocks/cta.php
 *
 * Call To Action Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'call-to-action-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-call-to-action';
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

<?php if ( get_field( 'background_pattern_toggle' ) == 1 ) : ?>
	<?php $background_pattern = get_field( 'background_pattern' ); ?>
	<?php if ( $background_pattern ) :
        $bg_pattern = $background_pattern['url'];
	endif; ?>
<?php endif; ?>

<section class="flex flex-row items-center justify-center bg-brand-main relative">
    
    <?php if ( get_field( 'background_pattern_toggle' ) == 1 ) : ?>
        <div class="absolute inset-0 w-full h-full" style="background-image: url('<?php echo $bg_pattern ;?>')"></div>
    <?php endif; ?>

    <div class="w-full h-auto my-12 lg:my-20 contained items-center justify-center relative">
       
        <h3 class="text-3xl lg:text-4xl 2xl:text-6xl leading-7 text-center font-title theme-override"><?php the_field( 'title' ); ?></h3>
        <p class="text-base lg:text-lg text-center mt-2 lg:mt-4 w-full lg:w-2/3"><?php the_field( 'content' ); ?></p>
        <?php if ( get_field( 'button_toggle' ) == 1 ) : ?>
            <?php $button = get_field( 'button' ); ?>            
            <?php if ( $button ) : ?>
            <div class="flex flex-row relative mt-2 md:mt-4">
                <a class="theme-button alt" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
            </div>
            <?php endif; ?>
        <?php else : ?>
        <?php endif; ?>
    </div>
</section>