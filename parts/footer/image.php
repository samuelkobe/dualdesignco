<?php if ( get_field( 'newsletter_media_toggle', 'option' ) == 1 ) : ?>
    <?php
    // This logic exists to pretty up the footer order when no Newsletter is present.
    // Newsletter is on
    $footer_image_col_width = 'w-full md:w-1/2 lg:w-1/4';
    $footer_image_wrapper_padding = 'lg:pr-1/8';
    $footer_image_padding = 'lg:pr-1/4';
    ?>

<?php else : ?>
    <?php
    // Newsletter is off
    $footer_image_col_width = 'w-full md:w-1/4';
    $footer_image_wrapper_padding = 'md:pr-1/8';
    $footer_image_padding = 'md:pr-1/4';
    ?>
<?php endif; ?>

<div class="<?php echo $footer_image_col_width; ?> order-0 mb-8 lg:mb-0 lg:self-center">
    <div class="w-full flex justify-center h-full py-12 lg:py-0 lg:h-auto items-center <?php echo $footer_image_wrapper_padding; ?>">
        <?php $footer_image = get_field( 'footer_image', 'option' ); ?>
        <?php if ( $footer_image ) : ?>
            <img class="<?php echo $footer_image_padding; ?> max-w-full w-[240px] h-auto lg:w-full relative" src="<?php echo esc_url( $footer_image['url'] ); ?>" alt="<?php echo esc_attr( $footer_image['alt'] ); ?>" />
        <?php endif; ?>
    </div>
</div>