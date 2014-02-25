<?php
/**
 * The template for displaying Archive pages
 *
 * @subpackage Bicubic
 * @since Bicubic 1.0
 */
  
get_header(); ?>
<!-- content -->
<div class="entry-content">
	<?php if( have_posts() ) : ?>
		<div class="bicubic-archive-header">
			<h2 class="bicubic-archive-title">
				<?php /* show archive title */
					if ( is_day() ) {
						printf( __( 'Daily Archives: %s', 'bicubic' ), '<span>' . get_the_date() . '</span>' );
					} elseif ( is_month() ) {
						printf( __( 'Monthly Archives: %s', 'bicubic' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
					} elseif ( is_year() ) {
						printf( __( 'Yearly Archives: %s', 'bicubic' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
					} else {
						_e( 'Archives', 'bicubic' );
				}; ?>
			</h2>
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