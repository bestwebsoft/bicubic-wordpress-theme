<?php
/**
 * The template for displaying a "No posts" message
 *
 * @subpackage Bicubic
 * @since Bicubic 
 */
?>
<!-- search header -->
<?php if ( is_search() ) : ?>
	<div class="bicubic-search-header">
		<h2 class="bicubic-post-title"><?php printf( __( 'Search Results for: %s', 'bicubic' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
	</div><!-- .bicubic-search-header -->
	<div class="post">
		<h3><?php _e( 'Nothing found for your query. Try to find something else.', 'bicubic' );  ?></h3>	
		<?php get_search_form(); /*display search form*/ ?>						
	</div><!-- .post -->
<?php elseif ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<div class="bicubic-search-header">
		<h2 class="bicubic-post-title"><?php _e( 'Ready to publish your first post?', 'bicubic' ); ?><a href="<?php echo admin_url( 'post-new.php' );?>"><?php _e( 'Get started here', 'bicubic' ) ?></a>.</h2>
	</div><!-- .bicubic-search-header -->
	<div class="post">
		<h3><?php _e( 'No post yet', 'bicubic' );  ?></h3>	
<?php else : ?>
	<div class="bicubic-search-header">
		<h2 class="bicubic-post-title"><?php _e( 'Not found ', 'bicubic' ) ?></h2>
	</div><!-- .bicubic-search-header -->
	<div class="post">
		<h3><?php _e( 'Seems that page does not exist. Try to find something else.', 'bicubic' ); ?></h3>	
		<?php get_search_form(); ?>						
	</div><!-- .post -->
<?php endif; ?>