		<?php if ( get_field( 'splash_page_toggle', 'option' ) == 0 ) : ?>
				<!-- footer -->
			<footer class="footer bg-brand-black text-white" role="contentinfo">

				<div class="contained">

					<div class="w-full flex lg:flex-row flex-wrap py-6 lg:py-14">

						<?php // footer image part ?>
						<?php get_template_part('parts/footer/image') ?>

						<div class="w-full md:w-1/4 lg:w-1/6 grow order-2 lg:order-1 mb-8 lg:mb-0">
							<h3 class="text-lg lg:text-2xl text-white font-title mb-4 lg:mb-6">Reach out</h4>
							<div class="w-full flex flex-col text-base xl:leading-8">
								<a class="hover:text-brand-third transition-colors duration-300" href="tel:<?php the_field( 'phone_number', 'option' ); ?>"><?php the_field( 'phone_number_text', 'option' ); ?></a>
								<a class="hover:text-brand-third transition-colors duration-300" href="mailto:<?php the_field( 'contact_email', 'option' ); ?>?subject=Inquiry from the <?php bloginfo('name'); ?> website" target="_blank"><?php the_field( 'contact_email_link_text', 'option' ); ?></a>
							</div>
						</div>

						<?php // Footer navigation part ?>
						<div class="w-1/2 md:w-1/4 lg:w-1/6 grow order-3 lg:order-2 mb-8 lg:mb-0">
							<h3 class="text-lg lg:text-2xl text-white font-title mb-4 lg:mb-6">Support</h4>
							<div class="w-full flex flex-col">
								<?php footer_nav(); ?>
							</div>
						</div>

						<?php // Footer Social Media part ?>
						<?php if ( get_field( 'social_media_toggle', 'option' ) == 1 ) : ?>
							<?php get_template_part('parts/footer/social') ?>
						<?php else : ?>
								<?php // Social Media turned off ?>
						<?php endif; ?>
								
						<?php // Footer Newsletter part ?>
						<?php if ( get_field( 'newsletter_media_toggle', 'option' ) == 1 ) : ?>
								<?php get_template_part('parts/footer/newsletter') ?>
						<?php else : ?>
							<?php // Newsletter turned off ?>
						<?php endif; ?>

					</div>

				</div>

				<?php // footer copyright bottom part ?>
				<?php get_template_part('parts/footer/copyright') ?>
                	
			</footer>
			<!-- /footer -->

		<?php endif; ?>

		</div>
		<!-- /wrapper -->
		<?php wp_footer(); ?>

	</body>
</html>


