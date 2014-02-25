<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @subpackage Bicubic
 * @since Bicubic 1.0
 */

get_header();?>
<!-- content -->
<div class="entry-content">
	<?php get_template_part( 'content-none', get_post_format() ); ?>
</div><!-- .bicubic-content -->
<!-- sidebar -->
<?php get_sidebar(); ?>
<!-- footer -->
<?php get_footer(); ?>