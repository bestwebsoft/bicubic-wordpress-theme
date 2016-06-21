<?php
/**
 * The sidebar template
 *
 * If no active widgets are in the sidebar, dissplays default widgets.
 *
 * @subpackage Bicubic
 * @since      Bicubic 1.0
 */
?>
<aside class="bicubic-sidebar">
	<div class="widget">
		<!-- register Sidebar -->
		<!-- if none widgets was added show default widgets -->
		<?php if ( is_active_sidebar( 'bicubic-sidebar' ) ) {
			dynamic_sidebar( 'bicubic-sidebar' );
		} else {
			$args     = array(
				'before_widget' => '<li class="widget %s">',
				'after_widget'  => '</li>',
			);
			$instance = array(
				'hierarchical' => '1',
				'count'        => '1',
			);
			// <!-- recent posts widget-->
			the_widget( 'WP_Widget_Recent_Posts', 'number=5', $args );
			// <!-- recent comments widget -->
			the_widget( 'WP_Widget_Recent_Comments', 'number=3', $args );
			// <!-- archives widget -->
			the_widget( 'WP_Widget_Archives', $instance, $args );
			// <!-- categories widget -->
			the_widget( 'WP_Widget_Categories', $instance, $args );
		} ?>
	</div>
</aside><!-- .bicubic-sidebar -->
<div class="bicubic-clear"></div>
