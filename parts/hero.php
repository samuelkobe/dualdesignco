<?php if ( have_rows( 'hero' ) ): ?>
	<?php while ( have_rows( 'hero' ) ) : the_row(); ?>

        <?php if ( get_sub_field( 'page_hero' ) == 1 ) : // this checks to see if the page hero is active. If not use some inline JS to account for header menu spacing.?>
            
        <?php
            $background_image = get_sub_field( 'background_image' );
            $background_video = get_sub_field( 'background_video' );
            $button = 'button accent mt-4 md:mt-8 mb-2';
            if ( get_sub_field( 'page_hero_height' ) == 1 ) :
                $hero_height = 'h-[65vh] lg:h-[85vh] min-h-[240px] md:min-h-[480px] xl:min-h-[640px]';
                $title_styles = 'lg:mt-6 lg:mb-4';
            else :
                $hero_height = 'h-[25vh] lg:h-[35vh] min-h-[120px] md:min-h-[240px] xl:min-h-[480px]';
                $title_styles = 'lg:mt-0 lg:mb-4';
            endif;
            if ( have_rows( 'background_blend_colour' ) ) :
                while ( have_rows( 'background_blend_colour' ) ) : the_row();
                $colour = get_sub_field( 'colours' );
                switch ($colour) {
                    case 'main':
                        $bg_colour = 'bg-brand-main';
                        $img_vid_blend = 'mix-blend-luminosity';
                        break;
                    case 'alt':
                        $bg_colour = 'bg-brand-alt';
                        $img_vid_blend = 'mix-blend-luminosity';
                        break;
                    case 'black':
                        $bg_colour = 'bg-brand-black';
                        $img_vid_blend = 'mix-blend-luminosity';
                        break;
                    case 'none':
                        $bg_colour = 'bg-transparent';
                        $img_vid_blend = 'mix-blend-normal';
                        break;
                    default:
                        $bg_colour = 'bg-transparent';
                        $img_vid_blend = 'mix-blend-normal';
                        break;
                }
                    
                endwhile; 
            endif;
            $video = '<video
                            class="absolute top-0 left-0 w-full h-full object-cover ' . $img_vid_blend . '"
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
    
            <section class="flex relative w-full px-4 xl:px-0 overflow-hidden <?php echo $hero_height . " " . $bg_colour ?>">
                <div class="absolute left-0 top-0 h-full w-full bg-black z-10 opacity-20 pointer-events-none"></div>
                <?php if ( get_sub_field( 'background_type' ) == 1 ) : ?>
                    <?php if ( $background_image ) : ?>
                        <img class="absolute left-0 w-full h-full object-cover <?php echo $img_vid_blend; ?>" src="<?php echo esc_url( $background_image['url'] ); ?>" alt="<?php echo esc_attr( $background_image['alt'] ); ?>" />
                    <?php endif; ?> 
                <?php else : ?>
                    <?php echo $video;?>
                <?php endif; ?>

                <div class="w-full py-8 md:py-16 lg:mt-0 contained flex-col lg:flex-row items-center justify-start relative z-20 text-white">

                    <div class="w-full lg:w-2/3 order-2">

                        <h1 class="font-black my-4 <?php echo $title_styles;?> text-3xl md:text-4xl lg:text-5xl xl:text-6xl leading-none lg:leading-tight xl:leading-snug"><?php the_sub_field( 'hero_title' ); ?></h1>
                        <p class="font-normal lg:leading-normal text-base lg:text-lg xl:text-xl w-full xl:w-3/4 "><?php the_sub_field( 'hero_content' ); ?></p>
                        
                        <div class="flex flex-row relative">
                            <?php if ( get_sub_field( 'button_toggle' ) == 1 ) : ?>
                                <?php $button_link = get_sub_field( 'button_link' ); ?>            
                                <?php if ( $button_link ) : ?>
                                <div class="flex flex-row relative">
                                    <a class="<?php echo $button; ?>" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                                </div>
                                <?php endif; ?>
                            <?php else : ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if ( get_sub_field( 'icon_toggle' ) == 1 ) : ?>
                        <div class="flex flex-row relative w-full lg:w-1/3 mb-2 lg:mb-0 order-1 lg:order-3">
                            <?php $hero_icon = get_sub_field( 'hero_icon' ); ?>
                            <?php if ( $hero_icon ) : ?>
                                <img class="w-1/2 mx-auto lg:mx-0 lg:w-full" src="<?php echo esc_url( $hero_icon['url'] ); ?>" alt="<?php echo esc_attr( $hero_icon['alt'] ); ?>" />
                            <?php endif; ?>
                        </div>
                    <?php else : //nothing ?>
                    <?php endif; ?>

                </div>
            </section>


        <?php else : ?>

            <section class="mt-4 xl:mt-16 xl:mb-6">
                <div class="flex contained">
                    <h1 class="text-3xl sm:text-4xl xl:text-5xl xl:leading-snug mb-6 lg:mb-16 font-bold text-slate-900 lg:text-center"><?php the_title(); ?></h1>
                </div>
            </section>
            
            <script type="module">
                const content_header = document.getElementById("app");
                const header_element = document.getElementById("header");
                content_header.classList.add('pt-20');
                content_header.classList.add('lg:pt-32');
            </script>

        <?php endif; ?>

	<?php endwhile; ?>
<?php else: ?>
	<p class="bg-slate-200 text-4xl p-4">Hero not setup yet. Talk to your web admin.</p>
<?php endif; ?>