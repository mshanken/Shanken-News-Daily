<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<article class="two_third"><!-- start posts area -->
		<section class="post">
			<h2><?php the_title(); ?></h2>
				<?php $arc_year = get_the_time('Y'); ?>
				<?php $arc_month = get_the_time('m'); ?>
				<?php $arc_day = get_the_time('d'); ?>
			<span class="posted"><a href="<?php echo get_day_link($arc_year, $arc_month, $arc_day); ?>" title="Click to see that day's daily archive"><?php echo get_the_date(); ?></a></span>

				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>

				<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
				<h2><?php printf( esc_attr__( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
				<?php the_author_meta( 'description' ); ?>
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php printf( __( 'View all posts by %s &rarr;', 'twentyten' ), get_the_author() ); ?></a>

<?php endif; ?>

<a href="https://newsletters.shankennewsdaily.com/" title="Subscribe to Shanken News Daily’s Email Newsletter" style="display:block; padding:0.56em 0; margin: 0; font-style:italic; font-weight:bold;font-size:1.1em;line-height:1.28;">Subscribe to Shanken News Daily’s Email Newsletter, delivered to your inbox each morning.
<?php if (has_tag('cannabis')):?>
You will also receive the Cannabis edition as part of your subscription.
				<?php endif; ?>
</a>

<!-- AddThis Button BEGIN -->
<ul class="addthis_toolbox addthis_default_style addthis_32x32_style">
	<li><a class="addthis_button_preferred_1"></a></li>
	<li><a class="addthis_button_preferred_2"></a></li>
	<li><a class="addthis_button_preferred_3"></a></li>
	<li><a class="addthis_button_preferred_4"></a></li>
	<li><a class="addthis_button_compact"></a></li>
	<li><a class="addthis_counter addthis_bubble_style"></a></li>
</ul>
<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
<script type="text/javascript" src="https://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4daee8be31d57ce8"></script>
<!-- AddThis Button END -->

<?php $tags_list = get_the_tag_list( '', ', ' );
		if ( $tags_list ): ?>
		<p><span class="posted"><?php printf( __( 'Tagged : %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?></span></p>
		<?php endif; ?>
	<p><?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?></p>

		<p><a href="https://winespectator.wufoo.com/forms/q1tp0ys41mdhey0/" title="Order Impact Databank" class="article-promo">Get your first look at 2018 data and 2019 projections for the wine and spirits industries. <span>Order your 2019 Impact Databank Reports</span>. Click here.</a> </p>

		</section>
		<p><span id="prevlink">Previous&nbsp;:&nbsp;<?php previous_post_link( '%link', '%title ' . __( '' ) . '' ); ?></span>
		<span id="newerlink">Next&nbsp;:&nbsp;<?php next_post_link( '%link', '%title ' . __( '' ) . '' ); ?></span></p>



	</article><!-- end posts area -->



<?php endwhile; // end of the loop. ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
