<!doctype html>	
<!--[if lt IE 7 ]> <html class="no-js ie6 ie" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7 ie" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if IE 9 ]>	   <html class="no-js ie9 ie" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js no-ie" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php wp_title(' | ',true,'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" href="<?php bloginfo(wpurl); ?>/favicon.ico" />
	<link rel="apple-touch-icon" href="<?php bloginfo(wpurl); ?>/apple-touch-icon.png" />
	<link rel="apple-touch-icon" href="<?php bloginfo(wpurl); ?>/apple-touch-icon-72x72.png" sizes="72x72" />
	<link rel="apple-touch-icon" href="<?php bloginfo(wpurl); ?>/apple-touch-icon-114x114.png" sizes="114x114" />

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/stylesheets/style.css?v=2" />
	<script src="<?php bloginfo('template_url'); ?>/javascripts/libs/modernizr-2.0.6.min.js"></script>

	<?php wp_head(); ?>
</head>
<body>

	<header>
		<div class="container">
			<?php $header_image = get_header_image();
			if ( ! empty( $header_image ) ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
			<?php endif; ?>
			<nav>
				<ul>
					<?php wp_nav_menu( array(
						'theme_location' => 'main-nav',
						'container' => false,
						'items_wrap' => '%3$s',
						'menu_id' => ''
					));?>
				</ul>
			</nav>
		</div>
	</header>
	
	<div class="container">

		<div class="main cf">
			<div class="content">
				<?php if (is_front_page()) {
					get_template_part('part','featured');
				}?>