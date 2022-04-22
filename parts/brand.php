					
<?php if (has_custom_logo()) : ?>
    <?php the_custom_logo(); ?>
<?php else : ?>
    <p><?php bloginfo('title');?></p>
    <p><?php bloginfo('description');?></p>
<?php endif; ?>