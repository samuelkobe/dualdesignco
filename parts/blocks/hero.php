<?php
/**
 * Block template file: parts/blocks/hero-block.php
 *
 * Page Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'page-hero-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-page-hero';
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
    $background_image = get_field( 'background_image' );
    $background_video = get_field( 'background_video' );

    if ( get_field( 'page_hero_height' ) == 1 ) :
        $hero_height = 'h-[65vh] lg:h-[90vh] min-h-[240px] md:min-h-[480px] xl:min-h-[640px]';
        $title_styles = 'lg:mt-6 lg:mb-4';
    else :
        $hero_height = 'h-[25vh] lg:h-[50vh] min-h-[120px] md:min-h-[240px] xl:min-h-[480px]';
        $title_styles = 'lg:mt-0 lg:mb-4';
    endif;

    $video = '<video
                    class="absolute top-0 left-0 w-full h-full object-cover mix-blend-normal"
                    preload="metadata"
                    muted
                    autoplay
                    loop
                    playsinline
                    src="' . $background_video . '"
                    type="video/mp4">
                    Sorry, your browser doesn\'t support embedded videos.
                </video>';
?>
        
        <?php if ( get_field( 'page_hero' ) == 1 ) : // this checks to see if the page hero is in overlay mode or 50/50 mode.?>
        <section class="flex relative w-full mt-16 lg:mt-0 mb-<?php echo get_field( 'bottom_spacing' ); ?> px-4 xl:px-0 overflow-hidden <?php echo $hero_height ?>">
            <div class="absolute left-0 top-0 h-full w-full bg-black z-10 opacity-30 pointer-events-none"></div>

            <?php if ( get_field( 'background_type' ) == 1 ) : ?>
                <?php if ( $background_image ) : ?>
                    <img class="absolute inset-0 w-full h-full object-cover mix-blend-normal theme-override" src="<?php echo esc_url( $background_image['url'] ); ?>" alt="<?php echo esc_attr( $background_image['alt'] ); ?>" />
                <?php endif; ?> 
            <?php else : ?>
                <?php echo $video;?>
            <?php endif; ?>

            <div class="w-full py-8 md:py-16 lg:mt-0 contained flex-col lg:flex-row items-center justify-center relative z-20 text-white">

                <div class="w-full order-2 relative">
                    <h1 class="mb-2 font-title capitalize <?php echo $title_styles;?> text-5xl lg:text-6xl 2xl:text-8xl leading-none lg:leading-tight xl:leading-snug"><?php the_field( 'hero_title' ); ?></h1>
                    <p class="font-normal text-lg lg:text-xl 2xl:text-2xl w-full md:w-5/6 lg:w-3/4 "><?php the_field( 'hero_content' ); ?></p>
                    
                    <?php if ( get_field( 'button_toggle' ) == 1 ) : ?>
                        <?php $button_link = get_field( 'button_link' ); ?>            
                        <?php if ( $button_link ) : ?>
                            <div class="flex flex-row relative mt-2 lg:mt-4">
                                <a class="theme-button main" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                </div>

            </div>
        </section>

        <?php else : 
                if ( get_field( 'media_orientation' ) == 1 ) :
                    $content_order = 'lg:order-3';
                    $translate_settings = 'lg:-translate-x-1/6 xl:-translate-x-1/4';
                    $stylized_orientation = 'lg:items-start';
                else :
                    $content_order = 'lg:order-1';
                    $translate_settings = 'lg:translate-x-1/6 xl:translate-x-1/4';
                    $stylized_orientation = 'lg:items-end';
                endif;
        ?>
        
        <section class="w-full flex flex-col lg:flex-row mt-20 mb-4 lg:mb-<?php echo get_field( 'bottom_spacing' ); ?> h-auto lg:h-[60vh] xl:h-[75vh] lg:min-h-[640px] 2xl:min-h-[720px]">

            <div class="flex w-full lg:w-7/12 min-h-[240px] sm:min-h-[320px] h-1/2 lg:h-full relative lg:order-2 z-0">
                <!-- <div class="absolute left-0 top-0 h-full w-full bg-black z-10 opacity-20 pointer-events-none"></div> -->
                <?php if ( get_field( 'background_type' ) == 1 ) : ?>
                    <?php if ( $background_image ) : ?>
                        <img class="absolute inset-0 w-full h-full object-cover theme-override shadow-xl" src="<?php echo esc_url( $background_image['url'] ); ?>" alt="<?php echo esc_attr( $background_image['alt'] ); ?>" />
                    <?php endif; ?> 
                <?php else : ?>
                    <?php echo $video;?>
                <?php endif; ?>
            </div>

            <div class="flex flex-col justify-center items-start w-full lg:w-5/12 lg:h-full px-1/24 lg:px-0 z-1 pb-10 lg:pb-0 mt-6 lg:mt-0 -mb-28 lg:mb-0 <?php echo $content_order ;?>">
                <div class="w-full p-8 lg:px-16 lg:py-24 2xl:px-24 2xl:py-48 flex flex-col justify-center items-start rounded-sm relative lg:transform -translate-y-28 lg:-translate-y-12 xl:-translate-y-8 2xl:-translate-y-0 <?php echo $translate_settings ;?>">                    
                    <?php if ( get_field( 'hero_content_settings_toggle' ) == 1 ) : ?>

                        <?php if ( get_field( 'hero_content_background_texture_toggle' ) == 1 ) : ?>
                            <?php $hero_content_background_texture = get_field( 'hero_content_background_texture' ); ?>
                            <?php if ( $hero_content_background_texture ) : ?>
                                <div class="absolute inset-0 w-full h-full bg-brand-main -z-1 rounded-sm lg:opacity-95 shadow-xl" style="background-image: url(<?php echo $hero_content_background_texture['url']; ?>);"></div>
                            <?php endif; ?>
                        <?php else : ?>
                            <div class="absolute inset-0 w-full h-full bg-brand-main -z-1 rounded-sm lg:opacity-95 shadow-xl"></div>
                        <?php endif; ?>
                        <h1 class="my-4 font-title capitalize text-4xl md:text-5xl lg:text-5xl 2xl:text-7xl"><?php the_field( 'hero_title' ); ?></h1>
                        <p class="font-normal text-base lg:text-lg 2xl:text-xl w-full md:w-5/6 mt-0 lg:mt-4"><?php the_field( 'hero_content' ); ?></p>

                    <?php else : ?>

                        <?php if ( get_field( 'hero_content_background_texture_toggle' ) == 1 ) : ?>
                            <?php $hero_content_background_texture = get_field( 'hero_content_background_texture' ); ?>
                            <?php if ( $hero_content_background_texture ) : ?>
                                <div class="absolute inset-0 w-full h-full bg-brand-main lg:bg-white -z-1 rounded-sm" style="background-image: url(<?php echo $hero_content_background_texture['url']; ?>);"></div>
                            <?php endif; ?>
                        <?php else : ?>
                            <div class="absolute inset-0 w-full h-full bg-brand-main lg:bg-white -z-1 rounded-sm"></div>
                        <?php endif; ?>
                        <div class="flex flex-col gap-y-2 <?php echo $stylized_orientation; ?>">
                            <p class="font-sans font-bold uppercase text-lg md:text-xl lg:text-2xl 2xl:text-4xl"><?php the_field( 'hero_stylized_content_line_1' ); ?></p>
                            <p class="font-title uppercase text-lg md:text-xl lg:text-2xl 2xl:text-4xl mt-0 lg:mt-1"><?php the_field( 'hero_stylized_content_line_2' ); ?></p>
                            <p class="font-sans font-bold uppercase text-lg md:text-xl lg:text-2xl 2xl:text-4xl"><?php the_field( 'hero_stylized_content_line_3' ); ?></p>
                        </div>

                    <?php endif; ?>

                    <?php if ( get_field( 'button_toggle' ) == 1 ) : ?>
                        <?php $button_link = get_field( 'button_link' ); ?>            
                        <?php if ( $button_link ) : ?>
                            <div class="flex flex-row relative mt-2 lg:mt-4">
                                <a class="theme-button main" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
                
            </div>
        </section>

        <?php endif; ?>

