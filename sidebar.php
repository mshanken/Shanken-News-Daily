<div id="sidebar" class="one_third">
	<form id="search-form-inline" action="/" method="get" role="search">
		<div class="search-wrap">
			<div class="search-input">
				<input id="s" type="search" name="s" value=""  placeholder="search..." x-webkit-speech="" x-webkit-grammar="builtin:search" onwebkitspeechchange="startSearch()">
				<input id="search-submit" type="submit" value=""/>
			</div><!--/search-input-->
		</div><!--/search-wrap-->
	</form><!--/searchform-->

	<!-- /4054/msha.snd.home -->
	<div id='div-gpt-ad-1461009721118-0' class="widget-container">
		<script type='text/javascript'>
			googletag.cmd.push(function() { googletag.display('div-gpt-ad-1461009721118-0'); });
		</script>
	</div>


		<?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

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
				<li><a href="http://twitter.com/#!/ShankenNews"><img width="31" height="31" src="//s3.amazonaws.com/assets.mshanken.com/snd/twitter.png" alt="Shanken News Daily on Twitter" title="Shanken News Daily on Twitter"/></a></li>
				<li><a href="http://www.facebook.com/#!/pages/Shanken-News-Daily/187376324643407"><img width="31" height="31" src="//s3.amazonaws.com/assets.mshanken.com/snd/facebook.png" alt="Shanken News Daily on Facebook" title="Shanken News Daily on Facebook"/></a></li>
			</ul>
		</div><!--/widget-container-->

		<?php if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>
			<div>
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</div>
		<?php endif; ?>
</div><!--/#sidebar-->