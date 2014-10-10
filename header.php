<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Iemoto GroundworkCSS 2
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'iemoto_before_body' ); ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'iemoto' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<?php do_action( 'iemoto_before_header' ); ?>

		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>

		<nav id="site-navigation" class="main-navigation nav small-tablet" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Primary Menu', 'iemoto' ); ?></h1>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '' ) ); ?>
		</nav><!-- #site-navigation -->

		<?php do_action( 'iemoto_after_header' ); ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content row">
		<?php do_action( 'iemoto_before_content' ); ?>
