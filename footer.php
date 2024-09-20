<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package standard_theme
 */

?>
<div>
<?php if (is_active_sidebar('footer-1')) : ?>
    <div id="footer-widget-area" class="footer-widget-area container mx-auto py-8">
        <?php dynamic_sidebar('footer-1'); ?>
    </div>
<?php endif; ?>

</div>



	<footer id="colophon" class="site-footer container mx-auto px-4 bg-gray-600 text-white">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'standard_theme' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'standard_theme' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'standard_theme' ), 'standard_theme', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
