<?php

get_header();
?>

<div class="flex">

	<main id="primary" class="site-main container mx-auto px-4">
		<h1>index page</h1>

		<div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray- py-6 sm:py-12">
			<div class="mx-auto max-w-screen-xl px-4 w-full">
				<div class="grid w-full sm:grid-cols-2 xl:grid-cols-4 gap-6">

					<?php
					if (have_posts()) :

						/* Start the Loop */
						while (have_posts()) :
							the_post();
							/*
				 * Include the Post-Type-specific template for the content.
				 * called content-___.php (where ___ is the Post Type name) .
				 */
							get_template_part('template-parts/content', get_post_type());

						endwhile;

						the_posts_navigation();

					else :

						get_template_part('template-parts/content', 'none');

					endif;
					?>
				</div>
			</div>
		</div>
	</main><!-- #main -->

	<div class="h-100">
		<?php get_sidebar(); ?>
	</div>

</div>
<?php get_footer(); ?>