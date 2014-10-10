<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Iemoto GroundworkCSS 2
 */
?>

		<?php do_action( 'iemoto_after_content' ); ?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php do_action( 'iemoto_before_footer' ); ?>
		<div class="site-info">
			<?php do_action( 'iemoto_footer' ); ?>
		</div><!-- .site-info -->
		<?php do_action( 'iemoto_after_footer' ); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php do_action( 'iemoto_after_body' ); ?>

<?php wp_footer(); ?>

</body>
</html>
