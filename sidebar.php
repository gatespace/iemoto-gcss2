<?php
/**
 * The sidebar containing the main widget areas.
 *
 * @package Iemoto GroundworkCSS 2
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area one fourth" role="complementary">
	<?php do_action( 'iemoto_before_secondary' ); ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php do_action( 'iemoto_after_secondary' ); ?>
</div><!-- #secondary -->
