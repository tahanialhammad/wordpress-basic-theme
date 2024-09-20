<?php get_header(); ?>
<div class="flex">

	<main id="primary" class="site-main container mx-auto px-4">
page page
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->


	<div class="h-100 ">
		<?php get_sidebar(); ?>
	</div>

</div>
<?php get_footer(); ?>

