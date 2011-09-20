<?php get_header(); ?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
	<article class="two_third"><!-- start posts area -->
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>
	</article><!-- end posts area -->

<?php endwhile; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>