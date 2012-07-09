<?php get_header(); ?>
<article class="two_third"><!-- start posts area -->
<?php if ( have_posts() ) : ?>
	
		
		<h1><?php printf( __( 'Search Results for: %s', 'twentyten' ), '' . get_search_query() . '' ); ?></h1>
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>
		<?php else : ?>
		<h1><?php _e( 'Nothing Found', 'twentyten' ); ?></h1>
		<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>

<?php endif; ?>
	</article>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
