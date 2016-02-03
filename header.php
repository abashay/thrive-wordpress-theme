<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->

	<link rel="icon" type="image/icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.png">


	<?php wp_head(); ?>

	<meta name="description" content="<?php bloginfo('description'); ?>" />
</head>

<body <?php body_class(); ?>>

	<header class="header">

		<h1><a href="/" class="header__logo"><?php echo get_bloginfo('name'); ?>: <?php echo get_bloginfo('description'); ?></a></h1>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>

			<div class="mobile-menu-toggle">
				<a href="#">Menu</a>
			</div>

			<nav id="site-navigation" class="header__nav" role="navigation">
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav-menu',
						'theme_location' => 'primary',
					) );
				?>
			</nav>
		<?php endif; ?>
	</header>

	<div class="content_container cf">
