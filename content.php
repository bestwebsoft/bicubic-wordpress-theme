<?php
/**
 * The default template for displaying content
 *
 * @subpackage Bicubic
 * @since      Bicubic 1.0
 */

/* show this if it is a search page */
if ( is_search() ) : ?>
	<div class="bicubic-search-result">
	<!-- show this on all other pages -->
<?php else : ?>
	<div <?php post_class(); ?>>
<?php endif; ?>
<!-- indication of .sticky post -->
<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
	<div class="bicubic-sticky-indicator">
		<h2><?php _e( 'Sticky post', 'bicubic' ); ?></h2>
	</div><!-- .bicubic-sticky-indicator -->
<?php endif; ?>
<!-- post title -->
<div class="bicubic-post-title">
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
</div><!-- bicubic-post-title -->
<!-- post date and category -->
<div class="bicubic-post-date">
	<?php _e( 'Posted on', 'bicubic' ); ?>
	<a href="<?php the_permalink(); ?>"><?php the_time( 'j F, Y' ); ?></a> <?php _e( 'in', 'bicubic' ); ?>
	<a href="#"><?php the_category( ', ' ); ?></a>
	<?php edit_post_link( __( '(Edit)', 'bicubic' ) ); ?>
</div><!-- bicubic-post-date -->
<!-- post content -->
<?php if ( has_post_thumbnail() ) { // check if the post has a post thumbnail assigned to it.
	the_post_thumbnail( 'bicubic-size' );
} ?>
<?php if ( is_search() ) { // display only excerpts for Search
	the_excerpt();
} else {
	the_content(); // display all content for other pages ?>
	<div class="bicubic-clear"></div>
	<?php wp_link_pages();
}; ?>
</div><!-- post_class() -->
<!-- if tags exist show them -->
<?php if ( has_tag() ) : ?>
	<div class="bicubic-tags bicubic-clear">
		<?php the_tags( __( 'Tags: ', 'bicubic' ) ); ?>
	</div><!-- .bicubic-tags -->
<?php endif; ?>
<!-- top link -->
<div class="bicubic-top">
	<a href="#">[<?php _e( 'Top', 'bicubic' ); ?>]</a>
</div><!-- .bicubic-top -->
