<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title><?php wp_title( '|', true, 'right' );?></title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="google-site-verification" content="1dujorfLxBn9bxsL2tI-GQ-9A9kwxQj5QaLVAWnP8Ac" />
	<meta name="google-site-verification" content="gm0xsPL2pF96o9vlfzKV1MDNDMOh6bUixNkNyN_0_zE" />
	
	<link rel="shortcut icon" href="<?php bloginfo( 'template_url' ); ?>/img/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo( 'template_url' ); ?>/img/apple-touch-icon.png">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
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