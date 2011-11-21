<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title( '|', true, 'right' );?></title>
	<meta name="description" content="Shanken News Daily: Exclusive news and research on the wine, spirits and beer business">
	<meta name="author" content="M. Shanken Communications, Inc.">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="Shanken News Daily &raquo; Feed" href="http://www.shankennewsdaily.com/index.php/feed/" />
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://www.shankennewsdaily.com/xmlrpc.php?rsd" />
	<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://www.shankennewsdaily.com/wp-includes/wlwmanifest.xml" /> 
	
	<link rel="shortcut icon" href="<?php bloginfo( 'template_url' ); ?>/img/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo( 'template_url' ); ?>/img/apple-touch-icon.png">

	<link rel="stylesheet" href="https://s3.amazonaws.com/toolkit.mshanken.com/css/elements.css">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	<link rel="stylesheet" href="http://SHANKDNEW-ElasticL-A0CNGVQLG2YI-1454536625.us-east-1.elb.amazonaws.com/wp-content/plugins/contact-form-7/styles.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
	
	<script src="https://s3.amazonaws.com/toolkit.mshanken.com/js/modernizr.min.js"></script>
	
	<link href="https://s3.amazonaws.com/toolkit.mshanken.com/toolkit/plugins/respond/respond-proxy.html" id="respond-proxy" rel="respond-proxy" />
    <link href="http://shankennewsdaily.com/wp-content/themes/Shanken-News-Daily/cross-domain/respond.proxy.gif" id="respond-redirect" rel="respond-redirect" />
    <script src="http://shankennewsdaily.com/wp-content/themes/Shanken-News-Daily/cross-domain/respond.proxy.js"></script>
</head>

<body <?php body_class(); ?>>
	<div class="container"><!-- start container -->
		<div class="page">
			<div class="content">
				<header><!-- start header -->
					<div class="one_third">
						<a href="<?php echo home_url( '/' ); ?>" alt="Shanken News Daily" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						<img id="logoimg" src="<?php bloginfo('template_url'); ?>/img/drinksdaily-logo2.png" alt="Shanken News Daily" title="Shanken News Daily"/></a>
					</div>
					<div class="two_third" id="tagline">
					<?php bloginfo( 'description' ); ?>
					</div>
					
					<nav class="one_full"><!-- nav -->
						<span id="date"><?php echo date('F j, Y'); ?></span>
							<ul>
								<li<?php if ( is_home()){echo " class=\"current_page_item\"";}?>><a href="<?php bloginfo('url') ?>" title="NEWS HOME">NEWS</a></li>
					<?php wp_list_pages('exclude=579&title_li='); ?>
								<li id="subpage"><a href="http://lp.shankennewsdaily.com/email?source=snd_website" title="Subscribe to Shanken News Daily">SUBSCRIBE to SND</a></li>
							</ul>
					</nav><!-- end nav -->

				</header><!-- end header -->

<div class="clear"></div>