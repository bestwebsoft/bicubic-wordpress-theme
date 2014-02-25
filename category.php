<?php  
/**
* the template for displaying posts in selected category 
 *
 * @subpackage Bicubic
 * @since Bicubic 1.0
 */

get_header(); ?>
<!-- content -->
<div class="entry-content">
	<?php if( have_posts() ) : ?>
		<div class="bicubic-archive-header">
			<h2 class="bicubic-archive-title"><?php printf( __( 'Category Archives: %s', 'bicubic' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h2>
			<?php if ( category_description() ) : // show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
		</div><!-- .bicubic-archive-header -->
		<!-- the loop begin -->
		<?php /* get content part */
			while( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
			endwhile; ?>
		<!-- the loop end -->
		<!-- page navigation -->
		<div class="bicubic-nav-link">
			<div class="alignleft"><?php next_posts_link( '&larr; ' . __( 'Older posts', 'bicubic' ) ); ?></div>
			<div class="alignright"><?php previous_posts_link( __( 'Newer posts', 'bicubic'  ) . ' &rarr;' ); ?></div>
			<div class="bicubic-clear"></div>		
		</div><!-- .bicubic-nav-link -->
	<?php else :
		get_template_part( 'content-none', get_post_format() );
	endif; ?>
</div><!-- .entry-content -->
<!-- sidebar -->
<?php get_sidebar(); ?>
<!-- footer -->
<?php get_footer(); ?>			