<div id="sidebar" class="one_third">
		
		<form id="search-form-inline" action="" method="get" role="search">
							<div class="search-wrap">
								<div class="search-input">
									<input id="s" type="search" name="s" value=""  placeholder="search..." x-webkit-speech="" x-webkit-grammar="builtin:search" onwebkitspeechchange="startSearch()">
									<input id="search-submit" type="submit" value=""/>
								</div><!--/search-input-->
							</div><!--/search-wrap-->
		</form><!--/searchform-->
		<!--<div class="widget-container" id="ad-desktop">
			<a href="http://www.winespectator.com/micro/show?id=40690" title="The 36th annual Impact Marketing Seminar - March 22, 2012"><img src="http://shankennewsdaily.com/img/IMP-MS2011-274x220.jpg" alt="The 36th annual Impact Marketing Seminar - March 22, 2012" /></a></div>
			
		<div class="widget-container" id="ad-tablet">
			<a href="http://www.winespectator.com/micro/show?id=40690" title="The 36th annual Impact Marketing Seminar - March 22, 2012"><img src="http://shankennewsdaily.com/img/IMP-MS2011-189x150.jpg" alt="The 36th annual Impact Marketing Seminar - March 22, 2012" /></a></div>
			
		<div class="widget-container" id="ad-mobile-landscape">
			<a href="http://www.winespectator.com/micro/show?id=40690" title="The 36th annual Impact Marketing Seminar - March 22, 2012"><img src="http://shankennewsdaily.com/img/IMP-MS2011-360x200.jpg" alt="The 36th annual Impact Marketing Seminar - March 22, 2012" /></a></div>
			
		<div class="widget-container" id="ad-mobile-port">
			<a href="http://www.winespectator.com/micro/show?id=40690" title="The 36th annual Impact Marketing Seminar - March 22, 2012"><img src="http://shankennewsdaily.com/img/IMP-MS2011-200x150.jpg" alt="The 36th annual Impact Marketing Seminar - March 22, 2012" /></a></div>-->

<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
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
					<li><a href="http://twitter.com/#!/ShankenNews"><img src="http://shankennewsdaily.com/img/twitter.png" alt="Shanken News Daily on Twitter" title="Shanken News Daily on Twitter"/></a></li>
					<li><a href="http://www.facebook.com/#!/pages/Shanken-News-Daily/187376324643407"><img src="http://shankennewsdaily.com/img/facebook.png" alt="Shanken News Daily on Facebook" title="Shanken News Daily on Facebook"/></a></li>
				</ul>
		</div><!--/widget-container-->
<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

			<div>
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</div>
			
<?php endif; ?>
</div><!--/#sidebar-->