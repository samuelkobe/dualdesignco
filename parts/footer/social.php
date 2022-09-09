<div class="w-full md:w-1/4 lg:w-1/6 order-4 lg:order-3">
    <h3 class="text-lg lg:text-2xl text-white font-title mb-4 lg:mb-6">Follow us</h4>
    <?php if ( have_rows( 'social_media', 'option' ) ) : ?>
        <?php while ( have_rows( 'social_media', 'option' ) ) : the_row(); ?>

		<?php if ( get_row_layout() == 'social_media' ) : ?>
			<?php if ( have_rows( 'info' ) ) : ?>
				<?php while ( have_rows( 'info' ) ) : the_row(); ?>
					<?php
                        $social_title = get_sub_field( 'title' );
                        $social_url = get_sub_field( 'url' );
                    ?>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php $social_icon = get_sub_field( 'icon' ); ?>
			<?php $social_icon_fill = get_sub_field( 'icon_fill' ); ?>
		<?php endif; ?>

        <a class="flex flex-row items-center mr-4 lg:mx-0 transition-colors duration-300 mb-4 last:mb-0 fill-<?php echo $social_icon_fill; ?> hover:text-brand-third hover:fill-brand-third" href="<?php echo $social_url; ?>" target="_blank" rel="noreferrer">
            <div class="fill-inherit"><?php echo $social_icon; ?></div>
            <p class="ml-4"><?php echo $social_title; ?></p>
        </a>

        <?php endwhile; ?>
    <?php else : ?>
        <?php // no rows found ?>
    <?php endif; ?>
</div>

