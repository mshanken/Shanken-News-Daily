<div id="sidebar" class="one_third">
	<form id="search-form-inline" action="/" method="get" role="search">
		<div class="search-wrap">
			<div class="search-input">
				<input id="s" type="search" name="s" value=""  placeholder="search..." x-webkit-speech="" x-webkit-grammar="builtin:search" onwebkitspeechchange="startSearch()">
				<input id="search-submit" type="submit" value=""/>
			</div><!--/search-input-->
		</div><!--/search-wrap-->
	</form><!--/searchform-->
		
	<div class="widget-container" id="ad-desktop">
		<!-- msha.snd.home -->
		<script type="text/javascript">
		  var ord = window.ord || Math.floor(Math.random() * 1e16);
		  document.write('<script type="text/javascript" src="http://ad.doubleclick.net/N4054/adj/msha.snd.home;sz=300x250;ord=' + ord + '?"><\/script>');
		</script>
		<noscript>
		<a href="http://ad.doubleclick.net/N4054/jump/msha.snd.home;sz=300x250;ord=[timestamp]?">
		<img src="http://ad.doubleclick.net/N4054/ad/msha.snd.home;sz=300x250;ord=[timestamp]?" width="300" height="250" />
		</a>
		</noscript>
		<a href="http://www.winespectator.com/micro/show/id/40311" title="Wine Spectator's New York Wine Experience"><img src="/wp-content/themes/Shanken-News-Daily/img/NYWEbanner290x242.jpg" alt="Wine Spectator's New York Wine Experience" /></a>
	</div><!--/widget-container-->
			

<?php
	
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
	
		<div class="widget-container">
			<h5><?php _e( 'Archives', 'twentyten' ); ?></h5>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
		</div><!--/widget-container-->

		<div class="widget-container">
			<h5><?php _e( 'Meta', 'twentyten' ); ?></h5>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
		</div><!--/widget-container-->

		<?php endif; // end primary widget area ?>
		
		<div class="widget-container">
			<h3 class="widget-title">FOLLOW US</a></h3>
				<ul id="socialicons">
					<li><a href="http://twitter.com/#!/ShankenNews"><img src="http://www.shankennewsdaily.com/wp-content/themes/Shanken-News-Daily/img/twitter.png" alt="Shanken News Daily on Twitter" title="Shanken News Daily on Twitter"/></a></li>
					<li><a href="http://www.facebook.com/#!/pages/Shanken-News-Daily/187376324643407"><img src="http://www.shankennewsdaily.com/wp-content/themes/Shanken-News-Daily/img/facebook.png" alt="Shanken News Daily on Facebook" title="Shanken News Daily on Facebook"/></a></li>
				</ul>
		</div><!--/widget-container-->
<?php
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

			<div>
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</div>
			
<?php endif; ?>
</div><!--/#sidebar-->