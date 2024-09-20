<?php get_header(); ?>

<div class="flex">
	<main id="primary" class="site-main container mx-auto px-4">
		<h1> single page</h1>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-single', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="">' . esc_html__( 'Previous:', 'standard_theme' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="">' . esc_html__( 'Next:', 'standard_theme' ) . '</span> <span class="nav-title">%title</span>',
				)
			);
			

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
