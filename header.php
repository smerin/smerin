<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package smerin
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
	<!-- TODO: Optimise googlefonts import --> 
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'smerin' ); ?></a>

	<header id="masthead" class="header">
		<div class="container">
			<div class="header__inner">
				<div class="header__logo">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gs-logo.png" alt="George Smerin logo" width="140" height="140" />
				</div><!-- .site-logo -->
				<nav id="site-navigation" class="header__navigation main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'smerin' ); ?></button>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</nav><!-- #site-navigation -->
			</div>
		</div><!-- .container -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
