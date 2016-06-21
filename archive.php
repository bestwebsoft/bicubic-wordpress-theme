<?php
/**
 * The template for displaying Archive pages
 *
 * @subpackage Bicubic
 * @since      Bicubic 1.0
 */

get_header(); ?>
<div class="entry-content">
	<?php if ( have_posts() ) : ?>
		<div class="bicubic-archive-header">
			<h2 class="bicubic-archive-title">
				<?php the_archive_title(); ?>
			</h2>
		</div><!-- .bicubic-archive-header -->
		<?php while ( have_posts() ) : the_post();
			get_template_part( 'content', get_post_format() );
		endwhile; ?>
		<div class="bicubic-nav-link">
			<div class="alignleft"><?php next_posts_link( '&larr; ' . __( 'Older posts', 'bicubic' ) ); ?></div>
			<div class="alignright"><?php previous_posts_link( __( 'Newer posts', 'bicubic' ) . ' &rarr;' ); ?></div>
			<div class="bicubic-clear"></div>
		</div><!-- .bicubic-nav-link -->
	<?php else :
		get_template_part( 'content-none', get_post_format() );
	endif; ?>
</div><!-- .entry-content -->
<?php get_sidebar(); ?>
<?php get_footer();
