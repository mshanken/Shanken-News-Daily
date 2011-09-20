<?php get_header(); ?>
	
	<article class="two_third"><!-- start posts area -->
		<h1><?php printf( __( 'Tag Archive: %s', 'twentyten' ), '' . single_tag_title( '', false ) . '' ); ?></h1>

<?php
/* Run the loop for the tag archive to output the posts
 * If you want to overload this in a child theme then include a file
 * called loop-tag.php and that will be used instead.
 */
 get_template_part( 'loop', 'tag' );
?>

	</article>

<?php get_sidebar(); ?>
<?php get_footer(); ?>