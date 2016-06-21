<?php
/**
 * The main template file
 *
 * @subpackage Bicubic
 * @since Bicubic 1.0
 */
get_header(); ?>
<!-- content -->
<div class="entry-content">
	<?php if ( have_posts() ) :
		// the loop begin
		while ( have_posts() ) : the_post();
			get_template_part( 'content', get_post_format() );
		endwhile; /* the loop end */?>
		<!-- navigation -->
		<div class="bicubic-nav-link">
			<div class="alignleft"><?php next_posts_link( '&larr; ' . __( 'Older posts', 'bicubic' ) ); ?></div>
			<div class="alignright"><?php previous_posts_link( __( 'Newer posts', 'bicubic' ) . ' &rarr;' ); ?></div>
			<div class="bicubic-clear"></div>
		</div><!-- .bicubic-nav-link -->
	<?php else :
		get_template_part( 'content-none', get_post_format() );
	endif; ?>
</div><!-- .entry-content -->
<?php get_sidebar();
get_footer();
