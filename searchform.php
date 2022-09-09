<!-- search -->
<form class="flex" method="get" action="<?php echo home_url(); ?>" role="search">
	<input id="searchForm" class="grow text-base xl:text-lg h-10 lg:h-12 p-2 text-brand-black rounded placeholder-brand-alt focus:outline-none outline-none focus:text-brand-black border-2 border-transparent focus:border-brand-alt transition-colors duration-200" value="<?php the_search_query(); ?>" type="search" name="s" placeholder="<?php _e( 'To search, type and hit enter.', 'weboksolutions' ); ?>">
	<button class="ml-4 w-auto h-10 lg:h-12 justify-center pt-2 pb-1 xl:pt-2 px-3 xl:pb-1 xl:px-4 rounded no-underline flex items-center text-white font-button text-xl lg:text-2xl bg-brand-third hover:bg-brand-black transition-colors duration-200 uppercase cursor-pointer" type="submit" role="button"><?php _e( 'Search', 'weboksolutions' ); ?></button>
</form>
<!-- /search -->