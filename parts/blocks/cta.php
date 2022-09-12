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

<?php
    $bg_colour = get_field( 'background_colour' );
    $alignment = 'start';
    $content_width = 'xl:w-5/6';
    if (get_field( 'content_alignment_choice' ) == null) {
        $content_alignment = 'left';
    } else {
        $content_alignment = get_field( 'content_alignment_choice' );
        if ($content_alignment == 'left') {
            $alignment = 'start';
            $content_width = 'xl:w-5/6';
        } elseif ($content_alignment == 'center') {
            $alignment = 'center';
            $content_width = 'lg:w-3/4 xl:w-2/3';
        } elseif ($content_alignment == 'right') {
            $alignment = 'end';
            $content_width = 'xl:w-5/6';
        } else {
            $content_width = 'xl:w-5/6';
        }
    }
?>

<?php if ( get_field( 'background_pattern_toggle' ) == 1 ) : ?>
	<?php $background_pattern = get_field( 'background_pattern' ); ?>
	<?php if ( $background_pattern ) :
        $bg_pattern = $background_pattern['url'];
	endif; ?>
<?php endif; ?>

<section class="flex flex-row items-center justify-center bg-<?php echo $bg_colour; ?> relative">
    
    <?php if ( get_field( 'background_pattern_toggle' ) == 1 ) : ?>
        <?php
            if ( get_field( 'background_texture_type' ) == 1 ) :
                $texture_type = '';
            else :
                $texture_type = 'bg-cover opacity-80';
            endif;
        ?>

        <div class="absolute inset-0 w-full h-full <?php echo $texture_type; ?>" style="background-image: url('<?php echo $bg_pattern ;?>')"></div>
    <?php endif; ?>

    <div class="w-full h-auto my-16 lg:my-28 contained items-<?php echo $alignment; ?> justify-center relative">
       
        <h3 class="text-3xl lg:text-4xl 2xl:text-6xl leading-7 text-<?php echo $content_alignment; ?> font-title border-b-2 border-dotted border-black pb-4 theme-override"><?php the_field( 'title' ); ?></h3>

        <?php if ( get_field( 'content_type_toggle' ) == 1 ) : ?>
		    <p class="text-base lg:text-lg text-<?php echo $content_alignment; ?> mt-2 lg:mt-4 w-full <?php echo $content_width; ?>"><?php the_field( 'content' ); ?></p>
	    <?php else : ?>
            <?php if ( have_rows( 'bullet' ) ) : ?>
                <ul class="w-full mt-4 lg:mt-6 pl-4 list-disc text-base lg:text-lg text-left">
                    <?php while ( have_rows( 'bullet' ) ) : the_row(); ?>
                        <li class="last:mb-0 mb-4 lg:mb-2"><?php the_sub_field( 'bullet_content' ); ?></li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
	    <?php endif; ?>
    
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