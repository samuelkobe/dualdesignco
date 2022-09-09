					
<?php if (has_custom_logo()) : ?>
        <?php the_custom_logo(); ?>
<?php else : ?>
    <div class="flex flex-col w-full h-full items-start justify-center text-sm text-white">
        <p class="h-auto lg:h-1/4"><?php bloginfo('title');?></p>
        <p class="hidden lg:h-auto lg:flex text-xs"><?php bloginfo('description');?></p>
    </div>
<?php endif; ?>