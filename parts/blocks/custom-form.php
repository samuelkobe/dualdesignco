<section class="container mx-auto px-6 mt-32 lg:mt-40 mb-16 lg:mb-24">

    <div class="flex flex-col items-start lg:items-center mb-4 lg:mb-16">            
        <h2 class="mt-4 font-title text-3xl lg:text-4xl 2xl:text-6xl 2xl:leading-tight"><?php the_field( 'form_title' ); ?></h2>
        <p class="font-normal text-base lg:text-lg 2xl:text-xl w-auto mt-4 lg:mt-6 2xl:leading-relaxed"><?php the_field( 'form_subtitle' ); ?></p>
    </div>

    <div class="flex flex-col items-start lg:items-center w-full lg:w-5/6 lg:mx-1/12 2xl:w-2/3 2xl:mx-1/6 lg:mt-0 object-reveal-long">
        <div class="w-full my-4 lg:mt-8">
            <?php the_field( 'form_embed' ); ?>
        </div>
    </div>

</section>