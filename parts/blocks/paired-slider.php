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

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<?php if ( have_rows( 'slider_content' ) ): ?>
		<?php while ( have_rows( 'slider_content' ) ) : the_row(); ?>
			<?php if ( get_row_layout() == 'paired_content' ) : ?>
				<?php the_sub_field( 'title' ); ?>
				<?php if ( get_sub_field( 'content_toggle' ) == 1 ) : ?>
					<?php // echo 'true'; ?>
				<?php else : ?>
					<?php // echo 'false'; ?>
				<?php endif; ?>
				<?php the_sub_field( 'content' ); ?>
				<?php $image_left = get_sub_field( 'image_left' ); ?>
				<?php if ( $image_left ) : ?>
					<img src="<?php echo esc_url( $image_left['url'] ); ?>" alt="<?php echo esc_attr( $image_left['alt'] ); ?>" />
				<?php endif; ?>
				<?php $image_right = get_sub_field( 'image_right' ); ?>
				<?php if ( $image_right ) : ?>
					<img src="<?php echo esc_url( $image_right['url'] ); ?>" alt="<?php echo esc_attr( $image_right['alt'] ); ?>" />
				<?php endif; ?>
				<?php if ( get_sub_field( 'left_image_tag_toggle' ) == 1 ) : ?>
					<?php // echo 'true'; ?>
				<?php else : ?>
					<?php // echo 'false'; ?>
				<?php endif; ?>
				<?php the_sub_field( 'left_tag' ); ?>
				<?php the_sub_field( 'left_tag_background_colour' ); ?>
				<?php if ( get_sub_field( 'right_image_tag_toggle' ) == 1 ) : ?>
					<?php // echo 'true'; ?>
				<?php else : ?>
					<?php // echo 'false'; ?>
				<?php endif; ?>
				<?php the_sub_field( 'right_tag' ); ?>
				<?php the_sub_field( 'right_tag_background_colour' ); ?>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php else: ?>
		<?php // No layouts found ?>
	<?php endif; ?>
	<?php the_field( 'bottom_spacing' ); ?>
</div>