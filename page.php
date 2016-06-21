<?php
/**
 * The template for displaying all pages
 *
 * @subpackage Bicubic
 * @since      Bicubic 1.0
 */
get_header(); ?>
	<!-- content -->
	<div class="entry-content">
		<?php if ( have_posts() ) :
			//the loop begin
			the_post(); ?>
			<div <?php post_class(); ?>>
				<!-- post title -->
				<div class="bicubic-post-title">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</div><!-- .bicubic-post-title -->
				<!-- post content -->
				<?php the_content(); ?>
				<div class="bicubic-clear"></div>
			</div><!-- post_class() -->
			<!-- comments to page -->
			<?php comments_template(); ?>
			<!-- top link -->
			<div class="bicubic-top bicubic-clear">
				<a href="#">[<?php _e( 'Top', 'bicubic' ); ?>]</a>
			</div><!-- .bicubic-top -->
		<?php endif; ?>
	</div><!-- .entry-content -->
<?php get_sidebar();
get_footer();
