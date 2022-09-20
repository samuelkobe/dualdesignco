<?php
/**
 * Block template file: parts/blocks/testimonials.php
 *
 * Testimonials Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonials-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-testimonials';
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
$block_id = '';
if ( have_rows( 'id' ) ) : ?>
    <?php while ( have_rows( 'id' ) ) : the_row(); ?>
        <?php if ( get_sub_field( 'block_id_toggle' ) == 1 ) : ?>
            <?php
                $block_anchor = formatAnchor(get_sub_field( 'block_id' ));
                $block_id = $block_anchor;
                ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<section id="<?php echo $block_id ?>" class="w-full mt-8 lg:mt-24 mb-<?php echo get_field( 'bottom_spacing' ); ?>">
    <div class="relative flex flex-col items-center contained rounded bg-brand-alt p-20 2xl:p-24 shadow-xl mx-6 2xl:mx-auto">
        
        <div class="max-w-full mb-12 lg:mb-16 flex">
            <h2 class="font-title text-black text-5xl leading-tight lg:text-6xl lg:leading-snug w-auto border-b-2 border-dotted border-black pb-4 lg:pb-10"><?php the_field( 'testimonials_group_title' ); ?></h2>
        </div>

        <div class="w-full swiperTestimonial swiper-wrapper-div overflow-x-hidden">
            
            <?php if ( have_rows( 'testimonials' ) ) : ?>
                <div class="w-full swiper-wrapper">
                    <?php while ( have_rows( 'testimonials' ) ) : the_row(); ?>
                        <div class="swiper-slide w-full relative flex flex-col">
                                                         
                            <div class="mt-2 md:mt-0 w-auto flex flex-col">
                                <div class="flex flex-row items-center">
                                    <h3 class="text-black font-title font-normal text-3xl lg:text-4xl"><?php the_sub_field( 'author' ); ?></h3>
                                    <span class="inline-flex mx-2 w-3 h-[2px] rounded-lg bg-black"></span><p class=" text-black font-sans font-semibold text-xs lg:text-sm"><?php the_sub_field( 'location' ); ?></p>
                                </div>
                                <p class=" text-brand-fourth font-title text-base lg:text-lg uppercase"><?php the_sub_field( 'association' ); ?></p>
                                    
                            </div>

                            <p class="mt-5 text-black font-base font-normal text-lg lg:text-xl w-full lg:w-11/12 pb-4 lg:pb-8"><?php the_sub_field( 'quote' ); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
                    <div class="w-auto whitespace-nowrap absolute bottom-8 2xl:bottom-12 left-6 lg:left-12 2xl:left-24">
                    <div class="swiper-pagination"></div>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>


