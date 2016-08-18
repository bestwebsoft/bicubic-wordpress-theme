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
			$instance = array();
			the_widget( 'WP_Widget_Recent_Posts', $instance, $args );
			the_widget( 'WP_Widget_Recent_Comments', $instance, $args );
			the_widget( 'WP_Widget_Archives', $instance, $args );
			the_widget( 'WP_Widget_Categories', $instance, $args );
		} ?>
	</div>
</aside><!-- .bicubic-sidebar -->
<div class="bicubic-clear"></div>
