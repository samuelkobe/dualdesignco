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

<section class="w-full mb-<?php echo get_field( 'bottom_spacing' ); ?>">

    <div class="container mx-auto flex flex-col px-6 lg:px-0 py-8 lg:py-16">

		<div class="h-full flex flex-col lg:flex-row space-x-0 space-y-4 lg:space-x-8 lg:space-y-0 items-start justify-center">

			<div class="flex flex-col w-full lg:w-1/4 relative">
				<?php $image = get_field( 'image' ); ?>
				<?php if ( $image ) : ?>
					<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
				<?php endif; ?>
			</div>

			<div class="flex flex-col w-full lg:w-3/4 relative">
				<?php the_field( 'surecart_shortcode' ); ?>
			</div>

		</div>

	</div>

</section>