<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @subpackage Bicubic
 * @since      Bicubic 1.0
 */

get_header(); ?>
	<div class="entry-content">
		<?php get_template_part( 'content-none', get_post_format() ); ?>
	</div><!-- .entry-content -->
<?php get_sidebar(); ?>
<?php get_footer();
