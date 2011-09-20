<?php get_header(); ?>
	
	<article class="two_third"><!-- start posts area -->
		<h1><?php printf( __( 'Category Archive: %s', 'twentyten' ), '' . single_cat_title( '', false ) . '' );?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '' . $category_description . '';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );?>			
	</article>

<?php get_sidebar(); ?>
<?php get_footer(); ?>