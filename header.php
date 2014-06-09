<!DOCTYPE HTML>
<html>
<head>
	<title><?php wp_title(); ?> | <?php bloginfo('name'); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->

	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <?php wp_head(); ?>
	
</head>

<body>
	
	<div id="wrap">
		<div id="container" class="group">
			<!--Header - Name of Item Here-->            
			<header class="group">
				<h1><img src="<?php print IMAGES; ?>/logo.png" alt="<?php bloginfo('name'); ?>" /></h1>
				
				<?php get_search_form(); ?>
				
				<?php wp_nav_menu( array('menu' => 'Main', 'container' => 'nav' )); ?>
				
			</header>
			
			<?php if(!is_front_page()) : ?> <hr/> <?php endif; ?>
			
			<div id="content" class="group">