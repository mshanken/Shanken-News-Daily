<?php get_header(); ?>

	<article class="two_third"><!-- start posts area -->
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
			<?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>
	</article>
	
<?php endwhile; ?>
<?php get_footer(); ?>