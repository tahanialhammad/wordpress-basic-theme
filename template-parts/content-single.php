<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package standard_theme
 */

?>

<article class=" container mx-auto px-4" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="uppercase text-lg mb-2">', '</h1>' );
		else :
			the_title( '<h2 class="uppercase text-lg mb-2"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="text-xs text-gray-400 mb-2 ">
				<?php
				standard_theme_posted_on();
				standard_theme_posted_by();
				?>
			</div>
		<?php endif; ?>
	</header>

	<?php standard_theme_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'standard_theme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'standard_theme' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<footer class="entry-footer my-8">
		<?php standard_theme_entry_footer(); ?>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
