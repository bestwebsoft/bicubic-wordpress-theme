<?php
/**
 * The Template for displaying all single posts
 *
 * @subpackage Bicubic
 * @since      Bicubic 1.0
 */
get_header(); ?>
	<!-- content -->
	<div class="entry-content">
		<?php if ( have_posts() ) :
			the_post();
			get_template_part( 'content', get_post_format() );
			comments_template(); //show comments to post ?>
			<!-- top link -->
			<div class="bicubic-top">
				<a href="#">[<?php _e( 'Top', 'bicubic' ); ?>]</a>
			</div>
			<!-- navigation -->
			<div class="bicubic-nav-link">
				<div class="alignleft"><?php previous_post_link( '%link ', '&larr; %title' ); ?></div>
				<div class="alignright"><?php next_post_link( '%link', '%title &rarr;' ); ?></div>
				<div class="bicubic-clear"></div>
			</div><!-- .bicubic-nav-link -->
		<?php endif; ?>
	</div><!-- .entry-content -->
<?php get_sidebar();
get_footer();
