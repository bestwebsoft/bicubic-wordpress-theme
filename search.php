<?php 
/**
 * The template for displaying Search Results pages
 *
 * @subpackage Bicubic
 * @since Bicubic 1.0
 */
get_header(); ?>
<!-- content -->
<div class="entry-content">
	<?php if( have_posts() ) { ?>
		<!-- search header -->
		<div class="bicubic-search-header">
			<h2 class="bicubic-post-title"><?php printf( __( 'Search Results for: %s', 'bicubic' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
		</div><!-- .bicubic-search-header -->
		<!-- the loop begin -->
		<?php while( have_posts() ) : the_post();
			get_template_part( 'content', get_post_format() );				
		endwhile; 
		/* the loop end */ ?>
		<!-- navigation -->
		<div class="bicubic-nav-link">
			<div class="alignleft"><?php next_posts_link( '&larr; ' . __( 'Older posts', 'bicubic' ) ); ?></div>
			<div class="alignright"><?php previous_posts_link( __( 'Newer posts', 'bicubic'  ) . ' &rarr;' ); ?></div>
			<div class="bicubic-clear"></div>
		</div><!-- .bicubic-nav-link -->
	<?php } else { /* display this if nothing found */
		get_template_part( 'content-none', get_post_format() );
	} ?>
</div><!-- .entry-content -->
<!-- sidebar -->
<?php get_sidebar(); ?>
<!-- sooter -->
<?php get_footer(); ?>			