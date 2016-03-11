<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Shanken News Daily: Exclusive news and research on the wine, spirits and beer business</title>
	<meta name="author" content="M. Shanken Communications, Inc.">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="Shanken News Daily &raquo; Feed" href="http://www.shankennewsdaily.com/index.php/feed/" />
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://www.shankennewsdaily.com/xmlrpc.php?rsd" />
	<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://www.shankennewsdaily.com/wp-includes/wlwmanifest.xml" /> 

  <!-- Begin JS libraries -->
  <script src="/wp-content/themes/Shanken-News-Daily/js/script.js"></script>
<!--   
  <script type="text/javascript" src="/wp-content/themes/Shanken-News-Daily/js/js.cookie.js"></script>
   Bootstrap Latest compiled and minified JavaScript 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> 
-->

  
  <link rel="shortcut icon" href="/wp-content/themes/Shanken-News-Daily/img/favicon.ico">
  <link rel="apple-touch-icon" href="/wp-content/themes/Shanken-News-Daily/img/apple-touch-icon.png">


  <link rel="stylesheet" href="/wp-content/themes/Shanken-News-Daily/style.css">
  <!-- <link rel="stylesheet" href="http://shankennewsdaily.com/wp-content/plugins/contact-form-7/styles.css"> -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
  
  <!-- Bootstrap Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<script src="https://s3.amazonaws.com/toolkit.mshanken.com/js/modernizr.min.js"></script>
  <script src="/wp-content/themes/Shanken-News-Daily/js/paywall.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<script>
  dataLayer = [];
</script>

	<div class="container"><!-- start container -->
		<div class="page">
			<div class="content">
				<header class="clearfix"><!-- start header -->
					<div class="one_third">
						<a href="<?php echo home_url( '/' ); ?>" alt="Shanken News Daily" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						<img id="logoimg" src="/wp-content/themes/Shanken-News-Daily/img/drinksdaily-logo2.png" alt="Shanken News Daily" title="Shanken News Daily"/></a>
					</div>
					<div class="two_third" id="tagline">
					<h2><?php bloginfo( 'description' ); ?></h2>
					</div>
					<nav class="one_full"><!-- nav -->
						<span id="date"><?php echo date('F j, Y'); ?></span>
							<ul>
								<li<?php if ( is_home()){echo " class=\"current_page_item\"";}?>><a href="/" title="NEWS HOME">NEWS</a></li>
					<?php wp_list_pages('exclude=579&title_li='); ?>
								<li><a href="http://pubform.shankennewsdaily.com/" title="M. Shanken Communications Publications">PUBLICATIONS</a></li>
								<li id="subpage"><a href="http://newsletters.shankennewsdaily.com" title="Subscribe to Shanken News Daily">SUBSCRIBE to SND</a></li>
							</ul>
					</nav><!-- end nav -->

				</header><!-- end header -->

<div class="clearfix"></div>