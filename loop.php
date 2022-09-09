	<?php if (have_posts()): ?>

		<div class="grid grid-cols-1 gap-y-8 md:grid-cols-2 md:gap-8 xl:grid-cols-3 xl:gap-10">	

			<?php while (have_posts()) : the_post(); ?>

				<div class="flex flex-col lg:flex-row lg:flex-wrap w-full lg:items-center">

					<div class="flex flex-col w-full relative overflow-hidden rounded">
						<div class="absolute left-0 top-0 h-full w-full bg-black opacity-40 pointer-events-none z-1"></div>   

						<h2 class="absolute inset-x-0 top-[35%] text-center text-3xl lg:text-5xl font-title leading-none shadow text-white px-4 py-2 z-10 pointer-events-none"><?php the_title(); ?></h2>

						<p class="absolute right-3 top-2 text-white text-lg lg:text-xl font-button z-1 pointer-events-none"><?php the_time('M j, Y'); ?></p>

						<div class="absolute bottom-5 left-4 categories z-10"><?php the_category('&#32');?></div>

						<a class="w-full inline-block" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php if ( has_post_thumbnail()) : ?>
								<?php the_post_thumbnail('large', array('class' => 'w-full h-72 sm:h-80 md:h-64 lg:h-80 object-cover max-w-full')); ?>
							<?php endif; ?>
						</a>

					</div>

				</div>
				
			<?php endwhile; ?>

		</div>

	<?php else: ?>
		<h2 class="leading-normal text-base lg:text-xl w-full md:w-5/6 lg:w-3/4 xl:w-2/3">Oops, either you searched for something that doesn't exist or left the search field empty. Try searching again or go back to <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="border-b-2 border-brand-third hover:text-brand-third transition-colors duration-200" title="All Posts">All Posts</a> or navigate to the <a class="border-b-2 border-brand-third hover:text-brand-third transition-colors duration-200" rel="Back home" title="Home" href="<?php echo esc_url( home_url() ); ?>">Home</a> page.</h2>
	<?php endif; ?>
