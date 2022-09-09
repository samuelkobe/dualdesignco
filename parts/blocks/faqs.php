<?php
/**
 * Block template file: parts/blocks/faqs.php
 *
 * Faqs Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'faqs-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-faqs';
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
    <div class="container mx-auto flex flex-col items-center px-6 lg:px-0 py-8 lg:py-16 2xl:py-32">
        
        <div class="w-full md:w-5/6 md:mx-1/6 mb-6 xl:mb-12">
            <h3 class="font-title text-brand-fourth text-3xl lg:text-4xl 2xl:text-5xl"><?php the_field( 'faq_group_title' ); ?></h3>
        </div>
        
        <?php
        $faq_count = 0;
        if ( have_rows( 'faqs' ) ) : ?>
        <div class="flex flex-col w-full md:w-5/6 md:mx-1/6 border-t-2 border-grey-light">
            <?php while ( have_rows( 'faqs' ) ) : the_row(); ?>             
                <div class="faq-item flex flex-col w-full relative border-b-2 border-grey-light py-6 cursor-pointer <?php if ($faq_count == 0) : echo 'open'; else : endif; ?>">
                    <h4 class="w-5/6 sm:w-11/12 text-lg lg:text-xl xl:text-2xl font-sans text-brand-black my-2 xl:my-4 relative after:transform after:transition-all after:duration-500 after:-rotate-180 after:cursor-pointer"><?php the_sub_field( 'question' ); ?></h4>
                    <p class="w-11/12 text-brand-black text-base lg:text-lg"><?php the_sub_field( 'answer' ); ?></p>
                </div>
            <?php $faq_count++;
            endwhile; ?>
        </div>
    <?php endif; ?>

    </div>
</section>